<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use App\Entity\User;
use App\Form\ChangePasswordType;

class AccountPasswordController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager){
        $this->entityManager = $entityManager;
    }

    /**
     * @Route("/compte/modifier-mdp", name="account_password")
     */
    public function index(Request $request, UserPasswordEncoderInterface $encoder): Response
    {
        $notification = NULL;
        $user = $this->getUser();
        $form = $this->createForm( ChangePasswordType::class,$user);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $old_pwd = $form->get('old_password')->getData();

            if($encoder->isPasswordValid($user ,$old_pwd )){
                $new_pwd = $form->get('new_password')->getData();
                $user->setPassword($encoder->encodePassword($user,$new_pwd));
                // $doctrine = $this->getDoctrine()->getManager();
                $this->entityManager->flush(); 
                $notification = "Votre mot de passe a bien été mise a jour";
            }else{
                $notification = "Votre mot de passe actuel n 'est pas correcte";

            }
             
        }
        return $this->render('account/password.html.twig', [
            "form" => $form->createView(),"notification" => $notification
        ]);
    }
}
