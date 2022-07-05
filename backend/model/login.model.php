<?php
if (basename(__FILE__) == basename($_SERVER["SCRIPT_FILENAME"])) {
    header("location: ../../index.php?illegal-activities");
    exit();
}
include("../dbc/conn.php");
class LoginModel extends Conn{
    protected function login($benutzername) {
        $sql = 'SELECT * FROM benutzer WHERE benutzername = ? OR email = ?';
        $conn = $this->connect();
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $benutzername, $benutzername);
        $stmt->execute();
        
        $results = $stmt->get_result();
        
        return $results;
    }
    protected function check($username, $email) {
        $sql = 'SELECT * FROM benutzer WHERE benutzername = ? OR email = ?';
        $conn = $this->connect();
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $username, $email);
        $stmt->execute();
    
        $results = $stmt->get_result();
        
        return $results;
    }

    protected function register($username, $lname, $fname, $phash, $email) {
        $sql = 'INSERT INTO benutzer (benutzername, name, vorname, passwort, email, admin) VALUES (?, ?, ?, ?, ?, ?)';
        $conn = $this->connect();
        $stmt = $conn->prepare($sql);
    
        $admin = NULL;
        $stmt->bind_param("sssssi", $username, $lname, $fname, $phash, $email, $admin);
        $stmt->execute();
    }
    
    protected function oldpword($id) {
        $sql = "SELECT passwort FROM benutzer WHERE id = ?";
        $conn = $this->connect();
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();

        $results = $stmt->get_result();
        $result = $results->fetch_array(MYSQLI_ASSOC);
        $pas = $result["passwort"];

        return $pas;
    }
    protected function reset($pword) {
        $sql = "UPDATE benutzer SET passwort = ?";
        $conn = $this->connect();
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $pword);
        $stmt->execute();
    }
}