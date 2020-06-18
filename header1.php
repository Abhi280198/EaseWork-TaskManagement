
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


</style>

<!--Start Database --> 
<?php
    include_once("DbConnection.php");

    /*Start Create Team Insert Data*/
    if(isset($_REQUEST['submit']))
    {

        $teamName = $_REQUEST['teamname'];
        $teamType = $_REQUEST['teamDropdown'];
        $description = $_REQUEST['teamdescription'];

        $query="insert into tblteam values(null,'$teamName','$teamType','$description','".$_SESSION['UserID']."',now(),1,null)";
        $run = mysqli_query($con,$query);

        if($run){

        ?>
            <script type="text/javascript">
                alert("Data inserted successfully");
                window.location.href = 'index.php'; 
            </script>

        <?php
        }   
        else{
        echo "error".mysqli_error($con);   
        }
    }
    /*End Create Team Insert Data*/
?>

<?php
    /*Start Create Board Insert Data*/
    if(isset($_REQUEST['submitboard']))
    {

        $BoardName = $_REQUEST['Boardname'];
        $BoardTeamType = $_REQUEST['Boarddropdown'];
        $BoardVisbility = $_REQUEST['BoardVisbility'];
        $BoardBackground = $_REQUEST['boardBackground'];
        /*$UserID=$_SESSION['UserID'];*/

        $board_query="insert into tblboard values(null,'$BoardName','$BoardTeamType','$BoardVisbility','".$_SESSION['UserID']."',now(),null,null,$BoardBackground,1)";
        $run_board = mysqli_query($con,$board_query);

        if($run_board){

        ?>
            <script type="text/javascript">
                alert("Data inserted successfully");
                window.location.href = 'index.php';
            </script>

        <?php
        }   
        else{
        echo "error".mysqli_error($con);   
        }
    }
    /*End Create Board Insert Data*/
?>
<!-- END Database --> 


<!-- VALIDATION of CreateBoard -->
<script type="text/javascript">
    function validate()
    {
        
        var Bname = document.forms["createBoardForm"]["title"].value;
        
        if(Bname == ""){
                document.getElementById('span_BTitle').innerHTML =" ** Please fill the Board Title";
                return false;
            }else{
                document.getElementById('span_BTitle').innerHTML ="";
            }

             /*window.location.href = 'board.php'; */
             return true;

    }
</script>
<!--END VALIDATION of CreateBoard -->

<!-- VALIDATION of CreatetTeam -->
<script type="text/javascript">
    function teamValidate()
    {
        
        var Tname = document.forms["createTeamForm"]["teamname"].value;
        
        if(Tname == ""){
                document.getElementById('span_Tname').innerHTML =" ** Please fill the Team Name";
                return false;
            }else{
                document.getElementById('span_Tname').innerHTML ="";
            }

             // window.location.href = 'TeamPage.php'; 
             return false;

    }
</script>
<!--END VALIDATION of CreateBoard -->
   
<!-- CREATE BOARD POPUP -->
<div class="form-popup" id="myForm">
                              <form  class="form-container" id="createBoardForm">
                                <div class="createBoard_MainContainer">
                                    <div class="my-3" class="header">
                                    <h1>Create Board</h1>
                                    
                                    </div>
                                    
                                    <div class="my-3" >
                                        <label for="title"><b>Board Title:</b></label>
                                        <input type="text" placeholder="title" name="Boardname" id="title" required>
                                        <div id="span_BTitle" style="color: red"></div>  
                                    </div>

                                    <div class="my-3">
                                        <label for="title"><b>Team:</b></label>
                                        <select name = "Boarddropdown">
                                            <!-- php code Team -->
                                            <?php 
                                                $select_team="select * from tblteam where IsActive=1";
                                                $Execute_select_team=mysqli_query($con,$select_team)or die(mysqli_error($con));
                                                while($fetch_team=mysqli_fetch_array($Execute_select_team))
                                                {
                                            ?>
                                            <!-- php code team -->
                                            <option style="font-size: 16px;" value = "<?php echo $fetch_team['Tid'];?>"><?php echo $fetch_team['Tname'];?></option>
                                            <?php
                                                }
                                            ?>
                                         </select>
                                    </div>
                                     
                                    <div class="my-3">
                                        <label for="title"><b>Visibility:</b></label>
                                        <select name = "BoardVisbility">
                                            <option value = "Private" selected>Private</option>
                                            <option value = "Team">Team</option>
                                            <option value = "Public">Public</option>
                                         </select>
                                    </div>
                                    <div class="my-3">
                                     <a href="Template_dashboard.php" style="display:block;text-align: right;" ><b>Start with template</b></a>
                                    </div>                                   
                                    
                                    <input name="boardBackground" value="" class="hidden" id="background_url" style="display: none;" />

                                    <div style="position: relative;" class="my-3">
                                     <a href="#" style="display:block;text-align: right;" onclick="showBgPopover()" ><b>Add Background image</b></a> 
                                        
                                    <!-- start popover -->

                                                    <div class="main-popover" id="background-popover">
                                                        <div class="main-container">
                                                            <span>Background</span>
                                                            <button type="button" class="closeButton" onclick="hideBgPopover()">Close</button> 
                                                            <hr>
                                                        </div>
                                                        <div>
                                                            <div class="pop-over-content">
                                                                <ul class="grid-background">
                                                                    <li class="grid-background-item" >
                                                                        <div class="grid-background-select" onclick="selectBgImage(this)" style="background-image: url('images/bg1.jpg');">    
                                                                        </div>
                                                                    </li>
                                                                    <li class="grid-background-item">
                                                                        <div class="grid-background-select" onclick="selectBgImage(this)" style="background-image: url('images/bg2.jpg');">    
                                                                        </div>
                                                                    </li>
                                                                    <li class="grid-background-item">
                                                                        <div class="grid-background-select" onclick="selectBgImage(this)" style="background-image: url('images/bg3.jpg');">    
                                                                        </div>
                                                                    </li>
                                                                    <li class="grid-background-item">
                                                                        <div class="grid-background-select" onclick="selectBgImage(this)" style="background-image: url('images/bg4.jpg');">    
                                                                        </div>
                                                                    </li>
                                                                    <li class="grid-background-item">
                                                                        <div class="grid-background-select" onclick="selectBgImage(this)" style="background-image: url('images/bg5.jpg');">    
                                                                        </div>
                                                                    </li>
                                                                    <li class="grid-background-item">
                                                                        <div class="grid-background-select" onclick="selectBgImage(this)" style="background-image: url('images/bg6.jpg');">    
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
                                                            imgUrl=bi.slice(bi.indexOf('image'),-2);
                                                            console.log(imgUrl);
                                                            var bgUrl=document.getElementById('background_url').value=imgUrl;
                                                        }

                                                    </script>
                                    <!-- END popover -->

                                    </div>
                                    

                                    <div class="my-3" class="canclebtn">
                                    <button name="submitboard" type="submit" class="btn cancel" onclick="validate()">Create Board</button>
                                    <button type="button" class="btn cancel" onclick="closeForm()" >Cancel</button>
                                    </div>
                                </div>
                              </form>

</div>

<!-- END CREATE BOARD POPUP -->


<!-- CREATE TEAM POPUP -->

<div class="form-popup" id="myteamForm">
                              <form class="form-container" id="createTeamForm">
                                <div>
                                    <div class="my-3"class="header">
                                    <h1>Let's build a team</h1>
                                    </div>
                                    
                                    <div class="my-3">
                                        <label for="title"><b>Team Name:</b></label>
                                        <input type="text" placeholder="Team Name" name="teamname" required>
                                        <div id="span_Tname" style="color: red"></div>  
                                    </div>

                                    <div class="my-3">
                                        <label for="title"><b>Team Type:</b></label>
                                        <select name = "teamDropdown">
                                            <option value = "Educational" selected>Educational</option>
                                            <option value = "Marketing">Marketing</option>
                                            <option value = "others">others</option>
                                         </select>
                                     </div>
                                    
                                    <div class="my-3">
                                        <label for="title"><b>Team Description:</b></label>
                                        <input type="text" placeholder="Team Description" name="teamdescription" required>
                                    </div>
                                    
                                    <div class="my-3" class="canclebtn">
                                        <button name="submit" type="submit" class="btn cancel" onclick="teamValidate()" >Create Team</button>
                                        <button type="button" class="btn cancel" onclick="closeteamForm()">Cancel</button>
                                    </div>

                                </div>
                              </form>

 </div>

<!-- END CREATE TEAM POPUP -->


<div id="header" class="mdk-header js-mdk-header m-0" data-fixed>
            <div class="mdk-header__content">

                <div class="navbar navbar-expand-sm navbar-main navbar-dark bg-dark  pr-0" id="navbar" data-primary>
                    <div class="container-fluid p-0">

                        <!-- Navbar toggler -->

                        <button class="navbar-toggler navbar-toggler-right d-block d-md-none" type="button" data-toggle="sidebar">
                            <span class="navbar-toggler-icon"></span>
                        </button>


                        <!-- Navbar Brand -->
                        <a href="index.php" class="navbar-brand ">
                            <img class="navbar-brand-icon" src="assets/images/stack-logo-white.svg" width="22" alt="Stack">
                            <span>EASEWORK</span>
                        </a>


                        <ul class="nav navbar-nav ml-auto d-none d-md-flex">
                            <li class="nav navbar-nav d-none d-sm-flex border-left navbar-height align-items-center" class="nav-item" >
                                <a href="#" class="nav-link" onclick="openForm()">
                                    CREATE BOARD
                                </a> 
                            </li>

                            <!-- JavaScript of CreateBoard -->

                            <script>
                            function openForm() {
                              document.getElementById("myForm").style.display = "flex";
                            }

                            function closeForm() {
                                document.getElementById('span_BTitle').innerHTML ="";
                              document.getElementById("myForm").style.display = "none";
                            }
                            </script>

                            <!-- END JavaScript of CreateBoard -->

                            <li class="nav navbar-nav d-none d-sm-flex border-left navbar-height align-items-center" class="nav-item" >
                                <a href="#" class="nav-link" onclick="openteamForm()">
                                    CREATE TEAM
                                </a> 
                            </li>
                            
                            <!-- JavaScript of CreateTeam -->
                            <script>
                            function openteamForm() {
                              document.getElementById("myteamForm").style.display = "flex";
                            }

                            function closeteamForm() {
                                document.getElementById('span_Tname').innerHTML ="";
                              document.getElementById("myteamForm").style.display = "none";

                            }
                            </script>

                            <!-- END JavaScript of CreateBoard -->

                            <li class="nav navbar-nav d-none d-sm-flex border-left navbar-height align-items-center" class="nav-item dropdown" >
                                <a href="#notifications_menu" class="nav-link dropdown-toggle" data-toggle="dropdown" data-caret="false">
                                    <i class="material-icons nav-icon navbar-notifications-indicator">notifications</i>
                                </a>
                                <div id="notifications_menu" class="dropdown-menu dropdown-menu-right navbar-notifications-menu">
                                    <div class="dropdown-item d-flex align-items-center py-2">
                                        <span class="flex navbar-notifications-menu__title m-0">Notifications</span>
                                        <a href="javascript:void(0)" class="text-muted"><small>Clear all</small></a>
                                    </div>
                                    <div class="navbar-notifications-menu__content" data-simplebar>
                                        <div class="py-2">

                                            <div class="dropdown-item d-flex">
                                                <div class="mr-3">
                                                    <div class="avatar avatar-sm" style="width: 32px; height: 32px;">
                                                        <img src="assets/images/256_daniel-gaffey-1060698-unsplash.jpg" alt="Avatar" class="avatar-img rounded-circle">
                                                    </div>
                                                </div>
                                                <div class="flex">
                                                    <a href="#">A.Demian</a> left a comment on <a href="#">Stack</a><br>
                                                    <small class="text-muted">1 minute ago</small>
                                                </div>
                                            </div>
                                            <div class="dropdown-item d-flex">
                                                <div class="mr-3">
                                                    <a href="#">
                                                        <div class="avatar avatar-xs" style="width: 32px; height: 32px;">
                                                            <span class="avatar-title bg-purple rounded-circle"><i class="material-icons icon-16pt">person_add</i></span>
                                                        </div>
                                                    </a>
                                                </div>
                                                <div class="flex">
                                                    New user <a href="#">Peter Parker</a> signed up.<br>
                                                    <small class="text-muted">1 hour ago</small>
                                                </div>
                                            </div>
                                            <div class="dropdown-item d-flex">
                                                <div class="mr-3">
                                                    <a href="#">
                                                        <div class="avatar avatar-xs" style="width: 32px; height: 32px;">
                                                            <span class="avatar-title rounded-circle">JD</span>
                                                        </div>
                                                    </a>
                                                </div>
                                                <div class="flex">
                                                    <a href="#">Big Joe</a> <small class="text-muted">wrote:</small><br>
                                                    <div>Hey, how are you? What about our next meeting</div>
                                                    <small class="text-muted">2 minutes ago</small>
                                                </div>
                                            </div>

                        
                                        </div>
                                    </div>
                                    <a href="javascript:void(0);" class="dropdown-item text-center navbar-notifications-menu__footer">View All</a>
                                </div>
                            </li>
                        </ul>

                        <ul class="nav navbar-nav d-none d-sm-flex border-left navbar-height align-items-center">
                            <!-- <?php
                            
                                /*if(isset($_SESSION['UserID']))
                                {

                                    $sel_User="select * from tblUser where UserID='".$_SESSION['UserID']."'";
                                    $Execute_sel_User=mysqli_query($con,$sel_User) or die(mysqli_error($con));
                                    $fetch=mysqli_fetch_array($Execute_sel_User);*/
                            ?> -->

                                    <li class="nav-item dropdown">
                                        <?php
                                            $select_query="select * from tbluser where Uid='".$_SESSION['UserID']."'";
                                            $Execute_Q=mysqli_query($con,$select_query) or die(mysqli_error($con));
                                            $fetch=mysqli_fetch_array($Execute_Q);
                                            $imageName=$fetch['ProfilePic'];
                                              
                                            if($imageName=="" || !file_exists("images/profile/$imageName"))
                                            {
                                                $imageName="No.png";
                                            }
                                        ?>
                                        <a href="#account_menu" class="nav-link dropdown-toggle" data-toggle="dropdown" data-caret="false">
                                            <img src="images/profile/<?php echo $imageName;?>" class="rounded-circle" width="32" alt="Frontted">
                                            <span class="ml-1 d-flex-inline">
                                                <span class="text-light"><?php echo $_SESSION['Firstname']?></span>
                                            </span>
                                        </a>
                                        <div id="account_menu" class="dropdown-menu dropdown-menu-right">
                                            <div class="dropdown-item-text dropdown-item-text--lh">
                                                <div><strong><?php echo $_SESSION['Firstname']." ".$_SESSION['Lastname'];?></strong></div>
                                                <div><?php echo $_SESSION['Emailid'];?></div>
                                            </div>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item active" href="index.php">Dashboard</a>
                                            <a class="dropdown-item" href="profile.php">My profile</a>
                                            <!-- <a class="dropdown-item" href="edit-account.html">Edit account</a> -->
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="logout.php">Logout</a>
                                        </div>
                                    </li>


                        </ul>

                    </div>
                </div>

            </div>
        </div>