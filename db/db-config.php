<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "kittygram";

require_once("database.php");
require_once ("utils/login_utilities.php");
$dbh = new DatabaseHelper($dbname);
define("UPLOAD_DIR", "../img/");

sec_session_start();
