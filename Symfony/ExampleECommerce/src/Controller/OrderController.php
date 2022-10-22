<?php

namespace App\Controller;

use App\Classe\Cart;
use App\Entity\Order;
use App\Entity\OrderDetails;
use App\Form\OrderType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use cebe\markdown\Markdown;
use App\Helpers\MarkdownHelper;

class OrderController extends AbstractController
{
    private $entityManager;
    private $helper;

    public function __construct(EntityManagerInterface $entityManager, MarkdownHelper $helper )
    {
        $this->helper = $helper;
        $this->entityManager = $entityManager;
    }
    
    /**
     * @Route("/commande", name="order")
     */
    public function index(Cart $cart,Request $request): Response
    {
        if(!$this->getUser()->getAddresses()->getValues())
            return $this->redirectToRoute('account_address_add');


        $form = $this->createForm(OrderType::class, NULL, array('user' => $this->getUser()));

        return $this->render('order/index.html.twig', [
            'form' => $form->createView(),
            'cart' => $cart->getFull()
        ]);
    }
    /**
     * @Route("/commande/recapitulatif", name="order_recap" , methods={"POST"})
     */
    public function add(Cart $cart,Request $request): Response
    {
        if(!$this->getUser()->getAddresses()->getValues())
            return $this->redirectToRoute('account_address_add');


        $form = $this->createForm(OrderType::class, NULL, array('user' => $this->getUser()));

        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid()) {
            $date = new \DateTimeImmutable();
            $carriers = $form->get('carriers')->getData();
            $delivery = $form->get('addresses')->getData();
            $delivery_content = $delivery->getFirstname().' '.$delivery->getLastname();

            $delivery_content .= '<br>'. $delivery->getPhone(); 

            if($delivery->getCompany())
                $delivery_content .= '<br>'. $delivery->getCompany(); 

            $delivery_content .= '<br>'. $delivery->getAddress(); 
            $delivery_content .= '<br>'. $delivery->getCodepostal().'<br>'. $delivery->getCity(); 
            $delivery_content .= '<br>'. $delivery->getPays(); 

            // ajouter commande : order 
            $order = new Order();
            $reference = $this->helper->makeReference(); 

            $order->setReference($reference);
            $order->setUser($this->getUser());
            $order->setCreatedAt($date);
            $order->setCarrierName($carriers->getName());
            $order->setCarrierPrice($carriers->getPrix());
            $order->setAddress($delivery_content);
            $order->setIsPaid(0);            
            $this->entityManager->persist($order);

            // ajouter commande details : orderDetail  
            foreach ($cart->getFull() as $key => $value) {
                $orderDetails = new OrderDetails();
                $orderDetails->setMyOrder($order);
                $orderDetails->setProduct($value['product']->getName());
                $orderDetails->setQuantity($value['quantity']);
                $orderDetails->setPrice($value['product']->getPrice());
                $orderDetails->setTotal($value['product']->getPrice() * $value['quantity']);
                $this->entityManager->persist($orderDetails);
            }

            $this->entityManager->flush();
            
            return $this->render('order/add.html.twig', [
                'cart' => $cart->getFull(),
                'carriers' => $carriers,
                'delivery_content' => $delivery_content,
                'reference' =>  $order->getReference()
            ]);
 
        }

        return $this->redirectToRoute('cart');
    }
}
