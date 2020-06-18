<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    
    <title>EaseWork- Templates</title>
    <?php include_once('csslinks.php');?>
   
</head>

<body class="layout-default">


    <div class="preloader"></div>

    <div class="mdk-header-layout js-mdk-header-layout">

        <!-- Header -->
        <?php include_once('header1.php');?>
        <!-- // END Header -->

        <div class="mdk-header-layout__content">
            <div class="mdk-drawer-layout js-mdk-drawer-layout" data-push data-responsive-width="992px">

                <!--Start Board Page section-->
                <div class="mdk-drawer-layout__content page">

                    <!--Start Bold header section-->
                    <div class="container-fluid page__heading-container">
                        <div class="page__heading d-flex align-items-center">
                            <div class="flex">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb mb-0">
                                        <li class="breadcrumb-item"><a href="#"><i class="material-icons icon-20pt">home</i></a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Templates</li>
                                    </ol>
                                </nav>
                                <h1 class="m-0">Start Ahead with Pre-Designed Templates</h1>
                            </div>
                        </div>
                    </div>
                    <!--End Bold header section-->

                    <!--Start template list section-->
                    <div class="container-fluid page__container">

                        <div class="mb-3"><strong class="text-dark-gray">From the minds that created EaseWork</strong></div>

                        <br>

                        <!--Start Boards section-->
                        <div class="row">

                                <div class="col-sm-6 col-md-4">
                                    <div class="card stories-card-popular">
                                        <img src="assets1/images/blog-img16.jpg" alt="" class="card-img">
                                        <div class="stories-card-popular__content">
                                            <div class="stories-card-popular__title card-body">
                                                <h4 class="card-title m-0"><a href="dashboard_template_education.php">Education</a></h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6 col-md-4">
                                    <div class="card stories-card-popular">
                                        <img src="assets1/images/blog-img74.jpg" alt="" class="card-img">
                                        <div class="stories-card-popular__content">
                                            <div class="stories-card-popular__title card-body">
                                                <h4 class="card-title m-0"><a href="dashboard_template_personal.php">Personal</a></h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6 col-md-4">
                                    <div class="card stories-card-popular">
                                        <img src="assets1/images/back-image2.png" alt="" class="card-img">
                                        <div class="stories-card-popular__content">
                                            <div class="stories-card-popular__title card-body">
                                                <h4 class="card-title m-0">Coming Soon...</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </div>
                        <!--End Boards section-->

                    </div>
                    <!--End Board and Description section-->

                </div>
                <!--End Board page section-->

                <!--Start sidebar section-->
                <?php include_once('sidebar1.php');?>
                <!--End sidebar section-->

            </div>
        </div>

    </div>

<?php include_once('scriptlinks.php');?>

</body>


<!-- Mirrored from demo.frontted.com/stackadmin/133/stories.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 28 May 2020 07:53:53 GMT -->
</html>