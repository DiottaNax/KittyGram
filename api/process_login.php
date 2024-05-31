<?php

require_once ('../db-config.php');
require_once ('../utils/login_utilities.php');

$result['success'] = false;
$result['message'] = "No Post request found";
if (isset($_POST['username'], $_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password']; // Recupero la password criptata.
    $loginResult = login($username, $password, $dbh);
    if ($loginResult['success'] == true) {
        $result['success'] = true;
        $result['message'] = "Welcome back " . $_POST['username'] . " 😸";
    } else {
        if ($loginResult["disabled"] == true) {
            $result['message'] = "Account disabled!\nNot smart enough to bruteforce 😼??";
        } else {
            $result['message'] = "Invalid username or password 😾!";
        }
    }
} else {
    $result['message'] = "Something went bad with the request!";
}

header('Content-Type: application/json');
echo json_encode($result);
