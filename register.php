<?php include('includes/header.php');
?>

                      

    <!-- Breadcrumb Area Start -->
    <div class="section breadcrumb-area bg-name-bright">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <div class="breadcrumb-wrapper">
                        <h2 class="breadcrumb-title">Create Account</h2>
                        <ul>
                            <li><a href="index.php">Home</a></li>
                            <li>Create Account</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Area End -->

    <!-- Register Section Start -->
    <div class="section section-margin">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 col-md-8 m-auto">
                    <div class="login-wrapper">

                        <!-- Register Title & Content Start -->
                        <div class="section-content text-center m-b-30">
                            <h2 class="title m-b-10">Create Account</h2>
                        </div>
                        <!-- Register Title & Content End -->

                        <!-- Form Action Start -->
                        <form id="signUpForm" method="post">

                            <!-- Input First Name Start -->
                            <div class="single-input-item m-b-10">
                                <input type="text" name="user_name" placeholder="User Name">
                            </div>
                            <!-- Input First Name End -->

                            <!-- Input Last Name Start -->
                            <div class="single-input-item m-b-10">
                                <input type="email" name="user_email" placeholder="User Email">
                            </div>
                            <!-- Input Last Name End -->

                            <!-- Input Email Start -->
                            <div class="single-input-item m-b-10">
                                <input type="text" name="user_mobile" placeholder="User Mobile">
                            </div>
                            <!-- Input Email End -->

                            <!-- Input Password Start -->
                            <div class="single-input-item m-b-10">
                                <input type="password" name="user_password" placeholder="Password">
                            </div>
                            <!-- Input Password End -->
                            <input type="hidden" name="signUpForm" value="1">
                            <!-- Button/Forget Password Start -->
                            <div class="single-input-item">
                                <div class="login-reg-form-meta m-b-n15">
                                    <button type="submit" class="btn btn btn-gray-deep btn-hover-primary m-b-15">Create</button>
                                </div>
                            </div>
                            <!-- Button/Forget Password End -->

                        </form>
                        <!-- Form Action End -->

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Register Section End -->
    
    <script>
        $(function () {
            $('#signUpForm').on('submit', function (e) {
                e.preventDefault();
                $.ajax({
                    type: 'post',
                    url: 'core/actions.php',
                    data: $('#signUpForm').serialize(),
                    success: function (val) {
                        console.log(val);
                        if (val == "0" || val == "") {
                          setTimeout(function () {
                          alert("Sorry... email already regisrtered!");
                          location.reload();
                        }, 500);
                        } else {
                            if (val == "1") {
                                setTimeout(function () {
                                  alert("Fill All The Fields");
                                  location.reload();
                                }, 500);
                            } else {
                              setTimeout(function () {
                                location.replace('login.php');
                            }, 500);
                            }
                        }
                    }
                });

            });
        })
        </script>

    <?php include('includes/footer.php');
?>