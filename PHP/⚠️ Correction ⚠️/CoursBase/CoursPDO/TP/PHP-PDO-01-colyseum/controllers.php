<?php

include "bdd.php";

try {
    $db = connectBD('localhost', 'root', '', 'colyseum');
    $result[] = query($db, "SELECT * FROM clients");
    $result[] = query($db, "SELECT type FROM showtypes");
    $result[] = query($db, "SELECT * FROM clients LIMIT 20");
    $result[] = query($db, "SELECT * FROM clients WHERE card = 1");
    $result[] = query($db, "SELECT firstName, lastName FROM clients WHERE lastName LIKE 'M%' 
            ORDER BY lastName ASC");
    $result[] = query($db, "SELECT performer, title, date, startTime FROM shows ORDER BY title");
    $result[] = query($db, "SELECT * FROM clients");

    $db = null;
} catch (PDOException $e) {
    var_dump($e);
}
