<!DOCTYPE html>
<html lang="en">

<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<style>

body {
  margin: 0;
  padding: 0;
  background-color: #17a2b8;
  height: 100vh;
}
#login .container #login-row #login-column #login-box {
  margin-top: 120px;
  max-width: 600px;
  height: 400px;
  border: 1px solid #9C9C9C;
  background-color: #EAEAEA;
}
#login .container #login-row #login-column #login-box #login-form {
  padding: 20px;
}
#login .container #login-row #login-column #login-box #login-form #register-link {
  margin-top: -85px;
}
</style>
</head>
<body>
<div class="alert alert-success alert-dismissible" style="display:none;" id="alertSuccess">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>Success!</strong> Indicates a successful or positive action.
    </div>
    <div class="alert alert-danger alert-dismissible"  id="alertFailed" style="display:none;">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>Not Success!</strong> Indicates a not successful or negtive action.
    </div>
    <div id="login">
        <h3 class="text-center text-white pt-5">Company SignUp</h3>
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                        <form id="regForm">
                            <h3 class="text-center text-info">SignUp</h3>
                            <div class="form-group">
                                <label for="email" class="text-info">Name:</label><br>
                                <input type="text" name="name" id="name" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="email" class="text-info">Email:</label><br>
                                <input type="email" name="email" id="email" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="password" class="text-info">Password:</label><br>
                                <input type="password" name="password" id="password" class="form-control">
                            </div>
                            <input type="hidden" name="signup">
                            <div class="form-group">
                                <input type="submit" name="signup" class="btn btn-info" value="Sign Up">
                            </div>
                            <span class="psw">Already Have An Account? <a href="login.php">SignIn</a></span>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
<script>
$(function (){
    $('#regForm').on('submit',function(e){
        e.preventDefault();
        $.ajax({
            url : 'core/actions.php',
            type : 'POST',
            data : $('#regForm').serialize(),
            success:function(val){
                console.log(val);
                if (val == "1"){
                    $('#alertSuccess').fadeIn(2000);
                    $('#alertFailed').fadeOut(3000);
                    setTimeout(() => {
                        location.replace('./login.php');
                    }, 2000);
                }else{
                    $('#alertSuccess').fadeIn(2000);
                    $('#alertFailed').fadeOut(3000);
                }
            }
        })
    })
});
</script>