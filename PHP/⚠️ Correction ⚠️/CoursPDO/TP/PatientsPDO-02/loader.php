<?php
session_start();
// var_dump($_SESSION, $_POST, $_GET);

// SERVICE
include "service/bdd.php";
include "service/flash_message.php";

// MODEL
include "model/patient.php";
include "model/rdv.php";

// CONTROLLER
include "router.php";

