<?php
require_once ("../db-config.php");

function uploadImage($upload_path, $image)
{
    $upload_result['uploaded'] = false;
    $upload_result['message'] = "";

    $imageName = basename($image["name"]);
    $fullPath = $upload_path . $imageName;

    $maxMB = 10; // Limite in Megabyte
    $acceptedExtensions = array("jpg", "jpeg", "png", "gif");

    //Controllo se l'immagine caricata è veramente un'immagine
    $imageSize = getimagesize($image["tmp_name"]);
    if ($imageSize === false) {
        $upload_result['message'] .= "File caricato non è un'immagine! ";
    }

    //Controllo dimensione dell'immagine < 10MB
    if ($image["size"] > $maxMB * 1024 * 1024) { // Converte MB in byte
        $upload_result['message'] .= "File caricato pesa troppo! Dimensione massima è $maxMB MB. ";
    }

    //Controllo estensione del file
    $imageFileType = strtolower(pathinfo($fullPath, PATHINFO_EXTENSION));
    if (!in_array($imageFileType, $acceptedExtensions)) {
        $upload_result['message'] .= "Accettate solo le seguenti estensioni: " . implode(",", $acceptedExtensions);
    }

    //Controllo se esiste file con stesso nome ed eventualmente lo rinomino
    if (file_exists($fullPath)) {
        $i = 1;
        do {
            $i++;
            $imageName = pathinfo(basename($image["name"]), PATHINFO_FILENAME) . "_$i." . $imageFileType;
        }
        while (file_exists($upload_path . $imageName));
        $fullPath = $upload_path . $imageName;
    }

    //Se non ci sono errori, sposto il file dalla posizione temporanea alla cartella di destinazione
    if (strlen($upload_result['message']) == 0) {
        if (!move_uploaded_file($image["tmp_name"], $fullPath)) {
            $upload_result['message'] .= "Errore nel caricamento dell'immagine.";
        } else {
            $upload_result['uploaded'] = true;
            $upload_result['file_name'] = $imageName;
            $upload_result['message'] = "File Uploaded Successfully";
        }
    }
    
    return $upload_result;
}

