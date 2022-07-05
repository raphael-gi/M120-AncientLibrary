<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ancient Library</title>
    <link rel="icon" href="media/logo.png">
    <!-- BOOTSTRAP 5-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <a id="logo" href="index.php"><img width="100px" src="media/logo.png"></a>
        <a class="hlink" href="#cont">Weiteres</a>
        <a class="hlink" target=".blank" href="media/RaphaelDossierM120.pdf">Dossier</a>
        <a class="hlink" href="frontend/book/random.php">Random Buch</a>
        <a class="hlink" href="frontend/book/booklist.php">Bücherliste</a>
        <?php
        if (isset($_SESSION["Admin"])){
            ?>
            <a class="hlink" href="frontend/kunde/kundenlist.php">Kundenliste</a></li>
            <?php
        }
        if (isset($_SESSION["ID"])){
            ?>
            <a class="hba" href="backend/controller/logout.contr.php"><button class="hb">Logout</button></a>
            <?php
        }
        else {
            ?>
            <a class="hba" href="frontend/login/login.php"><button class="hb">Login</button></a>
            <?php
        }
        ?>
    </header>
    <div class="tscr">
        <div class="tscreen">
            <div class="ttext">
                <p id="bigtitle">Ancient Library</p>
                <p id="secondtitle">Willkommen in dieser Bibliothek Hier gibt es viele Bücher zu sehen</p>
            </div>
            <img id="mainimg" src="media/biglib.jpg">
        </div>

        <div id="cont">
            <a class="scrl" href="frontend/book/booklist.php">
                <div class="lbox">
                    <p class="stitle">Bücherliste</p>
                    <p class="sdesc">Hier sehen sie eine Liste mit den gesamten Büchern aus dieser Bibliothek</p>
                </div>
            </a>
            <a class="scrl" href="frontend/book/random.php">
                <div class="lbox">
                    <p class="stitle">Random</p>
                    <p class="sdesc">Falls sie sich nicht für ein Buch entscheiden können, dann hier entlang</p>
                </div>
            </a>
            <?php
            if (isset($_SESSION["Admin"])) {
            ?>
                <a class="scrl" href="frontend/kunde/kundenlist.php">
                    <div class="lbox">
                        <p class="stitle">Kundenliste</p>
                        <p class="sdesc">Weil sie ein Admin sind können sie sich diese Kundenliste anschauen</p>
                    </div>
                </a>
            <?php
            }
            if (isset($_SESSION["ID"])) {
            ?>
                <a class="scrl" href="frontend/login/reset.php">
                    <div class="lbox">
                        <p class="stitle">Passwort</p>
                        <p class="sdesc">Wenn sie ihr Passwort nicht mögen, dann können sie es hier ändern</p>
                    </div>
                </a>
                <a class="scrl" href="backend/controller/logout.contr.php">
                    <div class="lbox">
                        <p class="stitle">Logout</p>
                        <p class="sdesc">Falls sie genug von dieser Seite haben können sie sich hier Ausloggen</p>
                    </div>
                </a>
            <?php
            }
            else {
            ?>
                <a class="scrl" href="frontend/login/login.php">
                    <div class="lbox">
                        <p class="stitle">Login</p>
                        <p class="sdesc">Da sie sich noch nicht Eingelogged haben können sie das jetzt machen</p>
                    </div>
                </a>
            <?php
            }
            ?>
        </div>
    </div>
    <?php
    include("frontend/footer.php");
    ?>
    <script>
        window.addEventListener('scroll',()=>{
            let content = document.querySelectorAll('.scrl');
            for (let i = 0; i < content.length; i++) {
                let contentPosition = content[i].getBoundingClientRect().top;
                let screenPosition = window.innerHeight;
                if (contentPosition < screenPosition) {
                    content[i].classList.add('popup');
                }
                else {
                    content[i].classList.remove('popup')
                }
            }
        })
    </script>
</body>
</html>