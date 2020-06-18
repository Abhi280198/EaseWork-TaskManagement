<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    
    <title>EaseWork- Teams</title>
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
                                        <li class="breadcrumb-item">Boards</li>
                                        <li class="breadcrumb-item active" aria-current="page">Teams</li>
                                    </ol>
                                </nav>
                                <h1 class="m-0">Teams</h1>
                            </div>
                        </div>
                    </div>
                    <!--End Bold header section-->

                    <!--Start Board section-->
                    <div class="container-fluid page__container">

                        <!--Start Recent Activity section-->
                        <div class="mb-3"><strong class="text-dark-gray">Recently Viewed</strong></div>
                        <div class="stories-cards mb-4">
                            <div class="card stories-card">
                                <div class="stories-card__content d-flex align-items-center flex-wrap">
                                    <div class="avatar avatar-lg mr-3">
                                        <a href="#"><img src="assets/images/stories/256_rsz_clem-onojeghuo-193397-unsplash.jpg" alt="avatar" class="avatar-img rounded"></a>
                                    </div>
                                    <div >
                                        <h5><a href="Team_boards.php" class="headings-color">Wedding Planning</a></h5>
                                        <small class="text-dark-gray">created last week</small>
                                    </div>
                                </div>
                            </div>

                            <div class="card stories-card">
                                <div class="stories-card__content d-flex align-items-center flex-wrap">
                                    <div class="avatar avatar-lg mr-3">
                                        <a href="Team_boards.php"><img src="assets/images/stories/256_rsz_clem-onojeghuo-193397-unsplash.jpg" alt="avatar" class="avatar-img rounded"></a>
                                    </div>
                                    <div >
                                        <h5><a href="#" class="headings-color">Different Classes</a></h5>
                                        <small class="text-dark-gray">created 2 days ago </small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--End Recent Activity section-->

                        <br>

                        <!--Start Boards section-->
                        <div class="my-3"><strong class="text-dark-gray">Teams</strong>
                        </div>
                        <div class="row">

                                <div class="col-sm-6 col-md-4">
                                    <div class="card stories-card-popular">
                                        <img src="assets/images/stories/256_rsz_euan-carmichael-666378-unsplash.jpg" alt="" class="card-img">
                                        <div class="stories-card-popular__content">
                                            <div class="stories-card-popular__title card-body">
                                                <h4 class="card-title m-0"><a href="Team_boards.php">Wedding Planning</a></h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6 col-md-4">
                                    <div class="card stories-card-popular">
                                        <img src="assets/images/stories/256_rsz_jared-rice-388260-unsplash.jpg" alt="" class="card-img">
                                        <div class="stories-card-popular__content">
                                            <div class="stories-card-popular__title card-body">
                                                <h4 class="card-title m-0"><a href="Team_boards.php">Different Classes</a></h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6 col-md-4">
                                    <div class="card stories-card-popular">
                                        <img src="assets/images/stories/256_rsz_dex-ezekiel-761373-unsplash.jpg" alt="" class="card-img">
                                        <div class="stories-card-popular__content">
                                            <div class="stories-card-popular__title card-body">
                                                <h4 class="card-title m-0"><a href="Team_boards.php">New Year Party</a></h4>
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