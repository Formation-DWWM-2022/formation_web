<?php

namespace App\Controller;

use App\Classe\Cart;
use App\Entity\Address;
use App\Form\AddressType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AccountAddressController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager){
        $this->entityManager = $entityManager;
    }
    
    /**
    * @Route("/compte/address", name="account_address")
    */
    public function index(): Response
    {
        return $this->render('account/address.html.twig', [
            'controller_name' => 'AccountAddressController',
        ]);
    }

    /**
    * @Route("/compte/address/add", name="account_address_add")
    */
    public function add(Cart $cart, Request $request): Response
    {
        $address = new Address();

        $form = $this->createForm( AddressType::class,$address);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $address->setUser($this->getUser());
            $this->entityManager->persist($address);
            $this->entityManager->flush();
            
            if($cart->get())
                return $this->redirectToRoute('order');

            return $this->redirectToRoute('account_address');
        }
        return $this->render('account/address_form.html.twig', [
            "form" => $form->createView()
        ]);
    }
    
    /**
    * @Route("/compte/address/edit/{id}", name="account_address_edit")
    */
    public function edit(Request $request,$id): Response
    {
        $address = $this->entityManager->getRepository(Address::class)->findOneBy(array('id' => $id));
        
        if(!$address || $address->getUser() != $this->getUser())
        {
            return $this->redirectToRoute('account_address');
        }

        $form = $this->createForm( AddressType::class,$address);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->entityManager->flush();
            return $this->redirectToRoute('account_address');
        }
        return $this->render('account/address_form.html.twig', [
            "form" => $form->createView()
        ]);
    }

    
    /**
    * @Route("/compte/address/delete/{id}", name="account_address_delete")
    */
    public function delete($id): Response
    {
        $address = $this->entityManager->getRepository(Address::class)->findOneBy(array('id' => $id));
        
        if($address && $address->getUser() == $this->getUser())
        {
            $this->entityManager->remove($address);
            $this->entityManager->flush();
        }

        return $this->redirectToRoute('account_address');
    }

}
