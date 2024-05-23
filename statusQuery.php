<?php include('inc/header.php'); ?>
<?php
$id = '';$Title='';$Desc='';$Tag='';$CategoryId='';
if(isset($_GET['id']) && $_GET['type']){
  $Type  =  $_GET['type'];
  $id          = $_GET['id'];
}

$Postrow         = mysqli_fetch_assoc(mysqli_query($db,"SELECT * FROM post WHERE PostId = '$id'"));
$PostStatus      = $Postrow['Status'];

$Productrow         = mysqli_fetch_assoc(mysqli_query($db,"SELECT * FROM products WHERE ProductId = '$id'"));
$ProductStatus      = $Productrow['Status'];

$Usersrow         = mysqli_fetch_assoc(mysqli_query($db,"SELECT * FROM users WHERE UserId = '$id'"));
$UserStatus      = $Usersrow['Status'];

$UserRollsrow         = mysqli_fetch_assoc(mysqli_query($db,"SELECT * FROM users WHERE UserId = '$id'"));
$UserRollStatus      = $UserRollsrow['Roll'];

if($Type == 'PostActive' || $Type== 'PostPending'){
   $PostStatus = 1;
if($Type == 'PostPending'){
   $PostStatus=2;
}
  $PostStatusQuery = mysqli_query($db,"UPDATE post SET Status = '$PostStatus' WHERE PostId = '$id'");
  if($PostStatusQuery){
    header("location:manage_post.php");
   }else{
    die("mysqli_error".mysqli_error($db));
   }  }else if($Type == 'ProductActive' || $Type== 'ProductPending'){
      $ProductStatus = 1;
   if($Type == 'ProductPending'){
      $ProductStatus=2;
   }
     $ProductStatusQuery = mysqli_query($db,"UPDATE products SET Status = '$ProductStatus' WHERE ProductId = '$id'");
     if($ProductStatusQuery){
       header("location:manage_product.php");
      }else{
       die("mysqli_error".mysqli_error($db));
      } 
 }else if($Type == 'UserActive' || $Type== 'UserPending'){
   $UserStatus = 1;
if($Type == 'UserPending'){
   $UserStatus=2;
}
  $UserStatusQuery = mysqli_query($db,"UPDATE users SET Status = '$UserStatus' WHERE UserId = '$id'");
  if($UserStatusQuery){
    header("location:manage_users.php");
   }else{
    die("mysqli_error".mysqli_error($db));
   } 
}else if($Type == 'UserRollAdmin' || $Type== 'UserRollEdltor'){
   $UserRollStatus = 1;
if($Type == 'UserRollEdltor'){
   $UserRollStatus=2;
}
  $UserRollStatusQuery = mysqli_query($db,"UPDATE users SET Roll = '$UserRollStatus' WHERE UserId = '$id'");
  if($UserRollStatusQuery){
    header("location:manage_users.php");
   }else{
    die("mysqli_error".mysqli_error($db));
   } 
}
include('inc/footer.php'); ?>
