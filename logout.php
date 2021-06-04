<?php
session_start();
if (!isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === false) {
    header("location: /");
    exit;
}

$_SESSION = array();
session_destroy();
header("location: /");
exit;
