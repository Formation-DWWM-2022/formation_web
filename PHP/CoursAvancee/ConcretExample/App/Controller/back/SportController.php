<?php

namespace App\Controller\Back;

use App\Form\FormSport;
use App\Form\FormUser;
use App\Repository\ISportRepository;
use App\Service\View;

class SportController
{
    use View;

    private ISportRepository $sportRepository;

    public function __construct(ISportRepository $sportRepository)
    {
        $this->sportRepository = $sportRepository;
    }

    public function invoke(): string
    {
        return $this->render(
            SITE_NAME . ' - Sport',
            'back/pages/sport/index.php',
            [
                'sports' => $this->sportRepository->findAll()
            ]);
    }

    public function getSportById($params)
    {
        $sport = $this->sportRepository->findById($params);
        return $this->render(
            SITE_NAME . ' - Sport: ' . $sport->design,
            'back/pages/sport/show.php',
            [
                'formDeleteSport' => FormSport::buildDeleteFormWithSport($sport),
                'formSport' => FormSport::buildUpdateFormWithSport($sport),
                'sports' => $this->sportRepository->findAll()
            ]);
    }
}
