<?php
if (basename(__FILE__) == basename($_SERVER["SCRIPT_FILENAME"])) {
    header("location: ../../index.php?illegal-activities");
    exit();
}
require_once("../../backend/model/book.model.php");
class Categories extends BookModel {
    function showCategoreies($selected){
        $results = $this->cats();
        foreach ($results as $content){
            ?>
            <option <?php if ($content["kategorie"] == $selected){ echo "selected"; } echo ">" . $content["kategorie"] . '</option>';
        }
    }
}