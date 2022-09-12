<?php

namespace App\Controller\Back;

use App\Entity\Sport;
use App\Form\FormSport;
use App\Repository\ISportRepository;
use App\Repository\SportRepository;
use App\Service\Input;
use App\Service\Redirect;
use App\Service\ViewBack;
use App\Validator\Validation;

class SportController
{
    use ViewBack;

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
        if (Input::exists()) {
            var_dump($_POST);
            $val = new Validation;
            $val->name('design')->value(Input::get('design'))->pattern('alpha')->required();
            if ($val->isSuccess()) {
                $design = Input::get('design');
                $sport = new Sport($design);
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
