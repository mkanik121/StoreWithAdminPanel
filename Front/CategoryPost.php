<!DOCTYPE html>
<html lang="en">

<?php include('layout/header.php'); ?>

<body>
    <!-- Topbar Start -->
 
    <!-- Topbar End -->
    <?php include('layout/nav.php'); ?>

<!-- Main Body Start -->
    <!-- Products Start -->
    <div class="container-fluid pt-5 pb-3">
        <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3">Products</span></h2>
        <div class="row px-xl-5">

        <?php 
        if(isset($_GET['id'])){
            $catId = $_GET['id'];
        }
        $Sql = mysqli_query($db,"SELECT * FROM products WHERE ProductCategory = '$catId'");
         while($row = mysqli_fetch_assoc($Sql)){ ?>
            <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
                <div class="product-item bg-light mb-4">
                    <div class="product-img position-relative overflow-hidden">
                        <img class="img-fluid w-100" src="inc/img/product/<?php echo $row['Thumbnail']; ?>" alt="">
                        <div class="product-action">
                            <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-shopping-cart"></i></a>
                            <a class="btn btn-outline-dark btn-square" href=""><i class="far fa-heart"></i></a>
                            <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-sync-alt"></i></a>
                            <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-search"></i></a>
                        </div>
                    </div>
                    <div class="text-center py-4">
                        <a class="h6 text-decoration-none text-truncate" href="SingleProduct.php?id=<?php echo $row['ProductId']; ?>"><?php echo substr($row['Title'],0,40); ?></a>
                        <div class="d-flex align-items-center justify-content-center mt-2">
                            <h5><?php echo $row['DiscountPrice']; ?></h5><h6 class="text-muted ml-2"><del><?php echo $row['Price']; ?></del></h6>
                        </div>
                        <div class="d-flex align-items-center justify-content-center mb-1">
                            <small class="fa fa-star text-primary mr-1"></small>
                            <small class="fa fa-star text-primary mr-1"></small>
                            <small class="fa fa-star text-primary mr-1"></small>
                            <small class="fa fa-star text-primary mr-1"></small>
                            <small class="fa fa-star text-primary mr-1"></small>
                            <small>(99)</small>
                        </div>
                    </div>
                </div>
            </div>
<?php } ?>
        </div>
    </div>
    <!-- Products End -->

   <!-- Products Start -->
   <div class="container-fluid py-5">
        <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3">You May Also Like</span></h2>
        <div class="row px-xl-5">
            <div class="col">
                <div class="owl-carousel related-carousel">
                    <?php 
                    $category =  mysqli_query($db,"SELECT * FROM products WHERE ProductCategory ='$catId'");
                      while($row = mysqli_fetch_assoc($category)){ ?> 
                    <div class="product-item bg-light">
                        <div class="product-img position-relative overflow-hidden">
                            <img class="img-fluid w-100" src="inc/img/product/<?php echo $row['Thumbnail']; ?>" alt="">
                            <div class="product-action">
                                <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-shopping-cart"></i></a>
                                <a class="btn btn-outline-dark btn-square" href=""><i class="far fa-heart"></i></a>
                                <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-sync-alt"></i></a>
                                <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-search"></i></a>
                            </div>
                        </div>
                        <div class="text-center py-4">
                            <a class="h6 text-decoration-none text-truncate" href="SingleProduct.php?id=<?php echo $row['ProductId']; ?>"><?php echo substr($row['Title'],0,35); ?></a>
                            <div class="d-flex align-items-center justify-content-center mt-2">
                                <h5><?php echo $row['DiscountPrice']; ?></h5><h6 class="text-muted ml-2"><del><?php echo $row['Price']; ?></del></h6>
                            </div>
                            <div class="d-flex align-items-center justify-content-center mb-1">
                                <small class="fa fa-star text-primary mr-1"></small>
                                <small class="fa fa-star text-primary mr-1"></small>
                                <small class="fa fa-star text-primary mr-1"></small>
                                <small class="fa fa-star text-primary mr-1"></small>
                                <small class="fa fa-star text-primary mr-1"></small>
                                <small>(99)</small>
                            </div>
                        </div>
                    </div>
                    <?php  } ?>

                </div>
            </div>
        </div>
    </div>
    <!-- Products End -->



<!-- Main Body End -->

    <!-- Back to Top -->
<?php include('layout/footer.php'); ?>

    <!-- JavaScript Libraries -->
    <?php include('layout/script.php'); ?>

</body>

</html>