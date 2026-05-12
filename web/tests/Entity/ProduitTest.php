<?php

namespace App\Tests\Entity;

use App\Entity\Categorie;
use App\Entity\Produit;
use App\Entity\User;
use PHPUnit\Framework\TestCase;

class ProduitTest extends TestCase
{
    public function testManagedProductDataCanBeUpdated(): void
    {
        $categorie = new Categorie();
        $fournisseur = new User();

        $produit = (new Produit())
            ->setNomProduit('Laptop Dell')
            ->setAdresse('Tunis')
            ->setPrix(1299.99)
            ->setQuantite(8)
            ->setImageURL('/uploads/products/laptop.jpg')
            ->setSlug('laptop-dell')
            ->setCategorie($categorie)
            ->setFournisseur($fournisseur);

        self::assertSame('Laptop Dell', $produit->getNomProduit());
        self::assertSame('Tunis', $produit->getAdresse());
        self::assertSame(1299.99, $produit->getPrix());
        self::assertSame(8, $produit->getQuantite());
        self::assertSame('/uploads/products/laptop.jpg', $produit->getImageURL());
        self::assertSame('laptop-dell', $produit->getSlug());
        self::assertSame($categorie, $produit->getCategorie());
        self::assertSame($fournisseur, $produit->getFournisseur());
    }

    public function testStockDecreaseNeverDropsBelowZero(): void
    {
        $produit = (new Produit())->setQuantite(4);

        $produit->decreaseQuantite(10);

        self::assertSame(0, $produit->getQuantite());
        self::assertFalse($produit->hasAvailableQuantity(1));
    }
}
