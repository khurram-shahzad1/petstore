<?php 
     if(!isset($_COOKIE['company_id'])){
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
    <?php
include '../assets/db.php';
$cid= $_COOKIE["company_id"];
$sql = "SELECT * FROM rent_products WHERE c_id='$cid'";
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
                        <th scope="col">WhatsApp</th>
                        <th scope="col">Location</th>
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
                        <td><?php echo $data['num'] ?></td>
                        <td><?php echo $data['city'] ?></td>
                        <td><?php echo $catName ?></td>
                        <td>
                            <img class="img-responsive" src="../assets/images/rent_products/<?php echo $img; ?>" height="80px;">
                        </td>
                        <td>Rs. <?php echo $data['price'] ?></td>
                        <td><a href="edit-bike.php?id=<?php echo $data['id']; ?>">
                                <button class="btn btn-sm btn-info"
                                    style=" background-color:#25215E; color:white;">Update</button>
                            </a>
                    <button class="delbikeid btn btn-sm btn-danger" delbikeid="<?php echo $data['id']?>">Delete</button></td>
                    </tr>
                    <?php } ;?>
                </tbody>
            </table>

        </div>



        <div class="col-md-2 ">
                    </div>

           
              


                            <!-- file input -->
                            <script>
    $(function () {
        $('.delbikeid').on('click', function (e) {
            e.preventDefault();
            var id = $(this).attr("delbikeid");
            $.ajax({
                url: 'core/actions.php',
                type: 'POST',
                data: {
                    delbike: 1,
                    id: id
                },
                success: function (val) {
                    console.log(val);
                    if (val == "1") {
                        $("#alertSuccess").fadeIn();
                        $("#alertSuccess").fadeOut(2000);
                        setTimeout(() => {
                            location.reload();
                        }, 1000);
                    } else {
                        $("#alertFailed").fadeIn();
                        $("#alertFailed").fadeOut(2000);
                    }
                }
            })
        })
      
       
   
   
    })


</script>

</body>

</html>