<?php

namespace App\Service;

use Symfony\Contracts\HttpClient\HttpClientInterface;

/**
 * API 1 : Détection d'image sensible via HuggingFace (Falconsai/nsfw_image_detection)
 * Modèle gratuit, pas de carte bancaire requise.
 */
class ImageModerationService
{
    // Si le score NSFW dépasse ce seuil → image bloquée
    private const BLOCK_THRESHOLD = 0.75;

    private const API_URL = 'https://api-inference.huggingface.co/models/Falconsai/nsfw_image_detection';

    public function __construct(
        private readonly HttpClientInterface $httpClient,
        private readonly string $huggingFaceApiKey
    ) {}

    /**
     * Retourne true si l'image est sûre, false si elle est inappropriée.
     */
    public function isSafe(string $imagePath): bool
    {
        $imageData = file_get_contents($imagePath);

        $response = $this->httpClient->request('POST', self::API_URL, [
            'headers' => [
                'Authorization' => 'Bearer ' . $this->huggingFaceApiKey,
                'Content-Type'  => 'application/octet-stream',
            ],
            'body' => $imageData,
        ]);

        $results = $response->toArray();

        // Réponse : [{"label":"normal","score":0.99},{"label":"nsfw","score":0.01}]
        foreach ($results as $result) {
            if (
                isset($result['label'], $result['score']) &&
                strtolower($result['label']) === 'nsfw' &&
                $result['score'] >= self::BLOCK_THRESHOLD
            ) {
                return false;
            }
        }

        return true;
    }
}