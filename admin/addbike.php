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
        <a class="navbar-brand" href="index.php">Admin</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="users.php">Users <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
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
        <form id="addbike">
            <div class="form-group">
                 <label for="exampleInputPassword1">Name</label>
                    <input class="form-control" type="text"  name="pname" placeholder="Name">
                        </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Discription</label>
                                    <input class="form-control" type="text" name="discription" placeholder="Discription">
                                        </div>
                                        <div class="form-group">
                                        <label for="exampleInputPassword1">WhatsApp Number</label>
                                        <input class="form-control" type="text"  name="num" placeholder="WhatsApp Number">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Location</label>
                                        <input class="form-control" type="text"  name="city" placeholder="Location">
                                    </div>

                                    <div class="form-group">
                                        <label for="sel1">Category</label>
                                        <select class="form-control"name="catId">
                                            <?php include '../assets/db.php';
                                             $cat = "SELECT * FROM categories";
							                 $result = mysqli_query($conn,$cat)or die(mysqli_error());
							                          while ($row = mysqli_fetch_array($result)){
							                       ?>
                                            <option value="<?php echo $row['id'];?>"><?php echo $row['name'];?>
                                            </option>
                                            <?php }; ?>
                                        </select>

                                    </div>
                                    <div class="form-group">
                                        <label for="sel1">Company</label>
                                        <select class="form-control"name="cId">
                                            <?php include '../assets/db.php';
                                             $cat = "SELECT * FROM company";
							                     	$result = mysqli_query($conn,$cat)or die(mysqli_error());
							                          while ($row = mysqli_fetch_array($result)){
							                       ?>
                                            <option value="<?php echo $row['id'];?>"><?php echo $row['name'];?>
                                            </option>
                                            <?php }; ?>
                                        </select>

                                       

                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Price</label>
                                        <input class="form-control" type="number" name="price" placeholder="Price">
                                    </div>
                                    <div class="form-group">
                                        <label for=name>Upload Image:</label>
                                        <input name="productImage"  type="file" >
                                    </div>
                                    <input type="hidden" name="addbike">
                                    <button type="submit" class="btn btn-success">Submit</button>
                                </form>
        <br>
    </div>
</div>
</div>
<script>
 $(function () {
        $('#addbike').on('submit',(function(e) {
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
                    if (val == "1") {
                            location.replace("rentbikes.php");
                    } 
                }
			});
		}));
        
       
   
   
    })

</script>