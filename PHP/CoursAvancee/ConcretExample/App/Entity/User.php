<?php

namespace App\Entity;

class User
{
    private int $id;
    private string $nom;
    private string $prenom;
    private string $departement;
    private string $mail;

    public function __construct($mail)
    {
        $this->mail = $mail;
    }

    /**
     * @return string
     */
    public function getMail(): string
    {
        return $this->mail;
    }

    /**
     * @param string $mail
     */
    public function setMail(string $mail): void
    {
        $this->mail = $mail;
    }
}
