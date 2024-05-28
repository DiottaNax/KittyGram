<?php

require_once ("../db-config.php");

$result['success'] = false;
$result['message'] = "Invalid request, missing one or more fields";

if (isset($_POST['adoption_id'], $_POST['adoption_submitter'])) {
    $post_id = trim($_POST['adoption_id']);
    $submitter = trim($_POST['adoption_submitter']);

    $submitter_id = $dbh->getIdFromUsername($submitter);

    if ($submitter_id != "" && $post_id != "") {
        $dbh->removeAdoptionRequest($post_id, $submitter_id);
        $result['success'] = true;
        $result['message'] = "Adoption request deleted successfully!";
    }
}


header("Content-type: application/json");
echo json_encode($result);

