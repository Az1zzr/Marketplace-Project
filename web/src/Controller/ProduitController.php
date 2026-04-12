<?php

namespace App\Controller;

use App\Entity\Categorie;
use App\Entity\Commande;
use App\Entity\LigneCommande;
use App\Entity\Produit;
use App\Entity\User;
use App\Repository\CategorieRepository;
use App\Repository\CommandeRepository;
use App\Repository\FeedbackRepository;
use App\Repository\LigneCommandeRepository;
use App\Repository\ProduitRepository;
use App\Service\CurrencyConversionService;
use App\Service\InputValidationService;
use App\Service\ProductQrCodeService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\HeaderUtils;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

class ProduitController extends AbstractController
{
    #[Route('/produit', name: 'app_produit_index')]
    public function index(Request $request, ProduitRepository $produitRepository, CategorieRepository $categorieRepository): Response
    {
        $currentUser = $this->getUser();
        $search = $request->query->get('search', '');
        $sort = $request->query->get('sort', 'nomProduit');
        $order = $request->query->get('order', 'asc');
        $categorieId = $request->query->get('categorie', '');

        $validSorts = ['nomProduit', 'prix', 'quantite', 'adresse'];
        $sort = in_array($sort, $validSorts) ? $sort : 'nomProduit';
        $order = in_array($order, ['asc', 'desc']) ? $order : 'asc';

        $selectedCategorieId = ctype_digit((string) $categorieId) ? (int) $categorieId : null;

        $produits = $produitRepository->findBySearchAndSort(
            $search,
            $sort,
            $order,
            $selectedCategorieId,
            $currentUser instanceof User ? $currentUser : null
        );

        return $this->render('produit/index.html.twig', [
            'produits' => $produits,
            'categories' => $categorieRepository->findAllOrdered(),
            'selectedCategorieId' => $selectedCategorieId,
            'search' => $search,
            'sort' => $sort,
            'order' => $order,
        ]);
    }

    #[Route('/produit/new', name: 'app_produit_new')]
    public function new(Request $request, CategorieRepository $categorieRepository, EntityManagerInterface $entityManager): Response
    {
        $this->denyUnlessCatalogManager();

        $categories = $categorieRepository->findAllOrdered();
        $errors = [];

        if ($request->isMethod('POST')) {
            $produit = new Produit();
            $errors = $this->applyProductRequestData($produit, $request, $categorieRepository);

            if (empty($errors)) {
                $currentUser = $this->getUser();
                if ($currentUser instanceof User && $currentUser->hasRoleCode(User::ROLE_CODE_FOURNISSEUR)) {
                    $produit->setFournisseur($currentUser);
                }

                $entityManager->persist($produit);
                $entityManager->flush();

                $this->addFlash('success', 'Product created successfully.');
                return $this->redirectToRoute('app_produit_index');
            }
        }

        return $this->render('produit/new.html.twig', [
            'categories' => $categories,
            'errors' => $errors,
        ]);
    }

    #[Route('/produit/{id}/edit', name: 'app_produit_edit')]
    public function edit(int $id, Request $request, ProduitRepository $produitRepository, CategorieRepository $categorieRepository, EntityManagerInterface $entityManager): Response
    {
        $produit = $produitRepository->find($id);

        if (!$produit) {
            throw $this->createNotFoundException('Product not found');
        }

        $this->denyUnlessCanManageProduct($produit);

        $errors = [];

        if ($request->isMethod('POST')) {
            $errors = $this->applyProductRequestData($produit, $request, $categorieRepository);

            if (empty($errors)) {
                $entityManager->flush();

                $this->addFlash('success', 'Product updated successfully.');
                return $this->redirectToRoute('app_produit_index');
            }
        }

        return $this->render('produit/edit.html.twig', [
            'produit' => $produit,
            'categories' => $categorieRepository->findAllOrdered(),
            'errors' => $errors,
        ]);
    }

    #[Route('/produit/{id}/delete', name: 'app_produit_delete')]
    public function delete(int $id, ProduitRepository $produitRepository, EntityManagerInterface $entityManager): Response
    {
        $produit = $produitRepository->find($id);

        if (!$produit) {
            throw $this->createNotFoundException('Product not found');
        }

        $this->denyUnlessCanManageProduct($produit);

        $entityManager->remove($produit);
        $entityManager->flush();

        return $this->redirectToRoute('app_produit_index');
    }

    #[Route('/produit/{id}/buy', name: 'app_produit_buy', methods: ['POST'])]
    public function buy(
        int $id,
        Request $request,
        ProduitRepository $produitRepository,
        CommandeRepository $commandeRepository,
        InputValidationService $validationService,
        EntityManagerInterface $entityManager
    ): Response {
        $this->denyUnlessBuyer();

        $currentUser = $this->requireCurrentUser();
        $produit = $produitRepository->find($id);
        if (!$produit) {
            throw $this->createNotFoundException('Product not found');
        }

        $quantityInput = (string) $request->request->get('quantite', '1');
        $quantityValidation = $validationService->validateQuantity($quantityInput);
        if (!$quantityValidation['valid']) {
            $this->addFlash('error', $quantityValidation['message']);
            return $this->redirectToRoute('app_produit_show', ['id' => $id]);
        }

        $quantity = (int) $quantityInput;
        if (!$produit->hasAvailableQuantity($quantity)) {
            $this->addFlash('error', 'The requested quantity is not available for this product.');
            return $this->redirectToRoute('app_produit_show', ['id' => $id]);
        }

        $cart = $commandeRepository->findDraftCartForUser($currentUser);
        if (!$cart) {
            $cart = new Commande();
            $cart
                ->setNumeroCommande($this->generateOrderNumber('CART'))
                ->setClient($currentUser->getNomComplet())
                ->setClientUser($currentUser)
                ->setDateCommande(new \DateTime('today'))
                ->setMontantTotal(0.0)
                ->setAdresseLivraison('')
                ->setStatut(Commande::STATUS_CART);

            $entityManager->persist($cart);
        }

        $existingLine = null;
        foreach ($cart->getLignesCommande() as $ligneCommande) {
            if ($ligneCommande->getProduit()?->getId() === $produit->getId()) {
                $existingLine = $ligneCommande;
                break;
            }
        }

        $newQuantity = $quantity + ($existingLine?->getQuantite() ?? 0);
        if (!$produit->hasAvailableQuantity($newQuantity)) {
            $this->addFlash('error', 'The total quantity in your current order would exceed the available stock.');
            return $this->redirectToRoute('app_produit_show', ['id' => $id]);
        }

        if ($existingLine instanceof LigneCommande) {
            $existingLine->setQuantite($newQuantity);
        } else {
            $ligneCommande = new LigneCommande();
            $ligneCommande
                ->setProduit($produit)
                ->setQuantite($quantity)
                ->setPrixUnitaire((float) $produit->getPrix());

            $cart->addLigneCommande($ligneCommande);
        }

        $cart->recalculateMontantTotal();
        $entityManager->flush();

        $this->addFlash('success', 'Product added to your current order.');
        return $this->redirectToRoute('app_commande_new');
    }

    #[Route('/produit/{id}', name: 'app_produit_show')]
    public function show(
        int $id,
        ProduitRepository $produitRepository,
        FeedbackRepository $feedbackRepository,
        LigneCommandeRepository $ligneCommandeRepository,
        CommandeRepository $commandeRepository,
        CurrencyConversionService $currencyConversionService
    ): Response
    {
        $produit = $produitRepository->find($id);

        if (!$produit) {
            throw $this->createNotFoundException('Product not found');
        }

        $currentUser = $this->getUser();
        $eligibleFeedbackLine = null;
        $hasDraftCart = false;

        if ($currentUser instanceof User && $this->isBuyer()) {
            $eligibleFeedbackLine = $ligneCommandeRepository->findEligibleFeedbackItemForUserAndProduct($currentUser, $produit);
            $hasDraftCart = null !== $commandeRepository->findDraftCartForUser($currentUser);
        }

        $productUrl = $this->generateUrl('app_produit_show', ['id' => $produit->getId()], UrlGeneratorInterface::ABSOLUTE_URL);

        return $this->render('produit/show.html.twig', [
            'produit' => $produit,
            'feedbacks' => $feedbackRepository->findByProduit($produit),
            'canManageProduct' => $this->canManageProduct($produit),
            'canBuy' => $currentUser instanceof User && $this->isBuyer(),
            'eligibleFeedbackLine' => $eligibleFeedbackLine,
            'hasDraftCart' => $hasDraftCart,
            'convertedPrices' => $currencyConversionService->getPriceConversions((float) $produit->getPrix()),
            'productUrl' => $productUrl,
        ]);
    }

    #[Route('/produit/{id}/qr-code', name: 'app_produit_qr_code', methods: ['GET'])]
    public function qrCode(
        int $id,
        Request $request,
        ProduitRepository $produitRepository,
        ProductQrCodeService $productQrCodeService
    ): Response {
        $produit = $produitRepository->find($id);

        if (!$produit) {
            throw $this->createNotFoundException('Product not found');
        }

        $productUrl = $this->generateUrl('app_produit_show', ['id' => $produit->getId()], UrlGeneratorInterface::ABSOLUTE_URL);
        $svg = $productQrCodeService->generateSvgString($productUrl);

        $headers = [
            'Content-Type' => 'image/svg+xml',
            'Cache-Control' => 'public, max-age=3600',
        ];

        if ($request->query->getBoolean('download')) {
            $headers['Content-Disposition'] = HeaderUtils::makeDisposition(
                HeaderUtils::DISPOSITION_ATTACHMENT,
                sprintf('product-%d-qr-code.svg', $produit->getId())
            );
        }

        return new Response($svg, Response::HTTP_OK, $headers);
    }

    private function denyUnlessCatalogManager(): void
    {
        if ($this->isGranted('ROLE_ADMIN') || $this->isGranted('ROLE_FOURNISSEUR')) {
            return;
        }

        throw $this->createAccessDeniedException('Only admins and fournisseurs can manage products.');
    }

    private function denyUnlessBuyer(): void
    {
        if ($this->isGranted('ROLE_CLIENT')) {
            return;
        }

        throw $this->createAccessDeniedException('Only clients can add products to an order.');
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

    private function canManageProduct(Produit $produit): bool
    {
        if ($this->isGranted('ROLE_ADMIN')) {
            return true;
        }

        $currentUser = $this->getUser();
        if (!$currentUser instanceof User || !$currentUser->hasRoleCode(User::ROLE_CODE_FOURNISSEUR)) {
            return false;
        }

        return $produit->getFournisseur()?->getId() === $currentUser->getId();
    }

    private function denyUnlessCanManageProduct(Produit $produit): void
    {
        if ($this->canManageProduct($produit)) {
            return;
        }

        throw $this->createAccessDeniedException('You can only manage your own products.');
    }

    private function applyProductRequestData(Produit $produit, Request $request, CategorieRepository $categorieRepository): array
    {
        $errors = [];

        $nomProduit = trim((string) $request->request->get('nomProduit', ''));
        $adresse = trim((string) $request->request->get('adresse', ''));
        $prix = (string) $request->request->get('prix', '');
        $quantite = (string) $request->request->get('quantite', '');
        $imageURL = trim((string) $request->request->get('imageURL', ''));
        $categorieId = (string) $request->request->get('categorie', '');

        if ('' === $nomProduit) {
            $errors['nomProduit'] = 'Product name is required.';
        }

        if ('' === $adresse) {
            $errors['adresse'] = 'Address is required.';
        }

        if (!is_numeric($prix) || (float) $prix < 0) {
            $errors['prix'] = 'Price must be a valid positive number.';
        }

        if (!ctype_digit($quantite)) {
            $errors['quantite'] = 'Quantity must be a whole number.';
        }

        $categorie = ctype_digit($categorieId) ? $categorieRepository->find((int) $categorieId) : null;
        if (!$categorie instanceof Categorie) {
            $errors['categorie'] = 'Please choose a valid category.';
        }

        if (empty($errors)) {
            $produit
                ->setNomProduit($nomProduit)
                ->setAdresse($adresse)
                ->setPrix((float) $prix)
                ->setQuantite((int) $quantite)
                ->setImageURL('' === $imageURL ? null : $imageURL)
                ->setCategorie($categorie);
        }

        return $errors;
    }
}
