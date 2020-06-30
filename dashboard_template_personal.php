<style type="text/css">
    .pop-over-content{
    overflow-x: hidden;
    overflow-y: auto;
    padding: 0 12px 12px;

}

.grid-background{
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
    list-style: none;
    margin: 0;
    padding: 5px;
 }

.grid-background-item{
    height: 56px;
    width: calc(33.3% - 8px);
    margin-bottom: 8px;
    margin-right: 8px;
 }

 .grid-background-select{
    align-items: center;
    border-radius: 3px;
    color: rgba(0,0,0,.4);
    display: flex;
    height: 100%;
    justify-content: center;
    margin: 0;
    min-height: 0;
    padding: 0;
    position: relative;
    line-height: 0;
    width: 100%;
    cursor: pointer;
 }

 .grid-background-select, .grid-background-select:focus, .grid-background-select:hover {
    background: none;
    background-color: #fff;
    background-position: 50%;
    background-size: cover;
    box-shadow: none;
}

div.gallery {
  margin: 5px;
  border: 1px solid #ccc;
  float: left;
  width: 80px;
}

div.gallery:hover {
  border: 3px solid #777;
}

div.gallery img {
  width: 100%;
  height: auto;
}

</style>



<?php include_once("DbConnection.php"); ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    
    <title>EaseWork- Personal Template</title>
     <?php include_once('csslinks.php');?>
</head>

<body class="layout-default">

    <!-- popup -->

    <div class="form-popup" id="useTemplatePopup">
        <form class="form-container">
            <div class="header">
            <h1>Use Template</h1>
                                        
            </div><br><br>
                                        
            <label for="title"><b>Title Name:</b></label>
            <!-- php code title name -->
                    <?php
                        $select_title = "select * from tbltemplate where Tempid=2 ";
                        $Execute_select_title = mysqli_query($con,$select_title)or die(mysqli_error($con));
                        $fetch_title=mysqli_fetch_array($Execute_select_title);
                        $title =  $fetch_title['TempName'];
                    ?>

                <!-- php code title name -->
            <input type="text" placeholder="title" name="btitle" value="<?php echo $title;?>" required><br><br>

            <label for="title"><b>Team Name:</b></label>
            <select name = "dropdown">
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

            <div  class="my-3">
                                     <a href="#" style="display:block;text-align: right;" onclick="showBgPopover()" ><b>Add Background image</b></a> 
                                        
                                    <!-- start popover -->

                                                    <div class="main-popover"  id="background-popover">
                                                        <div class="main-container">
                                                            <span>Background</span>
                                                            <button type="button" class="closeButton" onclick="hideBgPopover()">Close</button> 
                                                            <hr>
                                                        </div>
                                                        <div>
                                                            <div class="pop-over-content">
                                                                <ul class="grid-background">
                                                                    <li class="grid-background-item" >
                                                                        <div class="grid-background-select gallery" onclick="selectBgImage(this)" style="background-image: url('images/bg1.jpg');">    
                                                                        </div>
                                                                    </li>
                                                                    <li class="grid-background-item">
                                                                        <div class="grid-background-select gallery" onclick="selectBgImage(this)" style="background-image: url('images/bg2.jpg');">    
                                                                        </div>
                                                                    </li>
                                                                    <li class="grid-background-item">
                                                                        <div class="grid-background-select gallery" onclick="selectBgImage(this)" style="background-image: url('images/bg3.jpg');">    
                                                                        </div>
                                                                    </li>
                                                                    <li class="grid-background-item">
                                                                        <div class="grid-background-select gallery" onclick="selectBgImage(this)" style="background-image: url('images/bg4.jpg');">    
                                                                        </div>
                                                                    </li>
                                                                    <li class="grid-background-item">
                                                                        <div class="grid-background-select gallery" onclick="selectBgImage(this)" style="background-image: url('images/bg5.jpg');">    
                                                                        </div>
                                                                    </li>
                                                                    <li class="grid-background-item">
                                                                        <div class="grid-background-select gallery" onclick="selectBgImage(this)" style="background-image: url('images/bg6.jpg');">    
                                                                        </div>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>

                                                    </div>

                                                   
                                                    <script>
                                                        function showBgPopover() {
                                                          document.getElementById("background-popover").style.display = "block";
                                                        }

                                                        function hideBgPopover() {
                                                          document.getElementById("background-popover").style.display = "none";
                                                        }
                                                    </script>

                                                    <script type="text/javascript">
                                                        function selectBgImage(bg){
                                                            
                                                            style = bg.currentStyle || window.getComputedStyle(bg, false),
                                                            bi = style.backgroundImage;
                                                            console.log(bi);
                                                            imgUrl=bi.slice(bi.indexOf('image'),-2);
                                                            console.log(imgUrl);
                                                            var bgUrl=document.getElementById('background_url').value=imgUrl;
                                                        }

                                                    </script>
                                    <!-- END popover -->

                                    </div>
            
            <br><br>
            <div class="canclebtn">
                <?php
                    if(isset($_REQUEST['Personalsubmit'])){

                            $BoardName = $_REQUEST['btitle'];
                            $BoardTeamType = $_REQUEST['dropdown'];
                            $BoardVisbility = $_REQUEST['Visibility-dropdown'];
                            $BoardBackground = "images/blog-img78.jpg";

                            $board_query="insert into tblboard values(null,'$BoardName','$BoardTeamType','$BoardVisbility','".$_SESSION['UserID']."',now(),2,null,'$BoardBackground',1)";
                            $run_board = mysqli_query($con,$board_query);

                            if($run_board){

                    ?>
                                <script type="text/javascript">
                                    alert("Data inserted successfully");
                                    window.location.href = 'Personal_template.php';
                                </script>

                    <?php
                            }   
                            else{
                            echo "error".mysqli_error($con);   
                            }

                         }

                    ?>

                <button type="submit" name="Personalsubmit" class="btn cancel">Create</button>
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
                                        <li class="breadcrumb-item">
                                            <a href="index.php?Uid=<?php echo $_SESSION['UserID'];?>"><i class="material-icons icon-20pt">home</i></a>
                                        </li>
                                        <li class="breadcrumb-item"><a href="#">Template</a></li>
                                        <li class="breadcrumb-item" aria-current="page">
                                            <a href="dashboard_template_personal.php?Uid=<?php echo $_SESSION['UserID'];?>">Personal</a>
                                        </li>
                                    </ol>
                                </nav>
                                <h1 class="m-0">Personal</h1>
                            </div>
                        </div>
                    </div>
                    <!--End Bold header section-->


                    <!--Start Image and Description section-->
                    <div class="container-fluid page__container">
                        <div class="row">

                            <!--Start Image section-->
                            <a href="#" class="dp-preview card mb-4">
                                <img src="assets/images/blog-slider-img7.jpg" alt="digital product" class="img-fluid">
                            </a>
                            <!--End Image section-->

                            <!--Start Descrition section-->
                            <div>
                                <div class="container-fluid page__heading-container">
                                    <div class="page__heading d-flex align-items-center">
                                        <div class="flex">
                                            <h2 class="m-0">Vacation Planning</h2>
                                        </div>
                                        <a href="Personal_template.php?Bid=0" class="btn btn-success ml-3">View Template</a>
                                        <a href="#" class="btn btn-success ml-3" onclick="openTemplatePopup()" >Use Template</a>
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

                                    <p class="mb-4">Effortlessly plan your next adventure including your packing list, budget, hotel accommodations, foods to eat, and sights to see. Get all the vacation logistics onto a single board so you can focus on the important part: Relaxing.</p>
                                    <p class="mb-4">- Make a list with items you need to do before your trip starts: packing lists, passport updates, booking confirmations, etc.</p>
                                    <p class="mb-4">- When people inevitably give you recommendations, keep them all in “Things To Do/Places to Eat” lists so you don’t forget.</p>
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