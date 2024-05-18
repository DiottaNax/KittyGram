<?php
require_once ("../db_config.php");

$idPost = $_POST["post_id"];
$remove = isset($_POST["remove"]) ? $_POST["remove"] : false;

if ($remove) {
    $dbh->removeLike($idPost, $_SESSION["user_id"]);
} else {
    $dbh->insertLike($idPost, $_SESSION["user_id"]);
}

// Ottenere i dati per la risposta JSON
$liked = $dbh->getLikes($idPost, $_SESSION["user_id"]);
$senderID = $_SESSION["user_id"];
$receiverID = $dbh->getUserIdByIdPost($idPost);

$result = [
    "liked" => $liked,
    "senderID" => $senderID,
    "receiverID" => $receiverID,
    "success" => true
];
error_log("like.php - Result: " . json_encode($result));


header('Content-Type: application/json');
echo json_encode($result);
?>