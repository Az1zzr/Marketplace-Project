<?php

namespace App\Controller;

use App\Entity\Feedback;
use App\Entity\LigneCommande;
use App\Entity\Reponse;
use App\Entity\User;
use App\Repository\FeedbackRepository;
use App\Repository\LigneCommandeRepository;
use App\Repository\LivraisonRepository;
use App\Repository\ReponseRepository;
use App\Service\ProfanityFilterService;
use App\Service\AISentimentService;
use App\Service\InputValidationService;
use App\Service\SpellCheckerService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FeedbackController extends AbstractController
{
    #[Route('/feedback', name: 'app_feedback_index')]
    public function index(
        Request $request,
        FeedbackRepository $feedbackRepository,
        AISentimentService $sentimentAnalyzer,
        LigneCommandeRepository $ligneCommandeRepository
    ): Response {
        $currentUser = $this->getUser();
        $search = $request->query->get('search', '');
        $sort = $request->query->get('sort', 'dateStatut');
        $order = $request->query->get('order', 'desc');
        $sentimentFilter = $request->query->get('sentiment', '');
        $ratingFilter = $request->query->get('rating', '');

        $validSorts = ['dateStatut', 'note', 'commentaire', 'titre'];
        $sort = in_array($sort, $validSorts) ? $sort : 'dateStatut';
        $order = in_array($order, ['asc', 'desc']) ? $order : 'desc';

        $feedbacks = $feedbackRepository->findBySearchAndSort($search, $sort, $order, $currentUser instanceof User ? $currentUser : null);

        $feedbacksWithSentiment = [];
        foreach ($feedbacks as $feedback) {
            $sentiment = $sentimentAnalyzer->analyze($feedback->getCommentaire());
            
            if ($sentimentFilter && $sentiment['sentiment'] !== $sentimentFilter) {
                continue;
            }
            if ($ratingFilter && $feedback->getNote() != (int)$ratingFilter) {
                continue;
            }
            
            $feedbacksWithSentiment[] = [
                'feedback' => $feedback,
                'sentiment' => $sentiment,
            ];
        }

        return $this->render('feedback/index.html.twig', [
            'feedbacksWithSentiment' => $feedbacksWithSentiment,
            'search' => $search,
            'sort' => $sort,
            'order' => $order,
            'sentimentFilter' => $sentimentFilter,
            'ratingFilter' => $ratingFilter,
            'hasEligibleProductFeedback' => $currentUser instanceof User && [] !== $ligneCommandeRepository->findEligibleFeedbackItemsForUser($currentUser),
        ]);
    }

    #[Route('/feedback/new/{ligneCommandeId}', name: 'app_feedback_new', defaults: ['ligneCommandeId' => null], requirements: ['ligneCommandeId' => '\d+'])]
    public function new(
        ?int $ligneCommandeId,
        Request $request,
        EntityManagerInterface $entityManager,
        ProfanityFilterService $profanityFilter,
        InputValidationService $validationService,
        LigneCommandeRepository $ligneCommandeRepository
    ): Response {
        $this->denyUnlessBuyer();
        $currentUser = $this->requireCurrentUser();

        $errors = [];
        $availableFeedbackItems = $ligneCommandeRepository->findEligibleFeedbackItemsForUser($currentUser);
        if ([] === $availableFeedbackItems) {
            $this->addFlash('error', 'Feedback is available only after one of your purchased products has been delivered.');
            return $this->redirectToRoute('app_produit_index');
        }

        $selectedLine = $this->resolveSelectedFeedbackLine($ligneCommandeRepository, $currentUser, $ligneCommandeId, $request);
        if (!$selectedLine && 1 === count($availableFeedbackItems)) {
            $selectedLine = $availableFeedbackItems[0];
        }

        if ($request->isMethod('POST')) {
            $title = (string) $request->request->get('titre', '');
            $commentaire = $request->request->get('commentaire');
            $note = $request->request->get('note');
            $ambiance = $request->request->get('ambiance');
            $recommande = $request->request->get('recommande');

            $errors = $this->validateFeedbackSubmission(
                $title,
                $commentaire,
                $note,
                $ambiance,
                $recommande,
                $validationService,
                $profanityFilter
            );

            if (!$selectedLine instanceof LigneCommande) {
                $errors['ligneCommandeId'] = 'Please choose a delivered product before publishing your feedback.';
            }

            if (empty($errors)) {
                $feedback = new Feedback();
                $this->fillFeedbackFromRequest($feedback, $title, $commentaire, $note, $ambiance, $recommande, $currentUser, true);
                $feedback->setProduit($selectedLine->getProduit());
                $feedback->setLigneCommande($selectedLine);
                $selectedLine->setFeedback($feedback);

                $entityManager->persist($feedback);
                $entityManager->flush();

                $this->addFlash('success', 'Feedback created successfully!');
                return $this->redirectToRoute('app_produit_show', ['id' => $selectedLine->getProduit()?->getId()]);
            }
        }

        return $this->render('feedback/new.html.twig', [
            'availableFeedbackItems' => $availableFeedbackItems,
            'delivery' => null,
            'errors' => $errors,
            'feedbackType' => 'product',
            'selectedLine' => $selectedLine,
        ]);
    }

    #[Route('/feedback/livraison/{livraisonId}/new', name: 'app_feedback_delivery_new', requirements: ['livraisonId' => '\d+'])]
    public function newDeliveryFeedback(
        int $livraisonId,
        Request $request,
        LivraisonRepository $livraisonRepository,
        EntityManagerInterface $entityManager,
        ProfanityFilterService $profanityFilter,
        InputValidationService $validationService
    ): Response {
        $this->denyUnlessBuyer();
        $currentUser = $this->requireCurrentUser();

        $livraison = $livraisonRepository->findOneVisibleForUser($livraisonId, $currentUser);
        if (!$livraison || $livraison->getCommande()?->getClientUser()?->getId() !== $currentUser->getId()) {
            throw $this->createNotFoundException('Delivery not found');
        }

        if ($livraison->getStatutLivraison() !== \App\Entity\Livraison::STATUS_DELIVERED) {
            $this->addFlash('error', 'You can review the delivery driver only after the delivery is marked as delivered.');
            return $this->redirectToRoute('app_commande_show', ['id' => $livraison->getCommande()?->getIdCommande()]);
        }

        if ($livraison->getFeedback()) {
            return $this->redirectToRoute('app_feedback_show', ['id' => $livraison->getFeedback()->getId()]);
        }

        $errors = [];
        if ($request->isMethod('POST')) {
            $title = (string) $request->request->get('titre', '');
            $commentaire = $request->request->get('commentaire');
            $note = $request->request->get('note');
            $ambiance = $request->request->get('ambiance');
            $recommande = $request->request->get('recommande');

            $errors = $this->validateFeedbackSubmission(
                $title,
                $commentaire,
                $note,
                $ambiance,
                $recommande,
                $validationService,
                $profanityFilter
            );

            if (empty($errors)) {
                $feedback = new Feedback();
                $this->fillFeedbackFromRequest($feedback, $title, $commentaire, $note, $ambiance, $recommande, $currentUser, true);
                $feedback->setLivraison($livraison);
                $livraison->setFeedback($feedback);

                $entityManager->persist($feedback);
                $entityManager->flush();

                $this->addFlash('success', 'Delivery feedback created successfully.');
                return $this->redirectToRoute('app_commande_show', ['id' => $livraison->getCommande()?->getIdCommande()]);
            }
        }

        return $this->render('feedback/new.html.twig', [
            'availableFeedbackItems' => [],
            'delivery' => $livraison,
            'errors' => $errors,
            'feedbackType' => 'delivery',
            'selectedLine' => null,
        ]);
    }

    #[Route('/feedback/{id}/edit', name: 'app_feedback_edit')]
    public function edit(
        int $id,
        Request $request,
        FeedbackRepository $feedbackRepository,
        EntityManagerInterface $entityManager,
        ProfanityFilterService $profanityFilter,
        InputValidationService $validationService
    ): Response {
        $feedback = $feedbackRepository->find($id);

        if (!$feedback) {
            throw $this->createNotFoundException('Feedback not found');
        }

        $this->denyUnlessFeedbackAuthorOrAdmin($feedback);

        $errors = [];

        if ($request->isMethod('POST')) {
            $title = (string) $request->request->get('titre', '');
            $commentaire = $request->request->get('commentaire');
            $note = $request->request->get('note');
            $ambiance = $request->request->get('ambiance');
            $recommande = $request->request->get('recommande');

            $errors = $this->validateFeedbackSubmission(
                $title,
                $commentaire,
                $note,
                $ambiance,
                $recommande,
                $validationService,
                $profanityFilter
            );

            if (empty($errors)) {
                $this->fillFeedbackFromRequest($feedback, $title, $commentaire, $note, $ambiance, $recommande, $feedback->getAuteur(), false);

                $entityManager->flush();

                $this->addFlash('success', 'Feedback updated successfully!');
                return $this->redirectToRoute('app_feedback_show', ['id' => $feedback->getId()]);
            }
        }

        return $this->render('feedback/edit.html.twig', [
            'feedback' => $feedback,
            'errors' => $errors,
        ]);
    }

    #[Route('/feedback/{id}/delete', name: 'app_feedback_delete')]
    public function delete(int $id, FeedbackRepository $feedbackRepository, EntityManagerInterface $entityManager): Response
    {
        $feedback = $feedbackRepository->find($id);

        if (!$feedback) {
            throw $this->createNotFoundException('Feedback not found');
        }

        $this->denyUnlessFeedbackAuthorOrAdmin($feedback);

        $entityManager->remove($feedback);
        $entityManager->flush();

        $this->addFlash('success', 'Feedback deleted successfully!');
        return $this->redirectToRoute('app_feedback_index');
    }

    #[Route('/feedback/{id}', name: 'app_feedback_show')]
    public function show(
        int $id,
        FeedbackRepository $feedbackRepository,
        ReponseRepository $reponseRepository,
        AISentimentService $sentimentAnalyzer
    ): Response {
        $feedback = $feedbackRepository->find($id);

        if (!$feedback) {
            throw $this->createNotFoundException('Feedback not found');
        }

        $reponses = $reponseRepository->findByFeedback($id);
        $sentiment = $sentimentAnalyzer->analyze($feedback->getCommentaire());

        return $this->render('feedback/show.html.twig', [
            'feedback' => $feedback,
            'reponses' => $reponses,
            'sentiment' => $sentiment,
        ]);
    }

    #[Route('/feedback/{id}/reponse/new', name: 'app_reponse_new')]
    public function addReponse(
        int $id,
        Request $request,
        FeedbackRepository $feedbackRepository,
        EntityManagerInterface $entityManager,
        ProfanityFilterService $profanityFilter,
        InputValidationService $validationService
    ): Response {
        $this->denyUnlessSupplierOrAdmin();

        $feedback = $feedbackRepository->find($id);

        if (!$feedback) {
            throw $this->createNotFoundException('Feedback not found');
        }

        $this->denyUnlessCanReplyToFeedback($feedback);

        $errors = [];

        if ($request->isMethod('POST')) {
            $contenu = $request->request->get('contenu');

            // Validate
            $result = $validationService->validateComment($contenu);
            if (!$result['valid']) {
                $errors['contenu'] = $result['message'];
            }

            // Check for profanity
            if ($profanityFilter->containsProfanity($contenu)) {
                $badWords = $profanityFilter->getProfanityWords($contenu);
                $errors['profanity'] = 'Your response contains inappropriate language: ' . implode(', ', $badWords);
            }

            if (empty($errors)) {
                $currentUser = $this->getUser();
                if (!$currentUser instanceof User) {
                    throw $this->createAccessDeniedException('You must be signed in to respond to feedback.');
                }

                $reponse = new Reponse();
                $reponse->setContenu($contenu);
                $reponse->setDateReponse(new \DateTime());
                $reponse->setFeedback($feedback);
                $reponse->setAuteur($currentUser);

                $entityManager->persist($reponse);
                $entityManager->flush();

                $this->addFlash('success', 'Response added successfully!');
                return $this->redirectToRoute('app_feedback_show', ['id' => $id]);
            }
        }

        return $this->render('feedback/reponse_new.html.twig', [
            'feedback' => $feedback,
            'errors' => $errors,
        ]);
    }

    #[Route('/reponse/{id}/delete', name: 'app_reponse_delete')]
    public function deleteReponse(int $id, ReponseRepository $reponseRepository, EntityManagerInterface $entityManager): Response
    {
        $reponse = $reponseRepository->find($id);

        if (!$reponse) {
            throw $this->createNotFoundException('Reponse not found');
        }

        $this->denyUnlessResponseAuthorOrAdmin($reponse);

        $feedbackId = $reponse->getFeedback()->getId();

        $entityManager->remove($reponse);
        $entityManager->flush();

        $this->addFlash('success', 'Response deleted successfully!');
        return $this->redirectToRoute('app_feedback_show', ['id' => $feedbackId]);
    }

    #[Route('/api/spellcheck', name: 'api_spellcheck', methods: ['POST'])]
    public function spellCheck(Request $request, SpellCheckerService $spellChecker): JsonResponse
    {
        $text = $request->request->get('text', '');
        
        $result = $spellChecker->check($text, 'fr');

        return $this->json($result);
    }

    private function denyUnlessBuyer(): void
    {
        if ($this->isGranted('ROLE_CLIENT')) {
            return;
        }

        throw $this->createAccessDeniedException('Only clients can create feedback.');
    }

    private function denyUnlessSupplierOrAdmin(): void
    {
        if ($this->isGranted('ROLE_ADMIN') || $this->isGranted('ROLE_FOURNISSEUR')) {
            return;
        }

        throw $this->createAccessDeniedException('Only admins and fournisseurs can reply to feedback.');
    }

    private function denyUnlessCanReplyToFeedback(Feedback $feedback): void
    {
        if ($this->isGranted('ROLE_ADMIN')) {
            return;
        }

        $currentUser = $this->getUser();
        if ($currentUser instanceof User) {
            if ($feedback->getProduit()?->getFournisseur()?->getId() === $currentUser->getId()) {
                return;
            }

            if ($feedback->getLivraison()) {
                foreach ($feedback->getLivraison()->getCommande()?->getLignesCommande() ?? [] as $ligneCommande) {
                    if ($ligneCommande->getProduit()?->getFournisseur()?->getId() === $currentUser->getId()) {
                        return;
                    }
                }
            }
        }

        throw $this->createAccessDeniedException('You can only reply to feedback related to your own delivered orders or products.');
    }

    private function denyUnlessFeedbackAuthorOrAdmin(Feedback $feedback): void
    {
        if ($this->isGranted('ROLE_ADMIN')) {
            return;
        }

        $currentUser = $this->getUser();
        if ($currentUser instanceof User && $feedback->getAuteur()?->getId() === $currentUser->getId()) {
            return;
        }

        throw $this->createAccessDeniedException('You can only manage your own feedback.');
    }

    private function denyUnlessResponseAuthorOrAdmin(Reponse $reponse): void
    {
        if ($this->isGranted('ROLE_ADMIN')) {
            return;
        }

        $currentUser = $this->getUser();
        if ($currentUser instanceof User && $reponse->getAuteur()?->getId() === $currentUser->getId()) {
            return;
        }

        throw $this->createAccessDeniedException('You can only delete your own responses.');
    }

    private function requireCurrentUser(): User
    {
        $user = $this->getUser();
        if (!$user instanceof User) {
            throw $this->createAccessDeniedException('You must be signed in to continue.');
        }

        return $user;
    }

    private function resolveSelectedFeedbackLine(
        LigneCommandeRepository $ligneCommandeRepository,
        User $currentUser,
        ?int $routeLineId,
        Request $request
    ): ?LigneCommande {
        $selectedLineId = $routeLineId;
        if (null === $selectedLineId) {
            $requestValue = $request->request->get('ligneCommandeId');
            if (null === $requestValue || '' === $requestValue) {
                $requestValue = $request->query->get('ligneCommandeId');
            }

            $selectedLineId = ctype_digit((string) $requestValue) ? (int) $requestValue : null;
        }

        if (null === $selectedLineId) {
            return null;
        }

        return $ligneCommandeRepository->findEligibleFeedbackItemForUser($currentUser, $selectedLineId);
    }

    private function validateFeedbackSubmission(
        string $title,
        ?string $commentaire,
        ?string $note,
        ?string $ambiance,
        ?string $recommande,
        InputValidationService $validationService,
        ProfanityFilterService $profanityFilter
    ): array {
        $errors = [];

        $result = $validationService->validateFeedbackTitle($title);
        if (!$result['valid']) {
            $errors['titre'] = $result['message'];
        }

        $result = $validationService->validateFeedbackComment($commentaire);
        if (!$result['valid']) {
            $errors['commentaire'] = $result['message'];
        }

        $result = $validationService->validateNote($note);
        if (!$result['valid']) {
            $errors['note'] = $result['message'];
        }

        $result = $validationService->validateFeedbackMood($ambiance);
        if (!$result['valid']) {
            $errors['ambiance'] = $result['message'];
        }

        $result = $validationService->validateRecommendation($recommande);
        if (!$result['valid']) {
            $errors['recommande'] = $result['message'];
        }

        if ($commentaire !== null && $profanityFilter->containsProfanity($commentaire)) {
            $badWords = $profanityFilter->getProfanityWords($commentaire);
            $errors['profanity'] = 'Your comment contains inappropriate language: ' . implode(', ', $badWords);
        }

        return $errors;
    }

    private function fillFeedbackFromRequest(
        Feedback $feedback,
        string $title,
        ?string $commentaire,
        ?string $note,
        ?string $ambiance,
        ?string $recommande,
        ?User $auteur,
        bool $refreshDate
    ): void {
        $feedback
            ->setTitre($title)
            ->setCommentaire((string) $commentaire)
            ->setNote((string) $note)
            ->setAmbiance($ambiance)
            ->setRecommande('yes' === $recommande)
            ->setAuteur($auteur);

        if ($refreshDate) {
            $feedback->setDateStatut(new \DateTime());
        }
    }
}
