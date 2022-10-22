<?php

namespace App\Twig;

use App\Form\SearchType;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\Form\FormView;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;


class SearchTypeExtension extends AbstractExtension
{
    private FormFactoryInterface $formFactory;
    private UrlGeneratorInterface $urlGenerator;

    public function __construct(FormFactoryInterface $formFactory, UrlGeneratorInterface $urlGenerator)
    {
        $this->formFactory = $formFactory;
        $this->urlGenerator = $urlGenerator;
    }

    public function getFunctions(): array
    {
        return [
            new TwigFunction('get_search_type', [$this, 'getSearchType']),
        ];
    }

    public function getSearchType(): FormView
    {
        $form = $this->formFactory->create(SearchType::class, null, [
            'action' => $this->urlGenerator->generate('app_search'),
            'method' => 'POST',
        ]);
        return $form->createView();
    }
}
