<?php
require_once ("../db-config.php");
require_once ("upload-image.php");

$uploadResult["uploaded"] = false;
$uploadResult["post_id"] = null;

$continue = true;
$city_id = null;
$isAdoption = isset($_POST['isAdoption']);

if ($isAdoption) {
    if (!empty($_POST['city_name'])) {

        $city_name = trim($_POST['city_name']);

        if ($city_name === "") {
            $uploadResult['message'] = "City name is empty!";
            $continue = false;
        }

        $city_id = $dbh->isCityRegistered($city_name);
        if (!$city_id) {
            $uploadResult['message'] = "This City in not present in our Database!";
            $continue = false;
        }
    } else {
        $continue = false;
        $uploadResult['message'] = "Enter a valid city name: " . $_POST['city_name'];
    }
}


if ($continue) {
    if (!empty($_POST['description']) && !empty($_FILES['imgpost']['name'][0])) {

        $uploadResult["uploaded"] = false;
        $uploadResult["message"] = "File non caricati correttamente";
        //img upload
        $num_file = count($_FILES['imgpost']['name']);
        $files_info = $_FILES['imgpost'];

        if ($num_file > 10) {
            $continue = false;
            $uploadResult['success'] = false;
            $uploadResult['message'] = "You can select at most 10 images";
        } else {
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

            if ($uploadResult['uploaded'] && count($mediaToAdd) > 0) {
                $post_id = 0;
                $uploadResult['message'] = "Error in post creation";
                $uploadResult['uploaded'] = false;
                $post_id = $dbh->addPost($_SESSION["user_id"], $_POST['description'], isset($city_id) ? $city_id : null);
                if ($post_id) { // if post creation is successfull
                    $uploadResult['uploaded'] = true;
                    $uploadResult['message'] = "Ready to show your kitty to the entire world!!";
                    foreach ($mediaToAdd as $mediaName) { // add all media to db
                        $mediaId = $dbh->addMedia($mediaName, $post_id);
                        if ($mediaId <= 0) {
                            $uploadResult['uploaded'] = false;
                            $uploadResult['message'] = "Error while adding" . $mediaName . " to db";
                        }
                    }
                }
            }
        }

    } else {
        $uploadResult["message"] = "Invalid Request";
    }
}

if($uploadResult['uploaded']) {
    header('Location: ../open-post.php?post_id=' . $post_id);
} else {
    header('Content-Type: application/json');
    echo json_encode($uploadResult);
}
