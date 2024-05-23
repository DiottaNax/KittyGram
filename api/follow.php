<?php
require_once ("../db-config.php");

$result = [
    'success' => false,
    'message' => "Invalid request"
];

if (isset($_POST['follower'], $_POST['followed'], $_POST['option'])) {

    $follower = $_POST['follower'];
    $followed = $_POST['followed'];
    $option = $_POST['option'];
    
    if($option === "follow") {
        $dbh->addFollow($follower, $followed);
        $result['message'] = "You now follow" . $followed;
        $result['success'] = true;
    } elseif ($option === "unfollow") {
        $dbh->removeFollow($follower, $followed);
        $result['message'] = "You've unfollowed" . $followed;
        $result['success'] = true;
    }
}

header("Content-type: application/json");
echo json_encode($result);
