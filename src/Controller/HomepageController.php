<?php declare(strict_types=1);

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Service\CheckerService;

class HomepageController extends AbstractController
{

    public function __construct(private CheckerService $checkerService){}

    #[Route('/', name: 'app_homepage')]
    public function index(): Response
    {
        return $this->render('homepage/homepage.html.twig', [
            'title' => 'example',
        ]);
    }
}
