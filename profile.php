<?php include_once("DbConnection.php");

     $Uid=$fname=$lname=$phone=$email=$password="";

    $Userprofile_query="select * from tbluser where Uid='".$_SESSION['UserID']."'";
    $Execute_Q=mysqli_query($con,$Userprofile_query) or die(mysqli_error($con));
    $fetch=mysqli_fetch_array($Execute_Q);

    $uid = $fetch['Uid'];
    $fname = $fetch['Fname'];
    $lname = $fetch['Lname'];       
    $email = $fetch['Email'];
    $mobile = $fetch['Mobile'];
    $oldpass = $fetch['Password'];
    $profilepic = $fetch['ProfilePic'];


    if (isset($_REQUEST['Save'])) 
    {
        if(!empty($_FILES['userpic']['name']))
        {
            $userimg=$_FILES['userpic']['name'];
            $tempuserimg=$_FILES['userpic']['tmp_name'];
            $folder="images/profile/".$userimg;
            move_uploaded_file($tempuserimg,$folder);
        }
        else
        {
            $userimg=$profilepic;
        }

        if ($_REQUEST['usernewpass']=="") 
        {
            
            $Updateprofile = "update tbluser set Fname='".$_REQUEST['userfirstname']."',Lname='".$_REQUEST['userlastname']."',
                        Email='".$_REQUEST['useremail']."', Mobile='".$_REQUEST['usermobile']."', ProfilePic='".$userimg."' where Uid='".$_SESSION['UserID']."'";
            $Exe_update=mysqli_query($con,$Updateprofile)or die(mysqli_error($con));
            header("location:profile.php?Uid=$uid");
        }
        /*else if($_REQUEST['usernewpass'].length>0 && $_REQUEST['usernewpass'].length<8)
        {
            echo("<script>alert('Weak PassWord..Enter more than 8 characters')</script>");
            header("location:profile.php?Uid=$uid");
        }*/
        else{
            $Updateprofile = "update tbluser set Fname='".$_REQUEST['userfirstname']."',Lname='".$_REQUEST['userlastname']."',
                        Email='".$_REQUEST['useremail']."', Mobile='".$_REQUEST['usermobile']."',Password='".$_REQUEST['usernewpass']."', ProfilePic='".$userimg."' where Uid='".$_SESSION['UserID']."'";
            $Exe_update=mysqli_query($con,$Updateprofile)or die(mysqli_error($con));
            header("location:profile.php?Uid=$uid");
        }
       
    }
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    
    <title>EaseWork- Profile</title>
    <?php include_once('csslinks.php');?>

    <script type="text/javascript">
        function profilevalidate(){
            // var desc = document.getElementById("desc2").value;
            var fname = document.getElementById("fname").value;
            var lname = document.getElementById("lname").value;
            var Mob = document.getElementById("Mobile_no").value;
            var email = document.getElementById("Email").value;
            var oldPass = document.getElementById("opass").value;
            var newPass = document.getElementById("npass").value;
            var conPass = document.getElementById("cpass").value;

            if(fname == ""){
                document.getElementById('span_firstname').innerHTML =" ** Please fill the firstname";
                return false;
            }else{
                document.getElementById('span_firstname').innerHTML ="";
            }

            if(lname == ""){
                document.getElementById('span_lastname').innerHTML =" ** Please fill the firstname";
                return false;
            }
            else{
                document.getElementById('span_lastname').innerHTML ="";

            }

            if(Mob == ""){
                document.getElementById('span_Mobile').innerHTML =" ** Please fill the firstname";
                return false;
            }
            else{
                document.getElementById('span_Mobile').innerHTML ="";

            }

            if (Mob.length!=10) {
                document.getElementById('span_Mobile').innerHTML =" ** Mobile number must be 10 digits only.";
                return false;
            }

            if (isNaN(Mob)) {
                document.getElementById('span_Mobile').innerHTML =" ** Digits only not characters";
                return false;
            }

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

            if(oldPass == ""){
                document.getElementById('span_oldPass').innerHTML =" ** Please fill the old PassWord ";
                return false;
            }
            else{
                document.getElementById('span_oldPass').innerHTML ="";

            }

            /*if (newPass.length<=8) {
                document.getElementById('span_newPass').innerHTML =" ** Weak Password...Enter more than 8 characters";
                return false;
            }*/

            if(newPass != conPass){
                 document.getElementById('span_conPass').innerHTML =" ** Password not matching";
                return false;
            } 

            /*window.location.href = 'index.php'; */
            return true;

        }
    </script>

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



                    <div class="container-fluid  page__heading-container">
                        <div class="page__heading">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb mb-0">
                                    <li class="breadcrumb-item"><a href="#"><i class="material-icons icon-20pt">home</i></a></li>
                                    <li class="breadcrumb-item active" aria-current="page">PROFILE</li>
                                </ol>
                            </nav>
                            <h1 class="m-0">Manage your personal information</h1>
                        </div>
                    </div>




                    <div class="container-fluid page__container">
                        <div class="card card-form">
                            <div class="row no-gutters">
                                <div class="col-lg-4 card-body">
                                    <p><strong class="headings-color">Basic Information</strong></p>
                                    <p class="text-muted">Edit your account details and settings.</p>
                                </div>
                                <div class="col-lg-8 card-form__body card-body">
                                    
                                    <form action="" method="post" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label>Avatar</label>
                                            <div class="dz-clickable media align-items-center" data-toggle="dropzone" data-dropzone-url="http://" data-dropzone-clickable=".dz-clickable" data-dropzone-files='["assets/images/account-add-photo.svg"]'>
                                                <div class="dz-preview dz-file-preview dz-clickable mr-3">
                                                    <div class="avatar" style="width: 80px; height: 80px;">
                                                        <?php
                                                            if($profilepic=="" || !file_exists("images/profile/$profilepic"))
                                                            {
                                                                $profilepic="No.png";
                                                            }
                                                        ?>
                                                        <a href="images/profile/<?php echo $profilepic;?>">
                                                            <img src="images/profile/<?php echo $profilepic;?>" class="avatar-img rounded" alt="..." data-dz-thumbnail>
                                                        </a>
                                                    </div>
                                                </div>
                   `                            <div class="media-body">
                                                    <input type="file" name="userpic" class="btn btn-sm btn-primary dz-clickable" value="">
                                                </div>
                                            </div>
                                        </div>
                                    
                                         <div class="row">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="fname">First name</label>
                                                    <input id="fname" name="userfirstname" type="text" class="form-control" placeholder="First name" value="<?php echo $fname;?>">
                                                    <span id="span_firstname" style="color: red"></span>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="lname">Last name</label>
                                                    <input id="lname" type="text" class="form-control" placeholder="Last name" value="<?php echo $lname;?>" name="userlastname">
                                                    <span id="span_lastname" style="color: red"></span>
                                                </div>
                                            </div>
                                        </div>
                                    
                                        <div class="form-group">
                                            <label for="Mobile">Mobile NO.</label>
                                            <input id="Mobile_no" type="text" class="form-control" placeholder="Mobile NO." value="<?php echo $mobile;?>" name="usermobile">
                                            <span id="span_Mobile" style="color: red"></span>
                                        </div>

                                        <div class="form-group">
                                            <label for="Email">Email</label>
                                            <input id="Email" type="text" class="form-control" placeholder="Email" value="<?php echo $email;?>" readonly name="useremail">
                                            <span id="span_email" style="color: red" ></span>
                                        </div>


                                </div>
                            </div>
                        </div>

                        <div class="card card-form">
                            <div class="row no-gutters">
                                <div class="col-lg-4 card-body">
                                    <p><strong class="headings-color">Update Your Password</strong></p>
                                    <p class="text-muted">Change your password.</p>
                                </div>
                                <div class="col-lg-8 card-form__body card-body">
                                    <div class="form-group">
                                        <label for="opass">Old Password</label>
                                        <input style="width: 270px;" id="opass" type="password" class="form-control" placeholder="Old password" value="<?php echo $oldpass;?>" name="useroldpass" readonly>
                                        <span id="span_oldPass" style="color: red"></span>
                                    </div>
                                    <div class="form-group">
                                        <label for="npass">New Password</label>
                                        <input style="width: 270px;" id="npass" type="password" name="usernewpass" class="form-control" placeholder="New password" minlength="8">
                                        <span id="span_newPass" style="color: red"></span>
                                    </div>
                                    <div class="form-group">
                                        <label for="cpass">Confirm Password</label>
                                        <input style="width: 270px;" id="cpass" type="password" class="form-control"name="userconfirmpass" placeholder="Confirm password">
                                        <span id="span_conPass" style="color: red"></span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="text-right mb-5"> 
                            <button type="submit" name="Save" class="btn btn-success" onclick="return profilevalidate();">Save</button>
                        </div>
                    </div>

                    </form>
                </div>
                <!-- // END drawer-layout__content -->

                <?php include_once('sidebar1.php');?>
            </div>
            <!-- // END drawer-layout -->

        </div>
        <!-- // END header-layout__content -->

    </div>
    <!-- // END header-layout -->

   <?php include_once('scriptlinks.php');?>

</body>


<!-- Mirrored from demo.frontted.com/stackadmin/133/edit-account.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 28 May 2020 07:53:22 GMT -->
</html>