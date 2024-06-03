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

    #[Route('/anagram/{word}/{comparison}', name: 'app_anagram_check')]
    public function isAnagram(string $word, string $comparison): JsonResponse
    {
        $result = $this->checkerService->isAnagram($word, $comparison);
        return new JsonResponse(['word' => $word, 'comparison' => $comparison, 'isAnagram' => $result]);
    }
}
