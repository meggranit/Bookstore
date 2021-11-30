<!DOCTYPE html>
<html>
<head>
	<title>List Members</title>
	<meta name="generator" content="BBEdit 14.0" />
</head>
<body>
<h1 align="center">Book Club - Members</h1>
<hr>
<p align="center">
<a href="listBooks.php">Books</a>
&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;<a href="logout.php">Logout</a>
</p>
<hr>
<table align="center" width="50%">
<th style="text-align:left">Member ID</th style="text-align:left"><th style="text-align:left">First Name</th>
<th style="text-align:left">Last Name</th>

<?php

foreach ($memberslist as $member) {
  
  
  print <<<_MEMBERS
  <tr><td>$member[memberID]</td><td>$member[firstname]</td><td>$member[lastname]</td>
   

   
   </tr>
   
_MEMBERS;
}

?>

</table>
</hr>

</body>
</html>
