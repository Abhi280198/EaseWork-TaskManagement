<?php include_once("DbConnection.php"); ?>
<!doctype html>
<html class="no-js" lang="en">
    
<head>
        <!-- title -->
        <title>EaseWork - HomePage</title>
        <?php include_once("loadhead.php");?>
        
</head>

<body>
        <div class="box-layout box-layout-md">

            <?php include_once("header.php");?>

            <!-- start slider section --> 
            <section class="p-0 main-slider h-100 mobile-height wow fadeIn">
                <div class="swiper-full-screen swiper-container h-100 w-100 white-move"> 
                    <div class="swiper-wrapper">
                        <!-- start slider item -->
                            <div class="row m-0">
                                <div class="col-12 col-md-6 d-flex align-items-center bg-deep-pink height-700px sm-height-250px">
                                    <div class="text-left padding-twelve-all sm-padding-five-all width-100">
                                        <h7 class="title-large text-white-2 alt-font font-weight-600 letter-spacing-minus-3">Easework lets your work easy</h7>
                                        
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 cover-background height-700px sm-height-400px" style="background-image:url('assets1/images/services-img4.jpg');"> 
                                </div>
                            </div>
                        <!-- end slider item -->
                    </div>
                </div>
            </section>
            <!-- end slider section -->

            <!-- start information at glance section -->
            <section id="about" class="wow fadeIn">
                <div class="container">
                    <div class="row justify-content-center">
                        <!-- start feature box item -->
                        <div class="col-12 col-lg-8 col-md-10 text-center margin-eight-bottom sm-margin-30px-bottom">
                            <h5 class="font-weight-300 text-extra-dark-gray m-0">Information At A Glance</h5>
                            <span class="alt-font text-deep-pink text-medium margin-5px-bottom d-block">We are delivering beautiful well designed website</span>
                        </div>
                        <!-- end feature box item -->
                    </div>
                    <div class="row">
                        <!-- start features box item -->
                        <div class="col-12 col-md-4 text-center text-md-left sm-margin-30px-bottom wow fadeInUp last-paragraph-no-margin">
                            <div class="row m-0">
                                <div class="col-12 col-lg-3 col-md-4 pl-0 sm-no-padding-right">
                                     <i class="icon-mobile text-medium-gray icon-medium"></i>
                                    <span class="separator-line-verticle-large margin-ten-right bg-deep-pink float-right align-top margin-two-top d-none d-md-block"></span>
                                </div>
                                <div class="col-12 col-lg-9 col-md-8 md-no-padding-lr">
                                    <span class="text-medium margin-four-bottom md-margin-10px-bottom sm-margin-5px-bottom text-extra-dark-gray alt-font d-block">Update Cards</span>
                                    <p class="width-90 lg-width-100">Dive into the details by adding comments, attachments, due dates, and more directly to its card.</p>
                                </div>
                            </div>
                        </div>
                        <!-- end features box item -->
                        <!-- start features box item -->
                        <div class="col-12 col-md-4 text-center text-md-left sm-margin-30px-bottom wow fadeInUp last-paragraph-no-margin" data-wow-delay="0.2s">
                            <div class="row m-0">
                                <div class="col-12 col-lg-3 col-md-4 pl-0 sm-no-padding-right">
                                    <i class="icon-globe icon-extra-medium text-medium-gray md-margin-15px-bottom sm-margin-10px-bottom position-relative top-minus3"></i>
                                    <span class="separator-line-verticle-large margin-ten-right bg-deep-pink float-right align-top margin-two-top d-none d-md-block"></span>
                                </div>
                                <div class="col-12 col-lg-9 col-md-8 md-no-padding-lr">
                                    <h5 class="text-medium margin-four-bottom md-margin-10px-bottom sm-margin-5px-bottom text-extra-dark-gray alt-font d-block">Team Collaboration</h5>
                                    <p class="width-90 lg-width-100">Collaborates the projects from begining to end.</p>
                                </div>
                            </div>
                        </div>
                        <!-- end features box item -->
                        <!-- start features box item -->
                        <div class="col-12 col-md-4 text-center text-md-left wow fadeInUp last-paragraph-no-margin" data-wow-delay="0.4s">
                            <div class="row m-0">
                                <div class="col-12 col-lg-3 col-md-4 pl-0 sm-no-padding-right">
                                    <i class="icon-lightbulb icon-extra-medium text-medium-gray md-margin-15px-bottom sm-margin-10px-bottom position-relative top-minus3"></i>
                                    <span class="separator-line-verticle-large margin-ten-right bg-deep-pink float-right align-top margin-two-top d-none d-md-block"></span>
                                </div>
                                <div class="col-12 col-lg-9 col-md-8 md-no-padding-lr">
                                    <h5 class="text-medium margin-four-bottom md-margin-10px-bottom sm-margin-5px-bottom text-extra-dark-gray alt-font d-block">Get Notified</h5>
                                    <p class="width-90 lg-width-100"> Get notifications of due dates, comments and more via emails.</p>
                                </div>
                            </div>
                        </div>
                        <!-- end features box item -->
                    </div>
                </div>
            </section>
            <!-- end information at glsnce section -->

            <!-- start  work with team section -->
            <section class="wow fadeIn bg-extra-dark-gray">
                <div class="container"> 
                    <div class="row">
                        <div class="col-12 col-xl-5 col-lg-6 d-flex align-items-center md-margin-five-bottom text-center text-lg-left sm-no-margin-top wow fadeIn" data-wow-delay="0.4s">
                            <div class="lg-padding-15px-lr sm-padding-five-lr sm-padding-ten-bottom w-100">
                                <span class="alt-font text-medium-gray d-block margin-10px-bottom"> A dedicated team done great works.</span>
                                <h6 class="text-light-gray alt-font width-90 md-width-100">Work with any Teams</h6>
                                <p class="width-85 lg-width-90 md-width-100">Whether it’s for work, a side project or even the next family vacation, EaseWork helps your team stay organized and complete our work very easily.</p>
                                &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                            <?php
                                if(isset($_SESSION['UserID']))
                                {
                           ?>
                                    <a href="index.php?UserID=<?php echo $_SESSION['UserID']; ?>" class="btn btn-extra-large btn-white text-large border-radius-4 lg-margin-15px-bottom d-table d-lg-inline-block md-margin-lr-auto">Start your Work <i class="fas fa-arrow-right icon-very-small" aria-hidden="true"></i></a>
                            <?php
                                }
                                else
                                {
                            ?>
                                    <a href="login.php" class="btn btn-extra-large btn-white text-large border-radius-4 lg-margin-15px-bottom d-table d-lg-inline-block md-margin-lr-auto">Start your Work <i class="fas fa-arrow-right icon-very-small" aria-hidden="true"></i></a>
                            <?php
                                }
                            ?>

                            </div>
                        </div>
                        <div class="col-12 col-lg-3 offset-xl-1 text-center md-margin-five-bottom wow fadeIn">
                            <img src="assets1/images/image-10.jpg" alt="" class="w-100">
                        </div>
                        <div class="col-lg-3 text-left wow fadeIn" data-wow-delay="0.2s">
                            <div class="d-flex align-items-start flex-column justify-content-center text-white-2 bg-deep-pink padding-35px-lr lg-padding-15px-all md-padding-30px-all last-paragraph-no-margin h-100">
                                <div class="text-large margin-15px-bottom width-100">EaseWork is the best project management website</div>
                                <p class="width-100">We always stay with our users and respect their works.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- end work with team section -->

            <!-- start counter section -->
            <section class="wow fadeIn">
                <div class="container">
                    <div class="row">
                        <!-- start counter item-->
                        <div class="col-12 col-lg-3 col-md-6 text-center md-margin-30px-bottom wow fadeInUp">
                            <div class="counter-feature-box-1 w-100 border-all padding-5px-all">
                                <div class="counter-box bg-white d-flex justify-content-center flex-column h-100">
                                    <i class="icon-lightbulb icon-extra-medium text-medium-gray float-none float-md-left sm-margin-15px-bottom position-relative top-minus3"></i>
                                    <h6 class="d-block font-weight-600 text-extra-dark-gray alt-font mb-0 timer" data-speed="2000" data-to="4650">4650</h6>
                                    <span>Happy Users</span>
                                </div>
                            </div>
                        </div>
                        <!-- end counter item-->
                        <!-- start counter item-->
                        <div class="col-12 col-lg-3 col-md-6 text-center sm-margin-30px-bottom wow fadeInUp" data-wow-delay="0.4s">
                            <div class="counter-feature-box-1 w-100 border-all padding-5px-all">
                                <div class="counter-box bg-white d-flex justify-content-center flex-column h-100">
                                    <i class="icon-heart icon-medium text-medium-gray margin-15px-bottom"></i>
                                    <h6 class="d-block font-weight-600 text-extra-dark-gray alt-font mb-0 timer" data-speed="2000" data-to="5580">500</h6>
                                    <span>5 star Ratings</span>
                                </div>
                            </div>
                        </div>
                        <!-- end counter item-->
                        <!-- start counter item-->
                        <div class="col-12 col-lg-3 col-md-6 text-center md-margin-30px-bottom wow fadeInUp" data-wow-delay="0.2s">
                            <div class="counter-feature-box-1 w-100 border-all padding-5px-all">
                                <div class="counter-box bg-white d-flex justify-content-center flex-column h-100">
                                    <i class="icon-globe icon-extra-medium text-medium-gray float-none float-md-left sm-margin-15px-bottom position-relative top-minus3"></i>
                                    <h6 class="d-block font-weight-600 text-extra-dark-gray alt-font mb-0 timer" data-speed="2000" data-to="3790">30</h6>
                                    <span>Awards Won</span>
                                </div>
                            </div>
                        </div>
                        <!-- end counter item-->
                        <!-- start counter item-->
                        <div class="col-12 col-lg-3 col-md-6 text-center wow fadeInUp" data-wow-delay="0.6s">
                            <div class="counter-feature-box-1 w-100 border-all padding-5px-all">
                                <div class="counter-box bg-white d-flex justify-content-center flex-column h-100">
                                    <i class="icon-tools icon-extra-medium margin-20px-bottom"></i>
                                    <h6 class="d-block font-weight-600 text-extra-dark-gray alt-font mb-0 timer" data-speed="2000" data-to="8580">4</h6>
                                    <span>Templates Designed</span>
                                </div>
                            </div>
                        </div>
                        <!-- end counter item-->
                    </div>
                </div>
            </section>
            <!-- end counter section -->

            <!-- start How it works section -->
            <section class="parallax one-second-screen parallax-feature-box md-height-auto" data-stellar-background-ratio="0.3" style="background-image:url('assets1/images/portfolio-item166.jpg');">
                <div class="opacity-medium bg-extra-dark-gray"></div>
                <div class="container position-relative">
                    <div class="row justify-content-center">
                        <div class="col-12 col-xl-6 col-md-8 text-center md-margin-60px-bottom sm-margin-40px-bottom">
                            <a class="popup-youtube" href="https://www.youtube.com/watch?v=nrJtHemSPW4">
                                <img src="images/icon-play.png" class="width-130px" alt=""/></a>
                            <h4 class="alt-font text-white-2">How it Works? </h4>
                            <h7 class="alt-font text-white-2"> We deliver easy and comfortable website for you.</h7>
                        </div>
                    </div>
                    <div class="parallax-feature-box-bottom z-index-5 d-flex flex-wrap justify-content-center w-100 left-0 wow fadeInUp">
                        <!-- start features box item -->
                        <div class="col-12 col-lg-3 col-md-6 md-margin-four-bottom sm-margin-eight-bottom wow fadeInUp">
                            <div class="bg-white box-shadow-light text-center padding-fifteen-all position-relative sm-padding-five-all last-paragraph-no-margin">
                                <h4 class="text-light-gray text-deep-pink alt-font margin-15px-bottom margin-25px-top md-margin-15px-bottom">01</h4>
                                <div class="alt-font text-extra-dark-gray margin-10px-bottom md-margin-5px-bottom font-weight-600 text-uppercase">Create Board</div>
                                <p>Create a Board for any individual or group project give it a name, and invite your Team.</p>
                            </div>
                        </div>
                        <!-- end feature box item -->
                        <!-- start features box item -->
                        <div class="col-12 col-lg-3 col-md-6 md-margin-four-bottom sm-margin-eight-bottom wow fadeInUp" data-wow-delay="0.2s">
                            <div class="bg-white box-shadow-light text-center padding-fifteen-all position-relative sm-padding-five-all last-paragraph-no-margin">
                                <h4 class="text-light-gray text-deep-pink alt-font margin-15px-bottom margin-25px-top md-margin-15px-bottom">02</h4>
                                <div class="alt-font text-extra-dark-gray margin-10px-bottom md-margin-5px-bottom font-weight-600 text-uppercase">Create Cards</div>
                                <p>Create cards in different lists for tasks to complete or information you want to organize. </p>
                            </div>
                        </div>
                        <!-- end feature box item -->
                        <!-- start features box item -->
                        <div class="col-12 col-lg-3 col-md-6 sm-margin-eight-bottom wow fadeInUp" data-wow-delay="0.4s">
                            <div class="bg-white box-shadow-light text-center padding-fifteen-all position-relative sm-padding-five-all last-paragraph-no-margin">
                                <h4 class="text-light-gray text-deep-pink alt-font margin-15px-bottom margin-25px-top md-margin-15px-bottom">03</h4>
                                <div class="alt-font text-extra-dark-gray margin-10px-bottom md-margin-5px-bottom font-weight-600 text-uppercase">Add Information</div>
                                <p>Click on a card to add description, due dates, comments, checklists, and more.</p>
                            </div>
                        </div>
                        <!-- end feature box item -->
                        <!-- start features box item -->
                        <div class="col-12 col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.6s">
                            <div class="bg-white box-shadow-light text-center padding-fifteen-all position-relative sm-padding-five-all last-paragraph-no-margin">
                                <h4 class="text-light-gray text-deep-pink alt-font margin-15px-bottom margin-25px-top md-margin-15px-bottom">04</h4>
                                <div class="alt-font text-extra-dark-gray margin-10px-bottom md-margin-5px-bottom font-weight-600 text-uppercase">Drag and Drop</div>
                                <p>Move these cards across the list to show progress. Go from "To Do" to "Done" in no time.</p>
                            </div>
                        </div>
                        <!-- end feature box item -->
                    </div>
                </div>
            </section>

            <section class="wow fadeIn bg-light-gray">
                <div class="container margin-seven-half-top lg-margin-ten-top md-no-margin-top">
                    <div class="row">
                        <!-- start feature box item -->
                        <div class="col-12 col-lg-3 col-md-6 md-margin-seven-bottom sm-margin-40px-bottom wow fadeInRight last-paragraph-no-margin">
                            <div class="feature-box-6 position-relative">
                                <i class="icon-tools icon-extra-medium text-deep-pink"></i>
                                <div class="alt-font text-extra-dark-gray font-weight-600 line-height-20">Gantt charts</div>
                                <p class="line-height-20">Track your timeline using gantt charts</p>
                            </div>
                        </div>
                        <!-- end feature box item -->
                        <!-- start feature box item -->
                        <div class="col-12 col-lg-3 col-md-6 md-margin-seven-bottom sm-margin-40px-bottom wow fadeInRight last-paragraph-no-margin" data-wow-delay="0.2s">
                            <div class="feature-box-6 position-relative">
                                <i class="icon-layers icon-extra-medium text-deep-pink"></i>
                                <div class="alt-font text-extra-dark-gray font-weight-600 line-height-20">Calendar</div>
                                <p class="line-height-20">Manage your important works in time using calendars.</p>
                            </div>
                        </div>
                        <!-- end feature box item -->
                        <!-- start feature box item -->
                        <div class="col-12 col-lg-3 col-md-6 sm-margin-40px-bottom wow fadeInRight last-paragraph-no-margin" data-wow-delay="0.4s">
                            <div class="feature-box-6 position-relative">
                                <i class="icon-bargraph icon-medium text-deep-pink padding-5px-top"></i>
                                <div class="alt-font text-extra-dark-gray font-weight-600 line-height-20">Reports</div>
                                <p class="line-height-20">Graphs and charts give pretty visualizations.</p>
                            </div>
                        </div>
                        <!-- end feature box item -->
                        <!-- start feature box item -->
                        <div class="col-12 col-lg-3 col-md-6 wow fadeInRight last-paragraph-no-margin" data-wow-delay="0.6s">
                            <div class="feature-box-6 position-relative">
                                <i class="icon-expand icon-extra-medium text-deep-pink"></i>
                                <div class="alt-font text-extra-dark-gray font-weight-600 line-height-20">Templates</div>
                                <p class="line-height-20">use pre-designed beautiful, simple and Elegant templates</p>
                            </div>
                        </div>
                        <!-- end feature box item -->
                    </div>
                </div>
            </section>
            <!-- end How it works section -->

            <?php include_once("aboutTeam.php");?>

            <!-- start why this website section -->
            <section class="no-padding wow fadeIn bg-extra-dark-gray">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12 col-lg-6 cover-background md-height-500px sm-height-350px wow fadeIn" style="background-image:url('assets1/images/homepage-9-parallax-img4.jpg');"><div class="sm-height-400px"></div></div>
                        <div class="col-12 col-lg-6 wow fadeIn">
                            <div class="padding-ten-all float-left md-no-padding-lr lg-padding-50px-tb md-padding-70px-tb">
                                <div class="col-12 margin-four-bottom lg-margin-six-bottom md-margin-40px-bottom sm-margin-30px-bottom sm-no-padding-lr text-center text-lg-left">
                                    <h4 class="alt-font text-white-2 md-width-70 mx-auto md-no-margin-bottom sm-width-100 d-inline-block">Why This Website ?</h4>
                                </div>
                                <div class="col-12 p-0 d-flex flex-wrap text-center text-md-left">
                                    <!-- start feature box item -->
                                    <div class="col-12 col-md-6 col-lg-12 col-xl-6 margin-six-bottom md-margin-30px-bottom sm-no-padding last-paragraph-no-margin">
                                        <div class="text-light-gray margin-10px-bottom md-margin-5px-bottom alt-font"><span class="margin-10px-right d-block d-md-inline-block sm-width-100">01.</span>Elegant / unique design</div>
                                        <p>It is fun to use and it is very flexible. Every cards has the drag and drop feature which move the cards in no time.</p>
                                    </div>
                                    <!-- end feature box item -->
                                    <!-- start feature box item -->
                                    <div class="col-12 col-md-6 col-lg-12 col-xl-6 margin-six-bottom md-margin-30px-bottom sm-no-padding last-paragraph-no-margin">
                                        <div class="text-light-gray margin-10px-bottom md-margin-5px-bottom alt-font"><span class="margin-10px-right d-block d-md-inline-block sm-width-100">02.</span>Easy to use</div>
                                        <p>Every cards, lists and boards are managed in the simplest way. User can also acess the details of their team.</p>
                                    </div>
                                    <!-- end feature box item -->
                                    <!-- start feature box item -->
                                    <div class="col-12 col-md-6 col-lg-12 col-xl-6 sm-margin-30px-bottom sm-no-padding last-paragraph-no-margin">
                                        <div class="text-light-gray margin-10px-bottom md-margin-5px-bottom alt-font"><span class="margin-10px-right d-block d-md-inline-block sm-width-100">03.</span>Make it simple</div>
                                        <p>Easework gave the user simple and elegant websites which can be used by professionals as well as non-professionals.</p>
                                    </div>
                                    <!-- end feature box item -->
                                    <!-- start feature box item -->
                                    <div class="col-12 col-md-6 col-lg-12 col-xl-6 sm-no-padding last-paragraph-no-margin">
                                        <div class="text-light-gray margin-10px-bottom md-margin-5px-bottom alt-font"><span class="margin-10px-right d-block d-md-inline-block sm-width-100">04.</span>Track your work</div>
                                        <p>Gantt charts, Calendar and Graph reports made the visualization of the work progress easy.</p>
                                    </div>
                                    <!-- end feature box item -->
                                </div>
                            </div>
                        </div> 
                    </div>
                </div>
            </section>
            <!-- end why this website section -->

            <!-- start Explore template section -->
            <section class="wow fadeIn bg-extra-dark-gray"> 
                <div class="container">
                    <div class="row">
                        <!-- start feature box item -->
                        <div class="col-12 col-lg-4 d-flex justify-content-center flex-column text-center text-lg-left md-margin-five-bottom sm-margin-ten-bottom last-paragraph-no-margin">
                            <span class="text-extra-large text-white-2 alt-font margin-15px-bottom d-block width-85 md-width-100">Explore Beautifully Designed Templates.</span>
                            <a href="TemplateIntro.php" class="btn-info btn btn-small button border-radius-4 margin-5px-all lg-margin-15px-bottom d-table d-lg-inline-block md-margin-lr-auto">Explore <i class="ti-arrow-right"></i></a>
                        </div>
                        <!-- end feature box item -->
                        <!-- start feature box item -->
                        <pre>                                   </pre>
                        <div class="col-12 col-lg-2 col-md-3 d-flex justify-content-center align-items-center flex-column border-right border-color-medium-dark-gray text-center sm-margin-ten-bottom wow zoomIn" style="padding-right:  180px;">
                            <i class="icon-tools icon-extra-medium margin-20px-bottom"></i>
                            <span class="d-block text-medium text-extra-light-gray">Education</span>
                        </div>
                        <!-- end feature box item -->
                        <!-- start feature box item -->
                        <!-- <div class="col-12 col-lg-2 col-md-3 d-flex justify-content-center align-items-center flex-column border-right border-color-medium-dark-gray text-center sm-margin-ten-bottom wow zoomIn" data-wow-delay="0.2s">
                            <i class="icon-laptop icon-extra-medium margin-20px-bottom"></i>
                            <span class="d-block text-medium text-extra-light-gray">Project Management</span>
                        </div> -->
                        <!-- end feature box item -->
                        <!-- start feature box item -->
                        <!-- <div class="col-12 col-lg-2 col-md-3 d-flex justify-content-center align-items-center flex-column border-right border-color-medium-dark-gray text-center sm-margin-ten-bottom wow zoomIn" data-wow-delay="0.4s">
                            <i class="icon-hotairballoon icon-extra-medium margin-20px-bottom"></i>
                            <span class="d-block text-medium text-extra-light-gray">Event Management</span>
                        </div> -->
                        <!-- end feature box item -->
                        <!-- start feature box item -->
                        <pre>             </pre>
                        <div class="col-12 col-lg-2 col-md-3 d-flex justify-content-center align-items-center flex-column text-center wow zoomIn" data-wow-delay="0.6s">
                            <i class="icon-desktop icon-extra-medium margin-20px-bottom"></i>
                            <span class="d-block text-medium text-extra-light-gray">Personal</span>
                        </div>
                    </div> 
                    <!-- end feature box item -->
                </div>
            </section>
            <!-- end Explore template section -->

            <!-- start blank section -->
            <section class="wow fadeIn">
            </section>
            <!-- end blank section -->

        </div>

       <?php include_once("footer.php");?>

       <?php include_once("loadJs.php");?>
        
</body>

<!-- Mirrored from www.themezaa.com/html/pofo/home-creative-agency.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 30 May 2020 06:20:18 GMT -->
</html>