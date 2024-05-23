<!DOCTYPE html>
<html lang="en">

<?php include('layout/header.php'); ?>

<body>
    <!-- Topbar Start -->
 
    <!-- Topbar End -->
    <?php include('layout/nav.php'); ?>








    <?php  
 

 if(isset($_GET['profileId'])){

    $id         = $_GET['profileId'];
    $sql        = mysqli_query($db, "SELECT * FROM users WHERE UserId = '$id'")->fetch_assoc();
    $CartSql    = mysqli_query($db, "SELECT * FROM cart WHERE UserId  = '$id'")->fetch_assoc();
 }

?>


                <div class="bg-light p-30 mb-5">
      <form action="functions.php" method="post">
l
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label>Full Name</label>
                            <input class="form-control" type="text" value="<?php echo $sql['FullName']; ?>" disabled>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>User Name</label>
                            <input class="form-control" type="text" value="<?php echo $sql['UserName']; ?>" disabled>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>E-mail</label>
                            <input class="form-control" type="text" value="<?php echo $sql['Email']; ?>" disabled>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Mobile No</label>
                            <input class="form-control" name="mobile" type="text" value="<?php echo $sql['Mobile']; ?>">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Address</label>
                            <input class="form-control" name="address" type="text" value="<?php echo $sql['Address']; ?>">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>City</label>
                            <input class="form-control" name="city" type="text" >
                        </div>
                        <div class="col-md-6 form-group">
                            <label>ZIP Code</label>
                            <input class="form-control" name="zip" type="text" >
                        </div>
                        <button class="btn btn-block btn-primary font-weight-bold py-3" type="submit">Update Info</button>

                    </div>
      </form>

                </div>

    <!-- Main Body End -->

    <!-- Back to Top -->
<?php include('layout/footer.php'); ?>

<!-- JavaScript Libraries -->

</body>

</html>