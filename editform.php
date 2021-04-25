<?php
include_once 'createedtitable.php';

// HANDLING EDIT CV FORM
$validity_str = "";
$valid = false;
$current = new User();
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
    if (isset($_POST['workplace']) && $_POST['workplace'] !== ""){
        ($current->workplace)->set_name($_POST['workplace']);
        ($current->workplace)->set_position($_POST['position']);
        ($current->workplace)->set_time_start($_POST['time_start']);
        ($current->workplace)->set_time_finish($_POST['time_finish']);
        ($current->workplace)->set_job_description($_POST['job_description']);
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