<?php
// requires a connection with the database
if(!isset($_SESSION["userId"])) {
  // @todo: show registration page if there's not an open session
} else {
  // @todo show homepage
}

include"base-template.php" //for the moment i will redirect automatically on registration page
?>