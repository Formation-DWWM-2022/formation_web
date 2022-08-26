<?php
session_start();
var_dump($_SESSION, $_POST, $_GET, $_COOKIE);

// SERVICE
include "service/bdd.php";
include "service/flash_message.php";
include "service/upload.php"; // not
include "service/verifyForm.php"; // not

// SECURITY
include "security/auth.php";

// MODEL
include "model/UserFile.php";
include "model/User.php"; // not
include "model/Media.php";
include "model/Type.php";

// REPOSITORY
include "repository/MediaRepository.php";
include "repository/TypeRepository.php";
include "repository/UserRepository.php"; // not



