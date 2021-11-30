<?php



session_start();
$_SESSION = [];
session_destroy();

include "logout_view.php";
?>
