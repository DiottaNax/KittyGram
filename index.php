<?php

require_once ("./utils/login_utilities.php");

sec_session_start();

if (isset($_SESSION['user_id'])) {
    // TODO   
} else {
    require ("login.html");
}