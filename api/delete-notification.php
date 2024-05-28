<?php
require_once ("../db-config.php");

if (isset($_POST['id'])) {
    $id = $_POST['id'];

    // Assicurati di avere una funzione nel tuo file db-config.php per cancellare la notifica
    // ad esempio, potrebbe essere qualcosa del genere: deleteNotification($id)

    if ($dbh->deleteNotification($id)) {
        echo json_encode(["status" => "success", "message" => "Notification deleted successfully."]);
    } else {
        echo json_encode(["status" => "error", "message" => "Failed to delete notification."]);
    }
} else {
    echo json_encode(["status" => "error", "message" => "Invalid request."]);
}
?>