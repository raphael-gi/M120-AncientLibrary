<?php
session_start();

if (!isset($_SESSION["Admin"])) {
    header("location: ../../index.php?illegal-activities");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kunde Bearbeiten</title>
    <link rel="icon" href="../../media/logo.png">
    <!-- BOOTSTRAP 5-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../../style.css">
</head>
<body>
    <?php
    include("../header.php");
    include("../../backend/view/kundedit.view.php");
    $user = new User;
    $result = $user->showUser($_GET["id"]);
    if (!$result) {
        ?>
        <p id="rtitle">Benutzer nicht gefunden</p>
        <div id="re">
            <a href="kundenlist.php"><button class="button">Zurück</button></a>
        </div>
        <?php
        exit();
    }
    ?>
    <p id="rtitle">Benutzer Bearbeiten</p>
    <form action="../../backend/controller/kundedit.contr.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $_GET["id"] ?>">
        <div class="kwrap">
            <div id="kwraplab">
                <Label class="kundelab">Vorname:</Label>
                <Label class="kundelab">Name:</Label>
                <Label class="kundelab">Email:</Label>
                <Label class="kundelab">Geburtstag:</Label>
                <Label class="kundelab">Geschlecht:</Label>
                <Label class="kundelab">Kunde Seit:</Label>
                <Label class="kundelab">Kontakt per Mail:</Label>
            </div>
            <div id="kwrapinp">
                <input name="vorname" class="kundeinp" type="text" placeholder="Vorname" maxlength="50" required value="<?php echo $user->vorname ?>">
                <input name="name" class="kundeinp" type="text" placeholder="Name" maxlength="50" required value="<?php echo $user->name ?>">
                <input name="email" class="kundeinp" type="email" placeholder="Email" maxlength="150" required  value="<?php echo $user->email ?>">
                <input name="geburtstag" class="kundeinp" type="date" placeholder="Geburtstag" required value="<?php echo $user->geburtstag ?>">
                <div id="kundrads" class="kundeinp">
                    <label for="gend">M</label>
                    <input type="radio" name="gend" value="M" class="kundrads" <?php if ($user->geschlecht == "M"){echo 'checked="checked"';} ?>>
                    <label for="gend">F</label>
                    <input type="radio" name="gend" value="F" class="kundrads" <?php if ($user->geschlecht == "F"){echo 'checked="checked"';} ?>>
                </div>
                <input class="kundeinp" type="date" name="kundeseit" required value="<?php echo $user->kundeseit ?>">
                <div class="kundeinp">
                    <input type="checkbox" value="1" name="kontaktpermail" <?php if ($user->kontaktpermail == 1){echo "checked";} ?>>
                </div>
            </div>
        </div>
        <div id="kwrapbut">
            <input class="kundesub" type="submit" name="kundesub" value="Bearbeiten">
        </div>
    </form>
    <?php
    function pop($get, $message) {
        if ($_GET["error"] == $get){
            echo '<script>alert("' . $message . '");</script>';
        }
    }
    if (isset($_GET["error"])){
        pop("empt", "Bitte alle Felder ausfüllen!");
        pop("vlong", "Benutzername ist zu lange!");
        pop("nlong", "Name ist zu lange!");
        pop("elong", "Email ist zu lange!");
    }
    ?>
    <?php
    include("../footer.php");
    ?>
</body>
</html>