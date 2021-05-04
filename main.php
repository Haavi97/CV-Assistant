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
    // $_SESSION["password"] = $password; this would be a security issue
    header("Location: index.php");
}

function additionalUnis($current) {
    for ($i=0;$i<count($current->additional_unis); $i++){
        $name = $current->additional_unis[$i]->name;
        $study_level = $current->additional_unis[$i]->study_level;
        $studies_title = $current->additional_unis[$i]->studies_title;
        $grad_year = $current->additional_unis[$i]->uni_graduation;
        return '<tr>
                    <th>University '.($i+2).'</th>
                </tr>
                <tr>
                    <td><label for="university'.($i+2).'">University:</label></td>
                    <td><input type="text" id="university'.($i+2).'" name="university'.($i+2).'" maxlength=40 placeholder="TalTech" value="'.$name.'"></td>
                    <td><label for="study_level'.($i+2).'">Study level:</label></td>
                    <td>
                        <select id="study_level'.($i+2).'" name="study_level'.($i+2).'" value="'.$study_level.'">
                            <option value="bachelor">Bachelor</option>
                            <option value="master">Master</option>
                            <option value="doctorate">Doctorate</option>
                            <option value="post-doctorate">Post-doctorate</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><label for="studies_title'.($i+2).'">Title:</label></td>
                    <td><input type="text" id="studies_title'.($i+2).'" name="studies_title'.($i+2).'" maxlength=40 placeholder="Informatics" value="'.$studies_title.'"></td>
                    <td><label for="uni_graduation'.($i+2).'">Graduation:</label></td>
                    <td><input type="text" id="uni_graduation'.($i+2).'" name="uni_graduation'.($i+2).'" maxlength=4 placeholder="2009" value="'.$grad_year.'">
                    </td>
                </tr>';
    }
    $_SESSION['universities'] = $i+2;
}

function additionalWorkplaces($current) {
    for ($i=0;$i<count($current->additional_workplaces); $i++){
        $name = $current->additional_workplaces[$i]->name;
        $position = $current->additional_workplaces[$i]->position;
        $time_start = $current->additional_workplaces[$i]->time_start;
        $time_finish = $current->additional_workplaces[$i]->time_finish;
        $job_description = $current->additional_workplaces[$i]->job_description;
        return '<tr>
                    <th>Workplace '.($i+2).'</th>
                </tr>
                <tr>
                    <td><label for="workplace'.($i+2).'">Work place name</label></td>
                    <td><input type="text" id="workplace'.($i+2).'" name="workplace'.($i+2).'" maxlength=40 placeholder="ABB" value="'.$name.'"></td>
                    <td><label for="position'.($i+2).'">Position:</label></td>
                    <td><input type="text" id="position'.($i+2).'" name="position'.($i+2).'" maxlength=40 placeholder="Testing engineer" value="'.$position.'"></td>
                </tr>
                <tr>
                    <td><label for="time_start'.($i+2).'">Started</label></td>
                    <td><input type="text" id="time_start'.($i+2).'" name="time_start'.($i+2).'" placeholder="June 2010" value="'.$time_start.'"></td>
                    <td><label for="time_finish'.($i+2).'">Finished</label></td>
                    <td><input type="text" id="time_finish'.($i+2).'" name="time_finish'.($i+2).'" placeholder="Currently working" value="'.$time_finish.'"></td>
                </tr>
                <tr>
                    <td colspan="2"><label for="job_description'.($i+2).'">Job description:</label></td>
                    <td colspan="2"><input type="button" id="ask_feedback" value="Ask feedback from collegues" onclick="window.location="feedback.php";"></td>
                </tr>
                <tr>
                    <td colspan="4"><textarea name="job_description'.($i+2).'" id="job_description'.($i+2).'" maxlength=200 placeholder="Testing stuff" cols="70" rows="5">'.$job_description.'</textarea></td>
                </tr>';
    }
    $_SESSION['workplaces'] = $i+3;
}
?>