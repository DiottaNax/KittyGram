<?php
require_once ("../db-config.php");

$result['success'] = false;
$result['message'] = "Invalid request: ";

if(isset($_POST['post_id'], $_POST['remove_like'])) {
    $post_id = $_POST['post_id'];
    $remove = $_POST['remove_like'] == "true" ? true : false;
 
    if ($remove) {
        $result['message'] = "removed";
        $dbh->removeLike($post_id, $_SESSION["user_id"]);
    } else {
        $result['message'] = "added";
        $dbh->addLike($post_id, $_SESSION["user_id"]);
    }

    // Ottenere i dati per la risposta JSON
    $result['sender_id'] = $_SESSION["user_id"];
    $result['receiver_id'] = $dbh->getPostOwnerId($post_id);
    $result['removed'] = $remove;
    $result['success'] = true;
}


header('Content-Type: application/json');
echo json_encode($result);


