<?php
include "bdd.php";

try {
    $db = connectDB('localhost', 'root', '', 'colyseum');
    $resultat_1 = query($db, "SELECT *FROM clients");
    $resultat_2 = query($db, "SELECT type FROM showtypes");
    $resultat_3 = query($db, "SELECT * FROM clients LIMIT 0, 20");
    $resultat_4 = query($db, "SELECT * FROM clients WHERE card = 0");
    $resultat_5 = query($db, "SELECT * FROM clients WHERE lastName LIKE 'M%' ORDER BY lastName ASC");
    $resultat_6 = query($db, "SELECT performer, title, date, startTime FROM shows ORDER BY title");
    $resultat_7 = query($db, "SELECT * FROM clients");
} catch (PDOException $e) {
    var_dump($e);
}

