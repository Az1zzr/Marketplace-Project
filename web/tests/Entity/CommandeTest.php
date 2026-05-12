<?php

namespace App\Tests\Entity;

use App\Entity\Commande;
use App\Entity\LigneCommande;
use App\Entity\Produit;
use PHPUnit\Framework\TestCase;

class CommandeTest extends TestCase
{
    public function testAddLigneCommandeSynchronizesOwningSide(): void
    {
        $commande = new Commande();
        $ligneCommande = new LigneCommande();

        $commande->addLigneCommande($ligneCommande);

        self::assertTrue($commande->getLignesCommande()->contains($ligneCommande));
        self::assertSame($commande, $ligneCommande->getCommande());
    }

    public function testRemoveLigneCommandeSynchronizesOwningSide(): void
    {
        $commande = new Commande();
        $ligneCommande = new LigneCommande();

        $commande->addLigneCommande($ligneCommande);
        $commande->removeLigneCommande($ligneCommande);

        self::assertFalse($commande->getLignesCommande()->contains($ligneCommande));
        self::assertNull($ligneCommande->getCommande());
    }

    public function testGetTotalItemsSumsAllOrderLines(): void
    {
        $commande = new Commande();
        $commande
            ->addLigneCommande((new LigneCommande())->setQuantite(2))
            ->addLigneCommande((new LigneCommande())->setQuantite(4));

        self::assertSame(6, $commande->getTotalItems());
    }

    public function testRecalculateMontantTotalSumsAllSubTotals(): void
    {
        $commande = new Commande();
        $commande
            ->addLigneCommande((new LigneCommande())->setQuantite(2)->setPrixUnitaire(15.5))
            ->addLigneCommande((new LigneCommande())->setQuantite(3)->setPrixUnitaire(8.0));

        $commande->recalculateMontantTotal();

        self::assertSame(55.0, $commande->getMontantTotal());
    }

    public function testLigneCommandeNormalizesInvalidQuantity(): void
    {
        $ligneCommande = (new LigneCommande())->setQuantite(0);

        self::assertSame(1, $ligneCommande->getQuantite());
    }

    public function testLigneCommandeNormalizesNegativeUnitPrice(): void
    {
        $ligneCommande = (new LigneCommande())->setPrixUnitaire(-10.0);

        self::assertSame(0.0, $ligneCommande->getPrixUnitaire());
    }

    public function testDeliveryFieldsAreTrimmedAndBlankValuesBecomeNull(): void
    {
        $commande = (new Commande())
            ->setAdresseLivraison('  12 Avenue Habib Bourguiba  ')
            ->setGouvernorat('   ')
            ->setTelephoneLivraison('   ')
            ->setCommentaireLivraison('   ');

        self::assertSame('12 Avenue Habib Bourguiba', $commande->getAdresseLivraison());
        self::assertNull($commande->getGouvernorat());
        self::assertNull($commande->getTelephoneLivraison());
        self::assertNull($commande->getCommentaireLivraison());
    }

    public function testCartStatusIsDetected(): void
    {
        $commande = (new Commande())->setStatut(Commande::STATUS_CART);

        self::assertTrue($commande->isCart());
    }

    public function testProduitStockAvailabilityAndDecrease(): void
    {
        $produit = (new Produit())->setQuantite(5);

        self::assertTrue($produit->hasAvailableQuantity(2));
        self::assertFalse($produit->hasAvailableQuantity(6));

        $produit->decreaseQuantite(3);

        self::assertSame(2, $produit->getQuantite());
    }
}
