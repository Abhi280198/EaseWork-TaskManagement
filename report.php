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
                                                $srno=1;
                                                while($fetch_user=$res->fetch_array()) 
                                                {
                                                    $fetch_uid=$fetch_user['Uid'];
                                                    /*while($fetch_user=mysqli_fetch_array($Execute_select_Data)>0) */
                                                    /*while($row=$res->fetch_array())  */
                                                    $cardData1="SELECT count(Bid) AS 'cnt1' FROM tblcard c,tblmembercard mc 
                                                    WHERE c.Bid=$bid AND c.Cardid=mc.Cardid AND mc.Uid=$fetch_uid";
                                                    $card_Data1=mysqli_query($con,$cardData1);
                                                    $fetch_cnt1=$card_Data1->fetch_array();

                                                    $select_data="SELECT * from tblboard WHERE Bid=$bid";
                                                    $board_data=mysqli_query($con,$select_data);  
                                                    $fetch_row=$board_data->fetch_array();
                                                    if($fetch_row['Tempid']==null)
                                                    {
                                                        $cardData2="SELECT count(Bid) AS 'cnt2' FROM tblcard c,tblmembercard mc 
                                                        WHERE c.Bid=$bid AND c.Cardid=mc.Cardid AND mc.Uid=$fetch_uid AND Listid=3";
                                                    }
                                                    elseif($fetch_row['Tempid']==1) 
                                                    {
                                                        $cardData2="SELECT count(Bid) AS 'cnt2' FROM tblcard c,tblmembercard mc 
                                                        WHERE c.Bid=$bid AND c.Cardid=mc.Cardid AND mc.Uid=$fetch_uid AND Listid=6";
                                                    }
                                                    elseif($fetch_row['Tempid']==2) 
                                                    {
                                                        $cardData2="SELECT count(Bid) AS 'cnt2' FROM tblcard c,tblmembercard mc 
                                                        WHERE c.Bid=$bid AND c.Cardid=mc.Cardid AND mc.Uid=$fetch_uid AND Listid=11";
                                                    }

                                                    $card_Data2=mysqli_query($con,$cardData2);
                                                    $fetch_cnt2=$card_Data2->fetch_array();             

                                                    $total=$fetch_cnt1['cnt1'];  
                                                    $completed=$fetch_cnt2['cnt2'];
                                                    $per=0;
                                                    
                                                    if($total==0)
                                                    {
                                                        $per=0;
                                                    }
                                                    else
                                                    {
                                                        $per=$completed*100/$total;
                                                    }

                                                    ?>
                                                        <tr class="selected">
                                                            <td><?php echo $srno?></td>
                                                            <td>
                                                                <div class="media align-items-center">
                                                                    <div class="avatar avatar-xs mr-2">
                                                                    <?php
                                                                     $pro=$fetch_user['ProfilePic'];
                                                                        if($pro=="" || !file_exists("images/profile/$pro"))
                                                                        {
                                                                            $pro="No.png";
                                                                        }  
                                                                    ?>
                                                                        <img src="images/profile/<?php echo $pro; ?>" alt="Avatar" class= "avatar-img rounded-circle">
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
                                                                    <div class="progress-bar" role="progressbar" style="width: 
                                                                    <?php 
                                                                    if($per==0)
                                                                    {
                                                                        echo 0;
                                                                    }
                                                                    elseif($per>0)
                                                                    {
                                                                        echo $per;
                                                                    } 
                                                                    ?>%;" aria-valuenow="61" aria-valuemin="0" aria-valuemax="100"></div>
                                                                </div>
                                                            </td>
                                                            <td>
                                                            <?php 
                                                            if($per==0)
                                                            {
                                                                echo 0;
                                                            }
                                                            elseif($per>0)
                                                            {
                                                                echo $per;
                                                            } 
                                                            ?>
                                                            </td>
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


                        
                        <!-- start piechart -->
                        <?php
                            $bid=$_GET['Bid'];
                            $select_data="SELECT * from tblboard WHERE Bid=$bid";
                            $board_data=mysqli_query($con,$select_data);  
                            $fetch_row=$board_data->fetch_array();

                            if($fetch_row['Tempid']==NULL)
                            {
                                ?>
                                    <center><div id="piechart"></div></center>
                                    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                                    <script type="text/javascript">
                                        // Load google charts
                                        google.charts.load('current', {'packages':['corechart']});
                                        google.charts.setOnLoadCallback(drawChart);

                                        // Draw the chart and set the chart values
                                        function drawChart() 
                                        {

                                          var data = google.visualization.arrayToDataTable([
                                            <?php
                                                $bid=$_GET['Bid'];
                                                $card_data="SELECT COUNT(Listid) AS count,Listid from tblcard where Bid=$bid GROUP BY Listid";
                                                $res=mysqli_query($con,$card_data);  
                                                $GLOBALS['$todo']=0;
                                                $GLOBALS['$doing']=0;
                                                $GLOBALS['$done']=0;
                                                
                                                while($fetch_row=$res->fetch_array()) 
                                                {
                                                    if($fetch_row['Listid']==1)
                                                    {
                                                        $GLOBALS['$todo'] = $fetch_row['count'];
                                                    }
                                                    if($fetch_row['Listid']==2)
                                                    {
                                                        $GLOBALS['$doing'] = $fetch_row['count'];
                                                    }
                                                    if($fetch_row['Listid']==3)
                                                    {
                                                        $GLOBALS['$done'] = $fetch_row['count'];
                                                    }
                                                }
                                            ?>
                                                    ['Task', 'Hours per Day'],
                                                    ['Todo',<?php echo $GLOBALS['$todo']; ?>],
                                                    ['Doing',<?php echo $GLOBALS['$doing']; ?>],
                                                    ['Done', <?php echo $GLOBALS['$done']; ?>]

                                            ]);

                                          // Optional; add a title and set the width and height of the chart
                                          var options = {'title':'Number of cards allocated to each list', 'width':980, 'height':400};

                                          // Display the chart inside the <div> element with id="piechart"
                                          var chart = new google.visualization.PieChart(document.getElementById('piechart'));
                                          chart.draw(data, options);
                                        }
                                    </script>
                                <?php
                            }
                            elseif($fetch_row['Tempid']==1)
                            {
                                ?>
                                    <center><div id="piechart"></div></center>
                                    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                                    <script type="text/javascript">
                                        // Load google charts
                                        google.charts.load('current', {'packages':['corechart']});
                                        google.charts.setOnLoadCallback(drawChart);

                                        // Draw the chart and set the chart values
                                        function drawChart() 
                                        {

                                          var data = google.visualization.arrayToDataTable([
                                            <?php
                                                $bid=$_GET['Bid'];
                                                $card_data="SELECT COUNT(Listid) AS count,Listid from tblcard where Bid=$bid GROUP BY Listid";
                                                $res=mysqli_query($con,$card_data);  

                                                $GLOBALS['$srem']=0;
                                                $GLOBALS['$stoday']=0;
                                                $GLOBALS['$scovered']=0;
                                                $GLOBALS['$ass']=0;

                                                while($fetch_row=$res->fetch_array()) 
                                                {
                                                    if($fetch_row['Listid']==4)
                                                    {
                                                        $GLOBALS['$srem'] = $fetch_row['count'];
                                                    }
                                                    if($fetch_row['Listid']==5)
                                                    {
                                                        $GLOBALS['$stoday'] = $fetch_row['count'];
                                                    }
                                                    if($fetch_row['Listid']==6)
                                                    {
                                                        $GLOBALS['$scovered'] = $fetch_row['count'];
                                                    }
                                                    if($fetch_row['Listid']==7)
                                                    {
                                                        $GLOBALS['$ass'] = $fetch_row['count'];
                                                    }
                                                }
                                            ?>  
                                                    ['Task', 'Hours per Day'],
                                                    ['Syllabus Remaining',<?php echo $GLOBALS['$srem']; ?>],
                                                    ['Doing',<?php echo $GLOBALS['$stoday']; ?>],
                                                    ['Done', <?php echo $GLOBALS['$scovered']; ?>],
                                                    ['Done', <?php echo $GLOBALS['$ass']; ?>]
                                                
                                            ]);
                                          <?php
                                            if($GLOBALS['$srem']==0 && $GLOBALS['$stoday']==0 && 
                                            $GLOBALS['$scovered']==0 && $GLOBALS['$ass']==0)
                                            {
                                            ?>
                                                var options = {'title':'Error', 'width':980, 'height':400};      
                                            <?php            
                                            }
                                            else
                                            {
                                            ?>
                                                // Optional; add a title and set the width and height of the chart
                                            var options = {'title':'Number of cards allocated to each list', 'width':980, 'height':400};
                                            <?php
                                            }
                                            ?>

                                          // Display the chart inside the <div> element with id="piechart"
                                          var chart = new google.visualization.PieChart(document.getElementById('piechart'));
                                          chart.draw(data, options);
                                        }
                                    </script>
                                <?php
                            }
                            elseif($fetch_row['Tempid']==2)
                            {
                                ?>
                                    <center><div id="piechart"></div></center>
                                    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                                    <script type="text/javascript">
                                        // Load google charts
                                        google.charts.load('current', {'packages':['corechart']});
                                        google.charts.setOnLoadCallback(drawChart);

                                        // Draw the chart and set the chart values
                                        function drawChart() 
                                        {

                                          var data = google.visualization.arrayToDataTable([
                                            <?php
                                                $bid=$_GET['Bid'];
                                                $card_data="SELECT COUNT(Listid) AS count,Listid from tblcard where Bid=$bid GROUP BY Listid";
                                                $res=mysqli_query($con,$card_data);  
                                                
                                                $GLOBALS['$btrip']=0;
                                                $GLOBALS['$atvac']=0;
                                                $GLOBALS['$eat']=0;
                                                $GLOBALS['$donevac']=0;

                                                while($fetch_row=$res->fetch_array()) 
                                                {
                                                    if($fetch_row['Listid']==8)
                                                    {
                                                        $GLOBALS['$btrip'] = $fetch_row['count'];
                                                    }
                                                    if($fetch_row['Listid']==9)
                                                    {
                                                        $GLOBALS['$atvac'] = $fetch_row['count'];
                                                    }
                                                    if($fetch_row['Listid']==10)
                                                    {
                                                        $GLOBALS['$eat'] = $fetch_row['count'];
                                                    }
                                                    if($fetch_row['Listid']==11)
                                                    {
                                                        $GLOBALS['$donevac'] = $fetch_row['count'];
                                                    }
                                                }
                                            ?>
                                                    ['Task', 'Hours per Day'],
                                                    ['Todo',<?php echo $GLOBALS['$btrip']; ?>],
                                                    ['Doing',<?php echo $GLOBALS['$atvac']; ?>],
                                                    ['Done', <?php echo $GLOBALS['$eat']; ?>],
                                                    ['Done', <?php echo $GLOBALS['$donevac']; ?>]
                                            ]);

                                          // Optional; add a title and set the width and height of the chart
                                          var options = {'title':'Number of cards allocated to each list', 'width':980, 'height':400};

                                          // Display the chart inside the <div> element with id="piechart"
                                          var chart = new google.visualization.PieChart(document.getElementById('piechart'));
                                          chart.draw(data, options);
                                        }
                                    </script>
                                <?php
                            }
                        ?>
                        <!-- end piechart -->
                    

                        


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