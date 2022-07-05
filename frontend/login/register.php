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
    <title>Registrierung</title>
    <!-- BOOTSTRAP 5-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../../style.css">
</head>
<body>
    <div class="cen">
        <h1>Registrierung</h1>
        <form class="input-group" action="../../backend/controller/register.contr.php" method="POST">
            <div class="wlinp">
                <i class="bi bi-pen-fill"></i>
                <input class="linput" type="text" name="usname" placeholder="Benutzername" maxlength="45" required>
            </div>
            <div class="wlinp">
                <i class="bi bi-pen-fill"></i>
                <input class="linput" type="text" name="fname" placeholder="Vorname" maxlength="100" required>
            </div>
            <div class="wlinp">
                <i class="bi bi-pen-fill"></i>
                <input class="linput" type="text" name="lname" placeholder="Nachname" maxlength="100" required>
            </div>
            <div class="wlinp">
                <i class="bi bi-envelope"></i>
                <input class="linput" type="email" name="email" placeholder="Email" maxlength="255" required>
            </div>
            <div class="wlinp">
                <i class="bi bi-file-lock2-fill"></i>
                <input class="linput" type="password" name="pword" placeholder="Passwort" maxlength="255" required>
            </div>
            <input id="ressub" class="btn btn-primary" name="subm" type="submit" value="Registrieren">
        </form>
        <p class="stext">Bereits angemeldet? Hier <a class="sltext" href="login.php">Einloggen</a></p>
        <a class="sltext" href="../../index.php">Startseite</a>
    </div>
</body>
</html>