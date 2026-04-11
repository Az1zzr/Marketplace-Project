<?php

namespace App\Controller;

use App\Entity\Categorie;
use App\Repository\CategorieRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CategorieController extends AbstractController
{
    #[Route('/categorie', name: 'app_categorie_index')]
    public function index(CategorieRepository $categorieRepository): Response
    {
        $this->denyUnlessCatalogManager();

        return $this->render('categorie/index.html.twig', [
            'categories' => $categorieRepository->findAllOrdered(),
        ]);
    }

    #[Route('/categorie/new', name: 'app_categorie_new')]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $this->denyUnlessCatalogManager();

        $errors = [];
        if ($request->isMethod('POST')) {
            $nom = trim((string) $request->request->get('nom', ''));
            $description = trim((string) $request->request->get('description', ''));

            if ('' === $nom) {
                $errors['nom'] = 'Category name is required.';
            }

            if (empty($errors)) {
                $categorie = new Categorie();
                $categorie
                    ->setNom($nom)
                    ->setDescription($description);

                $entityManager->persist($categorie);
                $entityManager->flush();

                $this->addFlash('success', 'Category created successfully.');
                return $this->redirectToRoute('app_categorie_index');
            }
        }

        return $this->render('categorie/new.html.twig', [
            'errors' => $errors,
        ]);
    }

    #[Route('/categorie/{id}/edit', name: 'app_categorie_edit')]
    public function edit(int $id, Request $request, CategorieRepository $categorieRepository, EntityManagerInterface $entityManager): Response
    {
        $this->denyUnlessCatalogManager();

        $categorie = $categorieRepository->find($id);
        if (!$categorie) {
            throw $this->createNotFoundException('Category not found');
        }

        $errors = [];
        if ($request->isMethod('POST')) {
            $nom = trim((string) $request->request->get('nom', ''));
            $description = trim((string) $request->request->get('description', ''));

            if ('' === $nom) {
                $errors['nom'] = 'Category name is required.';
            }

            if (empty($errors)) {
                $categorie
                    ->setNom($nom)
                    ->setDescription($description);

                $entityManager->flush();

                $this->addFlash('success', 'Category updated successfully.');
                return $this->redirectToRoute('app_categorie_index');
            }
        }

        return $this->render('categorie/edit.html.twig', [
            'categorie' => $categorie,
            'errors' => $errors,
        ]);
    }

    #[Route('/categorie/{id}/delete', name: 'app_categorie_delete', methods: ['POST'])]
    public function delete(int $id, CategorieRepository $categorieRepository, EntityManagerInterface $entityManager): Response
    {
        $this->denyUnlessCatalogManager();

        $categorie = $categorieRepository->find($id);
        if (!$categorie) {
            throw $this->createNotFoundException('Category not found');
        }

        if (!$categorie->getProduits()->isEmpty()) {
            $this->addFlash('error', 'You must move or delete the products in this category before deleting it.');
            return $this->redirectToRoute('app_categorie_index');
        }

        $entityManager->remove($categorie);
        $entityManager->flush();

        $this->addFlash('success', 'Category deleted successfully.');
        return $this->redirectToRoute('app_categorie_index');
    }

    private function denyUnlessCatalogManager(): void
    {
        if ($this->isGranted('ROLE_ADMIN') || $this->isGranted('ROLE_FOURNISSEUR')) {
            return;
        }

        throw $this->createAccessDeniedException('Only admins and fournisseurs can manage categories.');
    }
}
