<!DOCTYPE html>
<html lang="en">

<?php include('layout/header.php'); 

?>

<body>
    <!-- Topbar Start -->
 
    <!-- Topbar End -->
    <?php include('layout/nav.php'); ?>

<!-- Main Body Start -->
    <!-- Breadcrumb Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-12">
                <nav class="breadcrumb bg-light mb-30">
                    <a class="breadcrumb-item text-dark" href="#">Home</a>
                    <a class="breadcrumb-item text-dark" href="#">Shop</a>
                    <span class="breadcrumb-item active">Shopping Cart</span>
                </nav>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->
<div id="cart">

</div>
            

    <!-- Cart Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-lg-8 table-responsive mb-5">
                <table class="table table-light table-borderless table-hover text-center mb-0">
                    <thead class="thead-dark">
                        <tr>
                            <th>Products</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total</th>
                            <th>Remove</th>
                        </tr>
                    </thead>
                    <tbody class="align-middle CartList">
                    <?php  
                $id = '';

         if(isset($_GET['CartPage'])){
                $id = $_GET['id'];
          

        $sql = mysqli_query($db,"SELECT * FROM cart WHERE UserId ='$id'");
        while($row = mysqli_fetch_assoc($sql)){
        $productId = $row['ProductId'];
        $product = mysqli_query($db,"SELECT * FROM products WHERE ProductId ='$productId'");
        while($show = mysqli_fetch_assoc($product)){ ?>
                        <tr>
                            <td class="align-middle"><img src="inc/img/product/<?php echo $show['Thumbnail']; ?>" alt="" style="width: 50px;"><?php echo substr($show['Title'],0,10); ?></td>
                            <td class="align-middle">$<?php echo $show['DiscountPrice']; ?></td>
                            <td class="align-middle">
                                <div class="input-group quantity mx-auto" style="width: 100px;">
                                    <div class="input-group-btn">
                                        <button class="btn btn-sm btn-primary btn-minus" >
                                        <i class="fa fa-minus"></i>
                                        </button>
                                    </div>
                                    <input type="text" class="form-control form-control-sm bg-secondary border-0 text-center plus" value="<?php echo $row['Quantity']; ?>">
                                    <div class="input-group-btn">
                                        <button class="btn btn-sm btn-primary btn-plus CartPlus" data-id="<?php echo $row['Id']; ?>">
                                            <i class="fa fa-plus"></i>
                                        </button>
                                    </div>
                                </div>
                            </td>
                            <td class="align-middle">$<?php echo $row['Price']; ?></td>
                            <td class="align-middle"><button class="btn btn-sm btn-danger"><a class="delete_cart" data-id="<?php echo $row['Id'];  ?> style="color:#fff;"><i class="fa fa-times"></i></a></button></td>
                      
                        </tr>
                        <?php }  } } ?>
                      




                    </tbody>
                    
                </table>
                <a href="functions.php?AllCartDelete" class="btn btn-block btn-danger">Delete All Cart</a>

            </div>
            <div class="col-lg-4">
                <form class="mb-30" action="">
                    <div class="input-group">
                        <input type="text" class="form-control border-0 p-4" placeholder="Coupon Code">
                        <div class="input-group-append">
                            <button class="btn btn-primary">Apply Coupon</button>
                        </div>
                    </div>
                </form>
                <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Cart Summary</span></h5>
                <div class="bg-light p-30 mb-5">
                    <div class="border-bottom pb-2">
                        <div class="d-flex justify-content-between mb-3">
                            <h6>Subtotal</h6>
                            <h6>$<?php
        $totalSql = mysqli_query($db,"SELECT * FROM cart WHERE UserId ='$id'");
        $cartPrice = 0;
        $DeliveryCharge = mysqli_num_rows($totalSql)*10;
        while($row = $totalSql->fetch_assoc()){
        $cartPrice += $row['Price']; }
        $Total = $cartPrice;
        echo $Total;
        ?> 
                            </h6>
                        </div>
                        <div class="d-flex justify-content-between">
                            <h6 class="font-weight-medium">Shipping</h6>
                            <h6 class="font-weight-medium">$<?php if(mysqli_num_rows($totalSql) > 0){ echo $DeliveryCharge;}else{ echo '0';} ?>
                            </h6>
                        </div>
                    </div>
                    <div class="pt-2">
                        <div class="d-flex justify-content-between mt-2">
                            <h5>Total</h5>
                            <h5>$<?php if(mysqli_num_rows($totalSql) > 0){ 
                                  echo  $SubTotal = $cartPrice+$DeliveryCharge; }else{ echo '0';}  ?>
                            </h5>
                        </div>
                        <?php  

                        if( mysqli_num_rows($totalSql) > 0){ ?>
                        <a href="checkout.php?id=<?php  echo $id; ?>" class="btn btn-block btn-primary font-weight-bold my-3 py-3">Proceed To Checkout</a>
                      <?php  }else{ ?>
                        <a href="" class="btn btn-block btn-primary font-weight-bold my-3 py-3 disabled">Proceed To Checkout</a>
                    <?php    } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Cart End -->


<!-- Main Body End -->

    <!-- Back to Top -->
<?php include('layout/footer.php'); ?>

    <!-- JavaScript Libraries -->
    <?php include('layout/script.php'); ?>

</body>

</html>