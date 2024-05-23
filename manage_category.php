
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
              <li class="breadcrumb-item"><a href="manage_category.php">Home</a></li>
              <li class="breadcrumb-item active">Manage Category</li>
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
      <th scope="col">Name</th>
      <th scope="col">Description</th>
      <th scope="col">Date</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php
      $i = 1;
      $ShowUser = mysqli_query($db,'SELECT * FROM category');
      while($row = mysqli_fetch_assoc($ShowUser)){ ?>
    <tr>
      <th scope="row"><?php  echo $i++; ?></th>
      <td>
       <?php   if(!empty($row['Image'])){ ?>
     <img src="Front/inc/img/category/<?php echo $row['Image']; ?>" alt="Image" width="60">
        <?php }else{ ?>
          <img src="Front/inc/img/category/no_image.jpg" alt="Image" width="60">
      <?php  }  ?>
    </td>
      <td><?php  echo $row['CatName']; ?></td>
      <td><?php  echo substr($row['Description'],0,40); ?></td>
      <td><?php  echo $row['Date']; ?></td>
      <td>
      <a href="add_category.php?id=<?php echo $row['Id']; ?>"> <span class="btn btn-sm btn-success">Update</span></a>  
      <?php
        if($sessionRoll == 1 ){ ?>
      <a href="deletedQuery.php?id=<?php echo $row['Id']; ?>&type=CategoryDelete"> <span class="btn btn-sm btn-danger">Delete</span></a>       
      <?php  }else{ ?>
        <a href="deletedQuery.php?id=<?php echo $row['Id']; ?>&type=CategoryDelete" class="disabled"> <span class="btn btn-sm btn-danger">Delete</span></a>       
        <?php } ?>
        
    </td>
  
    </tr>
<?php   }

   ?>

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
