<?php
    include 'main.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FAQ</title>
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
    <h1 style="position: relative;"> Frequently Asked Questions</h1>
    <div style="position:relative;">
        <ul>
            <li class="link">
                <h2><a href="">Creating and Deleting Account</a></h2>
            </li>
            <li class="link">
                <h2><a href="">Payment</a></h2>
            </li>
            <li class="link">
                <h2><a href="">Creating and Editing CV </a></h2>
            </li>
            <li class="link">
                <h2><a href="">Endosersement & Recommendation System</a></h2>
            </li>
            <li class="link">
                <h2><a href="">Privacy Policy</a></h2>
            </li>
        </ul>

    </div>
</div>

    <!--PAGE FOOTER-->
    <?php
    echo $page_footer;
    ?>
</body>

</html>