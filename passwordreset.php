<?php 
require_once("db.php");

if(isset($_GET['email'])) {
	
	//Verification Process
	$email = $_GET['email'];



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
      <span class="logo-lg"><b>E-</b>Cards</span>
    </a>

    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <?php if(empty($_SESSION['id_user'])) { ?>
          <li>
            <a href="login.php">Login</a>
          </li>
          <li>
            <a href="index.php">Sign Up</a>
          </li>  
          <?php } else  

            if(isset($_SESSION['id_user'])) { 
          ?>        
          <li>
            <a href="user/index.php">Dashboard</a>
          </li>
     
          <li>
            <a href="logout.php">Logout</a>
          </li>
          <?php } ?>          
        </ul>
      </div>
    </nav>
  </header>

  <!-- Content Wrapper. Contains page content -->
  <?php
	
 $sql = "SELECT * FROM users WHERE email='$email'";
            $result = $conn->query($sql);

            //If user exists then show his details.
            if($result->num_rows > 0) {
              while($row = $result->fetch_assoc()) {

?>
  <div class="content-wrapper" style="margin-left: 0px;">

    <section class="content-header">
      <div class="container">
        <div class="row latest-job margin-top-50 margin-bottom-20 bg-white">
          <h2 class="text-center margin-bottom-20">Reset Your Password</h2>
          <form method="post" id="registerCandidates" action="updatepasswordreset.php?hash='.$hash.'" enctype="multipart/form-data">

            <div class="col-md-6 latest-job ">
              <div class="form-group">
                <input class="form-control input-lg" type="password" id="password" name="password" placeholder="Password *" required>
              </div>
              <div class="form-group">
                <input class="form-control input-lg" type="password" id="cpassword" name="cpassword" placeholder="Confirm Password *" required>
              </div>
              <div id="passwordError" class="btn btn-flat btn-danger hide-me" >
                    Password Mismatch!! 
                  </div>
				  <div class="form-group col-md-6" hidden>
                    <label for="email">Email address<font color="red"><b></b></font></label>
                    <input type="email" class="form-control input-lg" id="email" name="email" placeholder="Email" value="<?php echo $row['email']; ?>" >
                  </div>
             
			              </div>
						   <div class="col-md-12 latest-job ">
			  
              <div class="form-group">
                <button class="btn btn-flat btn-success">Reset</button>
              </div>
			  
              </div>
			  <br><br><br><br>
			  

          </form>
          
        </div>
      </div>
    </section>

    

  </div>
      <?php 
			} }
    }
    ?>
  <!-- /.content-wrapper -->

  

  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>

</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="js/adminlte.min.js"></script>




<script>
  $("#registerCandidates").on("submit", function(e) {
    e.preventDefault();
    if( $('#password').val() != $('#cpassword').val() ) {
      $('#passwordError').show();
    } else {
      $(this).unbind('submit').submit();
    }
  });
</script>
</body>
</html>
