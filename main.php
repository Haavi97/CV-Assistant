<?php
    $session_active = false;
    $nav_menu = '
        <li class="menu"><a href="index.php">Home</a></li>
        <li class="menu"><a href="FAQ.php">FAQ</a></li>
        ';
    if ($session_active){
        $nav_menu = $nav_menu . '
        <li class="menu"><a href="edit.html">Edit CV</a></li>
        <li class="menu"><a href="feedback.html">Feedback</a></li>
        ';
    } else{
        $nav_menu = $nav_menu . '
        <li class="menu"><a href="login.php">Login</a></li>
        ';
    }
?>