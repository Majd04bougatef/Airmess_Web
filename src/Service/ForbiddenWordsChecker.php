<?php

namespace App\Service;

class ForbiddenWordsChecker
{
    private array $forbiddenWords;

    public function __construct(array $forbiddenWords = [
        'badword1', 'badword2', 'insult', 'offensive', 'vulgar', 'aaaaaje ', 'ccc', 'bbb', 
        // Add more forbidden words to this default list
    ])
    {
        $this->forbiddenWords = $forbiddenWords;
    }

    public function containsForbiddenWords(string $text): array
    {
        if (empty($text)) {
            return [];
        }
        
        $foundWords = [];
        foreach ($this->forbiddenWords as $word) {
            // Use word boundary to match whole words only
            if (preg_match('/\b' . preg_quote($word, '/') . '\b/i', $text)) {
                $foundWords[] = $word;
            }
        }
        return $foundWords;
    }

    public function getForbiddenWords(): array
    {
        return $this->forbiddenWords;
    }
    
    public function setForbiddenWords(array $words): void
    {
        $this->forbiddenWords = $words;
    }
}
