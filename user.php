<?php
class University{
    // University
    public $name;
    public $study_level;
    public $studies_title;
    public $uni_graduation;

    // SETTERS
    function set_name($data){
        $this->name = preg_replace("#[^(\p{L}| )]#", null, $data);
    }
    function set_study_level($data){
        $this->study_level = preg_replace("#[^\p{L}]#", null, $data);
        if (!($this->study_level === "bachelor" | $this->study_level === "master" | $this->study_level === "doctorate" | $this->study_level === "post-doctorate")){
            $this->study_level = null;
        }
    }
    function set_studies_title($data){
        $this->studies_title = preg_replace("#[^\p{L}]#", null, $data);
    }
    function set_uni_graduation($data){
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
        $this->name = preg_replace("#[^(\p{L}| )]#", null, $data);
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
        $this->firstname = preg_replace("#[^(\p{L}| )]#", null, $data);
    }
    function set_lastname($data){
        $this->lastname = preg_replace("#[^\p{L}]#", null, $data);
    }
    function set_nationality($data){
        $this->nationality = preg_replace("#[^\p{L}]#", null, $data);
    }
    function set_sex($data){
        $this->sex = preg_replace("#[^\w]#", null, $data);
    }
    function set_hschool($data){
        $this->hschool = preg_replace("#[^\p{L}]#", null, $data);
    }
    function set_hschool_year($data){
        $this->hschool_year = intval(preg_replace("#[^\d]#", null, $data));
    }
    function set_email($data){
        $this->email = filter_var($data, FILTER_VALIDATE_EMAIL);
    }
    function set_phone($data){
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

?>