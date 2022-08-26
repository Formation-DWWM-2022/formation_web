<?php
include 'loader.php';

try {
    $resultat = null;
    $db = connectBD('localhost', 'root', '', 'mediathequewf3');
    $id = (isset($_POST['id'])
        and checkForm(['id' => $_POST['id']])['valide'] == 1)
        ? $_POST['id'] : null;
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
            $repo = new UserRepository($db);
            if ($action == 'connexion') {
                connexion($repo);
            } elseif ($action == 'inscription') {
                inscription($repo);
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

            $title = (isset($_POST['title'])
                and checkForm(['nom' => $_POST['title']])['valide'] == 1)
                ? htmlspecialchars($_POST['title']) : null;
            $creator = (isset($_POST['creator'])
                and checkForm(['nom' => $_POST['creator']])['valide'] == 1)
                ? htmlspecialchars($_POST['creator']) : null;
            $type_id = (isset($_POST['type_id'])
                and checkForm(['id' => $_POST['type_id']])['valide'] == 1)
                ? (int)htmlspecialchars($_POST['type_id']) : null;
            $numberMedia = (int)$repo->numberMedia()['count'];
            $pages = ceil($numberMedia / $parPage);

            if ($action == 'ajout') {
                $types = $repoType->fetchAll();
                if ($title != null and $creator != null and $type_id != null) {
                    $type = $repoType->fetch('SELECT * FROM type 
                    WHERE id = ' . $type_id);
                    if ($type != null) {
                        $media = new Media(null, $title, $creator, $type);
                        $repo->insert($media);
                    }
                }
            } elseif ($action == 'delete' and $id != null) {
                $repo->delete($id);
                header('Location: view/liste-medias.php?action=liste&type=media');
            } elseif ($action == 'profil' and $id != null) {
                $types = $repoType->fetchAll();
                $media = $repo->fetch('
                            SELECT media.id as mid, media.title, media.creator, media.type_id, 
                                   type.id as tid, type.name
                            FROM media 
                            LEFT JOIN type ON media.type_id = type.id 
                            WHERE media.id = ' . $id . '
                            ORDER BY media.title ASC');
            } elseif ($action == 'liste' and $currentPage > 0) {
                $types = $repoType->fetchAll();
                $medias = $repo->fetchAllWithLimit($currentPage, $parPage);
            } elseif ($action == 'liste') {
                $types = $repoType->fetchAll();
                $medias = $repo->fetchAllWithLimit($currentPage, $parPage);
            } elseif ($action == 'modify') {
                $types = $repoType->fetchAll();
                $type = $repoType->fetch('SELECT * FROM type 
                    WHERE id = ' . $type_id);
                if ($type != null) {
                    $media = new Media($id, $title, $creator, $type);
                    $repo->update($media);
                }
            } else {
                header('Location: index.php');
            }

        } elseif ($type == 'type') {
            $parPage = 8;
            $repo = new TypeRepository($db);
            $type = $types = null;
            $name = (isset($_POST['name'])
                and checkForm(['nom' => $_POST['name']])['valide'] == 1)
                ? htmlspecialchars($_POST['name']) : null;
            $numberType = (int)$repo->numberType($currentPage)['count'];
            $pages = ceil($numberType / $parPage);

            if ($action == 'ajout') {
                if ($name != null) {
                    $type = new Type(null, $name);
                    $repo->insert($type);
                }
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
            $repoM = new MediaRepository($db);
            $user = $users = null;
            $numberUser = (int)$repo->numberUser($currentPage)['count'];
            $pages = ceil($numberUser / $parPage);

            $pseudo = (isset($_POST['pseudo'])
                and checkForm(['nom' => $_POST['pseudo']])['valide'] == 1)
                ? htmlspecialchars($_POST['pseudo']) : null;
            $password = (isset($_POST['password'])
                and checkForm(['password' => $_POST['password']])['valide'] == 1)
                ? htmlspecialchars($_POST['password']) : null;
            $email = (isset($_POST['email'])
                and checkForm(['email' => $_POST['email']])['valide'] == 1)
                ? htmlspecialchars($_POST['email']) : null;

            $media_id = (isset($_POST['media_id']) and $_POST['media_id'] != '') ?
                $repoM->fetch(
                    'SELECT media.id as mid, media.title, media.creator, media.type_id, 
                                   type.id as tid, type.name
                            FROM media 
                            LEFT JOIN type ON media.type_id = type.id 
                            WHERE media.id = ' . $_POST['media_id'] . '
                            ORDER BY media.title ASC'
                ) : null;

            if ($action == 'delete' and $id != null) {
                $repo->delete($id);
                header('Location: view/liste-users.php?action=liste&type=user');
            } elseif ($action == 'profil' and $id != null) {
                $medias = $repoM->fetchAll();
                $user = $repo->fetch(
                    'SELECT user.id AS uid, user.pseudo, user.email, user.password, user.media_id,
                            media.id AS mid, media.title, media.creator, media.type_id, 
                            type.id AS tid, type.name
                            FROM user
                            LEFT JOIN media ON user.media_id = media.id 
                            LEFT JOIN type ON media.type_id = type.id WHERE user.id = ' . $id);
            } elseif ($action == 'liste' and $currentPage > 0) {
                $users = $repo->fetchAllWithLimit($currentPage, $parPage);
            } elseif ($action == 'liste') {
                $users = $repo->fetchAllWithLimit($currentPage, $parPage);
            } elseif ($action == 'modify') {
                $medias = $repoM->fetchAll();
                if ($id != null and $pseudo != null and $password != null and $email != null and $media_id != null) {
                    $user = new User($id, $pseudo, '', $email, $media_id);
                    $repo->update($user);
                }
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
