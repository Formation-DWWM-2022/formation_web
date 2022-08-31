<?php
include_once('entete.html');
//Récupération des valeurs
$motcle = $_POST["motcle"];
$auteur = $_POST["auteur"];
$siecle = $_POST["siecle"];
$tri = $_POST["tri"];
//Requète
$query = "SELECT nom,prenom,texte,siecle FROM funhtml.auteurs AS A, funhtml.citation AS C WHERE  ";
//Si mot clé
if ($motcle) {
    $query .= "C.texte LIKE '%$motcle%' ";
} else {
    $query .= " 1 ";
}
//si auteur différent de 'tous'
if ($auteur != "tous") {
    $query .= "AND nom= '$auteur' ";
} else {
    $query .= "";
}
//si siecle
if ($siecle) {
    $query .= " AND A.siecle =  '$siecle' ";
}
$query .= " AND A.idauteur= C.idauteur";
$query .= " ORDER BY $tri ASC";
//***************************
//connexion au serveur MySQL
//***************************
include_once("connexobjet.inc.php");
$idcom = connexobjet("funhtml", "funmyparam");
//Envoi de la requète
$result = $idcom->query($query) or die("ERREUR RESULTAT");
//Affiche résultats
if (!$result) echo "<h2> Pas de réponse </h2>";
else {
    echo "<h2> Liste des citations avec le mot: $motcle</h2> <hr>";
    while ($tab = $result->fetch_assoc()) {
        echo "<h4>", nl2br($tab["texte"]), "<h4>";
        echo "<cite>", $tab["prenom"], " ", $tab["nom"], " ( ", $tab["siecle"], "<sup>ème</sup> siècle) </cite><hr />";
    }
}
include_once('pied.htm');
