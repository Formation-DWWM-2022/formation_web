<?php

namespace App\Controller;

use App\Service\AldiService;
use App\Service\CarrefourService;
use App\Service\IntermarcheService;
use Facebook\WebDriver\Exception\NoSuchElementException;
use Facebook\WebDriver\Exception\TimeoutException;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    private AldiService $aldiService;
    private IntermarcheService $intermarcheService;
    private CarrefourService $carrefourService;

    public function __construct(AldiService $aldiService, IntermarcheService $intermarcheService, CarrefourService $carrefourService){
        $this->aldiService = $aldiService;
        $this->intermarcheService = $intermarcheService;
        $this->carrefourService = $carrefourService;
    }

    #[Route('/home', name: 'app_home', methods: 'GET')]
    public function index(): Response
    {
        return $this->render('front/home/index.html.twig', [
            'products' => null,
        ]);
    }

    /**
     * @throws NoSuchElementException
     * @throws TimeoutException
     */
    #[Route('/home', name: 'app_home_search', methods: 'POST')]
    public function search(Request $request): Response
    {
        $search = $request->request->get('search');
        $products = $this->aldiService->getProducts($search);
        $products = $this->intermarcheService->getProducts($search);
        $products = $this->carrefourService->getProducts($search);
        return $this->render('home/index.html.twig', [
            'products' => $products,
        ]);
    }
}
