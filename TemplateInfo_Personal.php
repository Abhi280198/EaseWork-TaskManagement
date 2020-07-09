<!doctype html>
<html class="no-js" lang="en">
    
    <head>
        <!-- title -->
        <title>EaseWork- Personal Information</title>
        <?php include_once("loadhead.php");?>
    </head>

    <body>
        <div class="box-layout">   

            <!-- start header -->
            <?php include_once("header.php");?>
            <!-- end header -->

            <!-- start slider section -->
            <section class="wow fadeIn parallax" data-stellar-background-ratio="0.5" style="background-image:url('assets1/images/blog-slider-img7.jpg');">
                <div class="opacity-medium bg-extra-dark-gray"></div>
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-12 d-flex flex-column justify-content-center text-center extra-small-screen page-title-large">
                            <!-- start page title -->
                            <h1 class="text-white-2 alt-font font-weight-600 letter-spacing-minus-1 margin-10px-bottom" style="text-align: left; font-size: 100px;">Personal</h1>
                            <!-- end page title --> 
                        </div>
                    </div>
                </div>
            </section>
            <!-- end slider section -->

            <!-- start about section -->
            <section class="wow fadeIn">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-12 col-lg-4 text-center text-lg-left md-margin-40px-bottom sm-margin-30px-bottom wow fadeIn">
                            <h5 class="text-uppercase alt-font text-extra-dark-gray font-weight-700 width-75 d-block mb-0 lg-width-90 md-width-100 sm-width-100">Vacation Planning</h5>
                        </div>
                        <div class="col-12 col-lg-4 col-md-6 sm-margin-30px-bottom wow fadeIn">
                            <img class="padding-ten-right md-no-padding-right w-100" src="assets1/images/homepage-4-section1-img.jpg" alt="">
                        </div>
                        <div class="col-12 col-lg-4 col-md-6 text-center text-md-left md-padding-eight-left sm-padding-15px-left wow fadeIn" data-wow-delay="0.4s">
                            <p class="text-large text-extra-dark-gray">Effortlessly plan your next adventure including your packing list, budget, hotel accommodations, foods to eat, and sights to see. </p>
                            <p>Get all the vacation logistics onto a single board so you can focus on the important part: Relaxing.</p>

                            <p>- Make a list with items you need to do before your trip starts: packing lists, passport updates, booking confirmations, etc.</p>
                            <p>- When people inevitably give you recommendations, keep them all in “Things To Do/Places to Eat” lists so you don’t forget.</p>
                            
                    <?php

                        if(isset($_SESSION['UserID']))
                        {
                     ?>
                            <a href="Personal_template.php?Bid=0" style="float: right;" class="btn btn-small btn-dark-gray text-small border-radius-4 lg-margin-15px-bottom d-table d-lg-inline-block md-margin-lr-auto">View Template <i class="fas fa-long-arrow-alt-right margin-5px-left text-deep-pink text-medium position-relative top-2" aria-hidden="true"></i></a>
                    <?php
                        }
                        else
                        {
                    ?>
                         <a href="personal_view.php" style="float: right;" class="btn btn-small btn-dark-gray text-small border-radius-4 lg-margin-15px-bottom d-table d-lg-inline-block md-margin-lr-auto">View Template <i class="fas fa-long-arrow-alt-right margin-5px-left text-deep-pink text-medium position-relative top-2" aria-hidden="true"></i></a> 
                    <?php
                        }
                    ?>  
                            
                        </div>
                    </div>
                </div>
            </section>
            <!-- end about section -->

            <p class="wow fadeIn">
                
            </p>

        </div>

        <!-- start footer --> 
        <?php include_once("footer.php");?>
        <!-- end footer -->

        <!-- javascript libraries -->
        <?php include_once("loadJs.php");?>

    </body>
</html>