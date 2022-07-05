<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Random Buch</title>
    <link rel="icon" href="../../media/logo.png">
    <!-- BOOTSTRAP 5-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../../style.css">
</head>
<body>
    <?php
    include("../header.php");
    include("../../backend/view/random.view.php");
    $random = new Random;
    $random->showRandom();
    ?>
    <p id="rtitle"><?php echo $random->kurztitle ?></p>
    <div class="rcontent">
        <div class="rtext">
            <p>Geschrieben von: <i><?php echo $random->autor ?></i></p>
            <p>Kategorie: <i><?php echo $random->kategorie ?></i></p>
            <p>Verkauft: <i><?php echo $random->verkauft ?></i></p>
            <p>Zustand: <i><?php echo $random->zustand ?></i></p>
            <p>Verfasser: <i><?php echo $random->verfasser ?></i></p>
            <p>Beschreibung: <?php echo $random->title ?></p>
        </div>
        <div class="rimg">
            <img src= <?php echo "../../media/" . $random->foto ?>>
        </div>
    </div>
    <div id="re">
        <form action="loader.php" method="POST">
            <input class="button" type="submit" value="Neues Buch">
        </form>
    </div>
    <?php
    include("../footer.php");
    ?>
</body>
</html>