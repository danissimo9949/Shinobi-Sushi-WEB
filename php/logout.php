<?php
session_start();

$_SESSION = array();

session_destroy();

session_start();
$_SESSION['is_auth'] = false;
header("Location: ../html/site.php");
exit;
?>