
<style>
  .gender{
    display:flex;
    flex-wrap: wrap;
  }.male{
    flex-basis:10%;
    margin:0 10px;

  }.female{
    flex-basis:10%;
    margin:0 10px;

  }
</style>
<?php include('inc/header.php'); ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
<?php if($sessionRoll == 1){   ?>

    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Users Page</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="add_user.php">Home</a></li>
              <li class="breadcrumb-item active">Add Users</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    
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


   if(isset($_GET['id'])){
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
   }
     
   if(isset($_POST['submit'])){
    $fname       = mysqli_real_escape_string($db,$_POST['FullName']);
    $email       = mysqli_real_escape_string($db,$_POST['Email']);
    $About       = mysqli_real_escape_string($db,$_POST['About']);
    $Password    = mysqli_real_escape_string($db,$_POST['Password']);
    $RePassword  = mysqli_real_escape_string($db,$_POST['RePassword']);
    $address     = mysqli_real_escape_string($db,$_POST['Address']);
    $uname       = str_replace(' ', '_', $fname.rand(1,100));
    $number      = $_POST['Mobile'];
    $gender      = $_POST['Gender'];
    $image       = $_FILES['Profile']['name'];
    $imageUrl    = $_FILES['Profile']['tmp_name'];
    $date        = $_POST['Date'];
        
     if($id == ''){
      $sql = "SELECT * FROM users WHERE Mobile = '$number'";
     }else{
      $sql = "SELECT * FROM users WHERE Mobile = '$number' and UserId != '$id'";
     }
     if(mysqli_num_rows(mysqli_query($db,$sql))>0){
      $Error = "Mobile Number All ready Exit";
     }else{
      if($id == ''){
        if($Password == $RePassword && $Password !== '' && $RePassword !== '' && strlen($Password) >=5){
        $password =  sha1($Password);
        if($image !== ''){
          $image = rand(0,500000).'_'.$image;
          move_uploaded_file($imageUrl,'inc/images/user/'.$image);
          $query =   mysqli_query($db,"INSERT INTO users (FullName,UserName,Email,About,Password,Address,Mobile,Gender,Image,Date)VALUES('$fname','$uname','$email','$About','$password','$address','$number','$gender','$image','$date')");
          if($query){
           header('location: manage_users.php');
         }else{
           die('mysqli_error'.mysqli_error($db));
         }

        }else{
          $query =   mysqli_query($db,"INSERT INTO users (FullName,UserName,Email,About,Password,Address,Mobile,Gender,Date)VALUES('$fname','$uname','$email','$About','$password','$address','$number','$gender','$date')");
          if($query){
           header('location: manage_users.php');
         }else{
           die('mysqli_error'.mysqli_error($db));
         }

        }
    }else{
      if($Password !== $RePassword){
        $PassError = "Password not match";
      }else if($Password == '' && $RePassword == ''){
        $PassBlank = "Plz Fill Your Password";
        }else if(strlen($Password) <=5){
          $PassLength = "Password Length to short";
        }else{
          $PassError = "Password not match";
        }
      }
  
       }else{  
        // UPDATE USER IMAGE
        if($image !== '' && $Password  !== ''){
          if($Password == $RePassword  && $Password !== '' && $RePassword !== '' && strlen($Password) >=5){
            $password =  sha1($Password);
          $image = rand(0,500000).'_'.$image;
          move_uploaded_file($imageUrl,'inc/images/user/'.$image);
          $query =   mysqli_query($db,"UPDATE users SET FullName='$fname',Email='$email',About='$About',Password='$password',Address='$address',Mobile='$number',Image='$image',Date='$date' WHERE UserID='$id'");
          if($query){
            header('location: manage_users.php');
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
          $query =   mysqli_query($db,"UPDATE users SET FullName='$fname',Email='$email',About='$About',Address='$address',Mobile='$number',Image='$image',Date='$date' WHERE UserID='$id'");
          if($query){
            header('location: manage_users.php');
          }else{
            die('mysqli_error'.mysqli_error($db));
          }
          unlink('inc/Images/user/'.$Image);

        }else if($image == '' && $Password  !== ''){
          if($Password == $RePassword  && $Password !== '' && $RePassword !== '' && strlen($Password) >=5){
            $password =  sha1($Password);
          $query =   mysqli_query($db,"UPDATE users SET FullName='$fname',Email='$email',About='$About',Password='$password',Address='$address',Mobile='$number',Date='$date' WHERE UserID='$id'");
          if($query){
            header('location: manage_users.php');
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
          $query =   mysqli_query($db,"UPDATE users SET FullName='$fname',Email='$email',About='$About',Address='$address',Mobile='$number',Date='$date' WHERE UserID='$id'");
          if($query){
            header('location: manage_users.php');
          }else{
            die('mysqli_error'.mysqli_error($db));
          }
        }

     
    }
    

      
     }


   }

?>


    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12">
            <div class="card">

            <div class="card card-primary card-outline">
              <div class="card-header">
                <h5 class="m-0">Users</h5>
              </div>
              <div class="card-body">

              <form action="" method="post" enctype="multipart/form-data">
   <!-- Row Start -->
    <div class="row">
                <div class="col-lg-6">
   <div class="form-group">
    <label>FullName</label>
    <input type="text" class="form-control" name="FullName" placeholder="Full Name" value="<?php echo $Fname; ?>">
  </div>
   <div class="form-group">
    <label>User Name</label>
      <input type="text" class="form-control" name="UserName" placeholder="User Name" value="<?php echo $Uname; ?>" disabled>

  </div>
   <div class="form-group">
    <label>Email</label>
    <input type="Email" class="form-control" name="Email" placeholder="Email" value="<?php echo $Email; ?>" required>
  </div>
  <div class="row">
    <div class="col-lg-6">
    <div class="form-group">
    <label>Password</label>
    <input type="text" class="form-control" name="Password" placeholder="******">
    <span class="text text-danger"><?php echo $PassError; ?></span>
    <span class="text text-danger"><?php echo $PassBlank; ?></span>
    <span class="text text-danger"><?php echo $PassLength; ?></span>
    
  </div>
    </div>
    <div class="col-lg-6">
    <div class="form-group">
    <label>Re Type Password</label>
    <input type="text" class="form-control" name="RePassword" placeholder="******">

  </div>

    </div>
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

            <div class="row">
      <div class="col-lg-6">
           <div class="form-group">
            <label>Mobile Number</label>
            <input type="Number" class="form-control" name="Mobile" placeholder="Mobile Number" value="<?php echo $Mnumber; ?>" required>
    <span class="text text-danger"><?php echo $Error; ?></span>
          </div>
     </div>
       <div class="col-lg-6">
            <div class="form-group ">
            <label>Gender</label>
            <div class="gender">
              <?php  
              if($Gender !== ''){ ?>
   Male  <input type="radio" class="form-control male" name="Gender" placeholder="Gender" value="1" <?php if($Gender == "1") { echo "checked"; } ?> disabled>
            Female  <input type="radio"  class="form-control female" name="Gender" placeholder="Gender" value="2" <?php if($Gender == "2") { echo "checked"; } ?> disabled> 
          
          <?php    }else{ ?>
  Male  <input type="radio" class="form-control male" name="Gender" placeholder="Gender" value="1" <?php if($Gender == "1") { echo "checked"; } ?> required>
  Female  <input type="radio"  class="form-control female" name="Gender" placeholder="Gender" value="2" <?php if($Gender == "2") { echo "checked"; } ?> required> 

           <?php   }
              ?>
          </div>
            </div>
            </div>
     <div class="col-lg-6">
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
     <div class="col-lg-6">
          <div class="form-group">
          <label>Date</label>
          <input type="date" class="form-control" name="Date" placeholder="Date" value="<?php echo $Date; ?>">
         </div>
     </div>
              </div>
                  </div>
            </div>
   <!-- Row SEndtart -->
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
  <?php }else{ 
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
