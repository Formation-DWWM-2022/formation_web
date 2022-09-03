<?php

namespace App\Service;

use PDOException;
use PDO;

class Database
{
    private $hostname;
    private $username;
    private $password;
    private $dbname;
    private $db;

    function __construct($hostname = "localhost", $dbname = '', $username = "root", $password = '')
    {
        $this->hostname = $hostname;
        $this->dbname = $dbname;
        $this->username = $username;
        $this->password = $password;

        try {
            $this->db = new PDO("mysql:host=$this->hostname;dbname=$this->dbname", $this->username, $this->password);
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    function customSelect($sql)
    {
        try {
            $stmt = $this->db->prepare($sql);
            $stmt->execute();
            $rows = $stmt->fetchAll();
            return $rows;
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
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
            $rows = $stmt->fetchAll(); // assuming $result == true
            return $rows;
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    function numRows($rows)
    {
        $n = count($rows);
        return $n;
    }

    function deleteCond($table, $cond = null)
    {
        $sql = "DELETE FROM `$table`";
        if ($cond) {
            $sql .= " WHERE " . $cond['key'] . " = :" . $cond['key'];
        }

        try {
            $stmt = $this->db->prepare($sql);
            if ($cond) {
                $stmt->bindParam(':' . $cond['key'], $cond['value']);
            }
            $stmt->execute();
            return $stmt->rowCount(); // 1
        } catch (PDOException $e) {
            return 'Error: ' . $e->getMessage();
        }
    }

    function delete(int $id)
    {
        try {
            $stmt = $this->db->prepare("DELETE FROM {$this->table} WHERE id = :id");
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            return $stmt->rowCount();
        } catch (PDOException $e) {
            return 'Error: ' . $e->getMessage();
        }
    }

    function close()
    {
        $this->db = null;
    }
}
