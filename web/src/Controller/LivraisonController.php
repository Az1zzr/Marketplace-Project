<?php

namespace App\Controller;

use App\Entity\Livraison;
use App\Entity\User;
use App\Repository\LivraisonRepository;
use App\Repository\CommandeRepository;
use App\Service\DeliveryRiskAiService;
use App\Service\InputValidationService;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LivraisonController extends AbstractController
{
    #[Route('/livraison', name: 'app_livraison_index')]
    public function index(
        Request $request,
        LivraisonRepository $livraisonRepository,
        PaginatorInterface $paginator,
        DeliveryRiskAiService $deliveryRiskAiService
    ): Response
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

        $livraisons = $paginator->paginate(
            $livraisonRepository->createSearchQueryBuilderForUser($currentUser, $search, $sort, $order, $statut),
            max(1, $request->query->getInt('page', 1)),
            6,
            ['distinct' => true]
        );

        $deliveryInsights = [];
        foreach ($livraisons as $livraison) {
            $deliveryInsights[$livraison->getIdLivraison()] = $deliveryRiskAiService->analyze($livraison);
        }

        return $this->render('livraison/index.html.twig', [
            'livraisons' => $livraisons,
            'deliveryInsights' => $deliveryInsights,
            'canManageLivraisons' => $this->isGranted('ROLE_ADMIN') || $this->isGranted('ROLE_FOURNISSEUR'),
            'search' => $search,
            'sort' => $sort,
            'order' => $order,
            'statut' => $statut,
        ]);
    }

    #[Route('/livraison/new/{commandeId}', name: 'app_livraison_new')]
    public function new(
        int $commandeId,
        Request $request,
        LivraisonRepository $livraisonRepository,
        CommandeRepository $commandeRepository,
        InputValidationService $validationService,
        EntityManagerInterface $entityManager
    ): Response
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

        $errors = [];
        $formData = [
            'dateLivraison' => (new \DateTimeImmutable('today'))->format('Y-m-d'),
            'livreur' => '',
            'statutLivraison' => Livraison::STATUS_IN_PROGRESS,
            'noteDelivery' => '',
            'latitude' => '',
            'longitude' => '',
        ];

        if ($request->isMethod('POST')) {
            $submission = $this->validateDeliverySubmission($request, $validationService);
            $errors = $submission['errors'];
            $formData = $submission['formData'];

            if (empty($errors)) {
                $livraison = new Livraison();

                $numeroBL = 'BL-' . date('Ymd') . '-' . str_pad(rand(1, 9999), 4, '0', STR_PAD_LEFT);
                $livraison->setCommande($commande);
                $commande->setLivraison($livraison);
                $livraison->setNumeroBL($numeroBL);
                $livraison->setDateLivraison($submission['deliveryDate']);
                $livraison->setLivreur($submission['driver']);
                $livraison->setStatutLivraison($submission['status']);
                $livraison->setNoteDelivery($submission['note']);
                $livraison->setLatitude($submission['latitude']);
                $livraison->setLongitude($submission['longitude']);

                $entityManager->persist($livraison);
                $entityManager->flush();

                $this->addFlash('success', 'Delivery created successfully.');
                return $this->redirectToRoute('app_commande_show', ['id' => $commandeId]);
            }
        }

        return $this->render('livraison/new.html.twig', [
            'commande' => $commande,
            'errors' => $errors,
            'formData' => $formData,
            'statuses' => Livraison::getAvailableStatuses(),
        ]);
    }

    #[Route('/livraison/{id}/edit', name: 'app_livraison_edit')]
    public function edit(
        int $id,
        Request $request,
        LivraisonRepository $livraisonRepository,
        InputValidationService $validationService,
        EntityManagerInterface $entityManager
    ): Response
    {
        $this->denyUnlessManager();
        $currentUser = $this->requireCurrentUser();

        $livraison = $livraisonRepository->findOneVisibleForUser($id, $currentUser);

        if (!$livraison) {
            throw $this->createNotFoundException('Delivery not found');
        }

        $errors = [];
        $formData = [
            'dateLivraison' => $livraison->getDateLivraison()?->format('Y-m-d') ?? '',
            'livreur' => $livraison->getLivreur() ?? '',
            'statutLivraison' => $livraison->getStatutLivraison() ?? Livraison::STATUS_IN_PROGRESS,
            'noteDelivery' => $livraison->getNoteDelivery() ?? '',
            'latitude' => $livraison->hasLocation() ? number_format((float) $livraison->getLatitude(), 6, '.', '') : '',
            'longitude' => $livraison->hasLocation() ? number_format((float) $livraison->getLongitude(), 6, '.', '') : '',
        ];

        if ($request->isMethod('POST')) {
            $submission = $this->validateDeliverySubmission($request, $validationService);
            $errors = $submission['errors'];
            $formData = $submission['formData'];

            if (empty($errors)) {
                $livraison->setDateLivraison($submission['deliveryDate']);
                $livraison->setLivreur($submission['driver']);
                $livraison->setStatutLivraison($submission['status']);
                $livraison->setNoteDelivery($submission['note']);
                $livraison->setLatitude($submission['latitude']);
                $livraison->setLongitude($submission['longitude']);

                $entityManager->flush();

                $this->addFlash('success', 'Delivery updated successfully.');
                return $this->redirectToRoute('app_commande_show', ['id' => $livraison->getCommande()->getIdCommande()]);
            }
        }

        return $this->render('livraison/edit.html.twig', [
            'livraison' => $livraison,
            'errors' => $errors,
            'formData' => $formData,
            'statuses' => Livraison::getAvailableStatuses(),
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
        $livraison->getCommande()?->setLivraison(null);

        $entityManager->remove($livraison);
        $entityManager->flush();

        $this->addFlash('success', 'Delivery deleted successfully.');

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

    private function validateDeliverySubmission(Request $request, InputValidationService $validationService): array
    {
        $formData = [
            'dateLivraison' => trim((string) $request->request->get('dateLivraison', '')),
            'livreur' => trim((string) $request->request->get('livreur', '')),
            'statutLivraison' => trim((string) $request->request->get('statutLivraison', Livraison::STATUS_IN_PROGRESS)),
            'noteDelivery' => trim((string) $request->request->get('noteDelivery', '')),
            'latitude' => trim((string) $request->request->get('latitude', '')),
            'longitude' => trim((string) $request->request->get('longitude', '')),
        ];

        $errors = [];
        $deliveryDate = $validationService->parseDate($formData['dateLivraison']);
        if (!$deliveryDate) {
            $errors['dateLivraison'] = 'Please choose a valid delivery date.';
        }

        if ('' === $formData['livreur']) {
            $errors['livreur'] = 'Driver name is required.';
        } elseif (mb_strlen($formData['livreur']) < 2 || mb_strlen($formData['livreur']) > 100) {
            $errors['livreur'] = 'Driver name must contain between 2 and 100 characters.';
        }

        if (!in_array($formData['statutLivraison'], Livraison::getAvailableStatuses(), true)) {
            $errors['statutLivraison'] = 'Invalid delivery status.';
        }

        if (mb_strlen($formData['noteDelivery']) > 255) {
            $errors['noteDelivery'] = 'Delivery comment cannot be longer than 255 characters.';
        }

        $coordinates = $this->validateCoordinates($formData['latitude'], $formData['longitude']);
        if (!$coordinates['valid']) {
            $errors['coordinates'] = $coordinates['message'];
        }

        return [
            'errors' => $errors,
            'formData' => $formData,
            'deliveryDate' => $deliveryDate,
            'driver' => $formData['livreur'],
            'status' => $formData['statutLivraison'],
            'note' => '' === $formData['noteDelivery'] ? null : $formData['noteDelivery'],
            'latitude' => $coordinates['latitude'],
            'longitude' => $coordinates['longitude'],
        ];
    }

    private function validateCoordinates(string $latitudeInput, string $longitudeInput): array
    {
        if ('' === $latitudeInput && '' === $longitudeInput) {
            return [
                'valid' => true,
                'message' => '',
                'latitude' => 0.0,
                'longitude' => 0.0,
            ];
        }

        if ('' === $latitudeInput || '' === $longitudeInput) {
            return [
                'valid' => false,
                'message' => 'Latitude and longitude must both be filled in to pin the delivery on the map.',
                'latitude' => 0.0,
                'longitude' => 0.0,
            ];
        }

        if (!is_numeric($latitudeInput) || !is_numeric($longitudeInput)) {
            return [
                'valid' => false,
                'message' => 'Latitude and longitude must be valid numeric coordinates.',
                'latitude' => 0.0,
                'longitude' => 0.0,
            ];
        }

        $latitude = (float) $latitudeInput;
        $longitude = (float) $longitudeInput;

        if ($latitude < -90 || $latitude > 90) {
            return [
                'valid' => false,
                'message' => 'Latitude must be between -90 and 90.',
                'latitude' => 0.0,
                'longitude' => 0.0,
            ];
        }

        if ($longitude < -180 || $longitude > 180) {
            return [
                'valid' => false,
                'message' => 'Longitude must be between -180 and 180.',
                'latitude' => 0.0,
                'longitude' => 0.0,
            ];
        }

        return [
            'valid' => true,
            'message' => '',
            'latitude' => $latitude,
            'longitude' => $longitude,
        ];
    }
}
