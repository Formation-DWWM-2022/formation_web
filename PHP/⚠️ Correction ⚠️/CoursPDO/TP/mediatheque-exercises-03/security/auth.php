<?php

function deconnexion()
{
    $_SESSION = [];
    setcookie('pseudo', '', time() - 3600);
    setcookie('email', '', time() - 3600);
    session_destroy();
    header('Location: index.php');
}

/*
function connexion()
{
    if (isset($_POST['mail'])) {
        $mail = htmlspecialchars($_POST['mail']);
        $mdp = htmlspecialchars($_POST['mdp']);
        if (!empty($_POST['mail']) && !empty($_POST['mdp'])) {
            $user = new UserFile('', $mdp, $mail);
            $user = $user->select_user_with_mail_password();
            if ($user != false) { //si l'utilisateur est en base et aucune valeur fausse
                $_SESSION['pseudo'] = $user->getPseudo();
                $_SESSION['email'] = $user->getEmail();
                if ($_POST['cookie'] == 'on') {
                    setcookie('pseudo', $user->getPseudo());
                    setcookie('email', $user->getEmail());
                } else {
                    unset($_COOKIE['pseudo']);
                    unset($_COOKIE['email']);
                }
                addMessage('success', "Vous etes connecté !");
            } else {
                addMessage('danger', "Mauvais mail ou mot de passe !");
            }
        }
    }
    header("Location: admin.php");
}
*/

function connexion(UserRepository $repo)
{
    if (isset($_POST['mail'])) {
        $mail = htmlspecialchars($_POST['mail']);
        $mdp = htmlspecialchars($_POST['mdp']);
        if (!empty($_POST['mail']) && !empty($_POST['mdp'])) {
            $user = $repo->fetch('SELECT user.id AS uid, user.pseudo, user.email, user.password, user.media_id,
                media.id AS mid, media.title, media.creator, media.type_id, 
                type.id AS tid, type.name
                FROM user
                LEFT JOIN media ON user.media_id = media.id 
                LEFT JOIN type ON media.type_id = type.id
                WHERE email = "' . $mail . '"');
            if ($user != false) { //si l'utilisateur est en base et aucune valeur fausse
                $_SESSION['pseudo'] = $user->getPseudo();
                $_SESSION['email'] = $user->getEmail();
                if ($_POST['cookie'] == 'on') {
                    setcookie('pseudo', $user->getPseudo());
                    setcookie('email', $user->getEmail());
                } else {
                    unset($_COOKIE['pseudo']);
                    unset($_COOKIE['email']);
                }
                addMessage('success', "Vous etes connecté !");
                header("Location: admin.php");
            } else {
                addMessage('danger', "Mauvais mail ou mot de passe !");
            }
        }
    }
    header("Location: index.php");
}

/*
function inscription()
{
    if (isset($_POST['mail'])) {
        $pseudo = htmlspecialchars($_POST['pseudo']);
        $mail = htmlspecialchars($_POST['mail']);
        $mail2 = htmlspecialchars($_POST['mail2']);
        $mdp = password_hash(htmlspecialchars($_POST['mdp']), PASSWORD_DEFAULT);
        $mdp2 = password_hash(htmlspecialchars($_POST['mdp2']), PASSWORD_DEFAULT);
        if (!empty($_POST['pseudo']) && !empty($_POST['mail']) && !empty($_POST['mail2']) && !empty($_POST['mdp']) && !empty($_POST['mdp2'])) {
            if ($mail === $mail2) {
                if (filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL)) {
                    $user = new UserFile($pseudo, $mdp, $mail);
                    $mailexiste = $user->select_user_with_mail();
                    if ($mailexiste == false) { //mail n'est pas utilisee
                        if ($_POST['mdp'] == $_POST['mdp2']) {
                            $user->insert_user();
                            addMessage('success', 'Votre compte a bien été créé !');
                        }
                    } else {
                        addMessage('danger', 'Adresse mail déjà utilisée !');
                    }
                }
            }
        }
    }
    header("location: index.php");
}
*/

function inscription(UserRepository $repo)
{
    if (isset($_POST['mail'])) {
        $pseudo = (isset($_POST['pseudo'])
            and checkForm(['nom' => $_POST['pseudo']])['valide'] == 1)
            ? htmlspecialchars($_POST['pseudo']) : null;
        $mail = (isset($_POST['mail'])
            and checkForm(['email' => $_POST['mail']])['valide'] == 1)
            ? htmlspecialchars($_POST['mail']) : null;
        $mail2 = (isset($_POST['mail2'])
            and checkForm(['email' => $_POST['mail2']])['valide'] == 1)
            ? htmlspecialchars($_POST['mail2']) : null;
        $mdp = (isset($_POST['mdp'])
            and checkForm(['password' => $_POST['mdp']])['valide'] == 1)
            ? password_hash(htmlspecialchars($_POST['mdp']), PASSWORD_DEFAULT) : null;
        $mdp2 = (isset($_POST['mdp2'])
            and checkForm(['password' => $_POST['mdp2']])['valide'] == 1)
            ? password_hash(htmlspecialchars($_POST['mdp2']), PASSWORD_DEFAULT) : null;
        if ($pseudo != null and $mdp != null and $mdp2 != null and $mail != null and $mail2 != null) {
            if ($mail === $mail2) {
                if (filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL)) {
                    $mailexiste = $repo->fetch('SELECT * FROM user WHERE email = "' . $mail . '"');
                    if ($mailexiste == false) { //mail n'est pas utilisee
                        if ($_POST['mdp'] == $_POST['mdp2']) {
                            $user = new User(null, $pseudo, $mdp, $mail, null);
                            $repo->insert($user);
                        }
                    } else {
                        addMessage('danger', 'Adresse mail déjà utilisée !');
                    }
                }
            }
        }
    }
}

