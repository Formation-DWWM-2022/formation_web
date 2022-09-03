<?php
include_once('entete.html');
?>
<h3>Le site des rencontres sportives</h3>
<form method="post" action="recherche.php">
    <!-- Premier groupe -->
    <fieldset>
        <legend>Rechercher des partenaires </legend>
        <table>
            <tbody>
                <!-- Ligne 1 -->
                <tr>
                    <td>Sport pratiqu&#233; : </td>
                    <td>
                        <select name="design">
                            <option value="'NULL'>Choisissez!</option> " ; <?php
                                                                            //Création dynamique de la liste de sélection
                                                                            // Connexion
                                                                            $objdb = new SQLite3("sportifs.db");
                                                                            //Lecture de la table sport
                                                                            $result = $objdb->query('select id_sport,design from sport');
                                                                            if ($result) {
                                                                                while ($ligne = $result->fetchArray(SQLITE3_NUM)) {
                                                                                    echo "<option value=\"", $ligne[0], "\" >", $ligne[1], "</option>";
                                                                                }
                                                                            }
                                                                            //Fermeture
                                                                            ?> </select>
                    </td>
                </tr>
                <!-- Ligne 2 -->
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
                <!-- Ligne 3 -->
                <tr>
                    <td>Département : </td>
                    <td>
                        <select name="depart">
                            <option value="NULL">Choisissez!</option>
                            <?php
                            //Création dynamique de la liste de sélection des départements
                            // Connexion
                            $objdb = new SQLite3("sportifs.db");
                            //Lecture de la table personne
                            $result = $objdb->query('select depart from personne');
                            //Création du tableau des départements existants
                            while ($ligne = $result->fetchArray(SQLITE3_NUM)) {
                                $tabdepart[] =  $ligne[0];
                            }
                            //Elimination des doublons
                            $tabdepart = array_unique($tabdepart);
                            //Tri des départements
                            sort($tabdepart);
                            //Création de la liste d'options
                            for ($i = 0; $i < count($tabdepart); $i++) {
                                echo "<option value=\"", $tabdepart[$i], "\" >", $tabdepart[$i], "</option>\n";
                            }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><input type="submit" name="envoi" value=" Recherche " /> </td>
                    <td><input type="reset" name="efface" value=" Effacer " /> </td>
                </tr>
            </tbody>
        </table>
    </fieldset>
</form>
<!-- CODE PHP RECHERCHE-->
<?php
// Connexion
if (isset($_POST["envoi"])) {
    if (!$objdb = new SQLite3("sportifs.db")) {
        echo "ERREUR : $erreur <br />";
    } else {
        $requete = "SELECT nom,prenom,mail,design FROM personne,pratique,sport WHERE personne.id_personne=pratique.id_personne AND sport.id_sport=pratique.id_sport AND pratique.niveau='" . $_POST['niveau'] . "' AND sport.id_sport='" . $_POST['design'] . "' AND personne.depart='" . $_POST['depart'] . "'";
        $result = $objdb->query($requete);
        echo "<table border=\"1\" rules=\"rows\" width=\"100%\" >";
        echo "<tr><th colspan=\"3\">Liste des partenaires disponibles</th>";

        while ($ligne = $result->fetchArray()) {
            echo "<tr><td>", $ligne['prenom'], "</td><td>", $ligne['nom'], "</td><td>", $ligne['mail'], "</td></tr>";
        }
        echo "</table>";
    }
}
?>
<a href="index.php" title="Accueil"><button type="button">Accueil</button></a>&nbsp;&nbsp;
<a href="ajout.php" title="Inscription"><button type="button">Inscription</button></a>
</body>

</html>