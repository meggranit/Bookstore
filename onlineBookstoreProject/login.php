
<?php

include_once "database.php";
include_once "MemberCredentials_model.php";

$message = "Enter Credentials for login";

$action = "";

if (isset($_GET["action"])) {
	$action = $_GET["action"];
} 

if ($action == "validate") {
   // verify login; if good, navigate to next page
   
   $valid_login = false;
   
   if ( ($_POST["email"] != "") && ($_POST["password"] != "")) {
   
   	  $email = $_POST["email"];
   	  $password = $_POST["password"];
   	  
      $database = new Database();
      $dbConnection = $database->getConnection();
      
      $memberCredentials = new MemberCredentials();
      $valid_login = $memberCredentials->validateLogin($email, $password);
      $db = null;
      $database = null;
      
   }
   if ($valid_login > 0) {
   	   session_start();
   	   $_SESSION['Members_memberID'] = $valid_login;
       header ("Location:listBooks.php");
    } else {
       $message = "login failed";
    }
    
} 

include "login_view.php";

?>