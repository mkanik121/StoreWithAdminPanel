<?php include('../inc/db.php'); 
session_start();

 if(isset($_GET['id'])){
     $id = $_GET['id'];
$sql = mysqli_query($db,"SELECT * FROM cart WHERE UserId ='$id'");
while($row = mysqli_fetch_assoc($sql)){
$productId = $row['ProductId'];
$product = mysqli_query($db,"SELECT * FROM products WHERE ProductId ='$productId'");
while($show = mysqli_fetch_assoc($product)){ 


   echo '<div class="container-fluid">
    <div class="row px-xl-5">
        <div class="col-lg-8 table-responsive mb-5">
            <table class="table table-light table-borderless table-hover text-center mb-0">
                <thead class="thead-dark">
                    <tr>
                        <th>Product</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                        <th>Remove</th>
                    </tr>
                </thead>
                <tbody class="align-middle">
                    <tr>
                        <td class="align-middle"><img src="inc/img/product/'.$row['UserId'].'" alt="" style="width: 50px;"> Product Name</td>
                        <td class="align-middle">'.$show['DiscountPrice'].'</td>
                        <td class="align-middle">
                            <div class="input-group quantity mx-auto" style="width: 100px;">
                                <div class="input-group-btn">
                                    <button class="btn btn-sm btn-primary btn-minus" >
                                    <i class="fa fa-minus"></i>
                                    </button>
                                </div>
                                <input type="text" class="form-control form-control-sm bg-secondary border-0 text-center" value="1">
                                <div class="input-group-btn">
                                    <button class="btn btn-sm btn-primary btn-plus">
                                        <i class="fa fa-plus"></i>
                                    </button>
                                </div>
                            </div>
                        </td>
                        <td class="align-middle">$150</td>
                        <td class="align-middle"><button class="btn btn-sm btn-danger"><a class="delete_cart" data-id="{{ echo $row->Id; }}style="color:#fff;"><i class="fa fa-times"></i></a></button></td>
                    </tr>
                 </tbody>
             </table>
         </div>
     </div>
 </div>';
}
}
} ?>
