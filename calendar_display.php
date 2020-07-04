<?php
    require "DbConnection.php";

    $json = array();
    $sqlQuery = "SELECT * FROM tblcalendar ORDER BY Calendarid";

    $result = mysqli_query($con, $sqlQuery);
    $alldata = array();
    while ($row = mysqli_fetch_assoc($result)) 
    {
        array_push($alldata, $row);
    }
    mysqli_free_result($result);

    /*mysqli_close($con);*/
    echo json_encode($alldata);
    mysqli_close($con);
?>
?>