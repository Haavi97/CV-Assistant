<?php
$server = "anysql.itcollege.ee";
$user = "team15";
$password = "e4aca10eb146";
$database = "WT_15";

$link = mysqli_connect($server, $user, $password, $database);
if (!$link){
    die("Connection to DB failed: ".mysqli_connect_error());
} else;// echo "Connected to DB succesfully<br>";
?>