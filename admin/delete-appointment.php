<?php 
    
    require_once "config.php";
    // Check existence of id parameter before processing further

    $id = $_GET['id'];
    $sql = "DELETE FROM appointments WHERE id='$id'";

    $result = mysqli_query($link, $sql);

   	header("location: appointments.php");
 ?>