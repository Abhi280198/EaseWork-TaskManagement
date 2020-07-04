<!DOCTYPE html>
<html lang="en" dir="ltr">


<!-- Mirrored from demo.frontted.com/stackadmin/133/app-fullcalendar.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 28 May 2020 07:53:35 GMT -->
<head>
    
    <title>Calendar</title>

    <?php include_once('csslinks.php');?>



    <!-- FullCalendar -->
    <link type="text/css" href="assets/vendor/fullcalendar/fullcalendar.min.css" rel="stylesheet">


</head>

<body class="layout-default">


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



                    <div class="container-fluid page__heading-container">
                        <div class="page__heading d-flex align-items-center">
                            <div class="flex">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb mb-0">
                                        <li class="breadcrumb-item"><a href="#"><i class="material-icons icon-20pt">home</i></a></li>
                                        <li class="breadcrumb-item">Boards</li>
                                        <li class="breadcrumb-item active" aria-current="page">Event Calendar</li>
                                    </ol>
                                </nav>
                                <h1 class="m-0">Event Calendar</h1>
                            </div>
                            <a href="#" data-toggle="modal" data-target="#add-category" class="btn btn-success ml-3">New Event</a>
                        </div>
                    </div>




                    <div class="container-fluid page__container">
                        <div class="row">
                            <div class="col-lg-9">
                                <div class="card card-body">
                                    <div id="calendar" data-toggle="fullcalendar"></div>
                                </div>
                            </div> <!-- end col -->

                            <div class="col-lg-3">
                                <div id="external-events">
                                    <p class="text-muted">Drag and drop your event or click in the calendar.</p>
                                    <div class="external-event bg-success" data-class="bg-success">
                                        <i class="mr-2 material-icons">drag_handle</i>
                                        <span class="external-event__title">New Theme Release</span>
                                    </div>
                                    <div class="external-event bg-info" data-class="bg-info">
                                        <i class="mr-2 material-icons">drag_handle</i>
                                        <span class="external-event__title">My Event</span>
                                    </div>
                                    <div class="external-event bg-warning" data-class="bg-warning">
                                        <i class="mr-2 material-icons">drag_handle</i>
                                        <span class="external-event__title">Meet manager</span>
                                    </div>
                                    <div class="external-event bg-danger" data-class="bg-danger">
                                        <i class="mr-2 material-icons">drag_handle</i>
                                        <span class="external-event__title">Create New theme</span>
                                    </div>
                                </div>

                                <!-- checkbox -->
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="drop-remove">
                                    <label class="custom-control-label" for="drop-remove">Remove after drop</label>
                                </div>
                            </div> <!-- end col-->
                        </div> <!-- end row -->
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

    <!-- App Settings FAB -->
    <div id="app-settings">
        <app-settings layout-active="default" :layout-location="{
      'default': 'app-fullcalendar.html',
      'fixed': 'fixed-app-fullcalendar.html',
      'fluid': 'fluid-app-fullcalendar.html',
      'mini': 'mini-app-fullcalendar.html'
    }"></app-settings>
    </div>

    <!-- jQuery -->
    <script src="assets/vendor/jquery.min.js"></script>

    <!-- Bootstrap -->
    <script src="assets/vendor/popper.min.js"></script>
    <script src="assets/vendor/bootstrap.min.js"></script>

    <!-- Simplebar -->
    <script src="assets/vendor/simplebar.min.js"></script>

    <!-- DOM Factory -->
    <script src="assets/vendor/dom-factory.js"></script>

    <!-- MDK -->
    <script src="assets/vendor/material-design-kit.js"></script>

    <!-- App -->
    <script src="assets/js/toggle-check-all.js"></script>
    <script src="assets/js/check-selected-row.js"></script>
    <script src="assets/js/dropdown.js"></script>
    <script src="assets/js/sidebar-mini.js"></script>
    <script src="assets/js/app.js"></script>

    <!-- App Settings (safe to remove) -->
    <script src="assets/js/app-settings.js"></script>



    <!-- Add New Event MODAL -->
    <div class="modal fade" id="event-modal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header pr-4 pl-4 border-bottom-0 d-block">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Add New Event</h4>
                </div>
                <div class="modal-body pt-3 pr-4 pl-4">
                </div>
                <div class="text-right pb-4 pr-4">
                    <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-success save-event">Create event</button>
                    <button type="button" class="btn btn-danger delete-event" data-dismiss="modal">Delete</button>
                </div>
            </div> <!-- end modal-content-->
        </div> <!-- end modal dialog-->
    </div>
    <!-- end modal-->

    <!-- Modal Add Category -->
    <div class="modal fade" id="add-category" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header border-bottom-0 d-block">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Add a category</h4>
                </div>
                <div class="modal-body p-4">
                    <form>
                        <div class="form-group">
                            <label class="control-label">Category Name</label>
                            <input class="form-control form-white" placeholder="Enter name" type="text" name="category-name" />
                        </div>
                        <div class="form-group">
                            <label class="control-label">Choose Category Color</label>
                            <select class="form-control form-white" data-placeholder="Choose a color..." name="category-color">
                                <option value="primary">Primary</option>
                                <option value="success">Success</option>
                                <option value="danger">Danger</option>
                                <option value="info">Info</option>
                                <option value="warning">Warning</option>
                                <option value="dark">Dark</option>
                            </select>
                        </div>

                    </form>

                    <div class="text-right">
                        <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary ml-1 save-category" data-dismiss="modal">Save</button>
                    </div>

                </div> <!-- end modal-body-->
            </div> <!-- end modal-content-->
        </div> <!-- end modal dialog-->
    </div>
    <!-- end modal-->

    <!-- jQuery UI (for draggable) -->
    <script src="assets/vendor/jquery-ui.min.js"></script>

    <!-- Moment.js -->
    <script src="assets/vendor/moment.min.js"></script>

    <!-- FullCalendar -->
    <script src="assets/vendor/fullcalendar/fullcalendar.min.js"></script>
    <script src="assets/js/fullcalendar.js"></script>

</body>


<!-- Mirrored from demo.frontted.com/stackadmin/133/app-fullcalendar.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 28 May 2020 07:53:39 GMT -->
</html>