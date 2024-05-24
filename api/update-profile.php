<?php

require_once("../db-config.php");

$result['success'] = false;
$result['message'] = "Invalid Request";
$continue = false;

if (isset($_POST['new_password'])) {
    if(isset($_POST['old_password'])) {
        if($dbh->passwordsMatch($_POST['old_password'], $_SESSION['username'])) {
            // Crea una chiave casuale
            $updated_salt = hash('sha512', uniqid(mt_rand(1, mt_getrandmax()), true));
            // Crea una password usando la chiave appena creata.
            $updated_password = hash('sha512', $password . $updated_salt);
            $continue = true;
            $result['message'] = "Password correct!";
        } else {
            $result['$message'] = "Inexact old password: " . $_POST['old_password'];
            $result['success'] = false;
        }
    } else {
        $result['$message'] = "You need to insert old password to change it!";
        $result['success'] = false;
    }
}

header("Content-type: application/json");
echo json_encode($result);



