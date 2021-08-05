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

            <h1> Orders </h1>


        </center><!--  center Finish  -->


        <div class="table-responsive">
            <!--  table-responsive Begin  -->

            <table class="table">
                    <thead class=" text-dark">
                      <th> Id </th>
                      <th> UserName</th>
                      <th> Address</th>
                      <th >Product Name</th>
                      <th >Product Image</th>
                      <th >Quantity </th>
                      <th >Payment Method </th>
                      <th >Price </th>
                      <th >Status </th>
                    </thead>
                    <?php 
                    include '../assets/db.php';
                    $s = 0;
                   $sql ="SELECT * FROM orders ";
                   $query =mysqli_query($conn,$sql);
                   while ($data = mysqli_fetch_array($query)) {
                       $user = $data['user_id'];
                       $prodId = $data['pro_id'];
                       $fn = mysqli_fetch_array(mysqli_query($conn, "SELECT user_name FROM user WHERE id = '$user'"))[0];
                       $prod = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM products WHERE id = '$prodId'"));
                    
                    $s++;
                ?>
                    <tbody>
                     <tr>
                     <td><?php echo $s;?></td>
                     <td><?php echo $fn;?></td>
                     <td><?php echo $data['s_address'];?></td>
                     <td><?php echo $prod['name'];?></td>
                     <td><img src="../assets/images/products/<?php echo $prod['image'];?>" width="100px" height="100px"></td>
                     <td><?php echo $data['qty'];?></td>
                     <td><?php echo $data['check_method'];?></td>
                    <td><?php echo $data['amount'];?></td>
                    <td>
                    <?php 
                        $status = $data['order_status'];
                        if($status == 0){
                    ?>
                     <button class="btn btn-success acceptOrder" oid="<?php echo $data['id']; ?>">Accept</button>
                    <button class="btn btn-danger rejectOrder" oid="<?php echo $data['id']; ?>">Reject</button>
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
        $(".order").on("click", function (order) {
            order.preventDefault();
            var uid = $(this).attr('uid').trim();
            var prnt = $(this).parent().siblings(".status");
            var status = 1;
            $.ajax({
                type: 'post',
                url: 'core/actions.php',
                data: {
                    order: uid,
                    status: status
                },
                success: function (val) {
                    console.log(val);
                    if (val == 1) {
                        prnt.html("Paid");
                        // location.reload();
                    } else {

                    }
                }
            });
        });
        $(function () {
        $('.acceptOrder').on('click', function (e) {
            e.preventDefault();
            var orderId = $(this).attr('oid');
            $.ajax({
                url: 'core/actions.php',
                type: 'POST',
                data: {
                    acceptOrder: orderId
                },
                success: function (val) {
                    console.log(val);
                    location.reload();
                }
            })
        })
        $('.rejectOrder').on('click', function (e) {
            e.preventDefault();
            var orderId = $(this).attr('oid');
            $.ajax({
                url: 'core/actions.php',
                type: 'POST',
                data: {
                    rejectOrder: orderId
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