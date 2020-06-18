<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    
    <title>EaseWork- Team Profile</title>
    <?php include_once('csslinks.php');?>

    <!-- start validation form -->
    <script type="text/javascript">

        function validate()
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

            window.location.href = 'Team_profile.php'; 
            return false;

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
                                    <li class="breadcrumb-item">Team</li>
                                    <li class="breadcrumb-item active" aria-current="page">PROFILE</li>
                                </ol>
                            </nav>
                            <h1 class="m-0">Team Profile</h1>
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
                                    <form action="#">
                                        <!-- Start Prrofile section-->
                                        <div class="col-lg-8 card-form__body card-body">
                                            
                                            <!-- Start Profile Picture-->
                                            <div class="form-group">
                                            <label>Profile Picture</label>
                                                <div class="dz-clickable media align-items-center" data-toggle="dropzone" data-dropzone-url="http://" data-dropzone-clickable=".dz-clickable" data-dropzone-files='["assets/images/account-add-photo.svg"]'>
                                                    <div class="dz-preview dz-file-preview dz-clickable mr-3">
                                                        <div class="avatar" style="width: 80px; height: 80px;">
                                                            <img src="assets/images/account-add-photo.svg" class="avatar-img rounded" alt="..." data-dz-thumbnail>
                                                        </div>
                                                    </div>

                                                    <div class="media-body">
                                                        <button class="btn btn-sm btn-primary dz-clickable">Choose photo</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Profile Picture-->

                                            <!-- Start Team Name-->
                                            <div class="form-group">
                                                <label for="fname">Name</label>
                                                <input id="name" type="text" class="form-control" placeholder="Name" >
                                                <span id="span_name" style="color: red"></span>
                                            </div>
                                            <!-- End Team Name-->

                                            <!-- Start Team Type-->
                                            <div class="form-group">
                                                <label for="teamType">Type</label>
                                                <select id="type" name="type" class="form-control">
                                                    <option value="Education">Education</option>
                                                    <option value="Personal">Personal</option>
                                                    <option value="Event Management">Event Management</option>
                                                    <option value="Project Management">Project Management</option>
                                                    <option value="Others">Others</option>
                                                </select>
                                            </div>
                                            <!-- End Team Type -->

                                            <!-- Start website-->
                                            <div class="form-group">
                                                <label for="website">Website(optional)</label>
                                                <input id="websitee" type="text" class="form-control" placeholder="Website" >
                                            </div>
                                            <!-- End website -->

                                            <!-- Start Description-->
                                            <div class="form-group">
                                                <label for="desc2">Description</label>
                                                <textarea name="description" id="description" rows="4" class="form-control" placeholder="Description ..."></textarea>
                                                <span id="span_description" style="color: red"></span>
                                            </div>
                                            <!-- End Description-->

                                            <br><br>

                                            <!-- Start button-->
                                            <div class="text-right mb-5">
                                                <a href="#" class="btn btn-success" onclick="validate()">Save</a>
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