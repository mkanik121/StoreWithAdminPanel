<?php include('../inc/db.php'); 
    session_start();
    $LogInError = '';
     //REGISTATION QUERY

     if(isset($_POST['register'])){

     $fullName              = $_POST['full_name'];
     $email                 = $_POST['email'];
     $address               = $_POST['address'];
     $phone                 = $_POST['phone'];
     $password              = $_POST['password'];
     $confirm_password      = $_POST['confirm_password'];
     $gender                = $_POST['gender'];
     $userName              = str_replace(' ', '_', $fullName.rand(1,100));


        if($password == $confirm_password){
          $Password  = sha1($password);
        $RegisterSql = mysqli_query($db,"INSERT INTO users (FullName,UserName,Email,Address,Mobile,Gender,Password,Date)VALUES('$fullName','$userName','$email','$address','$phone','$gender','$Password',now())");
         if($RegisterSql){
          header("location:index.php");
         }else{
          die("mysqli_error".mysqli_error($db));
         }
        }else{
          ?>
       <script> alert('password does not match');
     window.history.back();
      </script>
    <?php
    } 
  
  }

      //LOGIN QUERY
      if(isset($_POST['login'])){
        $email               = $_POST['email'];
        $password            = $_POST['password'];
        $Pass = sha1($password);

        $row = mysqli_fetch_assoc(mysqli_query($db,"SELECT * FROM users WHERE Email ='$email'"));

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

        if($email == $_SESSION['Email'] && $Pass == $_SESSION['Password']){
          header("Location: {$_SERVER['HTTP_REFERER']}");
        }else{
          session_destroy();
          header("Location: {$_SERVER['HTTP_REFERER']}");
        }
      };

      //LOGOUT QUERY
      if(isset($_GET['logout'])){
        session_start();
        session_unset();
        session_destroy();
        header("Location: {$_SERVER['HTTP_REFERER']}");
      }


    
      // adding item to cart
      if(isset($_POST['id'])){
        $productId                  = $_POST['id'];
        $sessionId                  = $_SESSION['UserId'];
        $row                        = mysqli_query($db,"SELECT * FROM products WHERE ProductId ='$productId'")->fetch_assoc();
        $price                      = $row['DiscountPrice'];
        $quantity                   = $row['Quantity'];
        $ProductExisting            = mysqli_query($db,"SELECT * FROM cart WHERE ProductId ='$productId' AND UserId = '$sessionId'")->fetch_assoc();
        // $ProductExisting = mysqli_query($db,"SELECT cart.ProductId, products.ProductId FROM cart INNER JOIN products ON cart.ProductId = products.ProductId WHERE UserId = '$sessionId'")->fetch_assoc();

        $CartId     = $ProductExisting['Id'];
        $CartUserId = $ProductExisting['UserId'];
       if($ProductExisting > 0){
        $Price = $ProductExisting['Price']+$price;
        $Quantity = $ProductExisting['Quantity']+1;
        $sql = "UPDATE cart SET Price='$Price', Quantity='$Quantity' WHERE Id = '$CartId' AND UserId = '$sessionId'";
       if ($db->query($sql) === TRUE) {
            echo "Product added to cart!";
        } else {
            echo "Error: " . $sql . "<br>" . $db->error;
        }
      }else{
          // Insert product into database
          $sql = "INSERT INTO cart (UserId,ProductId,Price,Quantity,Date) VALUES ('$sessionId','$productId','$price',1,now())";
          if ($db->query($sql) === TRUE) {
              echo "Product added to cart!";
          } else {
              echo "Error: " . $sql . "<br>" . $db->error;
          }
      }
   }
  



       // Cart Increase
       if(isset($_POST['PlusId'])){
        
        $id = $_POST['PlusId'];
     
        $ProductExisting            = mysqli_query($db,"SELECT * FROM cart WHERE Id ='$id'")->fetch_assoc();
        
        $cartId                     = $ProductExisting['ProductId'];

        $row                        = mysqli_query($db,"SELECT * FROM products WHERE ProductId ='$cartId'")->fetch_assoc();
        $price                      = $row['DiscountPrice'];
        $Quantity                   = $ProductExisting['Quantity']+1;
        $Price                      = $ProductExisting['Price']+$price;


        $sql = "UPDATE cart SET Quantity='$Quantity', Price='$Price' WHERE Id = '$id'";
        if ($db->query($sql) === TRUE) {
            echo "Product added to cart!";
        } else {
            echo "Error: " . $sql . "<br>" . $db->error;
        }
        
       }

         // Cart decrement
         if(isset($_POST['MinusId'])){
        
          $id = $_POST['MinusId'];
       
          $ProductExisting            = mysqli_query($db,"SELECT * FROM cart WHERE Id ='$id'")->fetch_assoc();
          
          $cartId                     = $ProductExisting['ProductId'];
  
          $row                        = mysqli_query($db,"SELECT * FROM products WHERE ProductId ='$cartId'")->fetch_assoc();
          $price                      = $row['DiscountPrice'];
          $Quantity                   = $ProductExisting['Quantity']-1;
          $Price                      = $ProductExisting['Price']-$price;
  
  
          $sql = "UPDATE cart SET Quantity='$Quantity', Price='$Price' WHERE Id = '$id'";
          if ($db->query($sql) === TRUE) {
              echo "Product added to cart!";
          } else {
              echo "Error: " . $sql . "<br>" . $db->error;
          }
          
         }





      // Cart Delete Query

      if(isset($_GET['delete_cart'])){
        $id  = $_GET['delete_cart'];
        $sql = mysqli_query($db,"DELETE FROM cart WHERE Id='$id'");
        if ($db->query($sql) === TRUE) {
          echo "Deleted to cart!";
        } else {
            echo "Error: " . $sql . "<br>" . $db->error;
        }
          }


      // All Cart Delete Query
    if(isset($_GET['AllCartDelete'])){
      $sessionId           = $_SESSION['UserId'];

      $sql = mysqli_query($db,"DELETE FROM cart WHERE UserId='$sessionId'");
      if($sql){
        header('location:cart.php');
      }else{
        die("mysqli error". mysqli_error($db));
      }
    }
   



       //WISH LIST QUERY
      if(isset($_GET['wish'])){
        if(!empty($_SESSION['Email'])){
          $id = $_GET['id'];
          $sessionId           = $_SESSION['UserId'];
          $sql = mysqli_query($db,"INSERT INTO wish(UserId,ProductId,Date)VALUES('$sessionId','$id',now())");
          if($sql){
            header('location:index.php');
          }else{
            die("mysqli error". mysqli_error($db));
          }
        }else{
          $_SESSION['status'] = "Plz Login First";
          header("Location: {$_SERVER['HTTP_REFERER']}");
        }
        }

     function GetCart(){
      $sql = mysqli_query($db,"SELECT * FROM cart");
      return mysqli_query($db,$sql);

     }





     // CheckOut Query
     if(isset($_POST['checkout'])){
      $id           = $_SESSION['UserId'];

      $sql        = mysqli_query($db, "SELECT * FROM users WHERE UserId = '$id'")->fetch_Assoc();
      $CartSql    = mysqli_query($db, "SELECT * FROM cart WHERE UserId  = '$id'");
      $ProductSql =  mysqli_query($db, "SELECT products.ProductId, products.Title, products.DiscountPrice, cart.Price,cart.Id FROM products INNER JOIN cart ON products.ProductId = cart.ProductId WHERE cart.UserId = '$id' ");
    
      $CheckSql = $db->prepare("INSERT INTO myorder(CartId,UserId,ProductId,Title,Price,Mobile,Payment,Address,City,Zip,Date)VALUES(?,?,?,?,?,?,?,?,?,?,now())");
      $CheckSql->bind_param("dddsddsssd",$CartId,$UserId,$ProductId,$Title,$Price,$mobile,$payment,$Address,$City,$Zip,);


      $UserId       =  $sql['UserId'];
      $mobile       =  $_POST['mobile'];
      $payment      =  $_POST['payment'];
      $Address      =  $_POST['address'];
      $City         =  $_POST['city'];
      $Zip          =  $_POST['zip'];

      foreach($ProductSql as $key => $value){
      $Title      = $value['Title'];
      $Price = $value['Price'];
      $ProductId = $value['ProductId'];
      $CartId = $value['Id'];
      $CheckSql->execute();
      }
      $sql = mysqli_query($db,"DELETE FROM cart WHERE UserId='$id'");

      if($sql){
        header('location:cart.php');

      }else{
        die("mysqli error". mysqli_error($db));
      }

      }

      //  Contact Us

      if(isset($_POST['contact'])){
        // $Usersql        = mysqli_query($db, "SELECT * FROM users WHERE UserId = '$id'")->fetch_Assoc();
        $id             = $_SESSION['UserId'];
        $name           = $_SESSION['FullName'];
        $email          = $_SESSION['Email'];
        $subject        = mysqli_real_escape_string($db,$_POST['subject']);
        $message        = mysqli_real_escape_string($db,$_POST['message']);
        

        $sql = mysqli_query($db,"INSERT INTO inbox (UserId,Name,Email,Subject,Message,Date)VALUES('$id','$name','$email','$subject','$message',now())");

      if($sql){
        header("Location: {$_SERVER['HTTP_REFERER']}");

      }else{
        die("mysqli error". mysqli_error($db));

      }
      }
       ?>