function getIDtoRemove() {

    fetchid = ($("table .selected td:first-child").html());

    $.ajax({
        url: "employees.php",
        type: "post",
        dataType: 'json',
        data: { fetchid: fetchid, "callFunc1": "1" },
        success: function(result) {
            console.log(result.abc);
        }
    });
}

function getIDtoEdit() {
    fetchid = ($("table .selected td:first-child").html());
    fname = document.getElementById("fname").value;
    mname = document.getElementById("mname").value;
    lname = document.getElementById("lname").value;
    email = document.getElementById("email").value;
    phone = document.getElementById("phone").value;
    hiredate = document.getElementById("hiredate").value;
    if (document.getElementById("active2").checked == false) {
        active2 = "NO";
    } else {
        active2 = "YES";
    }


    $.ajax({
        url: "employees.php",
        type: "post",
        dataType: 'json',
        data: { fetchid: fetchid, "callFunc2": "1", "fname": fname, "mname": mname, "lname": lname, "email": email, "phone": phone, "hiredate": hiredate, "active2": active2 },
        success: function(result) {
            console.log(result.abc);
        }
    });
}

$(document).ready(function() {

    function highlight(e) {
        if (selected[0]) selected[0].className = '';
        e.target.parentNode.className = 'selected';
    }

    var table = document.getElementById('table');
    var selected = table.getElementsByClassName('selected');
    table.onclick = highlight;

});


function readmore() {
    var dots = document.getElementById("dots");
    var moreText = document.getElementById("more");
    var btnText = document.getElementById("myBtn");

    if (dots.style.display === "none") {
        dots.style.display = "inline";
        btnText.innerHTML = "Read more";
        moreText.style.display = "none";
    } else {
        dots.style.display = "none";
        btnText.innerHTML = "Read less";
        moreText.style.display = "inline";
    }
}

function toggleQContent(element){
    var ns = element.nextElementSibling;
    console.log(ns);
    var prior_status = ns.hidden;
    console.log(prior_status);
    ns.hidden = !prior_status;
    if (!prior_status){
        element.innerHTML = '▼' + element.innerHTML.substring(1);
    } else {
        element.innerHTML = '▲' + element.innerHTML.substring(1);}
}

function newAccountSuccess(){
    window.alert('Account succesfully created');
    window.open('index.php', _self);
}

function addSchool(element){
    var schools = sessionStorage.getItem('schools');
    if (schools == null){
        schools = 2;
        sessionStorage.setItem('schools', schools);
    } else {
        schools = parseInt(schools) + 1;
        sessionStorage.setItem('schools', schools);
    }
    
    var row = document.createElement('tr');
    var label_td_hschool = document.createElement('td');
    var label_hschool = document.createElement('label');
    var input_td_hschool = document.createElement('td');
    var input_hschool = document.createElement('input');
    var label_td_hschool_year = document.createElement('td');
    var label_hschool_year = document.createElement('label');
    var input_td_hschool_year = document.createElement('td');
    var input_hschool_year = document.createElement('input');

    hschool =  'hschool' + schools.toString();
    hschool_inner = 'High school ' + schools.toString();

    label_hschool.innerHTML = hschool_inner;
    label_hschool.for = hschool;
    input_hschool.type = 'text';
    input_hschool.maxlength = 40;
    input_hschool.id = hschool;
    input_hschool.name = hschool;
    input_hschool.placeholder = hschool_inner;
    
    hschool_year =  'hschool_year' + schools.toString();
    hschool_year_inner = 'Graduation year';

    label_hschool_year.innerHTML = hschool_year_inner;
    label_hschool_year.for = hschool_year;
    input_hschool_year.type = 'text';
    input_hschool_year.maxlength = 4;
    input_hschool_year.id = hschool_year;
    input_hschool_year.name = hschool_year;
    input_hschool_year.placeholder = hschool_year_inner;

    label_td_hschool.appendChild(label_hschool);
    input_td_hschool.appendChild(input_hschool);
    label_td_hschool_year.appendChild(label_hschool_year);
    input_td_hschool_year.appendChild(input_hschool_year);

    row.appendChild(label_td_hschool);
    row.appendChild(input_td_hschool);
    row.appendChild(label_td_hschool_year);
    row.appendChild(input_td_hschool_year);

    element.parentNode.parentNode.before(row);

    if (schools >= 5) element.setAttribute("hidden", true);

}

function addUniversity(element){
    var universities = sessionStorage.getItem('universities');
    if (universities == null){
        universities = 2;
        sessionStorage.setItem('universities', universities);
    } else {
        universities = parseInt(universities) + 1;
        sessionStorage.setItem('universities', universities);
    }
    
    var row0 = document.createElement('tr');
    var row1 = document.createElement('tr');
    var row2 = document.createElement('tr');
    var title = document.createElement('h3');

    var label_td_university = document.createElement('td');
    var label_university = document.createElement('label');
    var input_td_university = document.createElement('td');
    var input_university = document.createElement('input');study_level

    var itm = document.getElementById('study_level')
    var label_td_study_level = document.createElement('td');
    var label_study_level = document.createElement('label');
    var select_td_study_level = document.createElement('td');
    var select_study_level = itm.cloneNode(true);

    var label_td_studies_title = document.createElement('td');
    var label_studies_title = document.createElement('label');
    var input_td_studies_title = document.createElement('td');
    var input_studies_title = document.createElement('input');
    
    var label_td_university_year = document.createElement('td');
    var label_university_year = document.createElement('label');
    var input_td_university_year = document.createElement('td');
    var input_university_year = document.createElement('input');

    university =  'university' + universities.toString();
    university_inner = 'University ' + universities.toString();
    
    title.innerHTML = university_inner;

    label_university.innerHTML = university_inner;
    label_university.for = university;
    input_university.type = 'text';
    input_university.maxlength = 40
    input_university.id = university;
    input_university.name = university;
    input_university.placeholder = university_inner;

    study_level = 'study_level' + universities.toString();
    study_level_inner = 'Study level:';

    label_study_level.for = study_level;
    label_study_level.innerHTML = study_level_inner;
    select_study_level.id = study_level;
    
    studies_title =  'studies_title' + universities.toString();
    studies_title_inner = 'Title:';

    label_studies_title.innerHTML = studies_title_inner;
    label_studies_title.for = studies_title;
    input_studies_title.type = 'text';
    input_studies_title.maxlength = 40;
    input_studies_title.id = studies_title;
    input_studies_title.name = studies_title;
    input_studies_title.placeholder = studies_title_inner;
    
    university_year =  'uni_graduation' + universities.toString();
    university_year_inner = 'Graduation year:';
    
    label_university_year.innerHTML = university_year_inner;
    label_university_year.for = university_year;
    input_university_year.type = 'text';
    input_university_year.maxlength = 4;
    input_university_year.id = university_year;
    input_university_year.name = university_year;
    input_university_year.placeholder = university_year_inner;

    label_td_university.appendChild(label_university);
    input_td_university.appendChild(input_university);

    label_td_study_level.appendChild(label_study_level);
    select_td_study_level.appendChild(select_study_level);

    label_td_university_year.appendChild(label_university_year);
    input_td_university_year.appendChild(input_university_year);
    
    label_td_studies_title.appendChild(label_studies_title);
    input_td_studies_title.appendChild(input_studies_title);

    row0.appendChild(title);

    row1.appendChild(label_td_university);
    row1.appendChild(input_td_university);

    row1.appendChild(label_td_study_level);
    row1.appendChild(select_td_study_level);

    row2.appendChild(label_td_studies_title);
    row2.appendChild(input_td_studies_title);
    
    row2.appendChild(label_td_university_year);
    row2.appendChild(input_td_university_year);

    element.parentNode.parentNode.before(row0);
    element.parentNode.parentNode.before(row1);
    element.parentNode.parentNode.before(row2);

    if (universities >= 5) element.setAttribute("hidden", true);

}

{/* <tr>
    <td><label for="university">University:</label></td>
    <td><input type="text" id="university" name="university" maxlength=40 placeholder="TalTech" value=<?php echo ($from_file->university)->name;?>></td>
    <td><label for="study_level">Study level:</label></td>
    <td>
        <select id="study_level" name="study_level" value=<?php echo ($from_file->university)->study_level;?>>
            <option value="bachelor">Bachelor</option>
            <option value="master">Master</option>
            <option value="doctorate">Doctorate</option>
            <option value="post-doctorate">Post-doctorate</option>
        </select>
    </td>
</tr>
<tr>
    <td><label for="studies_title">Title:</label></td>
    <td><input type="text" id="studies_title" name="studies_title" maxlength=40 placeholder="Informatics" value=<?php echo ($from_file->university)->studies_title;?>></td>
    <td><label for="uni_graduation">Graduation:</label></td>
    <td><input type="text" id="uni_graduation" name="uni_graduation" maxlength=4 max=2021 placeholder="2009" value=<?php echo ($from_file->university)->uni_graduation;?>>
    </td>
</tr> */}

function addWorkplace(element){}

{/* <tr>
    <td><label for="workplace">Work place</label></td>
    <td><input type="text" id="workplace" name="workplace" maxlength=40 placeholder="ABB" value=<?php echo ($from_file->workplace)->name;?>></td>
    <td><label for="position">Position:</label></td>
    <td><input type="text" id="position" name="position" maxlength=40 placeholder="Testing engineer" value=<?php echo ($from_file->workplace)->position;?>></td>
</tr>
<tr>
    <td><label for="time_start">Started</label></td>
    <td><input type="text" id="time_start" name="time_start" placeholder="June 2010" value=<?php echo ($from_file->workplace)->time_start;?>></td>
    <td><label for="time_finish">Finished</label></td>
    <td><input type="text" id="time_finish" name="time_finish" placeholder="Currently working" value=<?php echo ($from_file->workplace)->time_finish;?>></td>
</tr>
<tr>
    <td colspan="2"><label for="job_description">Job description:</label></td>
    <td colspan="2"><input type="button" id="ask_feedback" value="Ask feedback from collegues" onclick="window.location='feedback.php';"></td>
</tr>
<tr>
    <td colspan="4"><textarea name="job_description" id="job_description" maxlength=200 placeholder="Testing stuff" cols="70" rows="5"><?php echo ($from_file->workplace)->job_description;?></textarea></td>
</tr> */}