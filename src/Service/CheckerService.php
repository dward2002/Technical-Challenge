<?php declare(strict_types=1);

namespace App\Service;

use App\Service\CheckerInterface;

class CheckerService implements CheckerInterface
{
    /**
     * Checks if a given word is a palindrome.
     *
     * @param string $word
     * @return boolean
     */
    public function isPalindrome(string $word): bool
    {
        $cleanedWord = $this->cleanString($word);
        return $cleanedWord === strrev($cleanedWord);
    }

    /**
     * Compares two strings to check if they are an anagram
     *
     * @param string $word
     * @param string $comparison
     * @return boolean
     */
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

    /**
     * Checks if a given phrase is a pangram.
     *
     * @param string $phrase
     * @return boolean
     */
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

    /**
     * Makes a given string lowercase and removes all unwanted characters
     *
     * @param string $inputString
     * @return string
     */
    public function cleanString(string $inputString) {
        $lowercaseString = strtolower($inputString);
        
        return preg_replace('/[^a-z0-9]/', '', $lowercaseString);
    }
}
