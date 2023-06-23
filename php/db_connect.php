<?php
$db = mysqli_connect("localhost","root","");
$a = mysqli_select_db($db, "Site");

if (!$db){
    die('Error connect to data base');
}
?>