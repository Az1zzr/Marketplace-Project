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
use App\Service\AISentimentService;
use App\Service\FeedbackModerationService;
use App\Service\FeedbackInsightService;
use App\Service\InputValidationService;
use App\Service\SpellCheckerService;
use Dompdf\Dompdf;
use Dompdf\Options;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\HeaderUtils;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\UX\Chartjs\Builder\ChartBuilderInterface;
use Symfony\UX\Chartjs\Model\Chart;

class FeedbackController extends AbstractController
{
    #[Route('/feedback', name: 'app_feedback_index')]
    public function index(
        Request $request,
        FeedbackRepository $feedbackRepository,
        AISentimentService $sentimentAnalyzer,
        FeedbackInsightService $feedbackInsightService,
        ChartBuilderInterface $chartBuilder,
        LigneCommandeRepository $ligneCommandeRepository
    ): Response {
        $currentUser = $this->getUser();
        $listing = $this->buildFeedbackListingViewModel(
            $request,
            $currentUser instanceof User ? $currentUser : null,
            $feedbackRepository,
            $sentimentAnalyzer,
            $feedbackInsightService
        );

        return $this->render('feedback/index.html.twig', [
            ...$listing,
            ...$this->buildFeedbackCharts($listing['feedbacksWithSentiment'], $chartBuilder),
            'hasEligibleProductFeedback' => $currentUser instanceof User && [] !== $ligneCommandeRepository->findEligibleFeedbackItemsForUser($currentUser),
        ]);
    }

    #[Route('/feedback/export/pdf', name: 'app_feedback_export_pdf', methods: ['GET'])]
    public function exportPdf(
        Request $request,
        FeedbackRepository $feedbackRepository,
        AISentimentService $sentimentAnalyzer,
        FeedbackInsightService $feedbackInsightService
    ): Response {
        $currentUser = $this->requireCurrentUser();
        if (!$this->canCurrentUserSeeFeedbackAnalysis($currentUser)) {
            throw $this->createAccessDeniedException('Only admin and fournisseur can export feedback analysis.');
        }

        $listing = $this->buildFeedbackListingViewModel(
            $request,
            $currentUser,
            $feedbackRepository,
            $sentimentAnalyzer,
            $feedbackInsightService
        );

        $html = $this->renderView('feedback/export_pdf.html.twig', [
            ...$listing,
            'viewer' => $currentUser,
            'generatedAt' => new \DateTimeImmutable(),
        ]);

        $options = new Options();
        $options->set('isRemoteEnabled', false);
        $options->set('isHtml5ParserEnabled', true);

        $dompdf = new Dompdf($options);
        $dompdf->loadHtml($html, 'UTF-8');
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();

        $filename = sprintf(
            'feedbacks-%s-%s.pdf',
            $currentUser->hasRoleCode(User::ROLE_CODE_ADMIN) ? 'admin' : 'fournisseur',
            (new \DateTimeImmutable())->format('Ymd-His')
        );

        return new Response($dompdf->output(), Response::HTTP_OK, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => HeaderUtils::makeDisposition(HeaderUtils::DISPOSITION_ATTACHMENT, $filename),
        ]);
    }

    #[Route('/feedback/new/{ligneCommandeId}', name: 'app_feedback_new', defaults: ['ligneCommandeId' => null], requirements: ['ligneCommandeId' => '\d+'])]
    public function new(
        ?int $ligneCommandeId,
        Request $request,
        EntityManagerInterface $entityManager,
        FeedbackModerationService $feedbackModeration,
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
                $feedbackModeration
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
        FeedbackModerationService $feedbackModeration,
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
                $feedbackModeration
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
        FeedbackModerationService $feedbackModeration,
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
                $feedbackModeration
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
        AISentimentService $sentimentAnalyzer,
        FeedbackInsightService $feedbackInsightService
    ): Response {
        $feedback = $feedbackRepository->find($id);

        if (!$feedback) {
            throw $this->createNotFoundException('Feedback not found');
        }

        $reponses = $reponseRepository->findByFeedback($id);
        $sentiment = $sentimentAnalyzer->analyze($feedback->getCommentaire());
        $currentUser = $this->getUser();
        $canSeeInsights = $currentUser instanceof User && $this->canCurrentUserSeeFeedbackAnalysis($currentUser);

        return $this->render('feedback/show.html.twig', [
            'feedback' => $feedback,
            'reponses' => $reponses,
            'sentiment' => $sentiment,
            'insight' => $canSeeInsights ? $feedbackInsightService->analyze($feedback, $sentiment) : null,
            'canSeeInsights' => $canSeeInsights,
        ]);
    }

    #[Route('/feedback/{id}/reponse/new', name: 'app_reponse_new')]
    public function addReponse(
        int $id,
        Request $request,
        FeedbackRepository $feedbackRepository,
        EntityManagerInterface $entityManager,
        FeedbackModerationService $feedbackModeration,
        InputValidationService $validationService
    ): Response {
        $currentUser = $this->requireCurrentUser();

        $feedback = $feedbackRepository->find($id);

        if (!$feedback) {
            throw $this->createNotFoundException('Feedback not found');
        }

        $errors = [];

        if ($request->isMethod('POST')) {
            $contenu = $request->request->get('contenu');

            // Validate
            $result = $validationService->validateComment($contenu);
            if (!$result['valid']) {
                $errors['contenu'] = $result['message'];
            }

            $moderation = $feedbackModeration->moderate($contenu);
            if ($moderation['flagged']) {
                $errors['profanity'] = $feedbackModeration->buildErrorMessage($moderation, 'response');
            }

            if (empty($errors)) {
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
        $language = (string) $request->request->get('language', 'auto');
        if (!in_array($language, ['auto', 'fr', 'en-US', 'en-GB'], true)) {
            $language = 'auto';
        }
        
        $result = $spellChecker->check($text, $language);

        return $this->json($result);
    }

    #[Route('/api/feedback/moderation', name: 'api_feedback_moderation', methods: ['POST'])]
    public function checkFeedbackModeration(Request $request, FeedbackModerationService $feedbackModeration): JsonResponse
    {
        $fieldLabel = (string) $request->request->get('fieldLabel', 'comment');
        if (!in_array($fieldLabel, ['comment', 'response'], true)) {
            $fieldLabel = 'comment';
        }

        $moderation = $feedbackModeration->moderate((string) $request->request->get('text', ''));
        $flagged = (bool) ($moderation['flagged'] ?? false);

        return $this->json([
            'allowed' => !$flagged,
            'flagged' => $flagged,
            'message' => $flagged ? $feedbackModeration->buildErrorMessage($moderation, $fieldLabel) : null,
            'source' => $moderation['source'] ?? null,
            'score' => $moderation['score'] ?? null,
            'threshold' => $moderation['threshold'] ?? null,
        ]);
    }

    private function denyUnlessBuyer(): void
    {
        if ($this->isGranted('ROLE_CLIENT')) {
            return;
        }

        throw $this->createAccessDeniedException('Only clients can create feedback.');
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

    private function canCurrentUserSeeFeedbackAnalysis(User $currentUser): bool
    {
        return $currentUser->hasRoleCode(User::ROLE_CODE_ADMIN)
            || $currentUser->hasRoleCode(User::ROLE_CODE_FOURNISSEUR);
    }

    private function buildFeedbackListingViewModel(
        Request $request,
        ?User $currentUser,
        FeedbackRepository $feedbackRepository,
        AISentimentService $sentimentAnalyzer,
        FeedbackInsightService $feedbackInsightService
    ): array {
        $canSeeInsights = $currentUser instanceof User && $this->canCurrentUserSeeFeedbackAnalysis($currentUser);
        $search = (string) $request->query->get('search', '');
        $sort = (string) $request->query->get('sort', 'dateStatut');
        $order = (string) $request->query->get('order', 'desc');
        $sentimentFilter = (string) $request->query->get('sentiment', '');
        $ratingFilter = (string) $request->query->get('rating', '');
        $topicFilter = $canSeeInsights ? (string) $request->query->get('topic', '') : '';
        $priorityFilter = $canSeeInsights ? (string) $request->query->get('priority', '') : '';
        $attentionFilter = $canSeeInsights ? (string) $request->query->get('attention', '') : '';

        $validSorts = ['dateStatut', 'note', 'commentaire', 'titre'];
        $sort = in_array($sort, $validSorts, true) ? $sort : 'dateStatut';
        $order = in_array($order, ['asc', 'desc'], true) ? $order : 'desc';

        $feedbacks = $feedbackRepository->findBySearchAndSort($search, $sort, $order, $currentUser);
        $feedbacksWithSentiment = [];

        foreach ($feedbacks as $feedback) {
            $sentiment = $sentimentAnalyzer->analyze($feedback->getCommentaire());
            $insight = $feedbackInsightService->analyze($feedback, $sentiment);

            if ('' !== $sentimentFilter && $sentiment['sentiment'] !== $sentimentFilter) {
                continue;
            }

            if ('' !== $ratingFilter && $feedback->getNote() !== $ratingFilter) {
                continue;
            }

            if ($canSeeInsights && !$feedbackInsightService->matchesFilters($insight, $topicFilter, $priorityFilter, $attentionFilter)) {
                continue;
            }

            $feedbacksWithSentiment[] = [
                'feedback' => $feedback,
                'sentiment' => $sentiment,
                'insight' => $insight,
            ];
        }

        return [ 
            'feedbacksWithSentiment' => $feedbacksWithSentiment,
            'feedbackInsightsSummary' => $canSeeInsights ? $feedbackInsightService->summarize($feedbacksWithSentiment) : null,
            'search' => $search,
            'sort' => $sort,
            'order' => $order,
            'sentimentFilter' => $sentimentFilter,
            'ratingFilter' => $ratingFilter,
            'topicFilter' => $topicFilter,
            'priorityFilter' => $priorityFilter,
            'attentionFilter' => $attentionFilter,
            'topicChoices' => $feedbackInsightService->getTopicChoices(),
            'priorityChoices' => $feedbackInsightService->getPriorityChoices(),
            'canSeeInsights' => $canSeeInsights,
        ];
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
        FeedbackModerationService $feedbackModeration
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

        if ($commentaire !== null) {
            $moderation = $feedbackModeration->moderate($commentaire);
            if ($moderation['flagged']) {
                $errors['profanity'] = $feedbackModeration->buildErrorMessage($moderation, 'comment');
            }
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

    private function buildFeedbackCharts(array $feedbacksWithSentiment, ChartBuilderInterface $chartBuilder): array
    {
        if ([] === $feedbacksWithSentiment) {
            return [
                'feedbackSentimentChart' => null,
                'feedbackTopicChart' => null,
            ];
        }

        $sentimentCounts = [
            'POSITIF' => 0,
            'NEUTRE' => 0,
            'NEGATIF' => 0,
        ];
        $topicCounts = [];

        foreach ($feedbacksWithSentiment as $item) {
            $sentiment = (string) ($item['sentiment']['sentiment'] ?? 'NEUTRE');
            if (isset($sentimentCounts[$sentiment])) {
                ++$sentimentCounts[$sentiment];
            }

            $topicLabel = (string) ($item['insight']['topicLabel'] ?? 'General');
            $topicCounts[$topicLabel] = ($topicCounts[$topicLabel] ?? 0) + 1;
        }

        $sentimentChart = $chartBuilder->createChart(Chart::TYPE_DOUGHNUT);
        $sentimentChart->setData([
            'labels' => array_keys($sentimentCounts),
            'datasets' => [[
                'label' => 'Feedback sentiment',
                'data' => array_values($sentimentCounts),
                'backgroundColor' => ['#16a34a', '#64748b', '#dc2626'],
                'borderWidth' => 0,
            ]],
        ]);
        $sentimentChart->setOptions([
            'plugins' => [
                'legend' => ['position' => 'bottom'],
            ],
            'maintainAspectRatio' => false,
        ]);

        $topicChart = $chartBuilder->createChart(Chart::TYPE_BAR);
        $topicChart->setData([
            'labels' => array_keys($topicCounts),
            'datasets' => [[
                'label' => 'Visible feedback topics',
                'data' => array_values($topicCounts),
                'backgroundColor' => '#2563eb',
                'borderRadius' => 10,
            ]],
        ]);
        $topicChart->setOptions([
            'plugins' => [
                'legend' => ['display' => false],
            ],
            'scales' => [
                'y' => [
                    'beginAtZero' => true,
                    'ticks' => ['precision' => 0],
                ],
            ],
            'maintainAspectRatio' => false,
        ]);

        return [
            'feedbackSentimentChart' => $sentimentChart,
            'feedbackTopicChart' => $topicChart,
        ];
    }
}
