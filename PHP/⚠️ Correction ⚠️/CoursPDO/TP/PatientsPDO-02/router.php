<?php
$parPage = 5;
$currentPage = 1;

try {
    $resultat = null;
    $db = connectBD('localhost', 'root', '', 'hospitalE2N');

    if (isset($_GET['action']) and $_GET['action'] != null) {
        if ($_GET['action'] == 'add-patient') {
            addPatient($db);
        } elseif ($_GET['action'] == 'list-patients' and isset($_GET['page']) && !empty($_GET['page'])) {
            $currentPage = (int)strip_tags($_GET['page']);
            $nbPatients = (int)nbPatients($db)['nb_patients'];
            $pages = ceil($nbPatients / $parPage);
            $resultat = listPatients($db, $currentPage, $parPage);
        } elseif ($_GET['action'] == 'list-patients') {
            $nbPatients = (int)nbPatients($db)['nb_patients'];
            $pages = ceil($nbPatients / $parPage);
            $resultat = listPatients($db, $currentPage, $parPage);
        } elseif ($_GET['action'] == 'patient' and isset($_GET['id'])) {
            $resultat = patient($db);
            $rdvs = listRdvsByPatient($db, $resultat['id']);
        } elseif ($_GET['action'] == 'modify-patient' and isset($_GET['id'])) {
            modifyPatient($db);
        } elseif ($_GET['action'] == 'add-rdv-view') {
            $nbPatients = (int)nbPatients($db)['nb_patients'];
            $resultat = listPatients($db, 1, $nbPatients);
        } elseif ($_GET['action'] == 'add-rdv-insert') {
            addRdv($db);
        } elseif ($_GET['action'] == 'list-rdv') {
            $resultat = listRdv($db);
        } elseif ($_GET['action'] == 'rendezvous' and isset($_GET['id'])) {
            $nbPatients = (int)nbPatients($db)['nb_patients'];
            $patients = listPatients($db, 1, $nbPatients);
            $resultat = rendezvous($db);
        } elseif ($_GET['action'] == 'modify-rdv' and isset($_GET['id'])) {
            modifyRdv($db);
        } elseif ($_GET['action'] == 'delete-rdv' and isset($_GET['id'])) {
            deleteRdv($db);
        } elseif ($_GET['action'] == 'delete-patient' and isset($_GET['id'])) {
            deletePatient($db);
        } elseif ($_GET['action'] == 'search-patient') {
            $resultat = searchPatient($db);
        } else {
            header('Location: index.php');
        }
    }
    $db = null;
} catch (PDOException $e) {
    var_dump($e);
}
