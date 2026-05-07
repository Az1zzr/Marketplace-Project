<?php

namespace App\Tests\Service;

use App\Entity\Produit;
use App\Service\ProduitManager;
use PHPUnit\Framework\TestCase;

class ProduitManagerTest extends TestCase
{
    public function testValidProduit(): void
    {
        $produit = new Produit();

        $produit->setNomProduit('Laptop Gaming');
        $produit->setPrix(2500);
        $produit->setQuantite(10);

        $manager = new ProduitManager();

        $this->assertTrue($manager->validate($produit));
    }

    public function testProduitWithoutName(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Le nom du produit est obligatoire.');

        $produit = new Produit();

        $produit->setNomProduit('');
        $produit->setPrix(100);
        $produit->setQuantite(5);

        $manager = new ProduitManager();

        $manager->validate($produit);
    }

    public function testProduitWithNegativePrice(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Le prix doit être supérieur à zéro.');

        $produit = new Produit();

        $produit->setNomProduit('Produit Test');
        $produit->setPrix(-50);
        $produit->setQuantite(5);

        $manager = new ProduitManager();

        $manager->validate($produit);
    }

    public function testProduitWithNegativeQuantity(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('La quantité ne peut pas être négative.');

        $produit = new Produit();

        $produit->setNomProduit('Produit Test');
        $produit->setPrix(150);
        $produit->setQuantite(-3);

        $manager = new ProduitManager();

        $manager->validate($produit);
    }
}