<!DOCTYPE html>
<html>
<head>
	<title>add book</title>
	<meta name="generator" content="BBEdit 14.0" />
</head>
<body>
<h1 align="center">Book Club - Add a Book</h1>
<hr>
<p align="center">
<a href="listMembers.php">Members</a>&nbsp;&nbsp;&nbsp;
<a href="listBooks.php">Books</a>&nbsp;&nbsp;&nbsp;
<a href="logout.php">Logout</a>
</p>
</hr>

<p align="center">

<form align = "center" action="addBook.php?action=add" method="POST" enctype="multipart/form-data">
 <label for="bookID">Book ID</label>
 <input type="text" id="bookID" name="bookID"><br></br>
   <label for="bookTitle">Book Title</label>
   <input type="text" name="bookTitle" id="bookTitle"><br></br>
   <label for="authorFirstname">Author First Name</label>
 <input type="text" id="authorFirstname" name="authorFirstname"><br></br>
 <label for="authorLastname">Author Last Name</label>
 <input type="text" id="authorLastname" name="authorLastname"><br></br>
 <label for="publishedYear">Published Year</label>
 <input type="text" id="publishedYear" name="publishedYear"><br></br>
 <label for="Members_memberID">Member ID</label>
 <input type="text" id="Members_memberID" name="Members_memberID"><br></br>
 <label for="bookBorrowed">Book Borrowed</label>
 <input type="text" id="bookBorrowed" name="bookBorrowed"><br></br>
 <label for="bookCoverImage">Book Cover Image</label>
   <input type="file" name="fileToUpload" id="fileToUpload"><br></br>
  <input type="submit">
</form>
</p>

<p align="center"><i><?php echo $message; ?> </i></p>
</body>
</html>
