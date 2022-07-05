<?php
include("../model/login.model.php");
class LoginContr extends LoginModel {
    function send($msg){
        header("location: ../../frontend/login/login.php?error=" . $msg);
        exit();
    }
    function log(){
        if (isset($_POST["subm"])){
            $name = $_POST["usname"];
            $pas = $_POST["pword"];
        
            //Error Handling
            if (empty($name) || empty($pas)){
                $this->send("empt");
            }
            //Model wird aufgerufen
            $results = $this->login($name, $name);

            if ($results->num_rows === 0){
                $this->send("nfound");
            }
            //Passwort wird überprüft
            $arr = $results->fetch_array(MYSQLI_ASSOC);
            $hashpas = $arr["passwort"];
            $verify_password = password_verify($pas, $hashpas);
        
            if($verify_password === FALSE){
                $this->send("fpas");
            }
            //Session wird gestartet und variabeln deklariert
            session_start();
            $_SESSION["Admin"] = $arr["admin"];
            $_SESSION["ID"] = $arr["ID"];
            $_SESSION["benutzername"] = $arr["benutzername"];
            header("location: ../../index.php?Eingelogged");
            exit();
        }
        else {
            header("location: ../index.php");
            exit();
        }
    }
}

$start = new LoginContr();
$start->log();