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

function init(){
    sessionStorage.clear();
    var cookies = document.cookie;

    for (var i = 0; i < cookies.split(";").length; ++i)
    {
        var myCookie = cookies[i];
        var pos = myCookie.indexOf("=");
        var name = pos > -1 ? myCookie.substr(0, pos) : myCookie;
        document.cookie = name + "=;expires=Thu, 01 Jan 1970 00:00:00 GMT";
    }
}

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
    var input_university = document.createElement('input');

    var itm = document.getElementById('study_level');
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

function addWorkplace(element){
    var workplaces = sessionStorage.getItem('workplaces');
    if (workplaces == null){
        workplaces = 2;
        sessionStorage.setItem('workplaces', workplaces);
    } else {
        workplaces = parseInt(workplaces) + 1;
        sessionStorage.setItem('workplaces', workplaces);
    }
    
    var row0 = document.createElement('tr');
    var row1 = document.createElement('tr');
    var row2 = document.createElement('tr');
    var row3 = document.createElement('tr');
    var row4 = document.createElement('tr');

    var title = document.createElement('h3');

    var label_td_workplace = document.createElement('td');
    var label_workplace = document.createElement('label');
    var input_td_workplace = document.createElement('td');
    var input_workplace = document.createElement('input');

    var label_td_position = document.createElement('td');
    var label_position = document.createElement('label');
    var input_td_position = document.createElement('td');
    var input_position = document.createElement('input');
    
    var label_td_workplace_year_start = document.createElement('td');
    var label_workplace_year_start = document.createElement('label');
    var input_td_workplace_year_start = document.createElement('td');
    var input_workplace_year_start = document.createElement('input');
    
    var label_td_workplace_year_finish = document.createElement('td');
    var label_workplace_year_finish = document.createElement('label');
    var input_td_workplace_year_finish = document.createElement('td');
    var input_workplace_year_finish = document.createElement('input');

    var itm = document.getElementById('ask_feedback');
    var label_td_jod_description = document.createElement('td');
    var label_jod_description = document.createElement('label');
    var td_feedback_button = document.createElement('td');
    var button_feedback = itm.cloneNode(true);

    var itm2 = document.getElementById('job_description');
    var input_td_jod_description = document.createElement('td');
    var input_jod_description = itm2.cloneNode(true);

    workplace =  'workplace' + workplaces.toString();
    workplace_inner = 'Workplace ' + workplaces.toString();
    
    title.innerHTML = workplace_inner;

    label_workplace.innerHTML = workplace_inner;
    label_workplace.for = workplace;
    input_workplace.type = 'text';
    input_workplace.maxlength = 40
    input_workplace.id = workplace;
    input_workplace.name = workplace;
    input_workplace.placeholder = workplace_inner;

    position = 'position' + workplaces.toString();
    position_inner = 'Study level:';

    label_position.for = position;
    label_position.innerHTML = position_inner;
    input_position.id = position;
    
    workplace_year_start =  'time_start' + workplaces.toString();
    workplace_year_inner_start = 'Started:';
    
    label_workplace_year_start.innerHTML = workplace_year_inner_start;
    label_workplace_year_start.for = workplace_year_start;
    input_workplace_year_start.type = 'text';
    input_workplace_year_start.maxlength = 4;
    input_workplace_year_start.id = workplace_year_start;
    input_workplace_year_start.name = workplace_year_start;
    input_workplace_year_start.placeholder = workplace_year_inner_start;
    
    workplace_year_finish =  'time_finish' + workplaces.toString();
    workplace_year_inner_finish = 'Finished:';
    
    label_workplace_year_finish.innerHTML = workplace_year_inner_finish;
    label_workplace_year_finish.for = workplace_year_finish;
    input_workplace_year_finish.type = 'text';
    input_workplace_year_finish.maxlength = 4;
    input_workplace_year_finish.id = workplace_year_finish;
    input_workplace_year_finish.name = workplace_year_finish;
    input_workplace_year_finish.placeholder = workplace_year_inner_finish;

    
    jod_description =  'jod_description' + workplaces.toString();
    jod_description_inner = 'Job description:';

    label_td_jod_description.colSpan = 2;
    td_feedback_button.colSpan = 2;

    label_jod_description.innerHTML = jod_description_inner;
    label_jod_description.for = jod_description;

    input_td_jod_description.colSpan = 4;

    input_jod_description.id = jod_description;
    input_jod_description.name = jod_description;
    input_jod_description.placeholder = jod_description_inner;

    label_td_workplace.appendChild(label_workplace);
    input_td_workplace.appendChild(input_workplace);

    label_td_position.appendChild(label_position);
    input_td_position.appendChild(input_position);

    label_td_workplace_year_start.appendChild(label_workplace_year_start);
    input_td_workplace_year_start.appendChild(input_workplace_year_start);
    
    label_td_workplace_year_finish.appendChild(label_workplace_year_finish);
    input_td_workplace_year_finish.appendChild(input_workplace_year_finish);
    
    label_td_jod_description.appendChild(label_jod_description);
    td_feedback_button.appendChild(button_feedback);
    input_td_jod_description.appendChild(input_jod_description);


    row0.appendChild(title);

    row1.appendChild(label_td_workplace);
    row1.appendChild(input_td_workplace);

    row1.appendChild(label_td_position);
    row1.appendChild(input_td_position);

    row2.appendChild(label_td_workplace_year_start);
    row2.appendChild(input_td_workplace_year_start);

    row2.appendChild(label_td_workplace_year_finish);
    row2.appendChild(input_td_workplace_year_finish);

    row3.appendChild(label_td_jod_description);
    row3.appendChild(td_feedback_button);

    row4.appendChild(input_td_jod_description);

    element.parentNode.parentNode.before(row0);
    element.parentNode.parentNode.before(row1);
    element.parentNode.parentNode.before(row2);
    element.parentNode.parentNode.before(row3);
    element.parentNode.parentNode.before(row4);

    if (workplaces >= 20) element.setAttribute("hidden", true);
}