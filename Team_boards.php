<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    
    <title>EaseWork- Team Boards</title>
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
                                        <li class="breadcrumb-item">Team</li>
                                        <li class="breadcrumb-item active" aria-current="page">Boards</li>
                                    </ol>
                                </nav>
                                <h1 class="m-0">Boards</h1>
                            </div>
                            <a href="Template_dashboard.php" class="btn btn-success ml-3">Explore Templates</a>
                        </div>
                    </div>
                    <!--End Bold header section-->

                    <!--Start Board and Description section-->
                    <div class="container-fluid page__container">

                        <!--Start Team description section-->
                        <div class="mb-3"><strong class="text-dark-gray">Team Descrpition</strong></div>
                        <div class="stories-cards mb-4">
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since. Lorem Ipsum has been the industry's standard dummy text ever since. Lorem Ipsum is printing and typesetting simply dummy text.</p>
                        </div>
                        <!--End Team description section-->

                        <br>

                        <!--Start Boards section-->
                        <div class="my-3"><strong class="text-dark-gray">Boards</strong>
                        </div>
                        <div class="row">

                                <div class="col-sm-6 col-md-4">
                                    <div class="card stories-card-popular">
                                        <img src="assets/images/stories/256_rsz_euan-carmichael-666378-unsplash.jpg" alt="" class="card-img">
                                        <div class="stories-card-popular__content">
                                            <div class="stories-card-popular__title card-body">
                                                <h4 class="card-title m-0"><a href="board.php">Tremblant In Canada</a></h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6 col-md-4">
                                    <div class="card stories-card-popular">
                                        <img src="assets/images/stories/256_rsz_jared-rice-388260-unsplash.jpg" alt="" class="card-img">
                                        <div class="stories-card-popular__content">
                                            <div class="stories-card-popular__title card-body">
                                                <h4 class="card-title m-0"><a href="#">Become A Travel Pro In One Easy Lesson</a></h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6 col-md-4">
                                    <div class="card stories-card-popular">
                                        <img src="assets/images/stories/256_rsz_dex-ezekiel-761373-unsplash.jpg" alt="" class="card-img">
                                        <div class="stories-card-popular__content">
                                            <div class="stories-card-popular__title card-body">
                                                <h4 class="card-title m-0"><a href="#">A Guide To Rocky Mountain Vacations</a></h4>
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
                <?php include_once('sidebar_team.php');?>
                <!--End sidebar section-->

            </div>
        </div>

    </div>

    <?php include_once('scriptlinks.php');?>

</body>


<!-- Mirrored from demo.frontted.com/stackadmin/133/stories.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 28 May 2020 07:53:53 GMT -->
</html>