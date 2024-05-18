<?php

require_once ("db-config.php");

if (isset($_SESSION['user_id'])) {
    $templateParams["name"] = "show-post-home.php";
    $templateParams["posts"] = $dbh->getHome($_SESSION["user_id"]);
    require ("base.php");
} else {
    $templateParams["title"] = "Login";
    require ("login.php");
}