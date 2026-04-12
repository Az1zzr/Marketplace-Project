<?php

namespace App\Service;

use Symfony\Contracts\HttpClient\HttpClientInterface;

class AISentimentService
{
    private HttpClientInterface $httpClient;
    private string $apiUrl = 'https://router.huggingface.co/hf-inference/models/nlptown/bert-base-multilingual-uncased-sentiment';
    private string $apiKey;

    public function __construct(HttpClientInterface $httpClient, string $huggingfaceApiKey = '')
    {
        $this->httpClient = $httpClient;
        $this->apiKey = trim($huggingfaceApiKey);
    }

    public function analyze(string $text): array
    {
        if (empty(trim($text))) {
            return $this->localFallback($text);
        }

        if ('' === $this->apiKey) {
            return $this->localFallback($text);
        }

        try {
            $response = $this->httpClient->request('POST', $this->apiUrl, [
                'headers' => [
                    'Authorization' => 'Bearer ' . $this->apiKey,
                    'Content-Type' => 'application/json',
                ],
                'json' => [
                    'inputs' => $text,
                ],
                'timeout' => 10,
            ]);

            $statusCode = $response->getStatusCode();

            if ($statusCode === 200) {
                $data = $response->toArray(false);
                if (isset($data['error'])) {
                    return $this->localFallback($text);
                }

                return $this->parseHuggingFaceResponse($data);
            }

            return $this->localFallback($text);
        } catch (\Exception $e) {
            return $this->localFallback($text);
        }
    }

    private function parseHuggingFaceResponse(array $data): array
    {
        // Hugging Face returns: [[['label' => '5 stars', 'score' => 0.95], ...]]
        if (isset($data[0]) && is_array($data[0])) {
            $scores = $data[0];

            // Find the highest scoring label
            $topScore = 0;
            $topLabel = 'neutral';

            foreach ($scores as $score) {
                if (isset($score['score']) && $score['score'] > $topScore) {
                    $topScore = $score['score'];
                    $topLabel = $score['label'] ?? 'neutral';
                }
            }

            // nlptown model returns "1 star" to "5 stars"
            // Map star ratings to sentiment
            $sentiment = 'NEUTRE';
            if (str_contains(strtolower($topLabel), '5 star') || str_contains(strtolower($topLabel), '4 star')) {
                $sentiment = 'POSITIF';
            } elseif (str_contains(strtolower($topLabel), '1 star') || str_contains(strtolower($topLabel), '2 star')) {
                $sentiment = 'NEGATIF';
            }

            return [
                'sentiment' => $sentiment,
                'confidence' => $topScore * 100,
                'source' => 'AI_API',
                'sourceLabel' => 'Hugging Face API',
                'all_scores' => $scores,
            ];
        }

        return $this->localFallback('');
    }

    private function localFallback(string $text): array
    {
        // Fallback to keyword-based analysis
        $text = strtolower($text);
        
        $positiveWords = [
            'bien', 'bon', 'excellent', 'super', 'parfait', 'genial', 'top',
            'satisfait', 'content', 'merci', 'bravo', 'formidable', 'magnifique',
            'agreable', 'recommande', 'rapide', 'efficace', 'qualite', 'aimer',
            'adorer', 'positif', 'extra', 'sublime', 'fantastique', 'incroyable',
            'heureux', 'enchante', 'delicieux', 'superbe', 'maitrise', 'joli',
            'belle', 'beau', 'merveilleux', 'parfait', 'ideal', 'genial',
            // English positive words
            'great', 'good', 'excellent', 'wonderful', 'amazing', 'awesome',
            'fantastic', 'superb', 'perfect', 'love', 'loved', 'loving',
            'happy', 'best', 'satisfied', 'pleased', 'delighted', 'brilliant',
            'outstanding', 'exceptional', 'incredible', 'fabulous', 'terrific',
            'quality', 'fast', 'efficient', 'recommend', 'beautiful', 'nice'
        ];

        $negativeWords = [
            'mal', 'mauvais', 'horrible', 'decu', 'decevant', 'decevante',
            'probleme', 'bug', 'lent', 'lente', 'cher', 'chere', 'inutile',
            'nul', 'nulle', 'catastrophe', 'triste', 'colere', 'frustrer',
            'frustre', 'enervant', 'arnaque', 'dangereux', 'dangereuse',
            'defectueux', 'defectueuse', 'mediocre', 'abominable', 'detestable',
            'honteux', 'honteuse', 'pire', 'mauvaise', 'decevoir', 'regretter',
            'regret', 'fache', 'fachee', 'mecontent', 'mecontente', 'degoute',
            'degoutee', 'execrable', 'epouvantable', 'affreux', 'affreuse',
            'minable', 'pitoyable', 'ridicule', 'stupide', 'idiot', 'idiote',
            'gaspillage', 'perdu', 'perdue', 'trompe', 'trompee', 'mensonge',
            'menteur', 'menteuse', 'voleur', 'voleuse', 'escroc', 'escroquerie',
            'incompetent', 'incompetente', 'desastre', 'echec', 'rate', 'ratee',
            'foireux', 'foireuse', 'merdique', 'pourri', 'pourrie', 'casse',
            'cassee', 'defaillant', 'defaillante', 'incorrect', 'incorrecte',
            'faux', 'fausse', 'erreur', 'faute', 'deçcu', 'déçu', 'déçue',
            // English negative words
            'bad', 'terrible', 'horrible', 'awful', 'worst', 'poor', 'disappointing',
            'disappointed', 'waste', 'broken', 'useless', 'defective', 'failed',
            'failure', 'rubbish', 'garbage', 'trash', 'hate', 'hated', 'hating',
            'angry', 'frustrated', 'annoying', 'annoyed', 'regret', 'sorry',
            'never', 'avoid', 'scam', 'fraud', 'lies', 'lying', 'wrong'
        ];

        $positiveScore = 0;
        $negativeScore = 0;

        foreach ($positiveWords as $word) {
            if (str_contains($text, $word)) {
                $positiveScore += 2;
            }
        }

        foreach ($negativeWords as $word) {
            if (str_contains($text, $word)) {
                $negativeScore += 2;
            }
        }

        $sentiment = 'NEUTRE';
        if ($positiveScore > $negativeScore) {
            $sentiment = 'POSITIF';
        } elseif ($negativeScore > $positiveScore) {
            $sentiment = 'NEGATIF';
        }

        return [
            'sentiment' => $sentiment,
            'positiveScore' => $positiveScore,
            'negativeScore' => $negativeScore,
            'confidence' => max($positiveScore, $negativeScore) > 0 
                ? abs($positiveScore - $negativeScore) / max(1, $positiveScore + $negativeScore) * 100 
                : 50,
            'source' => 'LOCAL_FALLBACK',
            'sourceLabel' => 'Analyse locale',
        ];
    }

    public function setApiKey(string $apiKey): void
    {
        $this->apiKey = $apiKey;
    }
}
