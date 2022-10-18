<?php

namespace App\Service;


use Symfony\Component\Panther\Client;

class CarrefourService
{
    private ?array $products = [];

    public function getProducts(string $search = null): array
    {
        $this->generateProducts($search);
        return $this->products;
    }

    public function generateProducts(string $search = null)
    {
//        $client = Client::createChromeClient(base_path("drivers/chromedriver"), null, ["port" => 9558]);
        $client = Client::createChromeClient();
        $client->request('GET', 'https://www.monoprix.fr/courses/search/coca/coca');
        dump($client);
    }
}
