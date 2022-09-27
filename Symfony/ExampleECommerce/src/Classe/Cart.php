<?php

namespace App\Classe;

use App\Entity\Product;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class Cart
{
    private $session;
    private $entityManager;

    public function __construct(SessionInterface $session, EntityManagerInterface $entityManager)
    {
        $this->session = $session;
        $this->entityManager = $entityManager;
    }

    public function getFull(): ?array
    {
        $cartComplete = [];

        if (!$this->get())
            return NULL;
        
        foreach ($this->get() as $key => $value) {
            $product = $this->entityManager->getRepository(Product::class)->findOneBy(['id' => $value['id']]);
            if (!$product){
                $this->removeProductFromCard($value['id']);
                continue;
            } 

            $cartComplete[] = [
                'product' => $product, 
                'quantity' => $value['quantity'], 
                'total' => $product->getPrice() * $value['quantity'],

            ];
        }

        return $cartComplete;
    }

    public function add(int $id): void
    {
        if($this->session->get('cart'))
        {
            $array = $this->session->get('cart');
            $found = false;
            foreach($array as $key => $value){
                if($value['id']  == $id){
                    $found = true;
                    $array[$key]['quantity'] ++;
                }
            }
            if(!$found)
                array_push($array,['id' => $id,'quantity' => 1]);

            $this->session->set('cart',$array);
        }else
        {
            $this->session->set('cart',[
                [
                    'id' => $id,
                    'quantity' => 1
                ]
            ]);
        }
    }
    
    public function get(): ?array
    {
        if($this->session->get('cart'))
        {
            return $this->session->get('cart');
        }else
        {
            return NULL;
        }
    }
    
    public function remove(): void
    {
        $this->session->remove('cart');
    }
    
    public function removeProductFromCard(int $id): void
    {
        $array = [];
        foreach($this->session->get('cart') as $key => $value){
            if($value['id']  != $id){
                array_push($array,['id' => $value['id'],'quantity' => $value['quantity']]);
            }
        }
        $this->session->set('cart',$array);
    }
    public function decreaseQuantity(int $id): void
    {
        $array = $this->session->get('cart');
        foreach($array as $key => $value){
            if($value['id']  == $id){
                $array[$key]['quantity'] --;
            }
        }
        $this->session->set('cart',$array);
    }

}
