<?php
// Page de déconnexion

// On active la gestion de session, ce qui nous permet de récupérer une session déjà existante.
session_start();
// On supprime/vide la session
session_destroy();
// On redirige vers la pagede connexion.
header('Location: login.php');
// Pour etre sur qu'aucun code ne soit executer pendant que la redirection à lieu, on stop l'execution de php.
exit();