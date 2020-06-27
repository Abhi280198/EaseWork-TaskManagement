<?php include_once("DbConnection.php");
    $bid=$_GET['Bid'];
    /*$listid =$_SESSION["Listid"];*/
    /*$cardid=$_GET['Cardid'];*/

/*Start database complete board button (SHOW MENU)*/
    if (isset($_REQUEST['completebutton'])) 
    {
        $Updateisactive = "UPDATE tblboard set IsActive=0 where Bid='$bid' ";
        $Exe_updateisactive=mysqli_query($con,$Updateisactive)or die(mysqli_error($con));
?>
        <script type="text/javascript">
                alert("Board Completed Successfully");
                window.location.href = 'Complete.php';
        </script>
<?php
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
            /*$tocardid=*/$trip_card_description= $trip_card_label =$trip_card_labelcolor =$trip_card_duedate="";

        
            $trip_card_title = $_REQUEST['beforetripTitle'];
            $trip_card_description = $_REQUEST['beforetripdescription'];
            $trip_card_label = $_REQUEST['beforetriplabel'];
            $trip_card_labelcolor = $_REQUEST['beforetriplabelcolor'];
            $trip_card_duedate = $_REQUEST['beforetripduedate'];
            /*$todolistid=$_FETCH['Listid'];*/
            
                $trip_query="insert into tblcard values(null,'$trip_card_title','$trip_card_label','$trip_card_labelcolor','$trip_card_duedate',now(),'$trip_card_description',8,'$bid',1)";
                $run_trip = mysqli_query($con,$trip_query);

                if($run_trip)
                {
                    header("location:Personal_template.php?Bid=$bid");
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
            $holiday_card_description= $holiday_card_label =$holiday_card_labelcolor =$holiday_card_duedate="";

            $holiday_card_title = $_REQUEST['holidaycardtitle'];
            $holiday_card_description = $_REQUEST['holidaycarddescription'];
            $holiday_card_label = $_REQUEST['holidaycardlabel'];
            $holiday_card_labelcolor = $_REQUEST['holidaycardlabelcolor'];
            $holiday_card_duedate = $_REQUEST['holidaycardduedate'];

            $holiday_query="insert into tblcard values(null,'$holiday_card_title','$holiday_card_label','$holiday_card_labelcolor','$holiday_card_duedate',now(),'$holiday_card_description',9,'$bid',1)";
            $run_holiday = mysqli_query($con,$holiday_query);

            if($run_holiday)
            {
                header("location:Personal_template.php?Bid=$bid");
            }
            else{
                echo "error".mysqli_error($con);   
            }
        }   
    } 
    /*END DATABASE INSERT DATA THROUGH ADD CARD BUTTON IN (DOING LIST)*/

    /*START DATABASE INSERT DATA THROUGH ADD CARD BUTTON IN (DONE LIST)*/
    if (isset($_REQUEST['adddeatcard'])) 
    {
        if ($_REQUEST['eatcardtitle']=="") 
        {
            echo '<script type="text/javascript">alert("Card Name cannot be Empty!!!");</script>';
        }
        else
        {
            $eat_card_description= $eat_card_label =$eat_card_labelcolor =$eat_card_duedate="";

            $eat_card_title = $_REQUEST['eatcardtitle'];
            $eat_card_description = $_REQUEST['eatcarddescription'];
            $eat_card_label = $_REQUEST['eatcardlabel'];
            $eat_card_labelcolor = $_REQUEST['eatcardlabelcolor'];
            $eat_card_duedate = $_REQUEST['eatcardduedate'];

            $done_query="insert into tblcard values(null,'$eat_card_title','$eat_card_label','$eat_card_labelcolor','$eat_card_duedate',now(),'$eat_card_description',10,'$bid',1)";
            $run_done = mysqli_query($con,$done_query);

            if($run_done)
            {
                header("location:Personal_template.php?Bid=$bid");
            }
            else{
                echo "error".mysqli_error($con);   
            }
        }   
    } 
    /*END DATABASE INSERT DATA THROUGH ADD CARD BUTTON IN (DONE LIST)*/


/*START DATABASE INSERT DATA THROUGH ADD CARD BUTTON IN (PERSONAL DONE LIST)*/
    if (isset($_REQUEST['adddpersonaldonecard'])) 
    {
        if ($_REQUEST['personalcardtitle']=="") 
        {
            echo '<script type="text/javascript">alert("Card Name cannot be Empty!!!");</script>';
        }
        else
        {
            $personal_card_description= $personal_card_label =$personal_card_labelcolor =$personal_card_duedate="";

            $personal_card_title = $_REQUEST['personalcardtitle'];
            $personal_card_description = $_REQUEST['personalcarddescription'];
            $personal_card_label = $_REQUEST['personalcardlabel'];
            $personal_card_labelcolor = $_REQUEST['personalcardlabelcolor'];
            $personal_card_duedate = $_REQUEST['personalcardduedate'];

            $done_query="insert into tblcard values(null,'$personal_card_title','$personal_card_label','$personal_card_labelcolor','$personal_card_duedate',now(),'$personal_card_description',11,'$bid',1)";
            $run_done = mysqli_query($con,$done_query);

            if($run_done)
            {
                header("location:Personal_template.php?Bid=$bid");
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

                    <hr style="border-top: 1px solid #bbb;">

                    <!-- Start Checklist Input -->
                    <div class="row" style="padding-left:50px;" >  
                        <div class="col-25">  
                            <label class="w3-text-black"><b>Checklist</b></label>
                        </div>
                        <div class="col-75">
                            <div id="myDIV" class="header" style="" >
                                <input class="w3-input w3-border" style="width:250px; height: 40px; float: left;" name="cardchecklist" id="myInput" type="text">
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <span class="w3-button w3-black w3-round" onclick="newElement()" style="float: right; margin-right: 30px; width: 100px;">Add Item</span>
                            </div>

                            <ul id="myUL">
                               <!-- <li id="ul-container"></li>  -->
                            </ul>

                            <script>
                                // Create a "close" button and append it to each list item
                                var myNodelist = document.getElementsByTagName("LI");
                                var i;
                                for (i = 0; i < myNodelist.length; i++) 
                                {
                                    var span = document.createElement("SPAN");
                                    var txt = document.createTextNode("\u00D7");
                                    span.className = "close";
                                    span.appendChild(txt);
                                    myNodelist[i].appendChild(span);
                                }

                                // Click on a close button to hide the current list item
                                var close = document.getElementsByClassName("close");
                                var i;
                                for (i = 0; i < close.length; i++) 
                                {
                                    close[i].onclick = function() 
                                    {
                                        var div = this.parentElement;
                                        div.style.display = "none";
                                    }
                                }

                                // Add a "checked" symbol when clicking on a list item
                                var list = document.querySelector('ul');
                                list.addEventListener('click', function(ev)
                                {
                                    if (ev.target.tagName === 'LI') 
                                    {
                                        ev.target.classList.toggle('checked');
                                    }
                                }, false);

                                // Create a new list item when clicking on the "Add" button
                                function newElement() 
                                {
                                    var li = document.createElement("li");
                                    var inputValue = document.getElementById("myInput").value;
                                    var t = document.createTextNode(inputValue);
                                    li.appendChild(t);
                                    if (inputValue === '') 
                                    {
                                        alert("You must write something!");
                                    } else {
                                        document.getElementById("myUL").appendChild(li);
                                    }
                                    document.getElementById("myInput").value = "";

                                    var span = document.createElement("SPAN");
                                    var txt = document.createTextNode("\u00D7");
                                    span.className = "close";
                                    span.appendChild(txt);
                                    li.appendChild(span);

                                    for (i = 0; i < close.length; i++) 
                                    {
                                        close[i].onclick = function() 
                                        {
                                            var div = this.parentElement;
                                            div.style.display = "none";
                                        }
                                    }
                                }
                            </script>

                        </div>
                    </div>
                    <!--End Checklist Input -->

                    <hr style="border-top: 1px solid #bbb;">

                    <!-- Start Member List Input -->                                                     
                    <div class="row" style="padding-left:50px;" >
                        <div class="col-25">     
                            <label class="w3-text-black"><b>Members</b></label>
                        </div>
                        <div class="col-75">
                            <select id="member" name="cardmember" style="width:320px; height: 45px;">
                              <option value="todo">To Do</option>
                              <option value="doing">Doing</option>
                              <option value="done">Done</option>
                            </select>

                        </div>
                    </div>
                    <!-- End Member List Input --> 
                    
                    <hr style="border-top: 1px solid #bbb;">

                    <!-- Start Label Input --> 
                    <!-- <div class="row" style="padding-left:50px;" >
                      <div class="col-25">     
                        <label class="w3-text-black"><b>Labels</b></label>
                      </div>
                      <div class="col-75" >
                        <select style="width:320px; height: 45px;">
                          <option class="p-3 mb-2 bg-primary text-white">High Priority</option>
                          <option class="p-3 mb-2 bg-secondary text-white">Solved</option>
                          <option class="p-3 mb-2 bg-success text-white">Need Hep</option>
                          <option class="p-3 mb-2 bg-danger text-white">Completed</option>
                          <option class="p-3 mb-2 bg-warning text-dark">Warning</option>
                        </select>
                        <!--<div class="p-3 mb-2 bg-success text-white">.bg-success</div>
                            <div class="p-3 mb-2 bg-danger text-white">.bg-danger</div>
                            <div class="p-3 mb-2 bg-warning text-dark">.bg-warning</div>
                            <div class="p-3 mb-2 bg-info text-white">.bg-info</div>
                            <div class="p-3 mb-2 bg-light text-dark">.bg-light</div>
                            <div class="p-3 mb-2 bg-dark text-white">.bg-dark</div>
                            <div class="p-3 mb-2 bg-white text-dark">.bg-white</div> -->                                                    
                      <!-- </div>
                    </div>  -->

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
                            <button type="submit" name="addtodocardtrip"class="btn btn-success" style="width:150px;">Save</button>
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

                    <hr style="border-top: 1px solid #bbb;">

                    <!-- Start Checklist Input -->
                    <div class="row" style="padding-left:50px;" >  
                        <div class="col-25">  
                            <label class="w3-text-black"><b>Checklist</b></label>
                        </div>
                        <div class="col-75">
                            <div id="myDIV" class="header" style="" >
                                <input class="w3-input w3-border" style="width:250px; height: 40px; float: left;" name="holidaycardchecklist" id="myInput" type="text">
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <span class="w3-button w3-black w3-round" onclick="newElement()" style="float: right; margin-right: 30px; width: 100px;">Add Item</span>
                            </div>

                            <ul id="myUL">
                               <!-- <li id="ul-container"></li>  -->
                            </ul>

                            <script>
                                // Create a "close" button and append it to each list item
                                var myNodelist = document.getElementsByTagName("LI");
                                var i;
                                for (i = 0; i < myNodelist.length; i++) 
                                {
                                    var span = document.createElement("SPAN");
                                    var txt = document.createTextNode("\u00D7");
                                    span.className = "close";
                                    span.appendChild(txt);
                                    myNodelist[i].appendChild(span);
                                }

                                // Click on a close button to hide the current list item
                                var close = document.getElementsByClassName("close");
                                var i;
                                for (i = 0; i < close.length; i++) 
                                {
                                    close[i].onclick = function() 
                                    {
                                        var div = this.parentElement;
                                        div.style.display = "none";
                                    }
                                }

                                // Add a "checked" symbol when clicking on a list item
                                var list = document.querySelector('ul');
                                list.addEventListener('click', function(ev)
                                {
                                    if (ev.target.tagName === 'LI') 
                                    {
                                        ev.target.classList.toggle('checked');
                                    }
                                }, false);

                                // Create a new list item when clicking on the "Add" button
                                function newElement() 
                                {
                                    var li = document.createElement("li");
                                    var inputValue = document.getElementById("myInput").value;
                                    var t = document.createTextNode(inputValue);
                                    li.appendChild(t);
                                    if (inputValue === '') 
                                    {
                                        alert("You must write something!");
                                    } else {
                                        document.getElementById("myUL").appendChild(li);
                                    }
                                    document.getElementById("myInput").value = "";

                                    var span = document.createElement("SPAN");
                                    var txt = document.createTextNode("\u00D7");
                                    span.className = "close";
                                    span.appendChild(txt);
                                    li.appendChild(span);

                                    for (i = 0; i < close.length; i++) 
                                    {
                                        close[i].onclick = function() 
                                        {
                                            var div = this.parentElement;
                                            div.style.display = "none";
                                        }
                                    }
                                }
                            </script>

                        </div>
                    </div>
                    <!--End Checklist Input -->

                    <hr style="border-top: 1px solid #bbb;">

                    <!-- Start Member List Input -->                                                     
                    <div class="row" style="padding-left:50px;" >
                        <div class="col-25">     
                            <label class="w3-text-black"><b>Members</b></label>
                        </div>
                        <div class="col-75">
                            <select id="member" name="holidaycardmember" style="width:320px; height: 45px;">
                              <option value="todo">To Do</option>
                              <option value="doing">Doing</option>
                              <option value="done">Done</option>
                            </select>

                        </div>
                    </div>
                    <!-- End Member List Input --> 
                    
                    <hr style="border-top: 1px solid #bbb;">

                    <!-- Start Label Input --> 
                    <!-- <div class="row" style="padding-left:50px;" >
                      <div class="col-25">     
                        <label class="w3-text-black"><b>Labels</b></label>
                      </div>
                      <div class="col-75" >
                        <select style="width:320px; height: 45px;">
                          <option class="p-3 mb-2 bg-primary text-white">High Priority</option>
                          <option class="p-3 mb-2 bg-secondary text-white">Solved</option>
                          <option class="p-3 mb-2 bg-success text-white">Need Hep</option>
                          <option class="p-3 mb-2 bg-danger text-white">Completed</option>
                          <option class="p-3 mb-2 bg-warning text-dark">Warning</option>
                        </select>
                        <div class="p-3 mb-2 bg-success text-white">.bg-success</div>
                            <div class="p-3 mb-2 bg-danger text-white">.bg-danger</div>
                            <div class="p-3 mb-2 bg-warning text-dark">.bg-warning</div>
                            <div class="p-3 mb-2 bg-info text-white">.bg-info</div>
                            <div class="p-3 mb-2 bg-light text-dark">.bg-light</div>
                            <div class="p-3 mb-2 bg-dark text-white">.bg-dark</div>
                            <div class="p-3 mb-2 bg-white text-dark">.bg-white</div> -->                                                    
                      <!-- </div>
                    </div>  -->

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

                    <!-- Start Move to  Input --> 
                    <!-- <div class="row" style="padding-left:50px;" >
                      <div class="col-25">     
                        <label class="w3-text-black"><b>Move</b></label>
                      </div>
                      <div class="col-75" >
                        <select id="country" name="country" style="width:320px; height: 45px;">
                          <option value="todo">To Do</option>
                          <option value="doing">Doing</option>
                          <option value="done">Done</option>
                        </select>
                      </div>
                    </div> -->
                    <!-- End Move to Input -->

                    <hr style="border-top: 1px solid #bbb;">

                    <!-- Start Button Input -->  
                    <div>
                        <center>
                            <button  type="submit" name="addholidaycard"class="btn btn-success" style="width:150px;">Save</button>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <a href="#" class="btn btn-danger" onclick="cardcloseholidayForm()" style="background-color: red; width:150px;" >Cancel</a>
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
                        <input class="w3-input w3-border" style="width: 320px; height: 40px;" name="eatcardTitle" type="text">
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

                    <hr style="border-top: 1px solid #bbb;">

                    <!-- Start Checklist Input -->
                    <div class="row" style="padding-left:50px;" >  
                        <div class="col-25">  
                            <label class="w3-text-black"><b>Checklist</b></label>
                        </div>
                        <div class="col-75">
                            <div id="myDIV" class="header" style="" >
                                <input class="w3-input w3-border" style="width:250px; height: 40px; float: left;" name="eatcardchecklist" id="myInput" type="text">
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <span class="w3-button w3-black w3-round" onclick="newElement()" style="float: right; margin-right: 30px; width: 100px;">Add Item</span>
                            </div>

                            <ul id="myUL">
                               <!-- <li id="ul-container"></li>  -->
                            </ul>

                            <script>
                                // Create a "close" button and append it to each list item
                                var myNodelist = document.getElementsByTagName("LI");
                                var i;
                                for (i = 0; i < myNodelist.length; i++) 
                                {
                                    var span = document.createElement("SPAN");
                                    var txt = document.createTextNode("\u00D7");
                                    span.className = "close";
                                    span.appendChild(txt);
                                    myNodelist[i].appendChild(span);
                                }

                                // Click on a close button to hide the current list item
                                var close = document.getElementsByClassName("close");
                                var i;
                                for (i = 0; i < close.length; i++) 
                                {
                                    close[i].onclick = function() 
                                    {
                                        var div = this.parentElement;
                                        div.style.display = "none";
                                    }
                                }

                                // Add a "checked" symbol when clicking on a list item
                                var list = document.querySelector('ul');
                                list.addEventListener('click', function(ev)
                                {
                                    if (ev.target.tagName === 'LI') 
                                    {
                                        ev.target.classList.toggle('checked');
                                    }
                                }, false);

                                // Create a new list item when clicking on the "Add" button
                                function newElement() 
                                {
                                    var li = document.createElement("li");
                                    var inputValue = document.getElementById("myInput").value;
                                    var t = document.createTextNode(inputValue);
                                    li.appendChild(t);
                                    if (inputValue === '') 
                                    {
                                        alert("You must write something!");
                                    } else {
                                        document.getElementById("myUL").appendChild(li);
                                    }
                                    document.getElementById("myInput").value = "";

                                    var span = document.createElement("SPAN");
                                    var txt = document.createTextNode("\u00D7");
                                    span.className = "close";
                                    span.appendChild(txt);
                                    li.appendChild(span);

                                    for (i = 0; i < close.length; i++) 
                                    {
                                        close[i].onclick = function() 
                                        {
                                            var div = this.parentElement;
                                            div.style.display = "none";
                                        }
                                    }
                                }
                            </script>

                        </div>
                    </div>
                    <!--End Checklist Input -->

                    <hr style="border-top: 1px solid #bbb;">

                    <!-- Start Member List Input -->                                                     
                    <div class="row" style="padding-left:50px;" >
                        <div class="col-25">     
                            <label class="w3-text-black"><b>Members</b></label>
                        </div>
                        <div class="col-75">
                            <select id="member" name="eatcardmember" style="width:320px; height: 45px;">
                              <option value="todo">To Do</option>
                              <option value="doing">Doing</option>
                              <option value="done">Done</option>
                            </select>

                        </div>
                    </div>
                    <!-- End Member List Input --> 
                    
                    <hr style="border-top: 1px solid #bbb;">

                    <!-- Start Label Input --> 
                    <!-- <div class="row" style="padding-left:50px;" >
                      <div class="col-25">     
                        <label class="w3-text-black"><b>Labels</b></label>
                      </div>
                      <div class="col-75" >
                        <select style="width:320px; height: 45px;">
                          <option class="p-3 mb-2 bg-primary text-white">High Priority</option>
                          <option class="p-3 mb-2 bg-secondary text-white">Solved</option>
                          <option class="p-3 mb-2 bg-success text-white">Need Hep</option>
                          <option class="p-3 mb-2 bg-danger text-white">Completed</option>
                          <option class="p-3 mb-2 bg-warning text-dark">Warning</option>
                        </select>
                        <!--<div class="p-3 mb-2 bg-success text-white">.bg-success</div>
                            <div class="p-3 mb-2 bg-danger text-white">.bg-danger</div>
                            <div class="p-3 mb-2 bg-warning text-dark">.bg-warning</div>
                            <div class="p-3 mb-2 bg-info text-white">.bg-info</div>
                            <div class="p-3 mb-2 bg-light text-dark">.bg-light</div>
                            <div class="p-3 mb-2 bg-dark text-white">.bg-dark</div>
                            <div class="p-3 mb-2 bg-white text-dark">.bg-white</div> -->                                                    
                      <!-- </div>
                    </div>  -->

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

                    <!-- Start Move to  Input --> 
                    <!-- <div class="row" style="padding-left:50px;" >
                      <div class="col-25">     
                        <label class="w3-text-black"><b>Move</b></label>
                      </div>
                      <div class="col-75" >
                        <select id="country" name="country" style="width:320px; height: 45px;">
                          <option value="todo">To Do</option>
                          <option value="doing">Doing</option>
                          <option value="done">Done</option>
                        </select>
                      </div>
                    </div> -->
                    <!-- End Move to Input -->

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
    <div id="personaldonecardDetails" class="modal" >
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
                        <input class="w3-input w3-border" style="width: 320px; height: 40px;" name="personalcardTitle" type="text">
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

                    <hr style="border-top: 1px solid #bbb;">

                    <!-- Start Checklist Input -->
                    <div class="row" style="padding-left:50px;" >  
                        <div class="col-25">  
                            <label class="w3-text-black"><b>Checklist</b></label>
                        </div>
                        <div class="col-75">
                            <div id="myDIV" class="header" style="" >
                                <input class="w3-input w3-border" style="width:250px; height: 40px; float: left;" name="personalcardchecklist" id="myInput" type="text">
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <span class="w3-button w3-black w3-round" onclick="newElement()" style="float: right; margin-right: 30px; width: 100px;">Add Item</span>
                            </div>

                            <ul id="myUL">
                               <!-- <li id="ul-container"></li>  -->
                            </ul>

                            <script>
                                // Create a "close" button and append it to each list item
                                var myNodelist = document.getElementsByTagName("LI");
                                var i;
                                for (i = 0; i < myNodelist.length; i++) 
                                {
                                    var span = document.createElement("SPAN");
                                    var txt = document.createTextNode("\u00D7");
                                    span.className = "close";
                                    span.appendChild(txt);
                                    myNodelist[i].appendChild(span);
                                }

                                // Click on a close button to hide the current list item
                                var close = document.getElementsByClassName("close");
                                var i;
                                for (i = 0; i < close.length; i++) 
                                {
                                    close[i].onclick = function() 
                                    {
                                        var div = this.parentElement;
                                        div.style.display = "none";
                                    }
                                }

                                // Add a "checked" symbol when clicking on a list item
                                var list = document.querySelector('ul');
                                list.addEventListener('click', function(ev)
                                {
                                    if (ev.target.tagName === 'LI') 
                                    {
                                        ev.target.classList.toggle('checked');
                                    }
                                }, false);

                                // Create a new list item when clicking on the "Add" button
                                function newElement() 
                                {
                                    var li = document.createElement("li");
                                    var inputValue = document.getElementById("myInput").value;
                                    var t = document.createTextNode(inputValue);
                                    li.appendChild(t);
                                    if (inputValue === '') 
                                    {
                                        alert("You must write something!");
                                    } else {
                                        document.getElementById("myUL").appendChild(li);
                                    }
                                    document.getElementById("myInput").value = "";

                                    var span = document.createElement("SPAN");
                                    var txt = document.createTextNode("\u00D7");
                                    span.className = "close";
                                    span.appendChild(txt);
                                    li.appendChild(span);

                                    for (i = 0; i < close.length; i++) 
                                    {
                                        close[i].onclick = function() 
                                        {
                                            var div = this.parentElement;
                                            div.style.display = "none";
                                        }
                                    }
                                }
                            </script>

                        </div>
                    </div>
                    <!--End Checklist Input -->

                    <hr style="border-top: 1px solid #bbb;">

                    <!-- Start Member List Input -->                                                     
                    <div class="row" style="padding-left:50px;" >
                        <div class="col-25">     
                            <label class="w3-text-black"><b>Members</b></label>
                        </div>
                        <div class="col-75">
                            <select id="member" name="personalcardmember" style="width:320px; height: 45px;">
                              <option value="todo">To Do</option>
                              <option value="doing">Doing</option>
                              <option value="done">Done</option>
                            </select>

                        </div>
                    </div>
                    <!-- End Member List Input --> 
                    
                    <hr style="border-top: 1px solid #bbb;">

                    <!-- Start Label Input --> 
                    <!-- <div class="row" style="padding-left:50px;" >
                      <div class="col-25">     
                        <label class="w3-text-black"><b>Labels</b></label>
                      </div>
                      <div class="col-75" >
                        <select style="width:320px; height: 45px;">
                          <option class="p-3 mb-2 bg-primary text-white">High Priority</option>
                          <option class="p-3 mb-2 bg-secondary text-white">Solved</option>
                          <option class="p-3 mb-2 bg-success text-white">Need Hep</option>
                          <option class="p-3 mb-2 bg-danger text-white">Completed</option>
                          <option class="p-3 mb-2 bg-warning text-dark">Warning</option>
                        </select>
                        <!--<div class="p-3 mb-2 bg-success text-white">.bg-success</div>
                            <div class="p-3 mb-2 bg-danger text-white">.bg-danger</div>
                            <div class="p-3 mb-2 bg-warning text-dark">.bg-warning</div>
                            <div class="p-3 mb-2 bg-info text-white">.bg-info</div>
                            <div class="p-3 mb-2 bg-light text-dark">.bg-light</div>
                            <div class="p-3 mb-2 bg-dark text-white">.bg-dark</div>
                            <div class="p-3 mb-2 bg-white text-dark">.bg-white</div> -->                                                    
                      <!-- </div>
                    </div>  -->

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

                    <!-- Start Move to  Input --> 
                    <!-- <div class="row" style="padding-left:50px;" >
                      <div class="col-25">     
                        <label class="w3-text-black"><b>Move</b></label>
                      </div>
                      <div class="col-75" >
                        <select id="country" name="country" style="width:320px; height: 45px;">
                          <option value="todo">To Do</option>
                          <option value="doing">Doing</option>
                          <option value="done">Done</option>
                        </select>
                      </div>
                    </div> -->
                    <!-- End Move to Input -->

                    <hr style="border-top: 1px solid #bbb;">

                    <!-- Start Button Input -->  
                    <div>
                        <center>
                            <button  type="submit" name="addpersonaldonecard"class="btn btn-success" style="width:150px;">Save</button>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <a href="#" class="btn btn-danger" onclick="cardclosepersonaldoneForm()" style="background-color: red; width:150px;" >Cancel</a>
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

    <!-- create board popup -->

    <div class="form-popup" id="useTemplatePopup">
        <form action="/action_page.php" class="form-container">
            <div class="header">
            <h3>Create Board from this Template </h3>
                                        
            </div><br>
            <div style="margin-left: 30px;">                          
            <label for="title"><b>Title Name:</b></label>
            <input type="text" placeholder="title" name="title" required><br><br>

            <label for="title"><b>Team Name:</b></label>
            <select name = "dropdown">
            <option value = "No Team" selected>No Team</option>
            <option value = "Team names">Team names</option>
            </select>
            <br><br>
            <label for="title"><b>Visibility:</b></label>
            <select name = "dropdown">
                <option value = "Private" selected>Private</option>
                <option value = "Team">Team</option>
                <option value = "Public">Public</option>
            </select>
            </div>
            <br><br>
            <center>
                <div class="canclebtn">
                <a href="board_link.php" type="button" class="btn cancel">Create</a>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <button type="button" class="btn cancel" onclick="closeTemplatePopup()" >Cancel</button>
                </div>
            </center>
        </form>
    </div>

    <!--END board popup -->

    <div class="preloader"></div>

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


        <!-- Start container from second header -->
        <div class="mdk-header-layout__content" style="overflow-y: auto;">


            <!-- start create board link -->
            <div class="w3-bar w3-black">
                <div class="w3-bar-item" style="margin-left: 400px;">This is a Personal Template.</div>
                <div class="w3-bar-item"></div>
                <a href="#" class="w3-bar-item w3-green" onclick="openTemplatePopup()">Create board from Template</a>

                <script>
                    function openTemplatePopup() 
                    {
                        document.getElementById("useTemplatePopup").style.display = "flex";
                    }

                    function closeTemplatePopup() 
                    {
                        document.getElementById("useTemplatePopup").style.display = "none";
                    }
                </script>
            </div>
            <!-- end create board link --> 

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

            ?>

            <!-- start second header content -->
            <div class="w3-bar" style="background: rgba(120,120,120,0.4); ">
                <p></p>
                
                <div style="float: left; margin-left: 20px; margin-bottom: 10px;">
                    <center>
                        <h5 style="color: white;"><?php echo $btitle; ?></h5>
                        <small style="color: white;"><strong><?php echo $tname; ?></strong></small>
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
                                <script>
                                    function memberpage() {
                                      location.replace("Team_members.php")
                                    }
                                </script>

                                <hr style="border-top: 1px solid #bbb;">
                                <div>
                                    <label style="float: left;">Wanna Close Board ?</label><br><br>
                                </div>

                                <div>
                                    <form method="POST" enctype="multipart/form-data" action="" class="form-container">
                                    <button class="w3-button w3-black w3-round" name="completebutton" type="submit"style="float: left; width: 140px;">Complete Board</button>
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

                            </div></center>
                        </div>
                </div>

                &nbsp;
                <!-- START DATABASE TO SHOW THE VISIBILITY OF THE BOARD -->
                <div class="dropdown w3-right">
                    <div class="w3-dropdown-click w3-right">
                        <select class="w3-button " id="country" name="country" style="height: 35px; width: 110px;">
                            <?php
                                    if ($bvisibilty == "Private") 
                                    {
                                ?>
                                        <option value="Private" selected>Private</option>
                                        <option value="Team">Team</option>
                                        <!-- <option value="Public">Public</option> -->
                                <?php
                                    }
                                    if ($bvisibilty == "Team") 
                                    {
                                ?>
                                        <option value="Private" >Private</option>
                                        <option value="Team" selected>Team</option>
                                        <!-- <option value="Public">Public</option> -->
                                <?php
                                    }
                                    else
                                    {
                                ?>
                                    <option value="visibility" selected disabled >Visibility</option>
                                    <option value="todo" >Private</option>
                                    <option value="doing">Team</option>
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
                            <option value="visibility" selected disabled >Members List</option>
                            <option value="todo" disabled >Member1</option>
                            <option value="doing"disabled>Member2</option>
                            <option value="todo" disabled>Member3</option>
                            <option value="todo" disabled>Member4</option>
                            <option value="todo" disabled>Member5</option>
                        </select>
                    </div>
                </div>
            <?php
                        }   
                    ?> 
                    <!--END DATABASE FOR CHECKING THIS IS INDIVIDUAL BOARD OR TEAM BOARD..IF INDIVIDUAL THEN MEMBER LIST CAN'T BE SHOWN -->             
                <a href="#" class="w3-bar-item w3-button w3-right" style="color: black;">Calendar</a>
                <a href="#" class="w3-bar-item w3-button w3-right" style="color: black;">Gantt</a>
                <a href="#" class="w3-bar-item w3-button w3-right" style="color: black;">Report</a>  

            </div>
            <!-- End second Header Content -->
 <?php 
                    }
                }
            ?>
           <!-- END DATABASE IN SECOND HEADER -->

            
            <!-- start trello container after second header  -->
            <div class="trello-container"><br>
                <div class="trello-board container-fluid page__container mt-5">
                <script>
                        function openTodoCardDetailsForm(cardid) 
                        {
                            var card=cardid;
                            console.log(card);
                            document.getElementById("TodoCardDetailsForm").style.display = "flex";
                        }
                        function closeTodoCardDetailsForm() 
                        {
                            document.getElementById("TodoCardDetailsForm").style.display = "none";
                        }
                    </script>
                    <!-- Start Todo before trip list-->
                    <div class="trello-board__tasks" data-toggle="dragula" data-dragula-containers='["#trello-tasks-1", "#trello-tasks-2", "#trello-tasks-3","#trello-tasks-4"]'>
                        
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
                                    <div class="trello-board__tasks-item card shadow-none border" data-toggle="modal" data-target="#exampleModal">
                                        <a href="cards.php?Cardid=<?php echo $cardid;?>">
                                        <div class="p-3">
                                            <p class="m-0 d-flex align-items-center">
                                                <strong><?php echo $cardname; ?></strong> 
                                                <span class="badge ml-auto" style="font-size: 12px; margin-right: 20px; height:25px; background-color: 
                                                <?php echo $cardlabelcolor;?>">
                                                    <?php echo $cardlabel;?></span>       
                                            </p>
                                            <br>
                                            <?php
                                        if ($cardduedate<date("Y-m-d")) 
                                        {
                                    ?>

                                            <p class="d-flex align-items-center mb-2">
                                                <i class="material-icons icon-16pt mr-2 text-muted">folder_open</i>
                                                <span class="text-muted mr-3">Due-Date</span>
                                            </p>
                                        <?php
                                        }
                                        else{
                                    ?>
                                            <p class="d-flex align-items-center mb-2">
                                                <i class="material-icons icon-16pt mr-2 text-muted">folder_open</i>
                                                <span class="text-muted mr-3"><?php echo $cardduedate; ?></span>
                                            </p>
                                    <?php
                                        }
                                    ?>

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
                                    </a>
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
                                    $selectholidayquery = "SELECT * FROM tblcard Where Listid=2 AND Bid='$bid'";  
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
                                    <div class="trello-board__tasks-item card shadow-none border" data-toggle="modal" data-target="#exampleModal">
                                        <a href="cards.php?Cardid=<?php echo $cardid;?>">
                                        <div class="p-3">
                                            <p class="m-0 d-flex align-items-center">
                                                <strong><?php echo $cardname; ?></strong> 
                                                <span class="badge ml-auto" style="font-size: 12px; margin-right: 20px; height:25px; background-color: <?php echo $cardlabelcolor;?>"><?php echo $cardlabel;?>   
                                                </span>                                               
                                            </p>
                                            <br>
                                            <?php
                                        if ($cardduedate<date("Y-m-d")) 
                                        {
                                    ?>
                                            <p class="d-flex align-items-center mb-2">
                                                <i class="material-icons icon-16pt mr-2 text-muted">folder_open</i>
                                                <span class="text-muted mr-3">Due-Date</span>
                                            </p>
                                            <?php
                                        }
                                        else{
                                    ?>
                                            <p class="d-flex align-items-center mb-2">
                                                <i class="material-icons icon-16pt mr-2 text-muted">folder_open</i>
                                                <span class="text-muted mr-3"><?php echo $cardduedate; ?></span>
                                            </p>
                                    <?php
                                        }
                                    ?>
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
                                    </a>
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
                                    function holidayform() {
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
                                    $selecteatquery = "SELECT * FROM tblcard Where Listid=3 AND Bid='$bid'";  
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
                                    <div class="trello-board__tasks-item card shadow-none border" data-toggle="modal" data-target="#exampleModal">
                                        <a href="cards.php?Cardid=<?php echo $cardid;?>">
                                        <div class="p-3">
                                            <p class="m-0 d-flex align-items-center">
                                                <strong><?php echo $cardname; ?></strong> 
                                                <span class="badge ml-auto"style="font-size: 12px; margin-right: 20px; height:25px; background-color: <?php echo $cardlabelcolor;?>">
                                                    <?php echo $cardlabel;?></span>                                               
                                            </p>
                                            <br>
                                            <?php
                                        if ($cardduedate<date("Y-m-d")) 
                                        {
                                    ?>
                                            <p class="d-flex align-items-center mb-2">
                                                <i class="material-icons icon-16pt mr-2 text-muted">folder_open</i>
                                                <span class="text-muted mr-3">Due-Date</span>
                                            </p>
                                        <?php
                                        }
                                        else{
                                    ?>
                                            <p class="d-flex align-items-center mb-2">
                                                <i class="material-icons icon-16pt mr-2 text-muted">folder_open</i>
                                                <span class="text-muted mr-3"><?php echo $cardduedate; ?></span>
                                            </p>
                                    <?php
                                        }
                                    ?>

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
                                    </a>
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
                                    $selectpersonalquery = "SELECT * FROM tblcard Where Listid=3 AND Bid='$bid'";  
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
                                    <div class="trello-board__tasks-item card shadow-none border" data-toggle="modal" data-target="#exampleModal">
                                        <a href="cards.php?Cardid=<?php echo $cardid;?>">
                                        <div class="p-3">
                                            <p class="m-0 d-flex align-items-center">
                                                <strong><?php echo $cardname; ?></strong> 
                                                <span class="badge ml-auto" style="font-size: 12px; margin-right: 20px; height:25px; background-color: <?php echo $cardlabelcolor;?>">
                                                    <?php echo $cardlabel;?></span>                                               
                                            </p>
                                            <br>
                                            <?php
                                        if ($cardduedate<date("Y-m-d")) 
                                        {
                                    ?>
                                            <p class="d-flex align-items-center mb-2">
                                                <i class="material-icons icon-16pt mr-2 text-muted">folder_open</i>
                                                <span class="text-muted mr-3">Due-Date</span>
                                            </p>
                                            <?php
                                        }
                                        else{
                                    ?>
                                            <p class="d-flex align-items-center mb-2">
                                                <i class="material-icons icon-16pt mr-2 text-muted">folder_open</i>
                                                <span class="text-muted mr-3"><?php echo $cardduedate; ?></span>
                                            </p>
                                    <?php
                                        }
                                    ?>
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
                                        </a>
                                    </div>
                                    <!-- End Done card 1-->
                                    <?php 
                                        }
                                    }
                                ?>
                                </div>
                                <a href="#" class="btn btn-light btn-block mt-2" onclick="cardopenPersonaldoneForm()">Add Card</a>
                                <!-- Start card details popup fuction-->
                                <script>
                                    function cardopenPersonaldoneForm() {
                                      document.getElementById("personaldonecardDetails").style.display = "flex";
                                    }
                                    function cardclosePersonaldoneForm() {
                                      document.getElementById("personaldonecardDetails").style.display = "none";
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