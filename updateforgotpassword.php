<?php

//To Handle Session Variables on This Page
session_start();

//Including Database Connection From db.php file to avoid rewriting in all files
require_once("db.php");

//If user Actually clicked register button
if(isset($_POST)) {

	//Escape Special Characters In String First

	$email = mysqli_real_escape_string($conn, $_POST['email']);
	
	//Encrypt Password
	

	//sql query to check if email already exists or not
	$sql = "SELECT email FROM users WHERE email='$email'";
   $result = $conn->query($sql);

            //If user exists then show his details.
            if($result->num_rows > 0) {
              while($row = $result->fetch_assoc()) {
			//This variable is used to catch errors doing upload process. False means there is some error and we need to notify that user.
	$uploadOk = true;

	//Folder where you want to save your resume. THIS FOLDER MUST BE CREATED BEFORE TRYING
	

		

		
		// Send Email

			 $to = $email;

			 $subject = "E-Cards - Reset Your Password";

			 $message = '
			
			 <html>
			 <head>
			 	<title>Reset Your Password</title>
			 <body>
			 	<p>Click Link To Reset Your Password</p>
			 	<a href="yourdomain/passwordreset.php?email='.$email.'">Reset Password</a>
			 	<br>
			 	<p>Or else click on this Link</p>
			 	<a href="yourdomain/passwordreset.php?email='.$email.'">yourdomian/passwordreset.php?email='.$email.'</a>
			 		
			 </body>
			 </html>
			 ';

			 $headers[] = 'MIME-VERSION: 1.0';
			 $headers[] = 'Content-type: text/html; charset=iso-8859-1';
			 $headers[] = 'To: '.$to;
			 $headers[] = 'From: example@mail.com.com';
			 //you add more headers like Cc, Bcc;

			 $result = mail($to, $subject, $message, implode("\r\n", $headers)); // \r\n will return new line. 

			 if($result === TRUE) {

			 	//If data inserted successfully then Set some session variables for easy reference and redirect to login
			 	$_SESSION['mailsent'] = true;
			 	header("Location: login.php");
			 	exit();

			 }


			 //If data inserted successfully then Set some session variables for easy reference and redirect to login
		} 
	

} else {
	//redirect them back to register page if they didn't click register button
	header("Location: login.php");
	exit();
	}
}