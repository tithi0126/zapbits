<?php
include("header.php");
$stmt = $obj->con1->prepare("SELECT * FROM `about_us`");
$stmt->execute();
$data = $stmt->get_result()->fetch_assoc();
$stmt->close();

$stmt_services = $obj->con1->prepare("SELECT * FROM `about_details` ORDER BY id ASC");
$stmt_services->execute();
$services_data = $stmt_services->get_result();
$stmt_services->close();
$counter = 1; // Start counter at 1
?>

<main>
<main>
        <!-- page-banner-area-start -->
        <div class="page-banner-area page-banner-height" data-background="assets/img/banner/page-banner-1.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="page-banner-content text-center">
                            <h3>About Us</h3>
                            <p>A wonderful serenity has taken possession of my entire soul, like these <br> sweet mornings of spring which I enjoy with my whole heart.</p>
                            <div class="page-bottom-btn mt-55">
                                <a href="shop.html" class="st-btn-4">Discover now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- page-banner-area-end -->

        <!-- about-area-start -->
        <div class="about-area pt-80 pb-80" data-background="assets/img/bg/about-bg.png">
            <div class="container">
                <div class="row align-items-center">
                   <div class="col-xl-6 col-lg-6">
                       <div class="about-content">
                           <span>ABOUT OUR ONLINE STORE</span>
                           <!-- <p class="about-text">Over 25 years Dukamarket helping companies reach their <br> financial and branding goals.</p> -->
                           <p><?php echo $data["description"]?></p>
                       </div>
                   </div>
                   <div class="col-xl-6 col-lg-6">
                        <div class="about-image w-img">
                            <img src="dashboard/images/about/<?php echo $data["image"]?>" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- about-area-end -->

    <div class="services-area pt-70 light-bg-s pb-50">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="abs-section-title text-center">
                        <span>HOW IT WORKS</span>
                        <h4>Complete Customer Ideas</h4>
                        <p>The perfect way to enjoy brewing tea on low hanging fruit to identify. Duis autem vel eum iriure dolor in hendrerit <br> in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis.</p>
                    </div>
                </div>
            </div>
            <div class="row mt-40">
                <?php while($service = $services_data->fetch_assoc()) { ?>
                    <div class="col-xl-4 col-lg-4 col-md-6">
                        <div class="services-item mb-30">
                            <div class="services-icon mb-25">
                                <img src="dashboard/images/icon_image/<?php echo $service['icon']; ?>" alt="" style="width: 50px; height: 50px;">
                            </div>
                            <h6><?php echo $service['title']; ?></h6>
                            <p><?php echo $service['description']; ?></p>
                            <div class="s-count-number">
                                <span><?php echo sprintf('%02d', $counter++); ?></span>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
    <!-- services-area-end -->

</main>
<?php
include("footer.php");
?>
