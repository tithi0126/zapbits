<?php
include("header.php");
?>
<main>
        <!-- page-banner-area-start -->
        <div class="page-banner-area page-banner-height-2" data-background="assets/img/banner/page-banner-4.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="page-banner-content text-center">
                            <h4 class="breadcrumb-title">Blog</h4>
                            <div class="breadcrumb-two">
                                <nav>
                                   <nav class="breadcrumb-trail breadcrumbs">
                                      <ul class="breadcrumb-menu">
                                         <li class="breadcrumb-trail">
                                            <a href="index-2.html"><span>Home</span></a>
                                         </li>
                                         <li class="trail-item">
                                            <span>Blog</span>
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
        <div class="blog-area mt-120 mb-75">
            <div class="container">
               <div class="row">
                  <div class="col-xl-8 col-lg-7">
                    <div class="row">
                        <?php
                            $stmt = $obj->con1->prepare("SELECT * FROM `blog`");
                           
                            $stmt->execute();
                            $data = $stmt->get_result();
                            $stmt->close();
                            while($blog_data=mysqli_fetch_array($data))
                            {

                           
                        ?>
                        <div class="col-xl-6">
                            <div class="single-smblog mb-30">
                                <div class="smblog-thum">
                                    <div class="blog-image w-img">
                                        <a href="blog_detail.php?id=<?php echo $blog_data["srno"]?>?id=<?php echo $blog_data["srno"]?>"><img src="blog_image/<?php echo $blog_data["image"]?>" alt=""></a>
                                    </div>
                                    <div class="blog-tag blog-tag-2">
                                        <a href="blog.php"><?php echo $blog_data["title"]?></a>
                                    </div>
                                </div>
                                <div class="smblog-content smblog-content-3">
                                    <h6><a href="blog_detail.php?id=<?php echo $blog_data["srno"]?>"><?php echo $blog_data["short_desc"]?></a></h6>
                                    
                                    <!-- <p><?php echo $blog_data["long_desc"]?></p> -->
                                    <div class="smblog-foot pt-15">
                                        <div class="post-readmore">
                                            <a href="blog_detail.php?id=<?php echo $blog_data["srno"]?>"> Read More <span class="icon"></span></a>
                                        </div>
                                        <div class="post-date">
                                            <a href="blog_detail.php?id=<?php echo $blog_data["srno"]?>"><?php echo date("d-m-Y", strtotime($blog_data["date_time"]))?></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                         }
                        ?>
                        
                       
                       
                    </div>
                    <!-- pagination -->
                    <!-- <div class="row">
                        <div class="col-xl-12">
                            <div class="basic-pagination text-center pt-30 pb-30">
                                <nav>
                                   <ul>
                                      <li>
                                         <a href="blog.php" class="active">1</a>
                                      </li>
                                      <li>
                                         <a href="blog.php">2</a>
                                      </li>
                                      <li>
                                         <a href="blog.php">3</a>
                                      </li>
                                     <li>
                                        <a href="blog.php">5</a>
                                     </li>
                                     <li>
                                        <a href="blog.php">6</a>
                                     </li>
                                      <li>
                                         <a href="shop.html">
                                            <i class="fal fa-angle-double-right"></i>
                                         </a>
                                      </li>
                                   </ul>
                                 </nav>
                             </div>
                        </div>
                    </div> -->
                  </div>
                  <div class="col-xl-4 col-lg-5">
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
                                                   <a href="blog_detail.php?id=<?php echo $blog_data["srno"]?>"><img src="assets/img/blog/sm-b-1.jpg" alt=""></a>
                                             </div>
                                             <div class="feed-content">
                                                   <h6><a href="blog_detail.php?id=<?php echo $blog_data["srno"]?>">APL Logistics seeks to be a premier, profitable</a></h6>
                                                   <span class="feed-date">
                                                      <i class="fal fa-calendar-alt"></i> 24th March 2021
                                                   </span>
                                             </div>
                                          </li>
                                          <li>
                                             <div class="feed-number">
                                                   <a href="blog_detail.php?id=<?php echo $blog_data["srno"]?>"><img src="assets/img/blog/sm-b-2.jpg" alt=""></a>
                                             </div>
                                             <div class="feed-content">
                                                   <h6><a href="blog_detail.php?id=<?php echo $blog_data["srno"]?>">Of global supply-chain services to help</a></h6>
                                                   <span class="feed-date">
                                                      <i class="fal fa-calendar-alt"></i> 24th March 2021
                                                   </span>
                                             </div>
                                          </li>
                                          <li>
                                             <div class="feed-number">
                                                <a href="blog_detail.php?id=<?php echo $blog_data["srno"]?>"><img src="assets/img/blog/sm-b-3.jpg" alt=""></a>
                                             </div>
                                             <div class="feed-content">
                                                   <h6><a href="blog_detail.php?id=<?php echo $blog_data["srno"]?>">Enable sustainable trade and commerce</a></h6>
                                                   <span class="feed-date">
                                                      <i class="fal fa-calendar-alt"></i> 24th March 2021
                                                   </span>
                                             </div>
                                          </li>
                                          <li>
                                             <div class="feed-number">
                                                <a href="blog_detail.php?id=<?php echo $blog_data["srno"]?>"><img src="assets/img/blog/sm-b-4.jpg" alt=""></a>
                                             </div>
                                             <div class="feed-content">
                                                   <h6><a href="blog_detail.php?id=<?php echo $blog_data["srno"]?>">In key markets & region We will accomplish</a>
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
                            <div class="col-lg-12 col-md-6">
                                <div class="widget">
                                    <h6 class="sidebar-title">Categories</h6>
                                    
                                    <ul class="n-sidebar-categories">
                                    <?php
                                        $stmt_cat = $obj->con1->prepare("SELECT b1.*,count(b2.blog_category_id) as blog_count FROM `blog_category` b1,blog b2 WHERE b2.blog_category_id=b1.srno  and LOWER(b1.status)='enable' group by b1.srno;");
                           
                                        $stmt_cat->execute();
                                        $data_cat = $stmt_cat->get_result();
                                        $stmt_cat->close();
                                        while($blog_cat_data=mysqli_fetch_array($data_cat))
                                        {
                                            
                                        
                                    ?>
                                            <li>
                                                <a href="blog_detail.php?id=<?php echo $blog_cat_data["srno"]?>">
                                                    <div class="single-category p-relative mb-10">
                                                    <?php echo $blog_cat_data["title"]?>
                                                        <span class="category-number"><?php echo $blog_cat_data["blog_count"]?></span>
                                                    </div>
                                                </a>
                                            </li>
                                        <?php
                                        }
                                        ?>
                                        
                                    </ul>
                                </div>
                            </div>

                            
                        </div>
                    </div>
                  </div>
               </div>
            </div>
         </div>
         <!-- news-detalis-area-end  -->

        

    </main>


<?php
include("footer.php");
?>