<?php

namespace App\Controller;

use App\Entity\User;
use App\Entity\Role;
use App\Repository\UserRepository;
use App\Repository\RoleRepository;
use App\Service\InputValidationService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends AbstractController
{
    #[Route('/user', name: 'app_user_index')]
    public function index(UserRepository $userRepository): Response
    {
        $users = $userRepository->findAll();

        return $this->render('user/index.html.twig', [
            'users' => $users,
        ]);
    }

    #[Route('/user/new', name: 'app_user_new')]
    public function new(Request $request, UserRepository $userRepository, RoleRepository $roleRepository, EntityManagerInterface $entityManager, UserPasswordHasherInterface $passwordHasher, InputValidationService $inputValidationService): Response
    {
        $roles = $roleRepository->findAll();
        $errors = [];

        if ($request->isMethod('POST')) {
            $user = new User();
            $nom = trim((string) $request->request->get('nom', ''));
            $prenom = trim((string) $request->request->get('prenom', ''));
            $email = trim((string) $request->request->get('email', ''));
            $telephone = (string) $request->request->get('telephone', '');
            $plainPassword = (string) $request->request->get('motDePasse', '');

            $user->setNom($nom);
            $user->setPrenom($prenom);
            $user->setEmail($email);
            $user->setTelephone($telephone);

            $dateNaissance = $request->request->get('dateNaissance');
            $parsedBirthDate = $inputValidationService->parseDate((string) $dateNaissance);
            $user->setDateNaissance($parsedBirthDate);

            $roleId = $request->request->get('role');
            if (null !== $roleId && '' !== trim((string) $roleId)) {
                $role = $roleRepository->find($roleId);
                $user->setRole($role);
            }

            $errors = $this->validateManagedUserData(
                $inputValidationService,
                $userRepository,
                $user,
                $plainPassword,
                true,
                (string) $dateNaissance
            );

            if (empty($errors)) {
                $hashedPassword = $passwordHasher->hashPassword($user, $plainPassword);
                $user->setMotDePasse($hashedPassword);
                $user->setTelephone($inputValidationService->normalizePhone($telephone));

                $entityManager->persist($user);
                $entityManager->flush();

                return $this->redirectToRoute('app_user_index');
            }
        }

        return $this->render('user/new.html.twig', [
            'roles' => $roles,
            'errors' => $errors,
        ]);
    }

    #[Route('/user/{id}/edit', name: 'app_user_edit')]
    public function edit(int $id, Request $request, UserRepository $userRepository, RoleRepository $roleRepository, EntityManagerInterface $entityManager, UserPasswordHasherInterface $passwordHasher, InputValidationService $inputValidationService): Response
    {
        $user = $userRepository->find($id);

        if (!$user) {
            throw $this->createNotFoundException('User not found');
        }

        $roles = $roleRepository->findAll();
        $errors = [];

        if ($request->isMethod('POST')) {
            $nom = trim((string) $request->request->get('nom', ''));
            $prenom = trim((string) $request->request->get('prenom', ''));
            $email = trim((string) $request->request->get('email', ''));
            $telephone = (string) $request->request->get('telephone', '');

            $user->setNom($nom);
            $user->setPrenom($prenom);
            $user->setEmail($email);
            $user->setTelephone($telephone);

            $newPassword = $request->request->get('motDePasse');

            $dateNaissance = $request->request->get('dateNaissance');
            $parsedBirthDate = $inputValidationService->parseDate((string) $dateNaissance);
            $user->setDateNaissance($parsedBirthDate);

            $roleId = $request->request->get('role');
            if (null !== $roleId && '' !== trim((string) $roleId)) {
                $role = $roleRepository->find($roleId);
                $user->setRole($role);
            }

            $errors = $this->validateManagedUserData(
                $inputValidationService,
                $userRepository,
                $user,
                (string) $newPassword,
                false,
                (string) $dateNaissance
            );

            if (empty($errors)) {
                if ($newPassword) {
                    $hashedPassword = $passwordHasher->hashPassword($user, $newPassword);
                    $user->setMotDePasse($hashedPassword);
                }

                $user->setTelephone($inputValidationService->normalizePhone($telephone));

                $entityManager->flush();

                return $this->redirectToRoute('app_user_index');
            }
        }

        return $this->render('user/edit.html.twig', [
            'user' => $user,
            'roles' => $roles,
            'errors' => $errors,
        ]);
    }

    #[Route('/user/{id}/delete', name: 'app_user_delete')]
    public function delete(int $id, UserRepository $userRepository, EntityManagerInterface $entityManager): Response
    {
        $user = $userRepository->find($id);

        if (!$user) {
            throw $this->createNotFoundException('User not found');
        }

        $entityManager->remove($user);
        $entityManager->flush();

        return $this->redirectToRoute('app_user_index');
    }

    #[Route('/user/{id}', name: 'app_user_show')]
    public function show(int $id, UserRepository $userRepository): Response
    {
        $user = $userRepository->find($id);

        if (!$user) {
            throw $this->createNotFoundException('User not found');
        }

        return $this->render('user/show.html.twig', [
            'user' => $user,
        ]);
    }

    private function validateManagedUserData(
        InputValidationService $inputValidationService,
        UserRepository $userRepository,
        User $user,
        string $plainPassword,
        bool $requireBirthDate,
        string $birthDateInput
    ): array {
        $errors = [];

        $existingUser = $userRepository->findByEmail((string) $user->getEmail());
        $shouldValidateEmailDomain = null === $user->getId()
            || !$existingUser instanceof User
            || $existingUser->getId() !== $user->getId();

        if ($shouldValidateEmailDomain) {
            $emailValidation = $inputValidationService->validateEmail((string) $user->getEmail());
            if (!$emailValidation['valid']) {
                $errors['email'] = $emailValidation['message'];
            }
        }

        foreach ([
            'nom' => $inputValidationService->validateName((string) $user->getNom(), 'Last name'),
            'prenom' => $inputValidationService->validateName((string) $user->getPrenom(), 'First name'),
            'telephone' => $inputValidationService->validateTunisianPhone($user->getTelephone()),
            'dateNaissance' => $inputValidationService->validateBirthDateInput($birthDateInput, $requireBirthDate),
        ] as $field => $result) {
            if (!$result['valid']) {
                $errors[$field] = $result['message'];
            }
        }

        if ($existingUser instanceof User && $existingUser->getId() !== $user->getId()) {
            $errors['email'] = 'An account with this email already exists.';
        }

        if ('' === trim($plainPassword) && null === $user->getId()) {
            $errors['motDePasse'] = 'Password is required.';
        }

        if ('' !== trim($plainPassword)) {
            $passwordValidation = $inputValidationService->validatePassword($plainPassword);
            if (!$passwordValidation['valid']) {
                $errors['motDePasse'] = $passwordValidation['message'];
            }
        }

        if (!$user->getRole() instanceof Role) {
            $errors['role'] = 'Please select a valid role.';
        }

        return $errors;
    }
}
