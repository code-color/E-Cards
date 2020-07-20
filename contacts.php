<?php

//To Handle Session Variables on This Page
session_start();

//If user Not logged in then redirect them back to homepage. 
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
		   <li><a href="dashboard.php">Dashboard</a>	</li>    
		   <li><a href="searchcontacts.php">Search</a>	</li>    
			<li><a href="logout.php">Logout</a></li>		   
          <?php
          } 
          ?>        		  
        </ul>
      </div>
    </nav>
  </header>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="margin-left: 0px;">

    <section id="candidates" class="content-header">
      <div class="container">
        <div class="row">

          <div class="col-md-12 bg-white padding-2">
            <h2 align="center">Your Contacts </h2>
			<!--start-->
<?php
$sql = "SELECT * FROM contacts WHERE id_user='$_SESSION[id_user]'";
$result = $conn->query($sql);
if($result->num_rows > 0) {
	while($row = $result->fetch_assoc()) {
		$sql1 = "SELECT * FROM users WHERE id_user='$row[id_friend]'";
              $result1 = $conn->query($sql1);
              if($result1->num_rows > 0) {
                while($row1 = $result1->fetch_assoc()) 
                {

?>
<div class="attachment-block clearfix">
    <img class="attachment-img" src="profilepic/<?php echo $row1['logo']; ?>" alt="Attachment Image">
        <div class="attachment-pushed">
            <h4 class="attachment-heading"><a href="view-profile.php?id=<?php echo $row1['id_user']; ?>"><?php echo $row1['firstname']; ?> <?php echo $row1['lastname']; ?></a> </h4>
                <div class="attachment-text">	
					<div><strong><?php echo $row1['email']; ?> | <?php echo $row1['contactno']; ?> </strong></div>
                 </div>
        </div>
</div>
		 <br>
							
					
  <!-- /.content-wrapper -->
<?php
			}
		}
	}
}
?>
	</div>
	  
  <!--end-->  
					
             






			 
		</div>
				
			  
           
         
    
          </div>
        </div>
      </div>
    </section>

    

  </div>
  <!-- /.content-wrapper -->



  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>

</div>
<!-- ./wrapper -->
<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<!-- jQuery 3 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="js/adminlte.min.js"></script>

</body>
</html>
