<?php

namespace App\Service;

class ForbiddenWordsChecker
{
    private array $forbiddenWords;

    public function __construct(array $forbiddenWords = [])
    {
        $this->forbiddenWords = $forbiddenWords;
    }

    public function containsForbiddenWords(string $text): array
    {
        $foundWords = [];
        foreach ($this->forbiddenWords as $word) {
            if (stripos($text, $word) !== false) {
                $foundWords[] = $word;
            }
        }
        return $foundWords;
    }

    public function getForbiddenWords(): array
    {
        return $this->forbiddenWords;
    }
}
