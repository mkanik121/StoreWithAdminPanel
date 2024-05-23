<?php
include('../inc/db.php'); 
session_start();
if(!empty($_SESSION['Email']) || !empty($_SESSION['Password'])){
$sessionId           = $_SESSION['UserId'];

    $cart = mysqli_query($db,"SELECT * FROM cart WHERE UserId ='$sessionId'");
    if(!empty($sessionId)){ echo $cart->num_rows;  }else{ echo 0;}
}else{
    echo 0;
$sessionId = '';

}


?>