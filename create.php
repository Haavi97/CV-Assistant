<?php
include 'main.php';
include 'adduser.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/main.css">
    <link rel="icon" href="style/icon.png">
    <title>Create account</title>
    <script src="functions.js"></script>
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
    <p>
        <?php
            echo $new_status;
        ?>
    </p>
    <div id="pagecontent">
        <form method="POST" id="formdata" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <div class="container">
                <h1>Register</h1>
                <p>Please fill in this form to create an account.</p>
                <hr>
                <table>
                    <tr>
                        <td><label for="reg_name"><b>Name</b></label></td>
                        <td><input type="text" placeholder="Enter username" name="reg_name" id="reg_name" required></td>
                    </tr>
                    <tr>
                        <td><label for="psw"><b>Password</b></label></td>
                        <td><input type="password" placeholder="Enter Password" name="psw" id="psw" required></td>
                    </tr>
                    <tr>
                        <td><label for="psw-repeat"><b>Repeat Password</b></label></td>
                        <td><input type="password" placeholder="Repeat Password" name="psw-repeat" id="psw-repeat" required></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>    
                            <button type="submit" id="registerbtn" class="button" style="font-size: 1rem;">Register</button>
                        </td>
                    </tr>
                </table>
                <p>By creating an account you agree to our <a href="#">Terms & Privacy</a>.</p>
            </div>
            
            <div class="container signin" style="padding-bottom:200px;">
                <p>Already have an account? <a class="button" style="font-size: 1rem; background-color: #276678; color:white;" href="login.php">Sign in</a>.</p>
            </div>
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