<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="inc/lib/easing/easing.min.js"></script>
    <script src="inc/lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Contact Javascript File -->
    <script src="inc/mail/jqBootstrapValidation.min.js"></script>
    <script src="inc/mail/contact.js"></script>

    <!-- Template Javascript -->
    <script src="inc/js/main.js"></script>

    <script>



        $(document).ready(function(){

    // Add To Cart
            $(".add-to-cart").click(function(){
                var product_id = $(this).attr('data-id');
                $.ajax({
                    url: 'functions.php',
                    type: 'post',
                    data: {id: product_id},
                    success: function(response){
                        showCart();

                    }

                });

            });

    // Show Cart In Nav Section
    showCart();
         function showCart() {
           $.ajax({
            url: "show_cart.php",
            method: "POST",
            success: function(data) {
                $('#AddCart').html(data);
                    }
                });
            }


    // Load Cart

            function loadCart() {
           $.ajax({
            url: 'load_cart.php',
            method: 'GET',
            success: function(data) {
                $('#cart').html(data);
                    }
                });
            }

    // Initial load of cart items
    loadCart();


    // Cart Increase

    $('.CartPlus').click(function(){
        var result = $(this).attr('data-id');
                 $.ajax({
                    url: 'functions.php',
                    type: 'post',
                    data: {PlusId: result},
                    success: function(response){
                        // alert("Product added to cart successfully!");
                    }
                });
       })

           // Cart decrement

    $('.CartMinus').click(function(){
        var result = $(this).attr('data-id');
                 $.ajax({
                    url: 'functions.php',
                    type: 'post',
                    data: {MinusId: result},
                    success: function(response){
                        // alert("Product added to cart successfully!");
                    }
                });
       })


    // Delete Cart

       $(".delete_cart").click(function(){
        var DeleteCart = $(this).attr('data-id');

        $.ajax({
            url: 'functions.php',
            type: 'get',
            data: {delete_cart: DeleteCart},
            success: function(){
                loadCart();
    showCart();

                // alert("Succesfully Delete Cart Item");
            }
        })
       });
       
        });

    </script>
 


    <?php ob_end_flush(); ?>