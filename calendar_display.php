<?php
    require "DbConnection.php";

    echo "<script>console.log('check data >>>>>>>>>>>>>>>>>>>>>>');</script>";
    $sqlQuery = "SELECT * FROM tblcalendar ORDER BY Calendarid";

    $alldata = array(); 

    $result = mysqli_query($con, $sqlQuery);

    if($result->num_row !=0)
    {
        while($row=$result->fetch_array()){

             $alldata[] = array(
              'id'   => $row["Calendarid"],
              'title'   => $row["CalendarTitle"],
              'start'   => $row["CalendarStart"],
              'end'   => $row["CalendarEnd"]
             );
        }
    } 

   echo "<script>console.log('Debug Objects: " . $alldata . "' );</script>";
    mysqli_free_result($result);
    mysqli_close($con);
    echo json_encode($alldata);
    mysqli_close($con);
?>
