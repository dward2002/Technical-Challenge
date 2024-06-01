<?php

namespace App\Tests;

use PHPUnit\Framework\TestCase;
use App\Service\CheckerService;

class CheckerServiceTest extends TestCase
{
    private CheckerService $checkerService;

    protected function setUp(): void
    {
        $this->checkerService = new CheckerService();
    }

    public function testIsPalindrome()
    {
        $this->assertTrue($this->checkerService->isPalindrome('anna'));
        $this->assertFalse($this->checkerService->isPalindrome('Bark'));
    }

    public function testIsAnagram()
    {
        $this->assertTrue($this->checkerService->isAnagram('coalface', 'cacao elf'));
        $this->assertFalse($this->checkerService->isAnagram('coalface', 'dark elf'));
    }

    public function testIsPangram()
    {
        $this->assertTrue($this->checkerService->isPangram('The quick brown fox jumps over the lazy dog'));
        $this->assertFalse($this->checkerService->isPangram('The British Broadcasting Corporation (BBC) is a British public service broadcaster.'));
    }
}
