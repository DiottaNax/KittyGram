<?php

require ('../db/db-config.php');
include ('../utils/login_utilities.php');

sec_session_start(); // usiamo la nostra funzione per avviare una sessione php sicura
if (isset($_POST['username'], $_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password']; // Recupero la password criptata.
    if (login($email, $password, $dbh) == true) {
        // Login eseguito
        echo 'Success: You have been logged in!';
    } else {
        // Login fallito
        header('Location: ./login.php?error=1');
    }
} else {
    // Le variabili corrette non sono state inviate a questa pagina dal metodo POST.
    echo 'Invalid Userrname or Password';
}