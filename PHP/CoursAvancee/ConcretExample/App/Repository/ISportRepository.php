<?php

namespace App\Repository;

use App\Entity\Sport;

interface ISportRepository
{
    public function add(Sport $sport);

    public function findAll() : array;

    public function findByDesign(string $design): Sport;

    public function update(Sport $sport);

    public function remove(Sport $sport);

    public function findById($params);
}
