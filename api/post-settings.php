<?php

require_once ("../db-config.php");

$result['message'] = "Invalid request";
$result['success'] = false;

if(isset($_POST['post_id'], $_POST['post_option'])) {
    $post_id = $_POST['post_id'];
    $post_option = $_POST['post_option'];
    
    if($post_option == "delete") {
        $result['success'] = $dbh->deletePost($post_id);
        $result['message'] = "Query successfully sent";
    } else if($post_option == "mark_adopted") {
        $result['success'] = $dbh->markAsAdopted($post_id);
        $result['message'] = "Query successfully sent";
    }
}

header("Content-type: application/json ");
echo json_encode($result);