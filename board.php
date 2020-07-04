 <?php 
    include_once("DbConnection.php");
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
        header("location:index.php");
    } 
    /*End database delete board button(SHOW MENU)*/

    /*START DATABASE INSERT DATA THROUGH ADD CARD BUTTON IN (TODO LIST)*/
    if (isset($_REQUEST['addtodocard'])) 
    {
        if ($_REQUEST['todocardtitle']=="") 
        {
            echo '<script type="text/javascript">alert("Card Name cannot be Empty!!!");</script>';
        }
        else
        {
            $todo_card_description= $todo_card_label =$todo_card_labelcolor =$todo_card_duedate=$todo_card_member="";

        
            $todo_card_title = $_REQUEST['todocardtitle'];
            $todo_card_description = $_REQUEST['todocarddescription'];
            $todo_card_label = $_REQUEST['todocardlabel'];
            $todo_card_labelcolor = $_REQUEST['todocardlabelcolor'];
            $todo_card_duedate = $_REQUEST['todocardduedate'];
            $todo_card_member = $_REQUEST['todocardmember'];
                
            $todo_query="insert into tblcard values(null,'$todo_card_title','$todo_card_label','$todo_card_labelcolor','$todo_card_duedate',now(),'$todo_card_description',1,'$bid',1,33.33)";
            $run_todo = mysqli_query($con,$todo_query);
            $todo1= mysqli_insert_id($con);

            if($run_todo)
            {
                if ($todo1) 
                {
                    $query1_todo="INSERT into tblmembercard values(null,'$todo_card_member','$todo1')";
                    $run_todocard = mysqli_query($con,$query1_todo);
                    if($run_todocard)
                    {
                        if ($todo_card_member==0) 
                        {
                           header("location:board.php?Bid=$bid");
                        }
                        else
                        {
                            $suser="SELECT tbluser.Email,tbluser.Fname,tbluser.Lname, tblboard.Btitle from tbluser,tblboard where tbluser.Uid=$todo_card_member AND tblboard.Bid=$bid" ;
                            $run_suser = mysqli_query($con,$suser);
                            if($run_suser->num_rows!=0)
                            {  
                                $row_suser=$run_suser->fetch_array();

                                $usfirst=$row_suser['Fname'];
                                $uslast=$row_suser['Lname'];
                                $usemail=$row_suser['Email'];
                                $boname=$row_suser['Btitle'];

                                $subject = "Easework";
                                $body = "Hi, $usfirst $uslast. $senduser $senduser1 added you to a new card-$todo_card_title on Board-$boname. Please Login to Check Your Activities : http://localhost/Task-Management/login.php";
                                $headers = "From: poojakusingh35@gmail.com";
                                mail($usemail, $subject, $body, $headers);

                                header("location:board.php?Bid=$bid");
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
    /*END DATABASE INSERT DATA THROUGH ADD CARD BUTTON IN (TODO LIST)*/

    /*START DATABASE INSERT DATA THROUGH ADD CARD BUTTON IN (DOING LIST)*/
    if (isset($_REQUEST['adddoingcard'])) 
    {
        if ($_REQUEST['doingcardtitle']=="") 
        {
            echo '<script type="text/javascript">alert("Card Name cannot be Empty!!!");</script>';
        }
        else
        {
            $doing_card_description= $doing_card_label =$doing_card_labelcolor =$doing_card_duedate=$doing_card_member="";

            $doing_card_title = $_REQUEST['doingcardtitle'];
            $doing_card_description = $_REQUEST['doingcarddescription'];
            $doing_card_label = $_REQUEST['doingcardlabel'];
            $doing_card_labelcolor = $_REQUEST['doingcardlabelcolor'];
            $doing_card_duedate = $_REQUEST['doingcardduedate'];
            $doing_card_member = $_REQUEST['doingmember'];

            $doing_query="insert into tblcard values(null,'$doing_card_title','$doing_card_label','$doing_card_labelcolor','$doing_card_duedate',now(),'$doing_card_description',2,'$bid',1,77)";
            $run_doing = mysqli_query($con,$doing_query);
            $doing1= mysqli_insert_id($con);

            if($run_doing)
            {
                if ($doing1) 
                {
                    $query1_doing="INSERT into tblmembercard values(null,'$doing_card_member','$doing1')";
                    $run_doingcard = mysqli_query($con,$query1_doing);
                    if($run_doingcard)
                    {
                        if ($doing_card_member==0) 
                        {
                           header("location:board.php?Bid=$bid");
                        }
                        else
                        {
                            $suser="SELECT tbluser.Email,tbluser.Fname,tbluser.Lname, tblboard.Btitle from tbluser,tblboard where tbluser.Uid=$doing_card_member AND tblboard.Bid=$bid" ;
                            $run_suser = mysqli_query($con,$suser);
                            if($run_suser->num_rows!=0)
                            {  
                                $row_suser=$run_suser->fetch_array();
                                
                                    $usfirst=$row_suser['Fname'];
                                    $uslast=$row_suser['Lname'];
                                    $usemail=$row_suser['Email'];
                                    $boname=$row_suser['Btitle'];

                                    $subject = "Easework";
                            $body = "Hi, $usfirst $uslast. $senduser $senduser1 added you to a new card- $doing_card_title on Board-$boname. Please Login to Check Your Activities : http://localhost/Task-Management/login.php";
                                    $headers = "From: poojakusingh35@gmail.com";
                                    mail($usemail, $subject, $body, $headers);
                                
                                header("location:board.php?Bid=$bid");
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
    if (isset($_REQUEST['adddonecard'])) 
    {
        if ($_REQUEST['donecardtitle']=="") 
        {
            echo '<script type="text/javascript">alert("Card Name cannot be Empty!!!");</script>';
        }
        else
        {
            $done_card_description= $done_card_label =$done_card_labelcolor =$done_card_duedate=$done_card_member="";

            $done_card_title = $_REQUEST['donecardtitle'];
            $done_card_description = $_REQUEST['donecarddescription'];
            $done_card_label = $_REQUEST['donecardlabel'];
            $done_card_labelcolor = $_REQUEST['donecardlabelcolor'];
            $done_card_duedate = $_REQUEST['donecardduedate'];
            $done_card_member = $_REQUEST['donecardmember'];

            $done_query="insert into tblcard values(null,'$done_card_title','$done_card_label','$done_card_labelcolor','$done_card_duedate',now(),'$done_card_description',3,'$bid',1,100)";
            $run_done = mysqli_query($con,$done_query);
            $done1= mysqli_insert_id($con);

            if($run_done)
            {
                if ($done1) 
                {
                    $query1_done="INSERT into tblmembercard values(null,'$done_card_member','$done1')";
                    $run_donecard = mysqli_query($con,$query1_done);
                    if($run_donecard)
                    {
                        if ($done_card_member==0) 
                        {
                           header("location:board.php?Bid=$bid");
                        }
                        else
                        {
                            $suser="SELECT tbluser.Email,tbluser.Fname,tbluser.Lname, tblboard.Btitle from tbluser,tblboard where tbluser.Uid='$done_card_member' AND tblboard.Bid='$bid'" ;
                            $run_suser = mysqli_query($con,$suser);
                            if($run_suser->num_rows!=0)
                            {  
                                $row_suser=$run_suser->fetch_array();
                                
                                    $usfirst=$row_suser['Fname'];
                                    $uslast=$row_suser['Lname'];
                                    $usemail=$row_suser['Email'];
                                    $boname=$row_suser['Btitle'];

                                    $subject = "Easework";
                                    $body = "Hi, $usfirst $uslast. $senduser $senduser1 added you to a new card-$done_card_title on Board-$boname. Please Login to Check Your Activities : http://localhost/Task-Management/login.php";
                                    $headers = "From: poojakusingh35@gmail.com";
                                    mail($usemail, $subject, $body, $headers);
                                
                                header("location:board.php?Bid=$bid");
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
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <title>Easework- Board Page</title>
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
                    <button type="submit" name="showdescriptionadd" class="btn cancel">Add</button>&nbsp;&nbsp;&nbsp;
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

    <!-- start Todo card details popup -->
    <div id="cardTodoDetails" class="modal" >
        <div class="modal-content" style="width: 50%; height: 80%; overflow: auto;">

            <div class="modal-body">
                <!-- Start Form Details -->  
                <h5 style="text-align: center;" class="w3-text-blue">CARD DETAILS - TODO LIST</h5>

                <form class="w3-container w3-card-4"action="" style="padding-top: 20px;" method="POST" enctype="multipart/form-data">
                    <!-- Start Card Name Input -->
                    <div class="row" style="padding-left:50px;" >
                      <div class="col-25">   
                          <label class="w3-text-black"><b>Title</b></label>
                      </div>
                      <div class="col-75">
                        <input class="w3-input w3-border" style="width: 320px; height: 40px;" name="todocardtitle" type="text">
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
                          <textarea name="todocarddescription" id="description" rows="4" class="w3-input w3-border" style="width: 320px; background-color: white;" placeholder="Description ..."></textarea>
                      </div>
                    </div>
                    <!-- End Description Input -->

                    <?php

                        $selecttodomember = " SELECT * FROM tblboard Where IsActive=1 AND Bid=$bid ";  
                        $result_selecttodomember = mysqli_query($con,$selecttodomember);
                        if($result_selecttodomember ->num_rows!=0)
                        {  
                                $row_todomember=mysqli_fetch_array($result_selecttodomember);
                                $btid=$row_todomember['Tid'];
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
                                                <select id="country" name="todocardmember" style="width:320px; height: 45px;">
                                                    <option value="0" disabled selected>--Select--</option>
                                                <?php        
                                                    $todomember = "SELECT * FROM tbluser Where IsActive=1 AND Uid IN (SELECT Uid FROM tblteammember Where Bid=$bid)";  
                                                    $result_todomember  = mysqli_query($con,$todomember );
                                                    if($result_todomember ->num_rows!=0)
                                                    {  
                                                        while($row_todomember =$result_todomember ->fetch_array())  
                                                        {
                                                            $member=$row_todomember['Uid'];
                                                            $fname=$row_todomember['Fname'];
                                                            $lname=$row_todomember['Lname'];
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
                        <input class="w3-input w3-border" placeholder="Enter label name" name="todocardlabel" type="text" style="width: 320px; height: 40px;">                                                
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
                            <input type="color" name="todocardlabelcolor" style="width: 320px; height: 40px;">                      
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
                        <input type="date" id="birthdaytime" name="todocardduedate" style="width:320px; height: 45px;" class="w3-input w3-border">
                      </div>
                    </div>
                    <!-- End Due Date Input --> 

                    <hr style="border-top: 1px solid #bbb;">

                    <div>
                        <center>
                            <button type="submit" name="addtodocard" class="btn btn-success" style="width:150px;">Save</button>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <a href="#" class="btn btn-danger" onclick="cardcloseTodoForm()" style="background-color: red; width:150px;" >Cancel</a>
                            <p></p>
                        </center>
                    </div>
                    <!-- End Button Input -->
              
                </form>
              <!--End Form Details -->
            </div> 

        </div>
    </div>
    <!-- end Todo card details popup -->

    <!-- start Doing card details popup -->
    <div id="cardDoingDetails" class="modal" >
        <div class="modal-content" style="width: 50%; height: 80%; overflow: auto;">

            <div class="modal-body">
                <!-- Start Form Details -->  
                <h5 style="text-align: center;" class="w3-text-blue">CARD DOING DETAILS</h5>

                <form class="w3-container w3-card-4"action="" style="padding-top: 20px;" method="POST" enctype="multipart/form-data">

                    <!-- Start Card Name Input -->
                    <div class="row" style="padding-left:50px;" >
                      <div class="col-25">   
                          <label class="w3-text-black"><b>Title</b></label>
                      </div>
                      <div class="col-75">
                        <input class="w3-input w3-border" style="width: 320px; height: 40px;" name="doingcardtitle" type="text">
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
                          <textarea name="doingcarddescription" id="description" rows="4" class="w3-input w3-border" style="width: 320px; background-color: white;" placeholder="Description ..."></textarea>
                      </div>
                    </div>
                    <!-- End Description Input -->

                   <?php

                        $selectdoingmember = " SELECT * FROM tblboard Where IsActive=1 AND Bid=$bid ";  
                        $result_selectdoingmember = mysqli_query($con,$selectdoingmember);
                        if($result_selectdoingmember ->num_rows!=0)
                        {  
                                $row_doingmember=mysqli_fetch_array($result_selectdoingmember);
                                $btid=$row_doingmember['Tid'];
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
                                                <select id="country" name="doingmember" style="width:320px; height: 45px;">
                                                    <option value="0" disabled selected>--Select--</option>
                                                <?php        
                                                    $doingmember = "SELECT * FROM tbluser Where IsActive=1 AND Uid IN (SELECT Uid FROM tblteammember Where Bid=$bid)";  
                                                    $result_doingmember  = mysqli_query($con,$doingmember );
                                                    if($result_doingmember ->num_rows!=0)
                                                    {  
                                                        while($row_doingmember =$result_doingmember ->fetch_array())  
                                                        {
                                                            $member=$row_doingmember['Uid'];
                                                            $fname=$row_doingmember['Fname'];
                                                            $lname=$row_doingmember['Lname'];
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
                        <input class="w3-input w3-border" placeholder="Enter label name" name="doingcardlabel" type="text" style="width: 320px; height: 40px;">                                                
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
                            <input type="color" name="doingcardlabelcolor" style="width: 320px; height: 40px;">                      
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
                        <input type="date" id="birthdaytime" name="doingcardduedate" style="width:320px; height: 45px;" class="w3-input w3-border">
                      </div>
                    </div>
                    <!-- End Due Date Input --> 

                    <hr style="border-top: 1px solid #bbb;">

                    <!-- Start Button Input -->  
                    <div>
                        <center>
                            <button type="submit" name="adddoingcard" class="btn btn-success" style="width:150px;">Save</button>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <a href="#" class="btn btn-danger" onclick="cardcloseDoingForm()" style="background-color: red; width:150px;" >Cancel</a>
                            <p></p>
                        </center>
                    </div>
                    <!-- End Button Input -->
              
                </form>
              <!--End Form Details -->
            </div> 

        </div>
    </div>
    <!-- End Doing card details popup -->

    <!-- start Done card details popup -->
    <div id="cardDoneDetails" class="modal" >
        <div class="modal-content" style="width: 50%; height: 80%; overflow: auto;">

            <div class="modal-body">
                <!-- Start Form Details -->  
                <h5 style="text-align: center;" class="w3-text-blue">CARD DONE DETAILS</h5>

                <form class="w3-container w3-card-4"action="" style="padding-top: 20px;" method="POST" enctype="multipart/form-data">

                    <!-- Start Card Name Input -->
                    <div class="row" style="padding-left:50px;" >
                      <div class="col-25">   
                          <label class="w3-text-black"><b>Title</b></label>
                      </div>
                      <div class="col-75">
                        <input class="w3-input w3-border" style="width: 320px; height: 40px;" name="donecardtitle" type="text">
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
                          <textarea name="donecarddescription" id="description" rows="4" class="w3-input w3-border" style="width: 320px; background-color: white;" placeholder="Description ..."></textarea>
                      </div>
                    </div>
                    <!-- End Description Input -->

                    <?php

                        $selectdonemember = " SELECT * FROM tblboard Where IsActive=1 AND Bid=$bid ";  
                        $result_selectdonemember = mysqli_query($con,$selectdonemember);
                        if($result_selectdonemember ->num_rows!=0)
                        {  
                                $row_donemember=mysqli_fetch_array($result_selectdonemember);
                                $btid=$row_donemember['Tid'];
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
                                                <select id="country" name="donecardmember" style="width:320px; height: 45px;">
                                                    <option value="0" disabled selected>--Select--</option>
                                                <?php        
                                                    $donemember = "SELECT * FROM tbluser Where IsActive=1 AND Uid IN (SELECT Uid FROM tblteammember Where Bid=$bid)";  
                                                    $result_donemember  = mysqli_query($con,$donemember );
                                                    if($result_donemember ->num_rows!=0)
                                                    {  
                                                        while($row_donemember =$result_donemember ->fetch_array())  
                                                        {
                                                            $member=$row_donemember['Uid'];
                                                            $fname=$row_donemember['Fname'];
                                                            $lname=$row_donemember['Lname'];
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
                        <input class="w3-input w3-border" placeholder="Enter label name" name="donecardlabel" type="text" style="width: 320px; height: 40px;">                                                
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
                            <input type="color" name="donecardlabelcolor" style="width: 320px; height: 40px;">                      
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
                        <input type="date" id="birthdaytime" name="donecardduedate" style="width:320px; height: 45px;" class="w3-input w3-border">
                      </div>
                    </div>
                    <!-- End Due Date Input --> 

                    <hr style="border-top: 1px solid #bbb;">

                    <!-- Start Button Input -->  
                    <div>
                        <center>
                            <button type="submit" name="adddonecard" class="btn btn-success" style="width:150px;">Save</button>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <a href="#" class="btn btn-danger" onclick="cardcloseDoneForm()" style="background-color: red; width:150px;" >Cancel</a>
                            <p></p>
                        </center>
                    </div>
                    <!-- End Button Input -->
              
                </form>
              <!--End Form Details -->
            </div> 

        </div>
    </div>
    <!-- End Done card details popup -->

</head>

<body class="layout-default trello">


    <div class="preloader"></div>

    <!-- Start DATABASE BACKGROUND IMAGE CHANGE -->
    <?php
       	$backgrounddata = "SELECT * FROM tblboard Where Bid=$bid AND IsActive=1";  
		$result_backgrounddata = mysqli_query($con,$backgrounddata);
		if($result_backgrounddata->num_rows!=0)
		{  
			while($row_backgrounddata=$result_backgrounddata->fetch_array())  
			{
			    $bbackground=$row_backgrounddata['Background'];

			    if($bbackground=="" || !file_exists("$bbackground"))
			    {
			        $bbackground="images/T7MH5H.jpg";
			    }      
	?>
					<!--start whole page-->
    				<div class="mdk-header-layout js-mdk-header-layout" style="background-image: url(<?php echo $bbackground; ?>); background-repeat: repeat;">
	<?php
       		}
  		}
    ?>
    
    <!-- END DATABASE BACKGROUND IMAGE CHANGE -->

       <!-- Header -->
            <?php include_once('header1.php'); ?>
        <!--END Header -->

        <?php

	        $selectmlist="SELECT * from tblteammember where Bid=$bid";
	    	$result_selectmlist= mysqli_query($con,$selectmlist);
	        if($result_selectmlist->num_rows!=0)
	       	{ 
	       		while ($row_selectmlist=$result_selectmlist->fetch_array()) 
	       		{
	       		 	$tmuid=$row_selectmlist['Uid'];

	       		 	if ($tmuid==$uid) 
	       		 	{
	    ?>
				        <!-- Start container from second header -->
				        <div class="mdk-header-layout__content" style="overflow-y: auto;">
		<?php
					}
					else
					{
		?>
						<!-- Start container from second header -->
				        <div class="mdk-header-layout__content" style="overflow-y: auto; pointer-events: none;">
		<?php
					}
				}
			}
		?>

            <!-- Start DATABASE IN SECOND HEADER -->
            <?php
                $boarddata = "SELECT * FROM tblboard, tblteam Where Bid=$bid AND tblboard.Tid=tblteam.Tid AND tblboard.IsActive=1";  
                $result_data = mysqli_query($con,$boarddata);
                if($result_data->num_rows!=0)
                {  
                    while($row_board=$result_data->fetch_array())  
                    {
                        $boardid=$row_board['Bid'];
                        $btitle=$row_board['Btitle'];  
                        $btid=$row_board['Tid'];
                        $isactive=$row_board['IsActive'];
                        $tname=$row_board['Tname'];
                        $bdescription=$row_board['BoardDescription'];
                        $bvisibilty=$row_board['Visibility']; 

                        if ($btid==1) 
                        {
            ?>
                            <!-- start second header content -->
                            <div class="w3-bar" style="background: rgb(120,120,120); margin-top: 60px;">         
            <?php
                        }
                        else
                        {
            ?>
                            <!-- start second header content -->
                            <div class="w3-bar" style="background: rgb(120,120,120); "> 
            <?php
                        }
            ?>

                    
                        <p></p>
                            <div style="float: left; margin-left: 20px; margin-bottom: 10px;">
                                <center>
                                    <h5 style="color: white;"><?php echo $btitle; ?></h5>
                                    <small style="color: white;">
                                    	<?php
                                    		if ($btid==1) 
                                    		{
                                    	?>
                                    			<a href="individual_board.php?Uid=<?php echo $uid;?>">
                                    	<?php
                                    		}
                                    		else
                                    		{
                                    	?>
                                    			<a href="Team_boards.php?Tid=<?php echo $btid;?>">
                                    	<?php
                                    		}
                                    	?>
		                                            <strong><?php echo $tname; ?></strong>
		                                        </a>
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
                                                <textarea name="description" id="description" rows="7" style="width: 320px; background-color: white; " disabled=""><?php echo $bdescription; ?></textarea>

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
                        <!--START VIEW DATABASE FOR COMPLETE AND DELETE BUTTON AT THE TOP OF THE PAGE (SHOW MENU) -->
                        <div>
                            <form method="POST" enctype="multipart/form-data" action="" class="form-container">
                            <button type="submit" name="completebutton" class="w3-button w3-black w3-round" style="float: left; width: 140px;">Complete Board</button>
                            <button type="button" name="deletebutton" class="w3-button w3-black w3-round" style="float: right; margin-right: 270px; width: 140px;" onclick="deleteopen()">Delete Board</button>
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
                            <!--END VIEW DATABASE FOR COMPLETE AND DELETE BUTTON AT THE TOP OF THE PAGE (SHOW MENU) -->

                                        </div></center>
                                    </div>
                            </div>

                            &nbsp;

                            <!-- START DATABASE TO SHOW THE VISIBILITY OF THE BOARD -->
                            <div class="dropdown w3-right">
                                <div class="w3-dropdown-click w3-right">
                                    <select class="w3-button " id="country" name="country" style="height: 35px; width: 110px;">
                                <?php
                                    if ($bvisibilty == "Public") 
                                    {
                                ?>
                                        <option value="Private" >Private</option>
                                        <option value="Team">Team</option>
                                        <option value="Public" selected>Public</option>
                                <?php
                                    }
                                    if ($bvisibilty == "Private") 
                                    {
                                ?>
                                        <option value="Private" selected>Private</option>
                                        <option value="Team">Team</option>
                                        <option value="Public">Public</option>
                                <?php
                                    }
                                    if ($bvisibilty == "Team") 
                                    {
                                ?>
                                        <option value="Private" >Private</option>
                                        <option value="Team" selected>Team</option>
                                        <option value="Public">Public</option>
                                <?php
                                    }
                                    else
                                    {
                                ?>
                                        <option value="visibility" selected disabled >Visibility</option>
                                        <option value="Private" >Private</option>
                                        <option value="Team">Team</option>
                                        <option value="Public">Public</option>
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
                                            $boardmember = "SELECT * FROM tbluser Where IsActive=1 AND Uid IN (SELECT Uid FROM tblteammember Where Bid=$bid)";  
                                            $result_boardmember = mysqli_query($con,$boardmember);
                                            if($result_boardmember->num_rows!=0)
                                                {  
                                                    while($row_boardmember=$result_boardmember->fetch_array())  
                                                    {
                                                        $member=$row_boardmember['Uid'];
                                                        $fname=$row_boardmember['Fname'];
                                                        $lname=$row_boardmember['Lname'];
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
                            <a href="calendar.php" class="w3-bar-item w3-button w3-right" style="color: black;">Calendar</a>
                            <a href="gantt_chart.php?Bid=<?php echo $bid;?>" class="w3-bar-item w3-button w3-right" style="color: black;">Gantt</a>
                            <a href="report.php" class="w3-bar-item w3-button w3-right" style="color: black;">Report</a>  
                    </div>
                    <!-- End second Header Content -->

            <?php 
                    }
                }
            ?>
           <!-- END DATABASE IN SECOND HEADER -->

            <br><br>

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
            
                <div class="trello-board container-fluid page__container">

                    <!-- Start Todo list-->
                    <div class="trello-board__tasks" data-toggle="dragula" data-dragula-containers='["#trello-tasks-1", "#trello-tasks-2", "#trello-tasks-3"]'>
                        
                        <div class="card bg-light border">

                            <!-- Start list name-->
                            <div class="card-header card-header-sm bg-white">
                                <h4 class="card-header__title">Todo</h4>
                            </div>
                            <!-- End list name-->

                            <!-- Start Todo card Section-->
                            <div class="card-body p-2">
                                <div class="trello-board__tasks-list card-list" id="trello-tasks-1" >

                                <?php
                                    $selecttodoquery = "SELECT * FROM tblcard Where Listid=1 AND Bid='$bid'";  
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
                                    <!-- Start Todo card 1-->
                                    <div class="trello-board__tasks-item card shadow-none border" data-toggle="modal" data-target="#exampleModal" onclick="location.href='cards.php?Cardid=<?php echo $cardid;?>&Bid=<?php echo $bid;?>';">
                                        <div class="p-3">
                                            <p class="m-0 d-flex align-items-center">
                                                <strong><?php echo $cardname; ?></strong> 
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
                                                <span class="text-muted mr-3"><?php echo $cardduedate; ?></span>
                                            </p>
                                            <?php
                                                $selecttodomem = "SELECT * FROM tbluser WHERE Uid IN (SELECT Uid from tblmembercard WHERE Cardid='$cardid')";  
                                                $result_todomem = mysqli_query($con,$selecttodomem);
                                                if($result_todomem->num_rows!=0)
                                                {  
                                                    $row_todomem=mysqli_fetch_array($result_todomem);
                                                    $ufname=$row_todomem['Fname'];
                                                    $ulname=$row_todomem['Lname'];
                                                    $upropic=$row_todomem['ProfilePic'];

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
                                    <!-- End Todo card 1-->
                                <?php
                                        }
                                    }
                                ?>

                                </div>

                                <a href="#" class="btn btn-light btn-block mt-2" onclick="cardopenTodoForm()">Add Card</a>
                                <!-- Start card details popup fuction-->
                                <script>
                                    function cardopenTodoForm() {
                                      document.getElementById("cardTodoDetails").style.display = "flex";
                                    }
                                    function cardcloseTodoForm() {
                                      document.getElementById("cardTodoDetails").style.display = "none";
                                    }
                                </script>
                                <!-- End card details popup fuction-->

                            </div>
                            <!-- End Todo card Section-->

                        </div>
                    </div>
                    <!-- End Todo list-->

                    <!-- Start Doing list-->
                    <div class="trello-board__tasks">
                        <div class="card bg-light border">

                            <!-- Start list name-->
                            <div class="card-header card-header-sm bg-white">
                                <h4 class="card-header__title">Doing</h4>
                            </div>
                            <!-- End list name-->

                            <!-- Start Doing card Section-->
                            <div class="card-body p-2">
                                <div class="trello-board__tasks-list card-list" id="trello-tasks-2">
                                <?php
                                    $selectdoingquery = "SELECT * FROM tblcard Where Listid=2 AND Bid='$bid'";  
                                    $result_doing = mysqli_query($con,$selectdoingquery);
                                    if($result_doing->num_rows!=0)
                                    {  
                                        while($row_doing=$result_doing->fetch_array())  
                                        {
                                            $cardname=$row_doing['CardName'];
                                            $cardlabel=$row_doing['Label'];  
                                            $cardlabelcolor=$row_doing['LabelColor'];
                                            $cardduedate=$row_doing['DueDate']; 
                                            $cardid=$row_doing['Cardid'];
  
                                ?>

                                    <!-- Start Doing card 1-->
                    <div class="trello-board__tasks-item card shadow-none border" data-toggle="modal" data-target="#exampleModal" onclick="location.href='cards.php?Cardid=<?php echo $cardid;?>&Bid=<?php echo $bid;?>';">
                                        <div class="p-3">
                                            <p class="m-0 d-flex align-items-center">
                                                <strong><?php echo $cardname; ?></strong> 
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
                                                <span class="text-muted mr-3"><?php echo $cardduedate; ?></span>
                                            </p>

                                            <?php
                                                $selectdoingmem = "SELECT * FROM tbluser WHERE Uid IN (SELECT Uid from tblmembercard WHERE Cardid='$cardid')";  
                                                $result_doingmem = mysqli_query($con,$selectdoingmem);
                                                if($result_doingmem->num_rows!=0)
                                                {  
                                                    $row_doingmem=mysqli_fetch_array($result_doingmem);
                                                    $udoingfname=$row_doingmem['Fname'];
                                                    $udoinglname=$row_doingmem['Lname'];
                                                    $udoingpropic=$row_doingmem['ProfilePic'];

                                                    if($udoingpropic=="" || !file_exists("images/profile/$udoingpropic"))
                                                    {
                                                        $udoingpropic="No.png";
                                                    }
                                                            
                                            ?>

                                                        <div class="media align-items-center" style="float: right;">
                                                            <div class=" mr-2 avatar-group" >
                                                                <div class="avatar avatar-xs" data-toggle="tooltip" data-placement="top" title="<?php echo $udoingfname." ".$udoinglname;?>">
                                                                    <img src="images/profile/<?php echo $udoingpropic; ?>" alt="Avatar" class="avatar-img rounded-circle">
                                                                </div>
                                                            </div>
                                                        </div>
                                            <?php 
                                                }
                                            ?>
                                        </div>
                                    </div>
                                    <!-- End Doing card 1-->
                                <?php 
                                        }
                                    }
                                ?>
                                </div>
                                <a href="#" class="btn btn-light btn-block mt-2" onclick="cardopenDoingForm()">Add Card</a>

                                <!-- Start card details popup fuction-->
                                <script>
                                    function cardopenDoingForm() {
                                      document.getElementById("cardDoingDetails").style.display = "flex";
                                    }
                                    function cardcloseDoingForm() {
                                      document.getElementById("cardDoingDetails").style.display = "none";
                                    }
                                </script>
                                <!-- End card details popup fuction-->
                            </div>
                            <!-- End Doing card Section-->

                        </div>
                    </div>
                    <!-- End Doing list-->
                    
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
                                <div class="trello-board__tasks-list card-list" id="trello-tasks-3">

                                <?php
                                    $selectdonequery = "SELECT * FROM tblcard Where Listid=3 AND Bid='$bid'";  
                                    $result_done = mysqli_query($con,$selectdonequery);
                                    if($result_done->num_rows!=0)
                                    {  
                                        while($row_done=$result_done->fetch_array())  
                                        {
                                            $cardname=$row_done['CardName'];
                                            $cardlabel=$row_done['Label'];  
                                            $cardlabelcolor=$row_done['LabelColor'];
                                            $cardduedate=$row_done['DueDate'];
                                            $cardid=$row_done['Cardid']; 
  
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
                                                <span class="text-muted mr-3"><?php echo $cardduedate; ?></span>
                                            </p>

                                            <?php
                                                $selectdonemem = "SELECT * FROM tbluser WHERE Uid IN (SELECT Uid from tblmembercard WHERE Cardid='$cardid')";  
                                                $result_donemem = mysqli_query($con,$selectdonemem);
                                                if($result_donemem->num_rows!=0)
                                                {  
                                                    $row_donemem=mysqli_fetch_array($result_donemem);
                                                    $ufname=$row_donemem['Fname'];
                                                    $ulname=$row_donemem['Lname'];
                                                    $upropic=$row_donemem['ProfilePic'];

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
                                    <!-- End Done card 1-->
                                <?php 
                                        }
                                    }
                                ?>

                                </div>
                                <a href="#" class="btn btn-light btn-block mt-2" onclick="cardopenDoneForm()">Add Card</a>

                                <!-- Start card details popup fuction-->
                                <script>
                                    function cardopenDoneForm() {
                                      document.getElementById("cardDoneDetails").style.display = "flex";
                                    }
                                    function cardcloseDoneForm() {
                                      document.getElementById("cardDoneDetails").style.display = "none";
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

    </div>
    <!-- // END whole page -->

    <!-- jQuery -->
    <?php include_once('scriptlinks.php');?>

</body>


<!-- Mirrored from demo.frontted.com/stackadmin/133/app-trello.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 28 May 2020 07:53:33 GMT -->
</html>