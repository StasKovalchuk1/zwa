<?php
require_once "connect.php";
$id = $_GET['id'];

mysqli_query($connect, "DELETE FROM `wishes` WHERE `wishes`.`id` = '$id'");

header("Location: ../mywishlist.php");

?>