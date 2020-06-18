<?php include_once("DbConnection.php");?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <title>Easework- Education Temlate</title>
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
            <form action="/action_page.php" class="form-container">
                <div>
                    <label><b>Description :</b></label>
                    <br>
                    <textarea name="description" id="description" rows="7" style="width: 100%;" placeholder="Description ...">
                        
                    </textarea>
                </div><br>
                <div class="canclebtn">
                    <a href="board_link.php" type="button" class="btn cancel">Add</a>
                    <button type="button" class="btn cancel" onclick="desclose()" >Cancel</button>
                </div>
            </form>
        </div>
    </div>
    <!-- End show menu description popup -->

    <!-- start card details popup -->
    <div id="cardDetails" class="modal" >
        <div class="modal-content" style="width: 50%; height: 80%; overflow: auto;">

            <div class="modal-body">
                <!-- Start Form Details -->  
                <h5 style="text-align: center;" class="w3-text-blue">CARD DETAILS</h5>

                <form class="w3-container w3-card-4"action="/action_page.php" style="padding-top: 20px;">
                    <!-- Start Card Name Input -->
                    <div class="row" style="padding-left:50px;" >
                      <div class="col-25">   
                          <label class="w3-text-black"><b>Title</b></label>
                      </div>
                      <div class="col-75">
                        <input class="w3-input w3-border" style="width: 320px; height: 40px;" name="Title" type="text">
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
                          <textarea name="description" id="description" rows="4" class="w3-input w3-border" style="width: 320px; background-color: white;" placeholder="Description ..."></textarea>
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
                                <input class="w3-input w3-border" style="width:250px; height: 40px; float: left;" name="Title" id="myInput" type="text">
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
                            <select id="country" name="country" style="width:320px; height: 45px;">
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
                      </div>
                    </div>
                    <!-- End Label Input --> 

                    <hr style="border-top: 1px solid #bbb;">

                    <!-- Start Due Date Input --> 
                    <div class="row" style="padding-left:50px;" >
                      <div class="col-25">     
                        <label class="w3-text-black"><b>Due Date</b></label>
                      </div>
                      <div class="col-75">
                        <input type="datetime-local" id="birthdaytime" name="birthdaytime" style="width:320px; height: 45px;" class="w3-input w3-border">
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
                        <select id="country" name="country" style="width:320px; height: 45px;">
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
                            <a href="#" class="btn btn-success" style="width:150px;">Save</a>
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
    <!-- start card details popup -->

</head>

<body class="layout-default trello">


    <div class="preloader"></div>

    <!--start whole page-->
    <div class="mdk-header-layout js-mdk-header-layout">

       <!-- Header -->
            <?php include_once('header1.php'); ?>
        <!--END Header -->

        
        <!-- Start container from second header -->
        <div class="mdk-header-layout__content">


            <!-- start second header content -->
            <div class="w3-bar w3-light-grey">
                <p></p>

                <div style="float: left; margin-left: 20px; margin-bottom: 10px;">
                    <center>
                        <h5>Task Name</h5>
                        <small><strong>Team Name</strong></small>
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
                                       Organize you lesson plans and manage your planning workload! This template makes it easy to see what needs to be done, and quickly access everything you need before a class. Best for solo-planning or teaching content that doesn't repeat.
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
                                <hr style="border-top: 1px solid #bbb;">
                                  <br>
                                <button class="w3-button w3-black w3-round" style="width: 100%; font-size: 12px;" onclick="memberpage()">Members Details</button>

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
                                    <button class="w3-button w3-black w3-round">Complete Board</button>
                                    <button class="w3-button w3-black w3-round">Delete Board</button>
                                </div>

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


         <!-- start create board link -->
            <div class="w3-bar w3-border w3-black">
                <div class="w3-bar-item" style="margin-left: 400px; border: black;">This is a Class Management Template.</div>
                <div class="w3-bar-item"></div>
                <a href="#" class="w3-bar-item w3-green">Create board from Template</a>
            </div>
            <!-- end create board link --> 

            <br><br>

            <!-- start trello container after second header  -->
            <div class="trello-container">
                <div class="trello-board container-fluid page__container">

                    <!-- Start Syllabus remaining list-->
                    <div class="trello-board__tasks" data-toggle="dragula" data-dragula-containers='["#trello-tasks-1", "#trello-tasks-2", "#trello-tasks-3"]'>
                        
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
                                    <div class="trello-board__tasks-item card shadow-none border" data-toggle="modal" data-target="#exampleModal" onclick="cardopenForm()">
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

                                    <!-- Start Syllabus remaining card 2-->
                                    <div class="trello-board__tasks-item card shadow-none border" onclick="cardopenForm()">
                                        <div class="p-3">
                                            <p class="m-0 d-flex align-items-center">
                                                <strong>Chapter-5</strong>
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
                                    <!-- End Syllabus remaining card 2-->
                                
                                </div>

                                <a href="#" class="btn btn-light btn-block mt-2" onclick="cardopenForm()">Add Card</a>

                                <!-- Start card details popup fuction-->
                                <script>
                                    function cardopenForm() {
                                      document.getElementById("cardDetails").style.display = "flex";
                                    }
                                    function cardcloseForm() {
                                      document.getElementById("cardDetails").style.display = "none";
                                    }
                                </script>
                                <!-- End card details popup fuction-->

                            </div>
                            <!-- End Syllabus remaining card Section-->

                        </div>
                    </div>
                    <!-- End Todo list-->

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
                                    <div class="trello-board__tasks-item card shadow-none border" data-toggle="modal" data-target="#exampleModal" onclick="cardopenForm()">
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
                                <a href="#" class="btn btn-light btn-block mt-2" onclick="cardopenForm()">Add Card</a>
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
                                    <div class="trello-board__tasks-item card shadow-none border" data-toggle="modal" data-target="#exampleModal" onclick="cardopenForm()">
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

                                     <!-- Start Syllabus Covered card 2-->
                                    <div class="trello-board__tasks-item card shadow-none border" data-toggle="modal" data-target="#exampleModal" onclick="cardopenForm()">
                                        <div class="p-3">
                                            <p class="m-0 d-flex align-items-center">
                                                <strong>Chapter-2</strong> 
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
                                    <!-- End Syllabus Covered card -->

                                </div>
                                <a href="#" class="btn btn-light btn-block mt-2" onclick="cardopenForm()">Add Card</a>
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
                                <div class="trello-board__tasks-list card-list" id="trello-tasks-3">

                                    <!-- Start Assignments card 1-->
                                    <div class="trello-board__tasks-item card shadow-none border" data-toggle="modal" data-target="#exampleModal" onclick="cardopenForm()">
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

                                     <!-- Start Assignments card 2-->
                                    <div class="trello-board__tasks-item card shadow-none border" data-toggle="modal" data-target="#exampleModal" onclick="cardopenForm()">
                                        <div class="p-3">
                                            <p class="m-0 d-flex align-items-center">
                                                <strong>Chapter-2:Assign 4</strong> 
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
                                    <!-- End Assignments card -->

                                </div>
                                <a href="#" class="btn btn-light btn-block mt-2" onclick="cardopenForm()">Add Card</a>
                            </div>
                            <!-- End Assignments card Section-->
                        
                        </div>
                    </div>
                    <!-- End Assignments list-->

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