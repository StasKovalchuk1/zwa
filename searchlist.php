<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Search</title>
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="print.css" media="print">
  <link href="https://fonts.googleapis.com/css2?family=Lato:wght@100;200;300;400;500;700&display=swap" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="app.js"></script>
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

<!--Login-->

<div class="form">
  <div class="container">
    <form action="searchPage.php" method="post">
      <div class="form-field">
        <fieldset>
          <legend class="form-title">Search the list</legend>
          <h5 class="search-info">All lists are public, you can search the list by name. <br> Just enter a person's name to find their wishlist.</h5>
          <div class="row">
            <label for="search-login" class="form-label">Login</label>
            <input type="text" name="search-login" id="search-login" placeholder="e.g. Amigo2003" class="form-box">
          </div>

          <input type="submit" value="Search" class="btn btn-form">

        </fieldset>
      </div>
    </form>
  </div>
</div>
<script src="script2.js"></script>
</body>
</html>