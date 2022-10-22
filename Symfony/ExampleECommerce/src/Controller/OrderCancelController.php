<?php

namespace App\Controller;

use App\Classe\Cart;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class OrderCancelController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager )
    {
        $this->entityManager = $entityManager;
    }
    
    /**
     * @Route("/commande/erreur/{srtripeSessionId}", name="order_cancel")
     */
    public function index($srtripeSessionId): Response
    {
        $order = $this->entityManager->getRepository(Order::class)->findOneBy(array('srtripeSessionId' => $srtripeSessionId));

        if(!$order || $order->getUser() != $this->getUser() )
            return $this->redirectToRoute('home');


        return $this->render('order_cancel/index.html.twig', [
            'order' => $order,
        ]);
    }
}
