<?php include_once("DbConnection.php");
    
    $Tid=$_GET['Tid'];    
    $tid=$tname=$ttype=$description=$profilepic="";

    $teamprofile_query="select * from tblteam where Tid=$Tid";
    $Execute_Q=mysqli_query($con,$teamprofile_query) or die(mysqli_error($con));
    $fetch=mysqli_fetch_array($Execute_Q);

    $tid = $fetch['Tid'];
    $tname = $fetch['Tname'];
    $ttype = $fetch['Ttype'];       
    $description = $fetch['Description'];
    $profilepic = $fetch['ProfilePic'];

    if (isset($_REQUEST['buttonSave'])) 
    {
        if(!empty($_FILES['textpic']['name']))
        {
            $img2=$_FILES['textpic']['name'];
            $tempimg=$_FILES['textpic']['tmp_name'];
            $folder="images/teamprofile/".$img2;
            move_uploaded_file($tempimg,$folder);
        }
        else
        {
            $img2=$profilepic;
        }

        $UpdateTeam = "update tblteam set Tname='".$_REQUEST['teamname']."',Ttype='".$_REQUEST['teamtype']."',
                        Description='".$_REQUEST['teamdescription']."', ProfilePic='".$img2."' where Tid=$Tid";
        $Exe_update=mysqli_query($con,$UpdateTeam)or die(mysqli_error($con));
        header("location:Team_profile.php?Tid=$tid");
    }
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    
    <title>EaseWork- Team Profile</title>
    <?php include_once('csslinks.php');?>

    <!-- start validation form -->
    <script type="text/javascript">

        function val()
        {
            // var desc = document.getElementById("desc2").value;
            var name = document.getElementById("name").value;
            var description = document.getElementById("description").value;

            if(name == ""){
                document.getElementById('span_name').innerHTML =" ** Please fill your Name";
                return false;
            }else{
                document.getElementById('span_name').innerHTML ="";
            }

            if(description == ""){
                document.getElementById('span_description').innerHTML =" ** Please fill the description about team";
                return false;
            }
            else{
                document.getElementById('span_description').innerHTML ="";

            }

            /*window.location.href = 'Team_profile.php'; */
            return true;

        }
    </script>
    <!-- end validation form -->

</head>

<body class="layout-default">


    <div class="preloader"></div>
    <div class="mdk-header-layout js-mdk-header-layout">

        <!-- Header -->
        <?php include_once('header1.php');?>
        <!-- end Header -->

        <div class="mdk-header-layout__content">
            <div class="mdk-drawer-layout js-mdk-drawer-layout" data-push data-responsive-width="992px">
                <div class="mdk-drawer-layout__content page">

                    <div class="container-fluid  page__heading-container">
                        <div class="page__heading">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb mb-0">
                                    <li class="breadcrumb-item"><a href="index.php"><i class="material-icons icon-20pt">home</i></a></li>
                                    <li class="breadcrumb-item"><a href="TeamPage.php">Team</a></li>
                                    <li class="breadcrumb-item aria-current="page"><a href="Team_profile.php">PROFILE</a></li>
                                </ol>
                            </nav>
                            <h2 class="m-0"><span style="color: #ff214f;">Team Profile</span></h2>
                        </div>
                    </div>

                    <div class="container-fluid page__container">
                        <div class="card card-form">
                            <div class="row no-gutters">

                                <div class="col-lg-4 card-body">
                                    <p><strong class="headings-color">Profile</strong></p>
                                    <p class="text-muted">Edit your Team profile.</p>
                                </div>

                                <div class="col-lg-8 card-form__body card-body">
                                    <form action="" method="post" enctype="multipart/form-data">
                                        <!-- Start Prrofile section-->
                                        <div class="col-lg-8 card-form__body card-body">
                                            
                                            <!-- Start Profile Picture-->
                                            <div class="form-group">
                                            <label>Profile Picture</label>
                                                <div class="dz-clickable media align-items-center" data-toggle="dropzone" data-dropzone-url="http://" data-dropzone-clickable=".dz-clickable" data-dropzone-files='["assets/images/account-add-photo.svg"]'>
                                                    <div class="dz-preview dz-file-preview dz-clickable mr-3">
                                                        <div class="avatar" style="width: 80px; height: 80px;">
                                                            <?php
                                                                if($profilepic=="" || !file_exists("images/teamprofile/$profilepic"))
                                                                {
                                                                    $profilepic="teampro1.jpg";
                                                                }
                                                            ?>
                                                            <a href="images/teamprofile/<?php echo $profilepic;?>">
                                                                <img src="images/teamprofile/<?php echo $profilepic;?>" class="avatar-img rounded" alt="..." data-dz-thumbnail>
                                                            </a>
                                                        </div>
                                                    </div>

                                                    <div class="media-body"><br><br>
                                                        <input type="file" name="textpic" class="btn btn-sm btn-primary dz-clickable" value="">
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Profile Picture-->

                                            <!-- Start Team Name-->
                                            <div class="form-group">
                                                <label for="fname">Name</label>
                                                <input id="name" type="text" class="form-control" name="teamname" value="<?php echo $tname;?>" placeholder="Name" >
                                                <span id="span_name" style="color: red"></span>
                                            </div>
                                            <!-- End Team Name-->

                                            <!-- Start Team Type-->
                                            <div class="form-group">
                                                <label for="teamType">Type</label>
                                                <select id="type" name="teamtype" class="form-control">
                                                    <option value="Education" <?php if($ttype=='Education') echo "selected";?> >Education</option>
                                                    <option value="Personal" <?php if($ttype=='Personal') echo "selected";?> >Personal</option>
                                                    <option value="Event Management" <?php if($ttype=='Event Management') echo "selected";?> >Event Management</option>
                                                    <option value="Project Management" <?php if($ttype=='Project Management') echo "selected";?> >Project Management</option>
                                                    <option value="Marketing" <?php if($ttype=='Marketing') echo "selected";?> >Marketing</option>
                                                    <option value="Others" <?php if($ttype=='Others') echo "selected";?> >Others</option>
                                                </select>
                                            </div>
                                            <!-- End Team Type -->

                                            <!-- Start Description-->
                                            <div class="form-group">
                                                <label for="desc2">Description</label>
                                                <textarea name="teamdescription" id="description" rows="4" class="form-control" placeholder="Description ..." ><?php echo $description;?></textarea>
                                                <span id="span_description" style="color: red"></span>
                                            </div>
                                            <!-- End Description-->

                                            <br><br>

                                            <!-- Start button-->
                                            <div class="text-right mb-5">
                                                <button type="submit" name="buttonSave" class="btn btn-success" onclick="return val();">Save</button>
                                            </div>
                                            <!-- End Button-->

                                        </div>
                                        <!-- End Profile Section-->
                                    </form>                                      
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
                <?php include_once('sidebar_team.php');?>
            </div>
        </div>
        
    </div>

    <?php include_once('scriptlinks.php');?>
</body>


<!-- Mirrored from demo.frontted.com/stackadmin/133/edit-account.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 28 May 2020 07:53:22 GMT -->
</html>