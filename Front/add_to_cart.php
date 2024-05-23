<?php include('../inc/db.php'); 
session_start();



  
  // Simulate adding item to cart
  if(isset($_POST['id'])){
      $productId = $_POST['id'];
      
          // Add product to session cart
          $_SESSION['cart'][] = $productId;    
          $sessionId           = $_SESSION['UserId'];

          // Insert product into database
          $sql = "INSERT INTO cart (UserId,ProductId,Date) VALUES ('$sessionId',$productId,now())";
          if ($db->query($sql) === TRUE) {
              echo "Product added to cart!";
          } else {
              echo "Error: " . $sql . "<br>" . $db->error;
          }
      
  }
  
  $db->close();
  ?>
  