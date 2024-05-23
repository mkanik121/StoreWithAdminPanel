
<?php include('inc/header.php'); ?>

<?php
if($sessionRoll == 1){   ?> 


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
 
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Users Page</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="manage_users.php">Home</a></li>
              <li class="breadcrumb-item active">Manage Users</li>
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
      <th scope="col">Full Name</th>
      <th scope="col">Email</th>
      <th scope="col">About</th>
      <th scope="col">Mobile</th>
      <th scope="col">Gender</th>
      <th scope="col">Roll</th>
      <th scope="col">Status</th>
      <th scope="col">Adress</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php
      $i = 1;
      $ShowUser = mysqli_query($db,'SELECT * FROM users ORDER BY UserId DESC');
      while($row = mysqli_fetch_assoc($ShowUser)){
          $id = $row['UserId'];
        ?>
    <tr>
      <th scope="row"><?php  echo $i++; ?></th>
         <td>  
                <?php if($row['Image'] !== ''){?>
                <img src="inc/images/user/<?php  echo $row['Image']; ?>" alt="Profile" width="60">
                <?php }else{ ?>
                <img src="inc/images/user/demo.png" alt="Demo" width="60">
                <?php }  ?>
         </td>
      <td><?php  echo $row['FullName']; ?></td>
      <td><?php  echo $row['Email']; ?></td>
      <td><?php  echo $row['About']; ?></td>
      <td><?php  echo $row['Mobile']; ?></td>
      <td>  
         <?php  if($row['Gender'] == "1"){ ?>
            <span class="badge badge-success">Male</span>
         <?php }else{ ?>
            <span class="badge badge-info">Female</span>
         <?php  } ?>  
     </td>
     <td>  
<!-- Status  --> <?php if($sessionRoll == 1){  

           if($row['Roll'] == "1"){ ?>
           <a href="statusQuery.php?id=<?php echo $id; ?>&type=UserRollEdltor"><span class="badge badge-primary">Admin</span></a>
         <?php }else{ ?>
          <a href="statusQuery.php?id=<?php echo $id; ?>&type=UserRollAdmin"><span class="badge badge-warning">Editor</span></a><?php  } 
        }else{ 
          if($row['Roll'] == "1"){ ?>
           <a href="statusQuery.php?id=<?php echo $id; ?>&type=UserRollEdltor" class="disabled"><span class="badge badge-primary">Admin</span></a>
         <?php }else{ ?>
          <a href="statusQuery.php?id=<?php echo $id; ?>&type=UserRollAdmin" class="disabled"><span class="badge badge-warning">Editor</span></a><?php  } 

       } 
         
         ?>  
     </td>
     <td>  
<!-- Status  --> <?php if($sessionRoll == 1){  
         if($row['Status'] == "1"){ ?>
           <a href="statusQuery.php?id=<?php echo $id; ?>&type=UserPending" ><span class="badge badge-success">Active</span></a>
         <?php }else{ ?>
         <a href="statusQuery.php?id=<?php echo $id; ?>&type=UserActive" ><span class="badge badge-danger">Pending</span></a> <?php } ?>
         <?php   }else{  
          if($row['Status'] == "1"){ ?>
           <a href="statusQuery.php?id=<?php echo $id; ?>&type=UserPending" class="disabled"><span class="badge badge-success">Active</span></a>
         <?php }else{ ?>
         <a href="statusQuery.php?id=<?php echo $id; ?>&type=UserActive" class="disabled"><span class="badge badge-danger">Pending</span></a> <?php } ?></td>
       
        <?php } ?>


      <td><?php  echo $row['Address']; ?></td>
      <td>
        <a href="add_user.php?id=<?php echo $row['UserId']; ?>"><span class="btn btn-sm btn-success">Update</span></a>
      <a href="deletedQuery.php?id=<?php echo $row['UserId']; ?>&type=UserDelete"> <span class="btn btn-sm btn-danger">Delete</span></a>  

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
  <?php }else{ 
    header("location:dashboard.php");
} ?>
  <?php include('inc/footer.php'); ?>
