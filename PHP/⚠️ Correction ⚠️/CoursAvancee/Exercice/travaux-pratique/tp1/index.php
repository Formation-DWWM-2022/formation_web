<?php
//Vérification de l'existence des cookies
if (isset($_COOKIE['nom'])) {
    $nom = $_COOKIE['nom'];
    $prenom = $_COOKIE['prenom'];
    $message = "<h3>Bonjour $prenom $nom </h3>";
    $lien1 = "<a href=\"recherche.php\" title=\"Recherche\"><button type=\"button\">Rechercher des partenaires </button></a>";
    $lien2 = "<a href=\"ajout.php\" title=\"S'inscrire\"><button type=\"button\">S'inscrire pour un sport </button></a>";
}
if (isset($_POST['mail'])) {
    //Récupération du mail
    $mail = strtolower($_POST['mail']);
    //Ouverture de la base
    $objdb = new SQLite3("sportifs.db");
    $requete = "SELECT id_personne,nom,prenom FROM personne WHERE  mail='$mail'";
    $result = $objdb->query($requete);
    $ligne = $result->fetchArray();
    if (!empty($ligne)) {
        $message = "<h3>Bonjour $ligne[2] $ligne[1] </h3>";
        $lien1 = "<a href=\"recherche.php\" title=\"Recherche\"><buttontype=\"button\">Rechercher des partenaires </button></a>";
        $lien2 = "<a href=\"ajout.php\" title=\"S'inscrire\"><button type=\"button\">S'inscrire pour un sport </button></a>";
        //Création des cookies
        setcookie('nom', $ligne[1], time() + 30 * 24 * 3600);
        setcookie('prenom', $ligne[2], time() + 30 * 24 * 3600);
    }
}
include_once('entete.html');
//$id_base=sqlite_open('C:/wamp/www/sqlitemanager/sportifs', 0666,$erreur);
//Lecture de la table sport
$objdb = new SQLite3("sportifs.db");
$result = $objdb->query('SELECT design FROM sport ORDER BY design ASC');

echo "<div style=\" position:absolute;left:0px;width:20%;background-color:#CCFF66\">";
echo "<b> Liste des sports existants</b><br /><br />";
foreach ($result as $valeur) {
    echo ucfirst($valeur[0]), "<br />";
}
?>
<form method="post" action="<?= $_SERVER['PHP_SELF'] ?>">
    <fieldset>
        <legend> Identification </legend>
        <label>Votre mail :
            <input type="text" name="mail" />
        </label>
        <input type="submit" value="Envoi" />
    </fieldset>
</form>
<a href="ajout.php" title="S'inscrire"><button type="button">S inscrire </button></a><br /><br />
<?php
echo "</div>";
?>
<div style="position:absolute; left:20%; width:80%;backgroundcolor:#FFFFFF">
    <?php
    //echo $message;
    echo "<p><b>Vous pourrez accéder à la page de recherche ou vous inscrire dans un autre sport après vous être identifié</b><br /><br/> $lien1 &nbsp;&nbsp;&nbsp; $lien2 ";
    ?>
</div>
</body>

</html>