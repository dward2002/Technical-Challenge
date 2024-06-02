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

    #[Route('/check_anagram', name: 'app_anagram_check', methods: ['POST'])]
    public function checkAnagram(Request $request): JsonResponse
    {
        $data = json_decode($request->getContent(), true);
        $word = $data['word'];
        $comparison = $data['comparison'];

        $result = $this->checkerService->isAnagram($word, $comparison);

        return new JsonResponse(['result' => $result]);
    }
}
