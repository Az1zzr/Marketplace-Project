<?php

namespace App\Tests\Entity;

use App\Entity\Feedback;
use App\Entity\LigneCommande;
use App\Entity\Livraison;
use App\Entity\Produit;
use App\Entity\Reponse;
use PHPUnit\Framework\TestCase;

class FeedbackTest extends TestCase
{
    public function testSetTitreTrimsValueAndDisplayTitleUsesIt(): void
    {
        $feedback = (new Feedback())
            ->setTitre('  Fast delivery  ');

        self::assertSame('Fast delivery', $feedback->getTitre());
        self::assertSame('Fast delivery', $feedback->getDisplayTitle());
    }

    public function testDisplayTitleFallsBackToProductFeedback(): void
    {
        $feedback = (new Feedback())
            ->setTitre('   ');

        self::assertSame('Product feedback', $feedback->getDisplayTitle());
    }

    public function testSetLigneCommandeCopiesProductWhenMissing(): void
    {
        $product = new Produit();
        $line = (new LigneCommande())
            ->setProduit($product);

        $feedback = (new Feedback())
            ->setLigneCommande($line);

        self::assertTrue($feedback->isProductFeedback());
        self::assertSame($product, $feedback->getProduit());
    }

    public function testDeliveryFeedbackIsDetectedAndHasDeliveryDefaultTitle(): void
    {
        $feedback = (new Feedback())
            ->setLivraison(new Livraison());

        self::assertTrue($feedback->isDeliveryFeedback());
        self::assertSame('Delivery feedback', $feedback->getDisplayTitle());
    }

    public function testAddAndRemoveReponseSynchronizesOwningSide(): void
    {
        $feedback = new Feedback();
        $response = new Reponse();

        $feedback->addReponse($response);

        self::assertTrue($feedback->getReponses()->contains($response));
        self::assertSame($feedback, $response->getFeedback());

        $feedback->removeReponse($response);

        self::assertFalse($feedback->getReponses()->contains($response));
        self::assertNull($response->getFeedback());
    }
}
