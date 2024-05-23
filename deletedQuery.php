<?php include('inc/header.php');  
if($sessionRoll == 1){   


  if(isset($_GET['id']) && $_GET['type']){
    $id   = $_GET['id'];
    $type = $_GET['type'];

    if($type == 'CategoryDelete'){
      $row   = mysqli_fetch_assoc(mysqli_query($db,"SELECT * FROM category WHERE Id='$id'"));
      $IMAGE = $row['Image']; 

    $DeleteCat = "DELETE FROM category WHERE Id='$id'";
    $DeleteQuery = mysqli_query($db,$DeleteCat);
    if($DeleteQuery){
      header('location: manage_category.php');
    }else{
      die('mysqli_error'.mysqli_error($db));
    }
    unlink('Front/inc/img/category/'. $IMAGE);

  }else if($type == 'PostDelete'){
        $row=mysqli_fetch_assoc(mysqli_query($db,"SELECT * FROM post WHERE PostId='$id'"));
        $deletePostImage = $row['Image']; 
        $DeletePost = "DELETE FROM post WHERE PostId='$id'";
        $DeletePostQuery = mysqli_query($db,$DeletePost);
    if($DeletePostQuery){
      header('location: manage_post.php');
    }else{
      die('mysqli_error'.mysqli_error($db));
    }
    unlink('inc/images/post/'.$deletePostImage);
  }else if($type == 'ProductDelete'){
    $row=mysqli_fetch_assoc(mysqli_query($db,"SELECT * FROM products WHERE ProductId='$id'"));
    $deleteProductImage = $row['Thumbnail']; 
    $DeleteProduct = "DELETE FROM products WHERE ProductId='$id'";
    $DeleteProductQuery = mysqli_query($db,$DeleteProduct);
      if($DeleteProductQuery){
        header('location: manage_product.php');
      }else{
        die('mysqli_error'.mysqli_error($db));
      }
      unlink('inc/images/product/'.$deleteProductImage);
  }else if($type == 'UserDelete'){
      $row=mysqli_fetch_assoc(mysqli_query($db,"SELECT * FROM users WHERE UserId='$id'"));
      $deleteUserImage = $row['Image']; 
      $DeleteUser = "DELETE FROM users WHERE UserId='$id'";
      $DeleteUserQuery = mysqli_query($db,$DeleteUser);
      if($DeleteUserQuery){
        header('location: manage_users.php');
      }else{
        die('mysqli_error'.mysqli_error($db));
      }
      unlink('inc/images/user/'.$deleteUserImage);
  }else{
    $DeleteIdError = 'Delete Id Not Found';
  }
  }
 }else{
  header("location:dashboard.php");
    
 }

?>

<?php include('inc/footer.php');  ?>
  
