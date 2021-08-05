
    <?php include('includes/header.php');
?>


    <!-- Breadcrumb Area Start -->
    <div class="section breadcrumb-area bg-name-bright">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <div class="breadcrumb-wrapper">
                        <h2 class="breadcrumb-title">Contact Us</h2>
                        <ul>
                            <li><a href="index.php">Home</a></li>
                            <li>Contact Us</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Area End -->

    <!-- Contact Us Section Start -->
    <div class="section section-margin">
        <div class="container">

            <div class="row m-b-n50">
                <div class="col-12 col-lg-6 m-b-50 order-2 order-lg-1" data-aos="fade-up" data-aos-duration="1000">

                    <!-- Section Title Start -->
                    <div class="contact-title p-b-15">
                        <h2 class="title">Get in Touch</h2>
                    </div>
                    <!-- Section Title End -->

                    <!-- Contact Form Wrapper Start -->
                    <div class="contact-form-wrapper contact-form">
                        <form  id="contactForm" method="post">
                            <div class="row">
                                <div class="col-12">
                                    <div class="row">

                                        <div class="col-md-6">
                                            <div class="input-area m-b-20">
                                                <input class="input-item" type="text" placeholder="Your Name *" name="name">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="input-area m-b-20">
                                                <input class="input-item" type="email" placeholder="Email *" name="email">
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="input-area m-b-20">
                                                <input class="input-item" type="text" placeholder="Subject *" name="subject">
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="input-area m-b-40">
                                                <textarea cols="30" rows="5" class="textarea-item" name="message" placeholder="Message"></textarea>
                                            </div>
                                        </div>

                                        <input type="hidden" name="contactForm" value="1">
                                        <div class="col-12">
                                            <button type="submit" id="submit" class="btn btn-primary btn-hover-dark">Send Message</button>
                                        </div>
                                        <p class="col-8 form-message mb-0"></p>

                                    </div>
                                </div>
                            </div>
                        </form>
                        <p class="form-messege"></p>
                    </div>
                    <!-- Contact Form Wrapper End -->

                </div>
                <div class="col-12 col-lg-6 m-b-50 order-1 order-lg-2" data-aos="fade-up" data-aos-duration="1500">
                    <!-- Section Title Start -->
                    <div class="contact-title p-b-15">
                        <h2 class="title">Contact Us</h2>
                    </div>
                    <!-- Section Title End -->
                    <div class="contact-content">
                        <p>Claritas est etiam processus dynamicus, qui sequitur mutationem consuetudium lectorum. Mirum est notare quam littera gothica, quam nunc putamus parum claram anteposuerit litterarum formas human.</p>
                        <address class="contact-block">
                            <ul>
                                <li><i class="fa fa-fax"></i> Your address goes here</li>
                                <li><i class="fa fa-phone"></i> <a href="tel:123-123-456-789">123 123 456 789</a></li>
                                <li><i class="fa fa-envelope"></i> <a href="mailto:demo@example.com">demo@example.com </a></li>
                            </ul>
                        </address>

                        <div class="working-time">
                            <h6 class="title">Working Hours</h6>
                            <p>Monday – Saturday:08AM – 22PM</p>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- Contact us Section End -->
    <script>
        $(function () {
            $('#contactForm').on('submit', function (e) {
                e.preventDefault();
                $.ajax({
                    type: 'post',
                    url: 'core/actions.php',
                    data: $('#contactForm').serialize(),
                    success: function (val) {
                        console.log(val);
                        if (val == "0" || val == "") {
                          setTimeout(function () {
                          alert("Sorry... Error Occur!");
                          location.reload();
                        }, 500);
                        } else {
                            setTimeout(function () {
                          alert("Message Sent!");
                          location.reload();
                        }, 500);
                        }
                    }
                });

            });
        })
        </script>

    <?php include('includes/footer.php');
?>