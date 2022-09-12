<?php

namespace App\Entity;

use Exception;

class Pratique
{
    private int $id_user;
    private int $id_sport;
    private string $niveau;

    /**
     * @param int $id_user
     * @param int $id_sport
     * @param string $niveau
     */
    public function __construct(int $id_user, int $id_sport, string $niveau)
    {
        $this->id_user = $id_user;
        $this->id_sport = $id_sport;
        $this->niveau = $niveau;
    }

    /**
     * @throws Exception
     */
    public function __get($property)
    {
        if ('id_user' === $property) {
            return $this->id_user;
        } elseif ('id_sport' === $property) {
            return $this->id_sport;
        } elseif ('niveau' === $property) {
            return $this->niveau;
        } else {
            throw new Exception('Propriété invalide !');
        }
    }
}
