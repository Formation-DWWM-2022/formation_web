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
        $type_id = $media->getTypeId()->getId();

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
        $req = 'SELECT media.id, media.title, media.creator, media.type_id, type.name
                FROM media 
                LEFT JOIN type ON media.type_id = type.id 
                ORDER BY media.title ASC';
        $sth = $this->db->prepare($req);
        $sth->execute();
        $result = $sth->fetchAll(PDO::FETCH_ASSOC);
        foreach ($result as $media) {
            $medias[] = new Media($media['id'], $media['title'],
                $media['creator'], new Type($media['type_id'],
                    $media['name']));
        }
        return $medias;
    }

    function fetch($req): Media
    {
        $sth = $this->db->prepare($req);
        $sth->execute();
        $media = $sth->fetch(PDO::FETCH_ASSOC);
        return new Media($media['mid'], $media['title'],
            $media['creator'], new Type($media['type_id'],
                $media['name']));
    }

    function delete($id)
    {
        $sth = $this->db->prepare('DELETE FROM media WHERE id = :id');
        $sth->bindParam(':id', $id);
        $sth->execute();
    }

    function update(Media $media)
    {
        $req = 'UPDATE media SET title = :title, creator = :creator, 
                 type_id = :type_id WHERE id = :id';

        $id = $media->getId();
        $title = $media->getTitle();
        $creator = $media->getCreator();
        $type_id = $media->getTypeId()->getId();

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

    public function fetchAllWithLimit($currentPage, $parPage): array
    {
        $premier = ($currentPage * $parPage) - $parPage;
        $medias = [];
        $req = 'SELECT media.id, media.title, media.creator, media.type_id, type.name
                FROM media 
                LEFT JOIN type ON media.type_id = type.id 
                ORDER BY media.title ASC LIMIT :premier, :parpage';
        $sth = $this->db->prepare($req);
        $sth->bindValue(':premier', $premier, PDO::PARAM_INT);
        $sth->bindValue(':parpage', $parPage, PDO::PARAM_INT);
        $sth->execute();
        $result = $sth->fetchAll(PDO::FETCH_ASSOC);
        foreach ($result as $media) {
            $medias[] = new Media($media['id'], $media['title'],
                $media['creator'], new Type($media['type_id'],
                    $media['name']));
        }
        return $medias;
    }
}
