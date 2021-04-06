<?php
    include 'main.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit CV</title>
    <link rel="stylesheet" href="style/main.css">
    <link rel="stylesheet" href="style/edit.css">
    <link rel="icon" href="style/icon.png">
</head>


    <!--NAVIGATION BAR-->
    <nav>
        <img src="style/logo.png" style="padding:20px;"></img>
        <ul>
            <?php
            echo $nav_menu;
            ?>
        </ul>
    </nav>

    <!--PAGE CONTENT-->
    <body>
    <div id="pagecontent">
    <h1>Edit your CV</h1>
    <p>
        <?php
        echo $validity_str;
        ?>
    </p>
    <form method="POST" id="formdata" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <!--TODO!-->
        <!--Break styling to be added to CSS for making it higher or change the padding of the input-->
        <table id="basic_info_table">
            <tr>
                <th colspan="4">
                    <h2>Basic info</h2>
                </th>
                <th><button type="submit" class="button" name="submit">Save</button></th>
            </tr>
            <tr>
                <td><label for="fname">First name:</label></td>
                <td><input type="text" id="fname" name="fname" maxlength=40 required placeholder="James" value=<?php echo $current->get_firstname();?>></td>
                <td><label for="phone">Phone number:</label></td>
                <td><input type="text" id="phone" name="phone" maxlength=15 pattern="+([0-9]|\s)*" required title="Phone number starting with country prefix" placeholder="+372 xxx xxxx" value=<?php echo $current->get_phone();?>></td>
            </tr>
            <tr>
                <td><label for="lname">Last name:</label></td>
                <td><input type="text" id="lname" name="lname" maxlength=40 required placeholder="Smith" value=<?php echo $current->get_lastname();?>></td>
                <td><label for="email">Email:</label></td>
                <td><input type="email" id="email" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="Please type a valid email. E.g.: example@examle.com" required placeholder="jsmith@taltech.ee" value=<?php echo $current->get_email();?>>
                </td>
            </tr>
            <tr>
                <td><label for="nationality">Nationality:</label></td>
                <td><input type="text" id="nationality" name="nationality" placeholder="Estonian"  value=<?php echo $current->get_nationality();?>></td>
                <td><label for="birth">Date of birth:</label></td>
                <td><input type="date" id="birth" name="birth" max=<?php echo $age_18;?> required placeholder="1992-12-22" value=<?php echo $current->get_date();?>></td>
            </tr>
            <tr>
                <td><label for="sex">Sex:</label></td>
                <?php 
                if ($current->get_sex()=="male"){
                    $checked_male = "checked";
                    $checked_female = "";
                } else {
                    $checked_male = "";
                    $checked_female = "checked";
                }
                ?>
                <td><input type="radio" id="male" name="sex" value="male"  <?php echo $checked_male;?>>
                    <label for="male">Male</label><br>
                    <input type="radio" id="female" name="sex" value="female" <?php echo $checked_female;?>>
                    <label for="female">Female</label>
                </td>
            </tr>
        </table>
        <table id="education_table">
            <tr>
                <th colspan="4">
                    <h2>Education</h2>
                </th>
            </tr>
            <tr>
                <th>Basic education</th>
            </tr>
            <tr>
                <td><label for="hschool">High school</label></td>
                <td><input type="text" id="hschool" name="hschool" maxlength=40 required placeholder="International School"  value=<?php echo $current->get_hschool();?>>
                </td>
                <td><label for="hschool_year">Graduation:</label></td>
                <td><input type="text" id="hschool_year" name="hschool_year" maxlength=4 max=2021 required placeholder="2005" value=<?php echo $current->get_hschool_year();?>>
                </td>
            </tr>
            <tr>
                <td><input type="button" id="add_school" value="Add a school"></td>
            </tr>
            <tr>
                <th>University studies</th>
            </tr>
            <tr>
                <td><label for="university">University:</label></td>
                <td><input type="text" id="university" name="university" maxlength=40 placeholder="TalTech" value=<?php echo ($current->university)->get_name();?>></td>
                <td><label for="study_level">Study level:</label></td>
                <td>
                    <select id="study_level" name="study_level" value=<?php echo ($current->university)->get_study_level();?>>
                        <option value="bachelor">Bachelor</option>
                        <option value="master">Master</option>
                        <option value="doctorate">Doctorate</option>
                        <option value="post-doctorate">Post-doctorate</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td><label for="studies_title">Title:</label></td>
                <td><input type="text" id="studies_title" name="studies_title" maxlength=40 placeholder="Informatics" value=<?php echo ($current->university)->get_studies_title();?>></td>
                <td><label for="uni_graduation">Graduation:</label></td>
                <td><input type="text" id="uni_graduation" name="uni_graduation" maxlength=4 max=2021 placeholder="2009" value=<?php echo ($current->university)->get_uni_graduation();?>>
                </td>
            </tr>
            <tr>
                <td colspan="2"><input type="button" id="add_uni" value="Add university studies"></td>
            </tr>
        </table>
        <table id="work_experience">
            <tr>
                <th colspan="4">
                    <h2>Work experience</h2>
                </th>
            </tr>
            <tr>
                <td><label for="workplace">Work place</label></td>
                <td><input type="text" id="workplace" name="workplace" maxlength=40 placeholder="ABB"></td>
                <td><label for="position">Position:</label></td>
                <td><input type="text" id="position" name="position" maxlength=40 placeholder="Testing engineer"></td>
            </tr>
            <tr>
                <td><label for="time_start">Started</label></td>
                <td><input type="text" id="time_start" name="time_start" placeholder="June 2010"></td>
                <td><label for="time_finish">Finished</label></td>
                <td><input type="text" id="time_finish" name="time_finish" placeholder="Currently working"></td>
            </tr>
            <tr>
                <td colspan="2"><label for="job_description">Job description:</label></td>
                <td colspan="2"><input type="button" id="ask_feedback" value="Ask feedback from collegues" onclick="window.location='feedback.php';"></td>
            </tr>
            <tr>
                <td colspan="4"><textarea name="job_description" id="job_description" maxlength=40 placeholder="Testing stuff" cols="70" rows="5"></textarea></td>
            </tr>
            <tr>
                <td colspan="4"><input type="button" id="add_work" value="Add work experience"></td>
            </tr>
        </table>
        <br><br><br><br>
    </form>
</div>

    <!--PAGE FOOTER-->
    <?php
    echo $page_footer;
    ?>

</body>

</html>