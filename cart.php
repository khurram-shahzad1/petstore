<?php 
     if(!isset($_COOKIE['user_id'])){
        header("Location: login.php");
         }else{

         }
    
?> 
<?php include('includes/header.php');
?>

                     

    <!-- Breadcrumb Area Start -->
    <div class="section breadcrumb-area bg-name-bright">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <div class="breadcrumb-wrapper">
                        <h2 class="breadcrumb-title">Cart</h2>
                        <ul>
                            <li><a href="index.php">Home</a></li>
                            <li>Cart</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Area End -->

    <!-- Shopping Cart Section Start -->
    <div class="section section-margin">
        <div class="container">

            <div class="row">
                <div class="col-12">

                    <!-- Cart Table Start -->
                    <div class="cart-table table-responsive">
                        <table class="table table-bordered">

                            <!-- Table Head Start -->
                            <thead>
                                <tr>
                                    <th class="pro-thumbnail">Image</th>
                                    <th class="pro-title">Product</th>
                                    <th class="pro-price">Price</th>
                                    <th class="pro-quantity">Quantity</th>
                                    <th class="pro-subtotal">Total</th>
                                    <th class="pro-remove">Remove</th>
                                </tr>
                            </thead>
                            <!-- Table Head End -->

                            <!-- Table Body Start -->
                            <tbody>
                            <?php 
                             include 'assets/db.php';
                             $userId = $_COOKIE['user_id'];
                             $sql = "SELECT * FROM cart WHERE user_id = '$userId' ";
                             $run_cart = mysqli_query($GLOBALS['conn'], $sql);
                             $count = mysqli_num_rows($run_cart);
                             ?>

                                    <?php 
                              $total = 0;
                              while($row_cart = mysqli_fetch_array($run_cart)){
                               $pro_id = $row_cart['product_id'];
                                 
                               $pro_qty = $row_cart['qty'];
                              
                               $run_products =mysqli_query($GLOBALS['conn'], "SELECT * FROM products WHERE id='$pro_id'");
                               while($row_products = mysqli_fetch_array($run_products)){
                               $product_title = $row_products['name'];
                                      
                                      $product_img1 = $row_products['image'];
                                      
                                      $only_price = $row_products['price'];
                                     
                                      $sub_total = $only_price*$pro_qty;

                                      $total += $sub_total;


                                       ?>
                                <tr>
                                <input type="hidden" class="pid" value="<?= $row_cart['id'] ?>">
                                    <td class="pro-thumbnail"><a href="#"><img class="fit-image" src="assets/images/products/<?php echo $product_img1; ?>" alt="Product" /></a></td>
                                    <td class="pro-title"><a href="#"><?php echo $product_title; ?></a></td>
                                    <td class="pro-price"><span>$<?php echo $only_price; ?></span></td>
                                    <td class="pro-quantity">
                                        <div class="quantity">
                                                <input class="qty" min="1" max="5"  value="<?= $pro_qty ?>" type="number">
                                        </div>
                                    </td>
                                    <td class="pro-subtotal"><span>$<?php echo $sub_total; ?></span></td>
                                    <td class="pro-remove"><a href="#" class="removefromcart" removeId="<?php echo $row_cart['id']; ?>"><i class="ti-trash"></i></a></td>
                                </tr>
                                <?php } } ?>
                            </tbody>
                            <!-- Table Body End -->

                        </table>
                    </div>
                    <!-- Cart Table End -->

                    <!-- Cart Button Start -->
                    <div class="cart-button-section m-b-n20">

                        <!-- Cart Button left Side Start -->
                        <div class="cart-btn-lef-side m-b-20">
                            <a href="shop.php" class="btn btn btn-gray-deep btn-hover-primary">Continue Shopping</a>
                        </div>
                        <!-- Cart Button left Side End -->

                    </div>
                    <!-- Cart Button End -->

                </div>
            </div>

            <div class="row m-t-50">
                <div class="col-lg-6 me-0 ms-auto">

                    <!-- Cart Calculation Area Start -->
                    <div class="cart-calculator-wrapper">

                        <!-- Cart Calculate Items Start -->
                        <div class="cart-calculate-items">

                            <!-- Cart Calculate Items Title Start -->
                            <h3 class="title">Cart Totals</h3>
                            <!-- Cart Calculate Items Title End -->

                            <!-- Responsive Table Start -->
                            <div class="table-responsive">
                                <table class="table">
                                    <tr>
                                        <td>Sub Total</td>
                                        <td>$<?php echo $total; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Shipping</td>
                                        <td>$70</td>
                                    </tr>
                                    <tr class="total">
                                        <td>Total</td>
                                        <td class="total-amount">$<?php echo $total + 70; ?></td>
                                    </tr>
                                </table>
                            </div>
                            <!-- Responsive Table End -->

                        </div>
                        <!-- Cart Calculate Items End -->

                        <!-- Cart Checktout Button Start -->
                        <a href="checkout.php" class="btn btn btn-gray-deep btn-hover-primary m-t-30">Proceed To Checkout</a>
                        <!-- Cart Checktout Button End -->

                    </div>
                    <!-- Cart Calculation Area End -->

                </div>
            </div>

        </div>
    </div>
    <!-- Shopping Cart Section End -->
    <script>
    $(function () {
        $('.removefromcart').on('click', function (e) {
            if (confirm("Do you really want to remove this product?")) {
                e.preventDefault();
                var ele = $(this);
                var removeId = $(this).attr('removeId');
                console.log(removeId);
                $.ajax({
                    type: 'post',
                    url: 'core/actions.php',
                    data: {
                        removefromcart: 1,
                        removeId: removeId
                    },
                    success: function (val) {
                        if (val == 1) {
                            location.reload();
                        }
                    }
                });
            }
        });
    })



    $(document).ready(function() {

// Change the item quantity
$(".qty").on('change', function() {
  var $el = $(this).closest('tr');

  var pid = $el.find(".pid").val();
  var qty = $el.find(".qty").val();
//   location.reload(true);
  $.ajax({
    url: 'update_cart.php',
    method: 'post',
    cache: false,
    data: {
      qty: qty,
      pid: pid
    },
    success: function (val) {
                    console.log(val);
                    if (val == "0") {
                        alert("Error!");
                        setTimeout(function () {
                            location.reload();
                        }, 500);

                    } else {
                        alert("Cart Updated!");
                        setTimeout(function () {
                            location.replace('cart.php');
                        }, 500);

                    }

                }
  });
});
});
</script>
    <?php include('includes/footer.php');
?>