<?php
    include_once("DbConnection.php");
    $Updatenot = "UPDATE tblnotification set IsRead=0 WHERE NotificationEmail='".$_SESSION['Emailid']."' ";
    $Exe_updatenot=mysqli_query($con,$Updatenot)or die(mysqli_error($con));
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <title>EaseWork- Notifications</title>
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
                                        <li class="breadcrumb-item"><a href="#"><i class="material-icons icon-20pt">home</i></a></li>
                                        <li class="breadcrumb-item">DASHBOARD</li>
                                        <li class="breadcrumb-item active" aria-current="page">Notification</li>
                                    </ol>
                                </nav>
                                <h1 class="m-0">Notifications</h1>
                            </div>
                        </div>
                    </div>


                    <div class="container-fluid page__container">
                    
                    <?php

                                    $user=$_SESSION['Emailid'];
                                    $select_notification="SELECT * from tblnotification WHERE NotificationEmail='$user' ORDER BY Date DESC,Time ASC";
                                    $result_notification=mysqli_query($con,$select_notification) or die(mysqli_error($con));
                                    if($result_notification->num_rows!=0)
                                    {
                                        while($fetch_notification=mysqli_fetch_array($result_notification))
                                        {
                                            $not_bid=$fetch_notification['Bid'];
                                            $not_tid=$fetch_notification['Tid'];
                                            $notificationtime=$fetch_notification['Time'];
                                            $notificationdate=$fetch_notification['Date'];

                                            $select_boardTeam="SELECT * from tblboard,tblteam WHERE tblboard.Bid=$not_bid AND tblboard.Tid=tblteam.Tid";
                                            $boardTeam_notification=mysqli_query($con,$select_boardTeam) or die(mysqli_error($con));
                                            if($boardTeam_notification->num_rows>0)
                                            {
                                                while($fetch_boardTeam=$boardTeam_notification->fetch_array())  
                                                {
                                                    $boardname=$fetch_boardTeam['Btitle'];
                                                    $teamname=$fetch_boardTeam['Tname'];

                    ?>



                        <div class="row align-items-center projects-item mb-1">
                            <div class="col-sm-auto mb-1 mb-sm-0">
                                <div class="text-dark-gray"><?php echo $notificationdate; ?></div>
                            </div>
                            <div class="col-sm">
                                <div class="card m-0">
                                    <div class="px-4 py-3">
                                        <div class="row align-items-center">
                                            <div class="col" style="min-width: 300px">
                                                <div class="d-flex align-items-center">
                                                    <strong class="text-15pt mr-2">You are added on a new Team.</strong>
                                                </div>
                                                <div class="d-flex align-items-center">
                                                    <small class="text-dark-gray mr-2">Added on- <?php echo $notificationtime; ?></small>
                                                </div>
                                            </div>
                                            <div class="col-auto d-flex align-items-center">
                                                <!-- <i class="material-icons icon-muted icon-20pt mr-2">account_circle</i> -->
                                                <a href="board.php?Bid=<?php echo $not_bid;?>" class="text-body"><?php echo $boardname; ?></a>
                                            </div>
                                            <div class="col-auto d-flex align-items-center" style="min-width: 140px;">
                                                <a href="Team_boards.php?Tid=<?php echo $not_tid;?>" class="text-dark-gray"><?php echo $teamname; ?></a>
                                                <!-- <i class="material-icons icon-muted icon-20pt ml-2">folder</i> -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                     <?php
                                                }
                                            }
                                        }

                                    }
                                ?>

                    </div>


                </div>
                <!-- // END drawer-layout__content -->

                <!--Start sidebar section-->
                <?php include_once('sidebar1.php');?>
                <!--End sidebar section-->
            </div>
            <!-- // END drawer-layout -->

        </div>
        <!-- // END header-layout__content -->

    </div>
    <!-- // END header-layout -->

    <?php include_once('scriptlinks.php');?>

</body>


<!-- Mirrored from demo.frontted.com/stackadmin/133/app-projects.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 28 May 2020 07:53:35 GMT -->
</html>