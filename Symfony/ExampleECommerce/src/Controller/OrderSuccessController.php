<?php

namespace App\Controller;

use App\Classe\Cart;
use App\Entity\Order;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class OrderSuccessController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager )
    {
        $this->entityManager = $entityManager;
    }
    
    /**
     * @Route("/commande/success/{srtripeSessionId}", name="order_validate")
     */
    public function index(Cart $cart, $srtripeSessionId): Response
    {
        $order = $this->entityManager->getRepository(Order::class)->findOneBy(array('srtripeSessionId' => $srtripeSessionId));

        if(!$order || $order->getUser() != $this->getUser() )
            return $this->redirectToRoute('home');

        if(!$order->getIsPaid()){
            $order->setIsPaid(1);
            $this->entityManager->flush();
            $cart->remove();
        }
        
        return $this->render('order_success/index.html.twig', [
            'order' => $order,
        ]);
    }
}
