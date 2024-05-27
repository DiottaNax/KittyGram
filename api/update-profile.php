<?php

require_once("../db-config.php");

$result['success'] = false;
$result['message'] = "Invalid Request";
$continue = true;
$emptyForm = true;

$old_username = $_SESSION['username'];
$new_username = null;
$new_email = null;
$new_password = null;
$new_salt = null;
$new_pic = null;

if (!empty($_POST['new_password'])) {
    if(!empty($_POST['old_password'])) {
        if($dbh->passwordsMatch($old_username, $_POST['old_password'])) {
            // Crea una chiave casuale
            $new_salt = hash('sha512', uniqid(mt_rand(1, mt_getrandmax()), true));
            // Crea una password usando la chiave appena creata.
            $new_password = hash('sha512', $_POST['new_password'] . $new_salt);
            $result['message'] = "Password correct!";
        } else {
            $result['message'] = "Inexact or missing old password";
            $result['success'] = false;
            $result['post'] = $_POST['new_name'];
            $continue = false;
        }
    } else {
        $result['message'] = "You need to insert old password to change it!";
        $result['success'] = false;
        $continue = false;
    }

    $emptyForm = false;
}

if($continue && !empty($_POST['new_username'])) {
    $requested_username = $_POST['new_username'];
    if($dbh->isUsernameTaken($requested_username)) {
        $continue = false;
        $result['message'] = "Username already taken";
        $result['success'] = false;
    } else {
        $new_username = $requested_username;
        $_SESSION['username'] = $requested_username;
    }

    $emptyForm = false;
}

if ($continue && !empty($_POST['new_email'])) {
    $requested_email = trim($_POST['new_email']);
    if ($dbh->isEmailTaken($requested_email)) {
        $continue = false;
        $result['message'] = "Email already in use";
        $result['success'] = false;
    } else {
        $new_email = $requested_email;
    }

    $emptyForm = false;
}

if($continue && (isset($_FILES['new_pic']) && (!empty($_FILES['new_pic']['name'])))) {
    require_once ("upload-image.php");
    $pic_info = $_FILES['new_pic'];
    $uploadResult = uploadImage("../img/", $pic_info);

    if($uploadResult['uploaded']) {
        $new_pic = $uploadResult['file_name'];
    } else {
        $continue = false;
        $result['message'] = $uploadResult['message'];
    }

    $emptyForm = false;
}

if($continue) {
    $new_name = !empty($_POST['new_name']) ? trim($_POST['new_name']) : null;
    $new_surname = !empty($_POST['new_surname']) ? trim($_POST['new_surname']) : null;
    $new_bio = !empty($_POST['new_bio']) ? trim($_POST['new_bio']) : null;
    $query_params = $dbh->updateProfileInfo($old_username, $new_username, $new_name, $new_surname, $new_bio, $new_email, $new_pic, $new_password, $new_salt);
    $result['success'] = true;
    $result['message'] = $emptyForm ? "Nothing to update" : "Profile has been successfully updated";

    header("Location: ../open-profile.php?username=" . $_SESSION['username']);
} else {
    header("Content-type: application/json");
    echo json_encode($result);
}







