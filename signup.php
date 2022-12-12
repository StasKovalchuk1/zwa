<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Sign up</title>
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
        <button class="search blue" id="search">
          <img src="img/search1.jpg" alt="" class="icon-search">
        </button>
      </nav>
    </div>
  </div>
</header>

<!--Login-->

<div class="form">
  <div class="container">
    <form action="main/registration.php" method="post" id="form">
      <div class="form-field">
        <fieldset>
          <legend class="form-title">Register a new account</legend>
          <div class="row" id="row1">
            <label for="login" class="form-label">Username</label>
            <input type="text" name="username" id="login" class="form-box login" required>
              <p class="err" id="err1"></p>
              <?php
              if (isset($_SESSION['message'])){
                  echo '<p class="err"> ' . $_SESSION['message'] . '</p>';
              }
              unset($_SESSION['message']);
              ?>
          </div>
          <div class="row" id="row2">
            <label for="password" class="form-label">Password</label>
            <input type="password" name="password" id="password" class="form-box password" required>
              <p class="err" id="err2"></p>
          </div>
          <div class="row">
            <label for="confirm-password" class="form-label">Confirm password</label>
            <input type="password" name="confirm" id="confirm-password" class="form-box confirm" required>
              <p class="err" id="err3"></p>
          </div>

          <input type="submit" value="Register" class="btn btn-form">

        </fieldset>
      </div>
    </form>
    <script>
      init();
    </script>
  </div>
</div>
<script src="script2.js"></script>
</body>
</html>