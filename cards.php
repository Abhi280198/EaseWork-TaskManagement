<?php 
    include_once("DbConnection.php");
    $cid=$_POST['Cardid'];
?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
	<title>EaseWork- Profile</title>
    <?php include_once('csslinks.php');?>

    <link type="text/css" href="assets/css/board.css" rel="stylesheet">

</head>
<body class="layout-default">

	<div class="preloader"></div>

    <!-- Header Layout -->
    <div class="mdk-header-layout js-mdk-header-layout">

        <!-- Header -->

        <?php include_once('header1.php');?>
        <!-- // END Header -->

        <!-- Header Layout Content -->
        <div class="mdk-header-layout__content">

            <div class="mdk-drawer-layout js-mdk-drawer-layout" data-push data-responsive-width="992px">
                <div class="mdk-drawer-layout__content page">

                	<!-- subTitle details -->
                    <div class="container-fluid  page__heading-container">
                        <div class="page__heading">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb mb-0">
                                    <li class="breadcrumb-item"><a href="#"><i class="material-icons icon-20pt">home</i></a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Card Details</li>
                                </ol>
                            </nav>
                            <h1 class="m-0">Manage your card details</h1>
                        </div>
                    </div>
                    <!--  End subTitle details -->

<!-- start card details to be displayed and update -->
    <div class="container-fluid page__container">
        <div class="card card-form">
            <div class="row no-gutters">
                <div class="card-body" style="text-align: center;">
                    <p><h5 style="text-align: center;" class="w3-text-blue">CARD DETAILS</h5></p>
                    <p class="text-muted">Edit your card details and settings.</p>
                </div>
            <div class="card-form__body card-body">
                                    
            <form class="w3-container w3-card-4"action="" style="padding-top: 20px;" method="POST" enctype="multipart/form-data"> 
       	    <!-- <div class="form-group"> -->
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
            <!-- /div> -->
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
                            <!-- <a href="#" class="btn btn-danger" onclick="closeTodoCardDetailsForm()" style="background-color: red; width:150px;" >Cancel</a> -->
                            <p></p>
                        </center>
                    </div>
                    <!-- End Button Input -->
            
                                </div>
                            </div>
                        </div>

                    <!-- end card details to be displayed and update -->    
                        <!-- <div class="text-right mb-5"> 
                            <button type="submit" name="Save" class="btn btn-success" onclick="return profilevalidate();">Save</button>
                        </div> -->
                    </div>

                    </form>
               

                </div>
                <!-- // END drawer-layout__content -->

                <?php include_once('sidebar1.php');?>
            </div>
            <!-- // END drawer-layout -->
        </div>
        <!-- // END header-layout -->

   <?php include_once('scriptlinks.php');?>

</body>
</html>