<?php

namespace App\Repository;

use App\Entity\Sport;
use App\Service\Database;
use PDO;
use PDOException;

class SportRepository extends Database implements ISportRepository
{
    public function add(Sport $sport)
    {
        $stmt = $this->db->prepare("INSERT INTO sport (design) VALUES (:design)");
        $stmt->bindValue(':design', $sport->getDesign());
        $stmt->execute();
        $stmt = null;
    }

    public function findAll() : array
    {
        $stmt = $this->db->prepare("SELECT * FROM sport ORDER BY design ASC");
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $arr = $stmt->fetchAll();
        if (!$arr) {
            throw new PDOException("Could not find sport in database");
        }
        $stmt = null;
        $sports = [];
        foreach ($arr as $sport) {
            $s = new Sport($sport['design']);
            $s->setId($sport['id']);
            $sports[] = $s;
        }
        return $sports;
    }

    public function findByDesign(string $design): Sport
    {
        $stmt = $this->db->prepare("SELECT * FROM sport WHERE design = :design");
        $stmt->bindValue(':design', $design);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $arr = $stmt->fetch();
        if (!$arr) {
            throw new PDOException("Could not find design in database");
        }
        $stmt = null;
        $sport = new Sport($arr['design']);
        $sport->setId($arr['id']);
        return $sport;
    }

    public function update(Sport $sport)
    {
        var_dump($sport);
        $stmt = $this->db->prepare("UPDATE sport SET design = :design WHERE id = :id");
        $stmt->bindValue(':design', $sport->design);
        $stmt->bindValue(':id', $sport->id);
        $stmt->execute();
        $stmt = null;
    }

    public function remove(Sport $sport)
    {
        $stmt = $this->db->prepare("DELETE FROM sport WHERE id = :id");
        $stmt->bindValue(':id', $sport->id);
        $stmt->execute();
        $stmt = null;
    }

    public function findById($params): Sport
    {
        $stmt = $this->db->prepare("SELECT * FROM sport WHERE id = :id");
        $stmt->bindValue(':id', $params);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $arr = $stmt->fetch();
        if (!$arr) {
            throw new PDOException("Could not find id in database");
        }
        $stmt = null;
        $sport = new Sport($arr['design']);
        $sport->setId($arr['id']);
        return $sport;
    }
}
