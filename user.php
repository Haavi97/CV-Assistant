<?php

function sanitize($var){
    $var = stripslashes($var);
    $var = htmlentities($var);
    $var = strip_tags($var);
    return $var;
}

function sanitize_input_sql($link, $var){
    $var = mysqli_real_escape_string($link, $var);
    return $var;
}

class University{
    // University
    public $name;
    public $study_level;
    public $studies_title;
    public $uni_graduation;

    // SETTERS
    function set_name($data){
        $data = sanitize($data);
        $this->name = preg_replace("#[^(\p{L}| )]#", null, $data);
    }
    function set_study_level($data){
        $data = sanitize($data);
        $this->study_level = preg_replace("#[^\p{L}]#", null, $data);
        if (!($this->study_level === "bachelor" | $this->study_level === "master" | $this->study_level === "doctorate" | $this->study_level === "post-doctorate")){
            $this->study_level = null;
        }
    }
    function set_studies_title($data){
        $data = sanitize($data);
        $this->studies_title = preg_replace("#[^\p{L}]#", null, $data);
    }
    function set_uni_graduation($data){
        $data = sanitize($data);
        $this->uni_graduation = intval(preg_replace("#[^\d]#", null, $data));
    }

    // GETTERS
    function get_name(){
        return $this->name;
    }
    function get_study_level(){
        return $this->study_level;
    }
    function get_studies_title(){
        return $this->studies_title;
    }
    function get_uni_graduation(){
        return $this->uni_graduation;
    }
}

class Workplace{
    public $name;
    public $position;
    public $time_start;
    public $time_finish;
    public $job_description;

    // SETTERS
    function set_name($data){
        $data = sanitize($data);
        $this->name = preg_replace("#[^(\S| )]#", null, $data);
    }
    function set_position($data){
        $data = sanitize($data);
        $this->position = preg_replace("#[^(\S| )]#", null, $data);
    }
    function set_time_start($data){
        $data = sanitize($data);
        $this->time_start = preg_replace("#[^(\S| )]#", null, $data);
    }
    function set_time_finish($data){
        $data = sanitize($data);
        $this->time_finish = preg_replace("#[^(\S| )]#", null, $data);
    }
    function set_job_description($data){
        $data = sanitize($data);
        $this->job_description = preg_replace("#[^(\S| )]#", null, $data);
    }
}

class User{
    public $firstname = "";
    public $lastname = "";
    public $nationality = "";
    public $sex = "";
    public $hschool = "";
    public $hschool_year = "";
    public $email = "";
    public $phone = "";
    public $date = "";

    // Optional parameters:
    // University
    public University $university;

    // Workplace:
    public Workplace $workplace;

    public function __construct()
    {
        $this->university = new University();
        $this->workplace = new Workplace();   
    }

    // SETTERS
    function set_firstname($data){
        $data = sanitize($data);
        $this->firstname = preg_replace("#[^(\p{L}| )]#", null, $data);
    }
    function set_lastname($data){
        $data = sanitize($data);
        $this->lastname = preg_replace("#[^\p{L}| ]#", null, $data);
    }
    function set_nationality($data){
        $data = sanitize($data);
        $this->nationality = preg_replace("#[^\p{L}]#", null, $data);
    }
    function set_sex($data){
        $data = sanitize($data);
        $this->sex = preg_replace("#[^\w]#", null, $data);
    }
    function set_hschool($data){
        $data = sanitize($data);
        $this->hschool = preg_replace("#[^\p{L}]#", null, $data);
    }
    function set_hschool_year($data){
        $data = sanitize($data);
        $this->hschool_year = intval(preg_replace("#[^\d]#", null, $data));
    }
    function set_email($data){
        $data = sanitize($data);
        $this->email = filter_var($data, FILTER_VALIDATE_EMAIL);
    }
    function set_phone($data){
        $data = sanitize($data);
        $this->phone = preg_replace("#[^(\+?\d+)]#", null, $data);
    }
    function set_date($data){
        $this->date = $data;
    }
    
    // GETTERS
    function get_firstname(){
        return $this->firstname;
    }
    function get_lastname(){
        return $this->lastname;
    }
    function get_nationality(){
        return $this->nationality;
    }
    function get_sex(){
        return $this->sex;
    }
    function get_hschool(){
        return $this->hschool;
    }
    function get_hschool_year(){
        return $this->hschool_year;
    }
    function get_email(){
        return $this->email;
    }
    function get_phone(){
        return $this->phone;
    }
    function get_date(){
        return $this->date;
    }
}

class NewUser{
    public $username = "";
    public $pswd = "";
    public $pswd_repeat = "";
    public $email = "";

    // SETTERS
    function set_username($link, $data){
        $data = sanitize_input_sql($link, $data);
        $this->username = preg_replace("#[^(\p{L})]#", null, $data);
    }
    function set_pswd($link, $data){
        $data = sanitize_input_sql($link, $data);
        $this->pswd = preg_replace("#[^\S]#", null, $data);
    }
    function set_pswd_repeat($link, $data){
        $data = sanitize_input_sql($link, $data);
        $this->pswd_repeat = preg_replace("#[^\S]#", null, $data);
    }
    function set_email($link, $data){
        $data = sanitize($data);
        $this->email = filter_var($data, FILTER_VALIDATE_EMAIL);
    }
    
    // GETTERS
    function get_username(){
        return $this->username;
    }
    function get_pswd(){
        return $this->pswd;
    }
    function get_pswd_repeat(){
        return $this->pswd_repeat;
    }
    function get_email(){
        return $this->email;
    }
}

?>