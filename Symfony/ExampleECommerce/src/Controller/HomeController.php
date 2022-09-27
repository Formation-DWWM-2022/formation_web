<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    public function __construct()
    {
        
    }

    /**
     * @Route("/", name="home")
     */
    public function index(SessionInterface $session): Response
    {
        $session->set('carte',[
            'id' => 522,
            'quantity' => 12
        ]);

        $cart = $session->get('carte');
        
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }
}
