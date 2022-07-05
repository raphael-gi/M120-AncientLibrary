<?php
if (basename(__FILE__) == basename($_SERVER["SCRIPT_FILENAME"])) {
  header("location: ../../index.php?illegal-activities");
  exit();
}
include("../../backend/model/kunde.model.php");
class Kundenlist extends KundeModel {
  public function showList($ord, $gend, $check, $search, $w, $page){
    $results = $this->list($ord, $gend, $check, $search, $w, $page);
    $result = $results->fetch_array(MYSQLI_ASSOC);
    
    foreach ($results as $content){
      if ($content["kontaktpermail"] == "0"){
        $content["kontaktpermail"] = "Nein";
      }
      else {
        $content["kontaktpermail"] = "Ja";
      }
      echo '
      <tr>
        <td>' . $content["vorname"] . '</td>
        <td>' . $content["name"] . '</td>
        <td>' . $content["email"] . '</td>
        <td>' . $content["geburtstag"] . '</td>
        <td>' . $content["geschlecht"] . '</td>
        <td>' . $content["kunde_seit"] . '</td>
        <td>' . $content["kontaktpermail"] . '</td>
        <td><a href="kundedit.php?id=' . $content["kid"] . '"><button class="btn btn-info"><i class="bi bi-pen-fill"></i></button></a></td>
        <td><a href="../../backend/controller/kundedel.contr.php?id=' . $content["kid"] . '"><button class="btn btn-danger"><i class="bi bi-trash"></i></button></a></td>
      </tr>';
    }

    return $result;
  }
}