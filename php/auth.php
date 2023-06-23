<?php
session_start();
require_once('../php/db_connect.php');

if ( isset($_POST['login']) && isset($_POST['password'])){

$_SESSION['message'] = '';
$login = $_POST['login'];
$password = md5($_POST['password']);


$query = mysqli_query($db, "SELECT * FROM `users` WHERE `login` = '$login' AND `password` = '$password'");
if (!$query){
    echo mysqli_error($db);
} else if (mysqli_num_rows($query) == 0){
    $_SESSION['message'] = 'Такого користувача не знайдено. Зареєструйтеся!';
    $_SESSION['is_auth'] = false;
    header("Location: ../html/loginForm.php");
}else{
    $_SESSION['is_auth'] = true;
    $user = mysqli_fetch_assoc($query);
    if ($user['is_admin'] == 1){
        $_SESSION['is_admin'] = true;
    } else {
        $_SESSION['is_admin'] = false;
    }
    header("Location: ../html/site.php");
}
} else {
    echo 'Дані не введені';
}
?>
