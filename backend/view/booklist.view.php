<?php
if (basename(__FILE__) == basename($_SERVER["SCRIPT_FILENAME"])) {
  header("location: ../../index.php?illegal-activities");
  exit();
}
require_once("../../backend/model/book.model.php");
class BooklistView extends BookModel {
  public function showBooklist($order, $searched, $categorie, $w, $kata, $page){
    $results = $this->books($order, $searched, $categorie, $w, $kata, $page);

    $result = $results->fetch_array(MYSQLI_ASSOC);
    
    foreach ($results as $content){
      echo '
      <tr>
        <th>' . $content["nummer"] . '</th>
        <td>' . $content["katalog"] . '</th>
        <td>' . $content["kurztitle"] . '</td>
        <td>' . $content["autor"] . '</td>
        <td>' . $content["kategorie"] . '</td>
        <td class="listbuts"><a href="book.php?id=' . $content["id"] . '"><button class="btn btn-info"><i class="bi bi-book"></i></button></a></td>';
        if (isset($_SESSION["Admin"])){
          echo '<td class="listbuts"><a href="../../backend/controller/booklist.contr.php?id=' . $content["id"] . '"><button class="btn btn-danger"><i class="bi bi-trash"></i></button></a></td>';
        }
      echo '</tr>';
    }
    return $result;
  }
}