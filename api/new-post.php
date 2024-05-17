<?php
require_once ("../db-config.php");
require_once ("upload-image.php");

$uploadResult["uploaded"] = false;
$uploadResult["post_id"] = null;

if (isset($_POST['description'], $_FILES['imgpost'])) {

    $uploadResult["uploaded"] = false;
    $uploadResult["message"] = "File non caricati correttamente";
    //img upload
    $num_file = count($_FILES['imgpost']['name']);
    $files_info = $_FILES['imgpost'];

    if ($num_file > 0) {
        for ($i = 0; $i < $num_file; $i++) {
            // create a single image to upload
            $img['name'] = $files_info['name'][$i];
            $img['full_path'] = $files_info['full_path'][$i];
            $img['type'] = $files_info['type'][$i];
            $img['tmp_name'] = $files_info['tmp_name'][$i];
            $img['error'] = $files_info['error'][$i];
            $img['size'] = $files_info['size'][$i];
            $uploadResult = uploadImage("../img/", $img);

            if (!$uploadResult['uploaded']) // if there's an error in upload end the cycle
                break;

            $mediaToAdd[$i] = $uploadResult['file_name']; // add name file into the files to add to db
        }
    }

    if($uploadResult['uploaded'] && count($mediaToAdd) > 0) {
        $post_id = 0;
        $uploadResult['message'] = "Error in post creation";
        $uploadResult['uploaded'] = false;
        $post_id = $dbh->addPost($_SESSION["user_id"], $_POST['description'], null);
        if($post_id) { // if post creation is successfull
            $uploadResult['uploaded'] = true;
            $uploadResult['message'] = "Ready to show your kitty to the entire world!!";
            foreach($mediaToAdd as $mediaName) { // add all media to db
                $mediaId = $dbh->addMedia($mediaName, $post_id);
                if($mediaId <= 0) {
                    $uploadResult['uploaded'] = false;
                    $uploadResult['message'] = "Error while adding" . $mediaName ." to db";
                }
            }
        }
    }
} else {
    $uploadResult["message"] = "Invalid Request";
}

header('Content-Type: application/json');
echo json_encode($uploadResult);
