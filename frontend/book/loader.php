<?php
session_start();
header("refresh:3; random.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="../../style.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loading...</title>
    <link rel="icon" href="../media/logo.png">
</head>
<body>
    <div id="loadall">
        <div id="wrapbord">
            <p id="loadtext">Random Buch wird geladen...</p>
            <br>
            <div id="bord"></div>
        </div>
    </div>
</body>
</html>