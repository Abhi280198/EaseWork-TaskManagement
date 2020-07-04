<?php
include_once("DbConnection.php");
    $bid=$_GET['Bid'];
    $uid=$_SESSION['UserID'];
    $senduser=$_SESSION['Firstname'];
    $senduser1=$_SESSION['Lastname'];

    /*Start database add board description button(SHOW MENU)*/
    if (isset($_REQUEST['showdescriptioneducation'])) 
    {
        $board_description_education = $_REQUEST['educationdescription'];
        $update_education_description = "UPDATE tblboard set BoardDescription = '$board_description_education' where Bid='$bid' ";
        $Exe_update_education_description=mysqli_query($con,$update_education_description)or die(mysqli_error($con));
?>
        <script type="text/javascript">
                    alert("Description added Successfully");
        </script>
<?php
    }
    /*End database add board description button(SHOW MENU)*/ 

    /*Start database complete board button (SHOW MENU)*/
    if (isset($_REQUEST['educationcompletebutton'])) 
    {
        $Updateisactive_education = "UPDATE tblboard set IsActive=0 where Bid='$bid' ";
        $Exe_updateisactive_education=mysqli_query($con,$Updateisactive_education)or die(mysqli_error($con));  
        header("location:Complete.php?Uid=$uid");
    }
    /*End database complete board button(SHOW MENU)*/ 

    /*Start database delete board button(SHOW MENU)*/
    if (isset($_REQUEST['EducationdeleteYes'])) 
    {
        $delete_board_education = "DELETE FROM tblboard WHERE Bid='$bid'";
        $Exe_delete_education_board=mysqli_query($con,$delete_board_education)or die(mysqli_error($con));
        $delete_board_member = "DELETE FROM tblteammember WHERE Bid='$bid'";
        $Exe_delete_board_member=mysqli_query($con,$delete_board_member)or die(mysqli_error($con));
        header("location:index.php?Uid=$uid");
    } 
    /*End database delete board button(SHOW MENU)*/

    /*START DATABASE INSERT DATA THROUGH ADD CARD BUTTON IN (Syllabus Remaining  LIST)*/
    if (isset($_REQUEST['SyllabusRemainingList'])) 
    {
        if ($_REQUEST['SyllabusRemainingTitle']=="") 
        {
            echo '<script type="text/javascript">alert("Card Name cannot be Empty!!!");</script>';
        }
        else
        {
            $Syllabus1description= $Syllabus1label =$Syllabus1labelcolor =$Syllabus1duedate= $Syllabus1member="";

            $Syllabus1title = $_REQUEST['SyllabusRemainingTitle'];
            $Syllabus1description = $_REQUEST['SyllabusRemainingdescription'];
            $Syllabus1label= $_REQUEST['SyllabusRemaininglabel'];
            $Syllabus1labelcolor = $_REQUEST['SyllabusRemaininglabelcolor'];
            $Syllabus1duedate = $_REQUEST['SyllabusRemainingduedate'];
            $Syllabus1member = $_REQUEST['SyllabusRemainingMember'];

            $Syllabus1_query="INSERT into tblcard values(null,'$Syllabus1title','$Syllabus1label','$Syllabus1labelcolor','$Syllabus1duedate',now(),'$Syllabus1description',4,'$bid',1)";
            $run_Syllabus1 = mysqli_query($con,$Syllabus1_query);
            $syllabus1= mysqli_insert_id($con);

            if($run_Syllabus1)
            {
                if ($syllabus1) 
                {
                    $query1_sremain="INSERT into tblmembercard values(null,'$Syllabus1member','$syllabus1')";
                    $run_sremain = mysqli_query($con,$query1_sremain);
                    if($run_sremain)
                    {   
                        if ($Syllabus1member==0) 
                        {
                           header("location:Education_template.php?Bid=$bid");
                        }
                        else
                        {
                            $suser="SELECT tbluser.Email,tbluser.Fname,tbluser.Lname, tblboard.Btitle from tbluser,tblboard where tbluser.Uid=$Syllabus1member AND tblboard.Bid=$bid" ;
                            $run_suser = mysqli_query($con,$suser);
                            if($run_suser->num_rows!=0)
                            {  
                                $row_suser=$run_suser->fetch_array();

                                $usfirst=$row_suser['Fname'];
                                $uslast=$row_suser['Lname'];
                                $usemail=$row_suser['Email'];
                                $boname=$row_suser['Btitle'];

                                $subject = "Easework";
                                $body = "Hi, $usfirst $uslast. $senduser $senduser1 added you to a new card-$Syllabus1title on Board-$boname. Please Login to Check Your Activities : http://localhost/Task-Management/login.php";
                                $headers = "From: poojakusingh35@gmail.com";
                                mail($usemail, $subject, $body, $headers);

                                header("location:Education_template.php?Bid=$bid");
                            }
                        }
                    }
                }
            }
            else{
                echo "error".mysqli_error($con);   
            } 
        } 
    }
    /*END DATABASE INSERT DATA THROUGH ADD CARD BUTTON IN (Syllabus Remaining LIST)*/

    /*START DATABASE INSERT DATA THROUGH ADD CARD BUTTON IN (Syllabus Today  LIST)*/
    if (isset($_REQUEST['SyllabusTodayList'])) 
    {
        if ($_REQUEST['SyllabusTodayTitle']=="") 
        {
            echo '<script type="text/javascript">alert("Card Name cannot be Empty!!!");</script>';
        }
        else
        {
            $Syllabus2description= $Syllabus2label =$Syllabus2labelcolor =$Syllabus2duedate="";

            $Syllabus2title = $_REQUEST['SyllabusTodayTitle'];
            $Syllabus2description = $_REQUEST['SyllabusTodaydescription'];
            $Syllabus2label= $_REQUEST['SyllabusTodaylabel'];
            $Syllabus2labelcolor = $_REQUEST['SyllabusTodaylabelcolor'];
            $Syllabus2duedate = $_REQUEST['SyllabusTodayduedate'];
            $Syllabus2member = $_REQUEST['SyllabusTodayMember'];

            $Syllabus2_query="INSERT into tblcard values(null,'$Syllabus2title','$Syllabus2label','$Syllabus2labelcolor','$Syllabus2duedate',now(),'$Syllabus2description',5,'$bid',1)";
            $run_Syllabus2 = mysqli_query($con,$Syllabus2_query);
            $syllabus2= mysqli_insert_id($con);

            if($run_Syllabus2)
            {
                if ($syllabus2) 
                {
                    $query2_stoday="INSERT into tblmembercard values(null,'$Syllabus2member','$syllabus2')";
                    $run_stoday = mysqli_query($con,$query2_stoday);
                    if($run_stoday)
                    {
                        if ($Syllabus2member==0) 
                        {
                           header("location:Education_template.php?Bid=$bid");
                        }
                        else
                        {
                            $suser="SELECT tbluser.Email,tbluser.Fname,tbluser.Lname, tblboard.Btitle from tbluser,tblboard where tbluser.Uid=$Syllabus2member AND tblboard.Bid=$bid" ;
                            $run_suser = mysqli_query($con,$suser);
                            if($run_suser->num_rows!=0)
                            {  
                                $row_suser=$run_suser->fetch_array();

                                $usfirst=$row_suser['Fname'];
                                $uslast=$row_suser['Lname'];
                                $usemail=$row_suser['Email'];
                                $boname=$row_suser['Btitle'];

                                $subject = "Easework";
                                $body = "Hi, $usfirst $uslast. $senduser $senduser1 added you to a new card-$Syllabus2title on Board-$boname. Please Login to Check Your Activities : http://localhost/Task-Management/login.php";
                                $headers = "From: poojakusingh35@gmail.com";
                                mail($usemail, $subject, $body, $headers);

                                header("location:Education_template.php?Bid=$bid");
                            }
                        }
                    }
                }
            }
            else{
                echo "error".mysqli_error($con);   
            } 
        } 
    }
    /*END DATABASE INSERT DATA THROUGH ADD CARD BUTTON IN (Syllabus Today LIST)*/

    /*START DATABASE INSERT DATA THROUGH ADD CARD BUTTON IN (Syllabus Covered LIST)*/
    if (isset($_REQUEST['SyllabusCoveredList'])) 
    {
        if ($_REQUEST['SyllabusCoveredTitle']=="") 
        {
            echo '<script type="text/javascript">alert("Card Name cannot be Empty!!!");</script>';
        }
        else
        {
            $Syllabus3description= $Syllabus3label =$Syllabus3labelcolor =$Syllabus3duedate="";

            $Syllabus3title = $_REQUEST['SyllabusCoveredTitle'];
            $Syllabus3description = $_REQUEST['SyllabusCovereddescription'];
            $Syllabus3label= $_REQUEST['SyllabusCoveredlabel'];
            $Syllabus3labelcolor = $_REQUEST['SyllabusCoveredlabelcolor'];
            $Syllabus3duedate = $_REQUEST['SyllabusCoveredduedate'];
            $Syllabus3member = $_REQUEST['SyllabusCoveredMember'];

            $Syllabus3_query="INSERT into tblcard values(null,'$Syllabus3title','$Syllabus3label','$Syllabus3labelcolor','$Syllabus3duedate',now(),'$Syllabus3description',6,'$bid',1)";
            $run_Syllabus3 = mysqli_query($con,$Syllabus3_query);
            $syllabus3= mysqli_insert_id($con);

            if($run_Syllabus3)
            {
                if ($syllabus3) 
                {
                    $query3_stoday="INSERT into tblmembercard values(null,'$Syllabus3member','$syllabus3')";
                    $run_scover = mysqli_query($con,$query3_stoday);
                    if($run_scover)
                    {
                        if ($Syllabus3member==0) 
                        {
                           header("location:Education_template.php?Bid=$bid");
                        }
                        else
                        {
                            $suser="SELECT tbluser.Email,tbluser.Fname,tbluser.Lname, tblboard.Btitle from tbluser,tblboard where tbluser.Uid=$Syllabus3member AND tblboard.Bid=$bid" ;
                            $run_suser = mysqli_query($con,$suser);
                            if($run_suser->num_rows!=0)
                            {  
                                $row_suser=$run_suser->fetch_array();

                                $usfirst=$row_suser['Fname'];
                                $uslast=$row_suser['Lname'];
                                $usemail=$row_suser['Email'];
                                $boname=$row_suser['Btitle'];

                                $subject = "Easework";
                                $body = "Hi, $usfirst $uslast. $senduser $senduser1 added you to a new card-$Syllabus3title on Board-$boname. Please Login to Check Your Activities : http://localhost/Task-Management/login.php";
                                $headers = "From: poojakusingh35@gmail.com";
                                mail($usemail, $subject, $body, $headers);

                                header("location:Education_template.php?Bid=$bid");
                            }
                        }
                    }
                }
            }
            else{
                echo "error".mysqli_error($con);   
            } 
        } 
    }
    /*END DATABASE INSERT DATA THROUGH ADD CARD BUTTON IN (Syllabus Covered LIST)*/

    /*START DATABASE INSERT DATA THROUGH ADD CARD BUTTON IN (Syllabus Covered LIST)*/
    if (isset($_REQUEST['SyllabusAssignmentList'])) 
    {
        if ($_REQUEST['SyllabusAssignmentTitle']=="") 
        {
            echo '<script type="text/javascript">alert("Card Name cannot be Empty!!!");</script>';
        }
        else
        {
            $Syllabus4description= $Syllabus4label =$Syllabus4labelcolor =$Syllabus4duedate="";

            $Syllabus4title = $_REQUEST['SyllabusAssignmentTitle'];
            $Syllabus4description = $_REQUEST['SyllabusAssignmentdescription'];
            $Syllabus4label= $_REQUEST['SyllabusAssignmentlabel'];
            $Syllabus4labelcolor = $_REQUEST['SyllabusAssignmentlabelcolor'];
            $Syllabus4duedate = $_REQUEST['SyllabusAssignmentduedate'];
            $Syllabus4member = $_REQUEST['SyllabusAssignmentMember'];

            $Syllabus4_query="INSERT into tblcard values(null,'$Syllabus4title','$Syllabus4label','$Syllabus4labelcolor','$Syllabus4duedate',now(),'$Syllabus4description',7,'$bid',1)";
            $run_Syllabus4 = mysqli_query($con,$Syllabus4_query);
            $syllabus4= mysqli_insert_id($con);

            if($run_Syllabus4)
            {
                if($syllabus4) 
                {
                    $query4_stoday="INSERT into tblmembercard values(null,'$Syllabus4member','$syllabus4')";
                    $run_sassign = mysqli_query($con,$query4_stoday);
                    if($run_sassign)
                    {
                        if($Syllabus4member==0) 
                        {
                           header("location:Education_template.php?Bid=$bid");
                        }
                        else
                        {
                            $suser="SELECT tbluser.Email,tbluser.Fname,tbluser.Lname, tblboard.Btitle from tbluser,tblboard where tbluser.Uid=$Syllabus4member AND tblboard.Bid=$bid" ;
                            $run_suser = mysqli_query($con,$suser);
                            if($run_suser->num_rows!=0)
                            {  
                                $row_suser=$run_suser->fetch_array();

                                $usfirst=$row_suser['Fname'];
                                $uslast=$row_suser['Lname'];
                                $usemail=$row_suser['Email'];
                                $boname=$row_suser['Btitle'];

                                $subject = "Easework";
                                $body = "Hi, $usfirst $uslast. $senduser $senduser1 added you to a new card-$Syllabus4title on Board-$boname. Please Login to Check Your Activities : http://localhost/Task-Management/login.php";
                                $headers = "From: poojakusingh35@gmail.com";
                                mail($usemail, $subject, $body, $headers);

                                header("location:Education_template.php?Bid=$bid");
                            }
                        }
                    }
                }
            }
            else
            {
                echo "error".mysqli_error($con);   
            }
        } 
    }
    /*END DATABASE INSERT DATA THROUGH ADD CARD BUTTON IN (Syllabus Covered LIST)*/

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>

    <title>Easework- Education Template</title>
    <?php include_once('csslinks.php');?>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link type="text/css" href="assets/css/board.css" rel="stylesheet">

    <!-- start show menu button script -->
        <script>
            function myEducationFunction() 
            {
              var x = document.getElementById("demo");
              if (x.className.indexOf("w3-show") == -1) 
              {
                x.className += " w3-show";
              } else { 
                x.className = x.className.replace(" w3-show", "");
              }
            }
        </script>
    <!-- end show menu button script -->

    <!-- start show menu description popup -->
        <div id="Educationdescription" class="modal">
            <div class="modal-content" style="width: 50%; height: 300px;">
                <form method="POST" enctype="multipart/form-data" action="" class="form-container">
                    <div>
                        <label><b>Description :</b></label>
                        <br>
                        <textarea name="educationdescription" id="description" rows="7" style="width: 100%;" placeholder="Description ...">
                            
                        </textarea>
                    </div><br>
                    <div class="canclebtn">
                        <button type="submit" name="showdescriptioneducation" class="btn cancel">Add</button>
                        <button type="button" class="btn cancel" onclick="desEducationclose()" >Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    <!-- End show menu description popup -->

    <!-- start show menu delete popup -->
        <div id="Educationdeleteboard" class="modal">
            <div class="modal-content" style="width: 50%; height: 250px;">
                <form method="POST" enctype="multipart/form-data" action="" class="form-container">
                    <div>
                        <h3><strong>Are you sure ?</strong></h3>
                    </div><br><br>
                    <center><div class="canclebtn">
                        <button type="submit" name="EducationdeleteYes" class="btn cancel">Yes</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <button type="button" class="btn cancel" onclick="Educationdeleteclose()" >No</button>
                    </div></center>
                </form>
            </div>
        </div>
    <!-- End show menu delete popup -->

    <!-- start Syllabus Remaining details popup -->
        <div id="SyllabusRemainingDetails" class="modal" >
            <div class="modal-content" style="width: 50%; height: 80%; overflow: auto;">

                <div class="modal-body">
                    <!-- Start Form Details -->  
                    <h5 style="text-align: center;" class="w3-text-blue">Syllabus Remaining- CARD DETAILS</h5>

                    <form class="w3-container w3-card-4" style="padding-top: 20px;" method="POST" enctype="multipart/form-data">
                        <!-- Start Card Name Input -->
                        <div class="row" style="padding-left:50px;" >
                          <div class="col-25">   
                              <label class="w3-text-black"><b>Title</b></label>
                          </div>
                          <div class="col-75">
                            <input class="w3-input w3-border" style="width: 320px; height: 40px;" name="SyllabusRemainingTitle" type="text">
                          </div>
                        </div>
                        <!-- End Card Name Input -->

                        <hr style="border-top: 1px solid #bbb;">

                        <!-- Start Description Input -->
                        <div class="row" style="padding-left:50px;" >
                          <div class="col-25">     
                            <label class="w3-text-black"><b>Description</b></label>
                          </div>
                          <div class="col-75">
                              <textarea name="SyllabusRemainingdescription" id="description" rows="4" class="w3-input w3-border" style="width: 320px; background-color: white;" placeholder="Description ..."></textarea>
                          </div>
                        </div>
                        <!-- End Description Input -->

                        <?php

                            $selectboardmember = " SELECT * FROM tblboard Where IsActive=1 AND Bid=$bid ";  
                            $result_selectboardmember = mysqli_query($con,$selectboardmember);
                            if($result_selectboardmember ->num_rows!=0)
                            {  
                                $row_Remainingmember=mysqli_fetch_array($result_selectboardmember);
                                $btid=$row_Remainingmember['Tid'];
                                if ($btid !=1) 
                                {
                        ?>
                                        <hr style="border-top: 1px solid #bbb;">

                                        <!-- Start Member List Input -->                                                     
                                        <div class="row" style="padding-left:50px;" >
                                            <div class="col-25">     
                                                <label class="w3-text-black"><b>Members</b></label>
                                            </div>
                                            <div class="col-75">
                                                <select id="country" name="SyllabusRemainingMember" style="width:320px; height: 45px;">
                                                    <option value="0" disabled selected>--Select--</option>
                                                <?php        
                                                    $Remainingmember = "SELECT * FROM tbluser Where IsActive=1 AND Uid IN (SELECT Uid FROM tblteammember Where Bid=$bid)";  
                                                    $result_Remainingmember  = mysqli_query($con,$Remainingmember );
                                                    if($result_Remainingmember ->num_rows!=0)
                                                    {  
                                                        while($row_Remainingmember =$result_Remainingmember ->fetch_array())  
                                                        {
                                                            $member=$row_Remainingmember ['Uid'];
                                                            $fname=$row_Remainingmember ['Fname'];
                                                            $lname=$row_Remainingmember ['Lname'];
                                                ?>

                                                            <option value="<?php echo $member;?>"><?php echo $fname." ".$lname;?></option>
                                                <?php
                                                        }
                                                    }
                                                ?>
                                                </select>

                                            </div>
                                        </div>
                                        <!-- End Member List Input --> 
                        <?php 
                                }
                            }
                        ?>
                        
                        <hr style="border-top: 1px solid #bbb;">

                        <!-- Start Label Input --> 
                        <div class="row" style="padding-left:50px;" >
                          <div class="col-25">     
                            <label class="w3-text-black"><b>Label Name</b></label>
                          </div>
                          <div class="col-75" >
                            <input class="w3-input w3-border" placeholder="Enter label name" name="SyllabusRemaininglabel" type="text" style="width: 320px; height: 40px;">                                                
                          </div>
                        </div>
                        <!-- End Label Input -->

                        <hr style="border-top: 1px solid #bbb;">

                        <!-- Start Label color Input --> 
                        <div class="row" style="padding-left:50px;" >
                            <div class="col-25">     
                                <label class="w3-text-black"><b>Label Color</b></label>
                            </div>
                            <div class="col-75" style="background-color: white;">
                                <input type="color" name="SyllabusRemaininglabelcolor" style="width: 320px; height: 40px;">                      
                            </div>
                        </div>
                        <!-- End Label color Input -->


                        <hr style="border-top: 1px solid #bbb;">

                        <!-- Start Due Date Input --> 
                        <div class="row" style="padding-left:50px;" >
                          <div class="col-25">     
                            <label class="w3-text-black"><b>Due Date</b></label>
                          </div>
                          <div class="col-75">
                            <input type="date" id="birthdaytime" name="SyllabusRemainingduedate" style="width:320px; height: 45px;" class="w3-input w3-border">
                          </div>
                        </div>
                        <!-- End Due Date Input --> 

                        <hr style="border-top: 1px solid #bbb;">

                        <!-- Start Button Input -->  
                        <div>
                            <center>
                                <button type="submit" class="btn btn-success" name="SyllabusRemainingList" style="width:150px;">Save</button>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <a href="#" class="btn btn-danger" onclick="SyllabusRemainingCloseForm()" style="background-color: red; width:150px;" >Cancel</a>
                                <p></p>
                            </center>
                        </div>
                        <!-- End Button Input -->
                  
                    </form>
                  <!--End Form Details -->
                </div> 

            </div>
        </div>
    <!-- start Syllabus Remaining details popup -->

    <!-- start Syllabus Today details popup -->
        <div id="SyllabusTodayDetails" class="modal" >
            <div class="modal-content" style="width: 50%; height: 80%; overflow: auto;">

                <div class="modal-body">
                    <!-- Start Form Details -->  
                    <h5 style="text-align: center;" class="w3-text-blue">Syllabus Today- CARD DETAILS</h5>

                    <form class="w3-container w3-card-4" style="padding-top: 20px;" method="POST" enctype="multipart/form-data">
                        <!-- Start Card Name Input -->
                        <div class="row" style="padding-left:50px;" >
                          <div class="col-25">   
                              <label class="w3-text-black"><b>Title</b></label>
                          </div>
                          <div class="col-75">
                            <input class="w3-input w3-border" style="width: 320px; height: 40px;" name="SyllabusTodayTitle" type="text">
                          </div>
                        </div>
                        <!-- End Card Name Input -->

                        <hr style="border-top: 1px solid #bbb;">

                        <!-- Start Description Input -->
                        <div class="row" style="padding-left:50px;" >
                          <div class="col-25">     
                            <label class="w3-text-black"><b>Description</b></label>
                          </div>
                          <div class="col-75">
                              <textarea name="SyllabusTodaydescription" id="description" rows="4" class="w3-input w3-border" style="width: 320px; background-color: white;" placeholder="Description ..."></textarea>
                          </div>
                        </div>
                        <!-- End Description Input -->

                        <?php

                            $select2boardmember = " SELECT * FROM tblboard Where IsActive=1 AND Bid=$bid ";  
                            $result_2selectboardmember = mysqli_query($con,$select2boardmember);
                            if($result_2selectboardmember ->num_rows!=0)
                            {  
                                $row_2Remainingmember=mysqli_fetch_array($result_2selectboardmember);
                                $btid=$row_2Remainingmember['Tid'];
                                if ($btid !=1) 
                                {
                        ?>
                                        <hr style="border-top: 1px solid #bbb;">

                                        <!-- Start Member List Input -->                                                     
                                        <div class="row" style="padding-left:50px;" >
                                            <div class="col-25">     
                                                <label class="w3-text-black"><b>Members</b></label>
                                            </div>
                                            <div class="col-75">
                                                <select id="country" name="SyllabusTodayMember" style="width:320px; height: 45px;">
                                                    <option value="0" disabled selected>--Select--</option>
                                                <?php        
                                                    $Remaining2member = "SELECT * FROM tbluser Where IsActive=1 AND Uid IN (SELECT Uid FROM tblteammember Where Bid=$bid)";  
                                                    $result_Remaining2member  = mysqli_query($con,$Remaining2member );
                                                    if($result_Remaining2member ->num_rows!=0)
                                                    {  
                                                        while($row_Remaining2member =$result_Remaining2member ->fetch_array())  
                                                        {
                                                            $member2=$row_Remaining2member ['Uid'];
                                                            $fname2=$row_Remaining2member ['Fname'];
                                                            $lname2=$row_Remaining2member ['Lname'];
                                                ?>

                                                            <option value="<?php echo $member2;?>"><?php echo $fname2." ".$lname2;?></option>
                                                <?php
                                                        }
                                                    }
                                                ?>
                                                </select>

                                            </div>
                                        </div>
                                        <!-- End Member List Input --> 
                        <?php 
                                }
                            }
                        ?>
                        
                        <hr style="border-top: 1px solid #bbb;">

                        <!-- Start Label Input --> 
                        <div class="row" style="padding-left:50px;" >
                          <div class="col-25">     
                            <label class="w3-text-black"><b>Label Name</b></label>
                          </div>
                          <div class="col-75" >
                            <input class="w3-input w3-border" placeholder="Enter label name" name="SyllabusTodaylabel" type="text" style="width: 320px; height: 40px;">                                                
                          </div>
                        </div>
                        <!-- End Label Input -->

                        <hr style="border-top: 1px solid #bbb;">

                        <!-- Start Label color Input --> 
                        <div class="row" style="padding-left:50px;" >
                            <div class="col-25">     
                                <label class="w3-text-black"><b>Label Color</b></label>
                            </div>
                            <div class="col-75" style="background-color: white;">
                                <input type="color" name="SyllabusTodaylabelcolor" style="width: 320px; height: 40px;">                      
                            </div>
                        </div>
                        <!-- End Label color Input -->


                        <hr style="border-top: 1px solid #bbb;">

                        <!-- Start Due Date Input --> 
                        <div class="row" style="padding-left:50px;" >
                          <div class="col-25">     
                            <label class="w3-text-black"><b>Due Date</b></label>
                          </div>
                          <div class="col-75">
                            <input type="date" id="birthdaytime" name="SyllabusTodayduedate" style="width:320px; height: 45px;" class="w3-input w3-border">
                          </div>
                        </div>
                        <!-- End Due Date Input --> 

                        <hr style="border-top: 1px solid #bbb;">

                        <!-- Start Button Input -->  
                        <div>
                            <center>
                                <button type="submit" class="btn btn-success" name="SyllabusTodayList" style="width:150px;">Save</button>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <a href="#" class="btn btn-danger" onclick="SyllabusTodayCloseForm()" style="background-color: red; width:150px;" >Cancel</a>
                                <p></p>
                            </center>
                        </div>
                        <!-- End Button Input -->
                  
                    </form>
                  <!--End Form Details -->
                </div> 

            </div>
        </div>
    <!-- start Syllabus Today details popup -->

    <!-- start Syllabus Covered details popup -->
        <div id="SyllabusCoveredDetails" class="modal" >
            <div class="modal-content" style="width: 50%; height: 80%; overflow: auto;">

                <div class="modal-body">
                    <!-- Start Form Details -->  
                    <h5 style="text-align: center;" class="w3-text-blue">Syllabus Today- CARD DETAILS</h5>

                    <form class="w3-container w3-card-4" style="padding-top: 20px;" method="POST" enctype="multipart/form-data">
                        <!-- Start Card Name Input -->
                        <div class="row" style="padding-left:50px;" >
                          <div class="col-25">   
                              <label class="w3-text-black"><b>Title</b></label>
                          </div>
                          <div class="col-75">
                            <input class="w3-input w3-border" style="width: 320px; height: 40px;" name="SyllabusCoveredTitle" type="text">
                          </div>
                        </div>
                        <!-- End Card Name Input -->

                        <hr style="border-top: 1px solid #bbb;">

                        <!-- Start Description Input -->
                        <div class="row" style="padding-left:50px;" >
                          <div class="col-25">     
                            <label class="w3-text-black"><b>Description</b></label>
                          </div>
                          <div class="col-75">
                              <textarea name="SyllabusCovereddescription" id="description" rows="4" class="w3-input w3-border" style="width: 320px; background-color: white;" placeholder="Description ..."></textarea>
                          </div>
                        </div>
                        <!-- End Description Input -->

                        <?php

                            $selectboardmember3 = " SELECT * FROM tblboard Where IsActive=1 AND Bid=$bid ";  
                            $result_selectboardmember3 = mysqli_query($con,$selectboardmember3);
                            if($result_selectboardmember3 ->num_rows!=0)
                            {  
                                $row_Remainingmember3=mysqli_fetch_array($result_selectboardmember3);
                                $btid=$row_Remainingmember3['Tid'];
                                if ($btid !=1) 
                                {
                        ?>
                                        <hr style="border-top: 1px solid #bbb;">

                                        <!-- Start Member List Input -->                                                     
                                        <div class="row" style="padding-left:50px;" >
                                            <div class="col-25">     
                                                <label class="w3-text-black"><b>Members</b></label>
                                            </div>
                                            <div class="col-75">
                                                <select id="country" name="SyllabusCoveredMember" style="width:320px; height: 45px;">
                                                    <option value="0" disabled selected>--Select--</option>
                                                <?php        
                                                    $Remaining3member = "SELECT * FROM tbluser Where IsActive=1 AND Uid IN (SELECT Uid FROM tblteammember Where Bid=$bid)";  
                                                    $result_Remaining3member  = mysqli_query($con,$Remaining3member );
                                                    if($result_Remaining3member ->num_rows!=0)
                                                    {  
                                                        while($row_Remaining3member =$result_Remaining3member ->fetch_array())  
                                                        {
                                                            $member3=$row_Remaining3member['Uid'];
                                                            $fname3=$row_Remaining3member['Fname'];
                                                            $lname3=$row_Remaining3member['Lname'];
                                                ?>

                                                            <option value="<?php echo $member3;?>"><?php echo $fname3." ".$lname3;?></option>
                                                <?php
                                                        }
                                                    }
                                                ?>
                                                </select>

                                            </div>
                                        </div>
                                        <!-- End Member List Input --> 
                        <?php 
                                }
                            }
                        ?>
                        
                        <hr style="border-top: 1px solid #bbb;">

                        <!-- Start Label Input --> 
                        <div class="row" style="padding-left:50px;" >
                          <div class="col-25">     
                            <label class="w3-text-black"><b>Label Name</b></label>
                          </div>
                          <div class="col-75" >
                            <input class="w3-input w3-border" placeholder="Enter label name" name="SyllabusCoveredlabel" type="text" style="width: 320px; height: 40px;">                                                
                          </div>
                        </div>
                        <!-- End Label Input -->

                        <hr style="border-top: 1px solid #bbb;">

                        <!-- Start Label color Input --> 
                        <div class="row" style="padding-left:50px;" >
                            <div class="col-25">     
                                <label class="w3-text-black"><b>Label Color</b></label>
                            </div>
                            <div class="col-75" style="background-color: white;">
                                <input type="color" name="SyllabusCoveredlabelcolor" style="width: 320px; height: 40px;">                      
                            </div>
                        </div>
                        <!-- End Label color Input -->


                        <hr style="border-top: 1px solid #bbb;">

                        <!-- Start Due Date Input --> 
                        <div class="row" style="padding-left:50px;" >
                          <div class="col-25">     
                            <label class="w3-text-black"><b>Due Date</b></label>
                          </div>
                          <div class="col-75">
                            <input type="date" id="birthdaytime" name="SyllabusCoveredduedate" style="width:320px; height: 45px;" class="w3-input w3-border">
                          </div>
                        </div>
                        <!-- End Due Date Input --> 

                        <hr style="border-top: 1px solid #bbb;">

                        <!-- Start Button Input -->  
                        <div>
                            <center>
                                <button type="submit" class="btn btn-success" name="SyllabusCoveredList" style="width:150px;">Save</button>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <a href="#" class="btn btn-danger" onclick="SyllabusCoveredCloseForm()" style="background-color: red; width:150px;" >Cancel</a>
                                <p></p>
                            </center>
                        </div>
                        <!-- End Button Input -->
                  
                    </form>
                  <!--End Form Details -->
                </div> 

            </div>
        </div>
    <!-- start Syllabus Covered details popup -->

    <!-- start Assignments details popup -->
        <div id="AssignmentsDetails" class="modal" >
            <div class="modal-content" style="width: 50%; height: 80%; overflow: auto;">

                <div class="modal-body">
                    <!-- Start Form Details -->  
                    <h5 style="text-align: center;" class="w3-text-blue">Assignment- CARD DETAILS</h5>

                    <form class="w3-container w3-card-4" style="padding-top: 20px;" method="POST" enctype="multipart/form-data">
                        <!-- Start Card Name Input -->
                        <div class="row" style="padding-left:50px;" >
                          <div class="col-25">   
                              <label class="w3-text-black"><b>Title</b></label>
                          </div>
                          <div class="col-75">
                            <input class="w3-input w3-border" style="width: 320px; height: 40px;" name="SyllabusAssignmentTitle" type="text">
                          </div>
                        </div>
                        <!-- End Card Name Input -->

                        <hr style="border-top: 1px solid #bbb;">

                        <!-- Start Description Input -->
                        <div class="row" style="padding-left:50px;" >
                          <div class="col-25">     
                            <label class="w3-text-black"><b>Description</b></label>
                          </div>
                          <div class="col-75">
                              <textarea name="SyllabusAssignmentdescription" id="description" rows="4" class="w3-input w3-border" style="width: 320px; background-color: white;" placeholder="Description ..."></textarea>
                          </div>
                        </div>
                        <!-- End Description Input -->

                        <?php

                            $selectboardmember4 = " SELECT * FROM tblboard Where IsActive=1 AND Bid=$bid ";  
                            $result_selectboardmember4 = mysqli_query($con,$selectboardmember4);
                            if($result_selectboardmember4 ->num_rows!=0)
                            {  
                                $row_Remainingmember4=mysqli_fetch_array($result_selectboardmember4);
                                $btid=$row_Remainingmember4['Tid'];
                                if ($btid !=1) 
                                {
                        ?>
                                        <hr style="border-top: 1px solid #bbb;">

                                        <!-- Start Member List Input -->                                                     
                                        <div class="row" style="padding-left:50px;" >
                                            <div class="col-25">     
                                                <label class="w3-text-black"><b>Members</b></label>
                                            </div>
                                            <div class="col-75">
                                                <select  name="SyllabusAssignmentMember" style="width:320px; height: 45px;">
                                                        <option value="0" disabled selected>--Select--</option>
                                                <?php        
                                                    $Remainingmember4 = "SELECT * FROM tbluser Where IsActive=1 AND Uid IN (SELECT Uid FROM tblteammember Where Bid=$bid)";  
                                                    $result_Remainingmember4  = mysqli_query($con,$Remainingmember4 );
                                                    if($result_Remainingmember4 ->num_rows!=0)
                                                    {  
                                                        while($row_Remainingmember4 =$result_Remainingmember4->fetch_array())  
                                                        {
                                                            $member4=$row_Remainingmember4['Uid'];
                                                            $fname4=$row_Remainingmember4['Fname'];
                                                            $lname4=$row_Remainingmember4['Lname'];
                                                ?>

                                                            <option value="<?php echo $member4;?>"><?php echo $fname4." ".$lname4;?></option>
                                                <?php
                                                        }
                                                    }
                                                ?>
                                                </select>

                                            </div>
                                        </div>
                                        <!-- End Member List Input --> 
                        <?php 
                                }
                            }
                        ?>
                        
                        <hr style="border-top: 1px solid #bbb;">

                        <!-- Start Label Input --> 
                        <div class="row" style="padding-left:50px;" >
                          <div class="col-25">     
                            <label class="w3-text-black"><b>Label Name</b></label>
                          </div>
                          <div class="col-75" >
                            <input class="w3-input w3-border" placeholder="Enter label name" name="SyllabusAssignmentlabel" type="text" style="width: 320px; height: 40px;">                                                
                          </div>
                        </div>
                        <!-- End Label Input -->

                        <hr style="border-top: 1px solid #bbb;">

                        <!-- Start Label color Input --> 
                        <div class="row" style="padding-left:50px;" >
                            <div class="col-25">     
                                <label class="w3-text-black"><b>Label Color</b></label>
                            </div>
                            <div class="col-75" style="background-color: white;">
                                <input type="color" name="SyllabusAssignmentlabelcolor" style="width: 320px; height: 40px;">                      
                            </div>
                        </div>
                        <!-- End Label color Input -->


                        <hr style="border-top: 1px solid #bbb;">

                        <!-- Start Due Date Input --> 
                        <div class="row" style="padding-left:50px;" >
                          <div class="col-25">     
                            <label class="w3-text-black"><b>Due Date</b></label>
                          </div>
                          <div class="col-75">
                            <input type="date" id="birthdaytime" name="SyllabusAssignmentduedate" style="width:320px; height: 45px;" class="w3-input w3-border">
                          </div>
                        </div>
                        <!-- End Due Date Input --> 

                        <hr style="border-top: 1px solid #bbb;">

                        <!-- Start Button Input -->  
                        <div>
                            <center>
                                <button type="submit" class="btn btn-success" name="SyllabusAssignmentList" style="width:150px;">Save</button>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <a href="#" class="btn btn-danger" onclick="AssignmentsCloseForm()" style="background-color: red; width:150px;" >Cancel</a>
                                <p></p>
                            </center>
                        </div>
                        <!-- End Button Input -->
                  
                    </form>
                  <!--End Form Details -->
                </div> 

            </div>
        </div>
    <!-- start Assignments details popup -->

</head>

<body class="layout-default trello">

    <div class="preloader"></div>

<!------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->

    <!--start whole page-->
    <?php
        if ($bid==0) 
        {
    ?>
            <div class="mdk-header-layout js-mdk-header-layout" style="background-image: url(images/backgrounddefault.jpg); background-repeat: repeat;">
    <?php  
        }
        else
        {
            $backeducation = "SELECT * FROM tblboard Where Bid=$bid AND IsActive=1";  
            $result_backeducation = mysqli_query($con,$backeducation);
            if($result_backeducation->num_rows!=0)
            {  
                while($row_backeducation=$result_backeducation->fetch_array())  
                {
                    $educationbackground=$row_backeducation['Background'];

                    if($educationbackground=="" || !file_exists("$educationbackground"))
                    {
                        $educationbackground="images/backgrounddefault.jpg";
                    }      

    ?>
                        <div class="mdk-header-layout js-mdk-header-layout" style="background-image: url(<?php echo $educationbackground; ?>); background-repeat: repeat;">
    <?php
                }
            }
        }
    ?>
    
<!---------------------------------------------------------------------------------------------------------------------------------------
                                            Start Header Easework
---------------------------------------------------------------------------------------------------------------------------------------->
       
       <!-- Header -->
            <?php include_once('header1.php'); ?>
        <!--END Header -->

<!---------------------------------------------------------------------------------------------------------------------------------------
                                            End Header Easework
---------------------------------------------------------------------------------------------------------------------------------------->


    <?php
        if ($bid==0) 
        {
    ?>

<!---------------------------------------------------------------------------------------------------------------------------------------
                                            If Board Id is 0  
---------------------------------------------------------------------------------------------------------------------------------------->
       
            <!-- Start container of Board id is 0 from second header -->
            <div class="mdk-header-layout__content" style="overflow-y: auto;">
                
                <!-- start second header content -->
                <div class="w3-bar" style="background: rgba(120,120,120,0.4); ">
                    <p></p>
                    <div style="float: left; margin-left: 20px; margin-bottom: 10px;">
                        <center>
                            <h5 style="color: white;">Class Management</h5>
                            <small style="color: white;"><strong>Team Name</strong></small>
                        </center>
                    </div>

                    <div class="w3-dropdown-click w3-right" style="float: right;">
                        <button class="w3-button " onclick="myFunction()">Show Menu <i class="fa fa-caret-down"></i></button>
                            <div id="demo" class="w3-dropdown-content w3-bar-block w3-card" style="right: 0; width: 400px; height: 450px; border-color: black; background-color: black; border-radius: 2px;">
                                <center><div class="modal-content" style= " margin: 10px; overflow-y: auto; border-radius: 2px; height: 430px;">
                                    
                                    <div>
                                        <label style="float: left;"> Description about board</label>
                                        <button class="w3-button w3-black w3-round" style="width: 130px; font-size: 12px; float: right;" onclick="desopen()">Add</button>
                                        <br><br><br>
                                        <textarea name="description" id="description" rows="7" style="width: 320px; background-color: white; " disabled="">
                                        </textarea>
                                    </div>
                                    <hr style="border-top: 1px solid #bbb;"><br>
                                    <div>
                                        <a href="#" class="w3-button w3-black w3-round" style="width: 100%; font-size: 12px;" >Members Details</a>
                                    </div>
                                    <hr style="border-top: 1px solid #bbb;">
                                    <div>
                                        <label style="float: left;">Wanna Close Board ?</label><br><br>
                                    </div>
                                    <!--START VIEW DATABASE FOR COMPLETE AND DELETE BUTTON AT THE TOP OF THE PAGE (SHOW MENU) -->
                                                <div>
                                                    <form method="POST" enctype="multipart/form-data" action="" class="form-container">
                                                        <button type="submit" name="completebutton" class="w3-button w3-black w3-round" style="float: left; width: 140px;">Complete Board</button>
                                                        <button type="button" name="deletebutton" class="w3-button w3-black w3-round" style="float: right; margin-right: 270px; width: 140px;" onclick="deleteopen()">Delete Board</button>
                                                    <!-- Start card details popup fuction-->
                                                    </form>
                                                </div>
                                    <!--END VIEW DATABASE FOR COMPLETE AND DELETE BUTTON AT THE TOP OF THE PAGE (SHOW MENU) -->

                                </div></center>
                            </div>
                    </div>

                    &nbsp;

                    <div class="dropdown w3-right">
                        <div class="w3-dropdown-click w3-right">
                            <select class="w3-button " id="country" name="country" style="height: 35px; width: 110px;">
                                <option value="visibility" selected disabled >Visibility</option>
                                <option value="todo" >Private</option>
                                <option value="doing">Team</option>
                            </select>
                        </div>
                    </div>

                    <div class="dropdown w3-right">
                        <div class="w3-dropdown-click w3-right">
                            <select class="w3-button " id="country" name="country" style="height: 35px; width: 140px;">
                                <option value="visibility" selected disabled >Members List</option>
                                <option value="todo" disabled >Member1</option>
                                <option value="doing"disabled>Member2</option>
                                <option value="todo" disabled>Member3</option>
                                <option value="todo" disabled>Member4</option>
                                <option value="todo" disabled>Member5</option>
                            </select>
                        </div>
                    </div>
                                  
                    <a href="#" class="w3-bar-item w3-button w3-right" style="color: black;">Calendar</a>
                    <a href="#" class="w3-bar-item w3-button w3-right" style="color: black;">Gantt</a>
                    <a href="#" class="w3-bar-item w3-button w3-right" style="color: black;">Report</a>  
                </div>
                <!-- End second Header Content -->

                <!-- start trello container after second header  -->
                <div class="trello-container">
                    <div class="trello-board container-fluid page__container mt-5" >

                        <!-- Start Syllabus remaining list-->
                        <div class="trello-board__tasks" data-toggle="dragula" data-dragula-containers='["#trello-tasks-1", "#trello-tasks-2", "#trello-tasks-3","#trello-tasks-4"]'>
                            <div class="card bg-light border">

                                <!-- Start list name-->
                                <div class="card-header card-header-sm bg-white">
                                    <h4 class="card-header__title">Syllabus remaining</h4>
                                </div>
                                <!-- End list name-->

                                <!-- Start Syllabus remaining card Section-->
                                <div class="card-body p-2">
                                    <div class="trello-board__tasks-list card-list" id="trello-tasks-1" >

                                        <!-- Start Syllabus remaining card 1-->
                                        <div class="trello-board__tasks-item card shadow-none border" data-toggle="modal" data-target="#exampleModal">
                                            <div class="p-3">
                                                <p class="m-0 d-flex align-items-center">
                                                    <strong>Chapter-4</strong> 
                                                    <span class="badge badge-success ml-auto">Label</span>                                               
                                                </p>
                                                <br>
                                                <p class="d-flex align-items-center mb-2">
                                                    <i class="material-icons icon-16pt mr-2 text-muted">folder_open</i>
                                                    <span class="text-muted mr-3">Due-Date</span>
                                                </p>

                                                <div class="media align-items-center" style="float: right;">
                                                    <div class=" mr-2 avatar-group" >

                                                        <div class="avatar avatar-xs" data-toggle="tooltip" data-placement="top" title="Janell D.">
                                                            <img src="assets/images/256_rsz_1andy-lee-642320-unsplash.jpg" alt="Avatar" class="avatar-img rounded-circle">
                                                        </div>

                                                        <div class="avatar avatar-xs" data-toggle="tooltip" data-placement="top" title="Janell D.">
                                                            <img src="assets/images/256_luke-porter-261779-unsplash.jpg" alt="Avatar" class="avatar-img rounded-circle">
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Syllabus remaining card 1-->
                                    
                                    </div>
                                    <button class="btn btn-light btn-block mt-2">Add Card</button>
                                </div>
                                <!-- End Syllabus remaining card Section-->

                            </div>
                        </div>
                        <!-- End Syllabus remaining list-->

                        <!-- Start Syllabus to be covered today list-->
                        <div class="trello-board__tasks">
                            <div class="card bg-light border">

                                <!-- Start list name-->
                                <div class="card-header card-header-sm bg-white">
                                    <h4 class="card-header__title">Syllabus to be covered today</h4>
                                </div>
                                <!-- End list name-->

                                <!-- Start Syllabus to be covered today card Section-->
                                <div class="card-body p-2">
                                    <div class="trello-board__tasks-list card-list" id="trello-tasks-2">

                                        <!-- Start Syllabus to be covered today card 1-->
                                        <div class="trello-board__tasks-item card shadow-none border" data-toggle="modal" data-target="#exampleModal" >
                                            <div class="p-3">
                                                <p class="m-0 d-flex align-items-center">
                                                    <strong>Chapter-3</strong> 
                                                    <span class="badge badge-success ml-auto">Label</span>                                               
                                                </p>
                                                <br>
                                                <p class="d-flex align-items-center mb-2">
                                                    <i class="material-icons icon-16pt mr-2 text-muted">folder_open</i>
                                                    <span class="text-muted mr-3">Due-Date</span>
                                                </p>

                                                <div class="media align-items-center" style="float: right;">
                                                    <div class=" mr-2 avatar-group" >

                                                        <div class="avatar avatar-xs" data-toggle="tooltip" data-placement="top" title="Janell D.">
                                                            <img src="assets/images/256_rsz_1andy-lee-642320-unsplash.jpg" alt="Avatar" class="avatar-img rounded-circle">
                                                        </div>

                                                        <div class="avatar avatar-xs" data-toggle="tooltip" data-placement="top" title="Janell D.">
                                                            <img src="assets/images/256_luke-porter-261779-unsplash.jpg" alt="Avatar" class="avatar-img rounded-circle">
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Syllabus to be covered today card 1-->
                                        
                                    </div>
                                    <button class="btn btn-light btn-block mt-2">Add Card</button>
                                </div>
                                <!-- End Syllabus to be covered today card Section-->

                            </div>
                        </div>
                        <!-- End Syllabus to be covered today list-->
                        
                        <!-- Start Syllabus Covered list-->
                        <div class="trello-board__tasks">
                            <div class="card bg-light border">

                                <!-- Start list name-->
                                <div class="card-header card-header-sm bg-white">
                                    <h4 class="card-header__title">Syllabus Covered</h4>
                                </div>
                                <!-- End list name-->

                                <!-- Start Syllabus Covered card Section-->
                                <div class="card-body p-2">
                                    <div class="trello-board__tasks-list card-list" id="trello-tasks-3">

                                        <!-- Start Syllabus Covered card 1-->
                                        <div class="trello-board__tasks-item card shadow-none border" data-toggle="modal" data-target="#exampleModal" >
                                            <div class="p-3">
                                                <p class="m-0 d-flex align-items-center">
                                                    <strong>Chapter-1</strong> 
                                                    <span class="badge badge-success ml-auto">Label</span>                                               
                                                </p>
                                                <br>
                                                <p class="d-flex align-items-center mb-2">
                                                    <i class="material-icons icon-16pt mr-2 text-muted">folder_open</i>
                                                    <span class="text-muted mr-3">Due-Date</span>
                                                </p>

                                                <div class="media align-items-center" style="float: right;">
                                                    <div class=" mr-2 avatar-group" >

                                                        <div class="avatar avatar-xs" data-toggle="tooltip" data-placement="top" title="Janell D.">
                                                            <img src="assets/images/256_rsz_1andy-lee-642320-unsplash.jpg" alt="Avatar" class="avatar-img rounded-circle">
                                                        </div>

                                                        <div class="avatar avatar-xs" data-toggle="tooltip" data-placement="top" title="Janell D.">
                                                            <img src="assets/images/256_luke-porter-261779-unsplash.jpg" alt="Avatar" class="avatar-img rounded-circle">
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Syllabus Covered card 1-->

                                    </div>
                                    <button class="btn btn-light btn-block mt-2">Add Card</button>
                                </div>
                                <!-- End Syllabus Covered card Section-->
                            
                            </div>
                        </div>
                        <!-- End Syllabus Covered list-->

                        <!-- Start Assignments list-->
                        <div class="trello-board__tasks">
                            <div class="card bg-light border">

                                <!-- Start list name-->
                                <div class="card-header card-header-sm bg-white">
                                    <h4 class="card-header__title">Assignments</h4>
                                </div>
                                <!-- End list name-->

                                <!-- Start Assignments card Section-->
                                <div class="card-body p-2">
                                    <div class="trello-board__tasks-list card-list" id="trello-tasks-4">

                                        <!-- Start Assignments card 1-->
                                        <div class="trello-board__tasks-item card shadow-none border" data-toggle="modal" data-target="#exampleModal" >
                                            <div class="p-3">
                                                <p class="m-0 d-flex align-items-center">
                                                    <strong>Chapter-1:Assign 1</strong> 
                                                    <span class="badge badge-success ml-auto">Label</span>                                               
                                                </p>
                                                <br>
                                                <p class="d-flex align-items-center mb-2">
                                                    <i class="material-icons icon-16pt mr-2 text-muted">folder_open</i>
                                                    <span class="text-muted mr-3">Due-Date</span>
                                                </p>

                                                <div class="media align-items-center" style="float: right;">
                                                    <div class=" mr-2 avatar-group" >

                                                        <div class="avatar avatar-xs" data-toggle="tooltip" data-placement="top" title="Janell D.">
                                                            <img src="assets/images/256_rsz_1andy-lee-642320-unsplash.jpg" alt="Avatar" class="avatar-img rounded-circle">
                                                        </div>

                                                        <div class="avatar avatar-xs" data-toggle="tooltip" data-placement="top" title="Janell D.">
                                                            <img src="assets/images/256_luke-porter-261779-unsplash.jpg" alt="Avatar" class="avatar-img rounded-circle">
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Assignments card 1-->

                                    </div>
                                    <button class="btn btn-light btn-block mt-2">Add Card</button>
                                </div>
                                <!-- End Assignments card Section-->
                            
                            </div>
                        </div>
                        <!-- End Assignments list-->

                    </div>
                </div>
                <!-- // END trello container after second header -->

            </div>
            <!-- end container of Board id is 0 from second header -->

    <?php
        }
        else
        {
    ?>

<!---------------------------------------------------------------------------------------------------------------------------------------
                                            If Board Id is not 0 
---------------------------------------------------------------------------------------------------------------------------------------->

             <!-- Start Board id is not 0 from second header -->
            <div class="mdk-header-layout__content" style="overflow-y: auto;">

                <!-- Start DATABASE IN SECOND HEADER -->
                <?php
                    $education_boarddata = "SELECT * FROM tblboard, tblteam Where Bid=$bid AND tblboard.Tid=tblteam.Tid AND tblboard.IsActive=1";  
                    $result_education_boarddata = mysqli_query($con,$education_boarddata);
                    if($result_education_boarddata->num_rows!=0)
                    {  
                        while($row_education_boarddata=$result_education_boarddata->fetch_array())  
                        {
                            $boardid=$row_education_boarddata['Bid'];
                            $btitle=$row_education_boarddata['Btitle'];  
                            $btid=$row_education_boarddata['Tid'];
                            $isactive=$row_education_boarddata['IsActive'];
                            $tname=$row_education_boarddata['Tname'];
                            $bdescription=$row_education_boarddata['BoardDescription'];
                            $bvisibilty=$row_education_boarddata['Visibility']; 

                ?>
                    
                    <!-- start second header content -->
                    <div class="w3-bar" style="background: rgba(120,120,120,0.4); ">
                        <p></p>
                        <div style="float: left; margin-left: 20px; margin-bottom: 10px;">
                            <center>
                                <h5 style="color: white;"><?php echo $btitle; ?></h5>
                                <small style="color: white;">
                                    <a href="Team_boards.php?Tid=<?php echo $btid;?>">
                                        <strong><?php echo $tname; ?></strong>
                                    </a>
                                </small>
                            </center>
                        </div>

                        <div class="w3-dropdown-click w3-right" style="float: right;">
                            <button class="w3-button " onclick="myEducationFunction()">Show Menu <i class="fa fa-caret-down"></i></button>
                                <div id="demo" class="w3-dropdown-content w3-bar-block w3-card" style="right: 0; width: 400px; height: 450px; border-color: black; background-color: black; border-radius: 2px;">
                                    <center><div class="modal-content" style= " margin: 10px; overflow-y: auto; border-radius: 2px; height: 430px;">
                                        
                                        <div>
                                            <label style="float: left;"> Description about board</label>
                                            <button class="w3-button w3-black w3-round" style="width: 130px; font-size: 12px; float: right;" onclick="desEducationopen()">Add</button>
                                            <br><br><br>
                                            <textarea name="description" id="description" rows="7" style="width: 320px; background-color: white; " disabled=""><?php echo $bdescription; ?></textarea>

                                            <!-- Start card details popup fuction-->
                                            <script>
                                                function desEducationopen() {
                                                  document.getElementById("Educationdescription").style.display = "flex";
                                                }
                                                function desEducationclose() {
                                                  document.getElementById("Educationdescription").style.display = "none";
                                                }
                                            </script>
                                            <!-- End card details popup fuction-->
                                        </div>

                                <?php
                                    if ($btid !=1) 
                                    {
                                ?>
                                        <hr style="border-top: 1px solid #bbb;"><br>
                                        <div>
                                            <a href="Team_members.php?Tid=<?php echo $btid;?>" class="w3-button w3-black w3-round" style="width: 100%; font-size: 12px;" >Members Details</a>
                                        </div>
                                <?php
                                    }
                                ?>
                                        <hr style="border-top: 1px solid #bbb;">
                                        <div>
                                            <label style="float: left;">Wanna Close Board ?</label><br><br>
                                        </div>
                                        <!--START VIEW DATABASE FOR COMPLETE AND DELETE BUTTON AT THE TOP OF THE PAGE (SHOW MENU) -->
                                                    <div>
                                                        <form method="POST" enctype="multipart/form-data" action="" class="form-container">
                                                            <button type="submit" name="educationcompletebutton" class="w3-button w3-black w3-round" style="float: left; width: 140px;">Complete Board</button>
                                                            <button type="button" name="educationdeletebutton" class="w3-button w3-black w3-round" style="float: right; margin-right: 270px; width: 140px;" onclick="Educationdeleteopen()">Delete Board</button>
                                                        <!-- Start card details popup fuction-->
                                                        <script>
                                                            function Educationdeleteopen() {
                                                              document.getElementById("Educationdeleteboard").style.display = "flex";
                                                            }
                                                            function Educationdeleteclose() {
                                                              document.getElementById("Educationdeleteboard").style.display = "none";
                                                            }
                                                        </script>
                                                        <!-- End card details popup fuction-->
                                                        </form>
                                                    </div>
                                        <!--END VIEW DATABASE FOR COMPLETE AND DELETE BUTTON AT THE TOP OF THE PAGE (SHOW MENU) -->

                                    </div></center>
                                </div>
                        </div>

                        &nbsp;

                        <div class="dropdown w3-right">
                            <div class="w3-dropdown-click w3-right">
                                <select class="w3-button " id="country" name="country" style="height: 35px; width: 110px;">
                                <?php
                                    if ($bvisibilty="Private") 
                                    {
                                ?>
                                        <option value="Private" selected disabled >Private</option>
                                        <option value="Team" >Team</option>
                                        <option value="Public">Public</option>
                                <?php   
                                    }
                                    else if ($bvisibilty="Team") 
                                    {
                                ?>
                                        <option value="Team" selected disabled >Team</option>
                                        <option value="Private" >Private</option>
                                        <option value="Public">Public</option>
                                <?php
                                    }
                                    else if ($bvisibilty="Public") 
                                    {
                                ?>
                                        <option value="Public" selected disabled >Public</option>
                                        <option value="Private" >Private</option>
                                        <option value="Team">Team</option>
                                <?php
                                    }
                                    else
                                    {
                                ?>      
                                        <option value="Visibility" selected disabled >Visibility</option>
                                        <option value="Private" >Private</option>
                                        <option value="Team">Team</option>
                                        <option value="Public">Public</option>
                                <?php
                                    }
                                ?>
                                </select>
                            </div>
                        </div>

                        <?php
                            if ($btid !=1) 
                            {
                        ?>
                                <div class="dropdown w3-right">
                                    <div class="w3-dropdown-click w3-right">
                                        <select class="w3-button " id="country" name="country" style="height: 35px; width: 140px;">
                                            <option value="Members" selected disabled >Members List</option>
                                            <?php        
                                                $educationmember = "SELECT * FROM tbluser Where IsActive=1 AND Uid IN (SELECT Uid FROM tblteammember Where Bid=$bid)";  
                                                $result_educationmember = mysqli_query($con,$educationmember);
                                                if($result_educationmember->num_rows!=0)
                                                {  
                                                    while($row_educationmember=$result_educationmember->fetch_array())  
                                                    {
                                                        $member=$row_educationmember['Uid'];
                                                        $fname=$row_educationmember['Fname'];
                                                        $lname=$row_educationmember['Lname'];
                                            ?>
                                                        <option value="<?php echo $member;?>" disabled ><?php echo $fname." ".$lname;?></option>
                                            <?php
                                                    }
                                                }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                        <?php
                            }
                        ?>
                                      
                        <a href="Calendar.php" class="w3-bar-item w3-button w3-right" style="color: black;">Calendar</a>
                        <a href="#" class="w3-bar-item w3-button w3-right" style="color: black;">Gantt</a>
                        <a href="report.php?Bid=<?php echo $bid; ?>" class="w3-bar-item w3-button w3-right" 
                        style="color: black;">Report</a>  
                        <!-- <a href="#" class="w3-bar-item w3-button w3-right" style="color: black;">Report</a>   -->
                    </div>
                    <!-- End second Header Content -->

                <?php 
                        }
                    }
                ?>
                <!-- End DATABASE IN SECOND HEADER -->

                <!-- start trello container after second header  -->
                <div class="trello-container">
                    <div class="trello-board container-fluid page__container mt-5" >

                        <!-- Start Syllabus remaining list-->
                        <div class="trello-board__tasks">
                            <div class="card bg-light border">

                                <!-- Start list name-->
                                <div class="card-header card-header-sm bg-white">
                                    <h4 class="card-header__title">Syllabus remaining</h4>
                                </div>
                                <!-- End list name-->

                                <!-- Start Syllabus remaining card Section-->
                                <div class="card-body p-2">
                                    <div class="trello-board__tasks-list card-list" id="trello-tasks-1" >

                                    <?php
                                        $selectremainquery = "SELECT * FROM tblcard Where Listid=4 AND Bid='$bid'";  
                                        $result_remain = mysqli_query($con,$selectremainquery);
                                        if($result_remain->num_rows!=0)
                                        {  
                                            while($row_remain=$result_remain->fetch_array())  
                                            {
                                                $cardname=$row_remain['CardName'];
                                                $cardlabel=$row_remain['Label'];  
                                                $cardlabelcolor=$row_remain['LabelColor'];
                                                $cardduedate=$row_remain['DueDate']; 
                                                $cardid=$row_remain['Cardid'];  
                                    ?>

                                                <!-- Start Syllabus remaining card 1-->
                                            <div class="trello-board__tasks-item card shadow-none border" data-toggle="modal" data-target="#exampleModal" onclick="location.href='cards.php?Cardid=<?php echo $cardid;?>&Bid=<?php echo $bid;?>';">
                                                    <div class="p-3">
                                                        <p class="m-0 d-flex align-items-center">
                                                            <strong><?php echo $cardname;?></strong>
                                                            <?php 
                                                                if ($cardlabel!="") 
                                                                {
                                                            ?> 
                                                                    <span class="badge badge-success ml-auto" style="font-size: 12px; margin-right: 20px; height:25px; background-color: <?php echo $cardlabelcolor;?>">
                                                                        <?php echo $cardlabel;?>
                                                                    </span>   
                                                            <?php
                                                                }
                                                            ?>                                            
                                                        </p>
                                                        <br>
                                                        <p class="d-flex align-items-center mb-2">
                                                            <i class="material-icons icon-16pt mr-2 text-muted">folder_open</i>
                                                            <span class="text-muted mr-3"><?php echo $cardduedate;?></span>
                                                        </p>

                                                        <?php
                                                            $selectrmem = "SELECT * FROM tbluser WHERE Uid IN (SELECT Uid from tblmembercard WHERE Cardid='$cardid')";  
                                                            $result_rmem = mysqli_query($con,$selectrmem);
                                                            if($result_rmem->num_rows!=0)
                                                            {  
                                                                $row_Rmember=mysqli_fetch_array($result_rmem);
                                                                $ufname=$row_Rmember['Fname'];
                                                                $ulname=$row_Rmember['Lname'];
                                                                $upropic=$row_Rmember['ProfilePic'];

                                                                if($upropic=="" || !file_exists("images/profile/$upropic"))
                                                                {
                                                                    $upropic="No.png";
                                                                }
                                                               
                                                        ?>

                                                                    <div class="media align-items-center" style="float: right;">
                                                                        <div class=" mr-2 avatar-group" >
                                                                            <div class="avatar avatar-xs" data-toggle="tooltip" data-placement="top" title="<?php echo $ufname." ".$ulname;?>">
                                                                                <img src="images/profile/<?php echo $upropic; ?>" alt="Avatar" class="avatar-img rounded-circle">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                        <?php 
                                                            }
                                                        ?>

                                                    </div>
                                                </div>
                                                <!-- End Syllabus remaining card 1-->
                                    <?php
                                            }
                                        }
                                    ?>
                                    
                                    </div>
                                    <a href="#" class="btn btn-light btn-block mt-2" onclick="SyllabusRemainingOpenForm()">Add Card</a>
                                    <!-- Start Syllabus Remaining popup fuction-->
                                    <script>
                                        function SyllabusRemainingOpenForm() {
                                          document.getElementById("SyllabusRemainingDetails").style.display = "flex";
                                        }
                                        function SyllabusRemainingCloseForm() {
                                          document.getElementById("SyllabusRemainingDetails").style.display = "none";
                                        }
                                    </script>
                                    <!-- End Syllabus Remaining popup fuction-->

                                </div>
                                <!-- End Syllabus remaining card Section-->

                            </div>
                        </div>
                        <!-- End Syllabus remaining list-->

                        <!-- Start Syllabus to be covered today list-->
                        <div class="trello-board__tasks">
                            <div class="card bg-light border">

                                <!-- Start list name-->
                                <div class="card-header card-header-sm bg-white">
                                    <h4 class="card-header__title">Syllabus to be covered today</h4>
                                </div>
                                <!-- End list name-->

                                <!-- Start Syllabus to be covered today card Section-->
                                <div class="card-body p-2">
                                    <div class="trello-board__tasks-list card-list" id="trello-tasks-2">

                                    <?php
                                        $selecttodayquery = "SELECT * FROM tblcard Where Listid=5 AND Bid='$bid'";  
                                        $result_today = mysqli_query($con,$selecttodayquery);
                                        if($result_today->num_rows!=0)
                                        {  
                                            while($row_today=$result_today->fetch_array())  
                                            {
                                                $cardname=$row_today['CardName'];
                                                $cardlabel=$row_today['Label'];  
                                                $cardlabelcolor=$row_today['LabelColor'];
                                                $cardduedate=$row_today['DueDate']; 
                                                $cardid=$row_today['Cardid'];  
                                    ?>


                                        <!-- Start Syllabus to be covered today card 1-->
                                        <div class="trello-board__tasks-item card shadow-none border" data-toggle="modal" data-target="#exampleModal" onclick="location.href='cards.php?Cardid=<?php echo $cardid;?>&Bid=<?php echo $bid;?>';">
                                                    <div class="p-3">
                                                        <p class="m-0 d-flex align-items-center">
                                                            <strong><?php echo $cardname;?></strong> 
                                                            <?php 
                                                                if ($cardlabel!="") 
                                                                {
                                                            ?> 
                                                                    <span class="badge badge-success ml-auto" style="font-size: 12px; margin-right: 20px; height:25px; background-color: <?php echo $cardlabelcolor;?>">
                                                                        <?php echo $cardlabel;?>
                                                                    </span>   
                                                            <?php
                                                                }
                                                            ?>                                             
                                                        </p>
                                                        <br>
                                                        <p class="d-flex align-items-center mb-2">
                                                            <i class="material-icons icon-16pt mr-2 text-muted">folder_open</i>
                                                            <span class="text-muted mr-3"><?php echo $cardduedate;?></span>
                                                        </p>

                                                       <?php
                                                            $selecttomem = "SELECT * FROM tbluser WHERE Uid IN (SELECT Uid from tblmembercard WHERE Cardid='$cardid')";  
                                                            $result_tomem = mysqli_query($con,$selecttomem);
                                                            if($result_tomem->num_rows!=0)
                                                            {  
                                                                $row_tomember=mysqli_fetch_array($result_tomem);
                                                                $tofname=$row_tomember['Fname'];
                                                                $tolname=$row_tomember['Lname'];
                                                                $topropic=$row_tomember['ProfilePic'];

                                                                if($topropic=="" || !file_exists("images/profile/$topropic"))
                                                                {
                                                                    $topropic="No.png";
                                                                }
                                                               
                                                        ?>

                                                                    <div class="media align-items-center" style="float: right;">
                                                                        <div class=" mr-2 avatar-group" >
                                                                            <div class="avatar avatar-xs" data-toggle="tooltip" data-placement="top" title="<?php echo $tofname." ".$tolname;?>">
                                                                                <img src="images/profile/<?php echo $topropic; ?>" alt="Avatar" class="avatar-img rounded-circle">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                        <?php 
                                                            }
                                                        ?>

                                                    </div>
                                                </div>
                                        <!-- End Syllabus to be covered today card 1-->

                                    <?php
                                            }
                                        }
                                    ?>
                                        
                                    </div>
                                    <a href="#" class="btn btn-light btn-block mt-2" onclick="SyllabusTodayOpenForm()">Add Card</a>

                                    <!-- Start Syllabus to be covered popup fuction-->
                                    <script>
                                        function SyllabusTodayOpenForm() {
                                          document.getElementById("SyllabusTodayDetails").style.display = "flex";
                                        }
                                        function SyllabusTodayCloseForm() {
                                          document.getElementById("SyllabusTodayDetails").style.display = "none";
                                        }
                                    </script>
                                    <!-- End Syllabus to be covered fuction-->

                                </div>
                                <!-- End Syllabus to be covered today card Section-->

                            </div>
                        </div>
                        <!-- End Syllabus to be covered today list-->
                        
                        <!-- Start Syllabus Covered list-->
                        <div class="trello-board__tasks">
                            <div class="card bg-light border">

                                <!-- Start list name-->
                                <div class="card-header card-header-sm bg-white">
                                    <h4 class="card-header__title">Syllabus Covered</h4>
                                </div>
                                <!-- End list name-->

                                <!-- Start Syllabus Covered card Section-->
                                <div class="card-body p-2">
                                    <div class="trello-board__tasks-list card-list" id="trello-tasks-3">
                                    <?php
                                        $selectcoveredquery = "SELECT * FROM tblcard Where Listid=6 AND Bid='$bid'";  
                                        $result_covered = mysqli_query($con,$selectcoveredquery);
                                        if($result_covered->num_rows!=0)
                                        {  
                                            while($row_covered=$result_covered->fetch_array())  
                                            {
                                                $cardname=$row_covered['CardName'];
                                                $cardlabel=$row_covered['Label'];  
                                                $cardlabelcolor=$row_covered['LabelColor'];
                                                $cardduedate=$row_covered['DueDate']; 
                                                $cardid=$row_covered['Cardid'];  
                                    ?>


                                                <!-- Start Syllabus covered card 1-->
                                                <div class="trello-board__tasks-item card shadow-none border" data-toggle="modal" data-target="#exampleModal" onclick="location.href='cards.php?Cardid=<?php echo $cardid;?>&Bid=<?php echo $bid;?>';">
                                                            <div class="p-3">
                                                                <p class="m-0 d-flex align-items-center">
                                                                    <strong><?php echo $cardname;?></strong> 
                                                                    <?php 
                                                                        if ($cardlabel!="") 
                                                                        {
                                                                    ?> 
                                                                            <span class="badge badge-success ml-auto" style="font-size: 12px; margin-right: 20px; height:25px; background-color: <?php echo $cardlabelcolor;?>">
                                                                                <?php echo $cardlabel;?>
                                                                            </span>   
                                                                    <?php
                                                                        }
                                                                    ?>                                              
                                                                </p>
                                                                <br>
                                                                <p class="d-flex align-items-center mb-2">
                                                                    <i class="material-icons icon-16pt mr-2 text-muted">folder_open</i>
                                                                    <span class="text-muted mr-3"><?php echo $cardduedate;?></span>
                                                                </p>

                                                        <?php
                                                            $selectcmem = "SELECT * FROM tbluser WHERE Uid IN (SELECT Uid from tblmembercard WHERE Cardid='$cardid')";  
                                                            $result_cmem = mysqli_query($con,$selectcmem);
                                                            if($result_cmem->num_rows!=0)
                                                            {  
                                                                $row_cmember=mysqli_fetch_array($result_cmem);
                                                                $cfname=$row_cmember['Fname'];
                                                                $clname=$row_cmember['Lname'];
                                                                $cpropic=$row_cmember['ProfilePic'];

                                                                if($cpropic=="" || !file_exists("images/profile/$cpropic"))
                                                                {
                                                                    $cpropic="No.png";
                                                                }
                                                               
                                                        ?>

                                                                    <div class="media align-items-center" style="float: right;">
                                                                        <div class=" mr-2 avatar-group" >
                                                                            <div class="avatar avatar-xs" data-toggle="tooltip" data-placement="top" title="<?php echo $cfname." ".$clname;?>">
                                                                                <img src="images/profile/<?php echo $cpropic; ?>" alt="Avatar" class="avatar-img rounded-circle">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                        <?php 
                                                            }
                                                        ?>

                                                            </div>
                                                        </div>
                                                <!-- End Syllabus covered card 1-->

                                    <?php
                                            }
                                        }
                                    ?>
                                        
                                    </div>
                                    <a href="#" class="btn btn-light btn-block mt-2" onclick="SyllabusCoveredOpenForm()">Add Card</a>

                                    <!-- Start Syllabus to be covered popup fuction-->
                                    <script>
                                        function SyllabusCoveredOpenForm() {
                                          document.getElementById("SyllabusCoveredDetails").style.display = "flex";
                                        }
                                        function SyllabusCoveredCloseForm() {
                                          document.getElementById("SyllabusCoveredDetails").style.display = "none";
                                        }
                                    </script>
                                    <!-- End Syllabus to be covered fuction-->
                                </div>
                                <!-- End Syllabus Covered card Section-->
                            
                            </div>
                        </div>
                        <!-- End Syllabus Covered list-->

                        <!-- Start Assignments list-->
                        <div class="trello-board__tasks">
                            <div class="card bg-light border">

                                <!-- Start list name-->
                                <div class="card-header card-header-sm bg-white">
                                    <h4 class="card-header__title">Assignments</h4>
                                </div>
                                <!-- End list name-->

                                <!-- Start Assignments card Section-->
                                <div class="card-body p-2">
                                    <div class="trello-board__tasks-list card-list" id="trello-tasks-4">

                                        <?php
                                        $selectAssignmentsquery = "SELECT * FROM tblcard Where Listid=7 AND Bid='$bid'";  
                                        $result_Assignments = mysqli_query($con,$selectAssignmentsquery);
                                        if($result_Assignments->num_rows!=0)
                                        {  
                                            while($row_Assignments=$result_Assignments->fetch_array())  
                                            {
                                                $cardname=$row_Assignments['CardName'];
                                                $cardlabel=$row_Assignments['Label'];  
                                                $cardlabelcolor=$row_Assignments['LabelColor'];
                                                $cardduedate=$row_Assignments['DueDate']; 
                                                $cardid=$row_Assignments['Cardid'];  
                                    ?>


                                                <!-- Start Syllabus Assignments card 1-->
                                                <div class="trello-board__tasks-item card shadow-none border" data-toggle="modal" data-target="#exampleModal" onclick="location.href='cards.php?Cardid=<?php echo $cardid;?>&Bid=<?php echo $bid;?>';">
                                                            <div class="p-3">
                                                                <p class="m-0 d-flex align-items-center">
                                                                    <strong><?php echo $cardname;?></strong> 
                                                                    <?php 
                                                                        if ($cardlabel!="") 
                                                                        {
                                                                    ?> 
                                                                            <span class="badge badge-success ml-auto" style="font-size: 12px; margin-right: 20px; height:25px; background-color: <?php echo $cardlabelcolor;?>">
                                                                                <?php echo $cardlabel;?>
                                                                            </span>   
                                                                    <?php
                                                                        }
                                                                    ?>                                               
                                                                </p>
                                                                <br>
                                                                <p class="d-flex align-items-center mb-2">
                                                                    <i class="material-icons icon-16pt mr-2 text-muted">folder_open</i>
                                                                    <span class="text-muted mr-3"><?php echo $cardduedate;?></span>
                                                                </p>

                                                        <?php
                                                            $selectassmem = "SELECT * FROM tbluser WHERE Uid IN (SELECT Uid from tblmembercard WHERE Cardid='$cardid')";  
                                                            $result_assmem = mysqli_query($con,$selectassmem);
                                                            if($result_assmem->num_rows!=0)
                                                            {  
                                                                $row_assmember=mysqli_fetch_array($result_assmem);
                                                                $assfname=$row_assmember['Fname'];
                                                                $asslname=$row_assmember['Lname'];
                                                                $asspropic=$row_assmember['ProfilePic'];

                                                                if($asspropic=="" || !file_exists("images/profile/$asspropic"))
                                                                {
                                                                    $asspropic="No.png";
                                                                }
                                                               
                                                        ?>

                                                                    <div class="media align-items-center" style="float: right;">
                                                                        <div class=" mr-2 avatar-group" >
                                                                            <div class="avatar avatar-xs" data-toggle="tooltip" data-placement="top" title="<?php echo $assfname." ".$asslname;?>">
                                                                                <img src="images/profile/<?php echo $asspropic; ?>" alt="Avatar" class="avatar-img rounded-circle">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                        <?php 
                                                            }
                                                        ?>
                                                            </div>
                                                        </div>
                                                <!-- End Syllabus Assignments card 1-->

                                    <?php
                                            }
                                        }
                                    ?>
                                        
                                    </div>
                                    <a href="#" class="btn btn-light btn-block mt-2" onclick="AssignmentsOpenForm()">Add Card</a>

                                    <!-- Start Assignments popup fuction-->
                                    <script>
                                        function AssignmentsOpenForm() {
                                          document.getElementById("AssignmentsDetails").style.display = "flex";
                                        }
                                        function AssignmentsCloseForm() {
                                          document.getElementById("AssignmentsDetails").style.display = "none";
                                        }
                                    </script>
                                    <!-- End Syllabus to be Assignments fuction-->
                                </div>
                                <!-- End Assignments card Section-->
                            
                            </div>
                        </div>
                        <!-- End Assignments list-->

                    </div>
                </div>
                <!-- // END trello container after second header -->

            </div>
            <!-- end of Board id is not 0 from second header -->

<!------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->

    <?php
        }
    ?>

    </div>
    <!-- // END whole page -->

    <!-- jQuery -->
    <?php include_once('scriptlinks.php');?>

</body>
</html>