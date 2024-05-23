<?php include('../inc/db.php'); 
include('functions.php'); 
ob_start();
?>
    <?php
if(!empty($_SESSION['Email']) || !empty($_SESSION['Password'])){
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
}else{
    $sessionId = '';
}
?>
<head>
    <meta charset="utf-8">
    <title>MultiShop - Online Shop Website Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="inc/img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">  

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="inc/lib/animate/animate.min.css" rel="stylesheet">
    <link href="inc/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="inc/css/login.css" rel="stylesheet">
    <link href="inc/css/style.css" rel="stylesheet">
    <?php include('layout/script.php'); ?>

<?php include("layout/LoginRegister.php"); ?>
</head>