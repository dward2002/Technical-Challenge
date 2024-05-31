<?php declare(strict_types=1);

namespace App\Service;

use App\Interface\CheckerInterface;

class CheckerService implements CheckerInterface
{
    public function isPalindrome($word): bool
    {
        return false;
    }

    public function isAnagram(string $word, string $comparison) : bool
    {
        return false;
    }

    public function isPangram(string $phrase) : bool
    {
        return false;
    }
}
