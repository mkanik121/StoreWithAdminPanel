
<?php include('inc/header.php'); ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Category Page</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="add_category.php">Home</a></li>
              <li class="breadcrumb-item active">Add Category</li>
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
                <h5 class="m-0">Category</h5>
              </div>
              <div class="card-body">
    <?php
   $CATNAME  = '';
   $DESC     = '';
   $IMAGE    = '';
   $DATE     = '';
   $Error    = '';
   $id       = '';
   $id       = '';
    if(isset($_GET['id'])){
      $id      = $_GET['id'];
      $row     = mysqli_fetch_assoc(mysqli_query($db, "SELECT * FROM category WHERE Id = '$id'"));
      $CATNAME = $row['CatName'];
      $DESC    = $row['Description'];
      $IMAGE   = $row['Image'];
      $DATE    = $row['Date'];
   
    }
    if(isset($_POST['submit'])){
    $category       =   mysqli_real_escape_string($db,$_POST['category']);
    $desc           =   mysqli_real_escape_string($db,$_POST['desc']);
    $date           = $_POST['date'];
    $images         = $_FILES['image']['name'];
    $image_tmp      = $_FILES['image']['tmp_name'];

        if($id == ''){
              $sql = "SELECT * FROM category WHERE CatName = '$category'";
        }else{
          $sql = "SELECT * FROM category WHERE CatName = '$category' and Id!='$id'";
        }
       if(mysqli_num_rows(mysqli_query($db,$sql))>0){
             $Error = "Category All ready Exit";
       }else{
       if($id !== ''){
        if($images !== ''){
          $image = rand(0,500000).'_'.$images;
          move_uploaded_file($image_tmp,'Front/inc/img/category/'.$image);
          $query = mysqli_query($db, "UPDATE category SET CatName='$category',Description='$desc',Image='$image' WHERE Id = '$id'");
          if($query){
            header('location: manage_category.php');
          }else{
            die('mysqli_error'.mysqli_error($db));
          }
          unlink('Front/inc/img/category/'. $IMAGE);
        }else{
          $query = mysqli_query($db, "UPDATE category SET CatName='$category',Description='$desc' WHERE Id = '$id'");
        }
       
         if($query){
          header('location: manage_category.php');
        }else{
          die('mysqli_error'.mysqli_error($db));
        }

       }else{


        $image = rand(0,500000).'_'.$images;
        move_uploaded_file($image_tmp,'Front/inc/img/category/'.$image);
        $query = mysqli_query($db, "INSERT INTO category (CatName,Description,Image,Date)VALUES('$category','$desc','$image','$date')");
        if($query){
          header('location: manage_category.php');
        }else{
          die('mysqli_error'.mysqli_error($db));
        }
    }
  } }
 
    ?>
              <form action="" method="post" enctype="multipart/form-data">
  <div class="form-group">
    <label>Category Name</label>
    <input type="text" class="form-control" name="category" placeholder="Category Name" value="<?php echo $CATNAME; ?>" required>
      <span class="text text-danger"><?php echo $Error; ?></span>
  </div>
  <div class="form-group">
    <label>Description</label>
    <textarea name="desc" class="form-control" cols="30" rows="6"><?php echo $DESC; ?></textarea>
  </div>
  <div class="form-group">
  <?php if($DATE == ''){ ?>
  <input type="date" name="date" placeholder="Date" value="<?php echo $DATE; ?>">
  <?php }{ ?> 
    <?php } ?>
   </div>
   <div class="form-group">
    <label>Image</label>
  <?php if($IMAGE == ''){ ?>
    <input type="File" class="form-control" name="image" required>
    <?php }else{ ?>
    <input type="File" class="form-control" name="image">
    <?php } ?>
  </div>
  <div class="form-group">
  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
  </div>
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
