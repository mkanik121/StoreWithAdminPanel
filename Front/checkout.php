<!DOCTYPE html>
<html lang="en">

<?php include('layout/header.php'); ?>

<body>
    <!-- Topbar Start -->
 
    <!-- Topbar End -->
    <?php include('layout/nav.php'); ?>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  <?php
   if(isset($_GET['id'])){
  $id         = $_GET['id'];
  $sql        = mysqli_query($db, "SELECT * FROM users WHERE UserId = '$id'")->fetch_assoc();
  $CartSql    = mysqli_query($db, "SELECT * FROM cart WHERE UserId  = '$id'")->fetch_assoc(); $cartId = $CartSql['Id'];
  $ProductSql =  mysqli_query($db, "SELECT products.ProductId, products.Title, products.DiscountPrice, cart.Price FROM products INNER JOIN cart ON products.ProductId = cart.ProductId WHERE cart.UserId = '$id' ");


}
  

  ?>
    <!-- Checkout Start -->
    <div class="container-fluid">
        <form action="functions.php" method="POST" onsubmit="confirmSubmission(event)">
        <div class="row px-xl-5">
            <div class="col-lg-8">
                <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Billing Address</span></h5>
                <div class="bg-light p-30 mb-5">
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label>Full Name</label>
                            <input class="form-control" id="fullName" name="fullName" type="text" value="<?php echo $sql['FullName']; ?>" disabled>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>User Name</label>
                            <input class="form-control" id="userName" name="userName" type="text" value="<?php echo $sql['UserName']; ?>" disabled>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>E-mail</label>
                            <input class="form-control" id="email" name="email" type="text" value="<?php echo $sql['Email']; ?>" disabled>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Mobile No</label>
                            <input class="form-control" id="mobile" name="mobile" type="text" value="<?php echo $sql['Mobile']; ?>" required>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Delivery Address</label>
                            <input class="form-control" id="address" name="address" type="text" required>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>City</label>
                            <input class="form-control" id="city" name="city" type="text" required>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>ZIP Code</label>
                            <input class="form-control" id="zip" name="zip" type="text" required>
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
            </div>
            <div class="col-lg-4">
                <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Order Total</span></h5>
                <div class="bg-light p-30 mb-5">
                    <div class="border-bottom">
                        <h6 class="mb-3">Products</h6>
                        <?php  $I = 1; while($row = mysqli_fetch_assoc($ProductSql)){ ?>
                            <div class="d-flex justify-content-between">
                                <p><?php echo $I++; ?></p>
                                <p><?php echo substr($row['Title'],0,35); ?></p>
                                <p>$<?php echo $row['Price']; ?></p>
                           </div>
                       <?php  } ?>
                    </div>

           
                    <div class="border-bottom pt-3 pb-2">
                        <div class="d-flex justify-content-between mb-3">
                            <h6>Subtotal</h6>
                            <?php
                            $totalSql = mysqli_query($db,"SELECT * FROM cart WHERE UserId ='$id'");
                            $cartPrice = 0;
                            $DeliveryCharge = mysqli_num_rows($totalSql)*10;
                            while($row = $totalSql->fetch_assoc()){
                            $cartPrice += $row['Price']; }
                            $Total = $cartPrice; ?> 
                            <h6>$<?php echo $Total; ?></h6>
                        </div>
                        <div class="d-flex justify-content-between">
                            <h6 class="font-weight-medium">Shipping</h6>
                            <h6 class="font-weight-medium"><?php echo $DeliveryCharge; ?></h6>
                        </div>
                    </div>
                    <div class="pt-2">
                        <div class="d-flex justify-content-between mt-2">
                            <h5>Total</h5>
                            <h5>$
                            <?php
                                 $SubTotal = $cartPrice+$DeliveryCharge;
                                 echo $SubTotal; ?>
                            </h5>
                        </div>
                    </div>
                </div>
                <div class="mb-5">
                    <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Payment</span></h5>
                    <div class="bg-light p-30">
                        <div class="form-group">
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" name="payment" id="paypal" value="Paypal" required>
                                <label class="custom-control-label" for="paypal">Paypal</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" name="payment" id="directcheck" value="DirectCheck" required>
                                <label class="custom-control-label" for="directcheck">Direct Check</label>
                            </div>
                        </div>
                        <div class="form-group mb-4">
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" name="payment" id="banktransfer" value="BankTransfer" required>
                                <label class="custom-control-label" for="banktransfer">Bank Transfer</label>
                            </div>
                        </div>
                        
                        <div class="form-group mb-4">
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" name="payment" id="COD" value="COD" required>
                                <label class="custom-control-label" for="COD">Cash On Delivery</label>
                            </div>
                        </div>
                        <!-- <button class="btn btn-block btn-primary font-weight-bold py-3" type="submit">Place Order</button> -->
                        <input type="submit" name="checkout" class="btn btn-block btn-primary font-weight-bold py-3" value="Place Order">
                        <!-- <button class="btn btn-block btn-primary font-weight-bold py-3 checkout" onclick="checkout()" data-user="<?php  echo $id; ?>" data-product="<?php  echo $PId; ?>" data-cart="<?php  echo $cartId; ?>">Place Order</button> -->
                    </div>
                </div>
            </div>
        </div>
    </form>
 </div>
    <!-- Checkout End -->
<script>


function confirmSubmission(event) {
            if (!confirm("Are you sure you want to Order This Products?")) {
                event.preventDefault();
            }
        }







    $(document).ready( function(){
        $('.checkout').click( function(){


        var address    = $('#address').val();
        var city       = $('#city').val();
        var zip        = $('#zip').val();
        var radioData  = $("input[name='payment']:checked").val();
        var UserId     = $(this).data('user');
        var CartId     = $(this).data('cart');
        var PId        = $(this).data('product');
    $.ajax({
            url: 'functions.php',
            type: 'POST',
            data: {address:address,city:city,zip:zip,radioData:radioData,UserId:UserId,Cid:CartId,PId:PId},
            success: function(data){
                        if(data == 1){
                            alert("Data added successfully!");
                        }else{
                            alert("Data Can't added succesfully");
                        }
                    }
        })
    })
    });
</script>

<!-- Main Body End -->

    <!-- Back to Top -->
<?php include('layout/footer.php'); ?>

    <!-- JavaScript Libraries -->
    <?php include('layout/script.php'); ?>

</body>

</html>