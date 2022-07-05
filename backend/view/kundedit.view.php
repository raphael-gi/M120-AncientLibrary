<?php
if (basename(__FILE__) == basename($_SERVER["SCRIPT_FILENAME"])) {
    header("location: ../../index.php?illegal-activities");
    exit();
}
include("../../backend/model/kunde.model.php");
class User extends KundeModel {
    public $vorname;
    public $name;
    public $email;
    public $geburtstag;
    public $geschlecht;
    public $kundeseit;
    public $kontaktpermail;

    public function showUser($id){
        $result = $this->editview($id);
        if ($result == NULL) {
            return FALSE;
            exit();
        }
        $this->vorname = $result["vorname"];
        $this->name = $result["name"];
        $this->email = $result["email"];
        $this->geburtstag = $result["geburtstag"];
        $this->geschlecht = $result["geschlecht"];
        $this->kundeseit = $result["kunde_seit"];
        $this->kontaktpermail = $result["kontaktpermail"];
        return TRUE;
    }
}