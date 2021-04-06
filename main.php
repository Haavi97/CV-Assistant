<?php
include "user.php";

session_start(); 

$current = new User();

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
        $current = json_decode($data, false);
    }
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




// HANDLING EDIT CV FORM
$validity_str = "";
$valid = false;
list($year_t, $month_t, $day_t) = explode("-", date('Y-m-d'));
// str -> int today 
$month_t = intval($month_t);
$day_t = intval($day_t);
$year_t = intval($year_t) - 18;
$age_18 = implode("-", array($month_t, $day_t, $year_t));
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $validity_str = "Handling request";
    $current->set_firstname($_POST['fname']);
    $current->set_lastname($_POST['lname']);
    $current->set_nationality($_POST['nationality']);
    $current->set_sex($_POST['sex']);
    $current->set_hschool($_POST['hschool']);
    $current->set_hschool_year($_POST['hschool_year']);
    $current->set_email($_POST['email']);
    $current->set_phone($_POST['phone']);
    list($year, $month, $day) = explode("-", $_POST['birth']);
    // str -> int age
    $month = intval($month);
    $day = intval($day);
    $year = intval($year);

    if (checkdate($month, $day, $year)){
        if ($year <= $year_t){
            $current->set_date(implode("-", array($year, $month, $day)));
        } else {
            $current->date = null;
        }
    }else {
        $current->date = null;
    }
    if (isset($_POST['university']) && $_POST['university'] !== ""){
        ($current->university)->set_name($_POST['university']);
        ($current->university)->set_study_level($_POST['study_level']);
        ($current->university)->set_studies_title($_POST['studies_title']);
        ($current->university)->set_uni_graduation($_POST['uni_graduation']);
    }

    // Cheking all required fields. If they are empty is because they are not valid
    if (empty($current->get_firstname()) or empty($current->get_lastname()) or empty($current->get_email()) or empty($current->get_phone()) or empty($current->get_date())) {
        $validity_str = "<span style=\"color:red\">Invalid form. Please check all the fields</span>";
        $valid = false;
    } else {
        $valid = true;
    }
}

// if data is valid proceed to save to file and echo to html
if ($valid) {
    $dir = 'data';
    $file = $dir . '/'. $_SESSION["username"] . '.json';
    try {
        if (!file_exists($dir)) {
            mkdir($dir, 0777);
        }
        $data = json_encode($current, JSON_INVALID_UTF8_IGNORE);
        $success = false;
        if (file_exists($file)) {
            $handler = fopen($file, 'w+');
            fwrite($handler, $data);
            fclose($handler);
            $success = true;
        } else {
            if (file_put_contents($file, $data) == FALSE) {
                $failed_str = "<br><span style=\"color:red\">failed to write data<br></span>";
                $validity_str = $validity_str . $failed_str;
            } else {
                $success = true;
            }
        }
        if ($success){
            $validity_str = "<span style=\"color:green\">Saved data.</span>";
        }
    } catch (Exception $e) {
        $validity_str = $validity_str . 'Caught exception: ' . $e->getMessage() . "\n";
    }
}
?>