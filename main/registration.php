<?php
    session_start();
    require_once 'connect.php';

    $username = $_POST['username'];
    $password = md5($_POST['password']);

    $check_user = mysqli_query($connect, "SELECT * FROM `users` WHERE `name` = '$username'");
    if (mysqli_num_rows($check_user) > 0){
        $_SESSION['message'] = 'Choose another name';
        header("Location: ../signup.php");
    }
    else {
        mysqli_query($connect, "INSERT INTO `users` (`id`, `name`, `password`) VALUES (NULL, '$username', '$password')");

        $_SESSION['session'] = 'active';
        setcookie('username',$username, time()+60*60*24*365, '/');
//        $_COOKIE['username'] = $username;
        setcookie('userID', mysqli_insert_id($connect), time()+60*60*24*365, '/');
//        $_COOKIE['userID'] = mysqli_insert_id($connect);
        header("Location: ../mywishlist.php");
    }

