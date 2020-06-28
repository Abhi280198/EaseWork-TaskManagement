<?php 
    include_once("DbConnection.php");
    $Uid=$_GET['Uid'];

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    
    <title>EaseWork- Individual Board</title>
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
                                        <li class="breadcrumb-item"><a href="index.php?Uid=<?php echo $_SESSION['UserID'];?>"><i class="material-icons icon-20pt">home</i></a></li>
                                        <li class="breadcrumb-item"><a href="#">Boards</a></li>
                                        <li class="breadcrumb-item" aria-current="page"><a href="individual_board.php?Uid=<?php echo $_SESSION['UserID'];?>">Individual</a></li>
                                    </ol>
                                </nav>
                                <h1 class="m-0">Individual</h1>
                            </div>
                            <a href="Template_dashboard.php?Uid=<?php echo $_SESSION['UserID'];?>" class="btn btn-success ml-3">Explore Templates</a>
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
                                        <h5><a href="board.php" class="headings-color">Romantic Vacations</a></h5>
                                        <small class="text-dark-gray">created last week</small>
                                    </div>
                                </div>
                            </div>

                            <div class="card stories-card">
                                <div class="stories-card__content d-flex align-items-center flex-wrap">
                                    <div class="avatar avatar-lg mr-3">
                                        <a href="#"><img src="assets/images/stories/256_rsz_clem-onojeghuo-193397-unsplash.jpg" alt="avatar" class="avatar-img rounded"></a>
                                    </div>
                                    <div >
                                        <h5><a href="#" class="headings-color">Home Decoration</a></h5>
                                        <small class="text-dark-gray">created 2 days ago </small>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                        <!--End Recent Activity section-->

                        <br>

                        <!--Start Boards section-->
                        <div class="my-3"><strong class="text-dark-gray">Boards</strong>
                        </div>
                        <div class="row">

                            <?php       
                                $query = "SELECT * FROM tblboard Where Tid=1 AND Uid=$Uid AND IsActive=1 ";  
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

                                        if ($tempid==2) 
                                        {
                                                                             
                            ?>  
                                            <div class="col-sm-6 col-md-4">
                                                <div class="card stories-card-popular">
                                                    <img src="<?php echo $background; ?>" alt="" class="card-img">
                                                    <div class="stories-card-popular__content">
                                                        <div class="stories-card-popular__title card-body">
                                                            <h4 class="card-title m-0">
                                                                <a href="Personal_template.php?Bid=<?php echo $bid; ?>"><?php echo $btitle; ?></a>
                                                            </h4>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                            <?php 
                                        }
                                        else if ($tempid==1) 
                                        {
                            ?>
                                            <div class="col-sm-6 col-md-4">
                                                <div class="card stories-card-popular">
                                                    <img src="<?php echo $background; ?>" alt="" class="card-img">
                                                    <div class="stories-card-popular__content">
                                                        <div class="stories-card-popular__title card-body">
                                                            <h4 class="card-title m-0">
                                                                <a href="Education_template.php?Bid=<?php echo $bid; ?>"><?php echo $btitle; ?></a>
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
                                                                <a href="board.php?Bid=<?php echo $bid; ?>"><?php echo $btitle; ?></a>
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
                                    No Individual Boards available.
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