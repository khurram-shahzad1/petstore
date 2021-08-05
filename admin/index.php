<?php 
     if(!isset($_COOKIE['admin_id'])){
        header("Location: login.php");
         }else{

         }
    
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
    <?php
include '../assets/db.php';
$sql = "SELECT * FROM products ";
$query = mysqli_query($conn, $sql);
$s = 1 ;

?>
<div class="alert alert-success alert-dismissible" style="display:none;" id="alertSuccess">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>Success!</strong> Indicates a successful or positive action.
    </div>
    <div class="alert alert-danger alert-dismissible"  id="alertFailed" style="display:none;">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>Not Success!</strong> Indicates a not successful or negtive action.
    </div>
  <div class="row mt-5">

        <div class="col-md-10 ">
            <table class="table ml-3">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Discription</th>
                        <th scope="col">Category</th>
                        <th scope="col">Image</th>
                        <th scope="col">Price</th>
                        <th scope="col">Actions</th>

                    </tr>
                </thead>
                <tbody>
                    <?php while ($data = mysqli_fetch_array($query)) { 
      $catid = $data['cat_id'];
      $getName = mysqli_query($conn, "SELECT name FROM categories WHERE id = '$catid'");
      $catName = mysqli_fetch_array($getName)[0];
      $img = $data['image'];
    ?>
                    <tr>
                        <td><?php echo $s++ ?></td>
                        <td><?php echo $data['name'] ?></td>
                        <td><?php echo $data['discription'] ?></td>
                        <td><?php echo $catName ?></td>
                        <td>
                            <img class="img-responsive" src="../assets/images/products/<?php echo $img; ?>" height="80px;">
                        </td>
                        <td>Rs. <?php echo $data['price'] ?></td>
                        <td><a href="edit-pro.php?id=<?php echo $data['id']; ?>">
                                <button class="btn btn-sm btn-info"
                                    style=" background-color:#25215E; color:white;">Update</button>
                            </a>
                    <button class="delid btn btn-sm btn-danger" delid="<?php echo $data['id']?>">Delete</button></td>
                    </tr>
                    <?php } ;?>
                </tbody>
            </table>

        </div>



        <div class="col-md-2 ">
            <h2>Add Product</h2>
            <!-- Button to Open the Modal -->
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal">
                Open modal
            </button>

            <!-- The Modal -->
            <div class="modal fade" id="myModal">
                <div class="modal-dialog">
                    <div class="modal-content">

                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title">Add product</h4>
                            <button type="button" class="close" data-dismiss="modal">×</button>
                        </div>
                        <!-- Modal body -->
                        <div class="modal-body">
                            <div class="container">

                                <form id="newProduct">
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Name</label>
                                        <input class="form-control" type="text"  name="pname" placeholder="Name">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Discription</label>
                                        <input class="form-control" type="text" name="discription"
                                            placeholder="Discription">
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
                                            <?php $cat = "SELECT * FROM categories";
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
                                            <?php $cat = "SELECT * FROM company";
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
                                    <input type="hidden" name="newProduct">
                                    <button type="submit" class="btn btn-success">Submit</button>
                                </form>
                            </div><br>
                            <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>
              


                            <!-- file input -->
                            <script>
    $(function () {
        $('#newProduct').on('submit',(function(e) {
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
                            location.reload();
                    } 
                }
			});
		}));
        $('.delid').on('click', function (e) {
            e.preventDefault();
            var id = $(this).attr("delid");
            $.ajax({
                url: 'core/actions.php',
                type: 'POST',
                data: {
                    delProduct: 1,
                    id: id
                },
                success: function (val) {
                    console.log(val);
                    if (val == "1") {
                        $("#alertSuccess").fadeIn();
                        setTimeout(() => {
                            location.reload();
                        }, 1000);
                    } else {
                        $('#alertFailed').fadeIn(2000);
                    setTimeout(() => {
                    $('#alertFailed').fadeOut(3000);
                    }, 2000);
                    }
                }
            })
        })
      
       
   
   
    })


</script>

</body>

</html>