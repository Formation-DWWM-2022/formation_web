<?php

namespace App\Repository;

use App\Entity\Citation;

interface ICitationRepository
{
    public function add(Citation $citation);
    public function findAll() : array;
}
