<?php

namespace App\Repository;

use App\Entity\User;
use App\Service\Database;
use PDO;
use PDOException;

class UserRepository extends Database implements IUserRepository
{
    public function add(User $user)
    {
        $stmt = $this->db->prepare("INSERT INTO user (mail) VALUES (:mail)");
        $stmt->bindValue(':mail', $user->getMail());
        $stmt->execute();
        $stmt = null;
    }

    public function findAll() : array
    {
        $stmt = $this->db->prepare("SELECT * FROM user ORDER BY nom ASC");
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $arr = $stmt->fetchAll();
        if (!$arr) {
            throw new PDOException("Could not find user in database");
        }
        $stmt = null;
        $users = [];
        foreach ($arr as $user) {
            $u = new User($user['mail']);
            $u->setId($user['id']);
            $u->setDepartement($user['departement']);
            $u->setNom($user['nom']);
            $u->setPrenom($user['prenom']);
            $users[] = $u;
        }
        return $users;
    }

    public function findByNom(string $nom): User
    {
        $stmt = $this->db->prepare("SELECT * FROM user WHERE nom = :nom");
        $stmt->bindValue(':nom', $nom);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $arr = $stmt->fetch();
        if (!$arr) {
            throw new PDOException("Could not find design in database");
        }
        $stmt = null;
        $user = new User($arr['mail']);
        $user->setId($arr['id']);
        $user->setDepartement($arr['departement']);
        $user->setNom($arr['nom']);
        $user->setPrenom($arr['prenom']);
        return $user;
    }

    public function update(User $user)
    {
        $stmt = $this->db->prepare("UPDATE user SET nom = :nom WHERE id = :id");
        $stmt->bindValue(':nom', $user->getNom());
        $stmt->bindValue(':id', $user->getId());
        $stmt->execute();
        $stmt = null;
    }

    public function remove(User $user)
    {
        $stmt = $this->db->prepare("DELETE FROM user WHERE id = :id");
        $stmt->bindValue(':id', $user->getId());
        $stmt->execute();
        $stmt = null;
    }

    public function findById($params): User
    {
        $stmt = $this->db->prepare("SELECT * FROM user WHERE id = :id");
        $stmt->bindValue(':id', $params);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $arr = $stmt->fetch();
        if (!$arr) {
            throw new PDOException("Could not find id in database");
        }
        $stmt = null;
        $user = new User($arr['mail']);
        $user->setId($arr['id']);
        $user->setDepartement($arr['departement']);
        $user->setNom($arr['nom']);
        $user->setPrenom($arr['prenom']);
        return $user;
    }

    public function findByMail(string $mail)
    {
        $stmt = $this->db->prepare("SELECT * FROM user WHERE mail = :mail");
        $stmt->bindValue(':mail', $mail);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $arr = $stmt->fetch();
        if (!$arr) {
            return false;
        }
        $stmt = null;
        $user = new User($arr['mail']);
        $user->setId($arr['id']);
        $user->setDepartement($arr['departement']);
        $user->setNom($arr['nom']);
        $user->setPrenom($arr['prenom']);
        return $user;
    }
}
