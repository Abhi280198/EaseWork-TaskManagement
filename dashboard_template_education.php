
<?php 
    include_once("DbConnection.php");

    if(isset($_REQUEST['UseTemplateSubmit'])){

        $BoardName = $_REQUEST['title'];
        $BoardTeamType = $_REQUEST['Team-dropdown'];
        $BoardVisbility = $_REQUEST['Visibility-dropdown'];
        $BoardBackground = "images/backgrounddefault.jpg";

        $board_query="insert into tblboard values(null,'$BoardName','$BoardTeamType','$BoardVisbility','".$_SESSION['UserID']."',now(),1,null,'$BoardBackground',1)";
        $run_board = mysqli_query($con,$board_query);

        if($run_board){

        ?>
            <script type="text/javascript">
                alert("Data inserted successfully");
                window.location.href = 'Education_template.php';
            </script>

        <?php
        }   
        else{
        echo "error".mysqli_error($con);   
        }

     }
 ?>


<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    
    <title>EaseWork- Education Template</title>
    <?php include_once('csslinks.php');?>
</head>

<body class="layout-default">

     <!-- popup -->

    <div class="form-popup" id="useTemplatePopup">
        <form  class="form-container">
            <div class="header">
            <h1>Use Template</h1>
                                        
            </div><br><br>
                                        
            <label for="title"><b>Title Name:</b></label>
                <!-- php code title name -->
                    <?php
                        $select_title = "select * from tbltemplate where Tempid=1 ";
                        $Execute_select_title = mysqli_query($con,$select_title)or die(mysqli_error($con));
                        $fetch_title=mysqli_fetch_array($Execute_select_title);
                        $title =  $fetch_title['TempName'];
                    ?>

                <!-- php code title name -->
            <input type="text" placeholder="title" name="title" required value="<?php echo $title;?>"><br><br>

            <label for="title"><b>Team Name:</b></label>
            <select name = "Team-dropdown">
                <!-- php code Team -->
                    <?php 
                        $select_team="select * from tblteam where IsActive=1 AND Uid IN (1,'".$_SESSION['UserID']."')";
                        $Execute_select_team=mysqli_query($con,$select_team)or die(mysqli_error($con));
                        while($fetch_team=mysqli_fetch_array($Execute_select_team))
                    {
                ?>
                <!-- php code team -->
            
            <option value = "<?php echo $fetch_team['Tid'];?>"><?php echo $fetch_team['Tname'];?></option>
            <?php
                }
            ?>
            </select>
            <br><br>
            <label for="title"><b>Visibility:</b></label>
            <select name = "Visibility-dropdown">
                <option value = "Private" selected>Private</option>
                <option value = "Team">Team</option>
                <option value = "Public">Public</option>
            </select>
            <br><br>
            <br><br>
            <div class="canclebtn">
            <button  type="submit" name="UseTemplateSubmit" class="btn cancel">Create</button>
            <button type="button" class="btn cancel" onclick="closeTemplatePopup()" >Cancel</button>
            </div>
        </form>
    </div>

    <!--END popup -->

    <div class="preloader"></div>

    <!-- Header Layout -->
    <div class="mdk-header-layout js-mdk-header-layout">

        <!-- Start Header -->
        <?php include_once('header1.php');?>
        <!-- END Header -->

        <!-- Header Layout Content -->
        <div class="mdk-header-layout__content">

            <div class="mdk-drawer-layout js-mdk-drawer-layout" data-push data-responsive-width="992px">
                <div class="mdk-drawer-layout__content page">


                    <!--Start Bold header section-->
                    <div class="container-fluid page__heading-container">
                        <div class="page__heading d-flex align-items-center">
                            <div class="flex">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb mb-0">
                                        <li class="breadcrumb-item"><a href="index.php"><i class="material-icons icon-20pt">home</i></a></li>
                                        <li class="breadcrumb-item">Templates</li>
                                        <li class="breadcrumb-item active" aria-current="page">Education</li>
                                    </ol>
                                </nav>
                                <h1 class="m-0">Education</h1>
                            </div>
                        </div>
                    </div>
                    <!--End Bold header section-->


                    <!--Start Image and Description section-->
                    <div class="container-fluid page__container">
                        <div class="row">

                            <!--Start Image section-->
                            <a href="#" class="dp-preview card mb-4">
                                <img src="assets/images/book1.jpg" alt="digital product" class="img-fluid">
                            </a>
                            <!--End Image section-->

                            <!--Start Descrition section-->
                            <div>
                                <div class="container-fluid page__heading-container">
                                    <div class="page__heading d-flex align-items-center">
                                        <div class="flex">
                                            <h2 class="m-0">Class Management</h2>
                                        </div>
                                        <a href="Education_template.php?Uid=<?php echo $_SESSION['UserID'];?>" class="btn btn-success ml-3">View Template</a>
                                        <a href="#" class="btn btn-success ml-3" onclick="openTemplatePopup()">Use Template</a>
                                    </div>

                                    <!-- popup -->
                                    
                                    <script>
                                        function openTemplatePopup() {
                                          document.getElementById("useTemplatePopup").style.display = "flex";
                                        }

                                        function closeTemplatePopup() {
                                          document.getElementById("useTemplatePopup").style.display = "none";
                                        }
                                    </script>

                                    <!--END popup -->

                                </div>
                                <h6 class="text-dark-gray">Description</h6>

                                    <p class="mb-4">Become a Zen teacher! See all of your class information in one place.</p>
                                    <p class="mb-4">Organize you lesson plans and manage your planning workload! This template makes it easy to see what needs to be done, and quickly access everything you need before a class. Best for solo-planning or teaching content that doesn't repeat.</p>
                                    <p class="mb-4">Students can track their assignments, and syllabus all in one place. They ask their queries and never miss a beat of the class!</p>
                            </div>
                            <!--End Description section-->
                        </div>
                    </div>


                </div>
                <!-- // END drawer-layout__content -->

                <!--Start sidebar section-->
                <?php include_once('sidebar1.php');?>
                <!--End sidebar section-->
            </div>
            <!-- // END drawer-layout -->

        </div>
        <!-- // END header-layout__content -->

    </div>
    <!-- // END header-layout -->

    <?php include_once('scriptlinks.php');?>


</body>


<!-- Mirrored from demo.frontted.com/stackadmin/133/digital-product.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 28 May 2020 07:54:02 GMT -->
</html>