<?php
include_once "user.php";
include_once "dbconnection.php";
// HANDLING CREATE ACCOUNT FORM

// Create table if it does not exists
$query = "CREATE TABLE IF NOT EXISTS Users(
    ID INT NOT NULL AUTO_INCREMENT,
    username VARCHAR(20) NOT NULL,
    pswd VARCHAR(20) NOT NULL,
    PRIMARY KEY (ID),
    UNIQUE (username)
)";

$result = mysqli_query($link, $query);
if (!$result) die("Could not create datatable");

// 1. Check correct form
$new_status = '';
$valid = false;
$current = new NewUser();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $current->set_username($link, $_POST['reg_name']);
    $current->set_pswd($link, $_POST['psw']);
    $current->set_pswd_repeat($link, $_POST['psw-repeat']);


    // Cheking all required fields. If they are empty is because they are not valid
    if (empty($current->get_username()) or empty($current->get_pswd()) or empty($current->get_pswd_repeat())) {
        $new_status = "<span style=\"color:red\">Invalid form. Please check all the fields</span>";
        $valid = false;
    } else {
        if ($current->get_pswd() !== $current->get_pswd_repeat()) {
            $new_status = "<span style=\"color:red\">Invalid form. Please make sure that passwords match</span>";
            $valid = false;
        } else $valid = true;
    }
    // 2. Check the username doesn´t exists
    // Fails later on if it already exists since username is set to be unique in the definition of the datatable
}

// 3. Add to database
if ($valid) {
    $query = mysqli_prepare($link, "INSERT INTO Users
                                    (username, pswd) 
                                    VALUES (?,?)");
    mysqli_stmt_bind_param($query, "ss",$current->get_username(), $current->get_pswd());
    $result = mysqli_stmt_execute($query);
    // 4. Prompt success message
    if ($result){
        $new_status = "<span style=\"color:green\">Succesfully created account</span>" . 
                        "<script>newAccountSuccess()</script>";
    } else {
        $new_status = "<span style=\"color:red\">Invalid username or password. </span>";
    }
}


mysqli_close($link);
?>