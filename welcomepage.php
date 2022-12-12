<?php
session_start();
?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset = "utf-8">
        <title>Wishlist</title>
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="print.css" media="print">
        <link href="https://fonts.googleapis.com/css2?family=Lato:wght@100;200;300;400;500;700&display=swap" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>

    <body class="blue-theme">
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
                        <form class="nav-link themes">
                            <label><input type="radio" name="theme" value="blue-theme" class="blue-radio" checked>blue</label>
                            <label><input type="radio" name="theme" value="pink-theme" class="pink-radio">pink</label>
                        </form>
                    </nav>
                </div>
            </div>
        </header>
        <!-- Intro -->
        <div class="intro">
            <div class="container">
                <div class="intro-inner">
                    <h1 class="intro-title">The Wish List Maker</h1>
                    <h3 class="intro-subtitle">Your gift assistant</h3>
                    <button class="btn btn-yellow">Create my wishlist</button>
                </div>
            </div>
        </div>

        <!-- Reviews -->
        <div class="reviews">
            <div class="container">
                <div class="reviews-inner">
                    <div class="comment">
                        <p class="comment-info">Your service helps me and my family. Because
                        of you we always know what to present to each other. And it's very user-friendly
                        interface! We will share it with friends with your link! Thank you </p>
                        <p class="reviewer-name">John Snow</p>
                    </div>
                    <div class="comment">
                        <p class="comment-info">Your service helps me and my family. Because
                        of you we always know what to present to each other. And it's very user-friendly
                        interface! We will share it with friends with your link! Thank you </p>
                        <p class="reviewer-name">John Snow</p>
                    </div>
                    <div class="comment">
                        <p class="comment-info">Your service helps me and my family. Because
                        of you we always know what to present to each other. And it's very user-friendly
                        interface! We will share it with friends with your link! Thank you </p>
                        <p class="reviewer-name">John Snow</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <footer class="footer">
            <div class="container">
                <div class="footer-inner">
                    <ul>
                        <li class="footer-block">&copy;Things</li>
                        <li  class="footer-block">
                            <a href="#" class="footer-link">Privacy Policy</a>
                        </li>
                        <li  class="footer-block">
                            <a href="#" class="footer-link">Contact</a>
                        </li>
                    </ul>
                </div>
            </div>
        </footer>
        <script src="script2.js"></script>
    </body>
</html>