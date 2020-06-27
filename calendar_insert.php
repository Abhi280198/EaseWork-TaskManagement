<?php

	include_once("DbConnection.php");
	$title = $_POST['title'];
	$start = $_POST['start'];
	$end = $_POST['end'];
	$user= $_SESSION['UserID'];

	$sqlInsert = "INSERT INTO tblcalendar(CalendarTitle,CalendarStart,CalendarEnd,CalendarStatus,Uid) VALUES ('".$title."','".$start."','".$end ."',1,'$user')";

	$result = mysqli_query($con, $sqlInsert);

	if (! $result) {
	    $result = mysqli_error($con);
	}
?>