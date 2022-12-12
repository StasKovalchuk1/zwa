<?php
require_once "connect.php";

$id = $_GET['id'];
mysqli_query($connect, "UPDATE `wishes` SET `reservation` = '".$_COOKIE['userID']."' WHERE `wishes`.`id` = '$id'");
header("Location: ../searchPage.php");
?>
