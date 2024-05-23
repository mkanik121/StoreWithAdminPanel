<?php include('inc/header.php'); ?>
<?php
$id = '';$Title='';$Desc='';$Tag='';$CategoryId='';

if(isset($_GET['id'])){
  $id          = $_GET['id'];
  $row         = mysqli_fetch_assoc(mysqli_query($db,"SELECT * FROM post WHERE PostId = '$id'"));
  $Title       = $row['Title'];
  $Desc        = $row['Description'];
  $CategoryId  = $row['CategoryId'];
  $AuthorId    = $row['AuthorId'];
  $Tag         = $row['Tag'];
  $Status      = $row['Status'];
  $Image       = $row['Image'];
  $Date        = $row['Date'];
}

if(isset($_POST['submit'])){
   $Id = $_SESSION['UserId'] ; 
   $title      =  mysqli_real_escape_string($db,$_POST['title']);
   $desc       =  mysqli_real_escape_string($db,$_POST['desc']);
   $tag        =  mysqli_real_escape_string($db,$_POST['tag']);
   $categoryId =  $_POST['categoryId'];
   $images     = $_FILES['image']['name'];
   $image_url  = $_FILES['image']['tmp_name'];


  if($id !== ''){
    if(!empty($images)){
      $image = rand(0,500000).'_'.$images;
      move_uploaded_file($image_url,'inc/images/post/'.$image);
     $query = mysqli_query($db,"UPDATE post SET Title='$title',Description='$desc',CategoryId='$categoryId',Tag='$tag',Image='$image' WHERE PostId='$id'");
     if($query){
      header("location:manage_post.php");
     }else{
      die("mysqli_error".mysqli_error($db));
     }  
     unlink('inc/images/post/'.$Image);
    }else{
     $query = mysqli_query($db,"UPDATE post SET Title='$title',Description='$desc',CategoryId='$categoryId',Tag='$tag' WHERE PostId='$id'");
     if($query){
      header("location:manage_post.php");
     }else{
      die("mysqli_error".mysqli_error($db));
     }  

    }


  }else{
    $image = rand(0,500000).'_'.$images;
    move_uploaded_file($image_url,'inc/images/post/'.$image);
    $query  = mysqli_query($db,"INSERT INTO post(Title,Description,Tag,CategoryId,AuthorId,Image,Date)VALUES('$title','$desc','$tag','$categoryId','$Id','$image',now())"); 
   if($query){
      header("location:manage_post.php");
   }else{
      die("mysqli_error".mysqli_error($db));
   }  

  }
    
 
 
 
 
 }    ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

 <?php if($sessionRoll == 1 || $id == ''){  ?>

    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Post Page</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="add_post.php">Home</a></li>
              <li class="breadcrumb-item active">Add Post</li>
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

              <form action="" method="POST" enctype="multipart/form-data">
                    <div class="row">
                    <div class="col-lg-6">
                    <div class="form-group">
    <label>Title</label>
    <input type="Text" Name="title" class="form-control" placeholder="Post Title" value="<?php  echo $Title; ?>">
  </div>

    <div class="form-group">   
    <label>Select Category</label>
 <select name="categoryId" class="form-control">
 <option value="">Select Category</option>

           <?php  
        $query = mysqli_query($db,"SELECT * FROM category"); 
        while($row = mysqli_fetch_assoc($query)){ 
         if($row['Id'] == $CategoryId){ ?>
    <option value="<?php  echo $row['Id']; ?> " <?php echo 'selected'; ?>><?php  echo $row['CatName']; ?></option>
       <?php  }else{ ?>
        <option value="<?php  echo $row['Id']; ?> "><?php  echo $row['CatName']; ?></option>

      <?php   }
       }    ?>

  </select>
  </div>
  <div class="form-group">
    <label>Tag</label>
    <input type="Text" Name="tag" class="form-control" placeholder="Post Tag" value="<?php  echo $Tag; ?>">
  </div>
  <div class="form-group">
    <label>Image</label>
    <?php  
            if(!empty($Image)){ ?>
           <img src="inc/images/post/<?php echo $Image; ?>" alt="profile" width="50">
            <input type="File" class="form-control" name="image" placeholder="Image">
           <?php  }else{ ?>
            <input type="File" class="form-control" name="image" placeholder="Image">
          <?php  }  ?>
  </div>
                    
                    </div>
                    <div class="col-lg-6">
  <div class="form-group">
    <label>Description</label>
    <textarea name="desc" class="form-control" cols="30" rows="8"><?php  echo $Desc; ?></textarea>
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
<?php  }else{ 
  header("location:dashboard.php");
} ?>
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
