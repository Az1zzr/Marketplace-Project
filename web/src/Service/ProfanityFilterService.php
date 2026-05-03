<?php

namespace App\Service;

class ProfanityFilterService
{
    private array $frenchWords = [
        'merde', 'putain', 'connard', 'salope', 'encule', 'batard',
        'con', 'connasse', 'pute', 'putain', 'chier', 'foutre',
        'baiser', 'niquer', 'enfoire', 'enflure', 'batard',
        'trou du cul', 'va te faire', 'ta gueule'
    ];

    private array $englishWords = [
        'fuck', 'shit', 'damn', 'bitch', 'asshole', 'piss',
        'bastard', 'crap', 'whore', 'slut', 'dick', 'cock',
        'pussy', 'wanker', 'twat', 'cunt', 'bollocks'
    ];

    public function __construct()
    {
        $this->frenchWords = $this->normalizeWords($this->frenchWords);
        $this->englishWords = $this->normalizeWords($this->englishWords);
    }

    public function containsProfanity(string $text): bool
    {
        return [] !== $this->getProfanityWords($text);
    }

    public function filterProfanity(string $text, string $replacement = '***'): string
    {
        $words = $this->getAllWords();
        
        foreach ($words as $word) {
            $pattern = '/\b' . preg_quote($word, '/') . '\b/i';
            $text = preg_replace($pattern, $replacement, $text);
        }

        return $text;
    }

    public function getProfanityWords(string $text): array
    {
        $found = [];

        foreach ($this->getAllWords() as $word) {
            if ($this->matchesWord($text, $word)) {
                $found[] = $word;
            }
        }

        return array_values(array_unique($found));
    }

    public function getAllWords(): array
    {
        return array_values(array_unique(array_merge($this->frenchWords, $this->englishWords)));
    }

    private function normalizeWords(array $words): array
    {
        return array_values(array_unique(array_map('strtolower', $words)));
    }

    private function matchesWord(string $text, string $word): bool
    {
        $pattern = '/(?:^|[^\p{L}\p{N}])' . preg_quote($word, '/') . '(?=$|[^\p{L}\p{N}])/iu';

        return 1 === preg_match($pattern, $text);
    }
}
