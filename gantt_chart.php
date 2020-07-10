
<?php
	include_once('DbConnection.php');

	$bid=$_GET['Bid'];
?>

<!DOCTYPE>
<html lang="en" dir="ltr">
<head>
	
	<title>Easework- Gantt Page</title>
	<?php include_once('csslinks.php');?>

  	<link type="text/css" href="assets/css/board.css" rel="stylesheet">

	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript">
    google.charts.load('current', {'packages':['gantt']});
    google.charts.setOnLoadCallback(drawChart);


    function drawChart() {

      var data = new google.visualization.DataTable();
      data.addColumn('string', 'Task ID');
      data.addColumn('string', 'Task Name');
      data.addColumn('string', 'Resource');
      data.addColumn('date', 'Start Date (Long)');
      data.addColumn('date', 'End Date (Long)');
      data.addColumn('number', 'Duration');
      data.addColumn('number', 'Percent Complete');
      data.addColumn('string', 'Dependencies');



      
      data.addRows([
        <?php
            global $ConnectingDB;

            $sql="SELECT Cardid, CardName, Label, CreationDate, DueDate, Percentage  FROM tblcard  WHERE Bid=$bid";

            $stmt=mysqli_query($con, $sql);
            
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

                

                echo "['" .$datarows['Cardid']. "','" .$datarows['CardName']. "','" .$datarows['Label']. "',
                 new Date('".$startyear.",".$startmonth.",".$startday."'), 
                 new Date('".$dueyear.",".$duemonth.",".$dueday."'),".'null'.",".$datarows['Percentage'].",".'null'." ],";
             }
        ?>

      ]);

      var options = {
        height: 1200,
        width: 1340,
        

        gantt: {
          trackHeight: 40

   
      }
      };

      var formatter3 = new google.visualization.DateFormat({formatType: 'long'});
      /*formatter_medium.format(data,2);*/
        
      var chart = new google.visualization.Gantt(document.getElementById('chart_div'));



      chart.draw(data, options);
    }
  </script>

</head>
<body>

	<div class="preloader"></div> 

    <!-- Header Layout -->
    <div class="mdk-header-layout js-mdk-header-layout">

        <!-- Header -->

        <?php include_once('header1.php');?>
        <!-- // END Header -->

        <!-- Header Layout Content -->

        <div class="mdk-header-layout__content">

            <div class="mdk-drawer-layout js-mdk-drawer-layout" data-push data-responsive-width="992px">
                <div class="mdk-drawer-layout__content page">  <!-- class="layout-default" -->


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
    <div class="container-fluid page__container">
        <div class="card card-form">
            <div class="row no-gutters">


	 <div id="chart_div"></div>

	 </div>
        </div>
    </div>
                </div>
        <!-- // END header-layout__content -->

    </div>
    <!-- // END header-layout -->

   <?php  include_once('scriptlinks.php');?>


</body>
</html>