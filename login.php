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
        echo $nav_menu
        ?>
    </ul>
</nav>

<!--PAGE CONTENT-->

<body>
    <div id="pagecontent">
        <p>
            WILL TURN INTO A LOGOUT BUTTON DURING AN ACTIVE USER SESSION <br>
        </p>
        <h1 style="margin-top:50px;">Login to your account</h1>

        <form>
            <label for="username">Username:</label><br>
            <input type="text" id="username" name="username"><br>
            <label for="Password">Password:</label><br>
            <input type="password" id="Password" name="Password">
            <br>
            <br>
            <input type="submit" value="Log in" class="login_button">
        </form>
    </div>

    <!--PAGE FOOTER-->
    <?php
    echo $page_footer;
    ?>

</body>

</html>