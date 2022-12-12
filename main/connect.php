<?php
    $connect = mysqli_connect('localhost', 'root', 'root', 'wishlist_bd');
    if (!$connect){
        die("ERROR");
    }