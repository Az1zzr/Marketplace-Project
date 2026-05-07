<?php

namespace App\Controller;

use App\Entity\Role;
use App\Repository\RoleRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RoleController extends AbstractController
{
    #[Route('/role', name: 'app_role_index')]
    public function index(RoleRepository $roleRepository): Response
    {
        $roles = $roleRepository->findAll();

        return $this->render('role/index.html.twig', [
            'roles' => $roles,
        ]);
    }

    #[Route('/role/new', name: 'app_role_new')]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        if ($request->isMethod('POST')) {
            $role = new Role();
            $role->setNomRole($request->request->get('nomRole'));

            $entityManager->persist($role);
            $entityManager->flush();

            return $this->redirectToRoute('app_role_index');
        }

        return $this->render('role/new.html.twig');
    }

    #[Route('/role/{id}/edit', name: 'app_role_edit')]
    public function edit(int $id, Request $request, RoleRepository $roleRepository, EntityManagerInterface $entityManager): Response
    {
        $role = $roleRepository->find($id);

        if (!$role) {
            throw $this->createNotFoundException('Role not found');
        }

        if ($request->isMethod('POST')) {
            $role->setNomRole($request->request->get('nomRole'));
            $entityManager->flush();

            return $this->redirectToRoute('app_role_index');
        }

        return $this->render('role/edit.html.twig', [
            'role' => $role,
        ]);
    }

    #[Route('/role/{id}/delete', name: 'app_role_delete')]
    public function delete(int $id, RoleRepository $roleRepository, EntityManagerInterface $entityManager): Response
    {
        $role = $roleRepository->find($id);

        if (!$role) {
            throw $this->createNotFoundException('Role not found');
        }

        $entityManager->remove($role);
        $entityManager->flush();

        return $this->redirectToRoute('app_role_index');
    }
}
