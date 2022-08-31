<?php
include_once('entete.html');
?>
<form method="post" action="ajout.php">
    <!-- Premier groupe -->
    <fieldset>
        <legend>Vos coordonn&#233;es </legend>
        <table>
            <tbody>
                <tr>
                    <td>Nom : </td>
                    <td><input type="text" name="nom" size="30" /> </td>
                </tr>
                <tr>
                    <td>Prénom : </td>
                    <td><input type="text" name="prenom" size="30" /> </td>
                </tr>
                <tr>
                    <td>Département : </td>
                    <td><input type="text" name="depart" size="30" /> </td>
                </tr>
                <tr>
                    <td>Mail : </td>
                    <td><input type="text" name="mail" size="30" /> </td>
                </tr>
            </tbody>
        </table>
    </fieldset>
    <!-- Deuxième groupe -->
    <fieldset>
        <legend>Vos pratiques sportives </legend>
        <table>
            <tbody>
                <!-- Sélection des sports -->
                <tr>
                    <td>Sport pratiqué : </td>
                    <td>
                        <select name="design">
                            <option value="NULL">Choisissez le sport!</option>;
                            <?php
                            //Création dynamique de la liste de sélection
                            // Connexion
                            $objdb = new SQLite3("sportifs.db");
                            //Lecture de la table sport
                            $requete = "SELECT id_sport,design FROM sport ORDER BY design";
                            $result = $objdb->query($requete);
                            if ($result) {
                                while ($ligne = $result->fetchArray(SQLITE3_NUM)) {
                                    echo "<option value=\"", $ligne[0], "\" >", $ligne[1], "</option>";
                                }
                            }
                            ?>
                        </select>
                        OU : Ajouter un sport à la liste <input type="text" name="nomsport" size="30" /><input type="submit" name="ajout" value="Ajouter" />
                    </td>
                </tr>
                <tr>
                    <td>Niveau : </td>
                    <td>
                        <select name="niveau">
                            <option value="1">Débutant</option>
                            <option value="2">Confirmé</option>
                            <option value="3">Pro</option>
                            <option value="4">Supporter</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><input type="submit" name="envoi" value=" Envoyer " /> </td>
                    <td><input type="reset" name="efface" value=" Effacer " /> </td>
                </tr>
            </tbody>
        </table>
    </fieldset>
</form>
<a href="index.php" title="Accueil"><button type="button"> Accueil
    </button></a>
<!-- CODE PHP -->
<?php
// Connexion
$objdb = new SQLite3("sportifs.db");
if (isset($_POST["envoi"])) {
    //*****************************************************************
    //insert dans personne
    $req_pers = "INSERT INTO personne(id_personne,nom,prenom,depart,mail) VALUES (NULL,'" . $_POST['nom'] . "','" . $_POST['prenom'] . "','" . $_POST['depart'] . "','" . $_POST['mail'] . "')";
    if ($objdb->query($req_pers)) {
        $id_personne = $objdb->lastInsertRowID();
    }
    //*****************************************************************
    //Insertion dans la table pratique
    $id_sport = $_POST["design"];
    $niveau = $_POST["niveau"];
    $req_pratique = "INSERT INTO pratique (id_personne,id_sport,niveau) VALUES ('$id_personne','$id_sport','$niveau')";
    if ($objdb->query($req_pratique)) {
        echo "<a href=\"recherche.php\" title=\"Recherche\"><button type=\"button\">Rechercher des partenaires </button></a><br />";
        echo "Votre numéro d'enregistrement : ", $id_personne, "<br />";
    }
}
//AJOUT DE SPORT
if (isset($_POST["ajout"])) {
    $req_sport = "INSERT INTO sport (id_sport,design) VALUES (NULL, '" . $_POST['nomsport'] . "')";
    if ($objdb->query($req_sport)) {
        echo "DONNEES INSEREES dans sport";
        echo "<script type=\"text/javascript\"> window.location.href=\"ajout.php\" </script>";
    }
}
//sqlite_close($id_base);
?>
</body>

</html>