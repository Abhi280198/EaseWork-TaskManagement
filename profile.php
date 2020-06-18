<?php include_once("DbConnection.php");?>
<!DOCTYPE html>
<html lang="en" dir="ltr">


<!-- Mirrored from demo.frontted.com/stackadmin/133/edit-account.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 28 May 2020 07:53:17 GMT -->
<head>
    
    <title>EaseWork- Profile</title>
    <?php include_once('csslinks.php');?>

    <script type="text/javascript">
        function validate(){
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

            if(newPass == ""){
                document.getElementById('span_newPass').innerHTML =" ** Please fill the new PassWord";
                return false;
            }

            else{
                document.getElementById('span_newPass').innerHTML ="";

            }


            if(conPass == ""){
                document.getElementById('span_conPass').innerHTML =" ** Please fill the confirm PassWord";
                return false;
            }

            else{
                document.getElementById('span_conPass').innerHTML ="";

            }

            if(newPass != conPass){
                 document.getElementById('span_conPass').innerHTML =" ** Password not matching";
                return false;
            } 

            window.location.href = 'index.php'; 
            return false;

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
                                    
                                    <form action="#">
                                        <div class="form-group">
                                        <label>Avatar</label>
                                        <div class="dz-clickable media align-items-center" data-toggle="dropzone" data-dropzone-url="http://" data-dropzone-clickable=".dz-clickable" data-dropzone-files='["assets/images/account-add-photo.svg"]'>
                                            <div class="dz-preview dz-file-preview dz-clickable mr-3">
                                                <div class="avatar" style="width: 80px; height: 80px;">
                                                    <img src="assets/images/account-add-photo.svg" class="avatar-img rounded" alt="..." data-dz-thumbnail>
                                                </div>
                                            </div>
               `                             <div class="media-body">
                                                <button class="btn btn-sm btn-primary dz-clickable">Choose photo</button>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="desc2">Description</label>
                                         
                                        <input type="textarea" name="description" id="desc2" rows="4" class="form-control" placeholder="Description ...">
                                        <span id="span_description" style="color: red"></span>
                                    </div>

                                     <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="fname">First name</label>
                                                <input id="fname" type="text" class="form-control" placeholder="First name" >
                                                <span id="span_firstname" style="color: red"></span>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="lname">Last name</label>
                                                <input id="lname" type="text" class="form-control" placeholder="Last name" >
                                                <span id="span_lastname" style="color: red"></span>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="Mobile">Mobile NO.</label>
                                                <input id="Mobile_no" type="text" class="form-control" placeholder="Mobile NO." >
                                                <span id="span_Mobile" style="color: red"></span>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="Email">Email</label>
                                                <input id="Email" type="text" class="form-control" placeholder="Email" >
                                                <span id="span_email" style="color: red"></span>
                                            </div>
                                        </div>
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
                                        <input style="width: 270px;" id="opass" type="password" class="form-control" placeholder="Old password" >
                                        <span id="span_oldPass" style="color: red"></span>
                                    </div>
                                    <div class="form-group">
                                        <label for="npass">New Password</label>
                                        <input style="width: 270px;" id="npass" type="password" class="form-control" placeholder="New password" minlength="8">
                                        <span id="span_newPass" style="color: red"></span>
                                    </div>
                                    <div class="form-group">
                                        <label for="cpass">Confirm Password</label>
                                        <input style="width: 270px;" id="cpass" type="password" class="form-control" placeholder="Confirm password">
                                        <span id="span_conPass" style="color: red"></span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="text-right mb-5">
                            <a href="#" class="btn btn-success" onclick="validate()">Save</a>
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