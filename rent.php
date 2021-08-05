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
                        <h2 class="breadcrumb-title">Rent Grid</h2>
                        <ul>
                            <li><a href="index.php">Home</a></li>
                            <li>Rent Grid</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Area End -->

    <!-- Shop Section Start -->
    <div class="section section-margin">
        <div class="container">
            <div class="row">
                <div class="col-12">

                    <!--shop toolbar start-->
                    <div class="shop_toolbar_wrapper flex-column flex-md-row p-2 m-b-40 border">

                        <!-- Shop Top Bar Left start -->
                        <div class="shop-top-bar-left">

                            <div class="shop_toolbar_btn">
                                <button data-role="grid_4" type="button" class="active btn-grid-4" title="Grid"><i class="ti-layout-grid4-alt"></i></button>
                                <button data-role="grid_list" type="button" class="btn-list" title="List"><i class="ti-align-justify"></i></button>
                            </div>
                          

                        </div>
                        <!-- Shop Top Bar Left end -->

                    </div>
                    <!--shop toolbar end-->
                    <form method="post">  
  <div class="row">
  <div class="col-md-10">
    <input type="text" class="form-control" style="height:50px;" name="valuetosearch" placeholder="Search Bike By Name">
    </div>
    <div class="col-md-2 mb-5">
  <button type="submit" name="search" class="btn btn-primary btn-hover-dark">Search Bike</button>
  </div>
  </div>
  </form>
                    <!-- Shop Wrapper Start -->
                    <div class="row shop_wrapper grid_4">
                    <?php
                    include 'assets/db.php';
                    if(isset($_POST['search'])){
                        $valuetosearch=$_POST['valuetosearch'];
                        $qry="SELECT * FROM rent_products WHERE CONCAT(`name`) LIKE '%".$valuetosearch."%'";
                        $res=filtertable($qry);
                    }else{
                    
                    
                    $qry = "SELECT * FROM rent_products";
                    $res=filtertable($qry);
                    }
                    function filtertable($qry){
                        include 'assets/db.php';
                        $filter_result = mysqli_query($conn, $qry);
                    return $filter_result;
                    }
$s = 1 ;


?>
 <?php while ($data = mysqli_fetch_array($res)) { 
            $prodId = $data['id'];
            ?>
                        <!-- Single Product Start -->
                        <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 product">
                            <div class="product-inner">
                                <div class="thumb">
                                    <a href="single-product.php?prodid=<?php echo $prodId; ?>" class="image">
                                        <img class="fit-image " src="assets/images/rent_products/<?php echo $data['image']; ?>" alt="Product" />
                                    </a>
                                    <div class="action-wrapper">
                                       <a href="rent_bike.php?prodid=<?php echo $prodId; ?>" class="action rent" title="Rent"><i class="fas fa-biking"></i></a>
                                    </div>
                                </div>
                                <div class="content">
                                    <h5 class="title"><a href="single-product.php?prodid=<?php echo $prodId; ?>"><?php echo $data['name']; ?></a></h5>
                                    <span class="content">
                                            <span class="title">WhatsApp:<?php echo  $data['num']; ?></span>
                                   
                                    </span>
                                    <span class="content">
                                            <span class="title">Location:<?php echo  $data['city']; ?></span>
                                   
                                    </span>
                                    <span class="price">
                                            <span class="new">$<?php echo  $data['price']; ?></span>
                                   
                                    </span>
                                     <!-- Cart Button Start -->
                                    <div class="cart-btn action-btn">
                                        <div class="action-cart-btn-wrapper d-flex">
                                            <div class="add-to_cart">
                                                <a class="btn btn-primary btn-hover-dark rounded-0" href="rent_bike.php?prodid=<?php echo $prodId;?>">Rent A Bike</a>
                                            </div>
                                           </div>
                                    </div>
                                    <!-- Cart Button End -->
                                </div>
                            </div>
                        </div>
                        <!-- Single Product End -->
                        <?php }  ?>

            

                      

                    </div>
                    <!-- Shop Wrapper End -->


                </div>
            </div>
        </div>
    </div>
    <!-- Shop Section End -->
    <?php include('includes/footer.php');
?>