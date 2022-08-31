<?php
abstract class Manager
{
    protected PDO $_db;

    public function __construct($db)
    {
        $this->setDb($db);
    }

    // create add insert
    abstract public function add(Personnage $perso);

    // read SELECT
    abstract public function get(Personnage $perso);

    // uptade
    abstract public function update(Personnage $perso);

    // delete
    abstract public function delete(Personnage $perso);

    public function setDb(PDO $db)
    {
        $this->_db = $db;
    }
}
