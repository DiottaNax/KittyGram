<?php
require_once("../db-config.php");
date_default_timezone_set('Europe/Rome');

$result['success'] = false;
$result['message'] = "Invalid request";

if(isset($_POST['comment'], $_POST['post_id'], $_POST['writer'])) {
    $writer = $_SESSION['username'];
    $commentContent = substr(trim($_POST['comment']), 0, 254);
    $post_id = $_POST['post_id'];

    $comment_id = $dbh->addComment($commentContent, $post_id, $writer);

    if(isset($comment_id) && $comment_id > 0) {
        $result['success'] = true;
        $result['message'] = "comment added successfully";
        $result['comment'] = $commentContent;
    }
}

header("Content-type: application/json");
echo json_encode($result);
