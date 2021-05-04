<?php
include_once 'user.php';
include_once 'main.php';
include_once 'dbconnection.php';


function get_db_pswd($link, $username){
    $query = mysqli_prepare($link, "SELECT pswd
                                    FROM Users
                                    WHERE username=?");
    mysqli_stmt_bind_param($query, "s",$username);
    $result = mysqli_stmt_execute($query);
    mysqli_stmt_bind_result($query, $pswd);
    if (mysqli_stmt_fetch($query)) return $pswd;
}
// 1. Check correct form
$status = '';
$valid = false;
$current = new NewUser();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $current->set_username($link, $_POST['username']);
    $current->set_pswd($link, hash("sha256",$_POST['password']));
    // Cheking all required fields. If they are empty is because they are not valid
    if (empty($current->get_username()) or empty($current->get_pswd())) {
        $status = "<span style=\"color:red\">Invalid Credentials</span>". 
        "<script>loginFail()</script>";
        $valid = false;
    } else if ($current->get_pswd() == get_db_pswd($link, $current->get_username())){
        $valid = true;
    } else {
        $status = "<span style=\"color:red\">Invalid Credentials</span>". 
        "<script>loginFail()</script>";
        $valid = false;
    }
}

if ($valid) {
    $query = mysqli_prepare($link, "SELECT pswd FROM Users
                                    WHERE username=?");
    mysqli_stmt_bind_param($query, "s",$current->get_username());
    mysqli_stmt_execute($query);
    $result = mysqli_stmt_bind_result($query, $password);
    // 4. Prompt success message
    if ($result){
        login($current->get_username(), $password);
    } else {
        $status = "<span style=\"color:red\">Invalid username or password. </span>";
    }
}

mysqli_close($link);
?>