<?php

namespace App\Entity;

class Citation{
    private int $id;
    private string $citation;
    private string $auteur;

    /**
     * @param string $citation
     * @param string $auteur
     */
    public function __construct(string $citation, string $auteur)
    {
        $this->citation = $citation;
        $this->auteur = $auteur;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getCitation(): string
    {
        return $this->citation;
    }

    /**
     * @param string $citation
     */
    public function setCitation(string $citation): void
    {
        $this->citation = $citation;
    }

    /**
     * @return string
     */
    public function getAuteur(): string
    {
        return $this->auteur;
    }

    /**
     * @param string $auteur
     */
    public function setAuteur(string $auteur): void
    {
        $this->auteur = $auteur;
    }
}
