<?php
include "user.php";

session_start(); 

if (isset($_SESSION['username'])) {
    $session_active = true;
}
else {
    $session_active = false;
}
$nav_menu = '
    <li class="menu"><a href="index.php">Home</a></li>
    <li class="menu"><a href="FAQ.php">FAQ</a></li>
    ';
if ($session_active){
    $nav_menu = $nav_menu . '
    <li class="menu"><a href="edit.php">Edit CV</a></li>
    <li class="menu"><a href="feedback.php">Feedback</a></li>
    <li class="menu"><a href="logout.php">Logout</a></li>
    ';
    $dir = 'data';
    $file = $dir . '/'. $_SESSION["username"] . '.json';
    $data = file_get_contents($file, $data);
    if ($data == FALSE) {
        // Probably the file is not created yet
        $success = false;
    } else {
        $success = true;
    }
    if ($success){
        $from_file = json_decode($data, false);
    }
} else{
    $nav_menu = $nav_menu . '
    <li class="menu"><a href="login.php">Login</a></li>
    <li class="menu"><a href="create.php">Create account</a></li>
    ';
}
$page_footer = '
<footer>
    <span class="footertext">Endla 14 Kristiine, Tallinn, Harjumaa</span>
    <a href="tel:372-948-9494">+ 372 948 9494</a>
    <br>
    <span class="footertext">Estonia Zip Code 29302 </span>
    <a href="mailto:support@idwod.com">support@idwod.com</a>
</footer>
';

function login($username, $password){
    // This script assumes already validated data
    $_SESSION["username"] = $username;
    $_SESSION["password"] = $password;
    header("Location: index.php");
}
?>