 <?php 
    include_once("DbConnection.php");
    $bid=$_GET['Bid'];

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

    /*START DATABASE INSERT DATA THROUGH ADD CARD BUTTON IN (TODO LIST)*/
    if (isset($_REQUEST['addtodocard'])) 
    {
        if ($_REQUEST['todocardtitle']=="") 
        {
            echo '<script type="text/javascript">alert("Card Name cannot be Empty!!!");</script>';
        }
        else
        {
            $todo_card_description= $todo_card_label =$todo_card_labelcolor =$todo_card_duedate="";

            $todo_card_title = $_REQUEST['todocardtitle'];
            $todo_card_description = $_REQUEST['todocarddescription'];
            $todo_card_label = $_REQUEST['todocardlabel'];
            $todo_card_labelcolor = $_REQUEST['todocardlabelcolor'];
            $todo_card_duedate = $_REQUEST['todocardduedate'];

            if (condition) {
                # code...
            }
                $todo_query="insert into tblcard values(null,'$todo_card_title','$todo_card_label','$todo_card_labelcolor','$todo_card_duedate',now(),'$todo_card_description',1,'$bid',1)";
                $run_todo = mysqli_query($con,$todo_query);

                if($run_todo)
                {
                    header("location:board.php?Bid=$bid");
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
            $doing_card_description= $doing_card_label =$doing_card_labelcolor =$doing_card_duedate="";

            $doing_card_title = $_REQUEST['doingcardtitle'];
            $doing_card_description = $_REQUEST['doingcarddescription'];
            $doing_card_label = $_REQUEST['doingcardlabel'];
            $doing_card_labelcolor = $_REQUEST['doingcardlabelcolor'];
            $doing_card_duedate = $_REQUEST['doingcardduedate'];

            $doing_query="insert into tblcard values(null,'$doing_card_title','$doing_card_label','$doing_card_labelcolor','$doing_card_duedate',now(),'$doing_card_description',2,'$bid',1)";
            $run_doing = mysqli_query($con,$doing_query);

            if($run_doing)
            {
                header("location:board.php?Bid=$bid");
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
            $done_card_description= $done_card_label =$done_card_labelcolor =$done_card_duedate="";

            $done_card_title = $_REQUEST['donecardtitle'];
            $done_card_description = $_REQUEST['donecarddescription'];
            $done_card_label = $_REQUEST['donecardlabel'];
            $done_card_labelcolor = $_REQUEST['donecardlabelcolor'];
            $done_card_duedate = $_REQUEST['donecardduedate'];

            $done_query="insert into tblcard values(null,'$done_card_title','$done_card_label','$done_card_labelcolor','$done_card_duedate',now(),'$done_card_description',3,'$bid',1)";
            $run_done = mysqli_query($con,$done_query);

            if($run_done)
            {
                header("location:board.php?Bid=$bid");
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
    <!-- start Todo card details popup -->

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

                    <hr style="border-top: 1px solid #bbb;">

                    <!-- Start Checklist Input -->
                    <div class="row" style="padding-left:50px;" >  
                        <div class="col-25">  
                            <label class="w3-text-black"><b>Checklist</b></label>
                        </div>
                        <div class="col-75">
                            <div id="myDIV" class="header" style="" >
                                <input class="w3-input w3-border" style="width:250px; height: 40px; float: left;" name="doingcardchecklist" id="myInput" type="text">
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <span class="w3-button w3-black w3-round" onclick="newElement()" style="float: right; margin-right: 30px; width: 100px;">Add Item</span>
                            </div>

                            <ul id="myUL">
                               <!-- <li id="ul-container"></li>  -->
                            </ul>

                            <!-- <script>
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
                            </script>-->
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
                            <select id="member" name="doingcardmember" style="width:320px; height: 45px;">
                              <option value="todo">To Do</option>
                              <option value="doing">Doing</option>
                              <option value="done">Done</option>
                            </select>

                        </div>
                    </div>
                    <!-- End Member List Input --> 
                    
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

                    <hr style="border-top: 1px solid #bbb;">

                    <!-- Start Checklist Input -->
                    <div class="row" style="padding-left:50px;" >  
                        <div class="col-25">  
                            <label class="w3-text-black"><b>Checklist</b></label>
                        </div>
                        <div class="col-75">
                            <div id="myDIV" class="header" style="" >
                                <input class="w3-input w3-border" style="width:250px; height: 40px; float: left;" name="donecardchecklist" id="myInput" type="text">
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <span class="w3-button w3-black w3-round" onclick="newElement()" style="float: right; margin-right: 30px; width: 100px;">Add Item</span>
                            </div>

                            <ul id="myUL">
                               <!-- <li id="ul-container"></li>  -->
                            </ul>

                            <!-- <script>
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
                            </script> -->

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
                            <select id="member" name="donecardmember" style="width:320px; height: 45px;">
                              <option value="todo">To Do</option>
                              <option value="doing">Doing</option>
                              <option value="done">Done</option>
                            </select>

                        </div>
                    </div>
                    <!-- End Member List Input --> 
                    
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

    <!-- start card details popup -->
    <div id="TodoCardDetailsForm" class="modal" >
        <div class="modal-content" style="width: 50%; height: 80%; overflow: auto;">
            <div class="modal-body">
                <!-- Start Form Details -->  
                <h5 style="text-align: center;" class="w3-text-blue">CARD DETAILS</h5>

                <form class="w3-container w3-card-4"action="" style="padding-top: 20px;" method="POST" enctype="multipart/form-data">

                    <!-- Start Card Name Input -->
                    <div class="row" style="padding-left:50px;" >
                      <div class="col-25">   
                          <label class="w3-text-black"><b>Title</b></label>
                      </div>
                      <div class="col-75">
                        <input class="w3-input w3-border" style="width: 320px; height: 40px;" name="cardtitle" type="text">
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
                          <textarea name="carddescription" id="description" rows="4" class="w3-input w3-border" style="width: 320px; background-color: white;" placeholder="Description ..."></textarea>
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

                           <!--  <script>
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
                            </script> -->

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
                    <div class="row" style="padding-left:50px;" >
                      <div class="col-25">     
                        <label class="w3-text-black"><b>Label Name</b></label>
                      </div>
                      <div class="col-75" >
                        <input class="w3-input w3-border" placeholder="Enter label name" name="cardlabel" type="text" style="width: 320px; height: 40px;">                                                
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
                            <input type="color" name="cardlabelcolor" style="width: 320px; height: 40px;">                      
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
                        <input type="datetime-local" id="birthdaytime" name="cardduedate" style="width:320px; height: 45px;" class="w3-input w3-border">
                      </div>
                    </div>
                    <!-- End Due Date Input --> 

                    <hr style="border-top: 1px solid #bbb;">

                    <!-- Start Move to  Input --> 
                    <div class="row" style="padding-left:50px;" >
                      <div class="col-25">     
                        <label class="w3-text-black"><b>Move</b></label>
                      </div>
                      <div class="col-75" >
                        <select id="move" name="cardmove" style="width:320px; height: 45px;">
                          <option value="todo">To Do</option>
                          <option value="doing">Doing</option>
                          <option value="done">Done</option>
                        </select>
                      </div>
                    </div>
                    <!-- End Move to Input -->

                    <hr style="border-top: 1px solid #bbb;">

                    <!-- Start Button Input -->  
                    <div>
                        <center>
                            <button type="submit" name="carddetails" class="btn btn-success" style="width:150px;">Save</button>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <a href="#" class="btn btn-danger" onclick="closeTodoCardDetailsForm()" style="background-color: red; width:150px;" >Cancel</a>
                            <p></p>
                        </center>
                    </div>
                    <!-- End Button Input -->
              
                </form>
              <!--End Form Details -->
            </div> 

        </div>
    </div>
    <!-- End card details popup -->

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

        
        <!-- Start container from second header -->
        <div class="mdk-header-layout__content" style="overflow-y: auto;">

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
                    <div class="w3-bar" style="background: rgb(120,120,120); ">
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
                            <a href="calendar.php" class="w3-bar-item w3-button w3-right" style="color: black;">Calendar</a>
                            <a href="#" class="w3-bar-item w3-button w3-right" style="color: black;">Gantt</a>
                            <a href="#" class="w3-bar-item w3-button w3-right" style="color: black;">Report</a>  
                    </div>
                    <!-- End second Header Content -->

            <?php 
                    }
                }
            ?>
           <!-- END DATABASE IN SECOND HEADER -->

            <br><br>

            <!-- start trello container after second header  -->
            <div class="trello-container">
                <div class="trello-board container-fluid page__container">

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
                                            /*$_SESSION['card']=$row_todo['Cardid'];*/
  
                                ?>
                                    <!-- Start Todo card 1-->
                                    <div class="trello-board__tasks-item card shadow-none border" data-toggle="modal" data-target="#exampleModal" onclick="/*openTodoCardDetailsForm*//*(*//*<?php echo $cardid; ?>*/">
                                        <a href="cards.php">
                                        <div class="p-3">
                                            <p class="m-0 d-flex align-items-center">
                                                <strong><?php echo $cardname; ?></strong> 
                                                <span class="badge ml-auto" style="font-size: 12px; margin-right: 20px; height:25px; background-color: <?php echo $cardlabelcolor;?>">
                                                    <?php echo $cardlabel;?>   
                                                </span>                                               
                                            </p>
                                            <br>
                                    <?php
                                        if ($cardduedate<date("Y-m-d")) 
                                        {
                                    ?>
                                            <p class="d-flex align-items-center mb-2">
                                                <i class="material-icons icon-16pt mr-2 text-muted">folder_open</i>
                                                <span class="text-muted mr-3">Due date</span>
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
                                    <div class="trello-board__tasks-item card shadow-none border" data-toggle="modal" data-target="#exampleModal">
                                        <a href="cards.php">
                                        <div class="p-3">
                                            <p class="m-0 d-flex align-items-center">
                                                <strong><?php echo $cardname; ?></strong> 
                                                <span class="badge ml-auto" style="font-size: 12px; margin-right: 20px; height:25px; background-color: <?php echo $cardlabelcolor;?>">
                                                    <?php echo $cardlabel;?>   
                                                </span> 
                                            </p>
                                            <br>
                                    <?php
                                        if ($cardduedate<date("Y-m-d")) 
                                        {
                                    ?>
                                            <p class="d-flex align-items-center mb-2">
                                                <i class="material-icons icon-16pt mr-2 text-muted">folder_open</i>
                                                <span class="text-muted mr-3" >Due Date</span>
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
                                    <div class="trello-board__tasks-item card shadow-none border" data-toggle="modal" data-target="#exampleModal">
                                        <a href="cards.php">
                                        <div class="p-3">
                                            <p class="m-0 d-flex align-items-center">
                                                <strong><?php echo $cardname; ?></strong> 
                                                <span class="badge ml-auto" style="font-size: 12px; margin-right: 20px; height:25px; background-color: <?php echo $cardlabelcolor;?>">
                                                    <?php echo $cardlabel;?>   
                                                </span>                                               
                                            </p>
                                            <br>
                                    <?php
                                        if ($cardduedate<date("Y-m-d")) 
                                        {
                                    ?>
                                            <p class="d-flex align-items-center mb-2">
                                                <i class="material-icons icon-16pt mr-2 text-muted">folder_open</i>
                                                <span class="text-muted mr-3" >Due Date</span>
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