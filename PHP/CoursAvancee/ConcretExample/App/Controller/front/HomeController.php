<?php

namespace App\Controller\Front;

use App\Form\FormUser;
use App\Repository\ISportRepository;
use App\Repository\SportRepository;
use App\Service\View;

class HomeController
{
    use View;

    private ISportRepository $sportRepository;

     public function __construct()
     {
         $this->sportRepository = new SportRepository();
     }

    public function invoke(): string
    {
        return $this->render(
            SITE_NAME . ' - HomePage',
            'front/pages/home.php',
            [
                'formUser' => FormUser::buildRegisterUserForm(),
                'sports' => $this->sportRepository->findAll()
            ]);
    }
}
