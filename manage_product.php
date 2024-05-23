
<?php include('inc/header.php'); ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Product Page</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="manage_product.php">Home</a></li>
              <li class="breadcrumb-item active">Manage Page</li>
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
                <h5 class="m-0">Products</h5>
              </div>
              <div class="card-body">
              <table class="table">
        <?php   
           $Total_Items = $db->query("SELECT * FROM products ORDER BY ProductId DESC")->num_rows;
           $Page = isset($_GET['page']) && is_numeric($_GET['page']) ? $_GET['page']:1;

           $ItemsNumberPerPage = 5;

           if($stmp = $db->prepare("SELECT * FROM products LIMIT ?,?")){
            $CalCulate = ($Page-1) * $ItemsNumberPerPage;
            $stmp->bind_param("ii",$CalCulate,$ItemsNumberPerPage);
            $stmp->execute();
            $result = $stmp->get_result();

           }



         ?>
  <thead class="thead-dark">
    <tr>
      <th scope="col">#Sl</th>
      <th scope="col">Thumbnail</th>
      <th scope="col">Title</th>
      <th scope="col">Category</th>
      <th scope="col">Posted By</th>
      <th scope="col">Status</th>
      <th scope="col">Quantity</th>
      <th scope="col">Date</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $i = 1;
     $ProductQuery = mysqli_query($db,"SELECT * FROM products ORDER BY ProductId ASC");
     while($row= $result->fetch_assoc()){ 
              $ProductId = $row['ProductId'];
              $ProductCategory = $row['ProductCategory'];
              $ProductPosted   = $row['ProductPosted'];
              ?>
    <tr>
      <th scope="row"><?php echo $i++; ?></th>
      <td>
          <?php   if(!empty($row['Thumbnail'])){ ?>
          <img src="inc/images/product/<?php echo $row['Thumbnail']; ?>" alt="Image" width="60">

          <?php }else{ ?>
          <img src="inc/images/product/demo.png" alt="Image" width="60">
      <?php  }  ?>
    </td>
      <td><?php echo substr($row['Title'],0,20);  ?></td>
      <!-- category Name --> <?php $ProductCatInner = mysqli_fetch_assoc(mysqli_query($db,"SELECT * FROM category WHERE Id = '$ProductCategory'")); ?>
    <td><?php if(!empty($ProductCatInner['CatName'])){
      echo $ProductCatInner['CatName'];
    }else{
      echo 'uncategorized';
    };  ?></td><!-- category Name -->
    <!-- Posted by --> <?php  $PostProduct = mysqli_fetch_assoc(mysqli_query($db,"SELECT * FROM users WHERE UserId = '$ProductPosted'")); ?>
    <td><?php if(!empty($PostProduct['FullName'])){ echo $PostProduct['FullName'];}else{ echo 'unknown';}  ?></td><!-- Posted by  -->

<!-- Status  --> <?php if($sessionRoll == 1){   ?>
      <td>  <?php  if($row['Status'] == "1"){ ?><a href="statusQuery.php?id=<?php echo $ProductId; ?>&type=ProductPending"> <span class="badge badge-success">Active</span></a>
        <?php }else{ ?><a href="statusQuery.php?id=<?php echo $ProductId; ?>&type=ProductActive"><span class="badge badge-info">Pending</span><?php  } ?></a></td> <!-- Status  -->
     <?php }else{ ?> 
<!-- Status  --><td>  <?php  if($row['Status'] == "1"){ ?><a href="statusQuery.php?id=<?php echo $ProductId; ?>&type=ProductPending" class="disabled"> <span class="badge badge-success">Active</span></a>
        <?php }else{ ?><a href="statusQuery.php?id=<?php echo $ProductId; ?>&type=ProductActive" class="disabled"><span class="badge badge-info">Pending</span></a></td><?php  } ?> 
    <?php } ?><!-- Status  -->

      <td><?php echo $row['Quantity'];  ?></td>
      <td><?php echo $row['Date'];  ?></td>
      <td>
          <?php 
        if($sessionRoll == 1){   ?> 
         <a href="add_product.php?id=<?php echo $row['ProductId']; ?>"> <span class="btn btn-sm btn-success">Update</span></a>  
         <a href="deletedQuery.php?id=<?php echo $row['ProductId']; ?>&type=ProductDelete"> <span class="btn btn-sm btn-danger">Delete</span></a>  
       <?php }else{ ?>     
         <a href="add_product.php?id=<?php echo $row['ProductId']; ?>" class="disabled"> <span class="btn btn-sm btn-success">Update</span></a>  
         <a href="deletedQuery.php?id=<?php echo $row['ProductId']; ?>&type=ProductDelete" class="disabled"> <span class="btn btn-sm btn-danger">Delete</span></a>  
          <?php  } ?>
    </td>
    
    </tr>
   <?php  } ?>

  </tbody>
</table>
         
              </div>
        <?php 
           if(ceil($Total_Items / $ItemsNumberPerPage)>0): ?>
        
              <div class="card-footer clearfix">
                <ul class="pagination pagination-sm m-0 float-right">
<!-- Previous Page  Start-->
                 <?php  if($Page > 1) : ?>
                <li class="page-item">
                    <a class="page-link" href="manage_product.php?page=<?php echo $Page-1; ?>">&laquo;</a>
                 </li> 
                 <?php  else: ?>
                  <li class="page-item">
                    <a class="page-link disabled" href="">&laquo;</a>
                 </li> 
                 <?php  endif; ?>
<!-- Previous Page End -->    

                 <?php if($Page >3): ?>
                  <li class="page-item">
                    <a class="page-link" href="manage_product.php?page=1">1</a>
                 </li>    
                 <li class="page-item">
                    <a class="page-link disabled" href="">...</a>
                 </li> 
                 <?php  endif; ?>

<!-- Page Decrement Start-->                        
                  <?php if($Page-2 >0): ?>
                    <li class="page-item">
                    <a class="page-link" href="manage_product.php?page=<?php echo $Page-2; ?>"><?php echo $Page-2; ?></a>
                 </li>    
                 <?php  endif; ?>
                 <?php if($Page-1 >0): ?>
                    <li class="page-item">
                    <a class="page-link" href="manage_product.php?page=<?php echo $Page-1; ?>"><?php echo $Page-1; ?></a>
                 </li>    
                 <?php  endif; ?>
<!--  Page Decrement End -->                        
                 
                    

<!--  CUREENT PAGE START -->
                 <li class="page-item active">
                    <a class="page-link" href="manage_product.php?page=<?php echo $Page; ?>"><?php echo $Page; ?></a>
                 </li>  
<!--  CUREENT PAGE END -->



<!-- Page Increment Start-->                        
       <?php if($Page == ceil($Total_Items / $ItemsNumberPerPage)-1) : ?>
                   <li class="page-item">
                        <a class="page-link" href="manage_product.php?page=<?php echo $Page+1; ?>"><?php echo $Page+1; ?></a>
                    </li> 
               <?php  else: ?>

               <?php if($Page+1 < ceil($Total_Items / $ItemsNumberPerPage)+1) : ?>
                        <li class="page-item">
                        <a class="page-link" href="manage_product.php?page=<?php echo $Page+1; ?>"><?php echo $Page+1; ?></a>
                    </li> 
                <?php  endif; ?>

                <?php if($Page+2 < ceil($Total_Items / $ItemsNumberPerPage)+2) : ?>
                        <li class="page-item">
                        <a class="page-link" href="manage_product.php?page=<?php echo $Page+2; ?>"><?php echo $Page+2; ?></a>
                    </li> 
                <?php  endif; ?>
        <?php  endif; ?>
<!-- Page Increment End-->                        


           <?php if($Page < ceil($Total_Items / $ItemsNumberPerPage)) : ?>
            <li class="page-item">
                    <a class="page-link disabled" href="">...</a>
                 </li> 
            <?php  endif; ?>



<!-- Next Page  Start-->
             <?php  if($Page < ceil($Total_Items / $ItemsNumberPerPage)): ?>
                 <li class="page-item">
                <a class="page-link" href="manage_product.php?page=<?php echo $Page+1; ?>">&raquo;</a>
               </li>
               <?php  else: ?>
                <li class="page-item">
                <a class="page-link disabled" href="">&raquo;</a>
               </li>
                <?php  endif; ?>
<!-- Next Page  End -->

                 </ul>
              </div>

            <?php  endif; ?>


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
