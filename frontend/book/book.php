<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buch</title>
    <link rel="icon" href="../../media/logo.png">
    <!-- BOOTSTRAP 5-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../../style.css">
</head>
<body>
    <?php
    include("../header.php");
    include("../../backend/view/book.view.php");
    $book = new Book;
    $return = $book->showBook($_GET["id"]);
    if (!$return) {
        ?>
        <p id="rtitle">Das gewählte Buch exestiert nicht!</p>
        <div id="re">
            <a href="booklist.php"><button class="button">Zurück</button></a>
        </div>
        <?php
        exit();
    }
    ?>
    <p id="rtitle"><?php echo $book->kurztitle ?></p>
    <div class="rcontent">
        <div class="rtext">
            <p>Geschrieben von: <i><?php echo $book->autor ?></i></p>
            <p>Kategorie: <i><?php echo $book->kategorie ?></i></p>
            <p>Verkauft: <i><?php echo $book->verkauft ?></i></p>
            <p>Zustand: <i><?php echo $book->zustand ?></i></p>
            <p>Verfasser: <i><?php echo $book->verfasser ?></i></p>
            <p>Katalog: <i><?php echo $book->katalog ?></i></p>
            <p>Beschreibung: <?php echo $book->title ?></p>
        </div>
        <div class="rimg">
            <img src= <?php echo "../../media/" . $book->foto ?>>
        </div>
    </div>
    <div id="re">
            <a href="booklist.php"><button class="button">Zurück</button></a>
        </div>
    <?php
    include("../footer.php");
    ?>
</body>
</html>