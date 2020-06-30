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
<!--                         <div class="row card-group-row">
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
 -->                        <!--End counter section-->

                        <!-- Table Data -->
                        <div class="card" style="margin-right: 130px; margin-left: 130px;">
                            <div class="card-header card-header-large bg-white">
                                <h5 class="mr-sm-2" for="inlineFormFilterBy">Member & Task Details(Progress)</h5>
                            </div>


                            <div class="table-responsive border-bottom" data-toggle="lists" data-lists-values="[&quot;js-lists-values-employee-name&quot;]">

                                <table class="table mb-0 thead-border-top-0">
                                    <thead>
                                        <tr>
                                            <th style="width: 18px;">Sr.No</th>
                                            <th>Board Member</th>
                                            <th style="width: 37px;">Allocated</th>
                                            <th style="width: 120px;">Completed</th>
                                            <th style="width: 400px;">Progress</th>
                                            <th style="width: 48px;">Per(%)</th>
                                            <!-- <th style="width: 51px;">Earnings</th> -->
                                        </tr>
                                    </thead>
                                    <tbody class="list" id="staff">
                                        <?php 
                                            $bid=$_GET['Bid'];
                                            $select="SELECT * FROM tbluser u,tblteammember tm WHERE tm.Bid=$bid AND u.Uid=tm.Uid";
                                            $res=mysqli_query($con,$select);
                                            if($res->num_rows!=0)
                                            {
                                                while($fetch_user=$res->fetch_array()) 
                                                {
                                                    $fetch_uid=$fetch_user['Uid'];
                                                    /*while($fetch_user=mysqli_fetch_array($Execute_select_Data)>0) */
                                                    /*while($row=$res->fetch_array())  */
                                                    $srno=1;
                                                    $cardData1="SELECT count(Bid) AS 'cnt1' FROM tblcard c,tblmembercard mc 
                                                    WHERE c.Bid=$bid AND c.Cardid=mc.Cardid AND mc.Uid=$fetch_uid";
                                                    $card_Data1=mysqli_query($con,$cardData1);
                                                    $fetch_cnt1=$card_Data1->fetch_array();

                                                    $cardData2="SELECT count(Bid) AS 'cnt2' FROM tblcard c,tblmembercard mc 
                                                    WHERE c.Bid=$bid AND c.Cardid=mc.Cardid AND mc.Uid=$fetch_uid AND isActive=1";
                                                    $card_Data2=mysqli_query($con,$cardData2);
                                                    $fetch_cnt2=$card_Data2->fetch_array();             

                                                    $total=$fetch_cnt1['cnt1'];                                  
                                                    $completed=$fetch_cnt2['cnt2'];
                                                    $per=$completed*100/$total;

                                                    ?>
                                                        <tr class="selected">
                                                            <td><?php echo $srno?></td>
                                                            <td>
                                                                <div class="media align-items-center">
                                                                    <div class="avatar avatar-xs mr-2">
                                                                        <img src="images/profile/<?php echo $fetch_user['ProfilePic']; ?>" alt="Avatar" class= "avatar-img rounded-circle">
                                                                    </div>
                                                                    <div class="media-body"> 
                                                                        <span class="js-lists-values-employee-name">
                                                                            <?php echo $fetch_user['Fname']; ?>
                                                                            <?php echo $fetch_user['Lname']; ?>
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td><?php echo $fetch_cnt1['cnt1']; ?></td>
                                                            <td><?php echo $fetch_cnt2['cnt2']; ?></td>
                                                            <td>
                                                                <div class="progress" style="height: 6px;">
                                                                    <div class="progress-bar" role="progressbar" style="width: <?php echo $per; ?>%;" aria-valuenow="61" aria-valuemin="0" aria-valuemax="100"></div>
                                                                </div>
                                                            </td>
                                                            <td><?php echo $per; ?></td>
                                                        </tr>
                                                    <?php
                                                    $srno++;
                                                }
                                            }
                                        ?>
                                        

                                    </tbody>
                                </table>
                            </div>

                            <br>



                        </div>
                        <!-- Table Data -->


                        <!-- Pie Chart -->
                        <div id="piechart"></div>
                        <!-- <div class="caard" style="margin-left: 130px; margin-right: 130px;">
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
                        </div> -->
                        <!-- Pie Chart -->
                    

                        


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