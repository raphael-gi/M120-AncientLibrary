<?php
session_start();

include("../../backend/inc/booklist.inc.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bücher Liste</title>
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
  <form id="filter" action='booklist.php<?php if(isset($_GET["ord"])){echo "?ord=" . $_GET["ord"];} if (isset($_GET["w"])){echo "&w=" . $_GET["w"];} ?>' method="POST">
    <div id="wrapform">
        <div id="inpts">
            <input type="search" placeholder="Suchen" name="ser" id="ksearch" <?php if(isset($_POST["ser"])){echo "value='" . $_POST["ser"] . "'";} ?>>
            <select id="serbut" name="cat">
              <option value="%">Alle Kategorien</option>
              <?php
              if (isset($_POST["cat"])){
                $categories->showCategoreies($_POST["cat"]);
              }
              else {
                $categories->showCategoreies("");
              }
              ?>
            </select>
            <input type="number" name="kata" id="ksearch" placeholder="Katalog (10-19)" <?php if (isset($_POST["kata"])){ echo "value=" . $_POST["kata"];} ?> min="10" max="19">
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
          <th class="lordth"><a class="lord" href="booklist.php?ord=nummer<?php desc("nummer") ?>">Nummer<i class="lord bi bi-arrow-<?php icon("nummer") ?>"></i></a></th>
          <th class="lordth"><a class="lord" href="booklist.php?ord=katalog<?php desc("katalog") ?>">Katalog<i class="lord bi bi-arrow-<?php icon("katalog") ?>"></i></a></th>
          <th class="lordth"><a class="lord" href="booklist.php?ord=kurztitle<?php desc("kurztitle") ?>">Titel<i class="lord bi bi-arrow-<?php icon("kurztitle") ?>"></i></a></th>
          <th class="lordth"><a class="lord" href="booklist.php?ord=autor<?php desc("autor") ?>">Autor<i class="lord bi bi-arrow-<?php icon("autor") ?>"></i></a></th>
          <th class="lordth"><a class="lord" href="booklist.php?ord=kategorie<?php desc("kategorie") ?>">Kategorie<i class="lord bi bi-arrow-<?php icon("kategorie") ?>"></i></a></th>
          <th class="lordth">Anschauen</th>
          <?php
          if (isset($_SESSION["Admin"])){
            echo '<th class="lordth" scope="col">Löschen</th>';
          }
          ?>
        </tr>
      </thead>
      <tbody>
        <?php
        if (isset($_POST["page"])){
          $page *= 20;
        }
        $booklist = new BooklistView;
        $results = $booklist->showBooklist($ord, $ser, $cat, $w, $kata, $page);
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