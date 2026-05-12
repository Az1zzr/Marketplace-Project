<?php

namespace App\Service;

use App\Repository\UserRepository;

/**
 * Service métier — Statistiques utilisateurs
 *
 * Règles métier testées :
 *   1. compter les comptes créés dans un mois donné
 *   2. compter les comptes bloqués (isActive = false)
 */
class UserStatisticsService
{
    public function __construct(
        private readonly UserRepository $userRepository
    ) {
    }

    // ──────────────────────────────────────────────────────────────────────────
    // Règle métier 1 : Comptes créés dans un mois donné
    // ──────────────────────────────────────────────────────────────────────────

    /**
     * Retourne le nombre de comptes créés dans un mois/année donné.
     *
     * @throws \InvalidArgumentException si le mois ou l'année est invalide
     */
    public function countAccountsCreatedInMonth(int $month, int $year): int
    {
        if ($month < 1 || $month > 12) {
            throw new \InvalidArgumentException(
                'Le mois doit être compris entre 1 et 12.'
            );
        }

        if ($year < 2000 || $year > (int) date('Y')) {
            throw new \InvalidArgumentException(
                sprintf('L\'année doit être comprise entre 2000 et %s.', date('Y'))
            );
        }

        // On filtre les données retournées par le repository (pas de SQL ici)
        $allMonthlyData = $this->userRepository->countUsersByMonth();

        foreach ($allMonthlyData as $row) {
            // countUsersByMonth() retourne ['label' => 'Jan 2025', 'total' => 3]
            // On reconstruit year/month depuis le label pour matcher
            $date = \DateTime::createFromFormat('M Y', $row['label']);
            if (
                $date instanceof \DateTime
                && (int) $date->format('n') === $month
                && (int) $date->format('Y') === $year
            ) {
                return (int) $row['total'];
            }
        }

        return 0; // Aucun compte créé ce mois-là
    }

    // ──────────────────────────────────────────────────────────────────────────
    // Règle métier 2 : Comptes bloqués
    // ──────────────────────────────────────────────────────────────────────────

    /**
     * Retourne le nombre de comptes actuellement bloqués.
     *
     * @throws \UnexpectedValueException si le repository retourne une valeur négative
     */
    public function countBlockedAccounts(): int
    {
        $count = $this->userRepository->countBlockedUsers();

        if ($count < 0) {
            throw new \UnexpectedValueException(
                'Le nombre de comptes bloqués ne peut pas être négatif.'
            );
        }

        return $count;
    }

    /**
     * Vérifie si le taux de blocage dépasse un seuil donné (en %).
     *
     * @throws \InvalidArgumentException si le seuil n'est pas entre 0 et 100
     */
    public function isBlockRateAboveThreshold(float $thresholdPercent): bool
    {
        if ($thresholdPercent < 0 || $thresholdPercent > 100) {
            throw new \InvalidArgumentException(
                'Le seuil doit être compris entre 0 et 100.'
            );
        }

        $total   = $this->userRepository->countActiveUsers()
                 + $this->userRepository->countBlockedUsers();

        if ($total === 0) {
            return false; // Pas d'utilisateurs → taux = 0%
        }
        

        $blocked = $this->userRepository->countBlockedUsers();
        $rate    = ($blocked / $total) * 100;

        return $rate > $thresholdPercent;
    }
}
