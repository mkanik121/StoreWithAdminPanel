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
  <title>AdminLTE 3 | Registration Page</title>
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
<body class="hold-transition register-page">
<div class="register-box">
  <div class="register-logo">
    <a href="../../index2.html"><b>Admin</b>LTE</a>
  </div>

  <div class="card">
    <div class="card-body register-card-body">
      <p class="login-box-msg">Register a new membership</p>
       <?php
       if(isset($_POST['register'])){
        $id          = $_POST['register'];
        $fullName    = $_POST['FullName'];
        $email       = $_POST['Email'];
        $mobile      = $_POST['Mobile'];
        $gender      = $_POST['Gender'];
        $address      = $_POST['Address'];
        $Password    = $_POST['Password'];
        $RePassword  = $_POST['RePassword']; 
        $userName    = str_replace(' ', '_', $fullName.rand(1,100));
        
        if($Password == $RePassword){
          $password  = sha1($Password);
        $RegisterSql = mysqli_query($db,"INSERT INTO users (FullName,UserName,Email,Mobile,Gender,Address,Password,Date)VALUES('$fullName','$userName','$email','$mobile','$gender','$address','$password',now())");
         if($RegisterSql){
          header("location:index.php");
         }else{
          die("mysqli_error".mysqli_error($db));
         }
      }else{
        $LogInError = "Password Not Match";

      } 
      }
       ?>
      <form action="" method="post"> 
        <div class="input-group mb-3">
          <input type="text" name="FullName" class="form-control" placeholder="Full Name">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="email" name="Email" class="form-control" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="number" name="Mobile" class="form-control" placeholder="Mobile Number">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="text" name="Address" class="form-control" placeholder="Address">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
                <div class="row">
                  <div class="col-lg-6">
                  <div class="input-group mb-3">
                  <input type="password" name="Password" class="form-control" placeholder="Password">
                  <div class="input-group-append">
                    <div class="input-group-text">
                      <span class="fas fa-lock"></span>
                    </div>
                  </div>
                </div>
                  </div>
                  <div class="col-lg-6">
                  <div class="input-group mb-3">
                  <input type="password" name="RePassword" class="form-control" placeholder="Retype password">
                  <div class="input-group-append">
                    <div class="input-group-text">
                      <span class="fas fa-lock"></span>
                    </div>
                  </div>
                </div>
                  <span class="text text-danger"><?php echo $LogInError; ?></span>         
                  </div>
                </div>
 
        <div class="input-group mb-3">
        Male  <input type="radio" class="form-control " name="Gender" placeholder="Gender" value="1" required>
        Female  <input type="radio"  class="form-control " name="Gender" placeholder="Gender" value="2" required> 
        <div class="input-group-append">
                </div>
              </div>

        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="agreeTerms" name="terms" value="agree">
              <label for="agreeTerms">
               I agree to the <a href="#">terms</a>
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" name="register" class="btn btn-primary btn-block">Register</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <div class="social-auth-links text-center">
        <p>- OR -</p>
        <a href="#" class="btn btn-block btn-primary">
          <i class="fab fa-facebook mr-2"></i>
          Sign up using Facebook
        </a>
        <a href="#" class="btn btn-block btn-danger">
          <i class="fab fa-google-plus mr-2"></i>
          Sign up using Google+
        </a>
      </div>

      <a href="index.php" class="text-center">I already have a membership</a>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
</body>
</html>
