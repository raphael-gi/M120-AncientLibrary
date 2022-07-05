<?php
if (basename(__FILE__) == basename($_SERVER["SCRIPT_FILENAME"])) {
    header("location: ../../index.php?illegal-activities");
    exit();
}
require_once("../../backend/dbc/conn.php");
class BookModel extends Conn {
    protected function getBook($id) {
        $sql = "SELECT * FROM buecher, kategorien, zustaende, benutzer WHERE buecher.zustand = zustaende.zustand AND buecher.kategorie = kategorien.id AND buecher.zustand = zustaende.zustand AND buecher.id = ?";
        $conn = $this->connect();
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();

        $results = $stmt->get_result();
        $results = $results->fetch_array(MYSQLI_ASSOC);

        return $results;
    }

    protected function getRandom() {
        $sql = "SELECT * FROM buecher, kategorien, zustaende, benutzer WHERE buecher.zustand = zustaende.zustand AND buecher.kategorie = kategorien.id AND buecher.zustand = zustaende.zustand ORDER BY RAND() LIMIT 1 ";
        $conn = $this->connect();
        $stmt = $conn->prepare($sql);
        $stmt->execute();

        $results = $stmt->get_result();
        $results = $results->fetch_array(MYSQLI_ASSOC);

        return $results;
    }

    protected function books($order, $searched, $categorie, $w, $kata, $page) {
        $sql = "SELECT nummer, kurztitle, autor, kategorien.kategorie, buecher.id, buecher.katalog FROM buecher, kategorien WHERE buecher.kategorie = kategorien.id AND kategorien.kategorie LIKE ? AND buecher.kurztitle LIKE ? AND $order != '' AND katalog LIKE ? ORDER BY $order $w LIMIT ?, 20";
        $conn = $this->connect();
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssi", $categorie, $searched, $kata, $page);
        $stmt->execute();
        
        $results = $stmt->get_result();

        return $results;
    }

    protected function delete($id) {
        $sql = "DELETE FROM buecher WHERE id = ?";
        $conn = $this->connect();
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
    }

    protected function cats() {
        $sql = "SELECT kategorie FROM kategorien";
        $conn = $this->connect();
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        
        $results = $stmt->get_result();
        
        return $results;
    }
}