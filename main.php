<?php
    $session_active = true;
    $nav_menu = '
        <li class="menu"><a href="index.php">Home</a></li>
        <li class="menu"><a href="FAQ.php">FAQ</a></li>
        ';
    if ($session_active){
        $nav_menu = $nav_menu . '
        <li class="menu"><a href="edit.php">Edit CV</a></li>
        <li class="menu"><a href="feedback.php">Feedback</a></li>
        ';
    } else{
        $nav_menu = $nav_menu . '
        <li class="menu"><a href="login.php">Login</a></li>
        ';
    }
    $page_footer = '
    <footer>
        <span id="footertext">Endla 14 Kristiine, Tallinn, Harjumaa</span>
        <a href="tel:372-948-9494">+ 372 948 9494</a>
        <br>
        <span id="footertext">Estonia Zip Code 29302 </span>
        <a href="mailto:support@idwod.com">support@idwod.com</a>
    </footer>
    ';
?>