<?php 
    include_once("DbConnection.php");
    $Uid=$_GET['Uid'];

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
                                        <li class="breadcrumb-item"><a href="#">Boards</a></li>
                                        <li class="breadcrumb-item" aria-current="page">

                                            <a href="TeamPage.php?Uid=<?php echo $_SESSION['UserID'];?>">Teams</a>
                                        </li>
                                    </ol>
                                </nav>
                                <h1 class="m-0">Teams</h1>
                            </div>
                        </div>
                    </div>
                    <!--End Bold header section-->

                    <!--Start Board section-->
                    <div class="container-fluid page__container">

                        <br>

                        <!--Start Boards section-->
                        <div class="my-3"><strong class="text-dark-gray">Teams</strong>
                        </div>
                        <div class="row">
                            <?php       
                                $teamselectquery = "SELECT * FROM tblteam Where IsActive=1 AND Tid NOT IN (1) AND Tid IN (SELECT Tid FROM tblteammember WHERE Uid=$Uid)";
                                $result_team = mysqli_query($con,$teamselectquery);
                                if($result_team->num_rows!=0)
                                {  
                                    while($row_team=$result_team->fetch_array())  
                                    {
                                        $tid=$row_team['Tid'];
                                        $title=$row_team['Tname'];  
                                        $profile=$row_team['ProfilePic'];
                                        $isactive=$row_team['IsActive']; 

                                        if($profile=="" || !file_exists("images/teamprofile/$profile"))
                                        {
                                            $profile="teampro1.jpg";
                                        }                   
                            ?>

                                <div class="col-sm-6 col-md-4">
                                    <div class="card stories-card-popular">
                                        <img src="images/teamprofile/<?php echo $profile; ?>" alt="" class="card-img">
                                        <div class="stories-card-popular__content">
                                            <div class="stories-card-popular__title card-body">
                                                <h4 class="card-title m-0">
                                                    <a href="Team_boards.php?Tid=<?php echo $tid; ?>">
                                                        <?php echo $title; ?>
                                                    </a>
                                                </h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php 
                                    }
                                }else{
                            ?>
                                    <h4 class="card-title m-0">
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        No Teams available.
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
                <?php include_once('sidebar1.php');?>
                <!--End sidebar section-->

            </div>
        </div>

    </div>

    <?php include_once('scriptlinks.php');?>

</body>


<!-- Mirrored from demo.frontted.com/stackadmin/133/stories.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 28 May 2020 07:53:53 GMT -->
</html>