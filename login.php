<?php

session_start();

if(isset($_SESSION['id_user'])) {
  header("Location: dashboard.php");
  exit();
}

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
  <!-- iCheck -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/iCheck/1.0.2/skins/square/blue.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a><b>E-</b> Cards</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Login into Your Account</p>

    <form action="checklogin.php" method="post">
      <div class="form-group has-feedback">
        <input type="text" class="form-control" name="email" placeholder="email">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" name="password" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
	    <div class="form-group has-feedback">
        <input type="checkbox"  name="keep">  keep me logged in</input>	
	
     
      </div>
      <div class="row">
        <!-- /.col -->
        <div class="col-xs-12">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
 
               <br> <a href="index.php">Don't have an account? Sign-up</a>
               <br> <a href="forgotpassword.php">Forgot Password?</a>
              </div>
        <!-- /.col -->
      </div>
      <?php 
//If User Failed To log in then show error message.
if(isset($_SESSION['loginError'])) {
  ?>
  <div>
    <p class="text-center">Invalid Email/Password! Try Again!</p>
  </div>
<?php
 unset($_SESSION['loginError']); }
?>

<!-- agr email verified nhi h tho   -->
      <?php 
if(isset($_SESSION['loginActiveError'])) {
  ?>
  <div>
    <p class="text-center">Your Account Is Not Active. Check Your Email.</p>
	<br> <a href="emailagain.php">Send Email again</a>
  </div>
<?php
 unset($_SESSION['loginActiveError']); }
?>


<!-- agr accout deactivated h tho   -->
      <?php 
if(isset($_SESSION['loginActiveError1'])) {
  ?>
  <div>
    <p class="text-center">Your Account is Deactivated, Contact Admin</p>
  </div>
<?php
 unset($_SESSION['loginActiveError1']); }
?>

 <?php 
if(isset($_SESSION['mailsent'])) {
  ?>
  <div>
    <p class="text-center">Check Your mail to reset your Password</p>
  </div>
<?php
 unset($_SESSION['mailsent']); }
?>

      <?php 
//If User Failed To log in then show error message.
if(isset($_SESSION['email_update'])) {
  ?>
  <div>
    <p class="text-center">Your Account Is already Active</p>
  </div>
<?php
 unset($_SESSION['email_update']); }
?>



    </form>
  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->


<!-- jQuery 3 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="js/adminlte.min.js"></script>
<!-- iCheck -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/iCheck/1.0.2/icheck.min.js"></script>

</body>
</html>
