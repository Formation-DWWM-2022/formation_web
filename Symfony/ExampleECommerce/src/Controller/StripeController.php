<?php

namespace App\Controller;

use App\Classe\Cart;
use App\Entity\Order;
use App\Entity\Product;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Stripe\Stripe;
use Stripe\Checkout\Session as StripeSession;
use Symfony\Component\HttpFoundation\JsonResponse;

class StripeController extends AbstractController
{
    const YOUR_DOMAIN = "http://127.0.0.1:8000";
    
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager )
    {
        $this->entityManager = $entityManager;
    }
    
    /**
     * @Route("/commande/create-session/{reference}", name="stripe_create_session")
     */
    public function index(Cart $cart,$reference): Response
    {
        $productstripe=[];

        $order = $this->entityManager->getRepository(Order::class)->findOneBy(array('reference'=>$reference));

        if(!$order || $order->getUser() != $this->getUser() ){
            $response = new JsonResponse(['error' => 'order']);
            return $response;
        }
        foreach ($order->getOrderDetails()->getValues() as $key => $value) {
            $product_object = $this->entityManager->getRepository(Product::class)->findOneBy(array('name'=>$value->getProduct()));
            $productstripe[] =[
                'price_data' => [
                  'currency' => 'eur',
                  'unit_amount' => $value->getPrice(),
                  'product_data' => [
                    'name' => $value->getProduct(),
                    'images' => [Self::YOUR_DOMAIN."/uploads/".$product_object->getIllustration()],
                  ],
                ],
                'quantity' =>  $value->getQuantity(),
            ];
        }

        $productstripe[] =[
            'price_data' => [
              'currency' => 'eur',
              'unit_amount' => $order->getCarrierPrice() ,
              'product_data' => [
                'name' => $order->getCarrierName(),
                'images' => [Self::YOUR_DOMAIN],
              ],
            ],
            'quantity' => 1,
        ];


        Stripe::setApiKey('sk_test_51J7l6eBj9FnjdIPWNX9NmbAwAtM02sB6UYzLBV7V2XmAfHr1hsHAoWMYUiSklbe1lIRN979NZSbl4e0BvbCHnfal00QmrBGpAe');
            
        $checkout_session = StripeSession::create([
            'customer_email' => $this->getUser()->getEmail(),
            'payment_method_types' => ['card'],
            'line_items' => [$productstripe],
            'mode' => 'payment',
            'success_url' => Self::YOUR_DOMAIN . '/commande/success/{CHECKOUT_SESSION_ID}',
            'cancel_url' => Self::YOUR_DOMAIN . '/commande/erreur/{CHECKOUT_SESSION_ID}',
        ]);

        $order->setSrtripeSessionId($checkout_session->id);
        $this->entityManager->flush();

        $response = new JsonResponse(['id' => $checkout_session->id]);
        return $response;
    }
}
