<?php

namespace App\Controller;

use App\Entity\User;
use App\Entity\Role;
use App\Repository\UserRepository;
use App\Repository\RoleRepository;
use App\Service\InputValidationService;
use App\Service\ImageModerationService;
use Doctrine\ORM\EntityManagerInterface;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\StreamedResponse;
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

    // ── Feature 1 : Activate / Block a user ──────────────────────────
    #[Route('/user/{id}/toggle-active', name: 'app_user_toggle_active', methods: ['POST'])]
    public function toggleActive(int $id, UserRepository $userRepository, EntityManagerInterface $entityManager): Response
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN');

        $user = $userRepository->find($id);
        if (!$user) {
            throw $this->createNotFoundException('User not found');
        }

        $user->setIsActive(!$user->isActive());
        $entityManager->flush();

        $status = $user->isActive() ? 'activated' : 'blocked';
        $this->addFlash('success', "User {$user->getNomComplet()} has been {$status} successfully.");

        return $this->redirectToRoute('app_user_index');
    }

    // ── Feature 2 : Export to Excel ──────────────────────────────────
    #[Route('/user/export/excel', name: 'app_user_export_excel')]
    public function exportExcel(UserRepository $userRepository): Response
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN');

        $users       = $userRepository->findAll();
        $spreadsheet = new Spreadsheet();
        $sheet       = $spreadsheet->getActiveSheet();
        $sheet->setTitle('Users');

        // Headers
        $headers = ['ID', 'Last Name', 'First Name', 'Email', 'Phone', 'Role', 'Status', 'Registration Date'];
        foreach ($headers as $col => $header) {
            $cell = chr(65 + $col) . '1';
            $sheet->setCellValue($cell, $header);
        }

        // Header styling
        $sheet->getStyle('A1:H1')->applyFromArray([
            'font'      => ['bold' => true, 'color' => ['rgb' => 'FFFFFF']],
            'fill'      => ['fillType' => Fill::FILL_SOLID, 'startColor' => ['rgb' => '1e3a5f']],
            'alignment' => ['horizontal' => Alignment::HORIZONTAL_CENTER],
        ]);

        // Data
        $row = 2;
        foreach ($users as $user) {
            $sheet->setCellValue('A' . $row, $user->getId());
            $sheet->setCellValue('B' . $row, $user->getNom());
            $sheet->setCellValue('C' . $row, $user->getPrenom());
            $sheet->setCellValue('D' . $row, $user->getEmail());
            $sheet->setCellValue('E' . $row, $user->getTelephone() ?? '-');
            $sheet->setCellValue('F' . $row, $user->getRole()?->getNomRole() ?? '-');
            $sheet->setCellValue('G' . $row, $user->isActive() ? 'Active' : 'Blocked');
            $sheet->setCellValue('H' . $row, $user->getCreatedAt()->format('Y-m-d'));

            // Status color coding
            $statusColor = $user->isActive() ? 'D1FAE5' : 'FEE2E2';
            $sheet->getStyle('G' . $row)->applyFromArray([
                'fill' => ['fillType' => Fill::FILL_SOLID, 'startColor' => ['rgb' => $statusColor]],
            ]);
            $row++;
        }

        // Auto-width columns
        foreach (range('A', 'H') as $col) {
            $sheet->getColumnDimension($col)->setAutoSize(true);
        }

        $writer   = new Xlsx($spreadsheet);
        $filename = 'users_' . date('Ymd_His') . '.xlsx';

        $response = new StreamedResponse(function () use ($writer) {
            $writer->save('php://output');
        });

        $response->headers->set('Content-Type', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        $response->headers->set('Content-Disposition', 'attachment; filename="' . $filename . '"');
        $response->headers->set('Cache-Control', 'max-age=0');

        return $response;
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