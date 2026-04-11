<?php

namespace App\Controller;

use App\Entity\Livraison;
use App\Entity\User;
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
        $this->denyUnlessBuyerOrAdmin();
        $currentUser = $this->requireCurrentUser();

        $search = $request->query->get('search', '');
        $sort = $request->query->get('sort', 'dateLivraison');
        $order = $request->query->get('order', 'desc');
        $statut = $request->query->get('statut', '');

        $validSorts = ['numeroBL', 'dateLivraison', 'livreur', 'statutLivraison'];
        $sort = in_array($sort, $validSorts) ? $sort : 'dateLivraison';
        $order = in_array($order, ['asc', 'desc']) ? $order : 'desc';

        $livraisons = $livraisonRepository->findBySearchAndSortForUser($currentUser, $search, $sort, $order, $statut);

        return $this->render('livraison/index.html.twig', [
            'livraisons' => $livraisons,
            'canManageLivraisons' => $this->isGranted('ROLE_ADMIN') || $this->isGranted('ROLE_FOURNISSEUR'),
            'search' => $search,
            'sort' => $sort,
            'order' => $order,
            'statut' => $statut,
        ]);
    }

    #[Route('/livraison/new/{commandeId}', name: 'app_livraison_new')]
    public function new(int $commandeId, Request $request, LivraisonRepository $livraisonRepository, CommandeRepository $commandeRepository, EntityManagerInterface $entityManager): Response
    {
        $this->denyUnlessManager();
        $currentUser = $this->requireCurrentUser();

        $commande = $commandeRepository->findOneVisibleForUser($commandeId, $currentUser);

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
        $this->denyUnlessManager();
        $currentUser = $this->requireCurrentUser();

        $livraison = $livraisonRepository->findOneVisibleForUser($id, $currentUser);

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
        $this->denyUnlessManager();
        $currentUser = $this->requireCurrentUser();

        $livraison = $livraisonRepository->findOneVisibleForUser($id, $currentUser);

        if (!$livraison) {
            throw $this->createNotFoundException('Delivery not found');
        }

        $commandeId = $livraison->getCommande()->getIdCommande();

        $entityManager->remove($livraison);
        $entityManager->flush();

        return $this->redirectToRoute('app_commande_show', ['id' => $commandeId]);
    }

    private function denyUnlessBuyerOrAdmin(): void
    {
        if ($this->isGranted('ROLE_ADMIN') || $this->isGranted('ROLE_CLIENT') || $this->isGranted('ROLE_FOURNISSEUR')) {
            return;
        }

        throw $this->createAccessDeniedException('Only admins, clients, and fournisseurs can access deliveries.');
    }

    private function denyUnlessManager(): void
    {
        if ($this->isGranted('ROLE_ADMIN') || $this->isGranted('ROLE_FOURNISSEUR')) {
            return;
        }

        throw $this->createAccessDeniedException('Only admins and fournisseurs can manage deliveries.');
    }

    private function requireCurrentUser(): User
    {
        $user = $this->getUser();
        if (!$user instanceof User) {
            throw $this->createAccessDeniedException('You must be signed in to continue.');
        }

        return $user;
    }
}
