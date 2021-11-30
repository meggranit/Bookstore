<?php

include_once "database.php";
include_once "Members_model.php";

	 $database = new Database();
     $db = $database->getConnection();
      
      session_start();
      // var_dump($_SESSION);
      
      $membersModel = new Members($db);
      $memberslist = $membersModel->getAllMembers();
	  


include "listMembers_view.php";
?>
