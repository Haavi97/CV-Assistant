<?php
class User{
    public $firstname;
    public $lastname;
    public $nationality;
    public $sex;
    public $hschool;
    public $hschool_year;
    public $email;
    public $phone;
    public $date;

    function set_firstname($data){
        $this->firstname = $data;
    }
    function set_lastname($data){
        $this->lastname = $data;
    }
    function set_nationality($data){
        $this->nationality = $data;
    }
    function set_sex($data){
        $this->sex = $data;
    }
    function set_hschool($data){
        $this->hschool = $data;
    }
    function set_hschool_year($data){
        $this->hschool_yea = $data;
    }
    function set_email($data){
        $this->email = $data;
    }
    function set_phone($data){
        $this->phone = $data;
    }
    function set_date($data){
        $this->lastname = $data;
    }
    
    function get_firstname($data){
        return $this->firstname;
    }
    function get_lastname($data){
        return $this->lastname;
    }
    function get_nationality($data){
        return $this->nationality;
    }
    function get_sex($data){
        return $this->sex;
    }
    function get_hschool($data){
        return $this->hschool;
    }
    function get_hschool_year($data){
        return $this->hschool_yea;
    }
    function get_email($data){
        return $this->email;
    }
    function get_phone($data){
        return $this->phone;
    }
    function get_date($data){
        return $this->lastname;
    }
}

?>