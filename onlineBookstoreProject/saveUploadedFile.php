<?php

function saveUploadedFile() {
	global $message;
	
	$uploadOk = 1;
	
	$target_dir = "uploads/";
	
	$source_file = $_FILES["fileToUpload"]["name"];
	if ($source_file == "") {
	  $message =  "no file included";
	  $uploadOk = 0;
	  return $uploadOk;
	}
	$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
	
	
	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
	
	// Check if image file is a actual image or fake image
	if(isset($_POST["submit"])) {
	  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
	  $message =  "check";
	  if($check !== false) {
		$message =  "File is an image - " . $check["mime"] . ".";
		$uploadOk = 1;
	  } else {
		$message =  "File is not an image.";
		$uploadOk = 0;
	  }
	}

	// Check if file already exists
	if (file_exists($target_file)) {
	  $message =  "Sorry, file already exists.";
	  $uploadOk = 0;
	}

	// Check file size
	if ($_FILES["fileToUpload"]["size"] > 5000000) {
	  $message =  "Sorry, your file is too large.";
	  $uploadOk = 0;
	}

	// Allow certain file formats
	if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
	&& $imageFileType != "gif" ) {
	  $message =  "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
	  $uploadOk = 0;
	}

	// Check if $uploadOk is set to 0 by an error
	if ($uploadOk == 0) {
	  $message =  "Sorry, your file was not uploaded.";
	// if everything is ok, try to upload file
	} else {
	  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
		$message =  "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
	  } else {
		$message =  "Sorry, there was an error uploading your file.";
	  }
	}

	return $uploadOk;
}






?>