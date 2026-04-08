<?php

namespace App\Service;

class SentimentAnalyzerService
{
    private array $positiveWords = [
        'bien', 'bon', 'excellent', 'super', 'parfait', 'genial', 'top',
        'satisfait', 'content', 'merci', 'bravo', 'formidable', 'magnifique',
        'agreable', 'recommande', 'rapide', 'efficace', 'qualite', 'aimer',
        'adorer', 'positif', 'extra', 'sublime', 'fantastique', 'incroyable',
        'heureux', 'enchante', 'delicieux', 'superbe', 'maitrise'
    ];

    private array $negativeWords = [
        'mal', 'mauvais', 'horrible', 'decu', 'decevant', 'decevante',
        'probleme', 'bug', 'lent', 'lente', 'cher', 'chere', 'inutile',
        'nul', 'nulle', 'catastrophe', 'triste', 'colere', 'frustrer',
        'frustre', 'enervant', 'arnaque', 'arnaque', 'dangereux', 'dangereuse',
        'defectueux', 'defectueuse', 'mediocre', 'abominable', 'detestable',
        'honteux', 'honteuse', 'pas', 'jamais', 'pire', 'mauvaise',
        'decevoir', 'regretter', 'regret', 'colere', 'fache', 'fachee',
        'mecontent', 'mecontente', 'degoute', 'degoutee', 'horrible',
        'execrable', 'epouvantable', 'affreux', 'affreuse', 'atroc',
        'minable', 'pitoyable', 'ridicule', 'stupide', 'idiot', 'idiote',
        'nul', 'gaspillage', 'perdu', 'perdue', 'trompe', 'trompee',
        'mensonge', 'menteur', 'menteuse', 'voleur', 'voleuse',
        'escroc', 'escroquerie', 'incompetent', 'incompetente',
        'desastre', 'echec', 'rate', 'ratee', 'foireux', 'foireuse',
        'merdique', 'pourri', 'pourrie', 'pourrie', 'abort', 'annule',
        'cassee', 'casse', 'defaillant', 'defaillante', 'incorrect',
        'incorrecte', 'faux', 'fausse', 'erreur', 'faute', 'echec'
    ];

    private array $positiveEmojis = ['😊', '😀', '😄', '😃', '😁', '👍', '🌟', '⭐', '❤️', '💕', '🎉', '👏'];
    private array $negativeEmojis = ['😢', '😞', '😠', '😡', '👎', '💔', '😤', '😩'];

    public function analyze(string $text): array
    {
        $text = strtolower($text);
        
        $positiveScore = 0;
        $negativeScore = 0;

        foreach ($this->positiveWords as $word) {
            if (str_contains($text, $word)) {
                $positiveScore += 2;
            }
        }

        foreach ($this->negativeWords as $word) {
            if (str_contains($text, $word)) {
                $negativeScore += 2;
            }
        }

        foreach ($this->positiveEmojis as $emoji) {
            if (str_contains($text, $emoji)) {
                $positiveScore += 1;
            }
        }

        foreach ($this->negativeEmojis as $emoji) {
            if (str_contains($text, $emoji)) {
                $negativeScore += 1;
            }
        }

        $sentiment = $this->determineSentiment($positiveScore, $negativeScore);

        return [
            'sentiment' => $sentiment,
            'positiveScore' => $positiveScore,
            'negativeScore' => $negativeScore,
            'confidence' => abs($positiveScore - $negativeScore) / max(1, $positiveScore + $negativeScore) * 100,
        ];
    }

    private function determineSentiment(int $positiveScore, int $negativeScore): string
    {
        if ($positiveScore == 0 && $negativeScore == 0) {
            return 'NEUTRE';
        }
        
        if ($positiveScore > $negativeScore) {
            return 'POSITIF';
        } elseif ($negativeScore > $positiveScore) {
            return 'NEGATIF';
        } else {
            return 'NEUTRE';
        }
    }

    public function getSentimentBadgeClass(string $sentiment): string
    {
        return match (strtoupper($sentiment)) {
            'POSITIF' => 'bg-success',
            'NEGATIF' => 'bg-danger',
            default => 'bg-secondary',
        };
    }

    public function getSentimentIcon(string $sentiment): string
    {
        return match (strtoupper($sentiment)) {
            'POSITIF' => 'bi-emoji-smile',
            'NEGATIF' => 'bi-emoji-frown',
            default => 'bi-emoji-neutral',
        };
    }
}
