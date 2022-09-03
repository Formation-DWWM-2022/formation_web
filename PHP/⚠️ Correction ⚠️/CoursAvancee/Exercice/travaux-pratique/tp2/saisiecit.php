<?php
include_once('entete.html');
?>
<h2>Enrichissez le dictionnaire de citations</h2>
<form action="saisiecit.php" method="post">
    <fieldset>
        <legend><b>Formulaire de saisie des citations</b></legend>
        <table>
            <tbody>
                <tr>
                    <td>Nom de l auteur :</td>
                    <td> <input type="text" name="nom" size="40" maxlength="256"><br /></td>
                </tr>
                <tr>
                    <td>Prénom de l auteur : </td>
                    <td> <input type="text" name="prenom" size="40" maxlength="256"><br />
                    </td>
                </tr>
                <tr>
                    <td>Siècle : </td>
                    <td>
                        <select name="siecle" size="1">
                            <option value="16"> 16ème siècle</option>
                            <option value="17"> 17ème siècle</option>
                            <option value="18"> 18ème siècle</option>
                            <option value="19"> 19ème siècle</option>
                            <option value="20"> 20ème siècle</option>
                            <option value="21"> 21ème siècle</option>
                            <option value="null"> Autres</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td colspan="2"> Ecrivez votre citation ici: <br />
                        <textarea name="texte" cols="70" rows="7"></textarea>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="reset" value="Effacer">&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" value="Enregistrer">
                    </td>
                </tr>
            </tbody>
        </table>
    </fieldset>
</form>
<?php
if ($_POST["nom"]) {
    //******************************************
    //Récupération des valeurs
    //******************************************
    $nom = $_POST["nom"];
    $prenom = $_POST["prenom"];
    $siecle = $_POST["siecle"];
    $texte = $_POST["texte"];
    //***************************
    //connexion au serveur MySQL
    //***************************
    include_once("connexobjet.inc.php");
    $idcom = connexobjet("funhtml", "funmyparam");
    //*************************************************************
    //Recherche de l'idauteur et du siècle si l'auteur existe déjà
    //dans la table auteurs
    //*************************************************************
    $queryaut = "SELECT idauteur,siecle FROM funhtml.auteurs WHERE nom='$nom'";
    $result = $idcom->query($queryaut) or die("ERREUR de RESULTAT");
    $tabid = $result->fetch_row();
    //Si l'auteur existe
    if ($tabid) {
        $idauteur = $tabid[0];
        $siecle = $tabid[1];
        //echo "IL Y A UNE REPONSE idauteur : $idauteur , $siecle,$texte ";
        $query = "INSERT INTO funhtml.citation (idcit,texte,idauteur) VALUES ('\N','$texte','$idauteur')";
        $idcom->query($query) or die("ERREUR D'INSERTION CITATION" . $nom);
    }
    //si l'auteur n'existe pas encore
    else {
        $queryins = "INSERT INTO funhtml.auteurs (nom,prenom,siecle) VALUES ('$nom','$prenom',$siecle)  ";
        $idcom->query($queryins) or die("ERREUR D'INSERTION auteurs");
        $idauteur = $idcom->insert_id();
        $query = "INSERT INTO funhtml.citation (texte,idauteur) VALUES ('$texte',$idauteur)  ";
        $idcom->query($query) or die("ERREUR D'INSERTION citation");
    }
}
include_once('pied.html');
?>