<?php include('inc/db.php'); 
ob_start();
session_start();
$LogInError = '';
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 3 | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="index.php"><b>LogIn</b>Store</a>
  </div>
  <!-- /.login-logo -->
  <?php


    if(isset($_POST['login'])){
    $LogId                    = $_POST['login'];
    $Email                    = $_POST['email'];
    $password                 = $_POST['password'];
    $Password                 = sha1($password);
    $row                      = mysqli_fetch_assoc(mysqli_query($db,"SELECT * FROM users WHERE Email ='$Email'"));
    $_SESSION['UserId']       = $row['UserId'];
    $_SESSION['FullName']     = $row['FullName'];
    $_SESSION['UserName']     = $row['UserName'];
    $_SESSION['About']        = $row['About'];
    $_SESSION['Email']        = $row['Email'];
    $_SESSION['Password']     = $row['Password'];
    $_SESSION['Mobile']       = $row['Mobile'];
    $_SESSION['Gender']       = $row['Gender'];
    $_SESSION['Address']      = $row['Address'];
    $_SESSION['Roll']         = $row['Roll'];
    $_SESSION['Status']       = $row['Status'];
    $_SESSION['Image']        = $row['Image'];
    $_SESSION['Date']         = $row['Date'];
    $_SESSION['last_login_timestamp'] = time();
   
    if(empty($Email) && empty($Password)){
      $LogInError = "Plz Input Filed Not Empty";
    }else{
      if($Email == $_SESSION['Email'] && $Password == $_SESSION['Password'] && $_SESSION['Status']=='1'){
        if(isset($_POST['remember'])){

        setcookie("email",$Email,time()+ 10);
        setcookie("password",$Password,time()+ 10);

      }else{
        setcookie("email",$Email,10);
        setcookie("password",$Password,10);
      }
      header("location: dashboard.php");

      }else if($Email !== $_SESSION['Email'] || $Password !== $_SESSION['Password']){
        header("location: index.php");
      }else{
        header("location: index.php");
      }
    }

  }
  $EMAIL = '';
  $PASSWORD = '';
  $REMEMBER = '';
  if(isset($_COOKIE['email']) && isset($_COOKIE['password'])){

  $EMAIL = $_COOKIE['email'];
  $PASSWORD = $_COOKIE['password'];
  $REMEMBER = "checked='checked'";
}

?>
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Sign in to start your session</p>

      <form action="" method="POST">
        <div class="input-group mb-3">
          <input type="text" name="email" class="form-control" value="<?php echo $EMAIL; ?>" placeholder="Email or User Name" require>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="password" class="form-control" value="<?php echo $PASSWORD; ?>" placeholder="Password" require>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
    <span class="text text-danger"><?php echo $LogInError; ?></span>

        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember" name="remember" <?php echo $REMEMBER; ?>>
              <label for="remember">
                Remember Me
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" name="login" class="btn btn-primary btn-block">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <div class="social-auth-links text-center mb-3">
        <p>- OR -</p>
        <a href="#" class="btn btn-block btn-primary">
          <i class="fab fa-facebook mr-2"></i> Sign in using Facebook
        </a>
        <a href="#" class="btn btn-block btn-danger">
          <i class="fab fa-google-plus mr-2"></i> Sign in using Google+
        </a>
      </div>
      <!-- /.social-auth-links -->

      <p class="mb-1">
        <a href="forgotPassword.php">I forgot my password</a>
      </p>
      <p class="mb-0">
        <a href="register.php" class="text-center">Register a new membership</a>
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>

</body>
</html>
