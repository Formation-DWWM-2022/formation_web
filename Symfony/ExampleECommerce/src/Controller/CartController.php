<?php

namespace App\Controller;

use App\Classe\Cart;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

class CartController extends AbstractController
{
    private $cart;

    public function __construct(Cart $cart)
    {
        $this->cart = $cart;
    }

    /**
     * @Route("/mon-panier", name="cart")
     */
    public function index(): Response
    {
        return $this->render('cart/index.html.twig', [
            'cart' => $this->cart->getFull(),
        ]);
    }

    /**
     * @Route("/cart/add/{id}", name="add_to_cart")
     */
    public function add($id): Response
    {
        $this->cart->add($id);

        return $this->redirectToRoute('cart');
    }

    /**
     * @Route("/cart/remove", name="remove_cart")
     */
    public function remove(): Response
    {
        $this->cart->remove();

        return $this->redirectToRoute('products');
    }
    
    /**
     * @Route("/cart/remove/{id}", name="remove_product_from_cart")
     */
    public function removeProductFromCard($id): Response
    {
        $this->cart->removeProductFromCard($id);

        return $this->redirectToRoute('cart');
    }

     /**
     * @Route("/cart/decrease-quantity/{id}", name="decrease_quantity")
     */
    public function decreaseQuantity($id): Response
    {
        $this->cart->decreaseQuantity($id);

        return $this->redirectToRoute('cart');
    }
}
