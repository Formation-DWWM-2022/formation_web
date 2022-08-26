<?php
include 'loader.php';

try {
    $resultat = null;
    $db = connectBD('localhost', 'root', '', 'mediathequewf3');
    $id = (isset($_GET['id']) and $_GET['id'] != '') ? (int)$_GET['id'] : null;
    $currentPage = (isset($_GET['page']) and $_GET['page'] > 0) ? (int)$_GET['page'] : 1;

    if (
        isset($_GET['action'])
        and $_GET['action'] != null
        and isset($_GET['type'])
        and $_GET['type'] != null
    ) {
        $action = $_GET['action'];
        $type = $_GET['type'];

        // AUTH
        if ($type == 'auth') {
            if ($action == 'connexion') {
                connexion();
            } elseif ($action == 'inscription') {
                inscription();
            } elseif ($action == 'deconnexion') {
                deconnexion();
            } else {
                header('Location: index.php');
            }

            // MEDIA
        } elseif ($type == 'media') {
            $parPage = 5;
            $repo = new MediaRepository($db);
            $repoType = new TypeRepository($db);
            $media = $medias = null;
            $title = (isset($_POST['title']) and $_POST['title'] != '') ? $_POST['title'] : null;
            $creator = (isset($_POST['creator']) and $_POST['creator'] != '') ? $_POST['creator'] : null;
            $type_id = (isset($_POST['type_id']) and $_POST['type_id'] != '') ? (int)$_POST['type_id'] : null;
            $numberMedia = (int)$repo->numberMedia()['count'];
            $pages = ceil($numberMedia / $parPage);

            if ($action == 'ajout') {
                $types = $repoType->fetchAll();
                $media = new Media(null, $title, $creator, $type_id);
                var_dump($types, $media);
                $repo->insert($media);
            } elseif ($action == 'delete' and $id != null) {
                $repo->delete($id);
                header('Location: view/liste-medias.php?action=liste&type=media');
            } elseif ($action == 'profil' and $id != null) {
                $media = $repo->fetch('SELECT * FROM media WHERE id = ' . $id);
            } elseif ($action == 'liste' and $currentPage > 0) {
                $medias = $repo->fetchAllWithLimit($currentPage, $parPage);
            } elseif ($action == 'liste') {
                $medias = $repo->fetchAllWithLimit($currentPage, $parPage);
            } elseif ($action == 'modify') {
                $media = new Media($id, $title, $creator, $type_id);
                $repo->update($media);
            } else {
                header('Location: index.php');
            }
        } elseif ($type == 'type') {

            $parPage = 8;
            $repo = new TypeRepository($db);
            $type = $types = null;
            $name = (isset($_POST['name']) and $_POST['name'] != '') ? $_POST['name'] : null;
            $numberType = (int)$repo->numberType($currentPage)['count'];
            $pages = ceil($numberType / $parPage);

            if ($action == 'ajout') {
                $type = new Type(null, $name);
                $repo->insert($type);
            } elseif ($action == 'delete' and $id != null) {
                $repo->delete($id);
                header('Location: view/liste-types.php?action=liste&type=type');
            } elseif ($action == 'profil' and $id != null) {
                $type = $repo->fetch('SELECT * FROM type WHERE id = ' . $id);
            } elseif ($action == 'liste' and $currentPage > 0) {
                $types = $repo->fetchAllWithLimit($currentPage, $parPage);
            } elseif ($action == 'liste') {
                $types = $repo->fetchAllWithLimit($currentPage, $parPage);
            } elseif ($action == 'modify') {
                $type = new Type($id, $name);
                $repo->update($type);
            } else {
                header('Location: index.php');
            }
        } elseif ($type == 'user') {
            $parPage = 10;
            $repo = new UserRepository($db);
            $user = $users = null;
            $numberUser = (int)$repo->numberUser($currentPage)['count'];
            $pages = ceil($numberUser / $parPage);

            if ($action == 'delete' and $id != null) {
                $repo->delete($id);
                header('Location: view/liste-users.php?action=liste&type=user');
            } elseif ($action == 'profil' and $id != null) {
                $type = $repo->fetch('SELECT * FROM user WHERE id = ' . $id);
            } elseif ($action == 'liste' and $currentPage > 0) {
                $types = $repo->fetchAllWithLimit($currentPage, $parPage);
            } elseif ($action == 'liste') {
                $types = $repo->fetchAllWithLimit($currentPage, $parPage);
            } else {
                header('Location: index.php');
            }
        } else {
            header('Location: index.php');
        }
    }
    $db = null;
} catch
(PDOException $e) {
    var_dump($e);
}
