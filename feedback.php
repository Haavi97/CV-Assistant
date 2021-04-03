<?php
    include 'main.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback</title>
    <link rel="stylesheet" href="style/main.css">
    <link rel="icon" href="style/icon.png">
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
    <h1>Give/receive feedback</h1>
    <p>
        WILL APPEAR IN AN ACTIVE USER SESSION <br>     In this page the user will be able to give feedback to some other work collegues or receive feedback from them so it can be shown in his/her CV
    </p>
</div>

    <!--PAGE FOOTER-->
    <?php
    echo $page_footer;
    ?>

</body>

</html>