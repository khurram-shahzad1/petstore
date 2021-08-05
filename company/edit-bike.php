<?php 
include '../assets/db.php';
    $proid = $_GET['id'];
    $data = mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM rent_products WHERE id='$proid'"));
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="assets/css/w3.css">

</head>

<body>




<nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="index.php">Company</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                    <a class="nav-link" href="category.php">Categories</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="order.php">Orders</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="rent.php">Rent Bikes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="addbike.php">Add Bike For Rent</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="rentbikes.php">View Rent Bikes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="core/actions.php?signout=1">Sign Out</a>
                </li>

            </ul>

        </div>
    </nav>

<div class="container">
<div class="row mt-5">

    <div class="col-md-4">
        <form id="formbike" class="">
            <h6>Product Category: </h6>
            <select name="catId" id="" class="form-control">
                <option value="" hidden>Select One</option>
                <?php 
                    $cats ="SELECT * FROM categories ";
                    $catsQ =mysqli_query($conn,$cats);
                    while ($data2 = mysqli_fetch_array($catsQ)) {
                ?>
                <option value="<?php echo $data2['id']; ?>" <?php if($data['cat_id'] == $data2['id']){echo 'selected'; } ?>>
                    <?php echo $data2['name']; ?>
                </option>
                <?php } ?>
            </select>
            <br>
            <h6>Product Name: </h6>
            <input type="text" class="form-control" name="pname"  value="<?php echo $data['name'];?>">
            <br>
            <h6>Product WhatsApp Number: </h6>
            <input type="text" class="form-control" name="num"  value="<?php echo $data['num'];?>">
            <br>
            <h6>Product City: </h6>
            <input type="text" class="form-control" name="city"  value="<?php echo $data['city'];?>">
            <br>
            <h6>Product Price: </h6>
            <input type="number" class="form-control" name="price"  value="<?php echo $data['price'];?>">
            <br>
            <h6>Product Image: </h6>
            <input type="file" class="" name="productImage" >
            <br>
            <br>
            <h6>Description</h6>
            <textarea name="discription" id="" rows="5" class="form-control"><?php echo $data['discription'];?></textarea>
            <input type="hidden" name="formbike">
                    <input type="hidden" name="proid" value="<?php echo $data['id'];?>">
                    <br>
                    <input type="submit" class="btn btn-warning" value="Submit">
        </form>
        <br>
    </div>
</div>
</div>
<script>
$(function (){
    $('#formbike').on('submit',(function(e) {
        e.preventDefault();
        var updatedProduct = new FormData(this);
        $.ajax({
            type:'POST',
            url: 'core/actions.php',
            data:updatedProduct,
            cache:false,
            contentType: false,
            processData: false,
            success:function(val){
                console.log(val);
                if (val == "1") {
                    setTimeout(() => {
                        location.replace('rentbikes.php');
                    }, 2000);
                }else{
                }
            }
        });
    }));
})


</script>