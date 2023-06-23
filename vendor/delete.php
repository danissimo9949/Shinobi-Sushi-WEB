<?php

    require_once('../php/db_connect.php');

    $id = $_GET['id'];
    
    $queryDelete = mysqli_query($db, "DELETE FROM products WHERE id = '$id'");

    if($queryDelete){
        header("Location: ../php/adminPanel.php");
    } else {
        echo mysqli_error($db);
    }

?>