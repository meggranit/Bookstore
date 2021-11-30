<!DOCTYPE html>
<html>
<head>
	<title>register.php</title>
	<meta name="generator" content="BBEdit 14.0" />
</head>
<body>
<h1 align="center">Book Club - Registration</h1>
<p align="center">
<form action='register.php?action=register' method=POST align="center">
<label for="firstname">first name</label>
<input type="text" id="firstname" name="firstname"><br>
<label for="lastname">last name</label>
<input type="text" id="lastname" name="lastname"><br>
<label for="email">email</label>
<input type="text" id="email" name="email"><br>
<label for="password">password</label>
<input type="password" id="password" name="password"><br>
<input type="submit" value="Register">
<p align="center"><i><?php echo $message; ?> </i></p>
<p align="center"><a href="login.php">Login</a></p>
<hr>
<form>
</p>
</body>
</html>

