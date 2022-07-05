<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Passwort Reset</title>
    <!-- BOOTSTRAP 5-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../../style.css">
</head>
<body>
    <div class="cen">
        <h1 id="ltitle">Reset</h1>
        <form class="input-group" action="../../backend/controller/reset.contr.php" method="POST">
            <div class="wlinp">
                <i class="bi bi-file-lock2-fill"></i>
                <input class="linput" type="password" name="apword" placeholder="Altes Passwort" maxlength="255" required>
            </div>
            <div class="wlinp">
                <i class="bi bi-shield-lock"></i>
                <input class="linput" type="password" name="pword" placeholder="Passwort" maxlength="255" required>
            </div>
            <div class="wlinp">
                <i class="bi bi-shield-lock"></i>
                <input class="linput" type="password" name="wpword" placeholder="Passwort Wiederholen" maxlength="255" required>
            </div>
            <input class="btn btn-primary" id="ressub" type="submit" name="subm" value="Ändern">
        </form>
        <a class="sltext" href="../../index.php">Startseite</a>
    <?php
    function pop($get, $message) {
        if ($_GET["error"] == $get){
            echo '<script>alert("' . $message . '");</script>';
        }
    }
    if (isset($_GET["error"])){
        pop("empt", "Bitte alle Felder ausfüllen!");
        pop("nsame", "Passwörter sind nicht gleich!");
        pop("long", "Passwort zu lange!");
        pop("fpas", "Passwort ist falsch!");
    }
    ?>
    </div>
</body>
</html>