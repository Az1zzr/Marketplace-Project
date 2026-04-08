<?php

namespace App\Controller;

use App\Entity\Feedback;
use App\Entity\Reponse;
use App\Repository\FeedbackRepository;
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
        FeedbackRepository $feedbackRepository,
        AISentimentService $sentimentAnalyzer
    ): Response {
        $feedbacks = $feedbackRepository->findAll();

        $feedbacksWithSentiment = [];
        foreach ($feedbacks as $feedback) {
            $sentiment = $sentimentAnalyzer->analyze($feedback->getCommentaire());
            $feedbacksWithSentiment[] = [
                'feedback' => $feedback,
                'sentiment' => $sentiment,
            ];
        }

        return $this->render('feedback/index.html.twig', [
            'feedbacksWithSentiment' => $feedbacksWithSentiment,
        ]);
    }

    #[Route('/feedback/new', name: 'app_feedback_new')]
    public function new(
        Request $request,
        EntityManagerInterface $entityManager,
        ProfanityFilterService $profanityFilter,
        InputValidationService $validationService
    ): Response {
        $errors = [];

        if ($request->isMethod('POST')) {
            $commentaire = $request->request->get('commentaire');
            $note = $request->request->get('note');

            // Validate inputs
            $errors = [];

            $result = $validationService->validateComment($commentaire);
            if (!$result['valid']) {
                $errors['commentaire'] = $result['message'];
            }

            $result = $validationService->validateNote($note);
            if (!$result['valid']) {
                $errors['note'] = $result['message'];
            }

            // Check for profanity
            if ($profanityFilter->containsProfanity($commentaire)) {
                $badWords = $profanityFilter->getProfanityWords($commentaire);
                $errors['profanity'] = 'Your comment contains inappropriate language: ' . implode(', ', $badWords);
            }

            if (empty($errors)) {
                $feedback = new Feedback();
                $feedback->setCommentaire($commentaire);
                $feedback->setNote($note);
                $feedback->setDateStatut(new \DateTime());

                $entityManager->persist($feedback);
                $entityManager->flush();

                $this->addFlash('success', 'Feedback created successfully!');
                return $this->redirectToRoute('app_feedback_index');
            }
        }

        return $this->render('feedback/new.html.twig', [
            'errors' => $errors,
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

        $errors = [];

        if ($request->isMethod('POST')) {
            $commentaire = $request->request->get('commentaire');
            $note = $request->request->get('note');

            // Validate
            $result = $validationService->validateComment($commentaire);
            if (!$result['valid']) {
                $errors['commentaire'] = $result['message'];
            }

            $result = $validationService->validateNote($note);
            if (!$result['valid']) {
                $errors['note'] = $result['message'];
            }

            // Check for profanity
            if ($profanityFilter->containsProfanity($commentaire)) {
                $badWords = $profanityFilter->getProfanityWords($commentaire);
                $errors['profanity'] = 'Your comment contains inappropriate language: ' . implode(', ', $badWords);
            }

            if (empty($errors)) {
                $feedback->setCommentaire($commentaire);
                $feedback->setNote($note);

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

            // Check for profanity
            if ($profanityFilter->containsProfanity($contenu)) {
                $badWords = $profanityFilter->getProfanityWords($contenu);
                $errors['profanity'] = 'Your response contains inappropriate language: ' . implode(', ', $badWords);
            }

            if (empty($errors)) {
                $reponse = new Reponse();
                $reponse->setContenu($contenu);
                $reponse->setDateReponse(new \DateTime());
                $reponse->setFeedback($feedback);

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
}
