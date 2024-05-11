<?php 
if(isset($_POST['id'])) {
    require_once("../db-config.php");
    $id = $_POST['id']; // Salva l'ID in una variabile per comodità
    echo "<script>alert('ID: " . $id . "');</script>"; // Visualizza l'ID tramite un alert
    $dbh->viewedNotification($_POST['id']);
}
?>