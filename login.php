<?php
include_once 'main.php';
include_once 'handlelogin.php';
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

<!--PAGE CONTENT-->

<body>
    <!--NAVIGATION BAR-->
    <nav>
        <img src="style/logo.png" style="padding:20px;" alt="Logo">
        <ul>
            <?php
            echo $nav_menu;
            ?>
        </ul>
    </nav>
    
    <div id="pagecontent">
        <h1 style="margin-top:50px;">Login to your account</h1>
        <p>
            <?php
                echo $status;
            ?>
        </p>

        <form method="POST" id="formdata" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <label for="username">Username:</label><br>
            <input type="text" id="username" name="username"><br>
            <label for="password">Password:</label><br>
            <input type="password" id="password" name="password">
            <br>
            <br>
            <input type="submit" id="loginbutton" Value="Login" class="login_button">
        </form>
        <div>
            <h2>Not registered yet?</h2>
            <form action="create.php">
                <input type="submit" class="button" value="Go to registration form" />
            </form>
        </div>
    </div>

    <!--PAGE FOOTER-->
    <?php
    echo $page_footer;
    ?>

</body>

</html>