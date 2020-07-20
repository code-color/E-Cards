<?php

//To Handle Session Variables on This Page
session_start();

if(empty($_SESSION['id_user'])) {
  header("Location: index.php");
  exit();
}

//Including Database Connection From db.php file to avoid rewriting in all files
require_once("db.php");

//if user Actually clicked update profile button
if(isset($_POST)) {

	//Escape Special Characters
	$company = mysqli_real_escape_string($conn, $_POST['company']);
	$firstname = mysqli_real_escape_string($conn, $_POST['fname']);
	$lastname = mysqli_real_escape_string($conn, $_POST['lname']);
	$position = mysqli_real_escape_string($conn, $_POST['position']);
	$contactno = mysqli_real_escape_string($conn, $_POST['contactno']);
	$fax = mysqli_real_escape_string($conn, $_POST['fax']);

	$uploadOk = true;

	if(is_uploaded_file ( $_FILES['image']['tmp_name'] )) {

		$folder_dir = "profilepic/";

		$base = basename($_FILES['image']['name']); 

		$imageFileType = pathinfo($base, PATHINFO_EXTENSION); 

		$file = uniqid() . "." . $imageFileType; 
	  
		$filename = $folder_dir .$file;  

		if(file_exists($_FILES['image']['tmp_name'])) { 

			if($imageFileType == "jpg" || $imageFileType == "png" || $imageFileType == "JPG" || $imageFileType == "PNG")  {

				//if($_FILES['image']['size'] < 1000000) { // File size is less than 5MB

					//If all above condition are met then copy file from server temp location to uploads folder.
					move_uploaded_file($_FILES["image"]["tmp_name"], $filename);

			//	} else {
				//	$_SESSION['uploadError'] = "Wrong Size. Max Size Allowed : 5MB";
				//	header("Location: editprofile.php");
				//	exit();
			//	}
			} else {
				$_SESSION['uploadError'] = "Wrong Format. Only jpg & png Allowed";
				header("Location: editprofile.php");
				exit();
			}
		}
	} else {
		$uploadOk = false;
	}

	

	//Update User Details Query
	$sql = "UPDATE users SET company='$company', firstname='$firstname', lastname='$lastname', position='$position', contactno='$contactno', fax='$fax'";

	if($uploadOk == true) {
		$sql = $sql . ", logo='$file'";
	}

	$sql = $sql . " WHERE id_user='$_SESSION[id_user]'";

	if($conn->query($sql) === TRUE) {
		$_SESSION['name'] = $companyname;
		//If data Updated successfully then redirect to dashboard
		header("Location: dashboard.php");
		exit();
	} else {
		echo "Error ". $sql . "<br>" . $conn->error;
	}
	//Close database connection. Not compulsory but good practice.
	$conn->close();

} else {
	//redirect them back to dashboard page if they didn't click update button
	header("Location: editprofile.php");
	exit();
}