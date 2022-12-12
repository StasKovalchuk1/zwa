<?php
require_once 'main/connect.php';
    $id = $_GET['id'];
    $wish = $_GET['wish'];
    $count = $_GET['count'];
    $date = $_GET['date'];
//    $result = mysqli_query($connect, "SELECT * FROM `wishes` WHERE id = `$id`");
//    $result = mysqli_fetch_assoc($result);
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Update your wish</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="form">
    <div class="container">
        <form action="main/update.php" method="post">
            <div class="form-field">
                <fieldset>
                    <legend class="form-title">Update your item</legend>
                    <input type="hidden" name="id" value="<?=$id?>">
                    <div class="row">
                        <label for="item" class="form-label">What would you like?</label>
                        <input type="text" name="item" id="item" placeholder="e.g. t-shirt" class="form-box" required value="<?=$wish?>">
                    </div>
                    <div class="row">
                        <label for="count" class="form-label">How much?</label>
                        <input type="number" name="count" id="count" class="form-box" min="0" required value="<?=$count?>">
                    </div>
                    <div class="row">
                        <label for="date" class="form-label">By what time? (optional)</label>
                        <input type="date" name="date" id="date" class="form-box" value="<?=$date?>">
                    </div>

                    <input type="submit" value="Update item" class="btn btn-form">
                </fieldset>
            </div>
        </form>
    </div>
</div>
</body>
</html>
