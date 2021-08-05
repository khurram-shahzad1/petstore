   <!-- Footer Section Start -->
   <footer class="section footer-section">
        <!-- Footer Top Start -->
        <div class="footer-top bg-name-bright section-padding">
            <div class="container">
                <div class="row m-b-n40">
                <div class="col-12 col-sm-6 col-lg-1 m-b-40" data-aos="fade-up" data-aos-duration="1400">
                    </div>
                    <div class="col-12 col-sm-6 col-lg-5 m-b-40" data-aos="fade-up" data-aos-duration="1000">
                        <div class="single-footer-widget">
                            <h1 class="widget-title">About Us</h1>
                            <p class="desc-content">Lorem ipsum dolor sit amet, co adipisi elit, sed eiusmod tempor incididunt ut labore et dolore</p>
                            <!-- Soclial Link Start -->
                            <div class="widget-social justify-content-start m-b-n10">
                                <a title="Twitter" href="#/"><i class="icon-social-twitter"></i></a>
                                <a title="Instagram" href="#/"><i class="icon-social-instagram"></i></a>
                                <a title="Linkedin" href="#/"><i class="icon-social-linkedin"></i></a>
                                <a title="Skype" href="#/"><i class="icon-social-skype"></i></a>
                                <a title="Dribble" href="#/"><i class="icon-social-dribbble"></i></a>
                            </div>
                            <!-- Social Link End -->
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-lg-3 m-b-40" data-aos="fade-up" data-aos-duration="1200">
                        <div class="single-footer-widget">
                            <h2 class="widget-title">Useful Links</h2>
                            <ul class="widget-list">
                                <li><a href="contact.php">Help & Contact Us</a></li>
                                <li><a href="shop.php">Shop</a></li>
                            </ul>
                        </div>
                    </div>
                    
                    <div class="col-12 col-sm-6 col-lg-2 m-b-40" data-aos="fade-up" data-aos-duration="1400">
                        <div class="single-footer-widget">
                            <h2 class="widget-title">Help</h2>
                            <ul class="widget-list">
                                <li><a href="my-account.php">Order Info</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-lg-2 m-b-40" data-aos="fade-up" data-aos-duration="1400">
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer Top End -->
    </footer>
    <!-- Footer Section End -->

    <!-- Scroll Top Start -->
    <a href="#" class="scroll-top show" id="scroll-top">
        <i class="arrow-top ti-angle-double-up"></i>
        <i class="arrow-bottom ti-angle-double-up"></i>
    </a>
    <!-- Scroll Top End -->

    <!-- Mobile Menu Start -->
    <div class="mobile-menu-wrapper">
        <div class="offcanvas-overlay"></div>

        <!-- Mobile Menu Inner Start -->
        <div class="mobile-menu-inner">

            <!-- Button Close Start -->
            <div class="offcanvas-btn-close">
                <i class="fa fa-times"></i>
            </div>
            <!-- Button Close End -->

            <!-- Mobile Menu Inner Wrapper Start -->
            <div class="mobile-menu-inner-wrapper">
                <!-- Mobile Menu Search Box Start -->
                <div class="search-box-offcanvas">
                    <form>
                        <input class="search-input-offcanvas" type="text" placeholder="Search product...">
                        <button class="search-btn"><i class="icon-magnifier"></i></button>
                    </form>
                </div>
                <!-- Mobile Menu Search Box End -->

                <!-- Mobile Menu Start -->
                <div class="mobile-navigation">
                    <nav>
                        <ul class="mobile-menu">
                            <li class="has-children">
                            <a href="index.php">Home</a>
                            </li>
                            <li><a href="shop.php">Shop</a></li>
                            <li><a href="rent.php">Rent</a></li>
                                    <li><a href="contact.php">Contact Us</a></li>
                                    <?php
                            include 'assets/db.php';
                             if(!isset($_COOKIE['user_id'])){
                                echo "<li><a href='register.php'>Register</a></li>
                                <li><a href='company/login.php'>Company</a></li>
                                <li><a href='login.php'>Login</a></li>";
                                }else{
                                    echo
                                    "<li><a href='core/actions.php?signout=1'><i class='fa fa-sign-out-alt'></i></a>
                                    </li> 
                                    ";
                                } ?>
                        </ul>
                    </nav>
                </div>
                <!-- Mobile Menu End -->


                <!-- Contact Links/Social Links Start -->
                <div class="mt-auto bottom-0">

                    <!-- Contact Links Start -->
                    <ul class="contact-links">
                        <li><i class="fa fa-phone"></i><a href="#"> +012 3456 789</a></li>
                        <li><i class="fa fa-envelope"></i><a href="#"> info@example.com</a></li>
                        <li><i class="fa fa-clock"></i> <span>Monday - Sunday 9.00 - 18.00</span> </li>
                    </ul>
                    <!-- Contact Links End -->

                    <!-- Social Widget Start -->
                    <div class="widget-social">
                        <a title="Facebook" href="#"><i class="fab fa-facebook-f"></i></a>
                        <a title="Twitter" href="#"><i class="fab fa-twitter"></i></a>
                        <a title="Linkedin" href="#"><i class="fab fa-linkedin"></i></a>
                        <a title="Youtube" href="#"><i class="fab fa-youtube"></i></a>
                        <a title="Vimeo" href="#"><i class="fab fa-vimeo"></i></a>
                    </div>
                    <!-- Social Widget Ende -->
                </div>
                <!-- Contact Links/Social Links End -->
            </div>
            <!-- Mobile Menu Inner Wrapper End -->

        </div>
        <!-- Mobile Menu Inner End -->
    </div>
    <!-- Mobile Menu End -->

    <!-- Global Vendor, plugins JS -->

    <script src="assets/js/vendor.min.js"></script>
    <script src="assets/js/plugins.min.js"></script>

    <!--Main JS-->
    <script src="assets/js/main.js"></script>
    <script src="assets/js/all.js" data-auto-replace-svg="nest"></script>

</body>


</html>