<?php
require "database.php";

$id = $_POST['id'];
$sqlDelete = "DELETE from table_events WHERE id=".$id;

mysqli_query($conn, $sqlDelete);
echo mysqli_affected_rows($conn);

mysqli_close($conn);
?>