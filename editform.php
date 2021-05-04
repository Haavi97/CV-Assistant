<?php
include_once 'dbconnection.php';
include_once 'createedittable.php';

// HANDLING EDIT CV FORM
$MAX_UNI = 5;
$MAX_WORKPLACE = 20;
$validity_str = "";
$uni_sql = "";
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

    if (checkdate($month, $day, $year)) {
        if ($year <= $year_t) {
            $current->set_date(implode("-", array($year, $month, $day)));
        } else {
            $current->date = null;
        }
    } else {
        $current->date = null;
    }
    if (isset($_POST['university']) && $_POST['university'] !== "") {
        ($current->university)->set_name($_POST['university']);
        ($current->university)->set_study_level($_POST['study_level']);
        ($current->university)->set_studies_title($_POST['studies_title']);
        ($current->university)->set_uni_graduation($_POST['uni_graduation']);
        $uni_sql = add_primary_uni_info_to_db($link, $current);
    }
    if (isset($_POST['workplace']) && $_POST['workplace'] !== "") {
        ($current->workplace)->set_name($_POST['workplace']);
        ($current->workplace)->set_position($_POST['position']);
        ($current->workplace)->set_time_start($_POST['time_start']);
        ($current->workplace)->set_time_finish($_POST['time_finish']);
        ($current->workplace)->set_job_description($_POST['job_description']);
    }
    // Checking extra unis
    for ($i = 2; $i <= $MAX_UNI; $i++) {
        $current_uni = 'university' . $i;
        if (isset($_POST[$current_uni]) && $_POST[$current_uni] !== "") {
            array_push($current->additional_unis, new University);
            ($current->additional_unis[$i - 2])->set_name($_POST[$current_uni]);
            ($current->additional_unis[$i - 2])->set_study_level($_POST['study_level' . $i]);
            ($current->additional_unis[$i - 2])->set_studies_title($_POST['studies_title' . $i]);
            ($current->additional_unis[$i - 2])->set_uni_graduation($_POST['uni_graduation' . $i]);
        }
    }

    // Checking extra workplaces
    for ($i = 1; $i <= $MAX_WORKPLACE; $i++) {
        $current_workplace = 'workplace' . $i;
        if (isset($_POST[$current_workplace]) && $_POST[$current_workplace] !== "") {
            array_push($current->additional_workplaces, new Workplace);
            ($current->additional_workplaces[$i - 2])->set_name($_POST[$current_workplace]);
            ($current->additional_workplaces[$i - 2])->set_position($_POST['position' . $i]);
            ($current->additional_workplaces[$i - 2])->set_time_start($_POST['time_start' . $i]);
            ($current->additional_workplaces[$i - 2])->set_time_finish($_POST['time_finish' . $i]);
            ($current->additional_workplaces[$i - 2])->set_job_description($_POST['job_description' . $i]);
            // print_r($current->additional_workplaces);
        }
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
    $new_status = add_basic_info_to_db($link, $current);
    $dir = 'data';
    $file = $dir . '/' . $_SESSION["username"] . '.json';
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
        if ($success) {
            $validity_str = "<span style=\"color:green\">Saved data.</span>";
        }
    } catch (Exception $e) {
        $validity_str = $validity_str . 'Caught exception: ' . $e->getMessage() . "\n";
    }
}

function echo_not_null($var)
{
    if ($var !== null and $var !== '') {
        echo "value=";
        echo $var;
    }
}

function get_user_id($link)
{
    $query = mysqli_prepare($link, "SELECT ID
                                    FROM Users WHERE username=?");
    mysqli_stmt_bind_param($query, "s", $_SESSION['username']);
    $result = mysqli_stmt_execute($query);
    mysqli_stmt_bind_result($query, $id);
    if ($result){
        mysqli_stmt_fetch($query);
    } else {
        die('Username not in table. Something weird happening');
    }
    return $id;
}

function add_basic_info_to_db($link, $current)
{
    $exists_query = mysqli_prepare($link, "SELECT EXISTS(SELECT * FROM UsersCVSMain WHERE ID=?)");
    $id = intval(get_user_id($link));
    mysqli_stmt_bind_param($exists_query, "i", $id);
    $exists = mysqli_stmt_execute($exists_query);
    if ($exists) {
        mysqli_stmt_close($exists_query);
        $query = mysqli_prepare($link, "UPDATE UsersCVSMain
                                    SET firstname=?, lastname=?, nationality=?, sex=?, 
                                    hschool=?, hschool_year=?, email=?, phone=?, bday=?
                                    WHERE ID=?");
        mysqli_stmt_bind_param(
            $query,
            "sssssssssi",
            $current->get_firstname(),
            $current->get_lastname(),
            $current->get_nationality(),
            $current->get_sex(),
            $current->get_hschool(),
            $current->get_hschool_year(),
            $current->get_email(),
            $current->get_phone(),
            $current->get_date(),
            $id
        );
        $result = mysqli_stmt_execute($query);
        // Prompt success message
        if ($result) {
            return "<span style=\"color:green\">Succesfully updated basic information</span>";
        } else {
            return "<span style=\"color:red\">Failed to set basic information</span>";
        }
        mysqli_stmt_close($query);
    } else {
        mysqli_stmt_close($exists_query);
        $query = mysqli_prepare($link, "INSERT INTO UsersCVSMain
                                    (ID, username, firstname, lastname, nationality, sex, 
                                    hschool, hschool_year, email, phone, bday)
                                    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        mysqli_stmt_bind_param(
            $query,
            "issssssssss",
            $id,
            $_SESSION['username'],
            $current->get_firstname(),
            $current->get_lastname(),
            $current->get_nationality(),
            $current->get_sex(),
            $current->get_hschool(),
            $current->get_hschool_year(),
            $current->get_email(),
            $current->get_phone(),
            $current->get_date()
        );
        $result = mysqli_stmt_execute($query);
        // Prompt success message
        if ($result) {
            return "<span style=\"color:green\">Succesfully inserted new basic information</span>";
        } else {
            return "<span style=\"color:red\">Failed to insert basic information</span>";
        }
        mysqli_stmt_close($query);
    }
}

function add_primary_uni_info_to_db($link, $current)
{
    $exists_query = mysqli_prepare($link, "SELECT EXISTS(SELECT * FROM UsersCVSUni WHERE ID=? AND entry_number=1)");
    $id = intval(get_user_id($link));
    // echo 'id: '.$id;
    mysqli_stmt_bind_param($exists_query, "i", $id);
    $exists = mysqli_stmt_execute($exists_query);
    // $exists = 0;
    // echo 'There exists: '.$exists;
    if ($exists) {
        mysqli_stmt_close($exists_query);
        $query_uni = mysqli_prepare($link, "UPDATE UsersCVSUni
                                    SET uni_name=?, study_level=?, studies_title=?, uni_graduation=?
                                    WHERE ID=? AND entry_number=1");
        mysqli_stmt_bind_param(
            $query_uni,
            "ssssi",
            ($current->university)->get_name(),
            ($current->university)->get_study_level(),
            ($current->university)->get_studies_title(),
            ($current->university)->get_uni_graduation(),
            $id
        );
        $result = mysqli_stmt_execute($query_uni);
        // Prompt success message
        if ($result) {
            return "<span style=\"color:green\">Succesfully updated primary uni params</span>";
        } else {
            return "<span style=\"color:red\">Failed to set primary uni params</span>";
        }
        mysqli_stmt_close($query_uni);
    } else {
        mysqli_stmt_close($exists_query);
        $query_uni = mysqli_prepare($link, "INSERT INTO UsersCVSUni
                                    (ID, username, entry_number, uni_name, study_level, studies_title, uni_graduation)
                                    VALUES (?, ?, 1, ?, ?, ?, ?)");
        mysqli_stmt_bind_param(
            $query_uni,
            "isssss",
            $id,
            $_SESSION['username'],
            ($current->university)->get_name(),
            ($current->university)->get_study_level(),
            ($current->university)->get_studies_title(),
            ($current->university)->get_uni_graduation()
        );
        $result = mysqli_stmt_execute($query_uni);
        // Prompt success message
        if ($result) {
            return "<span style=\"color:green\">Succesfully inserted new primary uni params</span>";
        } else {
            return "<span style=\"color:red\">Failed to insert primary uni params</span>";
        }
        mysqli_stmt_close($query_uni);
    }
}

function add_unis_info_to_db($link, $current, $i)
{
    $exists_query = mysqli_prepare($link, "SELECT EXISTS(SELECT * FROM UsersCVSUni WHERE ID=? AND entry_number=?)");
    $id = intval(get_user_id($link));
    // echo 'id: '.$id;
    mysqli_stmt_bind_param($exists_query, "ii", $id, $i);
    $exists = mysqli_stmt_execute($exists_query);
    // $exists = 0;
    // echo 'There exists: '.$exists;
    if ($exists) {
        mysqli_stmt_close($exists_query);
        $query_uni = mysqli_prepare($link, "UPDATE UsersCVSUni
                                    SET uni_name=?, study_level=?, studies_title=?, uni_graduation=?
                                    WHERE ID=? AND entry_number=?");
        mysqli_stmt_bind_param(
            $query_uni,
            "ssssii",
            ($current->university)->get_name(),
            ($current->university)->get_study_level(),
            ($current->university)->get_studies_title(),
            ($current->university)->get_uni_graduation(),
            $id,
            $i
        );
        $result = mysqli_stmt_execute($query_uni);
        // Prompt success message
        if ($result) {
            return "<span style=\"color:green\">Succesfully updated primary uni params</span>";
        } else {
            return "<span style=\"color:red\">Failed to set primary uni params</span>";
        }
        mysqli_stmt_close($query_uni);
    } else {
        mysqli_stmt_close($exists_query);
        $query_uni = mysqli_prepare($link, "INSERT INTO UsersCVSUni
                                    (ID, username, entry_number, uni_name, study_level, studies_title, uni_graduation)
                                    VALUES (?, ?, ?, ?, ?, ?, ?)");
        mysqli_stmt_bind_param(
            $query_uni,
            "isissss",
            $id,
            $_SESSION['username'],
            $i,
            ($current->university)->get_name(),
            ($current->university)->get_study_level(),
            ($current->university)->get_studies_title(),
            ($current->university)->get_uni_graduation()
        );
        $result = mysqli_stmt_execute($query_uni);
        // Prompt success message
        if ($result) {
            return "<span style=\"color:green\">Succesfully inserted new primary uni params</span>";
        } else {
            return "<span style=\"color:red\">Failed to insert primary uni params</span>";
        }
        mysqli_stmt_close($query_uni);
    }
}

mysqli_close($link);
?>