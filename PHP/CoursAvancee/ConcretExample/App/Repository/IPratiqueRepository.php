<?php

namespace App\Repository;

use App\Entity\Pratique;

interface IPratiqueRepository
{
    public function add(Pratique $pratique);
}
