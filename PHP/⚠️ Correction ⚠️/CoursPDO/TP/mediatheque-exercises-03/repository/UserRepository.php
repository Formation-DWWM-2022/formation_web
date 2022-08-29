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
        $req = 'INSERT INTO user (id,pseudo,password,email)
        VALUES (:id,:pseudo,:password,:email)';

        $id = $user->getId();
        $pseudo = $user->getPseudo();
        $password = $user->getPassword();
        $email = $user->getEmail();

        if ($id != null and $pseudo != null and $password != null and $email != null) {
            $sth = $this->db->prepare($req);
            $sth->bindParam(':id', $id);
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
        $sth = $this->db->prepare('SELECT user.id AS uid, user.pseudo, user.email, user.password, user.media_id,
                media.id AS mid, media.title, media.creator, media.type_id, 
                type.id AS tid, type.name
                FROM user
                LEFT JOIN media ON user.media_id = media.id 
                LEFT JOIN type ON media.type_id = type.id');
        $sth->execute();
        $result = $sth->fetchAll(PDO::FETCH_ASSOC);
        foreach ($result as $user) {
            $type = $user['name'] != null ? new Type($user['type_id'], $user['name']) : null;
            $media = $user['title'] != null ? new Media($user['media_id'], $user['title'], $user['creator'], $type) : null;
            $users[] = new User($user['uid'], $user['pseudo'],
                $user['password'], $user['email'], $media);
        }
        return $users;
    }

    function fetch($req)
    {
        $sth = $this->db->prepare($req);
        $sth->execute();
        $user = $sth->fetch();
        if ($user == false) {
            return false;
        }
        $type = $user['name'] != null ? new Type($user['type_id'], $user['name']) : null;
        $media = $user['title'] != null ? new Media($user['media_id'], $user['title'], $user['creator'], $type) : null;
        return new User($user['uid'], $user['pseudo'],
            $user['password'], $user['email'], $media);
    }

    function delete($id)
    {
        $sth = $this->db->prepare('DELETE FROM user WHERE id = :id');
        $sth->bindParam(':id', $id);
        $sth->execute();
    }

    function numberUser()
    {
        $sth = $this->db->prepare('SELECT count(*) AS count FROM user');
        $sth->execute();
        return $sth->fetch(PDO::FETCH_ASSOC);
    }

    public function fetchAllWithLimit($currentPage, $parPage): array
    {
        $premier = ($currentPage * $parPage) - $parPage;
        $medias = [];
        $req = 'SELECT user.id AS uid, user.pseudo, user.email, user.password, user.media_id,
                media.id AS mid, media.title, media.creator, media.type_id, 
                type.id AS tid, type.name
                FROM user
                LEFT JOIN media ON user.media_id = media.id 
                LEFT JOIN type ON media.type_id = type.id
                ORDER BY user.pseudo ASC LIMIT :premier, :parpage';
        $sth = $this->db->prepare($req);
        $sth->bindValue(':premier', $premier, PDO::PARAM_INT);
        $sth->bindValue(':parpage', $parPage, PDO::PARAM_INT);
        $sth->execute();
        $result = $sth->fetchAll(PDO::FETCH_ASSOC);
        foreach ($result as $user) {
            $type = $user['name'] != null ? new Type($user['type_id'], $user['name']) : null;
            $media = $user['title'] != null ? new Media($user['media_id'], $user['title'], $user['creator'], $type) : null;
            $users[] = new User($user['uid'], $user['pseudo'],
                $user['password'], $user['email'], $media);
        }
        return $users;
    }

    function update(User $user)
    {
        $req = 'UPDATE user SET pseudo = :pseudo, 
                email = :email,
                media_id = :media_id
        WHERE id = :id';

        $id = $user->getId();
        $pseudo = $user->getPseudo();
        $email = $user->getEmail();
        $media_id = $user->getMediaId()->getId();

        if ($pseudo != null and $id != null and $email != null and $media_id != null) {
            $sth = $this->db->prepare($req);
            $sth->bindParam(':email', $email);
            $sth->bindParam(':media_id', $media_id);
            $sth->bindParam(':pseudo', $pseudo);
            $sth->bindParam(':id', $id);
            $sth->execute();
            addMessage('success', 'User enregistrer !');
        } else {
            addMessage('danger', 'Erreur lors de enregistrement !');
        }
    }
}

