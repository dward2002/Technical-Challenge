<?php declare(strict_types=1);

namespace App\Service;

use App\Service\CheckerInterface;

class CheckerService implements CheckerInterface
{
    public function isPalindrome($word): bool
    {
        $cleanedWord = strtolower(preg_replace('/[^a-z0-9]/', '', $word));
        return $cleanedWord === strrev($cleanedWord);
    }

    public function isAnagram(string $word, string $comparison) : bool
    {
        $cleanedWord = strtolower(preg_replace('/[^a-z0-9]/', '', $word));
        $cleanedComparison = strtolower(preg_replace('/[^a-z0-9]/', '', $comparison));
        $wordArray = str_split($cleanedWord);
        $comparisonArray = str_split($cleanedComparison);
        sort($wordArray);
        sort($comparisonArray);

        return $wordArray === $comparisonArray;
    }

    public function isPangram(string $phrase) : bool
    {
        $cleanedPhrase = strtolower(preg_replace('/[^a-z0-9]/', '', $phrase));
        $alphabet = ['a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z'];
        
        foreach($alphabet as $letter) {
            if (strpos($cleanedPhrase, $letter) === false) {
                return false;
            }
        }

        return true;
    }
}
