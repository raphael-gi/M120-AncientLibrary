<?php
include("../model/kunde.model.php");
class Delete extends KundeModel {
    public function del(){
        $id = $_GET["id"];
        $this->delete($id);

        header("location: ../../frontend/kunde/kundenlist.php?Deleted");
        exit();
    }
}

$start = new Delete;
$start->del();