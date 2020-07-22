<?php

//To Handle Session Variables on This Page
session_start();

if(empty($_SESSION['id_user'])) {
	header("Location: index.php");
	exit();
}

//Including Database Connection From db.php file to avoid rewriting in all files
require_once("db.php");

//If user Actually clicked apply button
if(isset($_GET)) {

	//Check if user has applied to job post or not. If not then add his details to apply_job_post table.
	$sql1 = "SELECT * FROM contacts WHERE id_user='$_SESSION[id_user]' AND id_friend='$_GET[id]'";
    $result1 = $conn->query($sql1);
    if($result1->num_rows > 0) {  
    	
    	$sql = "DELETE FROM `contacts` WHERE id_user='$_SESSION[id_user]' AND id_friend='$_GET[id]'";

		if($conn->query($sql)===TRUE) {
			$_SESSION['removed'] = true;
			header("Location: view-profile.php?id=$_GET[id].php");
			exit();
		} else {
			echo "Error " . $sql . "<br>" . $conn->error;
		}

		$conn->close();

    }  else {
		header("Location: view-profile.php?id=$_GET[id].php");
		exit();
	}
	

} else {
	header("Location: jobs.php");
	exit();
}