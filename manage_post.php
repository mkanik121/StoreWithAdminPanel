
<?php include('inc/header.php');  ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Post Page</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="manage_post.php">Home</a></li>
              <li class="breadcrumb-item active">Manage Post</li>
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
     
              <table class="table">
  <thead class="thead-dark">
  <tr>
      <th scope="col">#Sl</th>
      <th scope="col">Image</th>
      <th scope="col">Title</th>
      <th scope="col">Desc</th>
      <th scope="col">Tag</th>
      <th scope="col">Category</th>
      <th scope="col">Author</th>
      <th scope="col">Status</th>
      <th scope="col">Date</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  <?php  
$i = 1;
$ShowPost = mysqli_query($db,"SELECT * FROM post ORDER BY PostId ASC");
    while($row=mysqli_fetch_assoc($ShowPost)){
      $CategoryId = $row['CategoryId'];
      $AuthorId   = $row['AuthorId'];
          ?>
  <tr>
      <th scope="row"><?php  echo $i++; ?></th>
      <td>
       <?php   if(!empty($row['Image'])){ ?>
     <img src="inc/images/post/<?php echo $row['Image']; ?>" alt="Image" width="60">
        <?php }else{ ?>
          <img src="inc/images/post/demo.png" alt="Image" width="60">
      <?php  }  ?>
    
    </td>
      <td><?php echo substr($row['Title'],0,10)  ?></td>
      <td><?php echo substr($row['Description'],0,20)  ?></td>
      <td><?php echo $row['Tag'];  ?></td>
<!-- category Name --> <?php $PostCatInner = mysqli_fetch_assoc(mysqli_query($db,"SELECT * FROM category WHERE Id = '$CategoryId'")); ?>
    <td><?php if(!empty($PostCatInner['CatName'])){
      echo $PostCatInner['CatName'];
    }else{
      echo 'uncategorized';
    };  ?></td><!-- category Name -->

<!-- Author Name --> <?php  $PostUserInner = mysqli_fetch_assoc(mysqli_query($db,"SELECT * FROM users WHERE UserId = '$AuthorId'")); ?>
    <td><?php echo $PostUserInner['FullName'];  ?></td><!-- Author Name  -->

<!-- Status  --><?php if($sessionRoll == 1){   ?>
<td>  <?php  if($row['Status'] == "1"){ ?><a href="statusQuery.php?id=<?php echo $row['PostId'] ?>&type=PostPending"><span class="badge badge-success">Active</span></a>
  <?php }else{ ?><a href="statusQuery.php?id=<?php echo $row['PostId'] ?>&type=PostActive"><span class="badge badge-info">Pending</span><?php  } ?> </td></a><!-- Status  -->

 <?php }else{ ?> 
 <!-- Status  --> <td>  <?php  if($row['Status'] == "1"){ ?><a href="statusQuery.php?id=<?php echo $row['PostId'] ?>&type=PostPending" class="disabled"><span class="badge badge-success">Active</span></a>
  <?php }else{ ?><a href="statusQuery.php?id=<?php echo $row['PostId'] ?>&type=PostActive" class="disabled"><span class="badge badge-info">Pending</span><?php  } ?> </td></a>
 <?php } ?><!-- Status  -->

      <td><?php echo $row['Date'];  ?></td>
      <td>
      <?php
  if($sessionRoll == 1){   ?>
      <a href="add_post.php?id=<?php echo $row['PostId']; ?>"> <span class="btn btn-sm btn-success">Update</span></a>  
      <a href="deletedQuery.php?id=<?php echo $row['PostId']; ?>&type=PostDelete"> <span class="btn btn-sm btn-danger">Delete</span></a>  
     
   <?php }else{ ?> 
        <a href="add_post.php?id=<?php echo $row['PostId']; ?>" class="disabled"> <span class="btn btn-sm btn-success">Update</span></a>  
        <a href="deletedQuery.php?id=<?php echo $row['PostId']; ?>&type=PostDelete" class="disabled"> <span class="btn btn-sm btn-danger">Delete</span></a>    
        <?php    } ?>
       </td>
    </tr>
    <?php  }  ?>
  </tbody>
     
</table>
         
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
