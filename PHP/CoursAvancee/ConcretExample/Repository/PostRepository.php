<?php

namespace App\Repository;

use App\Service\Database;

class PostRepository
{
    private Database $db;

    public function __construct(Database $db)
    {
        $this->db = $db;
    }

    function findAll()
    {
        return $this->db->select('post', null);
    }
}
