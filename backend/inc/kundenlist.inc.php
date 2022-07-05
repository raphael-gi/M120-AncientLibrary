<?php
if (basename(__FILE__) == basename($_SERVER["SCRIPT_FILENAME"])) {
    header("location: ../../index.php?illegal-activities");
    exit();
}
include("../../backend/view/kundenlist.view.php");

if (isset($_POST["searchb"]) && isset($_POST["page"])){
    $page = $_POST["page"];
}
if (isset($_POST["back"])){
    $page = "0";
    if ($_POST["page"] > 1){
        $page = (int)$_POST["page"] - 1;
    }
}
if (isset($_POST["forth"])){
    $page = (int)$_POST["page"] + 1;
}
if (!isset($_POST["page"])){
    $page = "0";
}
function icon($name){
    $ech = "down";
    if (isset($_GET["ord"])){
        if (($_GET["ord"]) == $name && !isset($_GET["w"])){
            $ech = "up";
        }
    }
    echo $ech;
}
function desc($name){
    if (isset($_GET["ord"]) && !isset($_GET["w"])){
        if (($_GET["ord"]) == $name){
            echo "&w=desc";
        }
    }
}
function nback() {
    ?>
    <script>
        var b = document.getElementById("back");
        b.setAttribute("disabled", "");
        b.style.backgroundColor = "rgb(34, 25, 25)";
    </script>
    <?php
}
function nfurther() {
    ?>
    <script>
        var b = document.getElementById("forth");
        b.setAttribute("disabled", "");
        b.style.backgroundColor = "rgb(34, 25, 25)";
    </script>
  <?php
}

$ord = "kid";
$ser = "%";
$gend = "%";
$contact = "%";
$w = "asc";

if (isset($_GET["ord"])){
    if ($_GET["ord"] == "vorname" || $_GET["ord"] == "name" || $_GET["ord"] == "email" || $_GET["ord"] == "geburtstag" || $_GET["ord"] == "geschlecht" || $_GET["ord"] == "kunde_seit" || $_GET["ord"] == "kontaktpermail"){
        $ord = $_GET["ord"];
    }
}
if (isset($_POST["ser"])){
    $ser = '%' . $_POST["ser"] . '%';
}
if (isset($_POST["gend"]) && count($_POST["gend"]) == 1){
    $gend = $_POST["gend"];
    $gend = $gend[0];
}
if (isset($_POST["contact"])){
    $contact = $_POST["contact"];
}
if (isset($_GET["w"])){
    if ($_GET["w"] == "desc"){
        $w = "desc";
    }
}
