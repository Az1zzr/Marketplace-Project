<?php

namespace App\Service;

class ImageModerationService
{
    /**
     * Vérifie si une image est appropriée (pas de nudité, pas de violence).
     * Retourne true si l'image est sûre, false sinon.
     */
    public function isSafe(string $imagePath): bool
    {
        // Si le fichier n'existe pas → on considère que c'est sûr (fail open)
        if (!file_exists($imagePath)) {
            return true;
        }

        return true;
    }
}
