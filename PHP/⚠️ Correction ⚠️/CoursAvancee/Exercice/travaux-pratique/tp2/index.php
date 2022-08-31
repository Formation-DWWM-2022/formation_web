<?php
include_once('entete.html');
include_once('connexobjet.inc.php');
//Adaptez au nom de votre base
$idcom = connexobjet("funhtml", "funmyparam");
//Sélection de tous les identifiants des citations
$requete = "SELECT idcit FROM funhtml.citation";
$result = $idcom->query($requete);
//
while ($row = $result->fetch_array(MYSQLI_NUM)) {
    $tabcit[] = $row[0];
}
$nbcitation = count($tabcit);
$tirage = rand(1, $nbcitation - 1);
$tirage = $tabcit[$tirage];
//Calcul du nombre total de citations
$requetecit = "SELECT texte,nom,prenom,siecle FROM citation,auteurs WHERE idcit='$tirage' AND citation.idauteur=auteurs.idauteur";
$resultcit = $idcom->query($requetecit);
$citdujour = $resultcit->fetch_row();
echo "<hr />";
echo "<h4>", $citdujour[0], " </h4>";
echo "<h4>", $citdujour[2], "&nbsp;", $citdujour[1], "&nbsp; &nbsp;", $citdujour[3], " <sup> ième </sup> siècle </h4>";
echo "<hr />";
?>
<form action="affichecit.php" method="post">
    <fieldset>
        <legend><b>Rechercher une citation</legend>
        <table width="100%" border="1" align="left" bordercolor="#800000" summary="Recherche">
            <tr>
                <td colspan="2" align="center">
                    <h2>Recherche de citations</h2>
                </td>
            </tr>
            <tr>
                <td>Mot-clé </td>
                <td><input type="text" name="motcle" size="40" maxlength="256">
                </td>
            </tr>
            <tr>
                <td>Auteur</td>
                <td>
                    <?php
                    $idcom = connexobjet("funhtml", "funmyparam");
                    $requete = "SELECT nom FROM funhtml.auteurs ORDER BY nom ASC";
                    $result = $idcom->query($requete);
                    echo "<select name=\"auteur\" size=\"1\" >";
                    echo "<option value=\"tous\"> Tous</option>";
                    while ($tab = $result->fetch_assoc()) {
                        echo "<option value=\"" . $tab["nom"] . "\" >" .
                            $tab["nom"] . "</option>";
                    }
                    echo "</select>";
                    $result->free();
                    $idcom->close();
                    ?>
                </td>
            </tr>
            <tr>
                <td>Siècle</td>
                <td>
                    <select name="siecle" size="1">
                        <option value=""> Tous</option>
                        <option value="16"> 16ème siècle</option>
                        <option value="17"> 17ème siècle</option>
                        <option value="18"> 18ème siècle</option>
                        <option value="19"> 19ème siècle</option>
                        <option value="20"> 20ème siècle</option>
                        <option value="21"> 21ème siècle</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td colspan="2">Trier par : auteur <input type="radio" name="tri" value="nom" checked="checked" />
                    siècle : <input type="radio" name="tri" value="siecle" /></td>
            </tr>
            <tr>
                <td><input type="reset" value="Effacer"></td>
                <td><input type="submit" value="Chercher"></td>
            </tr>
            <tr>
                <td colspan="2"><a href="index.php"><button type="button"> Nouvelle recherche </button></a>&nbsp;&nbsp;&nbsp;
                    <a href="saisiecit.php"><button type="button"> Ajouter une citation
                        </button></b></a>
                </td>
            </tr>
        </table>
    </fieldset>
</form>
<?php
include_once('pied.html');
?>