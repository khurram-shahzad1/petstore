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
                    <a class="nav-link" href="order.php">Orders</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="rent.php">Rent Bikes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contact.php">Messages</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="core/actions.php?signout=1">Sign Out</a>
                </li>
      </ul>

    </div>
  </nav>
  <?php
include '../assets/db.php';
$sql = "SELECT * FROM contact ";
$query = mysqli_query($conn, $sql);
$s = 1 ;
?>
<div class="row mt-5">

    <div class="col-md-10 ">
      <table class="table ml-3">
        <thead class="thead-light">
          <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Subject</th>
            <th scope="col">Message</th>
            <th scope="col">Actions</th>
          </tr>
        </thead>
        <tbody>
          <?php while ($data = mysqli_fetch_array($query)) { ?>
          <tr>
            <td><?php echo $s++ ?></td>
            <td><?php echo $data['name'] ?></td>
            <td><?php echo $data['email'] ?></td>
            <td><?php echo $data['subject'] ?></td>
            <td><?php echo $data['message'] ?></td>
            <td>
              <button delmsgid="<?php echo $data['id']?>" class="btn btn-md btn-danger delmsgid">Delete</button>
            </td>
          </tr>
          <?php } ;?>
        </tbody>
      </table>

    </div>
    
</div>
             

    <script>
   
     $('.delmsgid').on('click', function (e) {
            e.preventDefault();
            var id = $(this).attr("delmsgid");
            $.ajax({
                url: 'core/actions.php',
                type: 'POST',
                data: {
                    delmsgid: 1,
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
    
    </script>


</body>

</html>