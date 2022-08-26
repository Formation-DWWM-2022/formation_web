<?php

function deconnexion()
{
    $_SESSION = [];
    setcookie('pseudo', '', time() - 3600);
    setcookie('email', '', time() - 3600);
    session_destroy();
    header('Location: index.php');
}

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
