<?php
require_once "DbConnection.php";



$id = $_POST['id'];

$sqlDelete = "DELETE from tblcalendar WHERE Calendarid=".$id;
// echo "<script>alert('check data >>>>>>>>>>>>>>>>>>>>>>','".$sqlDelete."');</script>";

mysqli_query($con, $sqlDelete);
echo mysqli_affected_rows($con);

mysqli_close($con);


?>