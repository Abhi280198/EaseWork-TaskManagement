<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    
    <title>EaseWork- Personal Template</title>
     <?php include_once('csslinks.php');?>
</head>

<body class="layout-default">

    <!-- popup -->

    <div class="form-popup" id="useTemplatePopup">
        <form action="/action_page.php" class="form-container">
            <div class="header">
            <h1>Use Template</h1>
                                        
            </div><br><br>
                                        
            <label for="title"><b>Title Name:</b></label>
            <input type="text" placeholder="title" name="title" required><br><br>

            <label for="title"><b>Team Name:</b></label>
            <select name = "dropdown">
            <option value = "No Team" selected>No Team</option>
            <option value = "Team names">Team names</option>
            </select>
            <br><br>
            <label for="title"><b>Visibility:</b></label>
            <select name = "dropdown">
                <option value = "Private" selected>Private</option>
                <option value = "Team">Team</option>
                <option value = "Public">Public</option>
            </select>
            <br><br>
            <br><br>
            <div class="canclebtn">
            <a href="board_link.php" type="button" class="btn cancel">Create</a>
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
                                        <li class="breadcrumb-item active" aria-current="page">Personal</li>
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
                                        <a href="Template_dashboard.php" class="btn btn-success ml-3">View Template</a>
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