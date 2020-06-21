<?php 
    include_once("DbConnection.php");
    // $Uid=$_GET['Uid'];
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">


<!-- Mirrored from demo.frontted.com/stackadmin/133/app-projects.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 28 May 2020 07:53:33 GMT -->
<head>
    
    <title>EaseWork- Team Member</title>
    <?php include_once('csslinks.php');?>

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



                    <div class="container-fluid page__heading-container">
                        <div class="page__heading d-flex align-items-center">
                            <div class="flex">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb mb-0">
                                        <li class="breadcrumb-item"><a href="#"><i class="material-icons icon-20pt">home</i></a></li>
                                        <li class="breadcrumb-item">Team</li>
                                        <li class="breadcrumb-item active" aria-current="page">Members</li>
                                    </ol>
                                </nav>
                                <h1 class="m-0">Team Members</h1>
                            </div>
                            <input class="member-input" type="text" name="team member" placeholder="Enter members email">
                            <select class="member-select" name = "dropdown">
                                    <option value = "Board1" selected>Board1</option>
                                    <option value = "Board2">Board2</option>
                                    <option value = "Board3">Board3</option>
                            </select>
                            <a href="#" class="btn btn-success ml-3">Invite Team Members</a>
                        </div>
                    </div>


                    <div class="container-fluid page__container">                  

                        <div class="row align-items-center projects-item mb-1">
                            
                            <div class="col-sm">
                                <div class="card m-0">
                                    <div class="px-4 py-3">
                                        <div class="row align-items-center">
                                            <div class="col" style="min-width: 300px">
                                                
                                                <div class="d-flex align-items-center">
                                                   
                                                    <a href="#" class="d-flex align-items-middle">
                                                        <span class="avatar avatar-xxs avatar-online mr-2">
                                                            <img src="assets/images/256_daniel-gaffey-1060698-unsplash.jpg" alt="Avatar" class="avatar-img rounded-circle">
                                                        </span>
                                                        Sherri Cardenas
                                                    </a>
                                                </div>
                                                <div class="d-flex align-items-center">
                                                    <a href="#" class="text-body"><strong class="text-15pt mr-2">sherri@gmail.com</strong></a>
                                                    
                                                </div>
                                            </div>
                                            
                                            
                                                <div style="position: relative;" class="col-auto d-flex align-items-center">

                                                    <a href="#" class="text-body" onclick="show()">On 1 Boards</a>

                                                    <!-- start popover -->

                                                    <div class="main-popover" id="board-popup">
                                                        <div class="main-container">
                                                            <span>Team Boards</span>
                                                            <button type="button" class="closeButton" onclick="hidePopover()">Close</button> 
                                                            <hr>
                                                        </div>
                                                        <div>
                                                            <p>Sherri Cardenas is a member of following team boards:</p>
                                                        </div>
                                                        <ul class="popover-ul">
                                                            <div>
                                                                <li class="popover-ul-li">
                                                                    <a class="popover-a" href="#" style="text-decoration: none;">
                                                                        <div>
                                                                            <span class="avatar avatar-xxs avatar-online mr-2">
                                                                                <img src="assets/images/256_daniel-gaffey-1060698-unsplash.jpg" alt="Avatar" class="avatar-img rounded-circle">
                                                                            </span>

                                                                            <span >Design Project</span>
                                                                            <span>(Member)</span>

                                                                        </div>
                                                                        
                                                                     </a>
                                                                </li>
                                                            </div>
                                                            <div>
                                                                <li class="popover-ul-li">
                                                                    <a class="popover-a" href="#" style="text-decoration: none;" >
                                                                        <div>
                                                                            <span class="avatar avatar-xxs avatar-online mr-2">
                                                                                <img src="assets/images/256_daniel-gaffey-1060698-unsplash.jpg" alt="Avatar" class="avatar-img rounded-circle">
                                                                            </span>

                                                                            <span >Holiday</span>
                                                                            <span>(Admin)</span>

                                                                        </div>
                                                                        
                                                                     </a>
                                                                </li>
                                                            </div>
                                                        </ul>

                                                    </div>

                                                    <!-- END popover -->
                                                    <script>
                                                        function show() {
                                                          document.getElementById("board-popup").style.display = "block";
                                                        }

                                                        function hidePopover() {
                                                          document.getElementById("board-popup").style.display = "none";
                                                        }
                                                    </script>

                                                </div>
                                                <div class="div-buttons" class="col-auto d-flex align-items-center">
                                                    
                                                    <a href="#" class="text-body">Member</a>
                                                </div>
                                                <div class="div-buttons" class="col-auto d-flex align-items-center" style="min-width: 140px;">
                                                    <a href="#" class="text-dark-gray">Remove</a>
                                            
                                                </div>       
                                             
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="row align-items-center projects-item mb-1">
                            
                            <div class="col-sm">
                                <div class="card m-0">
                                    <div class="px-4 py-3">
                                        <div class="row align-items-center">
                                            <div class="col" style="min-width: 300px">
                                                
                                                <div class="d-flex align-items-center">
                                                   
                                                    <a href="#" class="d-flex align-items-middle">
                                                        <span class="avatar avatar-xxs avatar-online mr-2">
                                                            <img src="assets/images/256_rsz_1andy-lee-642320-unsplash.jpg" alt="Avatar" class="avatar-img rounded-circle">
                                                        </span>
                                                         Jenell Matney
                                                    </a>
                                                </div>
                                                <div class="d-flex align-items-center">
                                                    <a href="#" class="text-body"><strong class="text-15pt mr-2">Jenell@gmail.com</strong></a>
                                                    
                                                </div>
                                            </div>

                                            
                                                <div  class="col-auto d-flex align-items-center">

                                                    <a href="#" class="text-body">On 2 Boards</a>
                                                </div>
                                                <div class="div-buttons" class="col-auto d-flex align-items-center">
                                                    
                                                    <a href="#" class="text-body">Admin</a>
                                                </div>
                                                <div class="div-buttons" class="col-auto d-flex align-items-center" style="min-width: 140px;">
                                                    <a href="#" class="text-dark-gray">Remove</a>
                                                    
                                                </div>
                                            
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="row align-items-center projects-item mb-1">
                            
                            <div class="col-sm">
                                <div class="card m-0">
                                    <div class="px-4 py-3">
                                        <div class="row align-items-center">
                                            <div class="col" style="min-width: 300px">
                                                
                                                <div class="d-flex align-items-center">
                                                   
                                                    <a href="#" class="d-flex align-items-middle">
                                                        <span class="avatar avatar-xxs avatar-online mr-2">
                                                            <img src="assets/images/256_jeremy-banks-798787-unsplash.jpg" alt="Avatar" class="avatar-img rounded-circle">
                                                        </span>
                                                          Joseph Ferland
                                                    </a>
                                                </div>
                                                <div class="d-flex align-items-center">
                                                    <a href="#" class="text-body"><strong class="text-15pt mr-2">Joseph@gmail.com</strong></a>
                                                    
                                                </div>
                                            </div>

                                           
                                                <div  class="col-auto d-flex align-items-center">

                                                    <a href="#" class="text-body">On 2 Boards</a>
                                                </div>
                                                <div class="div-buttons" class="col-auto d-flex align-items-center">
                                                    
                                                    <a href="#" class="text-body">Member</a>
                                                </div>
                                                <div class="div-buttons" class="col-auto d-flex align-items-center" style="min-width: 140px;">
                                                    <a href="#" class="text-dark-gray">Leave</a>
                                                    
                                                </div>

                                            

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="row align-items-center projects-item mb-1">
                            
                            <div class="col-sm">
                                <div class="card m-0">
                                    <div class="px-4 py-3">
                                        <div class="row align-items-center">
                                            <div class="col" style="min-width: 300px">
                                                
                                                <div class="d-flex align-items-center">
                                                   
                                                    <a href="#" class="d-flex align-items-middle">
                                                        <span class="avatar avatar-xxs avatar-online mr-2">
                                                           <img src="assets/images/256_joao-silas-636453-unsplash.jpg" alt="Avatar" class="avatar-img rounded-circle">
                                                        </span>
                                                          Bryan Davis
                                                    </a>
                                                </div>
                                                <div class="d-flex align-items-center">
                                                    <a href="#" class="text-body"><strong class="text-15pt mr-2">bryan@gmail.com</strong></a>
                                                    
                                                </div>
                                            </div>

                                            

                                                <div  class="col-auto d-flex align-items-center">

                                                    <a href="#" class="text-body">On 1 Boards</a>
                                                </div>
                                                <div class="div-buttons" class="col-auto d-flex align-items-center">
                                                    
                                                    <a href="#" class="text-body">Member</a>
                                                </div>
                                                <div class="div-buttons" class="col-auto d-flex align-items-center" style="min-width: 140px;">
                                                   
                                                    <a href="#" class="text-dark-gray">Remove</a>
                                                    
                                                </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>





                    </div>


                </div>
                <!-- // END drawer-layout__content -->

                <?php include_once('sidebar_team.php');?>
            </div>
            <!-- // END drawer-layout -->

        </div>
        <!-- // END header-layout__content -->

    </div>
    <!-- // END header-layout -->

    <?php include_once('scriptlinks.php');?>
</body>


<!-- Mirrored from demo.frontted.com/stackadmin/133/app-projects.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 28 May 2020 07:53:35 GMT -->
</html>