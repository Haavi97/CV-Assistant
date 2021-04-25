<?php

// Create main CVs table if it does not exists
$query = "CREATE TABLE IF NOT EXISTS UsersCVSMain(
    ID INT NOT NULL,
    username VARCHAR(20) NOT NULL,
    firstname VARCHAR(20),
    lastname VARCHAR(20),
    nationality VARCHAR(20),
    sex VARCHAR(20),
    hschool VARCHAR(20),
    hschool_year VARCHAR(20),
    email VARCHAR(20),
    phone VARCHAR(20),
    bday VARCHAR(20),
    PRIMARY KEY (ID),
    UNIQUE (username)
)";

$result = mysqli_query($link, $query);
if (!$result) die("Could not create datatable UsersCVSMain");


// Create university table if it does not exists
$query = "CREATE TABLE IF NOT EXISTS UsersCVSUni(
    ENTRY_ID INT NOT NULL AUTO_INCREMENT,
    ID INT NOT NULL,
    username VARCHAR(20) NOT NULL,
    entry_number INT NOT NULL,
    uni_name VARCHAR(20),
    study_level VARCHAR(20),
    studies_title VARCHAR(20),
    uni_graduation VARCHAR(20),
    hschool VARCHAR(20),
    hschool_year VARCHAR(20),
    email VARCHAR(20),
    phone VARCHAR(20),
    bday VARCHAR(20),
    PRIMARY KEY (ENTRY_ID)
)";

$result = mysqli_query($link, $query);
if (!$result) die("Could not create datatable UsersCVSUni");


// Create workplace table if it does not exists
$query = "CREATE TABLE IF NOT EXISTS UsersCVSWorkplace(
    ENTRY_ID INT NOT NULL AUTO_INCREMENT,
    ID INT NOT NULL,
    entry_number INT NOT NULL,
    workplace VARCHAR(20) NOT NULL,
    position VARCHAR(20),
    time_start VARCHAR(20),
    time_finish VARCHAR(20),
    job_description VARCHAR(200),
    PRIMARY KEY (ENTRY_ID),
)";

$result = mysqli_query($link, $query);
if (!$result) die("Could not create datatable UsersCVSWorkplace");
?>