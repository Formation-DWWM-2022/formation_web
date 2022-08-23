<?php

function rdvDML($db, $req, $id = null){
    $dateHour = (isset($_POST['dateHour']) and $_POST['dateHour'] != '') ? $_POST['dateHour'] : null;
    $idPatients = (isset($_POST['idPatients']) and $_POST['idPatients'] != '') ? $_POST['idPatients'] : null;

    var_dump($dateHour, $idPatients);

    if ($dateHour != null and $idPatients != null) {
        $sth = $db->prepare($req);
        $sth->bindParam(':dateHour', $dateHour);
        $sth->bindParam(':idPatients', $idPatients);
        $sth->execute();

        addMessage('success', 'Rdv enregistrer !');
    } else {
        addMessage('danger', 'Erreur lors de enregistrement !');
    }
}

/**
 * @throws Exception
 */
function addRdv(PDO $db)
{
    $req = 'INSERT INTO appointments (dateHour,idPatients)
        VALUES (:dateHour,:idPatients)
        ';
    rdvDML($db, $req);
    header('Location: index.php');
}

function listRdv(PDO $db)
{
    return query($db, 'SELECT * FROM appointments');
}

function rendezvous(PDO $db)
{
    $id = (isset($_GET['id']) and $_GET['id'] != '') ? $_GET['id'] : null;
    return querySingle($db, 'SELECT * FROM appointments WHERE id =' . $id);
}

function modifyRdv(PDO $db)
{
    $req = 'UPDATE appointments 
            SET dateHour = :dateHour,
                idPatients = :idPatients
            WHERE id = :id';
    $id = (isset($_GET['id']) and $_GET['id'] != '') ? $_GET['id'] : null;
    rdvDML($db, $req, $id);
    header('Location: rendezvous.php?action=rendezvous&id=' . $id);
}

function listRdvsByPatient(PDO $db, $idPatients)
{
    return query($db, 'SELECT * FROM appointments WHERE idPatients = ' . $idPatients);
}

function deleteRdv(PDO $db)
{
    $req = 'DELETE FROM appointments WHERE id = :id';

    $id = (isset($_GET['id']) and $_GET['id'] != '') ? $_GET['id'] : null;

    var_dump($id);

    if ($id != null) {
        $sth = $db->prepare($req);
        $sth->bindParam(':id', $id);
        $sth->execute();

        var_dump($sth->rowCount());
        addMessage('success', 'Rdv delete !');
    } else {
        addMessage('danger', 'Erreur lors de la suppression !');
    }
    header('Location: index.php');
}
