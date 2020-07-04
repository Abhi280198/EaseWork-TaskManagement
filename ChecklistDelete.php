
<?php
include_once("DbConnection.php");
   $Cardid=$_GET['Cardid'];
   $checkid=$_GET['Checklistid'];
   $bid=$_GET['Bid'];
   if(isset($_GET['Cardid']))
   {

   	 // $delete_team_member = "DELETE FROM tblteammember WHERE Bid=$Bid AND Uid=$Uid";
     //    $Exe_delete_team_member=mysqli_query($con,$delete_team_member)or die(mysqli_error($con));
     //    header("location:Team_member_addremove.php?Tid=$Tid&Uid=$Uid");
   	           
        $delete_checklist = "DELETE FROM tblchecklist where Checklistid=$checkid";
        $Exe_delete_checklist = mysqli_query($con,$delete_checklist)or die(mysqli_error($con));
        header("location:cards.php?Cardid=$Cardid&Bid=$bid");
   }
?>