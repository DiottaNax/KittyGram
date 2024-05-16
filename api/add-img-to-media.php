<?php
require_once ("../db-config.php");

$result["uploadDone"] = false;
$result["errorInUpload"] = "ok";

if (isset($_POST["post_id"]) && isset($_POST["file_name"])) {

    if (!$dbh->addMedia($_POST["file_name"], $_POST["post_id"])) {
        $result["errorInUpload"] = "Error while linking image to post";
        exit;
    }
    if ($result["errorInUpload"] == "ok") {
        $result["uploadDone"] = true;
    }
} else {
    $result["errorInUpload"] = "Invalid data received";
}
echo json_encode($result);
?>