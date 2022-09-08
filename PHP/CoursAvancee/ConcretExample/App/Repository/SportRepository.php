<?php

namespace App\Repository;

use App\Entity\Sport;
use PDO;
use PDOException;

class SportRepository implements ISportRepository
{
    private PDO $connection;

    public function __construct(PDO $connection)
    {
        $this->connection = $connection;
    }

    public function add(Sport $sport)
    {
        $stmt = $this->connection->prepare("INSERT INTO sport (design) VALUES (:design)");
        $stmt->bindValue(':design', $sport->getDesign());
        $stmt->execute();
        $stmt = null;
    }

    public function findAll() : array
    {
        $stmt = $this->connection->prepare("SELECT * FROM sport ORDER BY design ASC");
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
        $stmt = $this->connection->prepare("SELECT * FROM sport WHERE design = :design");
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
        $stmt = $this->connection->prepare("UPDATE sport SET design = :design WHERE id = :id");
        $stmt->bindValue(':design', $sport->design);
        $stmt->bindValue(':design', $sport->id);
        $stmt->execute();
        $stmt = null;
    }

    public function remove(Sport $sport)
    {
        $stmt = $this->connection->prepare("DELETE FROM sport WHERE id = :id");
        $stmt->bindValue(':design', $sport->id);
        $stmt->execute();
        $stmt = null;
    }

    public function findById($params)
    {
        $stmt = $this->connection->prepare("SELECT * FROM sport WHERE id = :id");
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
