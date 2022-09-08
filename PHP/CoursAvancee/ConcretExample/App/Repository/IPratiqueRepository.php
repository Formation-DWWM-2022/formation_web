<?php

namespace App\Repository;

interface IPratiqueRepository
{
    public function add(Pratique $pratique);

    public function findAll() : array;

    public function findByDesign(string $pratique): Pratique;

    public function update(Pratique $pratique);

    public function remove(Pratique $pratique);
}
