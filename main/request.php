<?php
session_start();
if (isset($_SESSION['session'])){
    if ($_SESSION['session'] == 'inactive'){
        header("Location: ../login.php");
    }
else if ($_SESSION['session'] == 'active'){
        header("Location: ../mywishlist.php");
    }
}
else{
    header("Location: ../login.php");
}
?>