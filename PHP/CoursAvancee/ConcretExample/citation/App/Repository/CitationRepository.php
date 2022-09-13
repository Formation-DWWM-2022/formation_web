<?php

namespace App\Repository;

use App\Entity\Citation;
use App\Service\Database;
use PDO;
use PDOException;

class CitationRepository extends Database implements ICitationRepository
{
    public function add(Citation $citation)
    {
        $stmt = $this->db->prepare("INSERT INTO citation (citation, auteur) VALUES (:citation, :auteur)");
        $stmt->bindValue(':citation', $citation->getCitation());
        $stmt->bindValue(':auteur', $citation->getAuteur());
        $stmt->execute();
        $stmt = null;
    }

    public function findAll(): array
    {
        $stmt = $this->db->prepare("SELECT * FROM citation ORDER BY auteur ASC");
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $arr = $stmt->fetchAll();
        if (!$arr) {
            throw new PDOException("Could not find citation in database");
        }
        $stmt = null;
        $citations = [];
        foreach ($arr as $citation) {
            $c = new Citation($citation['citation'], $citation['auteur']);
            $c->setId($citation['id']);
            $citations[] = $c;
        }
        return $citations;
    }
}
