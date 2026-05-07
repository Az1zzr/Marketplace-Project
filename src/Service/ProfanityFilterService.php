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
        $this->frenchWords = array_map('strtolower', $this->frenchWords);
        $this->englishWords = array_map('strtolower', $this->englishWords);
    }

    public function containsProfanity(string $text): bool
    {
        $text = strtolower($text);
        $words = array_merge($this->frenchWords, $this->englishWords);

        foreach ($words as $word) {
            if (str_contains($text, $word)) {
                return true;
            }
        }

        return false;
    }

    public function filterProfanity(string $text, string $replacement = '***'): string
    {
        $words = array_merge($this->frenchWords, $this->englishWords);
        
        foreach ($words as $word) {
            $pattern = '/\b' . preg_quote($word, '/') . '\b/i';
            $text = preg_replace($pattern, $replacement, $text);
        }

        return $text;
    }

    public function getProfanityWords(string $text): array
    {
        $text = strtolower($text);
        $words = array_merge($this->frenchWords, $this->englishWords);
        $found = [];

        foreach ($words as $word) {
            if (str_contains($text, $word)) {
                $found[] = $word;
            }
        }

        return array_unique($found);
    }
}
