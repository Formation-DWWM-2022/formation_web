<?php

namespace App\Controller;

use DateTime;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/home', name: 'app_home')]
    public function index(): Response
    {
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }

    #[Route('/time/now', name: 'app_time_now')]
    public function timenow(): Response
    {
        $date = (new DateTime())->format('Y-m-d H:i:s');
        return $this->render('home/timenow.html.twig', [
            'date' => $date
        ]);
    }

    #[Route('/color/{color}', name: 'app_color')]
    public function color(string $color = "blue"): Response
    {
        return $this->render('home/color.html.twig', [
            'color' => $color
        ]);
    }

    #[Route('/request', name: "app_request")]
    public function requestAction(Request $request): Response
    {
        dump('request', $request->getClientIp());
        return $this->render('home/ip.html.twig', [
            'request' => $request->getClientIp()
        ]);
    }

    #[Route('/twig', name: 'app_twig')]
    public function twigAction(): Response
    {
        $title = "title";
        $tab = ['coucou', 'salut', 'hello'];
        $object = [
            'object1' =>
                ['object', 'foo'],
            'object2' =>
                ['object', 'foo'],
            'object3' =>
                ['object', 'foo']
        ];
        return $this->render('home/twig.html.twig', [
            'tab' => $tab,
            'object' => $object,
            'title' => $title,
        ]);
    }

    #[Route('/action' , name: 'app_action')]
    public function action(){
        $hello = 'Hello World';

        return $this->render('home/action.html.twig', array('hello' => $hello));
    }
}
