<?php

namespace App\Controller;

use App\Entity\Stock;
use App\Entity\Produit;
use App\Repository\StockRepository;
use App\Repository\ProduitRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class StockController extends AbstractController
{
    #[Route('/stock', name: 'app_stock_index')]
    public function index(StockRepository $stockRepository): Response
    {
        $stocks = $stockRepository->findAll();

        return $this->render('stock/index.html.twig', [
            'stocks' => $stocks,
        ]);
    }

    #[Route('/stock/new', name: 'app_stock_new')]
    public function new(Request $request, StockRepository $stockRepository, ProduitRepository $produitRepository, EntityManagerInterface $entityManager): Response
    {
        $produits = $produitRepository->findAll();

        if ($request->isMethod('POST')) {
            $stock = new Stock();
            $produitId = $request->request->get('produit');
            $produit = $produitRepository->find($produitId);

            if ($produit) {
                $stock->setProduit($produit);
                $stock->setQuantite((int)$request->request->get('quantite'));

                $entityManager->persist($stock);
                $entityManager->flush();
            }

            return $this->redirectToRoute('app_stock_index');
        }

        return $this->render('stock/new.html.twig', [
            'produits' => $produits,
        ]);
    }

    #[Route('/stock/{id}/edit', name: 'app_stock_edit')]
    public function edit(int $id, Request $request, StockRepository $stockRepository, ProduitRepository $produitRepository, EntityManagerInterface $entityManager): Response
    {
        $stock = $stockRepository->find($id);

        if (!$stock) {
            throw $this->createNotFoundException('Stock not found');
        }

        $produits = $produitRepository->findAll();

        if ($request->isMethod('POST')) {
            $produitId = $request->request->get('produit');
            $produit = $produitRepository->find($produitId);

            if ($produit) {
                $stock->setProduit($produit);
            }
            $stock->setQuantite((int)$request->request->get('quantite'));

            $entityManager->flush();

            return $this->redirectToRoute('app_stock_index');
        }

        return $this->render('stock/edit.html.twig', [
            'stock' => $stock,
            'produits' => $produits,
        ]);
    }

    #[Route('/stock/{id}/delete', name: 'app_stock_delete')]
    public function delete(int $id, StockRepository $stockRepository, EntityManagerInterface $entityManager): Response
    {
        $stock = $stockRepository->find($id);

        if (!$stock) {
            throw $this->createNotFoundException('Stock not found');
        }

        $entityManager->remove($stock);
        $entityManager->flush();

        return $this->redirectToRoute('app_stock_index');
    }
}
