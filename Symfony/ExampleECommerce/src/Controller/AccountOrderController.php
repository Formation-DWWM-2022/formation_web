<?php

namespace App\Controller;

use App\Entity\Order;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AccountOrderController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager )
    {
        $this->entityManager = $entityManager;
    }

    /**
     * @Route("/compte/mes-commandes", name="account_order")
     */
    public function index(): Response
    {
        $orders = NULL;
        $orders = $this->entityManager->getRepository(Order::class)->findSuccessOrders( $this->getUser());
        
        return $this->render('account/order.html.twig', [
            'order' => $orders,
        ]);
    }

    /**
     * @Route("/compte/mes-commandes/{reference}", name="account_order_show")
     */
    public function show($reference): Response
    {
        $order = NULL;
        $order = $this->entityManager->getRepository(Order::class)->findOneBy(array('reference'=>$reference));

        if(!$order || $order->getUser() != $this->getUser() )
            return $this->redirectToRoute('account_order');

        return $this->render('account/order_show.hrml.twig', [
            'order' => $order,
        ]);
    }
}
