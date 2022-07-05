<?php
if (basename(__FILE__) == basename($_SERVER["SCRIPT_FILENAME"])) {
    header("location: ../../index.php?illegal-activities");
    exit();
}
include("../../backend/dbc/conn.php");
class KundeModel extends Conn {
    protected function list($ord, $gend, $check, $search, $w, $page) {
        $sql = "SELECT * FROM kunden WHERE geschlecht LIKE ? AND kontaktpermail LIKE ? AND (vorname LIKE ? OR name LIKE ? OR email LIKE ?) ORDER BY $ord $w LIMIT ? , 20";
        $conn = $this->connect();
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssssi", $gend, $check, $search, $search, $search, $page);
        $stmt->execute();
        
        $results = $stmt->get_result();
        
        return $results;
    }

    protected function delete($id) {
        $sql = "DELETE FROM kunden WHERE kid = ?";
        $conn = $this->connect();
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
    }

    protected function editview($id) {
        $sql = "SELECT * FROM kunden WHERE kid = ?";
        $conn = $this->connect();
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        
        $results = $stmt->get_result();
        $result = $results->fetch_array(MYSQLI_ASSOC);

        return $result;
    }

    protected function editcontr($vorname, $name, $email, $geburtstag, $gender, $kundeseit, $kontaktpermail, $id) {
        $sql = "UPDATE kunden SET vorname = ?, name = ?, email = ?, geburtstag = ?, geschlecht = ?, kunde_seit = ?, kontaktpermail = ? WHERE kid = ?";
        $conn = $this->connect();
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssssssii", $vorname, $name, $email, $geburtstag, $gender, $kundeseit, $kontaktpermail, $id);
        $stmt->execute();
    }
}