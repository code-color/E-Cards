<?php

//To Handle Session Variables on This Page
session_start();

//Including Database Connection From db.php file to avoid rewriting in all files
require_once("db.php");

//If user Actually clicked login button 
if(isset($_POST)) {

	//Escape Special Characters in String
	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$password = mysqli_real_escape_string($conn, $_POST['password']);

	//Encrypt Password
	// $password = base64_encode(strrev(md5($password)));

	//sql query to check user login
	$sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
	$result = $conn->query($sql);

	//if user table has this this login details
	if($result->num_rows > 0) {
		//output data
		while($row = $result->fetch_assoc()) {
			
			if($row['active'] == '0') {
				//send email
				
			 $to = $email;

			 $subject = "E-Cards - Confirm Your Email Address";

			 $message = '
			
			 <html>
			 <head>
			 	<title>Confirm Your Email</title>
			 <body>
			 	<p>Click Link To Confirm</p>
			 	<a href="yourdomain/verify1.php?email='.$email.'">Verify Email</a>
			 	<br>
			 	<p>Or else click on this Link</p>
			 	<a href="yourdomain/verify1.php?email='.$email.'">yourdomain/verify1.php?email='.$email.'</a>
			 		
			 </body>
			 </html>
			 ';

			 $headers[] = 'MIME-VERSION: 1.0';
			 $headers[] = 'Content-type: text/html; charset=iso-8859-1';
			 $headers[] = 'To: '.$to;
			 $headers[] = 'From: example@mail.com';
			 //you add more headers like Cc, Bcc;

			 $result = mail($to, $subject, $message, implode("\r\n", $headers)); // \r\n will return new line. 

			 if($result === TRUE) {

			 	//If data inserted successfully then Set some session variables for easy reference and redirect to login
			 	$_SESSION['registerCompleted'] = true;
			 	header("Location: login.php");
			 	exit();
			 }
				//email code
				
			} else if($row['active'] == '1') { 
			
			$_SESSION['email_update'] = "Your Account Is already Active";
		 		header("Location: login.php");
				exit();

		
			} else if($row['active'] == '2') { 

				$_SESSION['loginActiveError1'] = "Your Account Is Deactivated. Contact Admin To Reactivate.";
		 		header("Location: login.php");
				exit();
			}

			//Redirect them to user dashboard once logged in successfully
			
		}
 	} else {

 		//if no matching record found in user table then redirect them back to login page
 		$_SESSION['loginError'] = $conn->error;
 		header("Location: login.php");
		exit();
 	}

 	//Close database connection. Not compulsory but good practice.
 	$conn->close();

} else {
	//redirect them back to login page if they didn't click login button
	header("Location: login.php");
	exit();
}