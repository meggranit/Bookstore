<?php

include_once "database.php";
include_once "MemberCredentials_model.php";
include_once "Members_model.php";

$message = "Enter Credentials for Registration";

$action = "";

if (isset($_GET["action"])) {
	$action = $_GET["action"];
} 

if ($action == "register") {
   // we need to do registration here
   $firstname = $_POST["firstname"];
   $lastname = $_POST["lastname"];
   $email = $_POST["email"];
   $password = $_POST["password"];
   
   if (($firstname == "") or ($lastname == "") or ($email == "") or ($password == "")){
   	$message = "Some required fields not entered";
   }
   else {
   	$database = new Database();
   	$dbConnection = $database->getConnection();
   
   	$membersModel = new Members($dbConnection);
   	$result = $membersModel->registerMember($firstname, $lastname, $email, $password);
   	if ($result) {
      $message = "Registered!";
   	} else {
   	  $message = "Register Failed";
   	}
   }
   
   
} 

include "register_view.php";

?>