<?php include_once("DbConnection.php");
    $bid=$_GET['Bid'];
    $uid=$_SESSION['UserID'];
    $senduser=$_SESSION['Firstname'];
    $senduser1=$_SESSION['Lastname'];
    $recentuser=$_SESSION['UserID'];

    $recent="SELECT * from tblboard where Bid=$bid";
    $Exe_recent=mysqli_query($con,$recent)or die(mysqli_error($con));
    if($Exe_recent->num_rows!=0)
    {  
        $row_recent=$Exe_recent->fetch_array();

        $rbid=$row_recent['Bid'];
        $rtid=$row_recent['Tid'];

        $selectrecent="SELECT * from tblrecent where Bid=$rbid AND Uid=$recentuser";
        $Exe_selectrecent=mysqli_query($con,$selectrecent)or die(mysqli_error($con));
        if($Exe_selectrecent->num_rows>0)
        {
            $updaterecent= "UPDATE tblrecent set Date=now() where Bid=$rbid AND Uid=$recentuser";  
            $Exe_updaterecent=mysqli_query($con,$updaterecent)or die(mysqli_error($con));
        }
        else
        {
            $recentInsert= "INSERT into tblrecent values(null,$rbid,$rtid,$recentuser,now(),1)";
            $run_recentInsert = mysqli_query($con,$recentInsert);
        }
    }

/*Start database complete board button (SHOW MENU)*/
    if (isset($_REQUEST['completebutton'])) 
    {
        $Updateisactive = "UPDATE tblboard set IsActive=0 where Bid='$bid' ";
        $Exe_updateisactive=mysqli_query($con,$Updateisactive)or die(mysqli_error($con));
        header("location:Complete.php?Uid=$uid");
    }
/*End database complete board button(SHOW MENU)*/

/*Start database add board description button(SHOW MENU)*/
    if (isset($_REQUEST['showdescriptionadd'])) 
    {
         $board_description = $_REQUEST['showmenudescription'];
         $update_board_description = "UPDATE tblboard set BoardDescription = '$board_description' where Bid='$bid' ";
         $Exe_update_board_description=mysqli_query($con,$update_board_description)or die(mysqli_error($con));
?>
        <script type="text/javascript">
                alert("Description added Successfully");
        </script>
<?php
    }
/*End database add board description button(SHOW MENU)*/   

/*Start database delete board button(SHOW MENU)*/
    if (isset($_REQUEST['deleteYes'])) 
    {
        $uid=$_SESSION['UserID'];
        $delete_board = "DELETE FROM tblboard WHERE Bid='$bid'";
        $Exe_delete_board=mysqli_query($con,$delete_board)or die(mysqli_error($con));
        $delete_board_member = "DELETE FROM tblteammember WHERE Bid='$bid'";
        $Exe_delete_board_member=mysqli_query($con,$delete_board_member)or die(mysqli_error($con));
        header("location:index.php?Uid=$uid");
    } 
/*End database delete board button(SHOW MENU)*/

/*START DATABASE INSERT DATA THROUGH ADD CARD BUTTON IN (TODO BEFORE TRIP)*/
    if (isset($_REQUEST['addtodocardtrip'])) 
    {
        if ($_REQUEST['beforetripTitle']=="") 
        {
            echo '<script type="text/javascript">alert("Card Name cannot be Empty!!!");</script>';
        }
        else
        {
            $trip_card_description= $trip_card_label =$trip_card_labelcolor =$trip_card_duedate=$trip_card_member ="";

        
            $trip_card_title = $_REQUEST['beforetripTitle'];
            $trip_card_description = $_REQUEST['beforetripdescription'];
            $trip_card_label = $_REQUEST['beforetriplabel'];
            $trip_card_labelcolor = $_REQUEST['beforetriplabelcolor'];
            $trip_card_duedate = $_REQUEST['beforetripduedate'];
            $trip_card_member = $_REQUEST['beforetripcardmember'];
            
            $trip_query="insert into tblcard values(null,'$trip_card_title','$trip_card_label','$trip_card_labelcolor','$trip_card_duedate',now(),'$trip_card_description',8,'$bid',1)";
            $run_trip = mysqli_query($con,$trip_query);
            $trip1= mysqli_insert_id($con);

            if($run_trip)
            {
                if ($trip1) 
                {
                    $query1_trip="INSERT into tblmembercard values(null,'$trip_card_member','$trip1')";
                    $run_trip1 = mysqli_query($con,$query1_trip);
                    if($run_trip1)
                    {
                        if ($trip_card_member==0) 
                        {
                           header("location:Personal_template.php?Bid=$bid");
                        }
                        else
                        {
                            $suser="SELECT tbluser.Email,tbluser.Fname,tbluser.Lname, tblboard.Btitle from tbluser,tblboard where tbluser.Uid=$trip_card_member AND tblboard.Bid=$bid" ;
                            $run_suser = mysqli_query($con,$suser);
                            if($run_suser->num_rows!=0)
                            {  
                                $row_suser=$run_suser->fetch_array();
                                
                                    $usfirst=$row_suser['Fname'];
                                    $uslast=$row_suser['Lname'];
                                    $usemail=$row_suser['Email'];
                                    $boname=$row_suser['Btitle'];

                                    $subject = "Easework";
                                    $body = "Hi, $usfirst $uslast. $senduser $senduser1 added you to a new card- $trip_card_title on Board-$boname. Please Login to Check Your Activities : http://localhost/Task-Management/login.php";
                                    $headers = "From: poojakusingh35@gmail.com";
                                    mail($usemail, $subject, $body, $headers);
                                
                                header("location:Personal_template.php?Bid=$bid");
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
/*END DATABASE INSERT DATA THROUGH ADD CARD BUTTON IN (TODO BEFORE TRIP)*/

/*START DATABASE INSERT DATA THROUGH ADD CARD BUTTON IN (HOLIDAY LIST)*/
    if (isset($_REQUEST['addholidaycard'])) 
    {
        if ($_REQUEST['holidaycardtitle']=="") 
        {
            echo '<script type="text/javascript">alert("Card Name cannot be Empty!!!");</script>';
        }
        else
        {
            $holiday_card_description= $holiday_card_label =$holiday_card_labelcolor =$holiday_card_duedate=$holiday_card_member ="";

            $holiday_card_title = $_REQUEST['holidaycardtitle'];
            $holiday_card_description = $_REQUEST['holidaycarddescription'];
            $holiday_card_label = $_REQUEST['holidaycardlabel'];
            $holiday_card_labelcolor = $_REQUEST['holidaycardlabelcolor'];
            $holiday_card_duedate = $_REQUEST['holidaycardduedate'];
            $holiday_card_member = $_REQUEST['holidaycardmember'];

            $holiday_query="insert into tblcard values(null,'$holiday_card_title','$holiday_card_label','$holiday_card_labelcolor','$holiday_card_duedate',now(),'$holiday_card_description',9,'$bid',1)";
            $run_holiday = mysqli_query($con,$holiday_query);
            $holiday1= mysqli_insert_id($con);

            if($run_holiday)
            {
                if ($holiday1) 
                {
                    $query1_holiday="INSERT into tblmembercard values(null,'$holiday_card_member','$holiday1')";
                    $run_holiday1 = mysqli_query($con,$query1_holiday);
                    if($run_holiday1)
                    {
                        if ($holiday_card_member==0) 
                        {
                           header("location:Personal_template.php?Bid=$bid");
                        }
                        else
                        {
                            $suser="SELECT tbluser.Email,tbluser.Fname,tbluser.Lname, tblboard.Btitle from tbluser,tblboard where tbluser.Uid=$holiday_card_member AND tblboard.Bid=$bid" ;
                            $run_suser = mysqli_query($con,$suser);
                            if($run_suser->num_rows!=0)
                            {  
                                $row_suser=$run_suser->fetch_array();
                                
                                    $usfirst=$row_suser['Fname'];
                                    $uslast=$row_suser['Lname'];
                                    $usemail=$row_suser['Email'];
                                    $boname=$row_suser['Btitle'];

                                    $subject = "Easework";
                                    $body = "Hi, $usfirst $uslast. $senduser $senduser1 added you to a new card- $holiday_card_title on Board-$boname. Please Login to Check Your Activities : http://localhost/Task-Management/login.php";
                                    $headers = "From: poojakusingh35@gmail.com";
                                    mail($usemail, $subject, $body, $headers);
                                
                                header("location:Personal_template.php?Bid=$bid");
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
/*END DATABASE INSERT DATA THROUGH ADD CARD BUTTON IN (DOING LIST)*/

/*START DATABASE INSERT DATA THROUGH ADD CARD BUTTON IN (DONE LIST)*/
    if (isset($_REQUEST['addeatcard'])) 
    {
        if ($_REQUEST['eatcardtitle']=="") 
        {
            echo '<script type="text/javascript">alert("Card Name cannot be Empty!!!");</script>';
        }
        else
        {
            $eat_card_description= $eat_card_label =$eat_card_labelcolor =$eat_card_duedate=$eat_card_member ="";

            $eat_card_title = $_REQUEST['eatcardtitle'];
            $eat_card_description = $_REQUEST['eatcarddescription'];
            $eat_card_label = $_REQUEST['eatcardlabel'];
            $eat_card_labelcolor = $_REQUEST['eatcardlabelcolor'];
            $eat_card_duedate = $_REQUEST['eatcardduedate'];
            $eat_card_member = $_REQUEST['eatcardmember'];

            $eat_query="insert into tblcard values(null,'$eat_card_title','$eat_card_label','$eat_card_labelcolor','$eat_card_duedate',now(),'$eat_card_description',10,'$bid',1)";
            $run_eat = mysqli_query($con,$eat_query);
            $eat1= mysqli_insert_id($con);

            if($run_eat)
            {
                if ($eat1) 
                {
                    $query1_eat="INSERT into tblmembercard values(null,'$eat_card_member','$eat1')";
                    $run_eat1 = mysqli_query($con,$query1_eat);
                    if($run_eat1)
                    {
                        if ($eat_card_member==0) 
                        {
                           header("location:Personal_template.php?Bid=$bid");
                        }
                        else
                        {
                            $suser="SELECT tbluser.Email,tbluser.Fname,tbluser.Lname, tblboard.Btitle from tbluser,tblboard where tbluser.Uid=$eat_card_member AND tblboard.Bid=$bid" ;
                            $run_suser = mysqli_query($con,$suser);
                            if($run_suser->num_rows!=0)
                            {  
                                $row_suser=$run_suser->fetch_array();
                                
                                    $usfirst=$row_suser['Fname'];
                                    $uslast=$row_suser['Lname'];
                                    $usemail=$row_suser['Email'];
                                    $boname=$row_suser['Btitle'];

                                    $subject = "Easework";
                                    $body = "Hi, $usfirst $uslast. $senduser $senduser1 added you to a new card- $eat_card_title on Board-$boname. Please Login to Check Your Activities : http://localhost/Task-Management/login.php";
                                    $headers = "From: poojakusingh35@gmail.com";
                                    mail($usemail, $subject, $body, $headers);
                                
                                header("location:Personal_template.php?Bid=$bid");
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
/*END DATABASE INSERT DATA THROUGH ADD CARD BUTTON IN (DONE LIST)*/


/*START DATABASE INSERT DATA THROUGH ADD CARD BUTTON IN (PERSONAL DONE LIST)*/
    if (isset($_REQUEST['addpersonaldonecard'])) 
    {
        if ($_REQUEST['personalcardtitle']=="") 
        {
            echo '<script type="text/javascript">alert("Card Name cannot be Empty!!!");</script>';
        }
        else
        {
            $personal_card_description= $personal_card_label =$personal_card_labelcolor =$personal_card_duedate=$personal_card_member="";

            $personal_card_title = $_REQUEST['personalcardtitle'];
            $personal_card_description = $_REQUEST['personalcarddescription'];
            $personal_card_label = $_REQUEST['personalcardlabel'];
            $personal_card_labelcolor = $_REQUEST['personalcardlabelcolor'];
            $personal_card_duedate = $_REQUEST['personalcardduedate'];
            $personal_card_member = $_REQUEST['personaldonecardmember'];

            $done_query="insert into tblcard values(null,'$personal_card_title','$personal_card_label','$personal_card_labelcolor','$personal_card_duedate',now(),'$personal_card_description',11,'$bid',1)";
            $run_done = mysqli_query($con,$done_query);
            $done1= mysqli_insert_id($con);

            if($run_done)
            {
                if ($done1) 
                {
                    $query1_done="INSERT into tblmembercard values(null,'$personal_card_member','$done1')";
                    $run_done1 = mysqli_query($con,$query1_done);
                    if($run_done1)
                    {
                        if ($personal_card_member==0) 
                        {
                           header("location:Personal_template.php?Bid=$bid");
                        }
                        else
                        {
                            $suser="SELECT tbluser.Email,tbluser.Fname,tbluser.Lname, tblboard.Btitle from tbluser,tblboard where tbluser.Uid=$personal_card_member AND tblboard.Bid=$bid" ;
                            $run_suser = mysqli_query($con,$suser);
                            if($run_suser->num_rows!=0)
                            {  
                                $row_suser=$run_suser->fetch_array();
                                
                                    $usfirst=$row_suser['Fname'];
                                    $uslast=$row_suser['Lname'];
                                    $usemail=$row_suser['Email'];
                                    $boname=$row_suser['Btitle'];

                                    $subject = "Easework";
                                    $body = "Hi, $usfirst $uslast. $senduser $senduser1 added you to a new card- $personal_card_title on Board-$boname. Please Login to Check Your Activities : http://localhost/Task-Management/login.php";
                                    $headers = "From: poojakusingh35@gmail.com";
                                    mail($usemail, $subject, $body, $headers);
                                
                                header("location:Personal_template.php?Bid=$bid");
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
/*END DATABASE INSERT DATA THROUGH ADD CARD BUTTON IN (PERSONAL DONE LIST)*/
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <title>Easework- Personal Template</title>
    <?php include_once('csslinks.php');?>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link type="text/css" href="assets/css/board.css" rel="stylesheet">

<!-- start show menu button script -->
    <script>
        function myFunction() 
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
    <div id="description" class="modal">
        <div class="modal-content" style="width: 50%; height: 300px;">
            <form method="POST" enctype="multipart/form-data" action="" class="form-container">
                <div>
                    <label><b>Description :</b></label>
                    <br>
                    <textarea name="showmenudescription" id="description" rows="7" style="width: 100%;" placeholder="Description ..."></textarea>
                </div><br>
                <div class="canclebtn">
                    <button  type="submit" name="showdescriptionadd" class="btn cancel">Add</button>&nbsp;&nbsp;&nbsp;
                    <button type="button" class="btn cancel" onclick="desclose()" >Cancel</button>
                </div>
            </form>
        </div>
    </div>
<!-- End show menu description popup -->

<!-- start show menu delete popup -->
    <div id="deleteboard" class="modal">
        <div class="modal-content" style="width: 50%; height: 250px;">
            <form method="POST" enctype="multipart/form-data" action="" class="form-container">
                <div>
                    <h3><strong>Are you sure ?</strong></h3>
                </div><br><br>
                <center><div class="canclebtn">
                    <button type="submit" name="deleteYes" class="btn cancel">Yes</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <button type="button" class="btn cancel" onclick="deleteclose()" >No</button>
                </div></center>
            </form>
        </div>
    </div>
<!-- End show menu delete popup -->

<!-- start todo before trip card details popup -->
    <div id="tripcardDetails" class="modal" >
        <div class="modal-content" style="width: 50%; height: 80%; overflow: auto;">

            <div class="modal-body">
                <!-- Start Form Details -->  
                <h5 style="text-align: center;" class="w3-text-blue">CARD DETAILS-BEFORE TRIP</h5>

                <form class="w3-container w3-card-4"action="" style="padding-top: 20px;" method="POST" enctype="multipart/form-data">
                    <!-- Start Card Name Input -->
                    <div class="row" style="padding-left:50px;" >
                      <div class="col-25">   
                          <label class="w3-text-black"><b>Title</b></label>
                      </div>
                      <div class="col-75">
                        <input class="w3-input w3-border" style="width: 320px; height: 40px;" name="beforetripTitle" type="text">
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
                          <textarea name="beforetripdescription" id="description" rows="4" class="w3-input w3-border" style="width: 320px; background-color: white;" placeholder="Description ..."></textarea>
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
                            <select id="member" name="beforetripcardmember" style="width:320px; height: 45px;">
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

                    <div class="row" style="padding-left:50px;" >
                      <div class="col-25">     
                        <label class="w3-text-black"><b>Label Name</b></label>
                      </div>
                      <div class="col-75" >
                        <input class="w3-input w3-border" placeholder="Enter label name" name="beforetriplabel" type="text" style="width: 320px; height: 40px;">                        
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
                            <input type="color" name="beforetriplabelcolor" style="width: 320px; height: 40px;">                      
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
                        <input type="date" id="birthdaytime" name="beforetripduedate" style="width:320px; height: 45px;" class="w3-input w3-border">
                      </div>
                    </div>
                    <!-- End Due Date Input --> 

                    <hr style="border-top: 1px solid #bbb;">

                    <!-- Start Button Input -->  
                    <div>
                        <center>
                            <button type="submit" name="addtodocardtrip" class="btn btn-success" style="width:150px;">Save</button>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <a href="#" class="btn btn-danger" onclick="cardcloseForm()" style="background-color: red; width:150px;" >Cancel</a>
                            <p></p>
                        </center>
                    </div>
                    <!-- End Button Input -->
              
                </form>
              <!--End Form Details -->
            </div> 

        </div>
    </div>
<!-- end todo before trip card details popup -->

<!-- start todo holiday card details popup -->
    <div id="holidaycardDetails" class="modal" >
        <div class="modal-content" style="width: 50%; height: 80%; overflow: auto;">

            <div class="modal-body">
                <!-- Start Form Details -->  
                <h5 style="text-align: center;" class="w3-text-blue">CARD DETAILS-HOLIDAY</h5>

                <form class="w3-container w3-card-4"action="" style="padding-top: 20px;" method="POST" enctype="multipart/form-data">
                    <!-- Start Card Name Input -->
                    <div class="row" style="padding-left:50px;" >
                      <div class="col-25">   
                          <label class="w3-text-black"><b>Title</b></label>
                      </div>
                      <div class="col-75">
                        <input class="w3-input w3-border" style="width: 320px; height: 40px;" name="holidaycardtitle" type="text">
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
                          <textarea name="holidaycarddescription" id="description" rows="4" class="w3-input w3-border" style="width: 320px; background-color: white;" placeholder="Description ..."></textarea>
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
                            <select id="member" name="holidaycardmember" style="width:320px; height: 45px;">
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

                    <div class="row" style="padding-left:50px;" >
                      <div class="col-25">     
                        <label class="w3-text-black"><b>Label Name</b></label>
                      </div>
                      <div class="col-75" >
                        <input class="w3-input w3-border" placeholder="Enter label name" name="holidaycardlabel" type="text" style="width: 320px; height: 40px;">                        
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
                            <input type="color" name="holidaycardlabelcolor" style="width: 320px; height: 40px;">                      
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
                        <input type="date" id="birthdaytime" name="holidaycardduedate" style="width:320px; height: 45px;" class="w3-input w3-border">
                      </div>
                    </div>
                    <!-- End Due Date Input --> 

                    <hr style="border-top: 1px solid #bbb;">

                    <!-- Start Button Input -->  
                    <div>
                        <center>
                            <button  type="submit" name="addholidaycard"class="btn btn-success" style="width:150px;">Save</button>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <a href="#" class="btn btn-danger" onclick="closeholidayform()" style="background-color: red; width:150px;" >Cancel</a>
                            <p></p>
                        </center>
                    </div>
                    <!-- End Button Input -->
              
                </form>
              <!--End Form Details -->
            </div> 

        </div>
    </div>
<!-- end todo holiday card details popup -->

<!-- start todo eatdrink card details popup -->
    <div id="eatcardDetails" class="modal" >
        <div class="modal-content" style="width: 50%; height: 80%; overflow: auto;">

            <div class="modal-body">
                <!-- Start Form Details -->  
                <h5 style="text-align: center;" class="w3-text-blue">CARD DETAILS-TO EAT & DRINK</h5>

                <form class="w3-container w3-card-4"action="" style="padding-top: 20px;" method="POST" enctype="multipart/form-data">
                    <!-- Start Card Name Input -->
                    <div class="row" style="padding-left:50px;" >
                      <div class="col-25">   
                          <label class="w3-text-black"><b>Title</b></label>
                      </div>
                      <div class="col-75">
                        <input class="w3-input w3-border" style="width: 320px; height: 40px;" name="eatcardtitle" type="text">
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
                          <textarea name="eatcarddescription" id="description" rows="4" class="w3-input w3-border" style="width: 320px; background-color: white;" placeholder="Description ..."></textarea>
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
                            <select id="member" name="eatcardmember" style="width:320px; height: 45px;">
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


                    <div class="row" style="padding-left:50px;" >
                      <div class="col-25">     
                        <label class="w3-text-black"><b>Label Name</b></label>
                      </div>
                      <div class="col-75" >
                        <input class="w3-input w3-border" placeholder="Enter label name" name="eatcardlabel" type="text" style="width: 320px; height: 40px;">                        
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
                            <input type="color" name="eatcardlabelcolor" style="width: 320px; height: 40px;">                      
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
                        <input type="date" id="birthdaytime" name="eatcardduedate" style="width:320px; height: 45px;" class="w3-input w3-border">
                      </div>
                    </div>
                    <!-- End Due Date Input --> 

                    <hr style="border-top: 1px solid #bbb;">

                    <!-- Start Button Input -->  
                    <div>
                        <center>
                            <button type="submit" name="addeatcard"class="btn btn-success" style="width:150px;">Save</button>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <a href="#" class="btn btn-danger" onclick="cardcloseeatForm()" style="background-color: red; width:150px;" >Cancel</a>
                            <p></p>
                        </center>
                    </div>
                    <!-- End Button Input -->
              
                </form>
              <!--End Form Details -->
            </div> 

        </div>
    </div>
<!-- end todo eatdrink card details popup -->

<!-- start todo personal done card details popup -->
    <div id="personalcardDetails" class="modal" >
        <div class="modal-content" style="width: 50%; height: 80%; overflow: auto;">

            <div class="modal-body">
                <!-- Start Form Details -->  
                <h5 style="text-align: center;" class="w3-text-blue">CARD DETAILS-WORK DONE</h5>

                <form class="w3-container w3-card-4"action="" style="padding-top: 20px;" method="POST" enctype="multipart/form-data">
                    <!-- Start Card Name Input -->
                    <div class="row" style="padding-left:50px;" >
                      <div class="col-25">   
                          <label class="w3-text-black"><b>Title</b></label>
                      </div>
                      <div class="col-75">
                        <input class="w3-input w3-border" style="width: 320px; height: 40px;" name="personalcardtitle" type="text">
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
                          <textarea name="personalcarddescription" id="description" rows="4" class="w3-input w3-border" style="width: 320px; background-color: white;" placeholder="Description ..."></textarea>
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
                            <select id="member" name="personaldonecardmember" style="width:320px; height: 45px;">
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

                    <div class="row" style="padding-left:50px;" >
                      <div class="col-25">     
                        <label class="w3-text-black"><b>Label Name</b></label>
                      </div>
                      <div class="col-75" >
                        <input class="w3-input w3-border" placeholder="Enter label name" name="personalcardlabel" type="text" style="width: 320px; height: 40px;">                        
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
                            <input type="color" name="personalcardlabelcolor" style="width: 320px; height: 40px;">                      
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
                        <input type="date" id="birthdaytime" name="personalcardduedate" style="width:320px; height: 45px;" class="w3-input w3-border">
                      </div>
                    </div>
                    <!-- End Due Date Input --> 

                    <hr style="border-top: 1px solid #bbb;">

                    <!-- Start Button Input -->  
                    <div>
                        <center>
                            <button  type="submit" name="addpersonaldonecard"class="btn btn-success" style="width:150px;">Save</button>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <a href="#" class="btn btn-danger" onclick="closePersonaldoneForm()" style="background-color: red; width:150px;" >Cancel</a>
                            <p></p>
                        </center>
                    </div>
                    <!-- End Button Input -->
              
                </form>
              <!--End Form Details -->
            </div> 

        </div>
    </div>
<!-- end todo personal done card details popup -->

</head>

<body class="layout-default trello">

    <div class="preloader"></div>

<?php
    if ($bid==0) 
    {
?>
        <div class="mdk-header-layout js-mdk-header-layout" style="background-image: url(images/blog-img78.jpg); background-repeat: repeat; background-size: contain;">

<?php  
    }
    else
    {
        $backgroundimage = "SELECT * FROM tblboard Where Bid=$bid";  
        $result_backgroundimage = mysqli_query($con,$backgroundimage);
        if($result_backgroundimage->num_rows!=0)
       {  
            while($row_backgroundimage=$result_backgroundimage->fetch_array())  
            {
                $pbackground=$row_backgroundimage['Background'];

                if($pbackground=="" || !file_exists("$pbackground"))
                {
                    $pbackground="images/blog-img78.jpg";
                }      

?>

                <!--start whole page-->
                <div class="mdk-header-layout js-mdk-header-layout" style="background-image: url(<?php echo $pbackground; ?>); background-repeat: repeat; background-size: contain;">

<?php 
            }
        }
    }
?>

    <!-- END DATABASE BACKGROUND IMAGE CHANGE -->
       <!-- Header -->
            <?php include_once('header1.php'); ?>
        <!--END Header -->

<?php
        if ($bid==0) 
        {
    ?>

<!--  If Board Id is 0  -->
        <!-- Start container from second header -->
    <div class="mdk-header-layout__content" style="overflow-y: auto;">

        <div class="w3-bar" style="background: rgba(120,120,120,0.4); ">
                    <p></p>
                    <div style="float: left; margin-left: 20px; margin-bottom: 10px;">
                        <center>
                            <h5 style="color: white;">Personal Template</h5>
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

                        <!-- Start before trip list-->
                        <div class="trello-board__tasks" data-toggle="dragula" data-dragula-containers='["#trello-tasks-1", "#trello-tasks-2", "#trello-tasks-3","#trello-tasks-4"]'>
                            <div class="card bg-light border">

                                <!-- Start list name-->
                                <div class="card-header card-header-sm bg-white">
                                    <h4 class="card-header__title">Todo Before Trip</h4>
                                </div>
                                <!-- End list name-->

                                <!-- Start before trip card Section-->
                                <div class="card-body p-2">
                                    <div class="trello-board__tasks-list card-list" id="trello-tasks-1" >

                                        <!-- Start before trip card 1-->
                                        <div class="trello-board__tasks-item card shadow-none border" data-toggle="modal" data-target="#exampleModal">
                                            <div class="p-3">
                                                <p class="m-0 d-flex align-items-center">
                                                    <strong>Buying Clothes</strong> 
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
                                        <!-- End before trip card 1-->
                                    
                                    </div>
                                    <button class="btn btn-light btn-block mt-2">Add Card</button>
                                </div>
                                <!-- End before trip card Section-->

                            </div>
                        </div>
                        <!-- End before trip list-->

                        <!-- Start Todo in Holiday list-->
                        <div class="trello-board__tasks">
                            <div class="card bg-light border">

                                <!-- Start list name-->
                                <div class="card-header card-header-sm bg-white">
                                    <h4 class="card-header__title">Todo in Holiday</h4>
                                </div>
                                <!-- End list name-->

                                <!-- Start Todo in Holiday card Section-->
                                <div class="card-body p-2">
                                    <div class="trello-board__tasks-list card-list" id="trello-tasks-2">

                                        <!-- Start Todo in Holiday card 1-->
                                        <div class="trello-board__tasks-item card shadow-none border" data-toggle="modal" data-target="#exampleModal" >
                                            <div class="p-3">
                                                <p class="m-0 d-flex align-items-center">
                                                    <strong>Joining Course</strong> 
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
                                        <!-- End Todo in Holiday card 1-->
                                        
                                    </div>
                                    <button class="btn btn-light btn-block mt-2">Add Card</button>
                                </div>
                                <!-- End Todo in Holiday card Section-->

                            </div>
                        </div>
                        <!-- End Todo in Holiday list-->
                        
                        <!-- Start To Eat and Drink list-->
                        <div class="trello-board__tasks">
                            <div class="card bg-light border">

                                <!-- Start list name-->
                                <div class="card-header card-header-sm bg-white">
                                    <h4 class="card-header__title">To Eat and Drink</h4>
                                </div>
                                <!-- End list name-->

                                <!-- Start To Eat and Drink card Section-->
                                <div class="card-body p-2">
                                    <div class="trello-board__tasks-list card-list" id="trello-tasks-3">

                                        <!-- Start To Eat and Drink card 1-->
                                        <div class="trello-board__tasks-item card shadow-none border" data-toggle="modal" data-target="#exampleModal" >
                                            <div class="p-3">
                                                <p class="m-0 d-flex align-items-center">
                                                    <strong>Learn new Recipe</strong> 
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
                                <!-- End To Eat and Drink card Section-->
                            
                            </div>
                        </div>
                        <!-- End To Eat and Drink list-->

                        <!-- Start Personal Done list-->
                        <div class="trello-board__tasks">
                            <div class="card bg-light border">

                                <!-- Start list name-->
                                <div class="card-header card-header-sm bg-white">
                                    <h4 class="card-header__title">Done</h4>
                                </div>
                                <!-- End list name-->

                                <!-- Start Personal Done card Section-->
                                <div class="card-body p-2">
                                    <div class="trello-board__tasks-list card-list" id="trello-tasks-4">

                                        <!-- Start Personal Done card 1-->
                                        <div class="trello-board__tasks-item card shadow-none border" data-toggle="modal" data-target="#exampleModal" >
                                            <div class="p-3">
                                                <p class="m-0 d-flex align-items-center">
                                                    <strong>Tickets Booked</strong> 
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
                                        <!-- End Personal Done card 1-->

                                    </div>
                                    <button class="btn btn-light btn-block mt-2">Add Card</button>
                                </div>
                                <!-- End Personal Done card Section-->
                            
                            </div>
                        </div>
                        <!-- End Personal Done list-->

                    </div>
                </div>
                <!-- // END trello container after second header -->

            </div>
            <!-- end container of Board id is 0 from second header -->

    <?php
        }
        else
        {
            $selectmlist="SELECT * from tblteammember where Bid=$bid AND Uid=$uid";
            $result_selectmlist= mysqli_query($con,$selectmlist);
            if($result_selectmlist->num_rows!=0)
            { 
?>
<!--If Board Id is not 0 -->
                <!-- Start container from second header -->
                <div class="mdk-header-layout__content" style="overflow-y: auto;">
<?php
            }
            else
            {
                $selecttlist="SELECT * from tblboard where Bid=$bid";
                $result_selecttlist= mysqli_query($con,$selecttlist);
                if($result_selecttlist->num_rows!=0)
                { 
                    $rowf= $result_selecttlist->fetch_array();
                    $btid=$rowf['Tid'];

                    if ($btid==1) 
                    {
?>
                        <div class="mdk-header-layout__content" style="overflow-y: auto;">
<?php
                    }
                    else
                    {
?>
                        <div class="mdk-header-layout__content" style="overflow-y: auto; pointer-events: none;">
<?php
                    }
                }
            }
?>

            <!-- Start DATABASE IN SECOND HEADER -->
            <?php
                $boarddata = "SELECT *, tblboard.IsActive as active FROM tblboard, tblteam Where Bid=$bid AND tblboard.Tid=tblteam.Tid ";  
                $result_data = mysqli_query($con,$boarddata);
                if($result_data->num_rows!=0)
                {  
                    while($row_board=$result_data->fetch_array())  
                    {
                        $boardid=$row_board['Bid'];
                        $btitle=$row_board['Btitle'];  
                        $btid=$row_board['Tid'];
                        $isactive=$row_board['active'];
                        $tname=$row_board['Tname'];
                        $bdescription=$row_board['BoardDescription'];
                        $bvisibilty=$row_board['Visibility']; 
                        
            ?>
                            <!-- start second header content -->
                            <div class="w3-bar" style="background: rgb(120,120,120); "> 
            
                    <p></p>
                    
                    <div style="float: left; margin-left: 20px; margin-bottom: 10px;">
                        <center>
                            <h5 style="color: white;"><?php echo $btitle; ?></h5>
                            <small style="color: white;">
                                <?php
                                            if ($btid==1) 
                                            {
                                                if ($isactive==0) 
                                                {
                                        ?>
                                                    <strong><?php echo $tname; ?> 
                                                        <a href="Complete.php?Uid=<?php echo $uid;?>">
                                                            <span style="color: orange;">(COMPLETED BOARD)</span>
                                                        </a>
                                                    </strong>
                                        <?php
                                                }
                                                else
                                                {
                                        ?>
                                                     <a href="individual_board.php?Uid=<?php echo $uid;?>">
                                                        <strong><?php echo $tname; ?></strong>
                                                    </a>
                                        <?php
                                                }
                                            }
                                            else
                                            {
                                                if ($isactive==0) 
                                                {                                                
                                        ?>
                                                    <strong><?php echo $tname; ?> 
                                                        <a href="Complete.php?Uid=<?php echo $uid;?>">
                                                            <span style="color: orange;">(COMPLETED BOARD)</span>
                                                        </a>
                                                    </strong>
                                        <?php
                                                }
                                                else
                                                {
                                        ?>
                                                    <a href="Team_boards.php?Tid=<?php echo $btid;?>">
                                                        <strong><?php echo $tname; ?></strong>
                                                    </a>    
                                        <?php
                                                }
                                            }
                                        ?>
                                </strong>
                            </small>
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
                                        <textarea name="description" id="description" rows="7" style="width: 320px; background-color: white; " disabled=""><?php echo $bdescription; ?>
                                        </textarea>

                                        <!-- Start card details popup fuction-->
                                        <script>
                                            function desopen() {
                                              document.getElementById("description").style.display = "flex";
                                            }
                                            function desclose() {
                                              document.getElementById("description").style.display = "none";
                                            }
                                        </script>
                                        <!-- End card details popup fuction-->
                                    </div>

                                    <!--START DATABASE FOR CHECKING THIS IS INDIVIDUAL BOARD OR TEAM BOARD..IF INDIVIDUAL THEN MEMBER DETAILS CAN'T BE SHOWN -->
                                        <!-- Start DATABASE REDIRECT TO TEAM PAGE (SHOW MENU) -->
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
                                        <!-- END DATABASE REDIRECT TO TEAM PAGE (SHOW MENU) -->
                                    <!--END DATABASE FOR CHECKING THIS IS INDIVIDUAL BOARD OR TEAM BOARD..IF INDIVIDUAL THEN MEMBER DETAILS CAN'T BE SHOWN -->

                                    <hr style="border-top: 1px solid #bbb;">
                                    <div>
                                        <label style="float: left;">Wanna Close Board ?</label><br><br>
                                    </div>

                                    <div>
                                        <form method="POST" enctype="multipart/form-data" action="" class="form-container">
                                        <?php
                                            if ($isactive==1) 
                                            {
                                        ?>
                                                <button type="submit" name="completebutton" class="w3-button w3-black w3-round" style="float: left; width: 140px;">Complete Board</button>
                                                <button type="button" name="deletebutton" class="w3-button w3-black w3-round" style="float: right; margin-right: 270px; width: 140px;" onclick="deleteopen()">Delete Board</button>
                                        <?php
                                            }
                                            else
                                            {
                                        ?>
                                                <button type="button" name="deletebutton" class="w3-button w3-black w3-round" style=" margin-right: 270px; width: 250px;" onclick="deleteopen()">Delete Board</button>
                                        <?php
                                            }
                                        ?>
                                            <!-- Start card details popup fuction-->
                                            <script>
                                                function deleteopen() {
                                                    document.getElementById("deleteboard").style.display = "flex";
                                                }
                                                function deleteclose() {
                                                    document.getElementById("deleteboard").style.display = "none";
                                                }
                                            </script>
                                            <!-- End card details popup fuction-->
                                        </form>
                                    </div>

                                </div></center>
                            </div>
                    </div>

                    &nbsp;
                    <!-- START DATABASE TO SHOW THE VISIBILITY OF THE BOARD -->
                    <div class="dropdown w3-right">
                        <div class="w3-dropdown-click w3-right">
                            <select class="w3-button " id="country" name="country" style="height: 35px; width: 110px;">
                                <?php
                                    if ($btid == 1) 
                                    {
                                ?>
                                        <option value="Private" selected >Private</option>
                                <?php
                                    }
                                    else
                                    {
                                ?>
                                        <option value="Team" selected >Team</option>
                                <?php
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                    <!-- START DATABASE TO SHOW THE VISIBILITY OF THE BOARD -->

                        <!--START DATABASE FOR CHECKING THIS IS INDIVIDUAL BOARD OR TEAM BOARD..IF INDIVIDUAL THEN MEMBER LIST CAN'T BE SHOWN -->
                    <?php
                            if ($btid !=1) 
                            {
                        ?>
                    <div class="dropdown w3-right">
                        <div class="w3-dropdown-click w3-right">
                            <select class="w3-button " id="country" name="country" style="height: 35px; width: 140px;">
                                <option value="Members" selected disabled >Members List</option>
                                                <?php        
                                                    $personalmember = "SELECT * FROM tbluser Where IsActive=1 AND Uid IN (SELECT Uid FROM tblteammember Where Bid=$bid)";  
                                                    $result_personalmember = mysqli_query($con,$personalmember);
                                                    if($result_personalmember->num_rows!=0)
                                                    {  
                                                        while($row_personalmember=$result_personalmember->fetch_array())  
                                                        {
                                                            $member=$row_personalmember['Uid'];
                                                            $fname=$row_personalmember['Fname'];
                                                            $lname=$row_personalmember['Lname'];
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
                        <!--END DATABASE FOR CHECKING THIS IS INDIVIDUAL BOARD OR TEAM BOARD..IF INDIVIDUAL THEN MEMBER LIST CAN'T BE SHOWN -->             
                    <a href="Calendar.php" class="w3-bar-item w3-button w3-right" style="color: black;">Calendar</a>
                    <a href="#" class="w3-bar-item w3-button w3-right" style="color: black;">Gantt</a>
                    <a href="report.php?Bid=<?php echo $bid;?>" class="w3-bar-item w3-button w3-right" style="color: black;">Report</a>  

                </div>
                <!-- End second Header Content -->
             <?php 
                        }
                    }
            ?>
           <!-- END DATABASE IN SECOND HEADER -->

        <?php
            $trellodata = "SELECT * FROM tblboard Where Bid=$bid";  
            $result_trellodata = mysqli_query($con,$trellodata);
            if($result_trellodata->num_rows!=0)
            {  
                while($row_trelloboard=$result_trellodata->fetch_array())  
                {
                    $boardid=$row_trelloboard['Bid'];
                    $btitle=$row_trelloboard['Btitle'];  
                    $isactive=$row_trelloboard['IsActive'];

                    if ($isactive==0)
                    {
        ?>
                        <!-- start trello container after second header  -->
                        <div class="trello-container" style="pointer-events: none;">
        <?php
                        
                    }
                    else
                    {
        ?>
                        <!-- start trello container after second header  -->
                        <div class="trello-container">
        <?php
                    }
               }
            } 
        ?>
                <div class="trello-board container-fluid page__container mt-5">
                
                    <!-- Start Todo before trip list-->
                    <div class="trello-board__tasks">
                        
                        <div class="card bg-light border">

                            <!-- Start list name-->
                            <div class="card-header card-header-sm bg-white">
                                <h4 class="card-header__title">Todo Before Trip</h4>
                            </div>
                            <!-- End list name-->

                            <!-- Start Todo before trip card Section-->
                            <div class="card-body p-2">
                                <div class="trello-board__tasks-list card-list" id="trello-tasks-1" >

                                <?php
                                    $selecttodoquery = "SELECT * FROM tblcard Where Listid=8 AND Bid='$bid'";  
                                    $result_todo = mysqli_query($con,$selecttodoquery);
                                    if($result_todo->num_rows!=0)
                                    {  
                                        while($row_todo=$result_todo->fetch_array())  
                                        {
                                            $cardname=$row_todo['CardName'];
                                            $cardlabel=$row_todo['Label'];  
                                            $cardlabelcolor=$row_todo['LabelColor'];
                                            $cardduedate=$row_todo['DueDate']; 
                                            $cardid=$row_todo['Cardid'];
                                            
                                            
  
                                ?>
                                    <!-- Start Todo before trip card 1-->
                                    <div class="trello-board__tasks-item card shadow-none border" data-toggle="modal" data-target="#exampleModal" onclick="location.href='cards.php?Cardid=<?php echo $cardid;?>&Bid=<?php echo $bid;?>';">
                                        <div class="p-3">
                                            <p class="m-0 d-flex align-items-center">
                                                <strong><?php echo $cardname; ?></strong>
                                                <?php 
                                                    if ($cardlabel!="") 
                                                    {
                                                ?>  
                                                        <span class="badge ml-auto" style="font-size: 12px; margin-right: 20px; height:25px; background-color: <?php echo $cardlabelcolor;?>">
                                                            <?php echo $cardlabel;?>
                                                        </span>
                                                <?php
                                                    }
                                                ?>       
                                            </p>
                                            <br>
                                            <?php
                                                if ($cardduedate!="0000-00-00") 
                                                {
                                                    $today=date("Y-m-d");
                                                    $diff = strtotime($cardduedate) - strtotime($today);
                                                    $days = floor($diff/ (60*60*24));

                                            ?>
                                                    <p class="d-flex align-items-center mb-2">
                                                        <i class="material-icons icon-16pt mr-2 text-muted">folder_open</i>
                                                        <span class="text-muted mr-3"><?php echo $cardduedate; ?></span>
                                                                
                                            <?php
                                                if ($days<0) 
                                                {
                                            ?>
                                                    <small style="color: red;">DUEDATE EXPIRED</small>
                                            <?php
                                                }
                                                else
                                                {
                                            ?>
                                                    <span style="color:Green;"><?php echo $days." Days Left"; ?></span>  
                                            <?php
                                                }
                                            ?>
                                                    </p>
                                            <?php   
                                                }
                                            ?>
                                             <?php
                                                $selecttomem = "SELECT * FROM tbluser WHERE Uid IN (SELECT Uid from tblmembercard WHERE Cardid='$cardid')";  
                                                $result_tomem = mysqli_query($con,$selecttomem);
                                                if($result_tomem->num_rows!=0)
                                                {  
                                                    $row_tomem=mysqli_fetch_array($result_tomem);
                                                                $tofname=$row_tomem['Fname'];
                                                                $tolname=$row_tomem['Lname'];
                                                                $topropic=$row_tomem['ProfilePic'];

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
                                    <!-- End Todo before trip card 1-->
                                <?php
                                        }
                                    }
                                ?>
                            </div>

                                <a href="#" class="btn btn-light btn-block mt-2" onclick="cardopenForm()">Add Card</a>

                                <!-- Start card details popup fuction-->
                                <script>
                                    function cardopenForm() {
                                      document.getElementById("tripcardDetails").style.display = "flex";
                                    }
                                    function cardcloseForm() {
                                      document.getElementById("tripcardDetails").style.display = "none";
                                    }
                                </script>
                                <!-- End card details popup fuction-->

                            </div>
                            <!-- End Todo before trip card Section-->

                        </div>
                    </div>
                    <!-- End Todo before trip list-->


                    <!-- Start Todo in Holiday list-->
                    <div class="trello-board__tasks">
                        <div class="card bg-light border">

                            <!-- Start list name-->
                            <div class="card-header card-header-sm bg-white">
                                <h4 class="card-header__title">Todo in Holiday</h4>
                            </div>
                            <!-- End list name-->

                            <!-- Start Todo in Holiday card Section-->
                            <div class="card-body p-2">
                                <div class="trello-board__tasks-list card-list" id="trello-tasks-2">

                                <?php
                                    $selectholidayquery = "SELECT * FROM tblcard Where Listid=9 AND Bid='$bid'";  
                                    $result_holiday = mysqli_query($con,$selectholidayquery);
                                    if($result_holiday->num_rows!=0)
                                    {  
                                        while($row_holiday=$result_holiday->fetch_array())  
                                        {
                                            $cardname=$row_holiday['CardName'];
                                            $cardlabel=$row_holiday['Label'];  
                                            $cardlabelcolor=$row_holiday['LabelColor'];
                                            $cardduedate=$row_holiday['DueDate']; 
                                            $cardid=$row_holiday['Cardid'];
  
                                ?>

                                    <!-- Start Todo in Holiday card 1-->
                                    <div class="trello-board__tasks-item card shadow-none border" data-toggle="modal" data-target="#exampleModal" onclick="location.href='cards.php?Cardid=<?php echo $cardid;?>&Bid=<?php echo $bid;?>';">
                                        <div class="p-3">
                                            <p class="m-0 d-flex align-items-center">
                                                <strong><?php echo $cardname; ?></strong> 
                                                <?php 
                                                    if ($cardlabel!="") 
                                                    {
                                                ?>  
                                                        <span class="badge ml-auto" style="font-size: 12px; margin-right: 20px; height:25px; background-color: <?php echo $cardlabelcolor;?>">
                                                            <?php echo $cardlabel;?>
                                                        </span>
                                                <?php
                                                    }
                                                ?>                                                  
                                            </p>
                                            <br>
                                            <?php
                                                if ($cardduedate!="0000-00-00") 
                                                {
                                                    $today=date("Y-m-d");
                                                    $diff = strtotime($cardduedate) - strtotime($today);
                                                    $days = floor($diff/ (60*60*24));

                                            ?>
                                                    <p class="d-flex align-items-center mb-2">
                                                        <i class="material-icons icon-16pt mr-2 text-muted">folder_open</i>
                                                        <span class="text-muted mr-3"><?php echo $cardduedate; ?></span>
                                                                
                                            <?php
                                                if ($days<0) 
                                                {
                                            ?>
                                                    <small style="color: red;">DUEDATE EXPIRED</small>
                                            <?php
                                                }
                                                else
                                                {
                                            ?>
                                                    <span style="color:Green;"><?php echo $days." Days Left"; ?></span>  
                                            <?php
                                                }
                                            ?>
                                                    </p>
                                            <?php   
                                                }
                                            ?>
                                            <?php
                                                $selecthomem = "SELECT * FROM tbluser WHERE Uid IN (SELECT Uid from tblmembercard WHERE Cardid='$cardid')";  
                                                $result_homem = mysqli_query($con,$selecthomem);
                                                if($result_homem->num_rows!=0)
                                                {  
                                                    $row_homem=mysqli_fetch_array($result_homem);
                                                                $hofname=$row_homem['Fname'];
                                                                $holname=$row_homem['Lname'];
                                                                $hopropic=$row_homem['ProfilePic'];

                                                                if($hopropic=="" || !file_exists("images/profile/$hopropic"))
                                                                {
                                                                    $hopropic="No.png";
                                                                }
                                                               
                                                        ?>

                                                                    <div class="media align-items-center" style="float: right;">
                                                                        <div class=" mr-2 avatar-group" >
                                                                            <div class="avatar avatar-xs" data-toggle="tooltip" data-placement="top" title="<?php echo $hofname." ".$holname;?>">
                                                                                <img src="images/profile/<?php echo $hopropic; ?>" alt="Avatar" class="avatar-img rounded-circle">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                        <?php 
                                                            }
                                                        ?>
                                        </div>
                                    </div>
                                    <!-- End Todo in Holiday card 1-->
                                    <?php 
                                        }
                                    }
                                ?>

                                </div>
                                <a href="#" class="btn btn-light btn-block mt-2" onclick="holidayform()">Add Card</a>

                                <!-- Start card details popup fuction-->
                                <script>
                                    function holidayform() {
                                      document.getElementById("holidaycardDetails").style.display = "flex";
                                    }
                                    function closeholidayform() {
                                      document.getElementById("holidaycardDetails").style.display = "none";
                                    }
                                </script>
                                <!-- End card details popup fuction-->
                            </div>
                            <!-- End Todo in Holiday card Section-->

                        </div>
                    </div>
                    <!-- End Todo in Holiday list-->
                    
                    <!-- Start To eat and drink list-->
                    <div class="trello-board__tasks">
                        <div class="card bg-light border">

                            <!-- Start list name-->
                            <div class="card-header card-header-sm bg-white">
                                <h4 class="card-header__title">To eat and drink</h4>
                            </div>
                            <!-- End list name-->

                            <!-- Start To eat and drink card Section-->
                            <div class="card-body p-2">
                                <div class="trello-board__tasks-list card-list" id="trello-tasks-3">
                                    <?php
                                    $selecteatquery = "SELECT * FROM tblcard Where Listid=10 AND Bid='$bid'";  
                                    $result_eat = mysqli_query($con,$selecteatquery);
                                    if($result_eat->num_rows!=0)
                                    {  
                                        while($row_eat=$result_eat->fetch_array())  
                                        {
                                            $cardname=$row_eat['CardName'];
                                            $cardlabel=$row_eat['Label'];  
                                            $cardlabelcolor=$row_eat['LabelColor'];
                                            $cardduedate=$row_eat['DueDate'];
                                            $cardid=$row_eat['Cardid']; 
  
                                ?>

                                    <!-- Start To eat and drink card 1-->
                                    <div class="trello-board__tasks-item card shadow-none border" data-toggle="modal" data-target="#exampleModal" onclick="location.href='cards.php?Cardid=<?php echo $cardid;?>&Bid=<?php echo $bid;?>';">
                                        <div class="p-3">
                                            <p class="m-0 d-flex align-items-center">
                                                <strong><?php echo $cardname; ?></strong> 
                                                <?php 
                                                    if ($cardlabel!="") 
                                                    {
                                                ?>  
                                                        <span class="badge ml-auto" style="font-size: 12px; margin-right: 20px; height:25px; background-color: <?php echo $cardlabelcolor;?>">
                                                            <?php echo $cardlabel;?>
                                                        </span>
                                                <?php
                                                    }
                                                ?>                                                    
                                            </p>
                                            <br>
                                            <?php
                                                if ($cardduedate!="0000-00-00") 
                                                {
                                                    $today=date("Y-m-d");
                                                    $diff = strtotime($cardduedate) - strtotime($today);
                                                    $days = floor($diff/ (60*60*24));

                                            ?>
                                                    <p class="d-flex align-items-center mb-2">
                                                        <i class="material-icons icon-16pt mr-2 text-muted">folder_open</i>
                                                        <span class="text-muted mr-3"><?php echo $cardduedate; ?></span>
                                                                
                                            <?php
                                                if ($days<0) 
                                                {
                                            ?>
                                                    <small style="color: red;">DUEDATE EXPIRED</small>
                                            <?php
                                                }
                                                else
                                                {
                                            ?>
                                                    <span style="color:Green;"><?php echo $days." Days Left"; ?></span>  
                                            <?php
                                                }
                                            ?>
                                                    </p>
                                            <?php   
                                                }
                                            ?>

                                            <?php
                                                $selecteattmem = "SELECT * FROM tbluser WHERE Uid IN (SELECT Uid from tblmembercard WHERE Cardid='$cardid')";  
                                                $result_eattmem = mysqli_query($con,$selecteattmem);
                                                if($result_eattmem->num_rows!=0)
                                                {  
                                                    $row_eattmem=mysqli_fetch_array($result_eattmem);
                                                                $eattfname=$row_eattmem['Fname'];
                                                                $eattlname=$row_eattmem['Lname'];
                                                                $eattpropic=$row_eattmem['ProfilePic'];

                                                                if($eattpropic=="" || !file_exists("images/profile/$eattpropic"))
                                                                {
                                                                    $eattpropic="No.png";
                                                                }
                                                               
                                                        ?>

                                                                    <div class="media align-items-center" style="float: right;">
                                                                        <div class=" mr-2 avatar-group" >
                                                                            <div class="avatar avatar-xs" data-toggle="tooltip" data-placement="top" title="<?php echo $eattfname." ".$eattlname;?>">
                                                                                <img src="images/profile/<?php echo $eattpropic; ?>" alt="Avatar" class="avatar-img rounded-circle">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                        <?php 
                                                            }
                                                        ?>


                                        </div>
                                    </div>
                                    <!-- End To eat and drink card 1-->
                            <!-- End To eat and drink card Section-->
                        <?php 
                                        }
                                    }
                                ?>
                        </div>
                        <a href="#" class="btn btn-light btn-block mt-2" onclick="cardopeneatForm()">Add Card</a>

                                <!-- Start card details popup fuction-->
                                <script>
                                    function cardopeneatForm() {
                                      document.getElementById("eatcardDetails").style.display = "flex";
                                    }
                                    function cardcloseeatForm() {
                                      document.getElementById("eatcardDetails").style.display = "none";
                                    }
                                </script>
                                <!-- End card details popup fuction-->
                            </div>
                            <!-- End Done card Section-->
                        
                        </div>
                    </div>
                    <!-- End To eat and drink list-->

                    <!-- Start Done list-->
                    <div class="trello-board__tasks">
                        <div class="card bg-light border">

                            <!-- Start list name-->
                            <div class="card-header card-header-sm bg-white">
                                <h4 class="card-header__title">Done</h4>
                            </div>
                            <!-- End list name-->

                            <!-- Start Done card Section-->
                            <div class="card-body p-2">
                                <div class="trello-board__tasks-list card-list" id="trello-tasks-4">
                                    <?php
                                    $selectpersonalquery = "SELECT * FROM tblcard Where Listid=11 AND Bid='$bid'";  
                                    $result_personal = mysqli_query($con,$selectpersonalquery);
                                    if($result_personal->num_rows!=0)
                                    {  
                                        while($row_personal=$result_personal->fetch_array())  
                                        {
                                            $cardname=$row_personal['CardName'];
                                            $cardlabel=$row_personal['Label'];  
                                            $cardlabelcolor=$row_personal['LabelColor'];
                                            $cardduedate=$row_personal['DueDate'];
                                            $cardid=$row_personal['Cardid']; 
  
                                ?>

                                    <!-- Start Done card 1-->
                                    <div class="trello-board__tasks-item card shadow-none border" data-toggle="modal" data-target="#exampleModal" onclick="location.href='cards.php?Cardid=<?php echo $cardid;?>&Bid=<?php echo $bid;?>';">
                                        <div class="p-3">
                                            <p class="m-0 d-flex align-items-center">
                                                <strong><?php echo $cardname; ?></strong> 
                                                <?php 
                                                    if ($cardlabel!="") 
                                                    {
                                                ?>  
                                                        <span class="badge ml-auto" style="font-size: 12px; margin-right: 20px; height:25px; background-color: <?php echo $cardlabelcolor;?>">
                                                            <?php echo $cardlabel;?>
                                                        </span>
                                                <?php
                                                    }
                                                ?>                                                    
                                            </p>
                                            <br>
                                            <?php
                                                if ($cardduedate!="0000-00-00") 
                                                {
                                                    $today=date("Y-m-d");
                                                    $diff = strtotime($cardduedate) - strtotime($today);
                                                    $days = floor($diff/ (60*60*24));

                                            ?>
                                                    <p class="d-flex align-items-center mb-2">
                                                        <i class="material-icons icon-16pt mr-2 text-muted">folder_open</i>
                                                        <span class="text-muted mr-3"><?php echo $cardduedate; ?></span>
                                                                
                                            <?php
                                                if ($days<0) 
                                                {
                                            ?>
                                                    <small style="color: red;">DUEDATE EXPIRED</small>
                                            <?php
                                                }
                                                else
                                                {
                                            ?>
                                                    <span style="color:Green;"><?php echo $days." Days Left"; ?></span>  
                                            <?php
                                                }
                                            ?>
                                                    </p>
                                            <?php   
                                                }
                                            ?>

                                            <?php
                                                $selectdoneemem = "SELECT * FROM tbluser WHERE Uid IN (SELECT Uid from tblmembercard WHERE Cardid='$cardid')";  
                                                $result_doneemem = mysqli_query($con,$selectdoneemem);
                                                if($result_doneemem->num_rows!=0)
                                                {  
                                                    $row_doneemem=mysqli_fetch_array($result_doneemem);
                                                                $doneefname=$row_doneemem['Fname'];
                                                                $doneelname=$row_doneemem['Lname'];
                                                                $doneepropic=$row_doneemem['ProfilePic'];

                                                                if($doneepropic=="" || !file_exists("images/profile/$doneepropic"))
                                                                {
                                                                    $doneepropic="No.png";
                                                                }
                                                               
                                                        ?>

                                                                    <div class="media align-items-center" style="float: right;">
                                                                        <div class=" mr-2 avatar-group" >
                                                                            <div class="avatar avatar-xs" data-toggle="tooltip" data-placement="top" title="<?php echo $doneefname." ".$doneelname;?>">
                                                                                <img src="images/profile/<?php echo $doneepropic; ?>" alt="Avatar" class="avatar-img rounded-circle">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                        <?php 
                                                            }
                                                        ?>

                                        </div>
                                    </div>
                                    <!-- End Done card 1-->
                                    <?php 
                                        }
                                    }
                                ?>
                                </div>
                                <a href="#" class="btn btn-light btn-block mt-2" onclick="openPersonaldoneForm()">Add Card</a>
                                <!-- Start card details popup fuction-->
                                <script>
                                    function openPersonaldoneForm() {
                                      document.getElementById("personalcardDetails").style.display = "flex";
                                    }
                                    function closePersonaldoneForm() {
                                      document.getElementById("personalcardDetails").style.display = "none";
                                    }
                                </script>
                                <!-- End card details popup fuction-->
                            </div>
                            <!-- End Done card Section-->
                        
                        </div>
                    </div>
                    <!-- End Done list-->

                </div>
            </div>
            <!-- // END trello container after second header -->

        </div>
        <!-- end container from second header -->
        <?php
        }
    ?>
    </div>
    <!-- // END whole page -->

    <!-- jQuery -->
    <?php include_once('scriptlinks.php');?>

</body>


<!-- Mirrored from demo.frontted.com/stackadmin/133/app-trello.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 28 May 2020 07:53:33 GMT -->
</html>