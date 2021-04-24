<?php
$server = "anysql.itcollege.ee";
$user = "team15";
$password = "e4aca10eb146";
$database = "WT_15";

$mysqli = new mysqli($server, $user, $password, $database);
if ($mysqli->conect_error){
    die("Connection to DB failed: ".mysqli_connect_error());
} else echo "Connected to DB succesfully";
?>