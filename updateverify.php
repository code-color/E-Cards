<?php

//To Handle Session Variables on This Page


//Including Database Connection From db.php file to avoid rewriting in all files
require_once("db.php");

//if user Actually clicked update profile button
if(isset($_POST)) {

	$active = mysqli_real_escape_string($conn, $_POST['active']);
	$email = mysqli_real_escape_string($conn, $_POST['email']);



		$sql = "UPDATE users SET active = '$active'";

	$sql .= " WHERE email='$email'";

	if($conn->query($sql) === TRUE) {
	
		//If data Updated successfully then redirect to dashboard
		header("Location: login.php");
		exit();
	} else {
		echo "Error ". $sql . "<br>" . $conn->error;
	}
	//Close database connection. Not compulsory but good practice.
	$conn->close();

} else {
	//redirect them back to dashboard page if they didn't click update button
	header("Location: index.php");
	exit();
}