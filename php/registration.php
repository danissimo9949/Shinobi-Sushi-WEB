<?php
session_start();
require_once("../php/db_connect.php");

if (isset($_POST['login']) && isset($_POST['password']) && isset($_POST['email']) && isset($_POST['repeatpassword'])){

$_SESSION['message'] = '';
$login = $_POST['login'];
$password = $_POST['password'];
$md5_password = md5($password);
$email = $_POST['email'];
$repeat_password = $_POST['repeatpassword'];

if (strlen($login) < 6 && strlen($login) > 20){
    echo 'Введіть коректний логін';
    header("Location: ../html/loginForm.php");
    exit();
}

if (strlen($email) < 8 && strlen($email) > 50) {
    echo 'Введіть коректну електронну пошту!';
    header("Location: ../html/loginForm.php");
    exit();
}
if (strlen($password) < 6 && strlen($password) > 32) {
    echo 'Довжина паролю повинна бути від 6 до 32 символів';
    header("Location: ../html/loginForm.php");
    exit();
}

if ( $password != $repeat_password){
    echo 'Паролі не співпадають';
    header("Location: ../html/loginForm.php");
    exit();
}
else{
    $query = mysqli_query($db, "SELECT * FROM `users` WHERE `login` = '$login'");
    if (mysqli_num_rows($query) == 0){
        $query = mysqli_query($db, "INSERT INTO `users` (`login`, `password`, `email`) VALUES ('$login','$md5_password','$email')");
        header("Location: ../html/loginForm.php");
    }
}
}
?>
