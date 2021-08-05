<!DOCTYPE html>
<html lang="en">


<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Online Bike Rental</title>

    <link rel="shortcut icon" href="assets/images/favicon.ico">
    <link rel="stylesheet" href="assets/css/vendor/vendor.min.css">
    <link rel="stylesheet" href="assets/css/plugins/plugins.min.css">
    <link rel="stylesheet" href="assets/css/style.min.css">
    <script src="assets/js/jquery.min.js"></script>




</head>

<body>
    <!-- Header Section Start -->
    <div class="header section">
        <!-- Header Bottom Start -->
        <div class="header-bottom">
            <div class="header-sticky">
                <div class="container-fluid" style="width:95%; margin:auto;">
                    <div class="row align-items-center position-relative">

                        <!-- Header Logo Start -->
                        <div class="col-lg-3 col-md-4 col-6">
                            <div class="header-logo">
                                <a href="index.php"><img src="assets/images/img/logo.png" alt="Site Logo" /></a>
                            </div>
                        </div>
                        <!-- Header Logo End -->

                        <!-- Header Menu Start -->
                        <div class="col-lg-6  d-none d-lg-block">
                            <div class="main-menu">
                                <ul>
                                    <li class="has-children">
                                        <a href="index.php">Home</a>
                                    </li>
                                    <li><a href="shop.php">Shop</a></li>
                                    <li><a href="rent.php">Rent</a></li>
                                    <li><a href="contact.php">Contact Us</a></li>
                                    <?php
                            include 'assets/db.php';
                             if(!isset($_COOKIE['user_id'])){
                                echo "<li><a href='register.php'>Register</a></li>
                                <li><a href='company/login.php'>Company</a></li>
                                <li><a href='login.php'>Login</a></li>
                                
                                ";
                                }else{
                                    echo
                                    "<li><a href='core/actions.php?signout=1'><i class='fa fa-sign-out-alt'></i> Logout</a>
                                    </li> 
                                    ";
                                } ?>
                                </ul>
                            </div>
                        </div>
                        <!-- Header Menu End -->
                          <!-- Header Action Start -->
                          <div class="col-lg-3 col-md-8 col-6">
                            <div class="header-actions">
                                <!-- Header My Account Button Start -->
                                <?php
                             if(!isset($_COOKIE['user_id'])){
                                }else{
                                    echo
                                    " <a href='my-account.php' class='header-action-btn header-action-btn-wishlist'>
                                    <i class='icon-user icons'></i>
                                </a>
                                    ";
                                } ?>
                                <!-- Header My Account Button End -->
                                <!-- Header Action Button Start -->
                                <?php if(!isset($_COOKIE['user_id'])){
                                        echo " <div class='header-action-btn header-action-btn-cart d-none d-sm-flex'>
                                        <a class='cart-visible' href='cart.php'>
                                            <i class='icon-handbag icons'></i>
                                            <span class='header-action-num'>0</span>
                                        </a>
    
                                      
    
                                    </div>
                                    <div class='header-action-btn header-action-btn-cart d-flex d-sm-none'>
                                        <a href='cart.php'>
                                            <i class='icon-handbag icons'></i>
                                            <span class='header-action-num'>0</span>
                                        </a>
                                    </div>
                                    <!-- Header Action Button End -->
    
                                    <!-- Mobile Menu Hambarger Action Button Start -->
                                    <a href='javascript:void(0)' class='header-action-btn header-action-btn-menu d-lg-none d-md-flex'>
                                        <i class='icon-menu'></i>
                                    </a>
                                    <!-- Mobile Menu Hambarger Action Button End -->
    
                                </div>
                            </div>";
                                    }else{
                                        $userId = $_COOKIE['user_id'];
                                        $get_items = "select * from cart where user_id='$userId'";
    
                                                $run_items = mysqli_query($GLOBALS['conn'],$get_items);
                                                
                                                $count_items = mysqli_num_rows($run_items);
                                                $userId = $_COOKIE['user_id'];
                                        $get_items = "select * from cart where user_id='$userId'";
    
                                                $run_items = mysqli_query($GLOBALS['conn'],$get_items);
                                                
                                                $count_items = mysqli_num_rows($run_items);
    
                                        echo 
                                        "<div class='header-action-btn header-action-btn-cart d-none d-sm-flex'>
                                        <a class='cart-visible' href='cart.php'>
                                            <i class='icon-handbag icons'></i>
                                            <span class='header-action-num'>$count_items</span>
                                        </a>
    
                                      
    
                                    </div>
                                    <div class='header-action-btn header-action-btn-cart d-flex d-sm-none'>
                                        <a href='cart.php'>
                                            <i class='icon-handbag icons'></i>
                                            <span class='header-action-num'>$count_items</span>
                                        </a>
                                    </div>
                                    <!-- Header Action Button End -->
    
                                    <!-- Mobile Menu Hambarger Action Button Start -->
                                    <a href='javascript:void(0)' class='header-action-btn header-action-btn-menu d-lg-none d-md-flex'>
                                        <i class='icon-menu'></i>
                                    </a>
                                    <!-- Mobile Menu Hambarger Action Button End -->
    
                                </div>
                            </div>";
                                    } ?>
                               
                        <!-- Header Action End -->

                    </div>
                </div>
            </div>
        </div>
        <!-- Header Bottom End -->

    </div>
    <!-- Header Section End -->