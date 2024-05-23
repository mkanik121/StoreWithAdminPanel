<!DOCTYPE html>
<html lang="en">

<?php include('layout/header.php'); ?>

<body>
    <!-- Topbar Start -->
 
    <!-- Topbar End -->
    <?php include('layout/nav.php'); ?>

<!-- Main Body Start -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    
<script>
        $(document).ready(function(){
            $(".add-to-cart").click(function(){
                var product_id = $(this).attr('data-id');
                $.ajax({
                    url: 'add_to_cart.php',
                    type: 'post',
                    data: {id: product_id},
                    success: function(response){
                        alert("Product added to cart successfully!");
                    }
                });
            });
        });
    </script>
</head>
<body>
<?php 
        $Sql = mysqli_query($db,"SELECT * FROM products ORDER BY ProductId DESC LIMIT 1");
         while($row = mysqli_fetch_assoc($Sql)){ ?>
    <div class="product" id="product1">
        <h2>Product 1</h2>
        <p>Price: $10</p>
        <button class="add-to-cart" data-id="<?php echo $row['ProductId']; ?>">Add to Cart</button>
    </div>
    <div class="product" id="product2">
        <h2>Product 2</h2>
        <p>Price: $15</p>
        <button class="add-to-cart" data-id="<?php echo $row['ProductId']; ?>">Add to Cart</button>
    </div>
<?php } ?>
<!-- Main Body End -->

    <!-- Back to Top -->
<?php include('layout/footer.php'); ?>

    <!-- JavaScript Libraries -->
    <?php include('layout/script.php'); ?>

</body>

</html>