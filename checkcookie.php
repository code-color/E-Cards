<?php 
  
session_start();

//Including Database Connection From db.php file to avoid rewriting in all files
require_once("db.php");


    

 $sql = "SELECT * FROM users WHERE hash='$_COOKIE[hash]'";
	$result = $conn->query($sql);

	//if user table has this this login details
	if($result->num_rows > 0) {

while($row = $result->fetch_assoc()) {

//Set some session variables for easy reference
				$_SESSION['name'] = $row['firstname'] . " " . $row['lastname'];
				$_SESSION['id_user'] = $row['id_user'];
header("Location: dashboard.php");
					exit();
}
}
else{
   header("Location: login.php");
} 



  
?>