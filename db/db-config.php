<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "kittygram";

require_once("database.php");
$dbh = new DatabaseHelper($dbname);
define("UPLOAD_DIR", "../img/");