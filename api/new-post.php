<?php
require_once ("../db-config.php");

$result["insertDone"] = false;
$result["post_id"] = 0;

if (isset($_POST['description'], $_POST["city_name"])) {

    $id = $dbh->insertPost($_SESSION["user_id"], $_POST['description'], $_POST["city_name"]);

    if ($id) {
        $result["post_id"] = $id;
        $result["insertDone"] = true;
    } else {
        $result["errorInsert"] = "query error";
    }
} else {
    $result["errorInsert"] = "Request not valid insert post";
}

header('Content-Type: application/json');
echo json_encode($result);
?>