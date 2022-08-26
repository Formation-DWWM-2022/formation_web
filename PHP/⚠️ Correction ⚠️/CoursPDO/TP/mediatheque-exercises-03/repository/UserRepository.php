<?php

class UserRepository
{
    private PDO $db;

    function __construct(PDO $db)
    {
        $this->db = $db;
    }

    function insert(User $user)
    {
        $req = 'INSERT INTO user (pseudo,password,email)
        VALUES (:pseudo,:password,:email)';

        $pseudo = $user->getPseudo();
        $password = $user->getPassword();
        $email = $user->getEmail();

        var_dump($pseudo, $password, $email);

        if ($pseudo != null and $password != null and $email != null) {
            $sth = $this->db->prepare($req);
            $sth->bindParam(':pseudo', $pseudo);
            $sth->bindParam(':password', $password);
            $sth->bindParam(':email', $email);
            $sth->execute();
            addMessage('success', 'User enregistrer !');
        } else {
            addMessage('danger', 'Erreur lors de enregistrement !');
        }
    }

    function fetchAll()
    {
        $sth = $this->db->prepare('SELECT * FROM user');
        $sth->execute();
        return $sth->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE,
            'User',
            [NULL, '', '', '']);
    }

    function fetch($req)
    {
        $sth = $this->db->prepare($req);
        $sth->execute();
        $sth->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE,
            'User',
            [NULL, '', '', '']);
        return $sth->fetch();
    }

    function delete($id)
    {
        $sth = $this->db->prepare('DELETE FROM user WHERE id = :id');
        $sth->bindParam(':id', $id);
        $sth->execute();
        return $sth->fetch(PDO::FETCH_ASSOC);
    }

    function numberUser()
    {
        $sth = $this->db->prepare('SELECT count(*) AS count FROM user');
        $sth->execute();
        return $sth->fetch(PDO::FETCH_ASSOC);
    }

    public function fetchAllWithLimit($currentPage, $parPage)
    {
        $premier = ($currentPage * $parPage) - $parPage;
        $req = 'SELECT * FROM user ORDER BY pseudo 
            DESC LIMIT :premier, :parpage';
        $sth = $this->db->prepare($req);
        $sth->bindValue(':premier', $premier, PDO::PARAM_INT);
        $sth->bindValue(':parpage', $parPage, PDO::PARAM_INT);
        $sth->execute();
        return $sth->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE,
            'User',
            [NULL, '', '', '']);

    }
}

