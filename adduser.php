<?php

//To Handle Session Variables on This Page
session_start();

//Including Database Connection From db.php file to avoid rewriting in all files
require_once("db.php");

//If user Actually clicked register button
if(isset($_POST)) {

	//Escape Special Characters In String First
	$firstname = mysqli_real_escape_string($conn, $_POST['fname']);
	$lastname = mysqli_real_escape_string($conn, $_POST['lname']);
	$contactno = mysqli_real_escape_string($conn, $_POST['contactno']);
	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$password = mysqli_real_escape_string($conn, $_POST['password']);
	
	//Encrypt Password
//	$password = base64_encode(strrev(md5($password)));

	//sql query to check if email already exists or not
	$sql = "SELECT email AND contactno FROM users WHERE email='$email'";
	$result = $conn->query($sql);

	//if email not found then we can insert new data
	if($result->num_rows == 0) {

			//This variable is used to catch errors doing upload process. False means there is some error and we need to notify that user.
	$uploadOk = true;

	//Folder where you want to save your resume. THIS FOLDER MUST BE CREATED BEFORE TRYING
	

		$hash = md5(uniqid());


		//sql new registration insert query
		$sql = "INSERT INTO users(firstname, lastname, email, password, contactno, hash) VALUES ('$firstname', '$lastname', '$email', '$password', '$contactno', '$hash')";

		if($conn->query($sql)===TRUE) {
			// Send Email

			// $to = $email;

			// $subject = "BizID - Confirm Your Email Address";

			// $message = '
			
			// <html>
			// <head>
			// 	<title>Confirm Your Email</title>
			// <body>
			// 	<p>Click Link To Confirm</p>
			// 	<a href="http://werkid.com/bizid/verify.php?hash='.$hash.'">Verify Email</a>
			// 	<br>
			// 	<p>Or else click on this Link</p>
			// 	<a href="http://werkid.com/bizid/verify.php?hash='.$hash.'">http://werkid.com/bizid/verify.php?hash='.$hash.'</a>
			 		
			// </body>
			// </html>
			// ';

			// $headers[] = 'MIME-VERSION: 1.0';
			// $headers[] = 'Content-type: text/html; charset=iso-8859-1';
			// $headers[] = 'To: '.$to;
			// $headers[] = 'From: bizid@werkid.com';
			 //you add more headers like Cc, Bcc;

			// $result = mail($to, $subject, $message, implode("\r\n", $headers)); // \r\n will return new line. 

			// if($result === TRUE) {

			 	//If data inserted successfully then Set some session variables for easy reference and redirect to login
			// 	$_SESSION['registerCompleted'] = true;
			// 	header("Location: login.php");
		//	 	exit();

		//	 }

			// //If data inserted successfully then Set some session variables for easy reference and redirect to login
			
			$_SESSION['registerCompleted'] = true;
			 	header("Location: login.php");
			exit();
		
		} else {
			//If data failed to insert then show that error. Note: This condition should not come unless we as a developer make mistake or someone tries to hack their way in and mess up :D
			echo "Error " . $sql . "<br>" . $conn->error;
		}
	} else {
		//if email found in database then show email already exists error.
		$_SESSION['registerError'] = true;
		header("Location: index.php");
		exit();
	}

	//Close database connection. Not compulsory but good practice.
	$conn->close();

} else {
	//redirect them back to register page if they didn't click register button
	header("Location: index.php");
	exit();
}