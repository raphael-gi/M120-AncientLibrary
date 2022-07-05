<?php
session_start();

if (!isset($_SESSION["Admin"])) {
    header("location: ../../index.php?illegal-activities");
    exit();
}
include("../../backend/inc/kundenlist.inc.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kundenliste</title>
    <link rel="icon" href="../../media/logo.png">
    <!-- BOOTSTRAP 5-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../../style.css">
</head>
<body>
    <?php
    include("../header.php");
    ?>
    <form id="filter" action='kundenlist.php<?php if(isset($_GET["ord"])){echo "?ord=" . $_GET["ord"];} ?>' method="POST">
    <div id="wrapform">
        <div id="inpts">
            <input type="search" placeholder="Suchen" name="ser" id="ksearch" <?php if(isset($_POST["ser"])){echo "value='" . $_POST["ser"] . "'";} ?>>
            <div class="wrapchecks">
                <label class="radlab" for="">Geschlecht:</label>
                <label for="gendm">M</label>
                <input class="radrad" type="checkbox" name="gend[]" value="M" <?php if(isset($_POST["gend"]) && in_array("M", $_POST["gend"])){echo "checked";} ?>>
                <label for="gendm">F</label>
                <input class="radrad" id="radradb" type="checkbox" name="gend[]" value="F" <?php if(isset($_POST["gend"]) && in_array("F", $_POST["gend"])){echo "checked";} ?>>
            </div>
            <div class="wrapchecks">
                <label for="">Kontakt Per Mail:</label>
                <input class="contactcheck" type="checkbox" name="contact" value="1" <?php if(isset($_POST["contact"])){echo "checked";} ?>>
            </div>
            <input type="submit" class="button" name="searchb" value="Suchen">
        </div>
        <div id="skips">
            <input type="hidden" name="page" value="<?php echo $page ?>">
            <input class="skipb" id="back" type="submit" name="back" value="←">
            <label id="skiptext">Seite <?php echo ($page + 1) ?></label>
            <input class="skipb" id="forth" type="submit" name="forth" value="→">
        </div>
    </div>
    </form>
    <div id="wrap">
        <table class="table">
            <thead>
              <tr>
                <th><a class="lord" href="kundenlist.php?ord=vorname<?php desc("vorname") ?>">Vorname<i class="lord bi bi-arrow-<?php icon("vorname") ?>"></i></a></th>
                <th><a class="lord" href="kundenlist.php?ord=name<?php desc("name") ?>">Name <i class="lord bi bi-arrow-<?php icon("name") ?>"></i></a></th>
                <th><a class="lord" href="kundenlist.php?ord=email<?php desc("email") ?>">Email <i class="lord bi bi-arrow-<?php icon("email") ?>"></i></a></th>
                <th><a class="lord" href="kundenlist.php?ord=geburtstag<?php desc("geburtstag") ?>">Geburtstag <i class="lord bi bi-arrow-<?php icon("geburtstag") ?>"></i></a></th>
                <th><a class="lord" href="kundenlist.php?ord=geschlecht<?php desc("geschlecht") ?>">Geschlecht <i class="lord bi bi-arrow-<?php icon("geschlecht") ?>"></i></a></th>
                <th><a class="lord" href="kundenlist.php?ord=kunde_seit<?php desc("kunde_seit") ?>">Kunde Seit <i class="lord bi bi-arrow-<?php icon("kunde_seit") ?>"></i></a></th>
                <th><a class="lord" href="kundenlist.php?ord=kontaktpermail<?php desc("kontaktpermail") ?>">Kontakt Per Mail <i class="lord bi bi-arrow-<?php icon("kontaktpermail") ?>"></i></a></th>
                <th>Bearbeiten</th>
                <th>Löschen</th>
              </tr>
            </thead>
            <tbody>
                <?php
                if (isset($_POST["page"])){
                    $page = $page * 20;
                }
                $kundenlist = new Kundenlist;
                $results = $kundenlist->showList($ord, $gend, $contact, $ser, $w ,$page);
                ?>
            </tbody>
        </table>
    </div>
    <?php
    if ($results == NULL){
        echo "<p id='empt'>Hier gibt es nichts zu sehen!</p>";
        nfurther();
    }
    ?>
    <?php
    if($page == 0) {
        nback();
    }
    include("../footer.php");
    ?>
</body>
</html>