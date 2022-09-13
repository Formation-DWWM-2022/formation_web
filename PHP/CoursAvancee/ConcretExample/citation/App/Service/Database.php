<?php

namespace App\Service;

use PDO;
use PDOException;

class Database
{
    protected ?PDO $db = null;

    public function __construct()
    {
        try {
            $this->db = new PDO("mysql:host=" . (DB_HOST) . ";dbname=" . (DB_NAME) . "", DB_USER, DB_PASS);
            $this->db->exec("set names utf8mb4");
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    function customSelect(string $sql)
    {
        try {
            $stmt = $this->db->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    function select($table, $cond = null)
    {
        $sql = "SELECT * FROM $table";
        if ($cond) {
            $sql .= " WHERE " . $cond['key'] . " = :" . $cond['key'];
        }

        try {
            $stmt = $this->db->prepare($sql);
            if ($cond) {
                $stmt->bindParam(':' . $cond['key'], $cond['value']);
            }
            $stmt->execute();
            return $stmt->fetchAll();  // assuming $result == true
        } catch (PDOException $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    function numRows($rows): int
    {
        return count($rows);
    }

    function close() : void
    {
        $this->db = null;
    }
}

