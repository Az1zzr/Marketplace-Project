<?php

namespace App\Tests\Service;

use App\Service\ProfanityFilterService;
use PHPUnit\Framework\TestCase;

class ProfanityFilterServiceTest extends TestCase
{
    public function testContainsProfanityMatchesWholeWordsOnly(): void
    {
        $service = new ProfanityFilterService();

        self::assertFalse($service->containsProfanity('Je suis content du service.'));
        self::assertTrue($service->containsProfanity('Ce vendeur est con.'));
    }

    public function testGetProfanityWordsReturnsDetectedWords(): void
    {
        $service = new ProfanityFilterService();

        self::assertSame(['merde', 'fuck'], $service->getProfanityWords('Merde, fuck!'));
    }
}
