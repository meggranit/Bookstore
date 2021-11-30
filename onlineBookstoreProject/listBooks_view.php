<!DOCTYPE html>
<html>
<head>
	<title>List Books</title>
	<meta name="generator" content="BBEdit 14.0" />
</head>
<body>
<h1 align="center">Book Club - Books</h1>
<hr>
<p align="center">
<a href="listMembers.php">Members</a>&nbsp;&nbsp;&nbsp
<a href="logout.php">Logout</a>
</p>
<hr>
<table align="center" width="50%">
<th style="text-align:left">Book ID</th><th style="text-align:left">Book Title</th><th style="text-align:left">Author First Name</th>
<th style="text-align:left">Author Last Name</th><th style="text-align:left">Published Year</th><th style="text-align:left">Member ID</th>
<th style="text-align:left">Book Borrowed</th><th style="text-align:left">Book Cover Image</th>

<?php

foreach ($Bookslist as $books) {

print <<<_BOOKS
  <tr><td>$books[bookID]</td><td>$books[bookTitle]</td><td>$books[authorFirstname]</td><td>$books[authorLastname]</td>
  <td>$books[publishedYear]</td><td>$books[Members_memberID]</td><td>$books[bookBorrowed]</td><td>$books[bookCoverImage]</td>
  </tr>

_BOOKS;


}

?>

</table>
<hr>
<p align="center"><a href="addBook.php">Add Book</a></p>
</body>
</html>
