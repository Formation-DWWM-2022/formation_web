<?php

namespace App\Controller\Back;

use App\Repository\PostRepository;

class PostController
{
    private PostRepository $postRepository;

    public function __construct(PostRepository $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    public function invoke()
    {
        // $posts = $this->postRepository->findAll();
        $posts = ['0' => 'Alexandre', '1' => 'Pierre'];

        // return $this->render('Front/pages/home/index.html.twig', [
        //     'stages' => $stages,
        //     'additionals' => $additionals
        // ]);
        return 'PostController';
    }
}
