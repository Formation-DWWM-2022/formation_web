<?php

namespace App\Entity;

use App\Repository\ProductRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProductRepository::class)]
class Product
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $title = null;

    #[ORM\Column]
    private ?string $reduction = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $brand = null;

    #[ORM\Column]
    private ?float $price = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $price_meta = null;

    /**
     * @param string|null $title
     * @param string|null $reduction
     * @param string|null $brand
     * @param float|null $price
     * @param string|null $price_meta
     */
    public function __construct(?string $title, ?string $reduction, ?string $brand, ?float $price, ?string $price_meta)
    {
        $this->title = $title;
        $this->reduction = $reduction;
        $this->brand = $brand;
        $this->price = $price;
        $this->price_meta = $price_meta;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getReduction(): ?string
    {
        return $this->reduction;
    }

    public function setReduction(string $reduction): self
    {
        $this->reduction = $reduction;

        return $this;
    }

    public function getBrand(): ?string
    {
        return $this->brand;
    }

    public function setBrand(?string $brand): self
    {
        $this->brand = $brand;

        return $this;
    }

    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function setPrice(float $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getPriceMeta(): ?string
    {
        return $this->price_meta;
    }

    public function setPriceMeta(?string $price_meta): self
    {
        $this->price_meta = $price_meta;

        return $this;
    }


}
