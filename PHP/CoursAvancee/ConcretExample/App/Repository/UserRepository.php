<?php

namespace App\Repository;

use App\Entity\User;
use App\Service\Database;
use PDO;

class UserRepository extends Database implements IUserRepository
{

    public function add(User $user)
    {
        // TODO: Implement add() method.
    }

    public function findAll(): array
    {
        // TODO: Implement findAll() method.
    }

    public function findByNom(string $nom): User
    {
        // TODO: Implement findByNom() method.
    }

    public function update(User $user)
    {
        // TODO: Implement update() method.
    }

    public function remove(User $user)
    {
        // TODO: Implement remove() method.
    }
}
