<?php

namespace App\Controller;

use App\Entity\Produit;
use App\Entity\Stock;
use App\Repository\ProduitRepository;
use App\Repository\StockRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProduitController extends AbstractController
{
    #[Route('/produit', name: 'app_produit_index')]
    public function index(ProduitRepository $produitRepository): Response
    {
        $produits = $produitRepository->findAll();

        return $this->render('produit/index.html.twig', [
            'produits' => $produits,
        ]);
    }

    #[Route('/produit/new', name: 'app_produit_new')]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        if ($request->isMethod('POST')) {
            $produit = new Produit();
            $produit->setNomProduit($request->request->get('nomProduit'));
            $produit->setAdresse($request->request->get('adresse'));
            $produit->setPrix((float)$request->request->get('prix'));
            $produit->setQuantite((int)$request->request->get('quantite'));
            $produit->setImageURL($request->request->get('imageURL'));

            $entityManager->persist($produit);
            $entityManager->flush();

            return $this->redirectToRoute('app_produit_index');
        }

        return $this->render('produit/new.html.twig');
    }

    #[Route('/produit/{id}/edit', name: 'app_produit_edit')]
    public function edit(int $id, Request $request, ProduitRepository $produitRepository, EntityManagerInterface $entityManager): Response
    {
        $produit = $produitRepository->find($id);

        if (!$produit) {
            throw $this->createNotFoundException('Product not found');
        }

        if ($request->isMethod('POST')) {
            $produit->setNomProduit($request->request->get('nomProduit'));
            $produit->setAdresse($request->request->get('adresse'));
            $produit->setPrix((float)$request->request->get('prix'));
            $produit->setQuantite((int)$request->request->get('quantite'));
            $produit->setImageURL($request->request->get('imageURL'));

            $entityManager->flush();

            return $this->redirectToRoute('app_produit_index');
        }

        return $this->render('produit/edit.html.twig', [
            'produit' => $produit,
        ]);
    }

    #[Route('/produit/{id}/delete', name: 'app_produit_delete')]
    public function delete(int $id, ProduitRepository $produitRepository, EntityManagerInterface $entityManager): Response
    {
        $produit = $produitRepository->find($id);

        if (!$produit) {
            throw $this->createNotFoundException('Product not found');
        }

        $entityManager->remove($produit);
        $entityManager->flush();

        return $this->redirectToRoute('app_produit_index');
    }

    #[Route('/produit/{id}', name: 'app_produit_show')]
    public function show(int $id, ProduitRepository $produitRepository, StockRepository $stockRepository): Response
    {
        $produit = $produitRepository->find($id);

        if (!$produit) {
            throw $this->createNotFoundException('Product not found');
        }

        $stock = $stockRepository->findByProduit($id);

        return $this->render('produit/show.html.twig', [
            'produit' => $produit,
            'stock' => $stock,
        ]);
    }
}
