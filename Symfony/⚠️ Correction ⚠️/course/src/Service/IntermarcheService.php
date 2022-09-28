<?php

namespace App\Service;

use App\Entity\Product;
use Facebook\WebDriver\Exception\NoSuchElementException;
use Facebook\WebDriver\Exception\TimeoutException;
use Symfony\Component\Panther\Client;

class IntermarcheService
{
    private ?array $products = [];

    public function getProducts(string $search = null): array
    {
//        $this->generateProducts($search);
        return $this->products;
    }

    public function generateProducts(string $search = null)
    {
        $client = Client::createChromeClient();
        $client->request('GET', 'https://www.intermarche.com/recherche/coca');
    }
}
