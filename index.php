<?php 
    include_once("DbConnection.php");
    $recentuser=$_SESSION['UserID'];
?>

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
                                        <div class="card-header__title text-muted mb-2">Individual Board</div>
                                        <?php
                                            $IndividualCount="Select count(*) as individualcount from tblboard where Tid=1 AND Uid='".$_SESSION['UserID']."' AND IsActive=1";
                                            $ExeIndividualCount=mysqli_query($con,$IndividualCount) or die(mysqli_error($con));
                                            $FetchIndividualCount=mysqli_fetch_array($ExeIndividualCount);
                                          
                                        ?>
                                        <div class="text-amount"><?php echo $FetchIndividualCount['individualcount'];?></div>
                                        <div class="text-stats text-success"><i class="material-icons"></i></div>
                                    </div>
                                    <div><i class="material-icons icon-muted icon-40pt ml-3"></i></div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 card-group-row__col">
                                <div class="card card-group-row__card card-body card-body-x-lg flex-row align-items-center">
                                    <div class="flex">
                                        <div class="card-header__title text-muted mb-2">Team Board</div>
                                        <?php
                                            $TeamCount="SELECT count(*) as teamtaskcount from tblteammember where Bid NOT IN (0) AND IsActive=1 AND Tid NOT IN (1) AND Uid='".$_SESSION['UserID']."' ";
                                            $ExeTeamCount=mysqli_query($con,$TeamCount) or die(mysqli_error($con));
                                            $FetchTeamCount=mysqli_fetch_array($ExeTeamCount);
                                          
                                        ?>
                                        <div class="text-amount"><?php echo $FetchTeamCount['teamtaskcount'];?></div>
                                        <div class="text-stats text-success"><i class="material-icons"></i></div>
                                    </div>
                                    <div><i class="material-icons icon-muted icon-40pt ml-3"></i></div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-12 card-group-row__col">
                                <div class="card card-group-row__card card-body card-body-x-lg flex-row align-items-center">
                                    <div class="flex">
                                        <div class="card-header__title text-muted mb-2">Completed Board</div>
                                        <?php
                                            $CompleteCount="Select count(*) as completecount from tblboard where Uid='".$_SESSION['UserID']."' AND IsActive=0";
                                            $ExeCompleteCount=mysqli_query($con,$CompleteCount) or die(mysqli_error($con));
                                            $FetchCompleteCount=mysqli_fetch_array($ExeCompleteCount);
                                          
                                        ?>
                                        <div class="text-amount"><?php echo $FetchCompleteCount['completecount'];?></div>
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
                                            <input class="d-none" type="hidden" value="13/03/2018 to 20/03/2018" data-input>
                                        </div>
                                    </div>

                                    <div class="card-header card-header-tabs-basic nav" role="tablist">
                                        <a href="#activity_all" class="active" data-toggle="tab" role="tab" aria-controls="activity_all" aria-selected="true">Board Visited</a>   
                                    </div>

                                <?php
                                    $today=date("Y-m-d");
                                    $select_activity="SELECT * from tblrecent where Uid=$recentuser ORDER BY Date DESC LIMIT 5";
                                    $Exe_activity=mysqli_query($con,$select_activity)or die(mysqli_error($con));
                                    if($Exe_activity->num_rows!=0)
                                    {  
                                        while($row_activity=$Exe_activity->fetch_array())
                                        {
                                            $rbid=$row_activity['Bid'];
                                            $rtid=$row_activity['Tid'];
                                            $rdate=$row_activity['Date'];

                                            $select="SELECT Btitle,Background,Tname from tblboard,tblteam where tblboard.Bid=$rbid AND tblboard.Tid=tblteam.Tid";
                                            $Exe_sel=mysqli_query($con,$select)or die(mysqli_error($con));
                                            if($Exe_sel->num_rows!=0)
                                            { 
                                                $row_sel=$Exe_sel->fetch_array();
                                                $bname=$row_sel['Btitle'];
                                                $btname=$row_sel['Tname'];
                                                $bback=$row_sel['Background'];
                                                
                                                $diff = abs(strtotime($today) - strtotime($rdate));
                                                $years = floor($diff / (365*60*60*24));
                                                $months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
                                                $days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));

                                                if($bback=="" || !file_exists("$bback"))
                                                {
                                                    $bback="images/backgrounddefault.jpg";
                                                }  
                                ?>

                                            <div class="list-group tab-content list-group-flush">

                                                <div class="tab-pane active show fade">
                                                    <div class="list-group-item list-group-item-action d-flex align-items-center">
                                                                <div class="avatar avatar-xs mr-3">
                                                                    <span class="avatar-title rounded-circle  bg-teal">
                                                                        <img src="<?php echo $bback;?>" alt="Avatar" class="avatar-img rounded-circle">
                                                                    </span>
                                                                </div>
                                                                <div class="flex">
                                                                    <div class="d-flex align-items-middle">
                                                                        <strong class="text-15pt mr-1"><?php echo $bname; ?></strong>
                                                                    </div>
                                                                </div>
                                                                <div class="flex">
                                                                    <center>
                                                                        <small class="text-muted"><?php echo $btname;?></small>
                                                                    </center>
                                                                </div>
                                                                <div class="flex">
                                                                    <?php
                                                                        if ($days==0) 
                                                                        {
                                                                    ?>
                                                                            <center><small>Today</small></center>
                                                                    <?php      
                                                                        }
                                                                        else if ($days==1) 
                                                                        {
                                                                    ?>
                                                                            <center>
                                                                                <small><?php echo $days;?> day ago</small>
                                                                            </center>
                                                                    <?php
                                                                        }
                                                                        else
                                                                        {
                                                                    ?>
                                                                            <center>
                                                                                <small><?php echo $days;?> days ago</small>
                                                                            </center>
                                                                    <?php
                                                                        }
                                                                    ?>
                                                                </div>
                                                                
                                                    </div>
                                                </div>

                                            </div>
                                <?php
                                            }
                                        }
                                    }
                                    else
                                    {
                                ?>
                                            <div class="list-group tab-content list-group-flush">
                                                <div class="tab-pane active show fade">
                                                    <div class="list-group-item list-group-item-action d-flex align-items-center">
                                                        <div class="flex">
                                                            <center>
                                                                <strong class="text-15pt mr-1">No Recent Activities Yet..</strong>
                                                            </center>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                <?php
                                    }
                                ?>

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