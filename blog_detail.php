<?php
include("header.php");
$bid=$_REQUEST["id"];
$stmt = $obj->con1->prepare("SELECT * FROM `blog` where srno=?");
$stmt->bind_param("i",$bid);
$stmt->execute();
$data = $stmt->get_result()->fetch_assoc();
$stmt->close();
?>

<main>
        <!-- page-banner-area-start -->
        <div class="page-banner-area page-banner-height-2" data-background="assets/img/banner/page-banner-4.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="page-banner-content text-center">
                            <h4 class="breadcrumb-title">Blog Details</h4>
                            <div class="breadcrumb-two">
                                <nav>
                                   <nav class="breadcrumb-trail breadcrumbs">
                                      <ul class="breadcrumb-menu">
                                         <li class="breadcrumb-trail">
                                            <a href="index-2.html"><span>Home</span></a>
                                         </li>
                                         <li class="trail-item">
                                            <span>Blog Details</span>
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

        <!-- news-detalis-area-start -->
        <div class="news-detalis-area mt-120 mb-70">
            <div class="container">
               <div class="row">
                  <div class="col-xl-8 col-lg-8">
                    <div class="news-detalis-content mb-50">
                        <ul class="blog-meta mb-20">
                          
                           <li><a href="blog-details.html"><i class="fal fa-calendar-alt"></i> <?php echo date("d-m-Y", strtotime($data["date_time"]))?></a></li>
                        </ul>
                        <h4  class="news-title mt-60"><?php echo $data["title"]?></h4>
                        <div class="news-thumb mt-40">
                           <img src="blog_image/<?php echo $data["image"]?>" alt="blog" class="img-fluid">
                        </div>
                        <h4 class="news-title mt-60">Do you know how to wear headphones properly?</h4>
                        <p class="mt-25 mb-50"><?php echo $data["long_desc"]?></p>
                        
                        <!-- <div class="news-info d-sm-flex align-items-center justify-content-between mt-50 mb-50">
                           <div class="news-tag">
                             <h6 class="tag-title mb-25">Releted Tags</h6>
                              <a href="#"> Popular</a>
                              <a href="#">Desgin</a>
                              <a href="#">UX</a>
                           </div>
                           <div class="news-share">
                              <h6 class="tag-title mb-25">Social Share</h6>
                              <a href="#"><i class="fab fa-facebook-f"></i></a>
                              <a href="#"><i class="fab fa-twitter"></i></a>
                              <a href="#"><i class="fab fa-typo3"></i></a>
                              <a href="#"><i class="fab fa-tumblr"></i></a>
                              <a href="#"><i class="fal fa-share-alt"></i></a>
                           </div>
                        </div> -->
                        <div class="news-navigation pt-50 pb-40">
                           <div class="changes-info">
                              <span><a href="blog-details.html">Prev Post</a></span>
                              <h6 class="changes-info-title"><a href="blog-details.html">Tips On Minimalist</a></h6>
                           </div>
                           <div class="changes-info text-md-right">
                              <span><a href="blog-details.html">Next Post</a></span>
                              <h6 class="changes-info-title"><a href="blog-details.html">Less Is More</a></h6>
                           </div>
                        </div>
                        
                        
                      
                     </div>         
                  </div>
                  <div class="col-xl-4 col-lg-4">
                     <div class="news-sidebar pl-10">
                        <div class="row">
                            <div class="col-lg-12 col-md-12">
                                <div class="widget">
                                    <h6 class="sidebar-title"> Search Here</h6>
                                    <div class="n-sidebar-search">
                                        <input type="text" placeholder="Search your keyword...">
                                        <a href="#"><i class="fal fa-search"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12">
                              <div class="widget">
                                 <h6 class="sidebar-title">Popular Feeds</h6>
                                 <div class="n-sidebar-feed">
                                       <ul>
                                          <li>
                                             <div class="feed-number">
                                                   <a href="blog-details.html"><img src="assets/img/blog/sm-b-1.jpg" alt=""></a>
                                             </div>
                                             <div class="feed-content">
                                                   <h6><a href="blog-details.html">APL Logistics seeks to be a premier, profitable</a></h6>
                                                   <span class="feed-date">
                                                      <i class="fal fa-calendar-alt"></i> 24th March 2021
                                                   </span>
                                             </div>
                                          </li>
                                          <li>
                                             <div class="feed-number">
                                                   <a href="blog-details.html"><img src="assets/img/blog/sm-b-2.jpg" alt=""></a>
                                             </div>
                                             <div class="feed-content">
                                                   <h6><a href="blog-details.html">Of global supply-chain services to help</a></h6>
                                                   <span class="feed-date">
                                                      <i class="fal fa-calendar-alt"></i> 24th March 2021
                                                   </span>
                                             </div>
                                          </li>
                                          <li>
                                             <div class="feed-number">
                                                <a href="blog-details.html"><img src="assets/img/blog/sm-b-3.jpg" alt=""></a>
                                             </div>
                                             <div class="feed-content">
                                                   <h6><a href="blog-details.html">Enable sustainable trade and commerce</a></h6>
                                                   <span class="feed-date">
                                                      <i class="fal fa-calendar-alt"></i> 24th March 2021
                                                   </span>
                                             </div>
                                          </li>
                                          <li>
                                             <div class="feed-number">
                                                <a href="blog-details.html"><img src="assets/img/blog/sm-b-4.jpg" alt=""></a>
                                             </div>
                                             <div class="feed-content">
                                                   <h6><a href="blog-details.html">In key markets & region We will accomplish</a>
                                                   </h6>
                                                   <span class="feed-date">
                                                      <i class="fal fa-calendar-alt"></i> 24th March 2021
                                                   </span>
                                             </div>
                                          </li>
                                       </ul>
                                 </div>
                              </div>
                            </div>
                          
                            
                           
                        </div>
                    </div>
                  </div>
               </div>
            </div>
         </div>
         <!-- news-detalis-area-end  -->

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
                            <p>Join 60.000+ subscribers and get a new discount coupon  on every Saturday.</p>
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