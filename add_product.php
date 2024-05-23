
<?php include('inc/header.php'); 

$title='';
$desc='';
$sdesc='';
$price='';
$discount='';
$cupon='';
$quantity='';
$thumbnail='';
$ProductCategory='';
?>
   <!-- ProductId`, `Title`, `Description`, `ShortDesc`, `Price`, `DiscountPrice`,
               `CuponCode`, `ProductCategory`, `Status`, `Quantity`, `Thumbnail`, `Date` -->
   <?php
     if(isset($_GET['id'])){
      $id = $_GET['id'];
      $row = mysqli_fetch_assoc(mysqli_query($db,"SELECT * FROM products WHERE ProductId = '$id'"));
      $title =  $row['Title'];
      $desc = $row['Description'];
      $sdesc = $row['ShortDesc'];
      $price = $row['Price'];
      $discount = $row['DiscountPrice'];
      $cupon = $row['CuponCode'];
      $ProductCategory = $row['ProductCategory'];
      $status = $row['Status'];
      $quantity = $row['Quantity'];
      $thumbnail = $row['Thumbnail'];
      $date = $row['Date'];
    }
      
  
     if(isset($_POST['submit'])){
     $Title               = mysqli_real_escape_string($db,$_POST['title']);
     $Desc                = mysqli_real_escape_string($db,$_POST['desc']);
     $Sdesc               = mysqli_real_escape_string($db,$_POST['sdesc']);
     $Price               = mysqli_real_escape_string($db,$_POST['price']);
     $Discount            = mysqli_real_escape_string($db,$_POST['discount']);
     $Cupon               = mysqli_real_escape_string($db,$_POST['cupon']);
     $Quantity            = $_POST['quantity'];
     $productCategory     = $_POST['ProductCategory'];
     $Thumbnails           = $_FILES['thumbnail']['name'];
     $Thumbnail_url       = $_FILES['thumbnail']['tmp_name'];

  if($id == ""){
      $Thumbnails = rand(0,500000).'_'.$Thumbnails;
      move_uploaded_file($Thumbnail_url,"inc/images/product/".$Thumbnails);
      $query = mysqli_query($db,"INSERT INTO products (Title,Description,ShortDesc,Price,DiscountPrice,CuponCode,ProductPosted,Quantity,ProductCategory,Thumbnail,Date)VALUES('$Title','$Desc','$Sdesc','$Price','$Discount','$Cupon','$sessionId','$Quantity','$productCategory','$Thumbnails',now())");
      if($query){
        header("location:manage_product.php");
      }else{
        die("mysqli_error".mysqli_error($db));
      }
  }else{
    if(!empty($Thumbnails)){
      $Thumbnails = rand(0,500000).'_'.$Thumbnails;
      move_uploaded_file($Thumbnail_url,"inc/images/product/".$Thumbnails);
      $query = mysqli_query($db,"UPDATE products SET Title='$Title',Description='$Desc',ShortDesc='$Sdesc',Price='$Price',DiscountPrice='$Discount',CuponCode='$Cupon',Quantity='$Quantity',ProductCategory='$productCategory',Thumbnail='$Thumbnails' WHERE ProductId='$id'");
      if($query){
        header("location:manage_product.php");
      }else{
        die("mysqli_error".mysqli_error($db));
      }
      unlink("inc/images/product/".$thumbnail);


    }else{
      $query = mysqli_query($db,"UPDATE products SET Title='$Title',Description='$Desc',ShortDesc='$Sdesc',Price='$Price',DiscountPrice='$Discount',CuponCode='$Cupon',Quantity='$Quantity',ProductCategory='$productCategory' WHERE ProductId='$id'");
      if($query){
        header("location:manage_product.php");
      }else{
        die("mysqli_error".mysqli_error($db));
      }
    }
     
     }
   
    }

?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  <?php if($sessionRoll == 1 || $id == ''){  ?>

    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Starter Page</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Starter Page</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12">
            <div class="card">
             
            <div class="card card-primary card-outline">
              <div class="card-header">
                <h5 class="m-0">Featured</h5>
              </div>
              <div class="card-body">
              <form action="" method="post" enctype="multipart/form-data">
                <div class="row">
                <div class="col-lg-6">
   <div class="form-group">
    <label>Title</label>
    <input type="text" name="title" class="form-control"  placeholder="Product Title" value="<?php echo $title; ?>">
  </div>
   <div class="row">
    <div class="col-lg-6">
  <div class="form-group">
    <label>Price</label>
    <input type="text" name="price" class="form-control"  placeholder="Product Price" value="<?php echo $price; ?>">
  </div>
    </div>
    <div class="col-lg-6">

  <div class="form-group">
    <label>Discount</label>
    <input type="text" name="discount" class="form-control"  placeholder="Product Discount" value="<?php echo $discount; ?>">
  </div>
      </div>
       </div>

<div class="row">
<div class="col-lg-4">
  <div class="form-group">
    <label>Cupon</label>
    <input type="text" name="cupon" class="form-control"  placeholder="Cupon Code" value="<?php echo $cupon; ?>">
  </div>
    </div>

    <div class="col-lg-4">
  <div class="form-group">
    <label>Quantity</label>
    <input type="number" name="quantity" class="form-control"  placeholder="Quantity" value="<?php echo $quantity; ?>">
  </div>

     </div>
<div class="col-lg-4">
  <div class="form-group">
  <label>Select A Category</label>
  <select name="ProductCategory" class="form-control">
 <option value="">Select Category</option>
         <?php  
        $query = mysqli_query($db,"SELECT * FROM category"); 
        while($row = mysqli_fetch_assoc($query)){ 
         if($row['Id'] == $ProductCategory){ ?>
    <option value="<?php  echo $row['Id']; ?> " <?php echo 'selected'; ?>><?php  echo $row['CatName']; ?></option>
       <?php  }else{ ?>
        <option value="<?php  echo $row['Id']; ?> "><?php  echo $row['CatName']; ?></option>
      <?php   }   }    ?>
  </select>
    </div>
      </div>
</div>

<div class="form-group">
    <label>Thumbnail</label>
    <?php  
            if(!empty($thumbnail)){ ?>    
           <img src="inc/images/product/<?php echo $thumbnail; ?>" alt="thumbnail" width="50">
           <input type="File" class="form-control" name="thumbnail" placeholder="Image">

           <?php  }else{ ?>
            <input type="File" class="form-control" name="thumbnail" placeholder="Image">
          <?php  }  ?>
  </div>

         </div>


<div class="col-lg-6">
  <div class="form-group">
    <label>Description</label>
    <textarea name="desc" class="form-control" placeholder="Product Description" cols="30" rows="5"><?php echo $desc; ?></textarea>

  </div>
  <div class="form-group">
    <label>Short Description</label>
    <textarea name="sdesc" class="form-control" placeholder="Product Short Description" cols="30" rows="4"><?php echo $sdesc; ?></textarea>
  </div>
          </div>
       </div>

                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                </form>
         
              </div>
            </div>
          </div>
          <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <?php }else{ 
    header("location:dashboard.php");
  }?>
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside>
  <!-- /.control-sidebar -->
  <?php include('inc/footer.php'); ?>
