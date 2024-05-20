<?php

require_once ("../db-config.php");

$result['success'] = false;
$result['message'] = "invalid request: " . var_dump($_POST);

if(isset($_POST['sender_id']) && isset($_POST['receiver_id']) && isset($_POST['message'])) {
    $sender = $_POST['sender_id'];
    $receiver = $_POST['receiver_id'];
    $message = $_POST['message'];
    $post_id = empty($_POST['post_id']) ? null : $_POST['post_id'];

    $dbh->addNotification($message, $receiver, $sender, $post_id);
    $result['success'] = true;
    $result['message'] = "notification sent" . date('Y-m-d H:i', time());
}

header("Content-type: application/json");
echo json_encode($result);