<?php
include("../../backend/model/book.model.php");
class BooklistContr extends BookModel {
  public function delBook(){
      $id = $_GET["id"];
      $this->delete($id);

      header("location: ../../frontend/book/booklist.php");
      exit();
  }
}

$start = new BooklistContr();
$start->delBook();