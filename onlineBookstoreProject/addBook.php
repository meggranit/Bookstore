<?php
if (isset($_GET["action"])) {
    $action = $_GET['action'];
    $message = "";
    $photoName = "";
 } else {
    $action = "???";
    $message = "select a photo to upload";
 }

include_once "database.php";
include_once "Books_model.php";

include_once "saveUploadedFile.php";

function addDBrecord() {
	
       
    $database = new Database();
    $db = $database->getConnection();
      
    $booksModel = new Books($db);
    $booksModel->addBook($bookID, $bookTitle, $authorFirstname, $authorLastname, $publishedYear, $Members_memberID, $bookBorrowed, $bookCoverImage);

	$db = null;
	$database = null;
}

if ($action == "add") {

    var_dump($_POST);
    var_dump($_FILES);
    

    $upload = saveUploadedFile();
    if ($upload) {
       $result = addDBrecord(); 
       if ($result) {
       	$message = $message . " ";
       }   
    }
   
}
include "addBook_view.php";


?>
