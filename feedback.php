<?php
include 'main.php'; 
include 'onlylogged.php';
?>
<!DOCTYPE html>
<html lang="en">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript" src="functions.js"></script>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback</title>
    <link rel="stylesheet" href="style/main.css">
    <link rel="icon" href="style/icon.png">
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
        <h1>Feedback</h1>
        <p>
            In this page you can write an endorsment for any of your collegues as well as 
            see the ones you have been already given.
        </p>
        <?php include "recommend.php"; ?>
    </div>

</body>

    <!--PAGE FOOTER-->
    <?php
    echo $page_footer;
    ?>

</html>