<?php

class MediaRepository
{
    private PDO $db;

    function __construct(PDO $db)
    {
        $this->db = $db;
    }

    function insert(Media $media)
    {
        $req = 'INSERT INTO media (title,creator,type_id)
        VALUES (:title,:creator,:type_id)';

        $title = $media->getTitle();
        $creator = $media->getCreator();
        $type_id = $media->getTypeId();

        var_dump($title, $creator, $type_id);

        if ($title != null and $creator != null and $type_id >= 0) {
            $sth = $this->db->prepare($req);
            $sth->bindParam(':title', $title);
            $sth->bindParam(':creator', $creator);
            $sth->bindParam(':type_id', $type_id);
            $sth->execute();
            addMessage('success', 'Media enregistrer !');
        } else {
            addMessage('danger', 'Erreur lors de enregistrement !');
        }
    }

    function fetchAll()
    {
        $sth = $this->db->prepare('SELECT * FROM media');
        $sth->execute();
        return $sth->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE,
            'Media',
            [NULL, '', '', 0]);
    }

    function fetch($req)
    {
        $sth = $this->db->prepare($req);
        $sth->execute();
        $sth->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE,
            'Media',
            [NULL, '', '', 0]);
        return $sth->fetch();
    }

    function delete($id)
    {
        $sth = $this->db->prepare('DELETE FROM media WHERE id = :id');
        $sth->bindParam(':id', $id);
        $sth->execute();
        return $sth->fetch(PDO::FETCH_ASSOC);
    }

    function update(Media $media)
    {
        $req = 'UPDATE media SET title = :title, creator = :creator, 
                 type_id = :type_id WHERE id = :id';

        $id = $media->getId();
        $title = $media->getTitle();
        $creator = $media->getCreator();
        $type_id = $media->getTypeId();

        if ($title != null and $creator != null and $type_id != null and $id != null) {
            $sth = $this->db->prepare($req);
            $sth->bindParam(':title', $title);
            $sth->bindParam(':creator', $creator);
            $sth->bindParam(':type_id', $type_id);
            $sth->bindParam(':id', $id);
            $sth->execute();
            addMessage('success', 'Media enregistrer !');
        } else {
            addMessage('danger', 'Erreur lors de enregistrement !');
        }
    }

    function numberMedia()
    {
        $sth = $this->db->prepare('SELECT count(*) AS count FROM media');
        $sth->execute();
        return $sth->fetch(PDO::FETCH_ASSOC);
    }

    public function fetchAllWithLimit($currentPage, $parPage)
    {
        $premier = ($currentPage * $parPage) - $parPage;
        $req = 'SELECT id, title, creator, type_id FROM media ORDER BY title 
            DESC LIMIT :premier, :parpage';
        $sth = $this->db->prepare($req);
        $sth->bindValue(':premier', $premier, PDO::PARAM_INT);
        $sth->bindValue(':parpage', $parPage, PDO::PARAM_INT);
        $sth->execute();
        $medias = $sth->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE,
            'Media',
            [NULL, '', '', 0]);
        return $medias;
    }
}
