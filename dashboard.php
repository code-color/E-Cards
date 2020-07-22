<?php

session_start();

if(empty($_SESSION['id_user'])) {
  header("Location: index.php");
  exit();
}

require_once("db.php");
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>E-Cards</title>
  <!-- Tell the browser to be responsive to screen width -->
 <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
  <!-- Font Awesome -->
<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css'>
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="css/AdminLTE.min.css">
  <link rel="stylesheet" href="css/_all-skins.min.css">
  <!-- Custom -->
  <link rel="stylesheet" href="css/custom.css">
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-green sidebar-mini">
<div class="wrapper">

  <header class="main-header">

    <!-- Logo -->
    <a href="index.php" class="logo logo-bg">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>E</b>Cards</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>E-</b> Cards</span>
    </a>

    <!-- Header Navbar: style can be found in header.less -->
      <nav class="navbar navbar-static-top">
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
            
<?php if(empty($_SESSION['id_user']) && empty($_SESSION['id_company'])) { ?>
          <li><a href="login.php">Login</a> </li>
          <li><a href="sign-up.php">Sign Up</a> </li>  
          <?php } else 

            if(isset($_SESSION['id_user'])) { 
          ?>        
		   <li><a href="searchcontacts.php">Search</a>	</li>    
		   <li><a href="contacts.php">Contacts</a>	</li>
			<li><a href="logout.php">Logout</a></li>		   
          <?php
          } 
          ?>        		  
        </ul>
      </div>
    </nav>
  </header>
              <?php
            //Sql to get logged in user details.
            $sql = "SELECT * FROM users WHERE id_user='$_SESSION[id_user]'";
            $result = $conn->query($sql);

            //If user exists then show his details.
            if($result->num_rows > 0) {
              while($row = $result->fetch_assoc()) {
            ?>
  
  
  
  

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="margin-left: 2px;">
<div class="responsive">

   
        <div class="row">
		<div class="container-fluid position-relative" style="margin-left: 10px;">
		


        <h2 style="float:left;" class="card-text">Your Profile </h2>
		 
          
      <h2> <button type="button" class="btn btn-default btn-lg"  style="float:right;margin-right:20px;">
          <span class="glyphicon glyphicon-pencil"></span><a href="editprofile.php"> Edit Profile</a> 
        </button></h2>
		
		 
		
		 
		 
		 </div>
		 
		 <div class="container-fluid" style="margin-left: 2px;" >

  <div class="panel panel-default" >

  <div class="responsive" >
   <div class="row no-gutters" >
    <div class="bomma" style="margin-left:25px;" style="margin-right:25px;">
      <img src="profilepic/<?php echo $row['logo']; ?>" class="card-img" alt="Your Profile Picure" height = "420" width="375" style="float:left; margin-right:10px; margin-bottom:15px;"  />
	 <img src="https://chart.googleapis.com/chart?chs=200x200&cht=qr&chl=http://localhost/test/view-profile.php?id=<?php echo $row['id_user']; ?>&choe=UTF-8" class="card-img" id="myImg" alt="QR Code"  style="float:right;margin-right:15px;"  />
	 <div id="myModal" class="modal">
  <span class="close">&times;</span>
  <img class="modal-content" id="img01">
  <div id="caption"></div>
</div>
        <h2><?php echo $row['firstname']; ?> <?php echo $row['lastname']; ?> </h2>
		<HR>
        <h2>Company: <?php echo $row['company']; ?> </h2>
		<br>
		<br>
        <h4>Position Title: <?php echo $row['position']; ?></h4><br>
		<br><br><br>
		<br>
		 <h4>Phone Number:<a href="tel:<?php echo $row['contactno']; ?>"> <?php echo $row['contactno']; ?></a></h4>
		  <h4>Fax: <?php echo $row['fax']; ?></h4>
		  <h4>Email:<a href="mailto:<?php echo $row['email']; ?>"> <?php echo $row['email']; ?></a></h4>

	
	  
	<a href="scan.html" class="float">
<i class="fa fa-plus my-float"></i>
</a>	 
	  
</div>
	
	  
    
  </div>
 
</div>



	


  </div>
</div>
	
		<br> 
		<br> 
		<br> 
		<br> 
		<br> <br> 
		<br> <br> <br> <br> <br> <br> <br> <br> <br> 
		 
		 
		 
		 
		 

        
      </div>
    

    		<?php
			  }
			}
			?>
 </div>
  </div>
  <!-- /.content-wrapper -->


  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>

</div>
<!-- ./wrapper -->
<style>
.responsive{
width:100%
height:auto;
}
</style>

<style>
body {font-family: Arial, Helvetica, sans-serif;}

#myImg {
  border-radius: 5px;
  cursor: pointer;
  transition: 0.3s;
}

#myImg:hover {opacity: 0.7;}

/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 100000; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
}

/* Modal Content (image) */
.modal-content {
  margin: auto;
  display: block;
  width: 80%;
  max-width: 500px;
}

/* Caption of Modal Image */
#caption {
  margin: auto;
  display: block;
  width: 80%;
  max-width: 700px;
  text-align: center;
  color: #ccc;
  padding: 10px 0;
  height: 150px;
}

/* Add Animation */
.modal-content, #caption {  
  -webkit-animation-name: zoom;
  -webkit-animation-duration: 0.6s;
  animation-name: zoom;
  animation-duration: 0.6s;
}

@-webkit-keyframes zoom {
  from {-webkit-transform:scale(0)} 
  to {-webkit-transform:scale(1)}
}

@keyframes zoom {
  from {transform:scale(0)} 
  to {transform:scale(1)}
}

/* The Close Button */
.close {
  position: absolute;
  top: 15px;
  right: 35px;
  color: #f1f1f1;
  font-size: 40px;
  font-weight: bold;
  transition: 0.3s;
}

.close:hover,
.close:focus {
  color: #bbb;
  text-decoration: none;
  cursor: pointer;
}

/* 100% Image Width on Smaller Screens */
@media only screen and (max-width: 700px){
  .modal-content {
    width: 100%;
  }
}
</style>
<style>
*{padding:0;margin:0;}

body{
	font-family:Verdana, Geneva, sans-serif;
	font-size:18px;
	background-color:#CCC;
}

.float{
	position:fixed;
	width:60px;
	height:60px;
	bottom:40px;
	right:40px;
	background-color:#0C9;
	color:#FFF;
	border-radius:50px;
	text-align:center;
	box-shadow: 2px 2px 3px #999;
}

.my-float{
	margin-top:22px;
}
</style>
<script>
  window.console = window.console || function(t) {};
</script>
<script>
  if (document.location.search.match(/type=embed/gi)) {
    window.parent.postMessage("resize", "*");
  }
</script>
<script>
// Get the modal
var modal = document.getElementById("myModal");

// Get the image and insert it inside the modal - use its "alt" text as a caption
var img = document.getElementById("myImg");
var modalImg = document.getElementById("img01");
var captionText = document.getElementById("caption");
img.onclick = function(){
  modal.style.display = "block";
  modalImg.src = this.src;
  captionText.innerHTML = this.alt;
}

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on <span> (x), close the modal
span.onclick = function() { 
  modal.style.display = "none";
}
</script>
<!-- jQuery 3 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="js/adminlte.min.js"></script>
</body>
</html>
