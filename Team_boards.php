<?php 
    include_once("DbConnection.php");
    $Tid=$_GET['Tid'];

    /*Start database delete board button(SHOW MENU)*/
    if (isset($_REQUEST['deleteteamYes'])) 
    {
        $delete_team = "DELETE FROM tblteam WHERE Tid=$Tid";
        $Exe_delete_team=mysqli_query($con,$delete_team)or die(mysqli_error($con));
        $delete_teamboard = "DELETE FROM tblboard WHERE Tid=$Tid";
        $Exe_delete_teamboard=mysqli_query($con,$delete_teamboard)or die(mysqli_error($con));
        $delete_teammember = "DELETE FROM tblteammember WHERE Tid=$Tid";
        $Exe_delete_teammember=mysqli_query($con,$delete_teammember)or die(mysqli_error($con));
        header("location:index.php");
    } 
    /*End database delete board button(SHOW MENU)*/
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    
    <title>EaseWork- Team Boards</title>
    <?php include_once('csslinks.php');?>

    <!-- start delete team popup -->
    <div id="deleteteam" class="modal">
        <div class="modal-content" style="width: 50%; height: 250px;">
            <form method="POST" enctype="multipart/form-data" action="" class="form-container">
                <div>
                    <h3><strong>Are you sure ?</strong></h3>
                </div><br><br>
                <center><div class="canclebtn">
                    <button type="submit" name="deleteteamYes" class="btn cancel">Yes</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <button type="button" class="btn cancel" onclick="deleteteamclose()" >No</button>
                </div></center>
            </form>
        </div>
    </div>
    <!-- End show delete team popup -->

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
                                            <a href="Team_boards.php?Tid=<?php echo $Tid;?>">Boards</a>
                                        </li>
                                    </ol>
                                </nav>
                                <h1 class="m-0">Boards</h1>
                            </div>
                            <a href="Template_dashboard.php?Uid=<?php echo $_SESSION['UserID'];?>" class="btn btn-success ml-3">Explore Templates</a>
                            <button type="button" name="teamdelete"  onclick="deleteteamopen()" class="btn btn-danger ml-3" style="width:15%;">Delete Team</a>

                            <!-- Start card details popup fuction-->
                            <script>
                                function deleteteamopen() {
                                    document.getElementById("deleteteam").style.display = "flex";
                                }
                                function deleteteamclose() {
                                    document.getElementById("deleteteam").style.display = "none";
                                }
                            </script>
                            <!-- End card details popup fuction-->
                        </div>
                    </div>
                    <!--End Bold header section-->

                    <!--Start Board and Description section-->
                    <div class="container-fluid page__container">

                        <!--Start Team description section-->
                        <div class="mb-3"><strong class="text-dark-gray">Team Descrpition</strong></div>
                        <div class="stories-cards mb-4">
                            <?php

                                $teamdescription_query="select * from tblteam where Tid=$Tid";
                                $Execute_teamdescription=mysqli_query($con,$teamdescription_query) or die(mysqli_error($con));
                                $fetch_teamdescription=mysqli_fetch_array($Execute_teamdescription);
                                $description=$fetch_teamdescription['TeamDescription'];
                                $tid=$fetch_teamdescription['Tid'];
                            ?>

                            <p><?php echo $description; ?></p>
                        </div>
                        <!--End Team description section-->

                        <br>

                        <!--Start Boards section-->
                        <div class="my-3"><strong class="text-dark-gray">Boards</strong>
                        </div>
                        <div class="row">
                            <?php     
                                $uid = $_SESSION['UserID'];  
                                $query = "SELECT * FROM tblboard Where Tid=$Tid AND IsActive=1";  
                                $result = mysqli_query($con,$query);
                                if($result->num_rows!=0)
                                {  
                                    while($row=$result->fetch_array())  
                                    {
                                        $bid=$row['Bid'];
                                        $btitle=$row['Btitle'];  
                                        $background=$row['Background'];
                                        $isactive=$row['IsActive'];
                                        $tempid=$row['Tempid']; 

                                        if($background=="" || !file_exists("$background"))
                                        {
                                            $background="images/backgrounddefault.jpg";
                                        }   
                                        if ($tempid==1) 
                                        {                
                            ?>

                                            <div class="col-sm-6 col-md-4">
                                                <div class="card stories-card-popular">
                                                    <img src="<?php echo $background; ?>" alt="" class="card-img">
                                                    <div class="stories-card-popular__content">
                                                        <div class="stories-card-popular__title card-body">
                                                            <h4 class="card-title m-0">
                                                                <a href="Education_template.php?Bid=<?php echo $bid; ?>">
                                                                    <?php echo $btitle; ?>
                                                                </a>
                                                            </h4>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                            <?php 
                                        }
                                        else if ($tempid==2) 
                                        {
                            ?>
                                            <div class="col-sm-6 col-md-4">
                                                <div class="card stories-card-popular">
                                                    <img src="<?php echo $background; ?>" alt="" class="card-img">
                                                    <div class="stories-card-popular__content">
                                                        <div class="stories-card-popular__title card-body">
                                                            <h4 class="card-title m-0">
                                                                <a href="Personal_template.php?Bid=<?php echo $bid; ?>">
                                                                    <?php echo $btitle; ?>
                                                                </a>
                                                            </h4>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                            <?php                
                                        }
                                        else{
                            ?>
                                            <div class="col-sm-6 col-md-4">
                                                <div class="card stories-card-popular">
                                                    <img src="<?php echo $background; ?>" alt="" class="card-img">
                                                    <div class="stories-card-popular__content">
                                                        <div class="stories-card-popular__title card-body">
                                                            <h4 class="card-title m-0">
                                                                <a href="board.php?Bid=<?php echo $bid; ?>">
                                                                    <?php echo $btitle; ?>
                                                                </a>
                                                            </h4>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                            <?php 
                                        }
                                    }
                                }else{
                            ?>
                                    <h4 class="card-title m-0">
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        No Boards available for this team.
                                    </h4>
                            <?php
                                }
                            ?>
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