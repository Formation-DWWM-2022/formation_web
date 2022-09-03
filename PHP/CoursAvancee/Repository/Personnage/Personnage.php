<?php


class Personnage

{
    private $_id;
    private $_nom;
    private $_forcePerso;
    private $_degats;
    private $_niveau;
    private $_experience;

    public function __construct(array $donnees)
    {
        $this->hydrate($donnees);
    }

    public function hydrate(array $donnees)
    {
        foreach ($donnees as $key => $value) {
            # code...
            // On récupère le nom du setter correspondant à l'attribut.

            $method = 'set' . ucfirst($key);
            if (method_exists($this, $method)) {
                // new personne->setNom$nom
                $this->$method($value);
                // …
            }
        }
    }

    // Liste des getters
    public function id()
    {
        return $this->_id;
    }


    public function nom()
    {
        return $this->_nom;
    }

    public function degats()
    {
        return $this->_degats;
    }

    public function forcePerso()
    {
        return $this->_forcePerso;
    }

    public function niveau()
    {
        return $this->_niveau;
    }

    public function experience()
    {
        return $this->_experience;
    }

    //
    //   // les setters
    //
    public function setId($id)
    {
        $id = (int)$id;
        if ($id > 0) {
            $this->_id = $id;
        }
    }


    public function setNom($nom)
    {
        if (is_string($nom)) {
            $this->_nom = $nom;
        }
    }


    public function setForcePerso($forcePerso)
    {
        $forcePerso = (int)$forcePerso;
        if (!is_int($forcePerso)) {
            trigger_error('La force d\'un personnage doit être un nombre entier', E_USER_WARNING);

            return;
        } else {
            $this->_forcePerso = $forcePerso;
        }
    }

    public function setDegats($degats)
    {
        $degats = (int)$degats;
        if ($degats >= 0 && $degats <= 100) {
            $this->_degats = $degats;
        }
    }

    public function setNiveau($niveau)
    {
        $niveau = (int)$niveau;
        if ($niveau >= 1 && $niveau <= 100) {
            $this->_niveau = $niveau;
        }
    }

    public function setExperience($experience)
    {
        $experience  = (int)$experience;
        if ($experience >= 1 && $experience <= 100) {
            $this->_experience = $experience;
        }
    }
}
