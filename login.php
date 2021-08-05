<?php include('includes/header.php');
?>


    <!-- Breadcrumb Area Start -->
    <div class="section breadcrumb-area bg-name-bright">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <div class="breadcrumb-wrapper">
                        <h2 class="breadcrumb-title">Login</h2>
                        <ul>
                            <li><a href="index.php">Home</a></li>
                            <li>Login</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Area End -->

    <!-- Login Section Start -->
    <div class="section section-margin">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 col-md-8 m-auto">
                    <div class="login-wrapper">

                        <!-- Login Title & Content Start -->
                        <div class="section-content text-center m-b-30">
                            <h2 class="title m-b-10">Login</h2>
                        </div>
                        <!-- Login Title & Content End -->

                        <!-- Form Action Start -->
                        <form id="signInForm" method="post" >

                            <!-- Input Email Start -->
                            <div class="single-input-item m-b-10">
                                <input type="email" name="user_email" placeholder="Email or Username">
                            </div>
                            <!-- Input Email End -->

                            <!-- Input Password Start -->
                            <div class="single-input-item m-b-10">
                                <input type="password" name="user_password" placeholder="Enter your Password">
                            </div>
                            <!-- Input Password End -->

                            <!-- Button/Forget Password Start -->
                            <div class="single-input-item m-b-15">
                                <div class="login-reg-form-meta m-b-n15">
                                <input type="hidden" name="signInForm" value="1">
                                    <button type="submit" class="btn btn btn-gray-deep btn-hover-primary m-b-15">Sign In</button>
                                    <a href="#" class="forget-pwd m-b-15">Forget Password?</a>

                                </div>
                            </div>
                            <!-- Button/Forget Password End -->

                            <!-- Lost Password & Creat New Account Start -->
                            <div class="lost-password">
                                <a href="register.php">Creat Account</a>
                            </div>
                            <!-- Lost Password & Creat New Account End -->

                        </form>
                        <!-- Form Action End -->

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Login Section End -->
    <script>

        $(function () {
            $('#signInForm').on('submit', function (e) {
                e.preventDefault();
                $.ajax({
                    type: 'post',
                    url: 'core/actions.php',
                    data: $('#signInForm').serialize(),
                    success: function (val) {
                        console.log(val);
                        if (val == "0" || val == "") {
                            alert("Error");
                        } else {
                                setTimeout(function () {
                                    location.replace('index.php');
                                }, 500);

                        }
                    }
                });

            });
        })
        </script>
    <?php include('includes/footer.php');
?>