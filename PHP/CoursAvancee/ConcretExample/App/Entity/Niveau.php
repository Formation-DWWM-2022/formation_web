<?php

namespace App\Entity;

// Enumeration
abstract class Niveau
{
    const DEBUTANT = "Débutant";
    const CONFIRME = "Confirmé";
    const PRO = "Pro";
    const SUPPORTER = "Supporter";

        static function getNiveau(): array
    {
        return [
            'DEBUTANT' => self::DEBUTANT,
            'CONFIRME' => self::CONFIRME,
            'PRO' => self::PRO,
            'SUPPORTER' => self::SUPPORTER,
        ];
    }
}
