<?php

namespace App\Controller;

use App\Entity\Commande;
use App\Entity\Livraison;
use App\Repository\CommandeRepository;
use App\Repository\LivraisonRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CommandeController extends AbstractController
{
    #[Route('/commande', name: 'app_commande_index')]
    public function index(Request $request, CommandeRepository $commandeRepository): Response
    {
        $search = $request->query->get('search', '');
        $sort = $request->query->get('sort', 'dateCommande');
        $order = $request->query->get('order', 'desc');
        $statut = $request->query->get('statut', '');

        $validSorts = ['numeroCommande', 'client', 'dateCommande', 'montantTotal', 'statut'];
        $sort = in_array($sort, $validSorts) ? $sort : 'dateCommande';
        $order = in_array($order, ['asc', 'desc']) ? $order : 'desc';

        $commandes = $commandeRepository->findBySearchAndSort($search, $sort, $order, $statut);

        return $this->render('commande/index.html.twig', [
            'commandes' => $commandes,
            'search' => $search,
            'sort' => $sort,
            'order' => $order,
            'statut' => $statut,
        ]);
    }

    #[Route('/commande/new', name: 'app_commande_new')]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        if ($request->isMethod('POST')) {
            $commande = new Commande();
            
            $numero = 'CMD-' . date('Ymd') . '-' . str_pad(rand(1, 9999), 4, '0', STR_PAD_LEFT);
            $commande->setNumeroCommande($numero);
            $commande->setClient($request->request->get('client'));
            $commande->setDateCommande(new \DateTime($request->request->get('dateCommande') ?? 'now'));
            $commande->setMontantTotal((float)$request->request->get('montantTotal'));
            $commande->setAdresseLivraison($request->request->get('adresseLivraison'));
            $commande->setStatut($request->request->get('statut', 'En attente'));

            $entityManager->persist($commande);
            $entityManager->flush();

            return $this->redirectToRoute('app_commande_index');
        }

        return $this->render('commande/new.html.twig');
    }

    #[Route('/commande/{id}/edit', name: 'app_commande_edit')]
    public function edit(int $id, Request $request, CommandeRepository $commandeRepository, EntityManagerInterface $entityManager): Response
    {
        $commande = $commandeRepository->find($id);

        if (!$commande) {
            throw $this->createNotFoundException('Order not found');
        }

        if ($request->isMethod('POST')) {
            $commande->setClient($request->request->get('client'));
            $commande->setMontantTotal((float)$request->request->get('montantTotal'));
            $commande->setAdresseLivraison($request->request->get('adresseLivraison'));
            $commande->setStatut($request->request->get('statut'));

            $entityManager->flush();

            return $this->redirectToRoute('app_commande_index');
        }

        return $this->render('commande/edit.html.twig', [
            'commande' => $commande,
        ]);
    }

    #[Route('/commande/{id}/delete', name: 'app_commande_delete')]
    public function delete(int $id, CommandeRepository $commandeRepository, EntityManagerInterface $entityManager): Response
    {
        $commande = $commandeRepository->find($id);

        if (!$commande) {
            throw $this->createNotFoundException('Order not found');
        }

        $entityManager->remove($commande);
        $entityManager->flush();

        return $this->redirectToRoute('app_commande_index');
    }

    #[Route('/commande/{id}', name: 'app_commande_show')]
    public function show(int $id, CommandeRepository $commandeRepository, LivraisonRepository $livraisonRepository): Response
    {
        $commande = $commandeRepository->find($id);

        if (!$commande) {
            throw $this->createNotFoundException('Order not found');
        }

        $livraison = $livraisonRepository->findByCommande($id);

        return $this->render('commande/show.html.twig', [
            'commande' => $commande,
            'livraison' => $livraison,
        ]);
    }
}
