<?php
    session_start();
    require_once "connect.php";

    $userID = $_COOKIE['userID'];

    $wish = $_POST['item'];
    $count = $_POST['count'];
    if ($_POST['date'] == NULL){
        mysqli_query($connect, "INSERT INTO `wishes` (`id`, `user_id`, `wish`, `count`, `date`, `reservation`) VALUES (NULL, '$userID', '$wish', '$count', NULL, NULL)");
    }
    else{
        $date = $_POST['date'];
        mysqli_query($connect, "INSERT INTO `wishes` (`id`, `user_id`, `wish`, `count`, `date`, `reservation`) VALUES (NULL, '$userID', '$wish', '$count', '$date', NULL)");
    }


    header("Location: ../mywishlist.php");