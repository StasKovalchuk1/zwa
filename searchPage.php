<?php
session_start();
require_once "main/connect.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>WishList</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="print.css" media="print">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@100;200;300;400;500;700&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>

<!-- Header -->

<header class="header" id="header">
    <div class="container">
        <div class="header-inner">
            <div class="header-title">
                <h4 class="corner-title">make<br>others<br>happy___</h4>
            </div>
            <nav class="nav" id="nav">
                <a href="welcomepage.php" class="nav-link">Home</a>
                <?php
                if (isset($_SESSION['session'])){
                    if ($_SESSION['session'] == 'inactive'){
                        echo '<a href="login.php" class="nav-link">Log in</a>';
                    }
                    else if ($_SESSION['session'] == 'active'){
                        echo '<a href="mywishlist.php" class="nav-link">Wishlist</a>';
                        echo '<form action="/main/destroySession.php" method="post"><button class="nav-link logout">Log out</button></form>';
                    }
                }
                else{
                    echo '<a href="login.php" class="nav-link">Log in</a>';
                }
                ?>
                <button class="search" id="search">
                    <img src="img/search1.jpg" alt="" class="icon-search">
                </button>
            </nav>
        </div>
    </div>
</header>
<!--Title-->

<div class="list-title">
    <?php
    if (isset($_POST['search-login'])){
        setcookie('search-name', $_POST['search-login'], time()+60*60*24*365, '/');
        $_COOKIE['search-name'] = $_POST['search-login'];
    }
    if (isset($_COOKIE['search-name'])){
        echo '<h2>Search for ' . $_COOKIE['search-name'] . '&apos;s  Wishlist</h2>';
    }
//if (isset($_COOKIE['userID'])){
//    echo '<h2>' . $_COOKIE['userID'] . ' id</h2>';
//}
    else{
        echo 'My Wishlist';
    }

//    $result = mysqli_query($connect, "SELECT `wish`, `count`, `date` FROM `wishes` WHERE `name` = '" . $name . "'");

    ?>
</div>
<div class="wishlist">
    <div class="container">
        <div class="wishlist-inner">
            <table>
                <tr>
                    <th>Wish</th>
                    <th>Count</th>
                    <th>Date</th>
                    <th>Reserved by</th>
                </tr>
                <?php
                $arr = mysqli_query($connect, "SELECT `id` FROM `users` WHERE `name` = '".$_COOKIE['search-name']."'");
                $arr = mysqli_fetch_all($arr);
                foreach ($arr as $row){
                    $id = $row[0];
                }
                $result = mysqli_query($connect, "SELECT `id`, `wish`, `count`, `date`, `reservation` FROM `wishes` WHERE `user_id` = '$id'");
                $result = mysqli_fetch_all($result);
                foreach ($result as $row){
                    $reserved_by_id = $row[4];
                    $reserved_wish = $row[0];
                    ?>
                    <tr>
                        <td><?= $row[1]?></td>
                        <td><?= $row[2]?></td>
                        <td><?= $row[3]?></td>
                        <td><?php if ($reserved_by_id== NULL){
                                echo '<a href="main/reserve.php?id='.$reserved_wish.'">Click to reserve</a>';
                            }
                            else{
                                $list = mysqli_query($connect, "SELECT `name` FROM `users` WHERE `id` = '$reserved_by_id'");
                                $list = mysqli_fetch_all($list);
                                foreach ($list as $row){
                                    $reserved_by = $row[0];
                                }
                                if($reserved_by_id == $_COOKIE['userID']){
                                    echo $reserved_by . '<br> <a href="main/cancelReservation.php?id='.$reserved_wish.'">Cancel</a>';
                                }
                                else{
                                    echo $reserved_by;
                                }
                            }
                            ?>
                        </td>
                    </tr>
                    <?php
                }
                ?>
            </table>
        </div>
    </div>
</div>
<script src="app.js"></script>
<script src="script2.js"></script>
</body>
</html>
