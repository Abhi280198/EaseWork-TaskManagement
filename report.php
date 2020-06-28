<?php 
    include_once("DbConnection.php");
?>
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
                                        <li class="breadcrumb-item">
                                            <a href="index.php?Uid=<?php echo $_SESSION['UserID'];?>">
                                                <i class="material-icons icon-20pt">home</i>
                                            </a>
                                        </li>
                                        <li class="breadcrumb-item"><a href="#">Team</a></li>
                                        <li class="breadcrumb-item" aria-current="page">

                                            <a href="TeamPage.php?Uid=<?php echo $_SESSION['UserID'];?>">Board</a>
                                        </li>
                                    </ol>
                                </nav>
                                <h1 class="m-0">Report</h1>
                            </div>
                        </div>
                    </div>
                    <!--End Bold header section-->

                    <!--Start Board section-->
                    <div class="container-fluid page__container">

                        <!--Start Recent Activity section-->
                        <!-- <div class="mb-3"><strong class="text-dark-gray">Recently Viewed</strong></div>
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
                        </div> -->
                        <!--End Recent Activity section-->

                    

                        <!--Start counter section-->
                        <div class="row card-group-row">
                            <div class="col-lg-3 col-md-6 card-group-row__col">
                                <div class="card card-group-row__card card-body card-body-x-lg flex-row align-items-center">
                                    <div class="flex">
                                        <div class="card-header__title text-muted mb-2">Current Target</div>
                                        <div class="text-amount">$12,920</div>
                                        <div class="text-stats text-success">31.5% <i class="material-icons">arrow_upward</i></div>
                                    </div>
                                    <div><i class="material-icons icon-muted icon-40pt ml-3">gps_fixed</i></div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 card-group-row__col">
                                <div class="card card-group-row__card card-body card-body-x-lg flex-row align-items-center">
                                    <div class="flex">
                                        <div class="card-header__title text-muted mb-2">Earnings</div>
                                        <div class="text-amount">$3,642</div>
                                        <div class="text-stats text-success">51.5% <i class="material-icons">arrow_upward</i></div>
                                    </div>
                                    <div><i class="material-icons icon-muted icon-40pt ml-3">monetization_on</i></div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-12 card-group-row__col">
                                <div class="card card-group-row__card card-body card-body-x-lg flex-row align-items-center">
                                    <div class="flex">
                                        <div class="card-header__title text-muted mb-2">Website Traffic</div>
                                        <div class="text-amount">8,391</div>
                                        <div class="text-stats text-danger">3.5% <i class="material-icons">arrow_downward</i></div>
                                    </div>
                                    <div><i class="material-icons icon-muted icon-40pt ml-3">perm_identity</i></div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-12 card-group-row__col">
                                <div class="card card-group-row__card card-body card-body-x-lg flex-row align-items-center">
                                    <div class="flex">
                                        <div class="card-header__title text-muted mb-2">Website Traffic</div>
                                        <div class="text-amount">8,391</div>
                                        <div class="text-stats text-danger">3.5% <i class="material-icons">arrow_downward</i></div>
                                    </div>
                                    <div><i class="material-icons icon-muted icon-40pt ml-3">perm_identity</i></div>
                                </div>
                            </div>
                            </div>
                        </div>
                        <!--End counter section-->

                    <div class="row" style="margin-left: 110px; margin-right: 110px;">
                        <!-- Table Data -->
                        <div class="col-sm-6 col-md-6 col-lg-7" >
                            <!-- <div class="card-header">
                                <h4 class="mr-sm-2" for="inlineFormFilterBy">Member & Task Details(Progress)</h4>
                            </div> -->
                            <div class="card-header card-header-large bg-white">
                                <h5 class="mr-sm-2" for="inlineFormFilterBy">Member & Task Details(Progress)</h5>
                            </div>


                            <div class="table-responsive border-bottom" data-toggle="lists" data-lists-values="[&quot;js-lists-values-employee-name&quot;]">

                                <table class="table mb-0 thead-border-top-0">
                                    <thead>
                                        <tr>
                                            <th style="width: 18px;">Sr.No</th>
                                            <th>Team Member</th>
                                            <th style="width: 150px;">Progress</th>
                                            <th style="width: 48px;">Per(%)</th>
                                            <th style="width: 37px;">Allocated</th>
                                            <th style="width: 120px;">Completed</th>
                                            <th style="width: 51px;">Earnings</th>
                                        </tr>
                                    </thead>
                                    <tbody class="list" id="staff">
                                        <?php 
                                            $bid=$_GET['Bid'];
                                            $select="SELECT * from tbluser where Email='$Mem_Email' AND IsActive=1";
                                            $Execute_select_Data = mysqli_query($con,$SelectData)or die(mysqli_error($con));
                                            if($Execute_select_Data->num_rows!=0)
                                            {

                                            }
                                        ?>
                                        <tr class="selected">
                                            <td>1</td>
                                            <td>
                                                <div class="media align-items-center">
                                                    <div class="avatar avatar-xs mr-2">
                                                        <img src="assets/images/256_luke-porter-261779-unsplash.jpg" alt="Avatar" class="avatar-img rounded-circle">
                                                    </div>
                                                    <div class="media-body">

                                                        <span class="js-lists-values-employee-name">Michael Smith</span>

                                                    </div>
                                                </div>

                                            </td>

                                            <td>
                                                <div class="progress" style="height: 6px;">
                                                    <div class="progress-bar" role="progressbar" style="width: 61%;" aria-valuenow="61" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </td>

                                            <td>12</td>
                                            <td><span class="badge badge-warning">ADMIN</span></td>
                                            <td><small class="text-muted">3 days ago</small></td>
                                            <td>$12,402</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <br>



                        </div>
                        <!-- Table Data -->


                        <!-- Pie Chart -->
                        <div class="col-sm-6 col-md-9 col-lg-5" >
                            <div class="card-header card-header-large bg-white d-flex align-items-center">
                                <h5 class="mr-sm-2" for="inlineFormFilterBy">No.of Task</h5>
                            </div>
                                    <div class="card-body d-flex align-items-center justify-content-center" style="height: 210px;">
                                        <div class="row">
                                            <div class="col-7">
                                                <div class="chart" style="height: calc(210px - 1.25rem * 2);">
                                                    <div class="chartjs-size-monitor" style="position: absolute; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;">
                                                        <div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                                                            <div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0">
                                                                
                                                            </div>
                                                        </div>
                                                        <div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                                                            <div style="position:absolute;width:200%;height:200%;left:0; top:0">
                                                                
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <canvas id="locationDoughnutChart" data-chart-legend="#locationDoughnutChartLegend" width="152" height="180" class="chartjs-render-monitor" style="display: block; width: 152px; height: 180px;">
                                                        <span style="font-size: 1rem;" class="text-muted"><strong>Location</strong> doughnut chart goes here.</span>
                                                    </canvas>
                                                </div>
                                            </div>
                                            <div class="col-5">
                                                <div id="locationDoughnutChartLegend" class="chart-legend chart-legend--vertical">
                                                    <span>
                                                        <i class="chart-legend-indicator" style="background-color: #75d34a"></i>
                                                        United Statessss
                                                    </span>
                                                    <span class="chart-legend-item">
                                                        <i class="chart-legend-indicator" style="background-color: #ee405a"></i>
                                                        United Kingdom
                                                    </span>
                                                    <span class="chart-legend-item">
                                                        <i class="chart-legend-indicator" style="background-color: #3099ff"></i>
                                                        Germany
                                                    </span>
                                                    <span class="chart-legend-item"><i class="chart-legend-indicator" style="background-color: #939fad"></i>
                                                        India
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                        </div>
                        <!-- Pie Chart -->
                    </div>

                        


                    </div>
                    <!--End Board and Description section-->

                </div>
                <!--End Board page section-->

                

            </div>
        </div>

    </div>

    <?php include_once('scriptlinks.php');?>

</body>


<!-- Mirrored from demo.frontted.com/stackadmin/133/stories.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 28 May 2020 07:53:53 GMT -->
</html>