<?php


include_once "database.php";
include_once "Books_model.php";

	 $database = new Database();
     $db = $database->getConnection();
      
      $BooksModel = new Books($db);
      $Bookslist = $BooksModel->getAllBooks();
	 

include "listBooks_view.php";
?>
