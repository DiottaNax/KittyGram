<?php

require_once ("db-config.php");

if (isset($_SESSION['user_id'])) {
    $templateParams["name"] = "show-post-home.php";
    require ("base.php");
} else {
    $templateParams["title"] = "Login";
    require ("login.php");
}