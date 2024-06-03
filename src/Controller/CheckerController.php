<?php declare(strict_types=1);

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use App\Service\CheckerService;

class CheckerController extends AbstractController
{

    public function __construct(private CheckerService $checkerService){}

    #[Route('/', name: 'app_homepage')]
    public function index(): Response
    {
        return $this->render('homepage/homepage.html.twig');
    }

    #[Route('/palindrome/{word}', name: 'app_palindrome_check')]
    public function isPalindrome(string $word): JsonResponse
    {
        $result = $this->checkerService->isPalindrome($word);
        return new JsonResponse(['word' => $word, 'isPalindrome' => $result]);
    }

    #[Route('/anagram/{word}/{comparison}', name: 'app_anagram_check')]
    public function isAnagram(string $word, string $comparison): JsonResponse
    {
        $result = $this->checkerService->isAnagram($word, $comparison);
        return new JsonResponse(['word' => $word, 'comparison' => $comparison, 'isAnagram' => $result]);
    }

    #[Route('/pangram/{phrase}', name: 'app_pangram_check')]
    public function isPangram(string $phrase): JsonResponse
    {
        $result = $this->checkerService->isPangram($phrase);
        return new JsonResponse(['phrase' => $phrase, 'isPangram' => $result]);
    }
}
