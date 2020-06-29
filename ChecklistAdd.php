<?php
include_once("DbConnection.php");
   $Cardid=$_GET['Cardid'];
   $Bid=$_GET['Bid'];
   $inputText=$_GET['Input'];
   if(isset($_GET['Cardid']))
   {
   	//<!-- DataBase for Todo Checklist -->           
        $insert_todo_cl = "INSERT into tblchecklist values(null,'$inputText','$Cardid',1)";
        $run_checklist = mysqli_query($con,$insert_todo_cl)or die(mysqli_error($con));
        header("location:cards.php?Cardid=$Cardid&Bid=$Bid");
   }
?>