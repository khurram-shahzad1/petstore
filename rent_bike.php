<?php include('includes/header.php');
?>
 <?php
include 'assets/db.php';
if(isset($_GET['prodid'])){
    $prodid = $_GET['prodid'];
    $sql = "SELECT * FROM rent_products WHERE id='$prodid'";
    $query = mysqli_query($conn, $sql);
    $data = mysqli_fetch_array($query);
    $cid = $data['c_id'];
    }
?>  

<!-- Breadcrumb Area Start -->
<div class="section breadcrumb-area bg-name-bright">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <div class="breadcrumb-wrapper">
                    <h2 class="breadcrumb-title">Rent A Bike</h2>
                    <ul>
                        <li><a href="index.php">Home</a></li>
                        <li>Rent Bike</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb Area End -->
<!-- Contact Us Section Start -->
<div class="section section-margin">

    <div class="container">
  
        <div class="row m-b-n50">
            <div class="col-12 col-lg-12 m-b-50 order-2 order-lg-1" data-aos="fade-up" data-aos-duration="1000">

                <!-- Section Title Start -->
                <div class="contact-title p-b-15">
                    <h2 class="title">Rent A Bike</h2>
                </div>
                <!-- Section Title End -->

                <!-- Contact Form Wrapper Start -->
                <div class="contact-form-wrapper contact-form">
                    <form id="rentbike"  method="post">
                        <div class="row">
                            <div class="col-12">
                                <div class="row">

                                    <div class="col-md-4">
                                        <div class="input-area m-b-20">
                                        <label>First Name</label>
                                            <input class="input-item" type="text" placeholder="First Name *" name="fname">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="input-area m-b-20">
                                        <label>Last Name</label>
                                            <input class="input-item" type="text" placeholder="Last Name *" name="lname">
                                        </div>
                                    </div>
                                    

                                    <div class="col-md-4">
                                        <div class="input-area m-b-20">
                                        <label>From Date</label>
                                            <input class="input-item" type="date" name="sdate">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="input-area m-b-20">
                                        <label>To Date</label>
                                            <input class="input-item" type="date" name="edate">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="input-area m-b-20">
                                            <label>Front of Cinic</label>
                                            <input class="input-item" type="file"  name="fImage">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="input-area m-b-20">
                                            <label>Back of Cinic</label>
                                            <input class="input-item" type="file"  name="bImage">
                                        </div>
                                    </div>
                                    <input type="hidden" name="productid" value="<?php echo $prodid;?>">
                                    <input type="hidden" name="cid" value="<?php echo $cid;?>">
                                    <input type="hidden" name="rentbike">
                                    <div class="col-12">
                                        <button type="submit" id="submit" name="submit"
                                            class="btn btn-primary btn-hover-dark">Rent A Bike</button>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- Contact Form Wrapper End -->

            </div>

        </div>

    </div>
</div>
<!-- Contact us Section End -->



<?php include('includes/footer.php');
?>
<script>
 $(function () {
        $('#rentbike').on('submit',(function(e) {
			e.preventDefault();
			var newProductForm = new FormData(this);
			$.ajax({
				type:'POST',
				url: 'core/actions.php',
				data:newProductForm,
				cache:false,
				contentType: false,
				processData: false,
				success: function (val) {
                        console.log(val);
                        if (val == "0") {
                            alert("Fill all fields");
                        } else {
                                setTimeout(function () {
                                    alert("Upload Successfully!");
                                }, 500);

                        }
                    }
			});
		}));
    });
</script>