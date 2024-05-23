
<?php include('inc/header.php'); ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
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

              <style>   
               .content { opacity: 1; transition: all 0.3s ease; }
            </style>
     
 <div class="col-md-12 grid-margin stretch-card min-vh-100">
  
     <div class="card">
     <h1 class="card-title text-center text-dark">Customize Your Site</h1>

       <div class="card-body">
          <div class="row">
    <?php
    $sql = mysqli_query($db, "SELECT * FROM settings")->fetch_assoc();
    ?>
            <!-- Contact Information -->
            <div class="col-lg-4">
                  <button type="button" class="collapsible btn btn-block btn-success me-2 w-100">Contact Info</button>
                  <form action="setting_functions.php?contact&id=<?php echo $sql['id']; ?>" method="post" class="content">
                        <div class="form-group my-3">
                        <label>Site Title</label>
                        <input type="text" name="title" value="<?php echo $sql['SiteTitle']; ?>" class="form-control" placeholder="Site Title">
                        </div>
                        <div class="form-group mb-3">
                        <label>Site Description</label>
                        <input type="text" name="description" value="<?php echo $sql['Description']; ?>" class="form-control" placeholder="Site Description">
                        </div>
                        <div class="form-group mb-3">
                        <label>Contact Number</label>
                        <input type="text" name="phone" value="<?php echo $sql['Phone']; ?>" class="form-control" placeholder="Contact Number">
                        </div>
                        <div class="form-group mb-3">
                        <label>Contact Email</label>
                        <input type="text" name="email" value="<?php echo $sql['Email']; ?>" class="form-control" placeholder="Contact Email">
                        </div>
                        <div class="form-group mb-3">
                        <label>Copyright Notice</label>
                        <input type="text" name="copyright" value="<?php echo $sql['Notice']; ?>" class="form-control" placeholder="Copyright Notice">
                        </div>
                        <div class="form-group mb-3">
                        <label>Contact Address</label>
                        <textarea name="address" rows="1" class="form-control" placeholder="Contact Address"><?php echo $sql['Address']; ?></textarea>
                        </div>

                        <input type="submit"  class="btn btn-primary me-2" value="submit" >
                  </form>
            </div>

      <!-- Social Link -->
        <div class="col-lg-4">
          <button type="button" class="collapsible btn btn-block btn-info me-2 w-100">Social Link</button>

            <form action="setting_functions.php?social&id=<?php echo $sql['id']; ?>" method="post" class="content">
                  <div class="form-group my-3">
                  <label>Facebook </label>
                  <i class="fa fa-facebook"></i>
                  <input type="text" name="facebook" value="<?php echo $sql['Facebook']; ?>" class="form-control" placeholder="facebook">
                  </div>
                  <div class="form-group mb-3">
                  <label>Google Plus </label>
                  <i class="fa fa-google-plus"></i>
                  <input type="text" name="google" value="<?php echo $sql['Google']; ?>" class="form-control" placeholder="Google Plus">
                  </div>
                  <div class="form-group mb-3">
                  <label>Youtube </label>
                  <i class="fa fa-youtube"></i>
                  <input type="text" name="youtube" value="<?php echo $sql['Youtube']; ?>" class="form-control" placeholder="youtube">
                  </div>
                  <div class="form-group mb-3">
                  <label>Linkedin </label>
                  <i class="fa fa-linkedin"></i>
                  <input type="text" name="linkedin" value="<?php echo $sql['Linkedin']; ?>" class="form-control" placeholder="Linkedin">
                  </div>
                  <div class="form-group mb-3">
                  <label>Twitter </label>
                  <i class="fa fa-twitter"></i>
                  <input type="text" name="twitter" value="<?php echo $sql['Twitter']; ?>" class="form-control" placeholder="Twitter">
                  </div>
                  <div class="form-group mb-3">
                  <label>Whatsapp </label>
                  <i class="fa fa-whatsapp"></i>
                  <input type="text" name="whatsapp" value="<?php echo $sql['Whatsapp']; ?>" class="form-control" placeholder="Whatsapp">
                  </div>

                  <input type="submit"  class="btn btn-primary me-2" value="submit">
            </form>
        </div>

                  <!-- Site Logo -->
                  <div class="col-lg-4">
                  <button type="button" class="collapsible btn btn-block btn-primary me-2 w-100">Site Logo</button>
                        <form action="setting_functions.php?logo&id=<?php echo $sql['id']; ?>" method="post" enctype="multipart/form-data" class="content">
                              <div class="form-group my-3">
                              <label>Header Logo </label>
                              <input type="file" name="header_logo" value="" class="form-control" placeholder="Header Logo" id="headerlogo">
                              </div>                                                                                
                              <div class="mb-3">
                              <label for="exampleInputPassword1" class="form-label"></label> <?php $header = $sql['HeaderLogo']; ?>
                              <img class="rounded-circle" src="<?php if(!empty($header)){  echo 'inc/images/logo/'.  $header;   }else{ ?> inc/images/logo/no_image.jpg <?php } ?>" alt="" id="showHeader" width="50">
                              </div>


                              <div class="form-group mb-3">
                              <label>Footer Logo</label>
                              <input type="file" name="footer_logo" value="" class="form-control" placeholder="Footer Logo" id="Footerlogo">
                              </div>
                              <div class="mb-3">
                              <label for="exampleInputPassword1" class="form-label"></label><?php $footer = $sql['FooterLogo']; ?>
                              <img class="rounded-circle" src="<?php if(!empty($footer)){  echo 'inc/images/logo/'.  $footer;   }else{ ?> inc/images/logo/no_image.jpg <?php } ?>" alt="" id="showFooter" width="50">
                              </div>
                              <input type="submit"  class="btn btn-primary me-2" value="submit">
                        </form>
                   </div>
               </div>
					
         </div>
    </div>
 </div>



         
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


   <!-- Header Logo  -->
   <script type="text/javascript">
                $(document).ready(function(){
                    $('#headerlogo').change(function(e){
                    var reader = new FileReader();
                    reader.onload = function(e){
                        $('#showHeader').attr('src',e.target.result);
                    }
                    reader.readAsDataURL(e.target.files['0']);
                    });

                });
                </script>
   <!-- Footer Logo  -->
                                    <script type="text/javascript">
                                          $(document).ready(function(){
                                                $('#Footerlogo').change(function(e){
                                                var reader = new FileReader();
                                                reader.onload = function(e){
                                                      $('#showFooter').attr('src',e.target.result);
                                                }
                                                reader.readAsDataURL(e.target.files['0']);
                                                });

                                          });
                                          </script>


<script>
      var coll = document.getElementsByClassName("collapsible");
var i;

for (i = 0; i < coll.length; i++) {
  coll[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var content = this.nextElementSibling;
    if (content.style.opacity === "1") {
      content.style.opacity = "0";     
    } else {
      content.style.opacity = "1";     
    }
  });
}
</script>



  <?php include('inc/footer.php'); ?>
