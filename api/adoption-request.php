<?php

require_once ("../db-config.php");

function isBlank(...$strings)
{
    foreach ($strings as $string) {
        if ($string === "")
            return true;
    }

    return false;
}

$result['success'] = false;
$result['message'] = "Invalid request, missing one or more fields";

if (isset($_POST['adoption_owner'], $_POST['phone_number'], $_POST['adoption_presentation'], $_POST['adoption_id'], $_POST['adoption_submitter'])) {
    $post_owner = trim($_POST['adoption_owner']);
    $phone_number = trim($_POST['phone_number']);
    $presentation = trim($_POST['adoption_presentation']);
    $submitter = trim($_POST['adoption_submitter']);
    $post_id = trim($_POST['adoption_id']);

    if (!isBlank($post_owner, $phone_number, $presentation, $submitter, $post_id)) {

        $submitter_id = $dbh->getIdFromUsername($submitter);

        if($submitter_id) {
            if ($dbh->requestAlreadyPresent($post_id, $submitter)){
            $result['success'] = false;
            $result['message'] = "You've already sent an adoption request for this kitty";
            } else {
                $dbh->addAdoptionRequest($post_id, $submitter_id, $phone_number, $presentation);
                $result['success'] = true;
                $result['message'] = "Adoption request sent successfully!";
            }
        }        
    }
}

$result['post'] = ['post owner' => $post_owner, 'phone_number' => $phone_number, 'presentation' => $presentation, 'post id' => $post_id, 'submitter' => $submitter];

header("Content-type: application/json");
echo json_encode($result);

