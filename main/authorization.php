<?php
session_start();
require_once "connect.php";
$username = $_POST['username'];
$password = md5($_POST['password']);

$check_user = mysqli_query($connect, "SELECT `id`, `name`,`password` FROM `users` WHERE `name` = '$username' AND `password` = '$password'");
if (mysqli_num_rows($check_user) > 0){
    $check_user = mysqli_fetch_all($check_user);
    foreach ($check_user as $user){
        setcookie('userID', $user[0], time()+60*60*24*365, '/');
//        $_COOKIE['userID'] = $user[0];
    }
    $_SESSION['session'] = 'active';
    setcookie('username',$username, time()+60*60*24*365, '/');
//    $_COOKIE['username'] = $username;
   header("Location: ../mywishlist.php");
}
else{
    $_SESSION['message'] = 'Wrong login or password';
    header("Location: ../login.php");
}
