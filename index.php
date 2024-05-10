<?php

require_once ("db/db-config.php");

if (isset($_SESSION['user_id'])) {
    require ("base-template.php");
} else {
    require ("login.php");
}