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
$sql = "SELECT * FROM categories";
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

    <div class="col-md-9 ">
      <table class="table ml-3">
        <thead class="thead-light">
          <tr>
            <th scope="col">#</th>
            <th scope="col">Category Name</th>
            <th scope="col">Actions</th>

          </tr>
        </thead>
        <tbody>
          <?php while ($data = mysqli_fetch_array($query)) { ?>
          <tr>
            <td><?php echo $s++ ?></td>
            <td><?php echo $data['name'] ?></td>
            <td><button delcat="<?php echo $data['id']?>" class="btn btn-md btn-danger delcat">Delete</button></td>

          </tr>
          <?php } ;?>

        </tbody>
      </table>

    </div>
    <div class="col-md-3">

      <div class="container">
        <h2>Add New Category</h2>
        <!-- Trigger the modal with a button -->
        <button type="button" class="btn btn-info btn-lg mt-3 ml-5" data-toggle="modal" data-target="#myModal">Add
          Category</button>

        <!-- Modal -->
        <div class="modal fade" id="myModal" role="dialog">
          <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>
              <div class="modal-body">
                <h1 class="text-center">Add New Category</h1>
                <div style="height:250px; width:100%; padding:50px;  ">
                  <form id="addCategory" method="post">
                    <div class="form-group">
                      <label for="exampleInputPassword1">Category</label>
                      <input class="form-control" type="text" name="category" placeholder="Category">
                    </div>

                    <input type="hidden" name="addCategory" value="1">
                    <button type="submit" class="btn btn-primary" id="submit">Add Category</button>
                  </form>

                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
              </div>

            </div>
          </div>

        </div>

      </div>



    </div>
    <script>
      $('#addCategory').on('submit', function (e) {
        e.preventDefault();
        $.ajax({
          type: 'post',
          url: 'core/actions.php',
          data: $('#addCategory').serialize(),
          success: function (val) {
            console.log(val);
            if (val == 1) {
              setTimeout(function () {
                location.reload();
              }, 500);
            } else {
              setTimeout(function () {
                location.reload();
              }, 500);
            }
          }
        });
      });

      $('.delcat').on('click', function (e) {
            e.preventDefault();
            var id = $(this).attr("delcat");
            $.ajax({
                url: 'core/actions.php',
                type: 'POST',
                data: {
                  delcat: 1,
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