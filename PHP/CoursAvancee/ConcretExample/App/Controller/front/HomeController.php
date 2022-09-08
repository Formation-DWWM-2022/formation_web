<?php

namespace App\Controller\Front;

use App\Form\FormUser;
use App\Repository\ISportRepository;
use App\Service\View;

class HomeController
{
    use View;

    private ISportRepository $sportRepository;

     public function __construct(ISportRepository  $sportRepository)
     {
         $this->sportRepository = $sportRepository;
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

//    public function getUser($params): User
//    {
//        return $this->users->findByUsername($params['username']);
//    }
}
