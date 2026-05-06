<?php

namespace App\Service;

use App\Entity\Categorie;
use App\Entity\Produit;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class ProductCatalogAiService
{
    private const API_URL = 'https://router.huggingface.co/hf-inference/models/facebook/bart-large-mnli';

    private const CATEGORY_KEYWORDS = [
        'tech' => ['phone', 'smartphone', 'laptop', 'computer', 'pc', 'keyboard', 'mouse', 'tablet', 'screen', 'camera', 'headphone'],
        'elect' => ['tv', 'audio', 'speaker', 'charger', 'usb', 'console', 'gaming', 'electric'],
        'cloth' => ['shirt', 'dress', 'jeans', 'jacket', 'shoe', 'sneaker', 'fashion', 'hoodie', 'bag'],
        'food' => ['bread', 'milk', 'coffee', 'tea', 'juice', 'fruit', 'vegetable', 'snack', 'chocolate', 'cheese'],
        'beaut' => ['perfume', 'cream', 'soap', 'makeup', 'cosmetic', 'skin', 'shampoo'],
        'home' => ['chair', 'table', 'lamp', 'sofa', 'kitchen', 'furniture', 'mattress', 'decor'],
        'sport' => ['ball', 'fitness', 'yoga', 'bike', 'cycling', 'running', 'gym'],
        'book' => ['book', 'novel', 'guide', 'magazine', 'notebook', 'stationery'],
    ];

    public function __construct(
        private readonly HttpClientInterface $httpClient,
        private readonly string $huggingfaceApiKey = ''
    ) {
    }

    /**
     * @param Categorie[] $categories
     */
    public function suggestCategory(string $productName, string $address, array $categories): ?array
    {
        $productName = trim($productName);
        $address = trim($address);
        $categories = array_values(array_filter($categories, static fn ($category): bool => $category instanceof Categorie));

        if ('' === $productName || [] === $categories) {
            return null;
        }

        $input = sprintf('Product: %s. Address: %s.', $productName, $address);

        $remoteSuggestion = $this->requestRemoteSuggestion($input, $categories);
        if (null !== $remoteSuggestion) {
            return $remoteSuggestion;
        }

        return $this->buildLocalSuggestion($productName, $address, $categories);
    }

    public function buildInsight(Produit $produit): array
    {
        $quantity = (int) $produit->getQuantite();
        $price = (float) $produit->getPrix();

        $stockSignal = match (true) {
            $quantity <= 0 => 'Out of stock',
            $quantity <= 5 => 'Low stock pressure',
            $quantity <= 15 => 'Balanced stock level',
            default => 'High availability',
        };

        $priceSignal = match (true) {
            $price < 20 => 'entry-level',
            $price < 100 => 'mid-range',
            default => 'premium',
        };

        return [
            'stockSignal' => $stockSignal,
            'priceSignal' => $priceSignal,
            'summary' => sprintf(
                'AI catalog brief: %s is positioned as a %s %s offer with %s for shoppers around %s.',
                $produit->getNomProduit(),
                $priceSignal,
                mb_strtolower((string) $produit->getCategorie()?->getNom()),
                mb_strtolower($stockSignal),
                $produit->getAdresse()
            ),
            'sourceLabel' => 'Catalog assistant',
        ];
    }

    /**
     * @param Categorie[] $categories
     */
    private function requestRemoteSuggestion(string $input, array $categories): ?array
    {
        if ('' === trim($this->huggingfaceApiKey) || count($categories) < 2) {
            return null;
        }

        $labels = [];
        $categoryMap = [];

        foreach ($categories as $category) {
            $label = trim((string) $category->getNom());
            if ('' === $label) {
                continue;
            }

            $labels[] = $label;
            $categoryMap[mb_strtolower($label)] = $category;
        }

        if (count($labels) < 2) {
            return null;
        }

        try {
            $response = $this->httpClient->request('POST', self::API_URL, [
                'headers' => [
                    'Authorization' => 'Bearer ' . $this->huggingfaceApiKey,
                    'Content-Type' => 'application/json',
                ],
                'json' => [
                    'inputs' => $input,
                    'parameters' => [
                        'candidate_labels' => $labels,
                        'multi_label' => false,
                    ],
                ],
                'timeout' => 12,
            ]);

            if (200 !== $response->getStatusCode()) {
                return null;
            }

            $data = $response->toArray(false);
            $label = mb_strtolower((string) ($data['labels'][0] ?? ''));
            $score = (float) ($data['scores'][0] ?? 0);

            if ($score < 0.35 || !isset($categoryMap[$label])) {
                return null;
            }

            return [
                'category' => $categoryMap[$label],
                'confidence' => (int) round($score * 100),
                'reason' => 'AI matched the product wording to your available catalog categories.',
                'sourceLabel' => 'Hugging Face zero-shot',
            ];
        } catch (\Throwable) {
            return null;
        }
    }

    /**
     * @param Categorie[] $categories
     */
    private function buildLocalSuggestion(string $productName, string $address, array $categories): ?array
    {
        $text = mb_strtolower(trim($productName . ' ' . $address));
        $bestCategory = null;
        $bestScore = 0;

        foreach ($categories as $category) {
            $score = $this->scoreCategory($text, $category);
            if ($score > $bestScore) {
                $bestScore = $score;
                $bestCategory = $category;
            }
        }

        if (!$bestCategory instanceof Categorie || $bestScore <= 0) {
            return null;
        }

        return [
            'category' => $bestCategory,
            'confidence' => min(95, 45 + ($bestScore * 10)),
            'reason' => 'Local AI fallback matched product keywords with the closest category label.',
            'sourceLabel' => 'Local catalog model',
        ];
    }

    private function scoreCategory(string $text, Categorie $category): int
    {
        $score = 0;
        $categoryName = mb_strtolower(trim((string) $category->getNom()));

        foreach (array_filter(explode(' ', preg_replace('/[^a-z0-9]+/i', ' ', $categoryName) ?? '')) as $token) {
            if (str_contains($text, $token)) {
                $score += 3;
            }
        }

        foreach (self::CATEGORY_KEYWORDS as $categoryHint => $keywords) {
            if (!str_contains($categoryName, $categoryHint)) {
                continue;
            }

            foreach ($keywords as $keyword) {
                if (str_contains($text, $keyword)) {
                    $score += 2;
                }
            }
        }

        return $score;
    }
}
