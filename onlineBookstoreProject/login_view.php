
<!DOCTYPE html>
<html>
<head>
	<title>login.php</title>
	<meta name="generator" content="BBEdit 14.0" />
</head>
<body>
<h1 align="center">Book Club</h1>
<p align="center">
<form action='login.php?action=validate' method=POST align="center">
<label for="email">email</label>
<input type="text" id="email" name="email"><br>
<label for="password">password</label>
<input type="password" id="password" name="password"><br>
<input type="submit" value="Login">
<p align="center"><i>
<?php
echo $message;
?>
</i>
</p>
<hr>
To register <a href="register.php?action=new">Click here</a>
<form>
</p>
</body>
</html>
