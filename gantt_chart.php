<?php
include_once('DbConnection.php');
  $bid=$_GET['Bid'];
?> 

<html lang="en" dir="ltr">
<head>


    <title>Easework- Gantt Page</title>
    <?php include_once('csslinks.php');?>

  <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous"> -->
  <!-- <link type="text/css" href="assets/css/board.css" rel="stylesheet"> -->

  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">  
    google.charts.load('current', {'packages':['gantt']});
    google.charts.setOnLoadCallback(drawChart);



    function drawChart() {

      var data = new google.visualization.DataTable();
      data.addColumn('string', 'Task ID');
      data.addColumn('string', 'Task Name');
      data.addColumn('string', 'Resource');
      data.addColumn('date', 'StartDate (Medium)');
      data.addColumn('date', 'EndDate (Medium)');
      data.addColumn('number', 'Duration');
      data.addColumn('number', 'Percent Complete');
      data.addColumn('string', 'Dependencies');


      /*$(function () {

            // creates DatePicker from input

            $("#datePicker").ejDatePicker({

                showTooltip: true, //show tooltip on hovering date on DatePicker calendar

                tooltipFormat: "yyyy/MM/dd"// sets tooltip for dates in DatePicker calendar

            });

        });*/

      /*var cy = new Date('CreationDate','CreationDate','CreationDate');
      var start_year = cy.getDate();*/

      /*var cm = new Date('CreationDate');
      var start_month = cm.getFullMonth();

      var cd = new Date('CreationDate');
      var start_date = cd.getFullYear();*/

/*      var dy = new Date('DueDate','DueDate','DueDate');
      var end_year = dy.getDate();*/

      /*var dm = new Date('DueDate');
      var end_month = dm.getFullMonth();

      var dd = new Date('DueDate');
      var end_date = dd.getFullYear();*/

      data.addRows([
        <?php
            global $ConnectingDB;

           /* $cardids='';
            $cardnames='';
            $labels='';
            $crdate='';
            $dudate='';
            $percentage='';*/

            $sql="SELECT * FROM tblcard WHERE Bid=$bid";
            $stmt=mysqli_query($con, $sql);
            /*while($row = mysqli_fetch_array($stmt))
            {
              $cardid = $row['Cardid'];
              $cardname = $row['CardName'];
              $label = $row['Label'];
              $cdate = date('M, Y', strtotime($row['CreationDate']));
              $ddate = date('M, Y', strtotime($row['CreationDate']));

              $crdate = $crdate.'"'.$cdate.'",';
              $dudate = $ddate.'"'.$ddate.'",';*/

              /*$cardids = $cardids.$cardid.',';
              $cardnames = $cardnames.$cardname.',';
              $labels = $labels.$label',';*/
            /*}*/

           /* $crdate = trim($crdate, ",");
            $dudate = trim($dudate, ",");

            $cardids = trim($cardids, ",");
            $cardnames = trim($cardnames, ",");
            $labels = trim($labels, ",");*/
            while($datarows=mysqli_fetch_assoc($stmt)) 
            {
       
                $cdate=$datarows['CreationDate'];
                preg_match('#^(\d{4})-(\d{2})-(\d{2})$#', $cdate, $results);
                
                $startyear = $results[1];
                $startmonth = $results[2];
                $startday = $results[3];

                $ddate=$datarows['DueDate'];
                preg_match('#^(\d{4})-(\d{2})-(\d{2})$#', $ddate, $results);
                
                $dueyear = $results[1];                
                $duemonth = $results[2];
                $dueday = $results[3];
                
                /*$startyear=2020;
                $startmonth=12;
                $startday=23;

                $dueyear=2021;
                $duemonth=11;
                $dueday=28;

                echo([[$datarows['CardName']],[$datarows['Label']],[$datarows],
                [new date($startyear,$startmonth,$startday)],[new date($dueyear,$duemonth,$dueday)],['null'],
                [$datarows['percentage']],['null']]);*/

                /*echo "['".$datarows['Cardid']."' ,'".$datarows['CardName']."','".$datarows['Label']."',
                 new Date(".$datarows['CreationDate']."), 
                 new Date(".$datarows['DueDate']."),".'null'.",".$datarows['percentage'].",".'null'."],";
*/
                echo "['".$datarows['Cardid']."' ,'".$datarows['CardName']."','".$datarows['Label']."',
                 new Date('".$startyear.",".$startmonth.",".$startday."'), 
                 new Date('".$dueyear.",".$duemonth.",".$dueday."'),".'null'.",".$datarows['percentage'].",".'null'."],";
            }
        ?>
      ]);

      var options = {
        height: 1200,
        width: 1347,

       /* dateFormat: "yyyy/dd/MM",

        showTooltip: true, //show tooltip on hovering date on DatePicker calendar

        tooltipFormat: "yyyy/MM/dd",
*/
        gantt: {
          trackHeight: 40,
          criticalPathEnabled: false


/*new Date(".$datarows['CreationDate']."), 
                  new Date(".$datarows['DueDate']."),*/
          
        }


        /*gantt.defaultStartDate{date:new Date(YYYY, MM, DD)},
        gantt.defaultEndDate{date:new Date(YYYY, MM, DD)}*/
      };

      var formatter3 = new google.visualization.DateFormat({formatType: 'medium'});
        
      var chart = new google.visualization.Gantt(document.getElementById('chart_div'));



      chart.draw(data, options);
    }
  </script>
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

            <!-- <div class="mdk-drawer-layout js-mdk-drawer-layout" data-push data-responsive-width="992px">
                <div class="mdk-drawer-layout__content page">
 -->

                  <!-- subTitle details -->
                    <div class="container-fluid  page__heading-container">
                        <div class="page__heading">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb mb-0">
                                    <li class="breadcrumb-item"><i class="material-icons icon-20pt">home</i></li>
                                    <li class="breadcrumb-item active" aria-current="page">Gantt Chart</li>
                                </ol>
                                <h3 class="m-0">Gantt Chart</h3>
                            </nav>
                            
                        </div>
                    </div>
                  <!--  End subTitle details -->

                  <!-- start card details to be displayed and update -->
    <!-- <div class="container-fluid page__container">
        <div class="card card-form">
            <div class="row no-gutters"> -->

              <div id="chart_div"></div>


            <!-- </div>
        </div>
    </div> -->
                <!-- </div> -->
        <!-- // END header-layout__content -->

    </div>
    <!-- // END header-layout -->

   <?php include_once('scriptlinks.php');?>


</body>
</html>
 
 
      
          
        
      


    

