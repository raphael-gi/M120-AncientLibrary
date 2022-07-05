<?php
session_start();
if (isset($_SESSION["ID"])) {
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
    <title>Login</title>
    <!-- BOOTSTRAP 5-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../../style.css">
</head>
<body>
    <div class="cen">
        <h1>Login</h1>
        <form class="input-group" action="../../backend/controller/login.contr.php" method="POST">
            <div class="wlinp">
                <i class="bi bi-pen-fill"></i>
                <input class="linput" type="text" name="usname" placeholder="Benutzername" maxlength="45" required>
            </div>
            <div class="wlinp">
                <i class="bi bi-file-lock2-fill"></i>
                <input class="linput" type="password" name="pword" placeholder="Passwort" maxlength="255" required>
            </div>
            <input class="btn btn-primary" id="ressub" type="submit" name="subm" value="Login">
        </form>
        <p class="stext">Noch nicht angemeldet? Hier <a class="sltext" href="register.php">Registrieren</a></p>
        <a class="sltext" href="../../index.php">Startseite</a>
    </div>
    <?php
    function pop($get, $message) {
        if ($_GET["error"] == $get){
            echo '<script>alert("' . $message . '");</script>';
        }
    }
    if (isset($_GET["error"])){
        pop("empt", "Bitte alle Felder ausfüllen!");
        pop("nfound", "Benutzername wurde nicht gefunden!");
        pop("fpas", "Passwort ist falsch!");
    }
    ?>
</body>
</html>