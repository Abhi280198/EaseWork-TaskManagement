<!doctype html>
<html class="no-js" lang="en">
    
<!-- Mirrored from www.themezaa.com/html/pofo/blog-grid.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 30 May 2020 07:06:10 GMT -->
<head>
        <!-- title -->
        <title>EaseWork- Templates</title>
        <?php include_once("loadhead.php");?>
</head>

<body>
        <!-- start header -->
        <?php include_once("header.php");?>
        <!-- end header -->

        <!-- start page title section -->
        <section class="wow fadeIn parallax" data-stellar-background-ratio="0.5" style="background-image:url('assets1/images/slider-06.jpg');">
            <div class="opacity-medium bg-extra-dark-gray"></div>
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-12 d-flex flex-column justify-content-center text-center extra-small-screen page-title-large">
                        <!-- start page title -->
                        <h1 class="text-white-2 alt-font font-weight-600 letter-spacing-minus-1 margin-10px-bottom">Start Ahead with Pre-Designed Templates</h1>
                        <span class="text-white-2 opacity6 alt-font">From the minds that created EaseWork</span>
                        <!-- end page title --> 
                    </div>
                </div>
            </div>
        </section>
        <!-- end page title section -->

        <!-- start post content section --> 
        <section class="wow fadeIn hover-option4 blog-post-style3">
            <div class="container"> 
                <div class="row">

                <?php
                    if(isset($_SESSION['UserID']))
                    {
                ?>
                    <!-- start education post-->
                    <div class="col-12 col-lg-4 col-md-6 grid-item margin-30px-bottom text-center text-md-left wow fadeInUp">
                        <div class="blog-post bg-light-gray inner-match-height">
                            <div class="blog-post-images overflow-hidden position-relative">
                                <a href="TemplateInfo_Education.php">
                                    <img src="assets1/images/blog-img16.jpg" alt="">
                                    <div class="blog-hover-icon"><span class="text-extra-large font-weight-300"></span></div>
                                </a>
                            </div>
                            <br>
                            <a href="TemplateInfo_Education.php?Uid=<?php echo $_SESSION['UserID'];?>" class="alt-font post-title text-medium text-extra-dark-gray width-100 d-block lg-width-100 margin-15px-bottom" style="text-align: center; font-size: 20px;">EDUCATION</a>
                        </div>
                    </div>
                    <!-- end education post-->

                    <!-- start personal post-->
                    <div class="col-12 col-lg-4 col-md-6 grid-item margin-30px-bottom text-center text-md-left wow fadeInUp">
                        <div class="blog-post bg-light-gray inner-match-height">
                            <div class="blog-post-images overflow-hidden position-relative">
                                <a href="TemplateInfo_Personal.php">
                                    <img src="assets1/images/blog-img74.jpg" alt="">
                                    <div class="blog-hover-icon"><span class="text-extra-large font-weight-300"></span></div>
                                </a>
                            </div>
                            <br>
                            <a href="TemplateInfo_Personal.php?Uid=<?php echo $_SESSION['UserID'];?>" class="alt-font post-title text-medium text-extra-dark-gray width-100 d-block lg-width-100 margin-15px-bottom" style="text-align: center; font-size: 20px;">PERSONAL</a>
                        </div>
                    </div>
                    <!-- end personal post-->
                <?php
                    }
                    else
                    {
                ?>
                    <!-- start education post-->
                    <div class="col-12 col-lg-4 col-md-6 grid-item margin-30px-bottom text-center text-md-left wow fadeInUp">
                        <div class="blog-post bg-light-gray inner-match-height">
                            <div class="blog-post-images overflow-hidden position-relative">
                                <a href="TemplateInfo_Education.php">
                                    <img src="assets1/images/blog-img16.jpg" alt="">
                                    <div class="blog-hover-icon"><span class="text-extra-large font-weight-300"></span></div>
                                </a>
                            </div>
                            <br>
                            <a href="TemplateInfo_Education.php" class="alt-font post-title text-medium text-extra-dark-gray width-100 d-block lg-width-100 margin-15px-bottom" style="text-align: center; font-size: 20px;">EDUCATION</a>
                        </div>
                    </div>
                    <!-- end education post-->

                    <!-- start personal post-->
                    <div class="col-12 col-lg-4 col-md-6 grid-item margin-30px-bottom text-center text-md-left wow fadeInUp">
                        <div class="blog-post bg-light-gray inner-match-height">
                            <div class="blog-post-images overflow-hidden position-relative">
                                <a href="TemplateInfo_Personal.php">
                                    <img src="assets1/images/blog-img74.jpg" alt="">
                                    <div class="blog-hover-icon"><span class="text-extra-large font-weight-300"></span></div>
                                </a>
                            </div>
                            <br>
                            <a href="TemplateInfo_Personal.php" class="alt-font post-title text-medium text-extra-dark-gray width-100 d-block lg-width-100 margin-15px-bottom" style="text-align: center; font-size: 20px;">PERSONAL</a>
                        </div>
                    </div>
                    <!-- end personal post-->
                <?php
                    }
                ?>
                    <!-- start comming soon post-->
                    <div class="col-12 col-lg-4 col-md-6 grid-item margin-30px-bottom text-center text-md-left wow fadeInUp">
                        <div class="blog-post bg-light-gray inner-match-height">
                            <div class="blog-post-images overflow-hidden position-relative">
                                    <img src="assets1/images/back-image2.png" alt="">
                            </div>
                            <br>
                            <a href="#" class="alt-font post-title text-medium text-extra-dark-gray width-100 d-block lg-width-100 margin-15px-bottom" style="text-align: center; font-size: 20px;">COMING SOON...</a>
                        </div>
                    </div>
                    <!-- end coming soon post-->

                </div>
            </div>
        </section>
        <!-- end blog content section --> 

        <!-- start footer --> 
        <?php include_once("footer.php");?>
        <!-- end footer -->

        <!-- javascript libraries -->
        <?php include_once("loadJs.php");?>
        
    </body>

<!-- Mirrored from www.themezaa.com/html/pofo/blog-grid.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 30 May 2020 07:06:23 GMT -->
</html>