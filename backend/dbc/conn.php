<?php
if (basename(__FILE__) == basename($_SERVER["SCRIPT_FILENAME"])) {
    header("location: ../../index.php?illegal-activities");
    exit();
}
class Conn {
    protected $servername = "localhost";
    protected $username = "root";
    protected $password = "";
    protected $dbname = "book";
    protected function connect() {
        $conn = mysqli_connect($this->servername, $this->username, $this->password, $this->dbname);
    
        if (!$conn) {
            die("Verbindung misslungen: " . mysqli_connect_error());
        }
    
        return $conn;
    }
}