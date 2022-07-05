<?php
include("../model/kunde.model.php");
class Edit extends KundeModel {
    private function send($msg, $id){
        header("location: ../../frontend/kunde/kundedit.php?id=" . $id . "&error=" . $msg);
        exit();
    }
    public function edit(){
        if (isset($_POST["kundesub"])){
            $vorname = $_POST["vorname"];
            $name = $_POST["name"];
            $email = $_POST["email"];
            $geburtstag = $_POST["geburtstag"];
            $gender = $_POST["gend"];
            $kundeseit = $_POST["kundeseit"];
            $kontaktpermail = 0;
            if (isset($_POST["kontaktpermail"])){
                $kontaktpermail = $_POST["kontaktpermail"];
            }
            $id = $_POST["id"];

            if (empty($vorname) || empty($name) || empty($email) || empty($geburtstag) || empty($gender) || empty($kundeseit)){
                $this->send("empt", $id);
            }
            if (strlen($vorname) > 50){
                $this->send("vlong", $id);
            }
            if (strlen($name) >  50){
                $this->send("nlong", $id);
            }
            if (strlen($email) >  150){
                $this->send("elong", $id);
            }
            
            $this->editcontr($vorname, $name, $email, $geburtstag, $gender, $kundeseit, $kontaktpermail, $id);
            
            header("location: ../../frontend/kunde/kundenlist.php?bearbeitet");
            exit();
        }
        else {
            header("location: ../../index.php?illegal-activities");
            exit();
        }
    }
}

$start = new Edit;
$start->edit();