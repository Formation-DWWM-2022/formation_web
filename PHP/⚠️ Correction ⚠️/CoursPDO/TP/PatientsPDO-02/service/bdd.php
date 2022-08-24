<?php
// CONNECTER BDD
function connectBD($server, $user, $pass, $dbname): PDO
{
    $db = new PDO("mysql:host=$server;dbname=$dbname", $user, $pass);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $db;
}

// REQUETE SIMPLE
function query($db, $req){
    $sth = $db->prepare($req);
    $sth->execute();
    return $sth->fetchAll(PDO::FETCH_ASSOC);
}

function querySingle($db, $req){
    $sth = $db->prepare($req);
    $sth->execute();
    return $sth->fetch(PDO::FETCH_ASSOC);
}
