
<?php 
    include_once("DbConnection.php");
    $Uid=$_GET['Uid'];
    $Tid=$_GET['Tid'];

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    
    <title>EaseWork- Completed Boards</title>
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
                                        <li class="breadcrumb-item active" aria-current="page">Completed</li>
                                    </ol>
                                </nav>
                                <h1 class="m-0">Completed Boards</h1>
                            </div>
                        </div>
                    </div>
                    <!--End Bold header section-->

                    <!--Start Individual section-->
                    <div class="container-fluid page__container">

                        <!--Start Individual section-->
                        <div class="my-3"><strong class="text-dark-gray">Individual</strong>
                        </div>
                        <div class="row">

                            <?php       
                                $query = "SELECT * FROM tblboard Where Tid=1 AND Uid=$Uid AND IsActive=0 ";  
                                $res = mysqli_query($con,$query);
                                if($res->num_rows!=0)
                                {  
                                    while($row=$res->fetch_array())  
                                    {
                                        $bid=$row['Bid'];
                                        $btitle=$row['Btitle'];  
                                        $background=$row['Background'];
                                        $isactive=$row['IsActive']; 

                                        if($background=="" || !file_exists("$background"))
                                        {
                                            $background="images/backgrounddefault.jpg";
                                        }                   
                            ?>

                                <div class="col-sm-6 col-md-4">
                                    <div class="card stories-card-popular">
                                        <img src="<?php echo $background; ?>" alt="" class="card-img">
                                        <div class="stories-card-popular__content">
                                            <div class="stories-card-popular__title card-body">
                                                <h4 class="card-title m-0"><a href="board.php?Bid=<?php echo $bid; ?>"><?php echo $btitle; ?></a></h4>
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
                                    No Individual Completed Boards available. <!-- <a href="#" onclick="openForm()">Create Board.</a> -->
                                </h4>
                            <?php
                                }
                            ?>
                                
                        </div>
                        <!--End Individual section-->

                    </div>
                    <!--End Individual section-->

                     <!--Start Teams section-->
                    <div class="container-fluid page__container">

                        <!--Start Teams section-->
                        <div class="my-3"><strong class="text-dark-gray">Teams</strong>
                        </div>
                        <div class="row">

                            <?php     
                                $uid = $_SESSION['UserID'];  
                                $qry = "SELECT * FROM tblboard Where Tid=$Tid AND Uid=$uid";  
                                $rslt = mysqli_query($con,$qry);
                                if($rslt->num_rows!=0)
                                {  
                                    while($row=$rslt->fetch_array())  
                                    {
                                        $bid=$row['Bid'];
                                        $btitle=$row['Btitle'];  
                                        $background=$row['Background'];
                                        $isactive=$row['IsActive']; 

                                        if($background=="" || !file_exists("$background"))
                                        {
                                            $background="images/backgrounddefault.jpg";
                                        }                   
                            ?>

                                <div class="col-sm-6 col-md-4">
                                    <div class="card stories-card-popular">
                                        <img src="<?php echo $background; ?>" alt="" class="card-img">
                                        <div class="stories-card-popular__content">
                                            <div class="stories-card-popular__title card-body">
                                                <h4 class="card-title m-0"><a href="board.php?Bid=<?php echo $bid; ?>">
                                                        <?php echo $btitle; ?>
                                                    </a>
                                                <small class="card-title m-0" style="color: white;">Team Name1</small>
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
                                        No Completed Team Boards available for this team. <!-- <a href="#" onclick="openForm()">Create Board.</a> -->
                                    </h4>
                            <?php
                                }
                            ?>
                        </div>
                        <!--End Teams section-->

                    </div>
                    <!--End Teams section-->

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