<?php

class TypeRepository
{
    private PDO $db;

    function __construct(PDO $db)
    {
        $this->db = $db;
    }

    function insert(Type $type)
    {
        $req = 'INSERT INTO type (name) VALUES (:name)';

        $name = $type->getName();

        var_dump($name);

        if ($name != null) {
            $sth = $this->db->prepare($req);
            $sth->bindParam(':name', $name);
            $sth->execute();
            addMessage('success', 'Type enregistrer !');
        } else {
            addMessage('danger', 'Erreur lors de enregistrement !');
        }
    }

    function fetchAll()
    {
        $sth = $this->db->prepare('SELECT * FROM type');
        $sth->execute();
        return $sth->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE,
            'Type',
            [NULL, '']);
    }

    function fetch(string $req)
    {
        $sth = $this->db->prepare($req);
        $sth->execute();
        $sth->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE,
            'Type',
            [NULL, '']);
        return $sth->fetch();
    }

    function delete(int $id)
    {
        $sth = $this->db->prepare('DELETE FROM type WHERE id = :id');
        $sth->bindParam(':id', $id);
        $sth->execute();
        return $sth->fetch(PDO::FETCH_ASSOC);
    }

    function update(Type $type)
    {
        $req = 'UPDATE type SET name = :name WHERE id = :id';

        $id = $type->getId();
        $name = $type->getName();

        if ($name != null and $id != null) {
            $sth = $this->db->prepare($req);
            $sth->bindParam(':name', $name);
            $sth->bindParam(':id', $id);
            $sth->execute();
            addMessage('success', 'Type enregistrer !');
        } else {
            addMessage('danger', 'Erreur lors de enregistrement !');
        }
    }

    function numberType()
    {
        $sth = $this->db->prepare('SELECT count(*) AS count FROM type');
        $sth->execute();
        return $sth->fetch(PDO::FETCH_ASSOC);
    }

    public function fetchAllWithLimit($currentPage, $parPage)
    {
        $premier = ($currentPage * $parPage) - $parPage;
        $req = 'SELECT id, name FROM type ORDER BY name 
            DESC LIMIT :premier, :parpage';
        $sth = $this->db->prepare($req);
        $sth->bindValue(':premier', $premier, PDO::PARAM_INT);
        $sth->bindValue(':parpage', $parPage, PDO::PARAM_INT);
        $sth->execute();
        return $sth->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE,
            'Type',
            [NULL, '']);

    }
}
