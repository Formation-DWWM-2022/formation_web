<?php

if (session_id() == '') {session_start();

}

/** @var Hero $hero */
$hero = $_SESSION['hero'];
$monster = null;
if (isset($_SESSION['monster'])) {
    /** @var Monster $monster */
    $monster = $_SESSION['monster'];
}
/** @var Difficulty $difficulty */
$difficulty = $_SESSION['difficulty'];
