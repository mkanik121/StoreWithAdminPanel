<?php
  

  $Db_Host = 'localhost';
  $Db_User = 'root';
  $Db_Pass = '';
  $Db_Name = 'store';

  $db =  mysqli_connect($Db_Host,$Db_User,$Db_Pass ,$Db_Name);

 
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