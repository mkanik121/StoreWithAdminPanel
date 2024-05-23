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
                            <label>Address Line 1</label>
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
                        <div class="col-md-12 form-group">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="newaccount">
                                <label class="custom-control-label" for="newaccount">Create an account</label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="shipto">
                                <label class="custom-control-label" for="shipto"  data-toggle="collapse" data-target="#shipping-address">Ship to different address</label>
                            </div>
                        </div>
                    </div>
                </div>

    <!-- Main Body End -->

    <!-- Back to Top -->
<?php include('layout/footer.php'); ?>

<!-- JavaScript Libraries -->
<?php include('layout/script.php'); ?>

</body>

</html>