<?php

namespace App\Controller;

use App\Entity\Conversation;
use App\Entity\ConversationMessage;
use App\Entity\User;
use App\Repository\ConversationMessageRepository;
use App\Repository\ConversationRepository;
use App\Repository\ProduitRepository;
use App\Repository\UserRepository;
use App\Service\InputValidationService;
use App\Service\ProfanityFilterService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class MessagingController extends AbstractController
{
    private const EMOJI_API_URL = 'https://emojihub.yurace.pro/api/all/category/smileys%20and%20people';

    #[Route('/messages', name: 'app_messaging_index')]
    public function index(ConversationRepository $conversationRepository): Response
    {
        $currentUser = $this->requireMessagingUser();

        return $this->renderConversationWorkspace($currentUser, $conversationRepository);
    }

    #[Route('/messages/new', name: 'app_messaging_new')]
    public function newConversation(Request $request, UserRepository $userRepository, ConversationRepository $conversationRepository): Response
    {
        $currentUser = $this->requireClient();
        $search = trim((string) $request->query->get('search', ''));
        $existingConversationIds = [];

        foreach ($conversationRepository->findByUserOrdered($currentUser) as $conversation) {
            if ($conversation->getFournisseur() instanceof User) {
                $existingConversationIds[$conversation->getFournisseur()->getId()] = $conversation->getId();
            }
        }

        return $this->render('messaging/new.html.twig', [
            'suppliers' => $userRepository->findMarketplaceSuppliers($currentUser, $search),
            'search' => $search,
            'existingConversationIds' => $existingConversationIds,
        ]);
    }

    #[Route('/messages/start/{fournisseurId}', name: 'app_messaging_start', methods: ['POST'])]
    public function startConversation(
        int $fournisseurId,
        Request $request,
        UserRepository $userRepository,
        ProduitRepository $produitRepository,
        ConversationRepository $conversationRepository,
        EntityManagerInterface $entityManager
    ): Response {
        $currentUser = $this->requireClient();
        $fournisseur = $userRepository->find($fournisseurId);

        if (!$fournisseur instanceof User || !$this->isAvailableSupplier($fournisseur)) {
            throw $this->createNotFoundException('Supplier not found.');
        }

        if ($fournisseur->getId() === $currentUser->getId()) {
            throw $this->createAccessDeniedException('You cannot start a conversation with yourself.');
        }

        $produit = null;
        $produitId = (string) $request->request->get('produitId', '');
        if (ctype_digit($produitId)) {
            $produit = $produitRepository->find((int) $produitId);

            if (!$produit || $produit->getFournisseur()?->getId() !== $fournisseur->getId()) {
                throw $this->createNotFoundException('Product context not found for this supplier.');
            }
        }

        $conversation = $conversationRepository->findDirectConversation($currentUser, $fournisseur);

        if (!$conversation instanceof Conversation) {
            $conversation = (new Conversation())
                ->setClient($currentUser)
                ->setFournisseur($fournisseur)
                ->attachContext($produit);

            $entityManager->persist($conversation);
        } else {
            $conversation->attachContext($produit);
        }

        $entityManager->flush();

        return $this->redirectToRoute('app_messaging_show', ['id' => $conversation->getId()]);
    }

    #[Route('/api/emojis', name: 'app_messaging_emoji_api', methods: ['GET'])]
    public function emojiApi(HttpClientInterface $httpClient): JsonResponse
    {
        try {
            $response = $httpClient->request('GET', self::EMOJI_API_URL, [
                'timeout' => 10,
                'headers' => [
                    'Accept' => 'application/json',
                ],
            ]);

            if (200 !== $response->getStatusCode()) {
                return $this->json($this->getFallbackEmojiPayload());
            }

            $payload = $response->toArray(false);
            if (!is_array($payload)) {
                return $this->json($this->getFallbackEmojiPayload());
            }

            $emojis = array_slice(array_values(array_filter(array_map(
                static function ($entry): ?array {
                    if (!is_array($entry)) {
                        return null;
                    }

                    $name = trim((string) ($entry['name'] ?? ''));
                    $unicode = array_values(array_filter(
                        is_array($entry['unicode'] ?? null) ? $entry['unicode'] : [],
                        static fn ($value): bool => is_string($value) && '' !== trim($value)
                    ));

                    if ('' === $name || [] === $unicode) {
                        return null;
                    }

                    return [
                        'name' => $name,
                        'unicode' => $unicode,
                    ];
                },
                $payload
            ))), 0, 180);

            return $this->json([] !== $emojis ? $emojis : $this->getFallbackEmojiPayload());
        } catch (\Throwable) {
            return $this->json($this->getFallbackEmojiPayload());
        }
    }

    #[Route('/messages/{id}', name: 'app_messaging_show', requirements: ['id' => '\\d+'])]
    public function showConversation(
        int $id,
        ConversationRepository $conversationRepository,
        ConversationMessageRepository $conversationMessageRepository,
        EntityManagerInterface $entityManager
    ): Response {
        $currentUser = $this->requireMessagingUser();
        $conversation = $conversationRepository->findOneVisibleForUser($id, $currentUser);

        if (!$conversation instanceof Conversation) {
            throw $this->createNotFoundException('Conversation not found.');
        }

        $conversationMessages = $conversationMessageRepository->findByConversation($conversation);
        $hasNewReads = false;

        foreach ($conversationMessages as $message) {
            if ($message->getSender()?->getId() === $currentUser->getId() || $message->isRead()) {
                continue;
            }

            $message->markAsRead();
            $hasNewReads = true;
        }

        if ($hasNewReads) {
            $entityManager->flush();
        }

        return $this->renderConversationWorkspace($currentUser, $conversationRepository, $conversation, $conversationMessages);
    }

    #[Route('/messages/{id}/send', name: 'app_messaging_send', methods: ['POST'], requirements: ['id' => '\\d+'])]
    public function sendMessage(
        int $id,
        Request $request,
        ConversationRepository $conversationRepository,
        ConversationMessageRepository $conversationMessageRepository,
        InputValidationService $validationService,
        ProfanityFilterService $profanityFilter,
        EntityManagerInterface $entityManager
    ): Response {
        $currentUser = $this->requireMessagingUser();
        $conversation = $conversationRepository->findOneVisibleForUser($id, $currentUser);

        if (!$conversation instanceof Conversation) {
            throw $this->createNotFoundException('Conversation not found.');
        }

        $draftMessage = (string) $request->request->get('content', '');
        $messageErrors = [];
        $validation = $validationService->validateMessageContent($draftMessage);

        if (!$validation['valid']) {
            $messageErrors['content'] = $validation['message'];
        }

        if ($profanityFilter->containsProfanity($draftMessage)) {
            $messageErrors['profanity'] = 'Your message contains inappropriate language: ' . implode(', ', $profanityFilter->getProfanityWords($draftMessage));
        }

        $conversationMessages = $conversationMessageRepository->findByConversation($conversation);

        if (!empty($messageErrors)) {
            return $this->renderConversationWorkspace(
                $currentUser,
                $conversationRepository,
                $conversation,
                $conversationMessages,
                $messageErrors,
                $draftMessage
            );
        }

        $message = (new ConversationMessage())
            ->setSender($currentUser)
            ->setContent($draftMessage);

        $conversation->addMessage($message);
        $entityManager->persist($message);
        $entityManager->flush();

        return $this->redirectToRoute('app_messaging_show', ['id' => $conversation->getId()]);
    }

    private function renderConversationWorkspace(
        User $currentUser,
        ConversationRepository $conversationRepository,
        ?Conversation $selectedConversation = null,
        array $conversationMessages = [],
        array $messageErrors = [],
        string $draftMessage = ''
    ): Response {
        return $this->render('messaging/index.html.twig', [
            'conversations' => $conversationRepository->findByUserOrdered($currentUser),
            'selectedConversation' => $selectedConversation,
            'conversationMessages' => $conversationMessages,
            'otherParticipant' => $selectedConversation instanceof Conversation ? $selectedConversation->getOtherParticipant($currentUser) : null,
            'canStartConversation' => $currentUser->hasRoleCode(User::ROLE_CODE_CLIENT),
            'messageErrors' => $messageErrors,
            'draftMessage' => $draftMessage,
        ]);
    }

    private function requireMessagingUser(): User
    {
        $user = $this->getUser();

        if (!$user instanceof User) {
            throw $this->createAccessDeniedException('You must be signed in to continue.');
        }

        if ($user->hasRoleCode(User::ROLE_CODE_CLIENT) || $user->hasRoleCode(User::ROLE_CODE_FOURNISSEUR)) {
            return $user;
        }

        throw $this->createAccessDeniedException('Only clients and fournisseurs can access messaging.');
    }

    private function requireClient(): User
    {
        $user = $this->requireMessagingUser();

        if ($user->hasRoleCode(User::ROLE_CODE_CLIENT)) {
            return $user;
        }

        throw $this->createAccessDeniedException('Only clients can start a new conversation.');
    }

    private function isAvailableSupplier(User $user): bool
    {
        return $user->hasRoleCode(User::ROLE_CODE_FOURNISSEUR) && !$user->getProduits()->isEmpty();
    }

    private function getFallbackEmojiPayload(): array
    {
        return [
            ['name' => 'grinning face', 'unicode' => ['U+1F600']],
            ['name' => 'beaming face', 'unicode' => ['U+1F601']],
            ['name' => 'tears of joy', 'unicode' => ['U+1F602']],
            ['name' => 'smiling face', 'unicode' => ['U+1F60A']],
            ['name' => 'heart eyes', 'unicode' => ['U+1F60D']],
            ['name' => 'kiss face', 'unicode' => ['U+1F618']],
            ['name' => 'cool face', 'unicode' => ['U+1F60E']],
            ['name' => 'hugging face', 'unicode' => ['U+1F917']],
            ['name' => 'thinking face', 'unicode' => ['U+1F914']],
            ['name' => 'relieved face', 'unicode' => ['U+1F605']],
            ['name' => 'slightly smiling face', 'unicode' => ['U+1F642']],
            ['name' => 'raising hands', 'unicode' => ['U+1F64C']],
            ['name' => 'clapping hands', 'unicode' => ['U+1F44F']],
            ['name' => 'thumbs up', 'unicode' => ['U+1F44D']],
            ['name' => 'folded hands', 'unicode' => ['U+1F64F']],
            ['name' => 'fire', 'unicode' => ['U+1F525']],
            ['name' => 'star', 'unicode' => ['U+2B50']],
            ['name' => 'red heart', 'unicode' => ['U+2764', 'U+FE0F']],
            ['name' => 'party popper', 'unicode' => ['U+1F389']],
            ['name' => 'delivery truck', 'unicode' => ['U+1F69A']],
        ];
    }
}
