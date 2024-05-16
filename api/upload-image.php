<?php
require_once ("../db-config.php");
require_once ("../utils/functions.php");

$result["uploadDone"] = false;

//img upload
if (isset($_FILES['file_name'])) {
    $uploadResult = uploadImage("../img/", $_FILES["file_name"]);
    if ($uploadResult[0]) {
        $result["uploadDone"] = true;
        $result["file_name"] = $uploadResult[1];
    } else {
        $result["errorInUpload"] = $uploadResult[1];
    }
} else {
    $result["errorInUpload"] = "Richiesta non valida";
}

header('Content-Type: application/json');
echo json_encode($result);

?>