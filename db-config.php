<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "kittygram";

require_once("db/database.php");
require_once ("utils/login_utilities.php");
$dbh = new DatabaseHelper($dbname);

sec_session_start();
