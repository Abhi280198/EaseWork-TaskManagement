<?php
	session_start();
	//echo "Hii" .$_SESSION["UserID"];
	unset($_SESSION["UserID"]);
	session_destroy();
	//echo "Hii" .$_SESSION["UserID"];
	header("location:index_home.php");
?>