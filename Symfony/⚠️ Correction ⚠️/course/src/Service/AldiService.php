<?php

namespace App\Service;

use App\Entity\Product;
use Facebook\WebDriver\Exception\NoSuchElementException;
use Facebook\WebDriver\Exception\TimeoutException;
use Symfony\Component\Panther\Client;

class AldiService
{
    private ?array $products = [];

    /**
     * @throws NoSuchElementException
     * @throws TimeoutException
     */
    public function getProducts(string $search = null): array
    {
        $this->generateProducts($search);
        return $this->products;
    }

    /**
     * @throws NoSuchElementException
     * @throws TimeoutException
     */
    public function generateProducts(string $search = null){
        $client = Client::createChromeClient();
        $client->request('GET', 'https://www.aldi.fr/recherche.html?query='. $search);
        $crawler = $client->waitFor('.mod-article-tile__content');
        $crawler->filter('.mod-article-tile__content')->each(function ($article) {
            $reduction = null;
            if ($article->filter('.price__previous-percentage')->getElement(0) != null) {
                $reduction = $article->filter('.price__previous-percentage')->text();
            }

            $price = null;
            if ($article->filter('.price__wrapper')->getElement(0) != null) {
                $price = trim($article->filter('.price__wrapper')->text(), "\n€");
                $price = str_replace(',', '.', $price);
            }

            $brand = null;
            if ($article->filter('.mod-article-tile__brand')->getElement(0) != null) {
                $brand = $article->filter('.mod-article-tile__brand')->text();
            }

            $title = null;
            if ($article->filter('.mod-article-tile__title')->getElement(0) != null) {
                $title = $article->filter('.mod-article-tile__title')->text();
            }

            $price_meta = null;
            if ($article->filter('.price__base')->getElement(0) != null) {
                $price_meta = $article->filter('.price__base')->text();
            }

            $this->products[] = new Product($title, $reduction, $brand, (float)$price, $price_meta);
        });
    }
}
