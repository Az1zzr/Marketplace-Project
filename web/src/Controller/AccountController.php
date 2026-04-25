<?php

namespace App\Controller;

use App\Entity\User;
use App\Repository\UserRepository;
use App\Service\InputValidationService;
use App\Service\ProfilePhotoService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;

class AccountController extends AbstractController
{
    #[Route('/account/profile', name: 'app_account_profile')]
    public function profile(
        Request $request,
        UserRepository $userRepository,
        EntityManagerInterface $entityManager,
        UserPasswordHasherInterface $passwordHasher,
        InputValidationService $inputValidationService,
        ProfilePhotoService $profilePhotoService
    ): Response {
        $user = $this->getUser();
        if (!$user instanceof User) {
            throw $this->createAccessDeniedException('You must be signed in to manage your account.');
        }

        $errors = [];

        if ($request->isMethod('POST')) {
            $nom = trim((string) $request->request->get('nom', ''));
            $prenom = trim((string) $request->request->get('prenom', ''));
            $email = trim((string) $request->request->get('email', ''));
            $telephone = (string) $request->request->get('telephone', '');
            $dateNaissanceInput = (string) $request->request->get('dateNaissance', '');
            $dateNaissance = $inputValidationService->parseDate($dateNaissanceInput);
            $newPassword = (string) $request->request->get('motDePasse', '');
            $confirmPassword = (string) $request->request->get('confirmMotDePasse', '');
            $uploadedPhoto = $request->files->get('photoProfil');
            $previousPhotoPath = $user->getPhotoPath();

            $errors = $this->validateAccountData(
                $inputValidationService,
                $userRepository,
                $nom,
                $prenom,
                $email,
                $telephone,
                $dateNaissanceInput,
                $dateNaissance,
                $newPassword,
                $confirmPassword,
                $user
            );

            if ($uploadedPhoto instanceof UploadedFile) {
                try {
                    $profilePhotoService->assertUploadedPhotoIsAllowed($uploadedPhoto);
                } catch (\RuntimeException $exception) {
                    $errors['photoProfil'] = $exception->getMessage();
                }
            }

            if (empty($errors)) {
                $user
                    ->setNom($nom)
                    ->setPrenom($prenom)
                    ->setEmail($email)
                    ->setTelephone($inputValidationService->normalizePhone($telephone))
                    ->setDateNaissance($dateNaissance);

                if ($uploadedPhoto instanceof UploadedFile) {
                    $user->setPhotoFile($uploadedPhoto);
                }

                if ('' !== trim($newPassword)) {
                    $user->setMotDePasse($passwordHasher->hashPassword($user, $newPassword));
                }

                $entityManager->flush();

                if (
                    $uploadedPhoto instanceof UploadedFile
                    && null !== $previousPhotoPath
                    && $previousPhotoPath !== $user->getPhotoPath()
                ) {
                    $profilePhotoService->deleteStoredPhoto($previousPhotoPath);
                }

                // The uploaded file object is only needed for Vich during flush.
                // Clear it before the authenticated user is serialized back into the session.
                if ($uploadedPhoto instanceof UploadedFile) {
                    $user->setPhotoFile(null);
                }

                $this->addFlash('success', 'Your account has been updated successfully.');

                return $this->redirectToRoute('app_account_profile');
            }
        }

        return $this->render('account/profile.html.twig', [
            'accountUser' => $user,
            'errors' => $errors,
        ]);
    }

    private function validateAccountData(
        InputValidationService $inputValidationService,
        UserRepository $userRepository,
        string $nom,
        string $prenom,
        string $email,
        string $telephone,
        string $dateNaissanceInput,
        ?\DateTimeInterface $dateNaissance,
        string $newPassword,
        string $confirmPassword,
        User $currentUser
    ): array {
        $errors = [];

        if ((string) $currentUser->getEmail() !== $email) {
            $emailValidation = $inputValidationService->validateEmail($email);
            if (!$emailValidation['valid']) {
                $errors['email'] = $emailValidation['message'];
            }
        }

        foreach ([
            'nom' => $inputValidationService->validateName($nom, 'Last name'),
            'prenom' => $inputValidationService->validateName($prenom, 'First name'),
            'telephone' => $inputValidationService->validateTunisianPhone($telephone),
            'dateNaissance' => $inputValidationService->validateBirthDateInput($dateNaissanceInput),
        ] as $field => $result) {
            if (!$result['valid']) {
                $errors[$field] = $result['message'];
            }
        }

        $existingUser = $userRepository->findByEmail(strtolower($email));
        if ($existingUser instanceof User && $existingUser->getId() !== $currentUser->getId()) {
            $errors['email'] = 'An account with this email already exists.';
        }

        if ('' !== trim($newPassword)) {
            $passwordResult = $inputValidationService->validatePassword($newPassword);
            if (!$passwordResult['valid']) {
                $errors['motDePasse'] = $passwordResult['message'];
            }

            if ($newPassword !== $confirmPassword) {
                $errors['confirmMotDePasse'] = 'Password confirmation does not match.';
            }
        }

        return $errors;
    }
}
