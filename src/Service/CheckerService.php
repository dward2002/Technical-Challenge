<?php declare(strict_types=1);

namespace App\Service;

use App\Service\CheckerInterface;

class CheckerService implements CheckerInterface
{
    public function isPalindrome($word): bool
    {
        $cleanedWord = $this->cleanString($word);

        return $cleanedWord === strrev($cleanedWord);
    }

    public function isAnagram(string $word, string $comparison) : bool
    {
        $cleanedWord = $this->cleanString($word);
        $cleanedComparison = $this->cleanString($comparison);
        $wordArray = str_split($cleanedWord);
        $comparisonArray = str_split($cleanedComparison);
        sort($wordArray);
        sort($comparisonArray);

        return $wordArray === $comparisonArray;
    }

    public function isPangram(string $phrase) : bool
    {
        $cleanedPhrase = $this->cleanString($phrase);
        $alphabet = range('a', 'z');
        
        foreach($alphabet as $letter) {
            if (strpos($cleanedPhrase, $letter) === false) {
                return false;
            }
        }

        return true;
    }

    public function cleanString(string $inputString) {
        $lowercaseString = strtolower($inputString);
        
        return preg_replace('/[^a-z0-9]/', '', $lowercaseString);
    }
}
