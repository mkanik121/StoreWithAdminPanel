<?php include('inc/header.php'); ?>

 

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Contacts</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Contacts</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card card-solid h-75">
        <div class="card-body">
          <div class="row d-flex align-items-stretch h-75">
          <div class="col-lg-6 col-sm-6 col-md-4 d-flex align-items-stretch">
              <div class="card bg-light">
                <div class="card-header text-muted border-bottom-0">
                <?php
          if($sessionRoll == 1){ ?>
          Admin

        <?php  }else{ ?>
          Editor

          <?php } ?>
                </div>
                <div class="card-body ">
                  <div class="row">
                    <div class="col-6">
                      <h2 class="lead"><b><?php echo $sessionFullName; ?></b></h2>
                      <p class="text-muted text-sm"><b>About: </b><?php echo $sessionAbout; ?> </p>
                      <ul class="ml-4  fa-ul text-muted">
                        <li class="small py-1"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span> Phone #: <?php echo $sessionMobile; ?></li>
                        <li class="small py-1"><span class="fa-li"><i class="fas fa-lg fa-envelope"></i></span> Mail #: <?php echo $sessionEmail; ?></li>
                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span> Address: <?php echo $sessionAddress; ?></li>
                     
                    </ul>
                    </div>
                    <div class="col-6 text-center ">
                      <img src="inc/images/user/<?php echo $_SESSION['Image']; ?>" alt=""width="250px" class="rounded shadow-sm img-fluid">
                    </div>
                  </div>
                </div>
                <div class="card-footer">
                  <div class="text-right">
                    <a href="#" class="btn btn-sm bg-teal">
                      <i class="fas fa-comments"></i>
                    </a>
                    <a href="profile.php?id=<?php echo $sessionId; ?>" class="btn btn-sm btn-primary">
                      <i class="fas fa-user"></i> Update Profile
                    </a>
                  </div>
                </div>
              </div>
            </div>


         

         
<?php
$id = '';
$Fname = '';
$Uname = '';
$Email = '';
$Password = '';
$password = '';
$Address = '';
$Mnumber = '';
$Date = '';
$Gender = '';
$gender = '';
$Image = '';
$Error = '';
$query = '';
$PassBlank = '';
$PassError = '';
$PassLength = '';
$about = '';



    if(isset($_GET['id']) && $sessionRoll == 2){
        $id          = $_GET['id'];
        $row         = mysqli_fetch_assoc(mysqli_query($db, "SELECT * FROM users WHERE UserId = '$id'"));
         
        $Fname       = $row['FullName'];
        $Uname       = $row['UserName'];
        $Email       = $row['Email'];
        $about       = $row['About'];
        $Password    = $row['Password'];
        $Address     = $row['Address'];
        $Mnumber     = $row['Mobile'];
        $Gender      = $row['Gender'];
        $Image       = $row['Image'];
        $Date        = $row['Date'];
       
         
       if(isset($_POST['submit'])){
        $fname       = mysqli_real_escape_string($db,$_POST['FullName']);
        $email       = mysqli_real_escape_string($db,$_POST['Email']);
        $About       = mysqli_real_escape_string($db,$_POST['About']);
        $Password    = mysqli_real_escape_string($db,$_POST['Password']);
        $RePassword  = mysqli_real_escape_string($db,$_POST['RePassword']);
        $address     = mysqli_real_escape_string($db,$_POST['Address']);
        $number      = $_POST['Mobile'];
        $image       = $_FILES['Profile']['name'];
        $imageUrl    = $_FILES['Profile']['tmp_name'];
            
         if($id == ''){
          $sql = "SELECT * FROM users WHERE Mobile = '$number'";
         }else{
          $sql = "SELECT * FROM users WHERE Mobile = '$number' and UserId != '$id'";
         }
         if(mysqli_num_rows(mysqli_query($db,$sql))>0){
          $Error = "Mobile Number All ready Exit";
         }else{
      
            // UPDATE USER IMAGE
            if($image !== '' && $Password  !== ''){
              if($Password == $RePassword  && $Password !== '' && $RePassword !== '' && strlen($Password) >=5){
                $password =  sha1($Password);
              $image = rand(0,500000).'_'.$image;
              move_uploaded_file($imageUrl,'inc/images/user/'.$image);
              $query =   mysqli_query($db,"UPDATE users SET FullName='$fname',Email='$email',About='$About',Password='$password',Address='$address',Mobile='$number',Image='$image' WHERE UserID='$id'");
              if($query){
                header('location: profile.php');
              }else{
                die('mysqli_error'.mysqli_error($db));
              }
              unlink('inc/Images/user/'.$Image);
            
            }else{
              if($Password !== $RePassword){
                $PassError = "Password not match";
              }else if($Password == '' && $RePassword == ''){
                $PassBlank = "Plz Fill Your Password";
                }else if(strlen($Password) <=5){
                  $PassLength = "Password to short";
                }else{
                  $PassError = "Password not match";
                }
              }
            }else if($image !== '' && $Password  == ''){
              $image = rand(0,500000).'_'.$image;
              move_uploaded_file($imageUrl,'inc/images/user/'.$image);
              $query =   mysqli_query($db,"UPDATE users SET FullName='$fname',Email='$email',About='$About',Address='$address',Mobile='$number',Image='$image' WHERE UserID='$id'");
              if($query){
                header('location: profile.php');
              }else{
                die('mysqli_error'.mysqli_error($db));
              }
              unlink('inc/Images/user/'.$Image);
    
            }else if($image == '' && $Password  !== ''){
              if($Password == $RePassword  && $Password !== '' && $RePassword !== '' && strlen($Password) >=5){
                $password =  sha1($Password);
              $query =   mysqli_query($db,"UPDATE users SET FullName='$fname',Email='$email',About='$About',Password='$password',Address='$address',Mobile='$number' WHERE UserID='$id'");
              if($query){
                header('location: profile.php');
              }else{
                die('mysqli_error'.mysqli_error($db));
              }
            }else{
              if($Password !== $RePassword){
                $PassError = "Password not match";
              }else if($Password == '' && $RePassword == ''){
                $PassBlank = "Plz Fill Your Password";
                }else if(strlen($Password) <=5){
                  $PassLength = "Password to short";
                }else{
                  $PassError = "Password not match";
                }
             }
            }else{
              $query =   mysqli_query($db,"UPDATE users SET FullName='$fname',Email='$email',About='$About',Address='$address',Mobile='$number' WHERE UserID='$id'");
              if($query){
                header('location: profile.php');
              }else{
                die('mysqli_error'.mysqli_error($db));
              }
            }
    
         
        
         }
    
          
         
    
    
       }
    


?>
      <div class="col-lg-6 col-sm-6 col-md-4 d-flex align-items-stretch">
              <div class="card bg-light">
                <div class="card-header text-muted border-bottom-0">

                <form action="" method="post" enctype="multipart/form-data">
   <!-- Row Start -->
    <div class="row">
                <div class="col-lg-6">
   <div class="form-group">
    <label>FullName</label>
    <input type="text" class="form-control" name="FullName" placeholder="Full Name" value="<?php echo $Fname; ?>">
  </div>

   <div class="form-group">
    <label>Email</label>
    <input type="Email" class="form-control" name="Email" placeholder="Email" value="<?php echo $Email; ?>" required>
  </div>

    <div class="form-group">
    <label>Password</label>
    <input type="text" class="form-control" name="Password" placeholder="******">
    <span class="text text-danger"><?php echo $PassError; ?></span>
    <span class="text text-danger"><?php echo $PassBlank; ?></span>
    <span class="text text-danger"><?php echo $PassLength; ?></span>
    
    </div>
    <div class="form-group">
    <label>Re Type Password</label>
    <input type="text" class="form-control" name="RePassword" placeholder="******">


  </div>

                </div>
                <div class="col-lg-6">

                <div class="form-group">
    <label>Address</label>
    <textarea name="Address" class="form-control" placeholder="Address" cols="30" rows="1"><?php echo $Address; ?></textarea>
    </div>

     <div class="form-group">
    <label>About Me</label>
    <textarea name="About" class="form-control" placeholder="About Me" cols="30" rows="1"><?php echo $about; ?></textarea>
    </div>

           <div class="form-group">
            <label>Mobile Number</label>
            <input type="Number" class="form-control" name="Mobile" placeholder="Mobile Number" value="<?php echo $Mnumber; ?>" required>
    <span class="text text-danger"><?php echo $Error; ?></span>
          </div>


          <div class="form-group">
            <label>Profile Image</label>
            <?php  
            if(!empty($Image)){ ?>
           <img src="inc/images/user/<?php echo $Image; ?>" alt="profile" width="50">
            <input type="File" class="form-control" name="Profile" placeholder="Image">
           <?php  }else{ ?>
            <input type="File" class="form-control" name="Profile" placeholder="Image">
          <?php  }  ?>
          

            </div>
       

  
              </div>
                  </div>
   <!-- Row SEndtart -->
   <div class="form-group">

<button type="submit"  name="submit" class="btn btn-primary ">Submit</button>
</div>
              
</form>

                </div>
          
             
              </div>
            </div>
        
      <?php 
   }else{
                // header('location: profile.php');

   } ?>

          </div>
          
        </div>
        <!-- /.card-body -->
      
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <?php include('inc/footer.php'); ?>

