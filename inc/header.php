<?php include('inc/db.php');
 ob_start(); 
 session_start();
 if(empty($_SESSION['Email']) || empty($_SESSION['Password'])){
   header("location: index.php");
}else{
  $sessionId           = $_SESSION['UserId'];
  $sessionFullName     = $_SESSION['FullName'];
  $sessionUserName     = $_SESSION['UserName'];
  $sessionAbout        = $_SESSION['About'];
  $sessionEmail        = $_SESSION['Email'];
  $sessionPassword     = $_SESSION['Password'];
  $sessionMobile       = $_SESSION['Mobile'];
  $sessionGender       = $_SESSION['Gender'];
  $sessionRoll         = $_SESSION['Roll'];
  $sessionAddress      = $_SESSION['Address'];
  $sessionStatus       = $_SESSION['Status'];
  $sessionImage        = $_SESSION['Image'];
  $sessionDate         = $_SESSION['Date'];
}
?>
<style>
    a.disabled {
  pointer-events: none;
  cursor: default;
}
</style>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Store | Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
<?php include('inc/nav.php'); ?>

