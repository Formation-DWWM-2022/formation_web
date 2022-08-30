<?php

namespace App\Controller\Front;

class HomeController
{
    // private StageRepository $stageRepository;
    // private AdditionalRepository $additionalRepository;

    // public function __construct(AdditionalRepository $additionalRepository, StageRepository $stageRepository)
    // {
    //     $this->stageRepository = $stageRepository;
    //     $this->additionalRepository = $additionalRepository;
    // }

    public function invoke()
    {
        return 'HomePage';
        // $stages = $this->stageRepository->findAllNotExpired();
        // $additionals = $this->additionalRepository->findAll();

        // return $this->render('Front/pages/home/index.html.twig', [
        //     'stages' => $stages,
        //     'additionals' => $additionals
        // ]);
    }
}
