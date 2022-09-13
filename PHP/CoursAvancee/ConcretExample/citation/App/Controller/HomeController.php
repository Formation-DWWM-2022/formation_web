<?php

namespace App\Controller;

use App\Entity\Citation;
use App\Form\FormCitation;
use App\Repository\CitationRepository;
use App\Repository\ICitationRepository;
use App\Service\Input;
use App\Service\Redirect;
use App\Service\View;
use App\Validator\Validation;

class HomeController
{
    use View;

    private ICitationRepository $citationRepository;

    public function __construct()
    {
        $this->citationRepository = new CitationRepository();
    }

    public function invoke() : string
    {
        return $this->render(
            SITE_NAME . ' - HomePage',
            'accueil.php',
            [
                'formCitation' => FormCitation::buildAddCitation(),
                'citations' => $this->citationRepository->findAll()
            ]);
    }

    public function add()
    {
        if (Input::exists()) {
            $val = new Validation;
            $val->name('citation')->value(Input::get('citation'))->required();
            $val->name('auteur')->value(Input::get('auteur'))->required();
            if ($val->isSuccess()) {
                $design = Input::get('citation');
                $auteur = Input::get('auteur');
                $citation = new Citation($design, $auteur);
                $this->citationRepository->add($citation);
                Redirect::to('/');
            }
        }
        Redirect::to('/');
    }
}
