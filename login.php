<?php
include 'main.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/main.css">
    <link rel="icon" href="style/icon.png">
    <title>Login</title>
</head>

<!--NAVIGATION BAR-->
<nav>
    <img src="style/logo.png" style="padding:20px;"></img>
    <ul>
        <?php
        echo $nav_menu;
        ?>
    </ul>
</nav>

<!--PAGE CONTENT-->

<body>
    <div id="pagecontent">
        <h1 style="margin-top:50px;">Login to your account</h1>

        <form action="login.php" method="POST">
            <label for="username">Username:</label><br>
            <input type="text" id="username" name="username"><br>
            <label for="password">Password:</label><br>
            <input type="password" id="password" name="password">
            <br>
            <br>
            <input type="submit" id="loginbutton" Value="Login" class="login_button">
        </form>
    </div>

    <?php

    if ($_POST) {
        $username = trim($_POST['username']);
        $password = trim($_POST['password']);

        if (!strlen($username) || !strlen($password)) {
            die('Please enter a username and password');
        }

        $handle = fopen("accounts.csv", "r");

        while (($data = fgetcsv($handle)) !== FALSE) {
            if ($data[0] == $username && $data[1] == $password) {
                $_SESSION["username"] = $username;
                $_SESSION["password"] = $password;
                header("Location: index.php");
                break;
            }
        }

        fclose($handle);


        // header("Location: index.php");
    }

    ?>

    <!--PAGE FOOTER-->
    <?php
    echo $page_footer;
    ?>

</body>

</html>