<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\RegisterType;
use App\Repository\CategorieRepository;
use App\Repository\CommandeRepository;
use App\Repository\FeedbackRepository;
use App\Repository\ProduitRepository;
use App\Repository\UserRepository;
use App\Service\AISentimentService;
use App\Service\FeedbackInsightService;
use Doctrine\DBAL\Exception\UniqueConstraintViolationException;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\FormError;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class SecurityController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function home(): Response
    {
        $user = $this->getUser();
        if (!$user instanceof User) {
            return $this->redirectToRoute('app_login');
        }

        if ($this->isGranted('ROLE_ADMIN')) {
            return $this->redirectToRoute('app_admin_dashboard');
        }

        return $this->redirectToRoute('app_front_dashboard');
    }

    #[Route('/admin', name: 'app_admin_dashboard')]
    public function adminDashboard(
        ProduitRepository $produitRepository,
        CommandeRepository $commandeRepository,
        FeedbackRepository $feedbackRepository,
        UserRepository $userRepository,
        AISentimentService $sentimentAnalyzer,
        FeedbackInsightService $feedbackInsightService
    ): Response {
        $this->denyAccessUnlessGranted('ROLE_ADMIN');

        $feedbackInsights = $this->buildFeedbackInsightsSummary(
            $feedbackRepository->findBySearchAndSort('', 'dateStatut', 'desc'),
            $sentimentAnalyzer,
            $feedbackInsightService
        );

        return $this->render('dashboard/admin.html.twig', [
            'stats' => [
                'products' => $produitRepository->count([]),
                'orders' => $commandeRepository->count([]),
                'feedbacks' => $feedbackRepository->count([]),
                'users' => $userRepository->count([]),
            ],
            'feedbackInsights' => $feedbackInsights,
        ]);
    }

    #[Route('/front', name: 'app_front_dashboard')]
    public function frontDashboard(
        CategorieRepository $categorieRepository,
        ProduitRepository $produitRepository,
        CommandeRepository $commandeRepository,
        FeedbackRepository $feedbackRepository,
        AISentimentService $sentimentAnalyzer,
        FeedbackInsightService $feedbackInsightService
    ): Response {
        $user = $this->getUser();
        if (!$user instanceof User) {
            return $this->redirectToRoute('app_login');
        }

        if ($this->isGranted('ROLE_ADMIN')) {
            return $this->redirectToRoute('app_admin_dashboard');
        }

        $productsCount = $produitRepository->count([]);
        $ordersCount = $commandeRepository->count([]);
        $feedbackCount = $feedbackRepository->count([]);
        $feedbackInsights = null;

        if ($user->hasRoleCode(User::ROLE_CODE_FOURNISSEUR)) {
            $productsCount = count($produitRepository->findBySearchAndSort('', 'nomProduit', 'asc', null, $user));
            $ordersCount = count($commandeRepository->findBySearchAndSortForUser($user, '', 'dateCommande', 'desc', null));
            $supplierFeedbacks = $feedbackRepository->findBySearchAndSort('', 'dateStatut', 'desc', $user);
            $feedbackCount = count($supplierFeedbacks);
            $feedbackInsights = $this->buildFeedbackInsightsSummary($supplierFeedbacks, $sentimentAnalyzer, $feedbackInsightService);
        } elseif ($user->hasRoleCode(User::ROLE_CODE_CLIENT)) {
            $ordersCount = count($commandeRepository->findBySearchAndSortForUser($user, '', 'dateCommande', 'desc', null));
        }

        return $this->render('dashboard/front.html.twig', [
            'stats' => [
                'products' => $productsCount,
                'orders' => $ordersCount,
                'feedbacks' => $feedbackCount,
                'categories' => $categorieRepository->count([]),
            ],
            'feedbackInsights' => $feedbackInsights,
            'roleCode' => $user->getRoleCode(),
        ]);
    }

    private function buildFeedbackInsightsSummary(
        array $feedbacks,
        AISentimentService $sentimentAnalyzer,
        FeedbackInsightService $feedbackInsightService
    ): array {
        $feedbacksWithInsights = [];

        foreach ($feedbacks as $feedback) {
            $sentiment = $sentimentAnalyzer->analyze($feedback->getCommentaire());
            $feedbacksWithInsights[] = [
                'feedback' => $feedback,
                'sentiment' => $sentiment,
                'insight' => $feedbackInsightService->analyze($feedback, $sentiment),
            ];
        }

        return $feedbackInsightService->summarize($feedbacksWithInsights);
    }

    #[Route('/login', name: 'app_login')]
    public function login(AuthenticationUtils $authenticationUtils): Response
    {
        if ($this->getUser()) {
            return $this->redirectToRoute('app_home');
        }

        $error = $authenticationUtils->getLastAuthenticationError();
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('security/login.html.twig', [
            'last_username' => $lastUsername,
            'error' => $error,
        ]);
    }

    #[Route('/logout', name: 'app_logout')]
    public function logout(): void
    {
        throw new \LogicException('This method can be blank - it will be intercepted by the logout key on your firewall.');
    }

    #[Route('/register', name: 'app_register')]
    public function register(Request $request, EntityManagerInterface $entityManager, UserPasswordHasherInterface $passwordHasher): Response
    {
        if ($this->getUser()) {
            return $this->redirectToRoute('app_home');
        }

        $user = new User();
        $form = $this->createForm(RegisterType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $user->setMotDePasse($passwordHasher->hashPassword($user, $form->get('plainPassword')->getData()));

            try {
                $entityManager->persist($user);
                $entityManager->flush();
            } catch (UniqueConstraintViolationException) {
                $form->get('email')->addError(new FormError('An account with this email already exists.'));
            }

            if ($form->isValid()) {
                $this->addFlash('success', 'Your account has been created. You can now sign in.');

                return $this->redirectToRoute('app_login');
            }
        }

        return $this->render('security/register.html.twig', [
            'registrationForm' => $form->createView(),
        ]);
    }
}
