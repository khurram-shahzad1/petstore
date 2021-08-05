<!DOCTYPE html>
<html lang="en">

<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery.min.js"></script>
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
        <center>
            <!--  center Begin  -->

            <h1> Rent Bikes</h1>


        </center><!--  center Finish  -->


        <div class="table-responsive">
            <!--  table-responsive Begin  -->

            <table class="table">
                    <thead class=" text-dark">
                      <th> Id </th>
                      <th> First Name</th>
                      <th> Last Name</th>
                      <th >Start Date</th>
                      <th >Last Date</th>
                      <th >Bike Name </th>
                      <th >Bike Image </th>
                      <th >User Cinic Front Image </th>
                      <th >User Cinic Back Image </th>
                      <th >Rent Per Day </th>
                      <th >Status </th>
                    </thead>
                    <?php 
                    include '../assets/db.php';
                    $s = 0;
                   $sql ="SELECT * FROM rent_bike";
                   $query =mysqli_query($conn,$sql);
                   while ($data = mysqli_fetch_array($query)) {
                       $prodId = $data['productid'];
                       $prod = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM rent_products WHERE id = '$prodId'"));
                    
                    $s++;
                ?>
                    <tbody>
                     <tr>
                     <td><?php echo $s;?></td>
                     <td><?php echo $data['fname'];?></td>
                     <td><?php echo $data['lname'];?></td>
                     <td><?php echo $data['sdate'];?></td>
                     <td><?php echo $data['edate'];?></td>
                     <td><?php echo $prod['name'];?></td>
                     <td><img src="../assets/images/rent_products/<?php echo $prod['image'];?>" width="100px" height="100px"></td>
                     <td><img src="../assets/images/rent_products/<?php echo $data['fImage'];?>" width="100px" height="100px"></td>
                     <td><img src="../assets/images/rent_products/<?php echo $data['bImage'];?>" width="100px" height="100px"></td>
                    <td><?php echo $prod['price'];?></td>
                    <td>
                    <?php 
                        $status = $data['status'];
                        if($status == 0){
                    ?>
                     <button class="btn btn-success acceptrent mb-2" rid="<?php echo $data['id']; ?>">Accept</button>
                    <button class="btn btn-danger rejectrent" rid="<?php echo $data['id']; ?>">Reject</button>
                    <?php }
                    elseif($status == 1){ ?>
                    Completed
                    <?php }
                    elseif($status == 2){ ?>
                    Rejected
                    <?php } ?>
                    </td>
          
                     </tr>
                    </tbody>
                    <?php } ?>
                  </table>

        </div><!--  table-responsive Finish  -->
    </div>
    <script>
      
        $(function () {
        $('.acceptrent').on('click', function (e) {
            e.preventDefault();
            var orderId = $(this).attr('rid');
            $.ajax({
                url: 'core/actions.php',
                type: 'POST',
                data: {
                    acceptrent: orderId
                },
                success: function (val) {
                    console.log(val);
                    location.reload();
                }
            })
        })
        $('.rejectrent').on('click', function (e) {
            e.preventDefault();
            var orderId = $(this).attr('rid');
            $.ajax({
                url: 'core/actions.php',
                type: 'POST',
                data: {
                    rejectrent: orderId
                },
                success: function (val) {
                    console.log(val);
                    location.reload();
                }
            })
        })
    })
    </script>
</body>

</html>