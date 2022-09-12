<?php

namespace App\Repository;

use App\Entity\Pratique;
use App\Service\Database;
use PDO;

class PratiqueRepository extends Database implements IPratiqueRepository
{
    public function add(Pratique $pratique)
    {
        $stmt = $this->db->prepare("INSERT INTO pratique (id_user, id_sport, niveau) VALUES (:id_user, :id_sport, :niveau)");
        $stmt->bindValue(':id_user', $pratique->id_user);
        $stmt->bindValue(':id_sport', $pratique->id_sport);
        $stmt->bindValue(':niveau', $pratique->niveau);
        $stmt->execute();
        $stmt = null;
    }
}
