<?php
function uploadImage($path, $image)
{
    $imageName = basename($image["file_name"]);
    $fullPath = $path . $imageName;

    $maxKB = 500;
    $acceptedExtensions = array("jpg", "jpeg", "png", "gif");
    $result = 0;
    $msg = "";
    //Check that the file is an image and the correct size
    $imageSize = getimagesize($image["tmp_name"]);
    if ($imageSize === false) {
        $msg .= "File uploaded is not an image! ";
    }
    if ($image["size"] > $maxKB * 1024) {
        $msg .= "File too big, max dimention $maxKB KB. ";
    }

    $imageFileType = strtolower(pathinfo($fullPath, PATHINFO_EXTENSION));
    if (!in_array($imageFileType, $acceptedExtensions)) {
        $msg .= "file extension not valid, use one of: " . implode(",", $acceptedExtensions);
    }

    //rename file if needed
    if (file_exists($fullPath)) {
        $i = 1;
        do {
            $i++;
            $imageName = pathinfo(basename($image["file_name"]), PATHINFO_FILENAME) . "_$i." . $imageFileType;
        }
        while (file_exists($path . $imageName));
        $fullPath = $path . $imageName;
    }

    //move file
    if (strlen($msg) == 0) {
        if (!move_uploaded_file($image["tmp_name"], $fullPath)) {
            $msg .= "Errore nel caricamento dell'immagine.";
        } else {
            $result = 1;
            $msg = $imageName;
        }
    }
    return array($result, $msg);
}



?>