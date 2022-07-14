<?php
// Démarrage de la gestion de session, ce qui nous permet d'avoir accès tableau $_SESSION
session_start();

// On importe le fichier users.php qui défini un tableau $users contenant plusieurs utilisateur avec mot de passe
// Ils vont nous être utiles pour imiter une authentification.
// Cela fait office de base de données.
require_once('./data/users.php');

// Si $_SESSION dispose déjà d'un index 'user' c'est que l'on est déjà connecté
if(isset($_SESSION['user'])) {
    // Alors on redirige vers l'index.
    header('Location: index.php');
}

// Si le formulaire de connexion est soumis
if(!empty($_POST)) {
    // On part du principe que les ientifiants sont invalides
    $error = true;

    // On parcours les utilisateurs de notre fichier data/users.php
    foreach($users as $user) {
        if (
            // On check si l'email saisie dans le formulaire est le même qu'au moins 1 utilisateur
            $user['email'] == $_POST['email']
            // Puis on check la correspondance des mot de passes
            // $user['password'] est un mot de passe hashé, password_verify va regardé comment le mot de passe a été hashé
            // et va hasher $_POST['password'] avec ces infos, si les deux hashs correspondent, le mot de passe est valide.
            && password_verify($_POST['password'], $user['password'])
        ) {
            // Comme un utilisateur correspond, les identifiants sont donc valides.
            $error = false;
            // On créer une index 'user' dans la session et on lui donne les infos de l'utilisateur
            // correspondant aux identifiants.
            $_SESSION['user'] = $user;
            // Par sécurité on supprime l'index du mot de passe.
            unset($_SESSION['user']['password']);
            // Une fois connecté on redirige vers l'index.
            header('Location: index.php');
        }
    }
}

// Définition d'une variable $page pour savoir sur quelle page on se trouve.
$page = 'login';
// Définition d'une variable pour définire le titre de la page.
$pageTitle = "Connexion";
// Définition d'une variable pour l'ajout de styles css spécifiques/necessaires pour cette page en particulier
// -> Voir fichier header.php
$customCssLinks = ['<link rel="stylesheet" href="/assets/login.css">'];
?>

<?php
// Inclusion du fichier header.php qui contient du code partagé par toutes nos pages.
include('./partials/header.php');
?>
    <main class="login-main">
        <form method="post" class="login-form">
            <h1 class="page-title"><?= $pageTitle ?></h1>

            <?php
            // Si le formulaire a été validé au moins une fois et qu'aucun utilisateurs ne correspondaient
            // aux identifiants, on affiche un message d'erreur.
            if(isset($error) && $error) {
            ?>
                <p class="error">Identifiants invalides</p>
            <?php } ?>

            <div class="input-field">
                <label for="email">Email</label>
                <input type="text" name="email" id="email" placeholder="email@exemple.com...">
            </div>
            <div class="input-field">
                <label for="password">Mot de passe</label>
                <input type="password" name="password" id="password" placeholder="Mot de passe...">
            </div>

            <input type="submit" value="Se connecter">
        </form>
    </main>
<?php
// Inlusion du code de bas de page partagé par toutes nos pages.
include('./partials/footer.php')
?>