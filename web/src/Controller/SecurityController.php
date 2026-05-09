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
use App\Service\InputValidationService;
use App\Service\PasswordResetService;
use App\Service\WelcomeSmsService;
use Doctrine\DBAL\Exception\UniqueConstraintViolationException;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\FormError;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
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

        $feedbacks = $feedbackRepository->findBySearchAndSort('', 'dateStatut', 'desc');
        $feedbackInsights = $this->buildFeedbackInsightsSummary(
            $feedbacks,
            $sentimentAnalyzer,
            $feedbackInsightService,
            $feedbackRepository->countResponsesByFeedbacks($feedbacks)
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
            $feedbackInsights = $this->buildFeedbackInsightsSummary(
                $supplierFeedbacks,
                $sentimentAnalyzer,
                $feedbackInsightService,
                $feedbackRepository->countResponsesByFeedbacks($supplierFeedbacks)
            );
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
        FeedbackInsightService $feedbackInsightService,
        array $responseCounts = []
    ): array {
        $feedbacksWithInsights = [];

        foreach ($feedbacks as $feedback) {
            $sentiment = $sentimentAnalyzer->analyze($feedback->getCommentaire());
            $responseCount = $responseCounts[$feedback->getId()] ?? 0;
            $feedbacksWithInsights[] = [
                'feedback' => $feedback,
                'sentiment' => $sentiment,
                'insight' => $feedbackInsightService->analyze($feedback, $sentiment, $responseCount),
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
    public function register(
        Request $request,
        EntityManagerInterface $entityManager,
        UserPasswordHasherInterface $passwordHasher,
        InputValidationService $inputValidationService,
        UserRepository $userRepository,
        WelcomeSmsService $welcomeSmsService
    ): Response
    {
        if ($this->getUser()) {
            return $this->redirectToRoute('app_home');
        }

        $user = new User();
        $form = $this->createForm(RegisterType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted()) {
            $this->addRegistrationValidationErrors($form, $user, $inputValidationService, $userRepository);
        }

        if ($form->isSubmitted() && $form->isValid()) {
            $user->setTelephone($inputValidationService->normalizePhone($user->getTelephone()));
            $user->setMotDePasse($passwordHasher->hashPassword($user, $form->get('plainPassword')->getData()));

            try {
                $entityManager->persist($user);
                $entityManager->flush();
            } catch (UniqueConstraintViolationException) {
                $form->get('email')->addError(new FormError('An account with this email already exists.'));
            }

            if ($form->isValid()) {
                try {
                    $welcomeSmsService->sendWelcomeMessage($user);
                } catch (\Throwable) {
                    $this->addFlash('error', 'Your account was created, but the welcome SMS could not be sent right now.');
                }

                $this->addFlash('success', 'Your account has been created. You can now sign in.');

                return $this->redirectToRoute('app_login');
            }
        }

        return $this->render('security/register.html.twig', [
            'registrationForm' => $form->createView(),
        ]);
    }

    #[Route('/forgot-password', name: 'app_forgot_password')]
    public function forgotPassword(
        Request $request,
        UserRepository $userRepository,
        PasswordResetService $passwordResetService,
        EntityManagerInterface $entityManager
    ): Response {
        if ($this->getUser()) {
            return $this->redirectToRoute('app_home');
        }

        $errors = [];
        $identifier = strtolower(trim((string) $request->request->get('identifier', '')));

        if ($request->isMethod('POST')) {
            if ('' === $identifier) {
                $errors['identifier'] = 'Email address is required.';
            } elseif (false === filter_var($identifier, FILTER_VALIDATE_EMAIL)) {
                $errors['identifier'] = 'Please enter a valid email address.';
            }

            $user = empty($errors) ? $userRepository->findByEmail($identifier) : null;

            if (!$user instanceof User && empty($errors)) {
                $errors['identifier'] = 'No account matches the provided email address.';
            }

            if ($user instanceof User && empty($errors)) {
                try {
                    $token = $passwordResetService->issueResetToken($user);
                    $entityManager->flush();

                    $passwordResetService->sendResetLink(
                        $user,
                        $this->generateUrl('app_reset_password', [
                            'id' => $user->getId(),
                            'token' => $token,
                        ], UrlGeneratorInterface::ABSOLUTE_URL)
                    );
                } catch (\RuntimeException $exception) {
                    $passwordResetService->clearResetToken($user);
                    $entityManager->flush();
                    $errors['delivery'] = $exception->getMessage();
                }
            }

            if ($user instanceof User && empty($errors)) {
                $this->addFlash('success', 'We sent you a password reset link. Check your email to continue.');

                return $this->redirectToRoute('app_login');
            }
        }

        return $this->render('security/forgot_password.html.twig', [
            'errors' => $errors,
            'identifier' => $identifier,
        ]);
    }

    #[Route('/reset-password/{id}/{token}', name: 'app_reset_password', requirements: ['id' => '\\d+'])]
    public function resetPassword(
        Request $request,
        int $id,
        string $token,
        UserRepository $userRepository,
        PasswordResetService $passwordResetService,
        InputValidationService $inputValidationService,
        UserPasswordHasherInterface $passwordHasher,
        EntityManagerInterface $entityManager
    ): Response {
        if ($this->getUser()) {
            return $this->redirectToRoute('app_home');
        }

        $user = $userRepository->find($id);
        if (!$user instanceof User || !$passwordResetService->isResetTokenValid($user, $token)) {
            $this->addFlash('error', 'This password reset link is invalid or has expired.');

            return $this->redirectToRoute('app_forgot_password');
        }

        $errors = [];

        if ($request->isMethod('POST')) {
            $password = (string) $request->request->get('password', '');
            $confirmPassword = (string) $request->request->get('confirmPassword', '');

            $passwordValidation = $inputValidationService->validatePassword($password);
            if (!$passwordValidation['valid']) {
                $errors['password'] = $passwordValidation['message'];
            }

            if ($password !== $confirmPassword) {
                $errors['confirmPassword'] = 'Password confirmation does not match.';
            }

            if (empty($errors) && !$passwordResetService->isResetTokenValid($user, $token)) {
                $errors['password'] = 'This password reset link is no longer valid.';
            }

            if (empty($errors)) {
                $user->setMotDePasse($passwordHasher->hashPassword($user, $password));
                $passwordResetService->clearResetToken($user);
                $entityManager->flush();

                $this->addFlash('success', 'Your password has been reset successfully.');

                return $this->redirectToRoute('app_login');
            }
        }

        return $this->render('security/reset_password_verify.html.twig', [
            'errors' => $errors,
        ]);
    }

    private function addRegistrationValidationErrors(
        \Symfony\Component\Form\FormInterface $form,
        User $user,
        InputValidationService $inputValidationService,
        UserRepository $userRepository
    ): void {
        $emailValidation = $inputValidationService->validateEmail((string) $user->getEmail());
        if (!$emailValidation['valid']) {
            $form->get('email')->addError(new FormError($emailValidation['message']));
        }

        $birthDateValidation = $inputValidationService->validateRequiredBirthDate($user->getDateNaissance());
        if (!$birthDateValidation['valid']) {
            $form->get('dateNaissance')->addError(new FormError($birthDateValidation['message']));
        }

        $phoneValidation = $inputValidationService->validateRequiredTunisianPhone($user->getTelephone(), 'Phone number');
        if (!$phoneValidation['valid']) {
            $form->get('telephone')->addError(new FormError($phoneValidation['message']));
        }

        $passwordValidation = $inputValidationService->validatePassword((string) $form->get('plainPassword')->getData());
        if (!$passwordValidation['valid']) {
            $form->get('plainPassword')->addError(new FormError($passwordValidation['message']));
        }

        $existingUser = $userRepository->findByEmail((string) $user->getEmail());
        if ($existingUser instanceof User) {
            $form->get('email')->addError(new FormError('An account with this email already exists.'));
        }
    }

}
