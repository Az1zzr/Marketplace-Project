<?php

namespace App\Controller;

use App\Entity\Commande;
use App\Entity\User;
use App\Repository\CommandeRepository;
use App\Repository\LigneCommandeRepository;
use App\Service\InputValidationService;
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
        $this->denyUnlessBuyerOrAdmin();
        $currentUser = $this->requireCurrentUser();

        $search = $request->query->get('search', '');
        $sort = $request->query->get('sort', 'dateCommande');
        $order = $request->query->get('order', 'desc');
        $statut = $request->query->get('statut', '');

        $validSorts = ['numeroCommande', 'client', 'dateCommande', 'montantTotal', 'statut'];
        $sort = in_array($sort, $validSorts) ? $sort : 'dateCommande';
        $order = in_array($order, ['asc', 'desc']) ? $order : 'desc';

        $commandes = $commandeRepository->findBySearchAndSortForUser($currentUser, $search, $sort, $order, $statut);
        $cart = $this->isBuyer() ? $commandeRepository->findDraftCartForUser($currentUser) : null;

        return $this->render('commande/index.html.twig', [
            'commandes' => $commandes,
            'cart' => $cart,
            'search' => $search,
            'sort' => $sort,
            'order' => $order,
            'statut' => $statut,
        ]);
    }

    #[Route('/commande/new', name: 'app_commande_new')]
    public function new(
        Request $request,
        CommandeRepository $commandeRepository,
        InputValidationService $validationService,
        EntityManagerInterface $entityManager
    ): Response
    {
        $this->denyUnlessBuyer();
        $currentUser = $this->requireCurrentUser();
        $cart = $commandeRepository->findDraftCartForUser($currentUser);
        $errors = [];

        if ($request->isMethod('POST')) {
            if (!$cart || $cart->getLignesCommande()->isEmpty()) {
                $this->addFlash('error', 'Your current order is empty. Add products before checkout.');
                return $this->redirectToRoute('app_produit_index');
            }

            $address = (string) $request->request->get('adresseLivraison', '');
            $addressValidation = $validationService->validateDeliveryAddress($address);
            if (!$addressValidation['valid']) {
                $errors['adresseLivraison'] = $addressValidation['message'];
            }

            foreach ($cart->getLignesCommande() as $ligneCommande) {
                $produit = $ligneCommande->getProduit();
                if (!$produit) {
                    $errors['cart'] = 'One of the products in your cart no longer exists.';
                    break;
                }

                if (!$produit->hasAvailableQuantity($ligneCommande->getQuantite())) {
                    $errors['cart'] = sprintf('The product "%s" no longer has enough stock for the selected quantity.', $produit->getNomProduit());
                    break;
                }
            }

            if (empty($errors)) {
                foreach ($cart->getLignesCommande() as $ligneCommande) {
                    $produit = $ligneCommande->getProduit();
                    if (!$produit) {
                        continue;
                    }

                    $produit->decreaseQuantite($ligneCommande->getQuantite());
                }

                $cart
                    ->setNumeroCommande($this->generateOrderNumber('CMD'))
                    ->setClient($currentUser->getNomComplet())
                    ->setClientUser($currentUser)
                    ->setDateCommande(new \DateTime('today'))
                    ->setAdresseLivraison($address)
                    ->setStatut(Commande::STATUS_PENDING)
                    ->recalculateMontantTotal();

                $entityManager->flush();

                $this->addFlash('success', 'Your order has been confirmed. You can now track it from your orders list.');
                return $this->redirectToRoute('app_commande_show', ['id' => $cart->getIdCommande()]);
            }
        }

        return $this->render('commande/new.html.twig', [
            'cart' => $cart,
            'errors' => $errors,
        ]);
    }

    #[Route('/commande/ligne/{id}/delete', name: 'app_commande_line_delete', methods: ['POST'])]
    public function deleteLine(int $id, LigneCommandeRepository $ligneCommandeRepository, EntityManagerInterface $entityManager): Response
    {
        $this->denyUnlessBuyer();
        $currentUser = $this->requireCurrentUser();

        $ligneCommande = $ligneCommandeRepository->find($id);
        if (!$ligneCommande) {
            throw $this->createNotFoundException('Order item not found');
        }

        $commande = $ligneCommande->getCommande();
        if (!$commande || !$commande->isCart() || $commande->getClientUser()?->getId() !== $currentUser->getId()) {
            throw $this->createAccessDeniedException('You can only manage items from your current order.');
        }

        $commande->removeLigneCommande($ligneCommande);
        if ($commande->getLignesCommande()->isEmpty()) {
            $entityManager->remove($commande);
            $this->addFlash('success', 'Your current order is now empty.');
        } else {
            $commande->recalculateMontantTotal();
            $this->addFlash('success', 'The product was removed from your current order.');
        }

        $entityManager->flush();

        return $this->redirectToRoute('app_commande_new');
    }

    #[Route('/commande/{id}/edit', name: 'app_commande_edit')]
    public function edit(
        int $id,
        Request $request,
        CommandeRepository $commandeRepository,
        InputValidationService $validationService,
        EntityManagerInterface $entityManager
    ): Response
    {
        $this->denyUnlessAdmin();
        $currentUser = $this->requireCurrentUser();

        $commande = $commandeRepository->findOneVisibleForUser($id, $currentUser);

        if (!$commande) {
            throw $this->createNotFoundException('Order not found');
        }

        if ($commande->isCart()) {
            throw $this->createNotFoundException('Draft orders cannot be edited from this page.');
        }

        $errors = [];

        if ($request->isMethod('POST')) {
            $address = (string) $request->request->get('adresseLivraison', '');
            $status = (string) $request->request->get('statut', Commande::STATUS_PENDING);

            $addressValidation = $validationService->validateDeliveryAddress($address);
            if (!$addressValidation['valid']) {
                $errors['adresseLivraison'] = $addressValidation['message'];
            }

            if (!in_array($status, [Commande::STATUS_PENDING, 'Confirmee', 'Annulee'], true)) {
                $errors['statut'] = 'Invalid order status.';
            }

            if (empty($errors)) {
                $commande
                    ->setAdresseLivraison($address)
                    ->setStatut($status)
                    ->recalculateMontantTotal();

                $entityManager->flush();

                $this->addFlash('success', 'Order updated successfully.');
                return $this->redirectToRoute('app_commande_show', ['id' => $commande->getIdCommande()]);
            }
        }

        return $this->render('commande/edit.html.twig', [
            'commande' => $commande,
            'errors' => $errors,
        ]);
    }

    #[Route('/commande/{id}/delete', name: 'app_commande_delete')]
    public function delete(int $id, CommandeRepository $commandeRepository, EntityManagerInterface $entityManager): Response
    {
        $this->denyUnlessAdmin();
        $currentUser = $this->requireCurrentUser();

        $commande = $commandeRepository->findOneVisibleForUser($id, $currentUser);

        if (!$commande) {
            throw $this->createNotFoundException('Order not found');
        }

        $entityManager->remove($commande);
        $entityManager->flush();

        return $this->redirectToRoute('app_commande_index');
    }

    #[Route('/commande/{id}', name: 'app_commande_show')]
    public function show(int $id, CommandeRepository $commandeRepository): Response
    {
        $this->denyUnlessBuyerOrAdmin();
        $currentUser = $this->requireCurrentUser();

        $commande = $commandeRepository->findOneVisibleForUser($id, $currentUser);

        if (!$commande) {
            throw $this->createNotFoundException('Order not found');
        }

        if ($commande->isCart()) {
            return $this->redirectToRoute('app_commande_new');
        }

        $visibleLignesCommande = $commande->getLignesCommande()->toArray();
        if ($currentUser->hasRoleCode(User::ROLE_CODE_FOURNISSEUR)) {
            $visibleLignesCommande = array_values(array_filter(
                $visibleLignesCommande,
                static fn ($ligneCommande): bool => $ligneCommande->getProduit()?->getFournisseur()?->getId() === $currentUser->getId()
            ));
        }

        $visibleItemsTotal = array_reduce(
            $visibleLignesCommande,
            static fn (int $total, $ligneCommande): int => $total + $ligneCommande->getQuantite(),
            0
        );
        $visibleMontantTotal = array_reduce(
            $visibleLignesCommande,
            static fn (float $total, $ligneCommande): float => $total + $ligneCommande->getSousTotal(),
            0.0
        );

        return $this->render('commande/show.html.twig', [
            'commande' => $commande,
            'livraison' => $commande->getLivraison(),
            'canManageOrder' => $this->isGranted('ROLE_ADMIN'),
            'canManageDelivery' => $this->isGranted('ROLE_ADMIN') || $this->isGranted('ROLE_FOURNISSEUR'),
            'visibleLignesCommande' => $visibleLignesCommande,
            'visibleItemsTotal' => $visibleItemsTotal,
            'visibleMontantTotal' => $visibleMontantTotal,
            'isSupplierView' => $currentUser->hasRoleCode(User::ROLE_CODE_FOURNISSEUR),
        ]);
    }

    private function denyUnlessBuyerOrAdmin(): void
    {
        if ($this->isGranted('ROLE_ADMIN') || $this->isGranted('ROLE_CLIENT') || $this->isGranted('ROLE_FOURNISSEUR')) {
            return;
        }

        throw $this->createAccessDeniedException('Only admins, clients, and fournisseurs can access orders.');
    }

    private function denyUnlessBuyer(): void
    {
        if ($this->isGranted('ROLE_CLIENT')) {
            return;
        }

        throw $this->createAccessDeniedException('Only clients can checkout an order.');
    }

    private function denyUnlessAdmin(): void
    {
        if ($this->isGranted('ROLE_ADMIN')) {
            return;
        }

        throw $this->createAccessDeniedException('Only admins can manage confirmed orders.');
    }

    private function requireCurrentUser(): User
    {
        $user = $this->getUser();
        if (!$user instanceof User) {
            throw $this->createAccessDeniedException('You must be signed in to continue.');
        }

        return $user;
    }

    private function isBuyer(): bool
    {
        return $this->isGranted('ROLE_CLIENT');
    }

    private function generateOrderNumber(string $prefix): string
    {
        return sprintf('%s-%s-%04d', $prefix, date('Ymd'), random_int(1, 9999));
    }
}
