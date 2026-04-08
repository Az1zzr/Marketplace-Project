<?php

namespace App\Controller;

use App\Entity\User;
use App\Entity\Role;
use App\Repository\UserRepository;
use App\Repository\RoleRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
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
        return $this->render('home.html.twig');
    }

    #[Route('/login', name: 'app_login')]
    public function login(AuthenticationUtils $authenticationUtils): Response
    {
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
    public function register(Request $request, UserRepository $userRepository, RoleRepository $roleRepository, EntityManagerInterface $entityManager, UserPasswordHasherInterface $passwordHasher): Response
    {
        if ($request->isMethod('POST')) {
            $existingUser = $userRepository->findByEmail($request->request->get('email'));
            if ($existingUser) {
                return $this->render('security/register.html.twig', [
                    'error' => 'Email already exists',
                    'roles' => $roleRepository->findAll(),
                ]);
            }

            $user = new User();
            $user->setNom($request->request->get('nom'));
            $user->setPrenom($request->request->get('prenom'));
            $user->setEmail($request->request->get('email'));
            $user->setTelephone($request->request->get('telephone'));

            $hashedPassword = $passwordHasher->hashPassword($user, $request->request->get('password'));
            $user->setMotDePasse($hashedPassword);

            $dateNaissance = $request->request->get('dateNaissance');
            if ($dateNaissance) {
                $user->setDateNaissance(new \DateTime($dateNaissance));
            }

            $roleId = $request->request->get('role');
            if ($roleId) {
                $role = $roleRepository->find($roleId);
                $user->setRole($role);
            }

            $entityManager->persist($user);
            $entityManager->flush();

            return $this->redirectToRoute('app_login');
        }

        return $this->render('security/register.html.twig', [
            'roles' => $roleRepository->findAll(),
            'error' => null,
        ]);
    }
}
