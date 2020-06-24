<?php 
    include_once("DbConnection.php");
    // $Uid=$_GET['Uid'];
    $Tid=$_GET['Tid'];

    if(isset($_REQUEST['MemberDetailSubmit'])){

        $Mem_Email = $_REQUEST['memberEmail'];
        $BoardName = $_REQUEST['Member_dropdown'];

        $SelectData="select * from tbluser where Email='$Mem_Email'";
        $Execute_select_Data = mysqli_query($con,$SelectData)or die(mysqli_error($con));
        $fetch_Data=mysqli_fetch_array($Execute_select_Data);
        $UserID =  $fetch_Data['Uid'];
        

        $TeamMember_query="insert into tblteammember values(null,'$Tid','$UserID','$Mem_Email','$BoardName',now(),1)";
        $run_TeamMember = mysqli_query($con,$TeamMember_query);

        if($run_TeamMember){

        ?>
            <script type="text/javascript">
                alert("Data inserted successfully");
            </script>

        <?php
        }   
        else{
        echo "error".mysqli_error($con);   
        }

     }
?>

<script type="text/javascript">
    
    function MemberEmailvalidate(){
        var email = document.getElementById("team-member").value;
        console.log(email);

         if(email == ""){
                document.getElementById('span_email').innerHTML =" ** Please fill the firstname";
                return false;
            }

            else{
                document.getElementById('span_email').innerHTML ="";

            }

            if(email.indexOf('@') <= 0){
                document.getElementById('span_email').innerHTML =" ** @ Invalid Position";
                return false;
            }
            if((email.charAt(email.length-4)!='.') && (email.charAt(email.length-3)!='.'))
            {
                document.getElementById('span_email').innerHTML =" ** . Invalid Position";
                return false;
            }

        return true;

    }
</script>

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
                            <form method="post">
                                <input class="member-input" type="text" name="memberEmail" id="team-member" placeholder="Enter members email" >
                                <span id="span_email" style="color: red"></span>


                                <select class="member-select" name = "Member_dropdown">
                                    <!-- php code Team -->
                                        <?php 
                                            $select_board="select * from tblboard where Tid=$Tid AND IsActive=1 AND Uid IN (1,'".$_SESSION['UserID']."')";
                                            $Execute_select_board=mysqli_query($con,$select_board)or die(mysqli_error($con));
                                            while($fetch_board=mysqli_fetch_array($Execute_select_board))
                                        {
                                        ?>
                                    <!-- php code team -->
                                        <option value = "<?php echo $fetch_board['Bid'];?>" selected><?php echo $fetch_board['Btitle'];?></option>
                                        
                                        <?php
                                            }
                                        ?>
                                </select>
                                <button type="submit" name="MemberDetailSubmit" onclick="return MemberEmailvalidate();" class="btn btn-success ml-3">Add Team Members</button>
                            </form>
                        </div>
                    </div>


                    <div class="container-fluid page__container">   

                        <!-- First div -->               
                        <?php

                            $Qry = "SELECT t.Uid,t.Bid,COUNT(t.Uid) AS 'BoardCount',u.Lname,u.ProfilePic,u.Fname,u.Email FROM tblteammember t, tbluser u where t.Uid=u.Uid AND t.Tid=$Tid GROUP BY t.Uid";
                            $res=mysqli_query($con,$Qry);
                            if($res->num_rows!=0){
                                while($row=$res->fetch_array())  
                                    {   
                                        $Bid=$row['Bid'];
                                        $Uid=$row['Uid'];
                                        $FirstName=$row['Fname'];
                                        $LastName=$row['Lname'];  
                                        $Profile=$row['ProfilePic'];
                                        $Email=$row['Email'];
                                        $count=$row['BoardCount']; 

                                        if($Profile=="" || !file_exists("images/profile/$Profile"))
                                        {
                                            $Profile="No.png";
                                        }                   
                            
                            ?>
                        <div class="row align-items-center projects-item mb-1">
                            
                            <div class="col-sm">
                                <div class="card m-0">
                                    <div class="px-4 py-3">
                                        <div class="row align-items-center">
                                            <div class="col" style="min-width: 300px">
                                                
                                                <div class="d-flex align-items-center">
                                                   
                                                    <a href="#" class="d-flex align-items-middle">
                                                        <span class="avatar avatar-xxs avatar-online mr-2">
                                                            <img src="images/profile/<?php echo $Profile;?>" alt="Avatar" class="avatar-img rounded-circle">
                                                        </span>
                                                        <!-- Sherri Cardenas -->
                                                        <?php echo $FirstName; ?><?php echo $LastName; ?>
                                                    </a>
                                                </div>
                                                <div class="d-flex align-items-center">
                                                    <a href="#" class="text-body"><strong class="text-15pt mr-2"><?php echo $Email; ?></strong></a>
                                                    
                                                </div>
                                            </div>
                                            
                                            
                                                <div style="position: relative;" class="col-auto d-flex align-items-center">

                                                    <a href="#" class="text-body" onclick="show()">On <?php echo $count; ?> Boards</a>

                                                    <!-- start popover -->
                                                    

                                                    <div class="main-popover" id="board-popup">
                                                        <div class="main-container">
                                                            <span>Team Boards</span>
                                                            <button type="button" class="closeButton" onclick="hidePopover()">Close</button> 
                                                            <hr>
                                                        </div>
                                                        <div>
                                                            <p><?php echo $FirstName; ?><?php echo $LastName; ?> is a member of following team boards:</p>
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

                                                <!-- ----------------Admin or member--------------------- -->

                                                <?php

                                                    $select_memTeamType="SELECT Uid FROM tblteam where Tid=$Tid AND Uid=$Uid";
                                                    $Execute_select_memTeamType=mysqli_query($con,$select_memTeamType);
                                                    if($Execute_select_memTeamType->num_rows!=0){

                                                        // $row= $Execute_select_memTeamType->fetch_array();
                                                        // $teamUid= $row['Uid'] ;
                                                                                                       
                                                        // if($Uid==$teamUid)
                                                        // {
                                                ?>
                                                <div class="div-buttons" class="col-auto d-flex align-items-center">
                                                    
                                                    <a href="#" class="text-body">Admin</a>
                                                </div>
                                                
                                                <?php
                                                    }
                                                    else{

                                                ?>
                                                <div class="div-buttons" class="col-auto d-flex align-items-center">
                                                    
                                                    <a href="#" class="text-body">Member</a>
                                                </div>
                                                <?Php
                                                    }
                                                ?>
                                                <!-- ----------------Leave or Remove----------------- -->

                                                <?php
                                                
                                                if($Uid==$_SESSION['UserID'])
                                                {


                                                ?>
                                                <div class="div-buttons" class="col-auto d-flex align-items-center" style="min-width: 140px;">
                                                    <a href="#" class="text-dark-gray">Leave</a>
                                            
                                                </div>
                                                <?php
                                                    }
                                                    else{
                                                ?>       
                                                <div class="div-buttons" class="col-auto d-flex align-items-center" style="min-width: 140px;">
                                                    <a href="#" class="text-dark-gray">Remove</a>
                                            
                                                </div>
                                                <?php
                                                    }
                                                ?>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>

                        <?php
                                }
                            }
                        ?> 
                        <!-- END First div -->

                        


                    </div>


                </div>
                <!-- // END drawer-layout__content -->

                <!--Start sidebar section-->
                <?php include_once('sidebar_team.php');?>
                <!--End sidebar section-->
                
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