<?php 
    include_once("DbConnection.php");
    $Tid=$_GET['Tid'];
    $Uid=$_GET['Uid'];
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <title>Member Detail</title>
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
                                        <li class="breadcrumb-item active" aria-current="page">Team Members</li>
                                    </ol>
                                </nav>
                                <h1 class="m-0">Member details</h1>
                            </div>
                        </div>
                    </div>

                    <div class="container-fluid page__container">

                        <div class="card">
                            <div class="card-header card-header-large bg-white">
                                <center>
                                <?php
                                    $select_user="SELECT * from tbluser where Uid=$Uid";
                                    $result_user=mysqli_query($con,$select_user) or die(mysqli_error($con));

                                    $row_userdetail=mysqli_fetch_array($result_user);

                                    $ufirstname=$row_userdetail['Fname'];
                                    $ulastname=$row_userdetail['Lname'];
                                    $uemailid=$row_userdetail['Email'];
                                ?>

                                    <h4 class="card-header__title"><?php echo $ufirstname." ".$ulastname;?> (<?php echo $uemailid;?>)</h4>
                                </center>
                            </div>
                        </div>

                        <div class="card">
                            <div class="table-responsive border-bottom" data-toggle="lists" data-lists-values='["js-lists-values-employee-name"]'>

                                <table class="table mb-0 thead-border-top-0">
                                    <thead>
                                        <tr>
                                            <th style="width: 20px; ">No.</th>
                                            <th style="width: 250px;">Board Name</th>
                                            <th style="width: 120px;"><center>Allocated Tasks</center></th>
                                            <th style="width: 37px;"><center>Member/Admin</center></th>
                                            <th style="width: 120px;"><center>Added on</center></th>
                                            <th style="width: 51px;"><center>Remove/Leave</center></th>
                                        </tr>
                                    </thead>
                                    <tbody class="list" id="staff">

                                    <?php
                                        $select_detailboard="SELECT *from tblboard where Bid IN (SELECT Bid from tblteammember WHERE Uid=$Uid)";
                                        $result_detailboard=mysqli_query($con,$select_detailboard) or die(mysqli_error($con));
                                        if($result_detailboard->num_rows!=0)
                                        {  
                                            $i=1;
                                            while($row_detailboard=$result_detailboard->fetch_array())  
                                            {
                                                $bid=$row_detailboard['Bid'];
                                                $btitle=$row_detailboard['Btitle'];
                                                $buid=$row_detailboard['Uid'];
                                    ?>
                                                <tr>
                                                    <td>
                                                        <div class="media align-items-center">
                                                            <span class="js-lists-values-employee-name"><?php echo $i++; ?></span>
                                                        </div>
                                                    </td>

                                                    <td>
                                                        <div class="media align-items-center">
                                                            <a href="Team_boards.php?Tid=<?php echo $Tid;?>"><?php echo $btitle; ?></a>
                                                        </div>
                                                    </td>

                                                    <td><center>
                                                    <?php
                                                        $select_cardcount = "SELECT COUNT(Mcardid) as countcardid from tblmembercard where Uid=$Uid AND Cardid IN (SELECT Cardid from tblcard where Bid=$bid)";
                                                        $result_cardcount=mysqli_query($con,$select_cardcount) or die(mysqli_error($con));
                                                        if($result_cardcount->num_rows!=0)
                                                        {  
                                                            while($row_cardcount=$result_cardcount->fetch_array())
                                                            {
                                                                $countc=$row_cardcount['countcardid'];

                                                                echo $countc;
                                                            }
                                                        }
                                                    ?>
                                                    </center></td>

                                                    <td><center>
                                                        <?php
                                                            if($Uid==$buid)
                                                            {
                                                        ?>
                                                                <span class="badge badge-danger">ADMIN</span>
                                                        <?php
                                                            }else
                                                            {
                                                        ?>
                                                                <span class="badge badge-success">MEMBER</span>
                                                        <?php
                                                            }
                                                        ?>
                                                    </center></td>

                                                    <td><center>
                                                        <?php
                                                            $select_memberdate = "SELECT * from tblteammember where Bid=$bid AND Uid=$Uid";
                                                            $result_memberdate=mysqli_query($con,$select_memberdate) or die(mysqli_error($con));
                                                            if($result_memberdate->num_rows!=0)
                                                            {  
                                                                while($row_memberdate=$result_memberdate->fetch_array())
                                                                { 
                                                                    $tmdate=$row_memberdate['Date'];
                                                        ?>
                                                                <small class="text-muted"><?php echo $tmdate;?></small>
                                                        <?php
                                                                }
                                                            }
                                                        ?>
                                                    </center></td>

                                                    <td><center>
                                                        <?php
                                                            if($Uid==$buid)
                                                            {
                                                        ?>
                                                                <a href="team_member_delete.php?Bid=<?php echo $bid;?>&Uid=<?php echo $Uid?>&Tid=<?php echo $Tid;?>">Leave</center></a></td>
                                                        <?php
                                                            }else
                                                            {
                                                        ?>
                                                                <a href="team_member_delete.php?Bid=<?php echo $bid;?>&Uid=<?php echo $Uid?>&Tid=<?php echo $Tid;?>">Remove</center></a></td>
                                                        <?php
                                                            }
                                                        ?>

                                                </tr>
                                    <?php 
                                            }
                                        }
                                    ?>

                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>



                </div>
                <!-- // END drawer-layout__content -->

                <!--Start sidebar section-->
                <?php include_once('sidebar_team.php');?>
                <!--End sidebar section-->

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