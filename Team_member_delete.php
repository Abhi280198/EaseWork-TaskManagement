<?php 
    include_once("DbConnection.php");
    $Bid=$_GET['Bid'];
    $Uid=$_GET['Uid'];
    $Tid=$_GET['Tid'];
    /*Start database delete board button(SHOW MENU)*/
    if (isset($_GET['Bid'])) 
    {
        $delete_team_member = "DELETE FROM tblteammember WHERE Bid=$Bid AND Uid=$Uid";
        $Exe_delete_team_member=mysqli_query($con,$delete_team_member)or die(mysqli_error($con));
        header("location:Team_member_addremove.php?Tid=$Tid&Uid=$Uid");
    } 
    /*End database delete board button(SHOW MENU)*/
?>