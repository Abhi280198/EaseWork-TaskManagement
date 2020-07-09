<?php
require_once "DbConnection.php";
echo "<script>alert('check data >>>>>>>>>>>>>>>>>>>>>>');</script>";

$id = $_POST['id'];
$title = $_POST['title'];
$start = $_POST['start'];
$end = $_POST['end'];

$sqlUpdate = "UPDATE tblcalendar SET CalendarTitle='" . $title . "',CalendarStart='" . $start . "',CalendarEnd='" . $end . "' WHERE Calendarid='" . $id . "' ";

mysqli_query($con, $sqlUpdate);
mysqli_close($con);

?>