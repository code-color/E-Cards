# E-Cards

Fully Responsive Digital Card Contact (E-Cards) Website. With QR Scanner and QR code for each profile Get all your Business contacts where ever when ever you want.

**Website Testing**

Download the latest database.sql file.
Few Accouts have already been created for Testing and Demo purpose.

Step 1: Create a database called e-cards and import everything from database.sql file. Next check your db.php file for database connection configuration

Step2: Now you login as candidate with following details
```php
Email: test@test.com
Password: testtest
```
**Sign-In**

When you try to Sign-in with your Email-Id A Email will be sent to your Registered E-mail to activate your account.

Candidates Email Confirmation:
>You CANNOT send emails from localhost server. So when you create a new candidate account it will not send any emails. So you must go to database, find that user and set ```active=1``` in order to make that account login. 
>If you are testing on real server then you can uncomment the following code from ```adduser.php```
```php
		// Send Email

			// $to = $email;

			// $subject = "E-Cards - Confirm Your Email Address";

			// $message = '
			
			// <html>
			// <head>
			// 	<title>Confirm Your Email</title>
			// <body>
			// 	<p>Click Link To Confirm</p>
			// 	<a href="yourdomain/verify.php?hash='.$hash.'">Verify Email</a>
			// 	<br>
			// 	<p>Or else click on this Link</p>
			// 	<a href="yourdomain/verify.php?hash='.$hash.'">yourdomain/verify.php?hash='.$hash.'</a>
			 		
			// </body>
			// </html>
			// ';

			// $headers[] = 'MIME-VERSION: 1.0';
			// $headers[] = 'Content-type: text/html; charset=iso-8859-1';
			// $headers[] = 'To: '.$to;
			// $headers[] = 'From: example@mail.com';
			 //you add more headers like Cc, Bcc;

			// $result = mail($to, $subject, $message, implode("\r\n", $headers)); // \r\n will return new line. 

			// if($result === TRUE) {

			 	//If data inserted successfully then Set some session variables for easy reference and redirect to login
			// 	$_SESSION['registerCompleted'] = true;
			// 	header("Location: login.php");
		//	 	exit();

		//	 }
  ```
  Make sure to change the mail ID {example@mail.com} and {yourdomain} to the credentials you want. then comment the following code below from ```adduser.php```.
  
  ```php
  $_SESSION['registerCompleted'] = true;
			 	header("Location: login.php");
			exit();
   ```

**QR Code**
>The QR right now will be pointing to "http://localhost/test/view-profile.php" . So you wont be able to load it, Go to ```dashboard.php``` and change the following code.

```php

 <img src="https://chart.googleapis.com/chart?chs=200x200&cht=qr&chl=http://localhost/test/view-profile.php?id=<?php echo $row['id_user']; ?>&choe=UTF-8" class="card-img" id="myImg" alt="QR Code"  style="float:right;margin-right:15px;"  />
```
possibly on line no:123 change **http://localhost/test/** to the path where you have downloaded the code.

Also go to ```view-profile.php``` and change the same line of code at line no:110

**QR Scanner**
We have used a HTML5 QR Scanner which works with most of the browsers using webcam. credits to instascan https://github.com/schmich/instascan.


