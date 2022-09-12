<?php

namespace App\Repository;

use App\Entity\User;

interface IUserRepository
{
    public function add(User $user);

    public function findAll() : array;

    public function findByNom(string $nom): User;

    public function update(User $user);

    public function remove(User $user);

    public function findById($params): User;

    public function findByMail(string $mail);
}
