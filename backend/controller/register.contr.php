<?php
include("../model/login.model.php");
class LoginContr extends LoginModel {
    private function send($msg){
        header("location: ../../frontend/login/register.php?error=" . $msg);
        exit();
    }
    function reg(){
        if (isset($_POST["subm"])){
            $username = $_POST["usname"];
            $fname = $_POST["fname"];
            $lname = $_POST["lname"];
            $email = $_POST["email"];
            $pword = $_POST["pword"];

            //Error Handling
            if (empty($username) || empty($fname) || empty($lname) || empty($email) || empty($pword)){
                $this->send("empty");
            }
            if (strlen($username) > 45){
                $this->send("username_long");
            }
            if (strlen($fname) >  100){
                $this->send("fname_long");
            }
            if (strlen($lname) >  100){
                $this->send("lname_long");
            }
            if (strlen($email) >  255){
                $this->send("email_long");
            }
            if (strlen($pword) >  255){
                $this->send("pword_long");
            }
            $results = $this->check($username, $email);

            if ($results->num_rows !== 0){
                $this->send("benutzt");
            }
            
            $phash = password_hash($pword, PASSWORD_DEFAULT);
            $this->register($username, $lname, $fname, $phash, $email);
            header("location: ../../frontend/login/login.php?Erstellt");
            exit();
        }
        else {
            header("location: ../index.php");
            exit();
        }
    }
}

$start = new LoginContr();
$start->reg();