<?php

namespace App\Controller;

use App\Entity\Livraison;
use App\Entity\Commande;
use App\Repository\LivraisonRepository;
use App\Repository\CommandeRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LivraisonController extends AbstractController
{
    #[Route('/livraison', name: 'app_livraison_index')]
    public function index(Request $request, LivraisonRepository $livraisonRepository): Response
    {
        $search = $request->query->get('search', '');
        $sort = $request->query->get('sort', 'dateLivraison');
        $order = $request->query->get('order', 'desc');
        $statut = $request->query->get('statut', '');

        $validSorts = ['numeroBL', 'dateLivraison', 'livreur', 'statutLivraison'];
        $sort = in_array($sort, $validSorts) ? $sort : 'dateLivraison';
        $order = in_array($order, ['asc', 'desc']) ? $order : 'desc';

        $livraisons = $livraisonRepository->findBySearchAndSort($search, $sort, $order, $statut);

        return $this->render('livraison/index.html.twig', [
            'livraisons' => $livraisons,
            'search' => $search,
            'sort' => $sort,
            'order' => $order,
            'statut' => $statut,
        ]);
    }

    #[Route('/livraison/new/{commandeId}', name: 'app_livraison_new')]
    public function new(int $commandeId, Request $request, LivraisonRepository $livraisonRepository, CommandeRepository $commandeRepository, EntityManagerInterface $entityManager): Response
    {
        $commande = $commandeRepository->find($commandeId);

        if (!$commande) {
            throw $this->createNotFoundException('Order not found');
        }

        $existingLivraison = $livraisonRepository->findByCommande($commandeId);
        if ($existingLivraison) {
            $this->addFlash('error', 'This order already has a delivery.');
            return $this->redirectToRoute('app_commande_show', ['id' => $commandeId]);
        }

        if ($request->isMethod('POST')) {
            $livraison = new Livraison();
            
            $numeroBL = 'BL-' . date('Ymd') . '-' . str_pad(rand(1, 9999), 4, '0', STR_PAD_LEFT);
            $livraison->setCommande($commande);
            $livraison->setNumeroBL($numeroBL);
            $livraison->setDateLivraison(new \DateTime($request->request->get('dateLivraison') ?? 'now'));
            $livraison->setLivreur($request->request->get('livreur'));
            $livraison->setStatutLivraison($request->request->get('statutLivraison', 'En cours'));
            $livraison->setNoteDelivery($request->request->get('noteDelivery'));
            $livraison->setLatitude((float)$request->request->get('latitude', 0));
            $livraison->setLongitude((float)$request->request->get('longitude', 0));

            $entityManager->persist($livraison);
            $entityManager->flush();

            return $this->redirectToRoute('app_commande_show', ['id' => $commandeId]);
        }

        return $this->render('livraison/new.html.twig', [
            'commande' => $commande,
        ]);
    }

    #[Route('/livraison/{id}/edit', name: 'app_livraison_edit')]
    public function edit(int $id, Request $request, LivraisonRepository $livraisonRepository, EntityManagerInterface $entityManager): Response
    {
        $livraison = $livraisonRepository->find($id);

        if (!$livraison) {
            throw $this->createNotFoundException('Delivery not found');
        }

        if ($request->isMethod('POST')) {
            $livraison->setDateLivraison(new \DateTime($request->request->get('dateLivraison')));
            $livraison->setLivreur($request->request->get('livreur'));
            $livraison->setStatutLivraison($request->request->get('statutLivraison'));
            $livraison->setNoteDelivery($request->request->get('noteDelivery'));
            $livraison->setLatitude((float)$request->request->get('latitude', 0));
            $livraison->setLongitude((float)$request->request->get('longitude', 0));

            $entityManager->flush();

            return $this->redirectToRoute('app_commande_show', ['id' => $livraison->getCommande()->getIdCommande()]);
        }

        return $this->render('livraison/edit.html.twig', [
            'livraison' => $livraison,
        ]);
    }

    #[Route('/livraison/{id}/delete', name: 'app_livraison_delete')]
    public function delete(int $id, LivraisonRepository $livraisonRepository, EntityManagerInterface $entityManager): Response
    {
        $livraison = $livraisonRepository->find($id);

        if (!$livraison) {
            throw $this->createNotFoundException('Delivery not found');
        }

        $commandeId = $livraison->getCommande()->getIdCommande();

        $entityManager->remove($livraison);
        $entityManager->flush();

        return $this->redirectToRoute('app_commande_show', ['id' => $commandeId]);
    }
}
