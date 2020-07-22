<?php

//Including Database Connection From db.php file to avoid rewriting in all files
require_once("db.php");

if(isset($_GET['hash'])) {
	
	//Verification Process
	$hash = $_GET['hash'];
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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
                 
        </ul>
      </div>
    </nav>
  </header>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="margin-left: 0px;">

    <section id="candidates" class="content-header">
      <div class="container">
        <div class="row">
         
    
            <form action="updateverify.php" method="post" enctype="multipart/form-data">
	
	
	
	<?php
	
 $sql = "SELECT * FROM users WHERE hash='$hash'";
            $result = $conn->query($sql);

            //If user exists then show his details.
            if($result->num_rows > 0) {
              while($row = $result->fetch_assoc()) {

?>

 <div class="col-md-12 bg-white padding-2">
            <h3><b>Kindly Check your info and verify</b></h3>
			<HR>
                 <div class="panel panel-default form-row">
			
			 <div class="panel-body">
                <div class="form-group col-md-6"> 
                     <label for="fname">First Name<font color="red"><b></b></font></label>
                    <input type="text" class="form-control input-lg" id="fname" name="fname" placeholder="First Name" value="<?php echo $row['firstname']; ?>" readonly>
                  </div>
				  <div class="form-group col-md-6">
                    <label for="lname">Last Name<font color="red"><b></b></font></label>
                    <input type="text" class="form-control input-lg" id="lname" name="lname" placeholder="Last Name" value="<?php echo $row['lastname']; ?>" readonly>
                  </div>
                    <div class="form-group col-md-6">
                    <label for="email">Email address<font color="red"><b></b></font></label>
                    <input type="email" class="form-control input-lg" id="email" name="email" placeholder="Email" value="<?php echo $row['email']; ?>" readonly>
                  </div>
				                   <div class="form-group col-md-6">
                    <label for="contactno">Contact Number<font color="red"><b></b></font></label>
                    <input type="text" class="form-control input-lg" id="contactno" name="contactno" placeholder="Contact Number" value="<?php echo $row['contactno']; ?>" readonly>
                  </div>


<div class="form-group col-md-6" hidden> 
                     <label for="active">active<font color="red"><b></b></font></label>
                    <input type="text" class="form-control input-lg" id="active" name="active"  value="1">
                  </div>

 <div class="form-group col-md-12">
           <button type="submit" class="btn btn-flat btn-success">Verify</button>
		   </div>








    <?php 
			} }
    }
    ?>
	 </div>
        </div>
      </div>
    </section>
	
	
	  </div>
	  
	    <div class="control-sidebar-bg"></div>

</div>

<!-- jQuery 3 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="js/adminlte.min.js"></script>
</body>
</html>
