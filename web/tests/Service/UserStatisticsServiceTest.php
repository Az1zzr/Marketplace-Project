<?php

namespace App\Tests\Service;

use App\Repository\UserRepository;
use App\Service\UserStatisticsService;
use PHPUnit\Framework\TestCase;

/**
 * Tests unitaires pour UserStatisticsService
 *
 * Règles métier testées :
 *   1. Comptes créés par mois  → countAccountsCreatedInMonth()
 *   2. Comptes bloqués         → countBlockedAccounts() + isBlockRateAboveThreshold()
 *
 * On utilise des MOCKS pour simuler UserRepository
 * (pas de base de données nécessaire).
 */
class UserStatisticsServiceTest extends TestCase
{
    // ══════════════════════════════════════════════════════════════════════════
    // RÈGLE MÉTIER 1 — Comptes créés dans un mois donné
    // ══════════════════════════════════════════════════════════════════════════

    /**
     * CAS NOMINAL : Le repository retourne des données, on filtre le bon mois.
     */
    public function testCountAccountsCreatedInMonth_ReturnsCorrectTotal(): void
    {
        // ── Arrange ──────────────────────────────────────────────────────────
        $mockRepo = $this->createMock(UserRepository::class);
        $mockRepo->method('countUsersByMonth')->willReturn([
            ['label' => 'Jan 2025', 'total' => 5],
            ['label' => 'Feb 2025', 'total' => 3],
            ['label' => 'Mar 2025', 'total' => 8],
        ]);

        $service = new UserStatisticsService($mockRepo);

        // ── Act ───────────────────────────────────────────────────────────────
        $result = $service->countAccountsCreatedInMonth(2, 2025); // Février 2025

        // ── Assert ────────────────────────────────────────────────────────────
        $this->assertSame(3, $result);
    }

    /**
     * CAS LIMITE : Aucun compte créé ce mois → retourne 0.
     */
    public function testCountAccountsCreatedInMonth_ReturnsZeroWhenMonthAbsent(): void
    {
        $mockRepo = $this->createMock(UserRepository::class);
        $mockRepo->method('countUsersByMonth')->willReturn([
            ['label' => 'Jan 2025', 'total' => 5],
        ]);

        $service = new UserStatisticsService($mockRepo);

        $result = $service->countAccountsCreatedInMonth(6, 2025); // Juin → absent

        $this->assertSame(0, $result);
    }

    /**
     * CAS LIMITE : Repository retourne un tableau vide → 0.
     */
    public function testCountAccountsCreatedInMonth_ReturnsZeroWhenNoData(): void
    {
        $mockRepo = $this->createMock(UserRepository::class);
        $mockRepo->method('countUsersByMonth')->willReturn([]);

        $service = new UserStatisticsService($mockRepo);

        $result = $service->countAccountsCreatedInMonth(1, 2025);

        $this->assertSame(0, $result);
    }

    /**
     * CAS ERREUR : Mois invalide (0) → exception.
     */
    public function testCountAccountsCreatedInMonth_ThrowsOnInvalidMonth_Zero(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Le mois doit être compris entre 1 et 12');

        $mockRepo = $this->createMock(UserRepository::class);
        $service  = new UserStatisticsService($mockRepo);

        $service->countAccountsCreatedInMonth(0, 2025);
    }

    /**
     * CAS ERREUR : Mois invalide (13) → exception.
     */
    public function testCountAccountsCreatedInMonth_ThrowsOnInvalidMonth_Thirteen(): void
    {
        $this->expectException(\InvalidArgumentException::class);

        $mockRepo = $this->createMock(UserRepository::class);
        $service  = new UserStatisticsService($mockRepo);

        $service->countAccountsCreatedInMonth(13, 2025);
    }

    /**
     * CAS ERREUR : Année invalide (avant 2000) → exception.
     */
    public function testCountAccountsCreatedInMonth_ThrowsOnInvalidYear(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('L\'année doit être comprise entre 2000');

        $mockRepo = $this->createMock(UserRepository::class);
        $service  = new UserStatisticsService($mockRepo);

        $service->countAccountsCreatedInMonth(1, 1999);
    }

    // ══════════════════════════════════════════════════════════════════════════
    // RÈGLE MÉTIER 2 — Comptes bloqués
    // ══════════════════════════════════════════════════════════════════════════

    /**
     * CAS NOMINAL : 4 comptes bloqués → retourne 4.
     */
    public function testCountBlockedAccounts_ReturnsCorrectCount(): void
    {
        $mockRepo = $this->createMock(UserRepository::class);
        $mockRepo->method('countBlockedUsers')->willReturn(4);

        $service = new UserStatisticsService($mockRepo);

        $result = $service->countBlockedAccounts();

        $this->assertSame(4, $result);
    }

    /**
     * CAS LIMITE : Aucun compte bloqué → retourne 0.
     */
    public function testCountBlockedAccounts_ReturnsZeroWhenNoneBlocked(): void
    {
        $mockRepo = $this->createMock(UserRepository::class);
        $mockRepo->method('countBlockedUsers')->willReturn(0);

        $service = new UserStatisticsService($mockRepo);

        $result = $service->countBlockedAccounts();

        $this->assertSame(0, $result);
    }

    /**
     * CAS ERREUR : Repository retourne une valeur négative → exception.
     */
    public function testCountBlockedAccounts_ThrowsOnNegativeValue(): void
    {
        $this->expectException(\UnexpectedValueException::class);
        $this->expectExceptionMessage('ne peut pas être négatif');

        $mockRepo = $this->createMock(UserRepository::class);
        $mockRepo->method('countBlockedUsers')->willReturn(-1);

        $service = new UserStatisticsService($mockRepo);
        $service->countBlockedAccounts();
    }

    /**
     * CAS NOMINAL : Taux blocage 40% > seuil 30% → true.
     */
    public function testIsBlockRateAboveThreshold_ReturnsTrueWhenExceeded(): void
    {
        // 4 bloqués / (6 actifs + 4 bloqués) = 40%
        $mockRepo = $this->createMock(UserRepository::class);
        $mockRepo->method('countBlockedUsers')->willReturn(4);
        $mockRepo->method('countActiveUsers')->willReturn(6);

        $service = new UserStatisticsService($mockRepo);

        $this->assertTrue($service->isBlockRateAboveThreshold(30.0));
    }

    /**
     * CAS NOMINAL : Taux blocage 10% < seuil 30% → false.
     */
    public function testIsBlockRateAboveThreshold_ReturnsFalseWhenNotExceeded(): void
    {
        // 1 bloqué / (9 actifs + 1 bloqué) = 10%
        $mockRepo = $this->createMock(UserRepository::class);
        $mockRepo->method('countBlockedUsers')->willReturn(1);
        $mockRepo->method('countActiveUsers')->willReturn(9);

        $service = new UserStatisticsService($mockRepo);

        $this->assertFalse($service->isBlockRateAboveThreshold(30.0));
    }

    /**
     * CAS LIMITE : Aucun utilisateur du tout → false (taux = 0%).
     */
    public function testIsBlockRateAboveThreshold_ReturnsFalseWhenNoUsers(): void
    {
        $mockRepo = $this->createMock(UserRepository::class);
        $mockRepo->method('countBlockedUsers')->willReturn(0);
        $mockRepo->method('countActiveUsers')->willReturn(0);

        $service = new UserStatisticsService($mockRepo);

        $this->assertFalse($service->isBlockRateAboveThreshold(50.0));
    }

    /**
     * CAS ERREUR : Seuil invalide (-5) → exception.
     */
    public function testIsBlockRateAboveThreshold_ThrowsOnNegativeThreshold(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Le seuil doit être compris entre 0 et 100');

        $mockRepo = $this->createMock(UserRepository::class);
        $service  = new UserStatisticsService($mockRepo);

        $service->isBlockRateAboveThreshold(-5.0);
    }

    /**
     * CAS ERREUR : Seuil invalide (150) → exception.
     */
    public function testIsBlockRateAboveThreshold_ThrowsOnThresholdAbove100(): void
    {
        $this->expectException(\InvalidArgumentException::class);

        $mockRepo = $this->createMock(UserRepository::class);
        $service  = new UserStatisticsService($mockRepo);

        $service->isBlockRateAboveThreshold(150.0);
    }
}
