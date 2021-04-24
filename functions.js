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