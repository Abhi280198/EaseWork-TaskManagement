<?php include_once("DbConnection.php"); ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">


<!-- Mirrored from demo.frontted.com/stackadmin/133/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 28 May 2020 07:51:48 GMT -->
<head>
    
    <title>EaseWork- Dashboard</title>
    <?php include_once('csslinks.php');?>
    

</head>

<body class="layout-default">

    <div class="preloader"></div>

    <!-- Header Layout -->
    <div class="mdk-header-layout js-mdk-header-layout">

        <!-- Header -->

        <?php include_once('header1.php');?>

        <!-- // END Header -->

        <!-- Header Layout Content -->
        <div class="mdk-header-layout__content">

            <div class="mdk-drawer-layout js-mdk-drawer-layout" data-push data-responsive-width="992px">
                <div class="mdk-drawer-layout__content page">





                    <div class="container-fluid page__heading-container">
                        <div class="page__heading d-flex align-items-center">
                            <div class="flex">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb mb-0">
                                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                                    </ol>
                                </nav>
                                <h3 class="m-0"><span style="color: #ff214f;">Welcome, <?php echo $_SESSION['Firstname']; ?></span></h3>
                            </div>
                            <!-- <a href="#" class="btn btn-success ml-3">New Report</a> -->
                        </div>
                    </div>




                    <div class="container-fluid page__container">

                       
                        <div class="row card-group-row">
                            <div class="col-lg-4 col-md-6 card-group-row__col">
                                <div class="card card-group-row__card card-body card-body-x-lg flex-row align-items-center">
                                    <div class="flex">
                                        <div class="card-header__title text-muted mb-2">Individual Task</div>
                                        <div class="text-amount">3</div>
                                        <div class="text-stats text-success"><i class="material-icons"></i></div>
                                    </div>
                                    <div><i class="material-icons icon-muted icon-40pt ml-3"></i></div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 card-group-row__col">
                                <div class="card card-group-row__card card-body card-body-x-lg flex-row align-items-center">
                                    <div class="flex">
                                        <div class="card-header__title text-muted mb-2">Group Task</div>
                                        <div class="text-amount">4</div>
                                        <div class="text-stats text-success"><i class="material-icons"></i></div>
                                    </div>
                                    <div><i class="material-icons icon-muted icon-40pt ml-3"></i></div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-12 card-group-row__col">
                                <div class="card card-group-row__card card-body card-body-x-lg flex-row align-items-center">
                                    <div class="flex">
                                        <div class="card-header__title text-muted mb-2">Completed Task</div>
                                        <div class="text-amount">4</div>
                                        <div class="text-stats text-danger"> <i class="material-icons"></i></div>
                                    </div>
                                    <div><i class="material-icons icon-muted icon-40pt ml-3"></i></div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-7">
                                <div class="card dashboard-area-tabs" id="dashboard-area-tabs">
                                    <div class="card-header p-0 bg-white nav">
                                        <div class="row no-gutters flex" role="tablist">
                                            
                                        </div>
                                    </div>
                                    
                                </div>



                               
                            </div>
                            

                                        
                        </div>

                        <div class="row">
                            <div class="col-lg">
                                <div class="card">
                                    <div class="card-header card-header-large bg-white d-flex align-items-center">
                                        <h4 class="card-header__title flex m-0">Recent Activity</h4>
                                        <div data-toggle="flatpickr" data-flatpickr-wrap="true" data-flatpickr-static="true" data-flatpickr-mode="range" data-flatpickr-alt-format="d/m/Y" data-flatpickr-date-format="d/m/Y">
                                            <!-- <a href="javascript:void(0)" class="link-date" data-toggle>13/03/2018 <span class="text-muted mx-1">to</span> 20/03/2018</a> -->
                                            <input class="d-none" type="hidden" value="13/03/2018 to 20/03/2018" data-input>
                                        </div>
                                    </div>
                                    <div class="card-header card-header-tabs-basic nav" role="tablist">
                                        <a href="#activity_all" class="active" data-toggle="tab" role="tab" aria-controls="activity_all" aria-selected="true">All</a>
                                       
                                    </div>
                                    <div class="list-group tab-content list-group-flush">
                                        <div class="tab-pane active show fade" id="activity_all">


                                            <div class="list-group-item list-group-item-action d-flex align-items-center ">
                                                <!-- <div class="avatar avatar-xs mr-3">
                                                    <span class="avatar-title rounded-circle  bg-purple">
                                                        <i class="material-icons">monetization_on</i>
                                                    </span>
                                                </div> -->
                                                <div class="avatar avatar-xs mr-3">
                                                    <span class="avatar-title rounded-circle  bg-teal">
                                                        <i class="material-icons">email</i>
                                                    </span>
                                                </div>


                                                <div class="flex">
                                                    <div class="d-flex align-items-middle">
                                                        <div class="avatar avatar-xxs mr-1">
                                                            <img src="assets/images/256_daniel-gaffey-1060698-unsplash.jpg" alt="Avatar" class="avatar-img rounded-circle">
                                                        </div>


                                                        <strong class="text-15pt mr-1">Jenell D. Matney</strong>
                                                    </div>
                                                    <small class="text-muted">4 days ago</small>
                                                </div>
                                                <!-- <div>$573</div> -->


                                                <i class="material-icons icon-muted ml-3">arrow_forward</i>
                                            </div>

                                            <div class="list-group-item list-group-item-action d-flex align-items-center ">
                                                <div class="avatar avatar-xs mr-3">
                                                    <span class="avatar-title rounded-circle  bg-teal">
                                                        <i class="material-icons">email</i>
                                                    </span>
                                                </div>


                                                <div class="flex">
                                                    <div class="d-flex align-items-middle">
                                                        <div class="avatar avatar-xxs mr-1">
                                                            <img src="assets/images/256_daniel-gaffey-1060698-unsplash.jpg" alt="Avatar" class="avatar-img rounded-circle">
                                                        </div>


                                                        <strong class="text-15pt mr-1">Sherri J. Cardenas</strong>
                                                    </div>
                                                    <small>Improve spacings on Projects page</small>
                                                </div>
                                                <small class="text-muted">3 days ago</small>


                                                <i class="material-icons icon-muted ml-3">arrow_forward</i>
                                            </div>

                                            <div class="list-group-item list-group-item-action d-flex align-items-center  bg-light ">
                                                <!-- <div class="avatar avatar-xs mr-3">
                                                    <span class="avatar-title rounded-circle  ">
                                                        <i class="material-icons">monetization_on</i>
                                                    </span>
                                                </div> -->
                                                <div class="avatar avatar-xs mr-3">
                                                    <span class="avatar-title rounded-circle  ">
                                                        <i class="material-icons">description</i>
                                                    </span>
                                                </div>


                                                <div class="flex">
                                                    <div class="d-flex align-items-middle">
                                                        <div class="avatar avatar-xxs mr-1">
                                                            <img src="assets/images/256_jeremy-banks-798787-unsplash.jpg" alt="Avatar" class="avatar-img rounded-circle">
                                                        </div>


                                                        <strong class="text-15pt mr-1">Joseph S. Ferland</strong>
                                                    </div>
                                                    <small class="text-muted">2 days ago</small>
                                                </div>
                                                <!-- <div>$244</div>
 -->

                                                <i class="material-icons icon-muted ml-3">arrow_forward</i>
                                            </div>

                                            <div class="list-group-item list-group-item-action d-flex align-items-center  bg-light ">
                                                <!-- <div class="avatar avatar-xs mr-3">
                                                    <span class="avatar-title rounded-circle  ">
                                                        <i class="material-icons">monetization_on</i>
                                                    </span>
                                                </div> -->
                                                <div class="avatar avatar-xs mr-3">
                                                    <span class="avatar-title rounded-circle  bg-teal">
                                                        <i class="material-icons">email</i>
                                                    </span>
                                                </div>


                                                <div class="flex">
                                                    <div class="d-flex align-items-middle">
                                                        <div class="avatar avatar-xxs mr-1">
                                                            <img src="assets/images/256_joao-silas-636453-unsplash.jpg" alt="Avatar" class="avatar-img rounded-circle">
                                                        </div>


                                                        <strong class="text-15pt mr-1">Bryan K. Davis</strong>
                                                    </div>
                                                    <small class="text-muted">1 day ago</small>
                                                </div>
                                                <!-- <div>$664</div>
 -->

                                                <i class="material-icons icon-muted ml-3">arrow_forward</i>
                                            </div>

                                            <div class="list-group-item list-group-item-action d-flex align-items-center  bg-light ">
                                                <div class="avatar avatar-xs mr-3">
                                                    <span class="avatar-title rounded-circle  ">
                                                        <i class="material-icons">description</i>
                                                    </span>
                                                </div>


                                                <div class="flex">
                                                    <div class="d-flex align-items-middle">
                                                        <div class="avatar avatar-xxs mr-1">
                                                            <img src="assets/images/256_luke-porter-261779-unsplash.jpg" alt="Avatar" class="avatar-img rounded-circle">
                                                        </div>


                                                        <strong class="text-15pt mr-1">Kaci M. Langston</strong>
                                                    </div>
                                                    <small class="text-muted">just now</small>
                                                </div>
                                                <!-- <div>$631</div> -->


                                                <i class="material-icons icon-muted ml-3">arrow_forward</i>
                                            </div>

                                            <div class="card-footer text-center border-0">
                                                <a class="text-muted" href="#">View All (54)</a>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="activity_purchases">

                                            <div class="list-group-item list-group-item-action d-flex align-items-center ">
                                                <div class="avatar avatar-xs mr-3">
                                                    <span class="avatar-title rounded-circle  bg-purple">
                                                        <i class="material-icons">monetization_on</i>
                                                    </span>
                                                </div>

                                                <div class="flex">
                                                    <div class="d-flex align-items-middle">
                                                        <div class="avatar avatar-xxs mr-1">
                                                            <img src="assets/images/256_rsz_1andy-lee-642320-unsplash.jpg" alt="Avatar" class="avatar-img rounded-circle">
                                                        </div>
                                                        <strong class="text-15pt mr-1">Sherri J. Cardenas</strong>

                                                    </div>
                                                    <small class="text-muted">4 days ago</small>
                                                </div>
                                                <div>$573</div>
                                                <i class="material-icons icon-muted ml-3">arrow_forward</i>
                                            </div>

                                            <div class="list-group-item list-group-item-action d-flex align-items-center ">
                                                <div class="avatar avatar-xs mr-3">
                                                    <span class="avatar-title rounded-circle  bg-purple">
                                                        <i class="material-icons">monetization_on</i>
                                                    </span>
                                                </div>

                                                <div class="flex">
                                                    <div class="d-flex align-items-middle">
                                                        <div class="avatar avatar-xxs mr-1">
                                                            <img src="assets/images/256_daniel-gaffey-1060698-unsplash.jpg" alt="Avatar" class="avatar-img rounded-circle">
                                                        </div>
                                                        <strong class="text-15pt mr-1">Joseph S. Ferland</strong>

                                                    </div>
                                                    <small class="text-muted">3 days ago</small>
                                                </div>
                                                <div>$612</div>
                                                <i class="material-icons icon-muted ml-3">arrow_forward</i>
                                            </div>

                                            <div class="list-group-item list-group-item-action d-flex align-items-center ">
                                                <div class="avatar avatar-xs mr-3">
                                                    <span class="avatar-title rounded-circle  bg-purple">
                                                        <i class="material-icons">monetization_on</i>
                                                    </span>
                                                </div>

                                                <div class="flex">
                                                    <div class="d-flex align-items-middle">
                                                        <div class="avatar avatar-xxs mr-1">
                                                            <img src="assets/images/256_jeremy-banks-798787-unsplash.jpg" alt="Avatar" class="avatar-img rounded-circle">
                                                        </div>
                                                        <strong class="text-15pt mr-1">Bryan K. Davis</strong>

                                                    </div>
                                                    <small class="text-muted">2 days ago</small>
                                                </div>
                                                <div>$244</div>
                                                <i class="material-icons icon-muted ml-3">arrow_forward</i>
                                            </div>

                                            <div class="list-group-item list-group-item-action d-flex align-items-center  bg-light ">
                                                <div class="avatar avatar-xs mr-3">
                                                    <span class="avatar-title rounded-circle ">
                                                        <i class="material-icons">monetization_on</i>
                                                    </span>
                                                </div>

                                                <div class="flex">
                                                    <div class="d-flex align-items-middle">
                                                        <div class="avatar avatar-xxs mr-1">
                                                            <img src="assets/images/256_joao-silas-636453-unsplash.jpg" alt="Avatar" class="avatar-img rounded-circle">
                                                        </div>
                                                        <strong class="text-15pt mr-1">Kaci M. Langston</strong>

                                                    </div>
                                                    <small class="text-muted">1 day ago</small>
                                                </div>
                                                <div>$664</div>
                                                <i class="material-icons icon-muted ml-3">arrow_forward</i>
                                            </div>

                                            <div class="list-group-item list-group-item-action d-flex align-items-center  bg-light ">
                                                <div class="avatar avatar-xs mr-3">
                                                    <span class="avatar-title rounded-circle ">
                                                        <i class="material-icons">monetization_on</i>
                                                    </span>
                                                </div>

                                                <div class="flex">
                                                    <div class="d-flex align-items-middle">
                                                        <div class="avatar avatar-xxs mr-1">
                                                            <img src="assets/images/256_michael-dam-258165-unsplash.jpg" alt="Avatar" class="avatar-img rounded-circle">
                                                        </div>
                                                        <strong class="text-15pt mr-1"></strong>

                                                    </div>
                                                    <small class="text-muted">just now</small>
                                                </div>
                                                <div>$631</div>
                                                <i class="material-icons icon-muted ml-3">arrow_forward</i>
                                            </div>

                                        </div>
                                        <div class="tab-pane" id="activity_emails">

                                            <div class="list-group-item list-group-item-action d-flex align-items-center ">
                                                <div class="avatar avatar-xs mr-3">
                                                    <span class="avatar-title rounded-circle  bg-teal">
                                                        <i class="material-icons">email</i>
                                                    </span>
                                                </div>

                                                <div class="flex">
                                                    <div class="d-flex align-items-middle">
                                                        <div class="avatar avatar-xxs mr-1">
                                                            <img src="assets/images/256_rsz_1andy-lee-642320-unsplash.jpg" alt="Avatar" class="avatar-img rounded-circle">
                                                        </div>
                                                        <strong class="text-15pt mr-1">Jenell D. Matney</strong>

                                                    </div>
                                                    <small>Confirmation required for design</small>
                                                </div>
                                                <small class="text-muted">4 days ago</small>
                                                <i class="material-icons icon-muted ml-3">arrow_forward</i>
                                            </div>

                                            <div class="list-group-item list-group-item-action d-flex align-items-center ">
                                                <div class="avatar avatar-xs mr-3">
                                                    <span class="avatar-title rounded-circle  bg-teal">
                                                        <i class="material-icons">email</i>
                                                    </span>
                                                </div>

                                                <div class="flex">
                                                    <div class="d-flex align-items-middle">
                                                        <div class="avatar avatar-xxs mr-1">
                                                            <img src="assets/images/256_daniel-gaffey-1060698-unsplash.jpg" alt="Avatar" class="avatar-img rounded-circle">
                                                        </div>
                                                        <strong class="text-15pt mr-1">Sherri J. Cardenas</strong>

                                                    </div>
                                                    <small>Improve spacings on Projects page</small>
                                                </div>
                                                <small class="text-muted">3 days ago</small>
                                                <i class="material-icons icon-muted ml-3">arrow_forward</i>
                                            </div>

                                            <div class="list-group-item list-group-item-action d-flex align-items-center ">
                                                <div class="avatar avatar-xs mr-3">
                                                    <span class="avatar-title rounded-circle  bg-teal">
                                                        <i class="material-icons">email</i>
                                                    </span>
                                                </div>

                                                <div class="flex">
                                                    <div class="d-flex align-items-middle">
                                                        <div class="avatar avatar-xxs mr-1">
                                                            <img src="assets/images/256_jeremy-banks-798787-unsplash.jpg" alt="Avatar" class="avatar-img rounded-circle">
                                                        </div>
                                                        <strong class="text-15pt mr-1">Joseph S. Ferland</strong>

                                                    </div>
                                                    <small>You unlocked a new Badge</small>
                                                </div>
                                                <small class="text-muted">2 days ago</small>
                                                <i class="material-icons icon-muted ml-3">arrow_forward</i>
                                            </div>

                                            <div class="list-group-item list-group-item-action d-flex align-items-center  bg-light ">
                                                <div class="avatar avatar-xs mr-3">
                                                    <span class="avatar-title rounded-circle ">
                                                        <i class="material-icons">email</i>
                                                    </span>
                                                </div>

                                                <div class="flex">
                                                    <div class="d-flex align-items-middle">
                                                        <div class="avatar avatar-xxs mr-1">
                                                            <img src="assets/images/256_joao-silas-636453-unsplash.jpg" alt="Avatar" class="avatar-img rounded-circle">
                                                        </div>
                                                        <strong class="text-15pt mr-1">Bryan K. Davis</strong>

                                                    </div>
                                                    <small>Meeting on Friday</small>
                                                </div>
                                                <small class="text-muted">1 day ago</small>
                                                <i class="material-icons icon-muted ml-3">arrow_forward</i>
                                            </div>

                                            <div class="list-group-item list-group-item-action d-flex align-items-center  bg-light ">
                                                <div class="avatar avatar-xs mr-3">
                                                    <span class="avatar-title rounded-circle ">
                                                        <i class="material-icons">email</i>
                                                    </span>
                                                </div>

                                                <div class="flex">
                                                    <div class="d-flex align-items-middle">
                                                        <div class="avatar avatar-xxs mr-1">
                                                            <img src="assets/images/256_luke-porter-261779-unsplash.jpg" alt="Avatar" class="avatar-img rounded-circle">
                                                        </div>
                                                        <strong class="text-15pt mr-1">Kaci M. Langston</strong>

                                                    </div>
                                                    <small>Design a new Brochure</small>
                                                </div>
                                                <small class="text-muted">just now</small>
                                                <i class="material-icons icon-muted ml-3">arrow_forward</i>
                                            </div>

                                        </div>
                                        <div class="tab-pane" id="activity_quotes"></div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>

                        
                        
                    </div>



                </div>
                <!-- // END drawer-layout__content -->

                <?php include_once('sidebar1.php');?>

            </div>
            <!-- // END drawer-layout -->

        </div>
        <!-- // END header-layout__content -->

    </div>
    <!-- // END header-layout -->

    <?php include_once('scriptlinks.php');?>

</body>


<!-- Mirrored from demo.frontted.com/stackadmin/133/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 28 May 2020 07:52:47 GMT -->
</html>