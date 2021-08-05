
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
                        <h2 class="breadcrumb-title">Checkout</h2>
                        <ul>
                            <li><a href="index.php">Home</a></li>
                            <li>Checkout</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Area End -->

    <!-- Checkout Section Start -->
    <div class="section section-margin">
        <div class="container">
           
            <div class="row m-b-n20">
                <div class="col-lg-6 col-12 m-b-20">

                    <!-- Checkbox Form Start -->
                    <form id="order" method="post">
                        <div class="checkbox-form">

                            <!-- Checkbox Form Title Start -->
                            <h3 class="title">Billing Details</h3>
                            <!-- Checkbox Form Title End -->

                            <div class="row">


                                <!-- First Name Input Start -->
                                <div class="col-md-6">
                                    <div class="checkout-form-list">
                                        <label>First Name <span class="required">*</span></label>
                                        <input type="text" name="f_name">
                                    </div>
                                </div>
                                <!-- First Name Input End -->

                                <!-- Last Name Input Start -->
                                <div class="col-md-6">
                                    <div class="checkout-form-list">
                                        <label>Last Name <span class="required">*</span></label>
                                        <input type="text" name="l_name">
                                    </div>
                                </div>
                                <!-- Last Name Input End -->

                                <!-- Address Input Start -->
                                <div class="col-md-12">
                                    <div class="checkout-form-list">
                                        <label>Street Address <span class="required">*</span></label>
                                        <input placeholder="House number and street name" type="text" name="s_address">
                                    </div>
                                </div>
                                <!-- Address Input End -->

                                <!-- Town or City Name Input Start -->
                                <div class="col-md-12">
                                    <div class="checkout-form-list">
                                        <label>Town / City <span class="required">*</span></label>
                                        <input type="text" name="city">
                                    </div>
                                </div>
                                <!-- Town or City Name Input End -->

                                <!-- State or Country Input Start -->
                                <div class="col-md-6">
                                    <div class="checkout-form-list">
                                        <label>State / County <span class="required">*</span></label>
                                        <input type="text" name="country">
                                    </div>
                                </div>
                                <!-- State or Country Input End -->

                                <!-- Postcode or Zip Input Start -->
                                <div class="col-md-6">
                                    <div class="checkout-form-list">
                                        <label>Postcode / Zip <span class="required">*</span></label>
                                        <input placeholder="Postal Code" type="text" name="p_code">
                                    </div>
                                </div>
                                <!-- Postcode or Zip Input End -->

                                <!-- Email Address Input Start -->
                                <div class="col-md-6">
                                    <div class="checkout-form-list">
                                        <label>Email Address <span class="required">*</span></label>
                                        <input type="text" name="email">
                                    </div>
                                </div>
                                <!-- Email Address Input End -->

                                <!-- Phone Number Input Start -->
                                <div class="col-md-6">
                                    <div class="checkout-form-list">
                                        <label>Phone <span class="required">*</span></label>
                                        <input  type="text" name="phone">
                                    </div>
                                </div>
                                <!-- Phone Number Input End -->

                              

                            </div>

                        </div>
                   
                    <!-- Checkbox Form End -->

                </div>

                <div class="col-lg-6 col-12 m-b-20">

                    <!-- Your Order Area Start -->
                    <div class="your-order-area border">

                        <!-- Title Start -->
                        <h3 class="title">Your order</h3>
                        <!-- Title End -->

                        <!-- Your Order Table Start -->
                        <div class="your-order-table table-responsive">
                            <table class="table">

                                <!-- Table Head Start -->
                                <thead>
                                    <tr class="cart-product-head">
                                        <th class="cart-product-name text-start">Product</th>
                                        <th class="cart-product-total text-end">Total</th>
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
                               $cid = $row_products['c_id'];   
                                      $only_price = $row_products['price'];
                                     
                                      $sub_total = $only_price*$pro_qty;

                                      $total += $sub_total;

                                      $ship_fee = 70;

                                      $order_total = $total+$ship_fee;

                                       ?>
                                    <tr class="cart_item">
                                        <td class="cart-product-name text-start ps-0"> <?php echo $product_title; ?><strong class="product-quantity"> × <?php echo $pro_qty; ?></strong></td>
                                        <td class="cart-product-total text-end pe-0"><span class="amount">$<?php echo $sub_total; ?></span></td>
                                    </tr>
                                    <?php } } ?>
                                </tbody>
                                <!-- Table Body End -->

                                <!-- Table Footer Start -->
                                <tfoot>
                                    <tr class="cart-subtotal">
                                        <th class="text-start ps-0">Cart Subtotal</th>
                                        <td class="text-end pe-0"><span class="amount">$<?php echo $total; ?></span></td>
                                    </tr>
                                    <tr class="order-total">
                                        <th class="text-start ps-0">Order Total</th>
                                        <td class="text-end pe-0"><strong><span class="amount">$<?php echo $order_total; ?></span></strong></td>
                                    </tr>
                                </tfoot>
                                <!-- Table Footer End -->

                            </table>
                        </div>
                        <!-- Your Order Table End -->
                        <div class="payment_method">
                               <div class="panel-default">
                                    <input name="check_method" id="check_method" value="COD" type="radio" data-target="createp_account" />
                                    <label data-toggle="collapse" data-target="#method" aria-controls="method">COD</label>
                                </div> 
                               <div class="panel-default">
                                    <input name="check_method" id="check_method" value="Card" type="radio" data-target="createp_account" />
                                    <label data-toggle="collapse" data-target="#collapsedefult" aria-controls="collapsedefult">Credit Card<img class="ml-1" src="assets/img/icon/card.png" alt=""></label>
                                </div>
                            </div> 
                        <!-- Payment Accordion Order Button Start -->
                        <input type="hidden" name="order" value="1">
                                <input type="hidden" name="pro_id" value="<?php  echo $pro_id; ?>">
                                <input type="hidden" name="cid" value="<?php  echo $cid; ?>">
                                <input type="hidden" name="qty" value="<?php  echo $pro_qty; ?>">
                                <input type="hidden" name="amount" value="<?php  echo $order_total; ?>">
                                <div class="payment-accordion-order-button">
                            <div class="order-button-payment">
                                <button type="submit" id="submit" class="btn btn-primary btn-hover-dark rounded-0 w-100">Place Order</button>
                            </div>
                        </div>
                        
                    </form>
                        <!-- Payment Accordion Order Button End -->
                </div>
                    <!-- Your Order Area End -->
            </div>
        </div>
    </div>
</div>
    <!-- Checkout Section End -->

    <script>
    $(function () {
            $('#order').on('submit', function (e) {
                e.preventDefault();
                var check_method = $('#check_method:checked').val();
                if(check_method == "COD"){
                    console.log(check_method);
                $.ajax({
                    type: 'post',
                    url: 'core/actions.php',
                    data: $('#order').serialize(),
                    success: function (val) {
                        console.log(val);
                        if (val == "0" || val == "") {
                            alert("Error");
                        } else{
                            location.replace("cart.php");
                        }
                    }
                });
                }else{
                    console.log(check_method);
                // $.ajax({
                //     type: 'post',
                //     url: 'strip.php',
                //     data: $('#order').serialize(),
                //     success: function (val) {
                //         console.log(val);
                //         if (val == "0" || val == "") {
                //             alert("Error");
                //         } else{
                            location.replace("strip.php?"+$('#order').serialize());
                //         }
                //     }
                // });
                }
            });
        })
      </script>
    <?php include('includes/footer.php');
?>