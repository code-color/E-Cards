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
  <title>BizID</title>
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
      <span class="logo-mini"><b>B</b>ID</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Biz</b> ID</span>
    </a>

    <!-- Header Navbar: style can be found in header.less -->
      <nav class="navbar navbar-static-top">
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
            <li><a href="contacts.php">Contacts</a>	</li>
<?php if(empty($_SESSION['id_user']) && empty($_SESSION['id_company'])) { ?>
          <li><a href="login.php">Login</a> </li>
          <li><a href="sign-up.php">Sign Up</a> </li>  
          <?php } else 

            if(isset($_SESSION['id_user'])) { 
          ?>        
 <li> <a href="index.php">Dashboard</a> </li>
		  <li> <a href="logout.php">Logout</a></li>
          <?php
          } 
          ?>        		  
        </ul>
      </div>
    </nav>
  </header>
  
           <div class="col-md-12 bg-white padding-2">
           
            <form action="updateprofile.php" method="post" enctype="multipart/form-data">
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

<form>
  <div class="panel panel-default form-row">
  <div class="panel-heading"><h3><b>Edit Your Profile</b></h3></div>
<div class="panel-body">



                <div class="form-group col-md-6"> 
                     <label for="fname">First Name<font color="red"><b>*</b></font></label>
                    <input type="text" class="form-control input-lg" id="fname" name="fname" placeholder="First Name" value="<?php echo $row['firstname']; ?>" required="">
                  </div>
				  <div class="form-group col-md-6">
                    <label for="lname">Last Name<font color="red"><b>*</b></font></label>
                    <input type="text" class="form-control input-lg" id="lname" name="lname" placeholder="Last Name" value="<?php echo $row['lastname']; ?>" required="">
                  </div>
                    <div class="form-group col-md-6">
                    <label for="email">Email address<font color="red"><b>*</b></font></label>
                    <input type="email" class="form-control input-lg" id="email" placeholder="Email" value="<?php echo $row['email']; ?>" readonly>
                  </div>
 <div class="form-group col-md-6">
                    <label for="company">Company<font color="red"><b></b></font></label>
                    <input type="company" class="form-control input-lg" id="company" name="company" placeholder="Company" value="<?php echo $row['company']; ?>" >
                  </div>
<div class="form-group col-md-6">
                    <label for="position">Position Title<font color="red"><b></b></font></label>
                    <input type="position" class="form-control input-lg" id="position" name="position" placeholder="Position" value="<?php echo $row['position']; ?>" >
                  </div>
<div class="form-group col-md-6">
                    <label for="contactno">Phone Number<font color="red"><b>*</b></font></label>
                    <input type="text" class="form-control input-lg" id="contactno" name="contactno" placeholder="Contact Number" value="<?php echo $row['contactno']; ?>" required>
                  </div>
<div class="form-group col-md-6">
                    <label for="fax">Fax<font color="red"><b></b></font></label>
                    <input type="text" class="form-control input-lg" id="fax" name="fax" placeholder="Fax" value="<?php echo $row['fax']; ?>">
                  </div>
 <div class="form-group col-md-6">
                <label>Upload Profile Pic</label>
                <input type="file" name="image" class="form-control input-lg">
              </div>







    </div>
</div>
    		<?php
			  }
			}
			?>
			<div class="form-group col-md-6">
                    <button type="submit" class="btn btn-flat btn-success">Submit</button></div>
					
			
			</form></form>
		<?php if(isset($_SESSION['uploadError'])) { ?>
            <div class="row">
              <div class="col-md-12 text-center">
                <?php echo $_SESSION['uploadError']; ?>
              </div>
            </div>
            <?php unset($_SESSION['uploadError']); } ?>
            	
 </div>
  </div> </div>
  <!-- /.content-wrapper -->


  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>


<!-- ./wrapper -->

<style>

</style>
<!-- jQuery 3 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="js/adminlte.min.js"></script>
</body>
</html>
