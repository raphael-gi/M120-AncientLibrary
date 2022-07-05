<?php
if (basename(__FILE__) == basename($_SERVER["SCRIPT_FILENAME"])) {
    header("location: ../../index.php?illegal-activities");
    exit();
}
include("../../backend/view/booklist.view.php");
include("../../backend/view/categories.view.php");
$categories = new Categories;

if (isset($_POST["searchb"]) && isset($_POST["page"])) {
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

$ord = "buecher.id";
$ser = "%";
$cat = "%";
$w = "asc";
$kata = "%";

if (isset($_GET["ord"])){
    if ($_GET["ord"] == "nummer" || $_GET["ord"] == "kurztitle" || $_GET["ord"] == "autor" || $_GET["ord"] == "kategorie" || $_GET["ord"] == "katalog"){
        $ord = $_GET["ord"];
        if ($ord == "kategorie"){
          $ord = "kategorien." . $ord;
        }
    }
}
if (isset($_POST["ser"])){
    $ser = '%' . $_POST["ser"] . '%';
}
if (isset($_POST["cat"])){
    $cat = $_POST["cat"];
}
if (isset($_GET["w"])){
    if ($_GET["w"] == "desc"){
        $w = "desc";
    }
}
if (isset($_POST["kata"])){
    if ($_POST["kata"] != ""){
      $kata = $_POST["kata"];
    }
}