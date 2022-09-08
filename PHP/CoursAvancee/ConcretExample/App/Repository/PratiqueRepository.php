<?php

namespace App\Repository;

use App\Entity\Pratique;
use PDO;

class PratiqueRepository implements IPratiqueRepository
{
    private PDO $connection;

    public function __construct(PDO $connection)
    {
        $this->connection = $connection;
    }

    public function add(Pratique $Pratique)
    {
        // TODO: Implement add() method.
    }

    public function findAll(): array
    {
        // TODO: Implement findAll() method.
    }

    public function update(Pratique $Pratique)
    {
        // TODO: Implement update() method.
    }

    public function remove(Pratique $Pratique)
    {
        // TODO: Implement remove() method.
    }

    public function findByDesign(string $pratique): Pratique
    {
        // TODO: Implement findByDesign() method.
    }
}
