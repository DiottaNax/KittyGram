<?php

require_once ("../db/db-config.php");
require_once ("../db/database.php");
require_once ("../utils/login_utilities.php");

$result['success'] = false;

if (isset($_POST['username'], $_POST['email'], $_POST['name'], $_POST['surname'], $_POST['password'])) {
    // Recupero la password criptata dal form di inserimento.
    $password = $_POST['password'];
    // Crea una chiave casuale
    $random_salt = hash('sha512', uniqid(mt_rand(1, mt_getrandmax()), true));
    // Crea una password usando la chiave appena creata.
    $password = hash('sha512', $password . $random_salt);
    $username = $_POST['username'];
    $email = $_POST['email'];
    $name = $_POST['name'];
    $surname = $_POST['surname'];

    if($dbh->isUsernameTaken($username)) {
        $register['error'] = "Username already taken! Don't leave us, choose another one :)";
    } else {
        $dbh->addAccount($username, $email, $name, $surname, $password, $salt);
        login($username, $password, $dbh);
        $result['success'] = true;
    }
}

header('Content-Type: application/json');
echo json_encode($result);

