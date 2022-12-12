<?php
session_start();
require_once 'main/connect.php';
if (isset($_SESSION['session'])){
    if ($_SESSION['session'] == 'inactive'){
        header("Location: login.php");
    }
}
else{
    header("Location: login.php");
}
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
if (isset($_COOKIE['username'])){
    echo '<h2>' . $_COOKIE['username'] . '&apos;s  Wishlist</h2>';
}
//if (isset($_COOKIE['userID'])){
//    echo '<h2>' . $_COOKIE['userID'] . ' id</h2>';
//}
else{
    echo 'My Wishlist';
}

//$result = mysqli_query($connect, "SELECT `wish`, `count`, `date` FROM `wishes` WHERE `user_id` = '" . $_COOKIE['userID'] . "'");

?>
</div>

<!-- WishList-->

<div class="wishlist">
  <div class="container">
    <div class="wishlist-inner">
        <form action="additem.php" method="post">
            <button class="btn btn-green">add another item</button>
        </form>
            <table>
                <tr>
                    <th>Wish</th>
                    <th>Count</th>
                    <th>Date</th>
                </tr>
                <?php
                    $result = mysqli_query($connect, "SELECT `id`, `wish`, `count`, `date` FROM `wishes` WHERE `user_id` = '" . $_COOKIE['userID'] . "'");
                    $result = mysqli_fetch_all($result);
                    foreach ($result as $row){
                ?>
                <tr>
                 <td><?= $row[1]?></td>
                 <td><?= $row[2]?></td>
                 <td><?= $row[3]?></td>
                 <td class="correct"><form action="update.php?id=<?= $row[0]?>&wish=<?= $row[1]?>&count=<?= $row[2]?>&date=<?= $row[3]?>" method="post"><button class="search"><img src="img/edit.png" alt="" class="edit"></button></form></td>
                 <td class="correct"><form action="main/delete.php?id=<?= $row[0]?>" method="post"><button class="search"><img src="img/delete.png" alt="" class="delete"></button></form></td>
             </tr>
                <?php
                    }
                ?>
<!--                --><?php
//                    while ($row = $result->fetch_assoc()) {
//                        $wish = $row['wish'];
//                        $count = $row['count'];
//                        $date = $row['date'];
//                        echo '<tr>
//                                <td>' . $row['wish'] . '</td>
//                                <td>' . $row['count'] . '</td>
//                                <td>' . $row['date'] . '</td>
//                                <td class="correct"><form action="update.php?wish=<?$row['wish']>" method="post"><button class="search"><img src="img/edit.png" alt="" class="edit"></button></form></td>
//                                <td class="correct"><form action="delete_wish.php" method="post"><button class="search"><img src="img/delete.png" alt="" class="delete"></button></form></td>
//                              </tr>';
//                    }
//                ?>
            </table>



    </div>
  </div>
</div>
<script src="app.js"></script>
<script src="script2.js"></script>
</body>
</html>