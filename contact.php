<?php
include("header.php");
?>

<main>
    <!-- page-banner-area-start -->
    <div class="page-banner-area page-banner-height" data-background="assets/img/banner/page-banner-3.jpg">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="page-banner-content text-center">
                        <h4 class="breadcrumb-title">Contact Us</h4>
                        <div class="breadcrumb-two">
                            <nav>
                                <nav class="breadcrumb-trail breadcrumbs">
                                    <ul class="breadcrumb-menu">
                                        <li class="breadcrumb-trail">
                                            <a href="index-2.html"><span>Home</span></a>
                                        </li>
                                        <li class="trail-item">
                                            <span>Contact Us</span>
                                        </li>
                                    </ul>
                                </nav>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- page-banner-area-end -->

    <!-- location & form area-start -->
    <section class="location-contact-area pt-70 pb-25">
        <div class="container">
            <div class="row">
                <!-- Contact Form (Left) -->
                <div class="col-lg-8">
                    <h4>Contact Us</h4>
                    <form action="#" method="POST">
                        <div class="row">
                            <!-- Name Field -->
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="name">Name <span class="required">*</span></label>
                                    <input type="text" id="name" name="name" class="form-control"
                                        placeholder="Enter your name" required>
                                </div>
                            </div>
                            <!-- Email Field -->
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="email">Email <span class="required">*</span></label>
                                    <input type="email" id="email" name="email" class="form-control"
                                        placeholder="Enter your email" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group mt-3">
                            <label for="phone">Phone <span class="required">*</span></label>
                            <input type="text" id="phone" name="phone" class="form-control"
                                placeholder="Enter your phone number" required>
                        </div>
                        <div class="form-group mt-3">
                            <label for="message">Message <span class="required">*</span></label>
                            <textarea id="message" name="message" class="form-control" rows="6"
                                placeholder="Enter your message" required></textarea>
                        </div>
                        <div class="form-group mt-4">
                            <button type="submit" class="tp-btn-h1">Send Message</button>
                        </div>
                    </form>
                </div>

                <!-- Location Details (Right) -->
                <div class="col-lg-4">
                    <h4>Where We Are</h4>
                    <div class="location-item mb-30">
                        <div class="location-image w-img mb-20">
                            <img src="assets/img/location/location-3.jpg" alt="">
                        </div>
                        <h6>1357 Prospect - New York</h6>
                        <div class="sm-item-loc sm-item-border mb-20">
                            <div class="sml-icon mr-20">
                                <i class="fal fa-map-marker-alt"></i>
                            </div>
                            <div class="sm-content">
                                <span>Find us</span>
                                <p>Atlantic, Brooklyn, New York, US</p>
                            </div>
                        </div>
                        <div class="sm-item-loc sm-item-border mb-20">
                            <div class="sml-icon mr-20">
                                <i class="fal fa-phone-alt"></i>
                            </div>
                            <div class="sm-content">
                                <span>Call us</span>
                                <p><a href="tel:+8804568">(+100) 123 456 7890</a></p>
                            </div>
                        </div>
                        <div class="sm-item-loc mb-20">
                            <div class="sml-icon mr-20">
                                <i class="fal fa-envelope"></i>
                            </div>
                            <div class="sm-content">
                                <span>Mail us</span>
                                <p><a href="mailto:[email protected]">[email&#160;protected]</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- location & form area-end -->

    <!-- Google Maps -->
    <div class="cmamps-area">
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d1899531.5831083965!2d105.806381!3d21.58504!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x515f4860ede9e108!2zVHLGsOG7nW5nIMSQ4bqhaSBo4buNYyBDw7RuZyBuZ2jhu4cgVGjDtG5nIHRpbiB2w6AgVHJ1eeG7gW4gdGjDtG5n!5e0!3m2!1sen!2sus!4v1644226635446!5m2!1sen!2sus"></iframe>
    </div>
    <!-- Google Maps-end -->

    <!-- cta-area-start -->
    <section class="cta-area d-ldark-bg pt-55 pb-10">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="cta-item cta-item-d mb-30">
                        <h5 class="cta-title">Follow Us</h5>
                        <p>We make consolidating, marketing and tracking your social media website easy.</p>
                        <div class="cta-social">
                            <div class="social-icon">
                                <a href="#" class="facebook"><i class="fab fa-facebook-f"></i></a>
                                <a href="#" class="twitter"><i class="fab fa-twitter"></i></a>
                                <a href="#" class="youtube"><i class="fab fa-youtube"></i></a>
                                <a href="#" class="linkedin"><i class="fab fa-linkedin-in"></i></a>
                                <a href="#" class="rss"><i class="fas fa-rss"></i></a>
                                <a href="#" class="dribbble"><i class="fab fa-dribbble"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="cta-item mb-30">
                        <h5 class="cta-title">Sign Up To Newsletter</h5>
                        <p>Join 60.000+ subscribers and get a new discount coupon on every Saturday.</p>
                        <div class="subscribe__form">
                            <form action="#">
                                <input type="email" placeholder="Enter your email here...">
                                <button>subscribe</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="cta-item mb-30">
                        <h5 class="cta-title">Download App</h5>
                        <p>DukaMarket App is now available on App Store & Google Play. Get it now.</p>
                        <div class="cta-apps">
                            <div class="apps-store">
                                <a href="#"><img src="assets/img/brand/app_ios.png" alt=""></a>
                                <a href="#"><img src="assets/img/brand/app_android.png" alt=""></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- cta-area-end -->
</main>

<?php
include("footer.php");
?>