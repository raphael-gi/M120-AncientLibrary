<?php
if (basename(__FILE__) == basename($_SERVER["SCRIPT_FILENAME"])) {
    header("location: ../index.php?illegal-activities");
    exit();
}
?>
<header>
    <a id="logo" href="../../index.php"><img width="100px" src="../../media/logo.png"></a>
    <a class="hlink" href="../../index.php">Startseite</a>
    <a class="hlink" href="../book/random.php">Random Buch</a>
    <a class="hlink" href="../book/booklist.php">Bücherliste</a>
    <?php
    if (isset($_SESSION["ID"])){
        if ($_SESSION["Admin"] == "1"){
            ?>
            <a class="hlink" href="../kunde/kundenlist.php">Kundenliste</a></li>
            <?php
        }
        ?>
        <a class="hba" href="../../backend/controller/logout.contr.php"><button class="hb">Logout</button></a>
        <?php
    }
    else {
        ?>
        <a class="hba" href="../login/login.php"><button class="hb">Login</button></a></li>
        <?php
    }
    ?>
</header>