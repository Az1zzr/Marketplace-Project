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
use App\Service\ImageModerationService;
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

        // ── Visiteur non connecté → page d'accueil publique ──────────────────
        if (!$user instanceof User) {
            return $this->render('security/Accueil.html.twig');
        }

        // ── Admin → dashboard admin ───────────────────────────────────────────
        if ($this->isGranted('ROLE_ADMIN')) {
            return $this->redirectToRoute('app_admin_dashboard');
        }

        // ── Utilisateur connecté → dashboard front ────────────────────────────
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
                'products'      => $produitRepository->count([]),
                'orders'        => $commandeRepository->count([]),
                'feedbacks'     => $feedbackRepository->count([]),
                'users'         => $userRepository->count([]),
                'activeUsers'   => $userRepository->countActiveUsers(),
                'blockedUsers'  => $userRepository->countBlockedUsers(),
                'usersByMonth'  => json_encode($userRepository->countUsersByMonth()),
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
            return $this->redirectToRoute('app_home');
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
                'products'   => $productsCount,
                'orders'     => $ordersCount,
                'feedbacks'  => $feedbackCount,
                'categories' => $categorieRepository->count([]),
            ],
            'feedbackInsights' => $feedbackInsights,
            'roleCode'         => $user->getRoleCode(),
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
                'feedback'  => $feedback,
                'sentiment' => $sentiment,

                
                'insight' => $feedbackInsightService->analyze($feedback, $sentiment, $responseCount),


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

        $error        = $authenticationUtils->getLastAuthenticationError();
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('security/login.html.twig', [
            'last_username' => $lastUsername,
            'error'         => $error,
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
        ImageModerationService $imageModerationService
    ): Response {
        if ($this->getUser()) {
            return $this->redirectToRoute('app_home');
        }

        $user = new User();
        $form = $this->createForm(RegisterType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted()) {
            $this->addRegistrationValidationErrors($form, $user, $inputValidationService, $userRepository);
        }

        // ── API 1 : Vérification image de profil ─────────────────────────────
        if ($form->isSubmitted() && $form->isValid()) {
            $photoFile = $request->files->get('photo')
                      ?? ($form->has('photo') ? $form->get('photo')->getData() : null);

            if ($photoFile !== null) {
                try {
                    if (!$imageModerationService->isSafe($photoFile->getPathname())) {
                        $form->addError(new FormError(
                            '🚫 Image inappropriée détectée (nudité / violence). Veuillez choisir une autre photo.'
                        ));
                    }
                } catch (\Throwable $e) {
                    // Si l'API Vision est indisponible → on laisse passer (fail open)
                }
            }
        }
        // ─────────────────────────────────────────────────────────────────────

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

    #[Route('/forgot-password', name: 'app_forgot_password')]
    public function forgotPassword(
        Request $request,
        UserRepository $userRepository,
        InputValidationService $inputValidationService,
        PasswordResetService $passwordResetService,
        EntityManagerInterface $entityManager
    ): Response {
        if ($this->getUser()) {
            return $this->redirectToRoute('app_home');
        }

        $errors     = [];
        $identifier = trim((string) $request->request->get('identifier', ''));
        $channel    = (string) $request->request->get('channel', 'email');

        if ($request->isMethod('POST')) {
            $channelValidation = $inputValidationService->validateResetChannel($channel);
            if (!$channelValidation['valid']) {
                $errors['channel'] = $channelValidation['message'];
            }

            if ('' === $identifier) {
                $errors['identifier'] = 'Email or phone number is required.';
            }

            $user = empty($errors)
                ? $this->findUserByResetIdentifier($identifier, $userRepository, $inputValidationService)
                : null;

            if (!$user instanceof User && empty($errors)) {
                $errors['identifier'] = 'No account matches the provided email or phone number.';
            }

            if ($user instanceof User && empty($errors)) {
                try {
                    $code = $passwordResetService->issueResetCode($user);
                    $entityManager->flush();
                    $passwordResetService->sendResetCode($user, $channel, $code);
                } catch (\RuntimeException $exception) {
                    $passwordResetService->clearResetCode($user);
                    $entityManager->flush();
                    $errors['delivery'] = $exception->getMessage();
                }
            }

            if ($user instanceof User && empty($errors)) {
                $session = $request->getSession();
                $session->set('password_reset_user_id', $user->getId());
                $session->set('password_reset_channel', $channel);
                $session->set('password_reset_target', $passwordResetService->maskContact($user, $channel));

                $this->addFlash('success', 'Verification code sent successfully.');

                return $this->redirectToRoute('app_reset_password_verify');
            }
        }

        return $this->render('security/forgot_password.html.twig', [
            'errors'     => $errors,
            'identifier' => $identifier,
            'channel'    => $channel,
        ]);
    }

    #[Route('/reset-password/verify', name: 'app_reset_password_verify')]
    public function verifyResetPassword(
        Request $request,
        UserRepository $userRepository,
        PasswordResetService $passwordResetService,
        InputValidationService $inputValidationService,
        EntityManagerInterface $entityManager
    ): Response {
        if ($this->getUser()) {
            return $this->redirectToRoute('app_home');
        }

        $session = $request->getSession();
        $userId  = $session->get('password_reset_user_id');

        if (!is_int($userId) && !ctype_digit((string) $userId)) {
            return $this->redirectToRoute('app_forgot_password');
        }

        $user = $userRepository->find((int) $userId);
        if (!$user instanceof User) {
            $this->clearPasswordResetSession($request);
            return $this->redirectToRoute('app_forgot_password');
        }

        $errors = [];
        $code   = trim((string) $request->request->get('code', ''));

        if ($request->isMethod('POST')) {
            $codeValidation = $inputValidationService->validateVerificationCode($code);
            if (!$codeValidation['valid']) {
                $errors['code'] = $codeValidation['message'];
            }

            if (empty($errors) && !$passwordResetService->isResetCodeValid($user, $code)) {
                $errors['code'] = 'Code invalide ou expiré.';
            }

            if (empty($errors)) {
                $session->set('password_reset_code_verified', true);
                return $this->redirectToRoute('app_reset_password_new');
            }
        }

        return $this->render('security/reset_password_verify.html.twig', [
            'errors'       => $errors,
            'maskedTarget' => (string) $session->get('password_reset_target', ''),
            'channel'      => (string) $session->get('password_reset_channel', 'email'),
            'code'         => $code,
        ]);
    }

    #[Route('/reset-password/new', name: 'app_reset_password_new')]
    public function newPassword(
        Request $request,
        UserRepository $userRepository,
        PasswordResetService $passwordResetService,
        InputValidationService $inputValidationService,
        UserPasswordHasherInterface $passwordHasher,
        EntityManagerInterface $entityManager
    ): Response {
        if ($this->getUser()) {
            return $this->redirectToRoute('app_home');
        }

        $session = $request->getSession();
        $userId  = $session->get('password_reset_user_id');

        if (!$session->get('password_reset_code_verified') || !$userId) {
            return $this->redirectToRoute('app_forgot_password');
        }

        $user = $userRepository->find((int) $userId);
        if (!$user instanceof User) {
            $this->clearPasswordResetSession($request);
            return $this->redirectToRoute('app_forgot_password');
        }

        $errors = [];

        if ($request->isMethod('POST')) {
            $password        = (string) $request->request->get('password', '');
            $confirmPassword = (string) $request->request->get('confirmPassword', '');

            $passwordValidation = $inputValidationService->validatePassword($password);
            if (!$passwordValidation['valid']) {
                $errors['password'] = $passwordValidation['message'];
            }

            if ($password !== $confirmPassword) {
                $errors['confirmPassword'] = 'Les mots de passe ne correspondent pas.';
            }

            if (empty($errors)) {
                $user->setMotDePasse($passwordHasher->hashPassword($user, $password));
                $passwordResetService->clearResetCode($user);
                $entityManager->flush();
                $this->clearPasswordResetSession($request);

                $this->addFlash('success', 'Mot de passe réinitialisé avec succès !');
                return $this->redirectToRoute('app_login');
            }
        }

        return $this->render('security/reset_password_new.html.twig', [
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

        $phoneValidation = $inputValidationService->validateTunisianPhone($user->getTelephone());
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

    private function findUserByResetIdentifier(
        string $identifier,
        UserRepository $userRepository,
        InputValidationService $inputValidationService
    ): ?User {
        $identifier = trim($identifier);
        if (false !== filter_var($identifier, FILTER_VALIDATE_EMAIL)) {
            return $userRepository->findByEmail(strtolower($identifier));
        }

        $phone = $inputValidationService->normalizePhone($identifier);
        if (null === $phone) {
            return null;
        }

        return $userRepository->findOneBy(['telephone' => $phone]);
    }

    private function clearPasswordResetSession(Request $request): void
    {
        $session = $request->getSession();
        $session->remove('password_reset_user_id');
        $session->remove('password_reset_channel');
        $session->remove('password_reset_target');
        $session->remove('password_reset_code_verified');
    }
}