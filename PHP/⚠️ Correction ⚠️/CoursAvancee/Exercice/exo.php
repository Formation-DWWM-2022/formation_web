<?php
// class ville
// {
//     public $nom;
//     public $depart;
//     public function getinfo()
//     {
//         $texte = "La ville de $this->nom est dans le département : $this->depart <br />";
//         return $texte;
//     }
// }
// //Création d'objets
// $ville1 = new ville();
// $ville1->nom = "Nantes";
// $ville1->depart = "Loire Atlantique";
// $ville2 = new ville();
// $ville2->nom = "Lyon";
// $ville2->depart = "Rhône";
// echo $ville1->getinfo();
// echo $ville2->getinfo();


class ville
{
    private $nom;
    private $depart;
    public function __construct($nom, $depart)
    {
        $this->nom = $nom;
        $this->depart = $depart;
    }
    public function getinfo()
    {
        $texte = "La ville de $this->nom est dans le département : $this->depart <br />";
        return $texte;
    }
}
//Création d'objets
$ville1 = new ville("Nantes", "Loire Atlantique");
$ville2 = new ville("Lyon", "Rhône");
echo $ville1->getinfo();
echo $ville2->getinfo();

// class personne
// {
//     private $nom;
//     private $prénom;
//     private $adresse;
//     //Constructeur
//     public function __construct($nom, $prénom, $adresse)
//     {
//         $this->nom = $nom;
//         $this->prénom = $prénom;
//         $this->adresse = $adresse;
//     }
//     //Destructeur
//     public function __destruct()
//     {
//         echo "<script type=\"text/javascript\">alert('La personne nommée $this->prénom $this->nom \\nest supprimée de vos contacts')</script>";
//     }
//     //
//     public function getpersonne()
//     {
//         $texte = " $this->prénom $this->nom <br /> $this->adresse <br />";
//         return $texte;
//     }
//     //
//     public function setadresse($adresse)
//     {
//         $this->adresse = $adresse;
//     }
// }
// //Création d'objets
// $client = new personne("Geelsen", "Jan", " 145 Rue du Maine Nantes");
// echo $client->getpersonne();
// //Modification de l'adresse
// $client->setadresse("23 Avenue Foch Lyon");
// echo $client->getpersonne();
// //Suppression explicite du client, donc appel du destructeur
// unset($client);
// //Fin du script
// echo "Fin du script";

class form
{
    protected $code;
    protected $codeinit;
    protected $codetext;
    protected $codesubmit;
    public function __construct($action, $titre, $methode = "post")
    {
        $this->codeinit = "<form action=\"$action\" method=\"$methode\">";
        $this->codeinit .= "<fieldset><legend><b>$titre</b></legend>";
    }
    //********************************************
    public function settext($name, $libelle, $methode = "post")
    {
        $this->codetext .= "<b>$libelle</b><input type=\"text\" name=\"$name\" /><br /><br />";
    }
    //************************************************
    public function setsubmit($name = "envoi", $value = "Envoyer")
    {
        $this->codesubmit = "<input type=\"submit\" name=\"$name\" value=\"Envoyer\"/><br />";
    }
    //**************************
    public function getform()
    {
        $this->code = "";
        $this->code .= $this->codeinit;
        $this->code .= $this->codetext;
        $this->code .= $this->codesubmit;
        $this->code .= "</fieldset></form>";
        echo $this->code;
    }
}

$myform = new form("traitement.php", "Accès au site", "post");
$myform->settext("nom", "Votre nom : &nbsp;");
$myform->settext("code", "Votre code : ");
$myform->setsubmit();
$myform->getform();

class form2 extends form
{
    protected $coderadio;
    protected $codecase;
    public function __construct($action, $titre, $methode = "post")
    {
        parent::__construct($action, $titre, $methode = "post");
    }
    //********************************************
    public function setradio($name, $libelle, $value)
    {
        $this->coderadio .= "<b>$libelle</b><input type=\"radio\" name=\"$name\" value=\"$value\"/><br />";
    }
    //************************************************
    public function setcase($name, $libelle, $value)
    {
        $this->codecase .= "<b>$libelle</b><input type=\"checkbox\" name=\"$name\" value=\"$value\" /><br />";
    }
    //**************************
    public function getform()
    {
        $this->code = "";
        $this->code .= $this->codeinit;
        $this->code .= $this->codetext;
        $this->code .= $this->coderadio;
        $this->code .= $this->codecase;
        $this->code .= $this->codesubmit;
        $this->code .= "</fieldset></form>";
        echo $this->code;
    }
}
//***************************
$myform = new form2("traitementb.php", "Coordonnées et sports préférés", "post");
$myform->settext("nom", "Votre nom : &nbsp;");
$myform->settext("code", "Votre code : ");
$myform->setradio("sexe", " Homme ", "homme");
$myform->setradio("sexe", " Femme ", "femme");
$myform->setcase("loisir", " Tennis ", "tennis");
$myform->setcase("loisir", " Equitation ", "équitaion");
$myform->setcase("loisir", " Football ", "football");
$myform->setsubmit();
$myform->getform();

// //Classe personne
// abstract class personne
// {
//     private $nom; //1
//     private $prenom; //2
//     abstract protected function __construct($a, $b, $c);
// }
// //Classe client
// class client extends personne
// {
//     private $adresse;
//     public function __construct($nom, $prenom, $adresse)
//     {
//         $this->nom = $nom;
//         $this->prenom = $prenom;
//         $this->adresse = $adresse;
//     }
//     public function getcoord()
//     {
//         $info = "Le client $this->prenom $this->nom habite $this->adresse <br />";
//         return $info;
//     }
// }
// //Classe electeur
// class electeur extends personne //
// {
//     public $nom; //3
//     public $prenom; //4
//     public $bureau_de_vote;
//     public $vote;
//     function __construct($nom, $prenom, $bureau_de_vote)
//     {
//         $this->nom = $nom;
//         $this->prenom = $prenom;
//         $this->bureau_de_vote = $bureau_de_vote;
//     }
//     public function avoter()
//     {
//         $this->vote = TRUE;
//     }
// }
// //Création d'objets
// $client1 = new client("Delmas", "Jacquou", "Bordeaux");
// echo "<h4>", $client1->getcoord(), " </h4>";
// $electeur1 = new electeur("Tintin", "Milan", "Brussel 5");
// //L'électeur vote
// $electeur1->avoter();
// //Controle du vote
// if ($electeur1->vote) {
//     echo "L'électeur $electeur1->prenom $electeur1->nom inscrit au bureau $electeur1->bureau_de_vote a voté <br />";
// } //5
// else {
//     echo "L'électeur $electeur1->prenom $electeur1->nom inscrit au bureau $electeur1->bureau_de_vote peut encore voter <br />";
// }//6

// namespace Firme\Client;

// class Personne
// {
//     public $nom;
//     public $prenom;
//     public $adresse;
//     public $ville;
//     public $code;
//     public function __construct($nom, $prenom, $adresse, $ville, $code)
//     {
//         $this->nom = $nom;
//         $this->prenom = $prenom;
//         $this->adresse = $adresse;
//         $this->ville = $ville;
//         $this->code = $code;
//     }
//     public function set($prop, $val)
//     {
//         echo "Affectation de la valeur $val à la propriété $prop <br /> ";
//         $this->$prop = $val;
//     }
//     public function get($prop)
//     {
//         return $this->$prop;
//     }
// }

// namespace Firme\Commercial;

// class Personne
// {
//     public $nom;
//     public $prenom;
//     public $adresse;
//     public $ville;
//     public $code;
//     public function __construct($nom, $prenom, $adresse, $ville, $code)
//     {
//         $this->nom = $nom;
//         $this->prenom = $prenom;
//         $this->adresse = $adresse;
//         $this->ville = $ville;
//         $this->code = $code;
//     }
//     public function set($prop, $val)
//     {
//         echo "Affectation de la valeur $val à la propriété $prop <br /> ";
//         $this->$prop = $val;
//     }
//     public function get($prop)
//     {
//         return $this->$prop;
//     }
// }

// echo "<h2>Objets Client</h2>";

// use Firme\Client;

// $client1 = new Client\Personne("Engels", "Jean", " Rue Compoint", "75018 Paris", 12345);
// echo $client1->get("nom"), "  ", $client1->get("prenom"), "<br />";
// //ou encore plus simpement, car les propriétés sont déclarées public
// echo $client1->nom, "  ", $client1->prenom, "<br />";
// $client1->set("code", 45678);
// echo "Nouveau code : ", $client1->code, "<br />";
// $client2 = new Client\Personne("Jacket", "Gene", " Rue Gargas", "84018 Apt", 54367);
// echo $client2->get("nom"), "  ", $client2->get("prenom"), "<br />";
// //ou encore plus simplement, car les propriétés sont déclarées public
// echo $client2->nom, "  ", $client2->prenom, "<br />";
// $client2->set("code", 12876);
// echo "Nouveau code : ", $client2->code, "<br />";
// echo "<h2>Objet Commercial</h2>";

// use Firme\Commercial;

// $comm = new Commercial\Personne("Attin", "Bar", " Rue Foch", "75016 Paris", 98765);
// echo $comm->get("nom"), "  ", $comm->get("prenom"), "<br />";
// //ou encore plus simpement, car les propriétés sont déclarées public
// echo $comm->nom, "  ", $comm->prenom, "<br />";
// $comm->set("code", 76543);
// echo "Nouveau code : ", $comm->code, "<br />";

namespace Firme\Client;

class Personne
{
    protected $nom;
    public $prenom;
    public $adresse;
    public $ville;
    protected $code;
    public function __construct($nom, $prenom, $adresse, $ville, $code)
    {
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->adresse = $adresse;
        $this->ville = $ville;
        $this->code = $code;
    }
    public function __set($prop, $val)
    {
        echo "Affectation de la valeur $val à la propriété $prop <br /> ";
        $this->$prop = $val;
    }
    public function __get($prop)
    {
        return $this->$prop;
    }
}

namespace Firme\Commercial;

class Personne
{
    public $nom;
    public $prenom;
    public $adresse;
    public $ville;
    protected $code;
    public function __construct($nom, $prenom, $adresse, $ville, $code)
    {
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->adresse = $adresse;
        $this->ville = $ville;
        $this->code = $code;
    }
    public function __set($prop, $val)
    {
        echo "Affectation de la valeur $val à la propriété $prop <br /> ";
        $this->$prop = $val;
    }
    public function __get($prop)
    {
        return $this->$prop;
    }
}

echo "<h2>Objets Client</h2>";

use Firme\Client;

$client1 = new Client\Personne("Engels", "Jean", " Rue Compoint", "75018 Paris", 12345);
echo $client1->nom, "  ", $client1->prenom, "<br />";
$client1->code = 45678;
echo "Nouveau code : ", $client1->code, "<br />";
$client2 = new Client\Personne("Jacket", "Gene", " Rue Gargas", "84018 Apt", 54367);
echo $client2->nom, "  ", $client2->prenom, "<br />";
$client2->code = 12876;
echo "Nouveau code : ", $client2->code, "<br />";
echo "<h2>Objet Commercial</h2>";

use Firme\Commercial;

$comm = new Commercial\Personne("Attin", "Bar", " Rue Foch", "75016 Paris", 98765);
echo $comm->nom, "  ", $comm->prenom, "<br />";
$comm->code = 76543;
echo "Nouveau code : ", $comm->code, "<br />";
