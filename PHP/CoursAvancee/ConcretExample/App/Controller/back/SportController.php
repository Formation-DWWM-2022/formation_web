<?php

namespace App\Controller\Back;

use App\Entity\Sport;
use App\Form\FormSport;
use App\Repository\ISportRepository;
use App\Repository\SportRepository;
use App\Service\Input;
use App\Service\Redirect;
use App\Service\View;
use App\Validator\Validation;

class SportController
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

    public function deleteSportById($params)
    {
        $sport = $this->sportRepository->findById($params);
        $this->sportRepository->remove($sport);
        Redirect::to('admin/sport');
    }

    public function updateSportById($params)
    {
        if (Input::exists()) {
            $val = new Validation;
            $val->name('design')->value(Input::get('design'))->pattern('alpha')->required();
            if ($val->isSuccess()) {
                $sport = $this->sportRepository->findById($params);
                $sport->setDesign(Input::get('design'));
                $this->sportRepository->update($sport);
                Redirect::to('admin/sport');
            }
        }
    }

    public function addSport()
    {
        var_dump('ok');
        if (Input::exists()) {
            $val = new Validation;
            $val->name('design')->value(Input::get('design'))->pattern('alpha')->required();
            if ($val->isSuccess()) {
                $sport = new Sport(Input::get('design'));
                $this->sportRepository->add($sport);
                Redirect::to('admin/sport');
            }
        } else {
            return $this->render(
                SITE_NAME . ' - Add Sport: ',
                'back/pages/sport/new.php',
                [
                    'formSport' => FormSport::buildCreateForm(),
                ]);
        }
    }
}
