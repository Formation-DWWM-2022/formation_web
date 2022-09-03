<?php

class PersonnagesManager extends Manager
{
    public function __construct($db)
    {
        parent::__construct($db);
    }

    /**
     * @param Personnage $perso
     */
    public function add(Personnage $perso)
    {

        // Préparation de la requête d'insertion.
        $q = self::$_db->prepare('INSERT INTO Personnage(nom, forcePerso, degats, niveau, experience) VALUES (:nom, :forcePerso, :degats, :niveau, :experience');

        // Assignation des valeurs pour le nom, la force, les dégâts, l'expérience et le niveau du personnage.

        //  Associe une valeur à un nom correspondant ou à un point d'interrogation (comme paramètre fictif) dans la requête SQL qui a été utilisé pour préparer la requête.
        $q->bindValue(':nom', $perso->nom());
        $q->bindValue(':forcePerso', $perso->forcePerso(), PDO::PARAM_INT);
        $q->bindValue(':degats', $perso->degats(), PDO::PARAM_INT);
        $q->bindValue(':niveau', $perso->niveau(), PDO::PARAM_INT);
        $q->bindValue(':experience', $perso->experience(), PDO::PARAM_INT);

        $q->execute();
        // Exécution de la requête.

    }


    public function delete(Personnage $perso)
    {
        $q = self::$_db->prepare('DELETE FROM Personnage WHERE id = :id');
        // Exécute une requête de type DELETE.
        $q->bindValue(':id', $perso->id(), PDO::PARAM_INT);
        $q->execute();
    }


    public function get(Personnage $perso)
    {
        // Exécute une requête de type SELECT avec une clause WHERE, et retourne un objet Personnage.
        $q = self::$_db->prepare('SELECT * FROM Personne WHERE id = :id');
        $q->bindValue(':id', $perso->id(), PDO::PARAM_INT);

        $donnnes = $q->fetch(PDO::FETCH_ASSOC);
        return new Personnage($donnnes);
    }


    public function getList()
    {
        // Retourne la liste de tous les personnages.
        $q = self::$_db->query('SELECT * FROM Personnage  ORDER BY nom');
        $personnage = $q->fetchAll(PDO::FETCH_ASSOC);
        foreach ($personnage as $key => $value) {
            return new Personnage($value);
        }
    }


    public function update(Personnage $perso)
    {
        $q = self::$_db->prepare('UPDATE Personnage SET nom=:nom, forcePerso=:forcePerso, degats=:degats, niveau=:niveau, experience=:experience');

        // Assignation des valeurs à la requête.
        $q->bindValue(':nom', $perso->nom());
        $q->bindValue(':forcePerso', $perso->forcePerso(), PDO::PARAM_INT);
        $q->bindValue(':degats', $perso->degats(), PDO::PARAM_INT);
        $q->bindValue(':niveau', $perso->niveau(), PDO::PARAM_INT);
        $q->bindValue(':experience', $perso->experience(), PDO::PARAM_INT);

        // Exécution de la requête.
        $q->execute();
    }
}
