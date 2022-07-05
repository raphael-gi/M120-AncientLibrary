<?php
session_start();
include("../model/login.model.php");
class LoginContr extends LoginModel {
    function send($msg){
        header("location: ../../frontend/login/reset.php?error=" . $msg);
        exit();
    }
    function log(){
        if (isset($_POST["subm"])){
            $id = $_SESSION["ID"];
            $apword = $_POST["apword"];
            $pword = $_POST["pword"];
            $wpword = $_POST["wpword"];
        
            //Error Handling
            if (empty($apword) || empty($pword) || empty($wpword)){
                $this->send("empt");
            }
            if ($pword != $wpword){
                $this->send("nsame");
            }
            if (strlen($pword) > 255){
                $this->send("long");
            }

            $oldpas = $this->oldpword($id);
            $verify_password = password_verify($apword, $oldpas);

            if ($verify_password === FALSE){
                $this->send("fpas");
                exit();
            }
            
            $phash = password_hash($pword, PASSWORD_DEFAULT);
            $this->reset($phash);

            //Zurückgeschickt
            header("location: ../../index.php?Geändert");
            exit();
        }
        else {
            header("location: ../../index.php");
            exit();
        }
    }
}

$start = new LoginContr();
$start->log();