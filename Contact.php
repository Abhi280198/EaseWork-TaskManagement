<!-- Start Database value Insertion-->
<?php include_once("DbConnection.php");
    
    if(isset($_REQUEST['btnsend']))
    { 
        $insert_query="insert into tblcontact values(null,'".$_REQUEST['name']."','".$_REQUEST['phone']."','".$_REQUEST['email']."','".$_REQUEST['subject']."','".$_REQUEST['comment']."')";
        $Execute_Q=mysqli_query($con,$insert_query) or die(mysqli_error($con));
        
        echo "<script type='text/javascript'>alert('Your Message send Successfully Done..');</script>";


    }
 ?>
<!-- End Database value Insertion-->

<!doctype html>
<html class="no-js" lang="en">
    
<!-- Mirrored from www.themezaa.com/html/pofo/contact-us-classic-02.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 30 May 2020 06:39:37 GMT -->
<head>
        <!-- title -->
        <title>EaseWork- ContactUs</title>
        <?php include_once("loadhead.php");?>

<script type="text/javascript">
    
    function validate(){

        var name = document.forms["myform"]["name"].value;
        var phone = document.forms["myform"]["phone"].value;
        var email = document.forms["myform"]["email"].value;
        var subject = document.forms["myform"]["subject"].value;
        var description = document.forms["myform"]["comment"].value;


        if(name == ""){
                document.getElementById('span_name').innerHTML =" ** Please fill the name";
                return false;
            }else{
                document.getElementById('span_name').innerHTML ="";
            }

        if(phone == ""){
                document.getElementById('span_phone').innerHTML =" ** Please fill the number";
                return false;
            }else{
                document.getElementById('span_phone').innerHTML ="";
            }

        if (phone.length!=10) {
                document.getElementById('span_phone').innerHTML =" ** Mobile number must be 10 digits only.";
                return false;
            }

        if (isNaN(phone)) {
                document.getElementById('span_phone').innerHTML =" ** Digits only not characters";
                return false;
            }

        if(email == ""){
                document.getElementById('span_email').innerHTML =" ** Please fill the email";
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

        if(subject == ""){
                document.getElementById('span_subject').innerHTML =" ** Please fill the Subject";
                return false;
            }else{
                document.getElementById('span_subject').innerHTML ="";
            }

        if(description == ""){
                document.getElementById('span_description').innerHTML =" ** Please fill the description";
                return false;
            }else{
                document.getElementById('span_description').innerHTML ="";
            }

            /*window.location.href = 'Contact.php'; */
            return true;
    }

</script>

</head>
<body>   
        <!-- start header -->
        <?php include_once("header.php");?>
        <!-- end header -->

        <!-- start page title section -->
        <section class="wow fadeIn parallax" data-stellar-background-ratio="0.5" style="background-image:url('assets1/images/homepage-9-parallax-img4.jpg');">
            <div class="opacity-medium bg-extra-dark-gray"></div>
            <div class="container">
                <div class="row">
                    <div class="col-12 extra-small-screen page-title-large d-flex flex-column justify-content-center text-center">
                        <!-- start page title -->
                        <h1 class="text-white-2 alt-font font-weight-600 letter-spacing-minus-1 margin-15px-bottom">Contact Us</h1>
                        <!-- end page title -->
                        <!-- start sub title -->
                        <span class="text-white-2 opacity6 alt-font">Feel Free to contact our team. We are always ready to help you.</span>
                        <!-- end sub title -->
                    </div>
                </div>
            </div>
        </section>
        <!-- end page title section -->

        <!-- start contact info -->
        <section class="wow fadeIn">
            <div class="container px-0">
                <div class="row justify-content-center">
                    <div class="col-12 col-lg-6 col-md-8 margin-eight-bottom md-margin-40px-bottom sm-margin-30px-bottom text-center last-paragraph-no-margin">
                        <h5 class="alt-font font-weight-700 text-extra-dark-gray text-uppercase mb-0">We love to talk</h5>
                    </div>  
                </div>
                <div class="row">
                    <!-- start contact info item -->
                    <div class="col-12 col-lg-3 col-md-6 text-center md-margin-eight-bottom sm-margin-30px-bottom wow fadeInUp last-paragraph-no-margin">
                        <div class="d-inline-block margin-20px-bottom">
                            <div class="bg-extra-dark-gray icon-round-medium"><i class="icon-map-pin icon-medium text-white-2"></i></div>
                        </div>
                        <div class="text-extra-dark-gray text-uppercase text-small font-weight-600 alt-font margin-5px-bottom">Visit Our Office</div>
                        <p class="mx-auto">MIT-WPU, Paud Road,<br> Kothrud, Pune,<br> Maharashtra-411038</p>
                    </div>
                    <!-- end contact info item -->

                    <!-- start contact info item -->
                    <div class="col-12 col-lg-3 col-md-6 text-center md-margin-eight-bottom sm-margin-30px-bottom wow fadeInUp last-paragraph-no-margin" data-wow-delay="0.2s">
                        <div class="d-inline-block margin-20px-bottom">
                            <div class="bg-extra-dark-gray icon-round-medium"><i class="icon-chat icon-medium text-white-2"></i></div>
                        </div>
                        <div class="text-extra-dark-gray text-uppercase text-small font-weight-600 alt-font margin-5px-bottom">Let's Talk</div>
                        <p class="mx-auto">Phone: +91-7564123411, <br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;+91-9000876372 <br>Fax: +91-7564123411 </p>
                    </div>
                    <!-- end contact info item -->

                    <!-- start contact info item -->
                    <div class="col-12 col-lg-3 col-md-6 text-center sm-margin-30px-bottom wow fadeInUp last-paragraph-no-margin" data-wow-delay="0.4s">
                        <div class="d-inline-block margin-20px-bottom">
                            <div class="bg-extra-dark-gray icon-round-medium"><i class="icon-envelope icon-medium text-white-2"></i></div>
                        </div>
                        <div class="text-extra-dark-gray text-uppercase text-small font-weight-600 alt-font margin-5px-bottom">E-mail Us</div>
                        <p class="mx-auto"><a href="mailto:info@yourdomain.com"><br>www.Easework@gmail.com</a>
                    </div>
                    <!-- end contact info item -->

                    <!-- start contact info item -->
                    <div class="col-12 col-lg-3 col-md-6 text-center wow fadeInUp last-paragraph-no-margin" data-wow-delay="0.6s">
                        <div class="d-inline-block margin-20px-bottom">
                            <div class="bg-extra-dark-gray icon-round-medium"><i class="icon-megaphone icon-medium text-white-2"></i></div>
                        </div>
                        <div class="text-extra-dark-gray text-uppercase text-small font-weight-600 alt-font margin-5px-bottom">Customer Services</div>
                        <p class="mx-auto"><br>www.Easework@gmail.com</p>
                    </div>
                    <!-- end contact info item -->

                </div>
            </div>
        </section>
        <!-- end contact info section -->

        <!-- start contact form -->
        <section id="contact" class="wow fadeIn p-0 bg-extra-dark-gray">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 col-lg-6 cover-background md-height-450px sm-height-350px wow fadeIn" style="background: url('assets1/images/about-me-4.jpg');"></div>
                    <div class="col-12 col-lg-6 text-center padding-six-lr padding-five-half-tb md-padding-ten-half-tb md-padding-twelve-half-lr sm-padding-15px-lr wow fadeIn">
                        <div class="text-medium-gray alt-font text-small text-uppercase margin-5px-bottom sm-margin-three-bottom">Fill out the form and we'll be in touch soon!</div>
                        <h5 class="margin-55px-bottom text-white-2 alt-font font-weight-700 text-uppercase sm-margin-ten-bottom">Do u have any Query?</h5>

                        <form method="post" name="myform" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-12">
                                    <div id="success-project-contact-form" class="mx-0"></div>
                                </div>

                                <div class="col-12 col-lg-6">
                                    <input type="text" name="name"  placeholder="Name *" class="bg-transparent border-color-medium-dark-gray medium-input">
                                    <span id="span_name" style="color: red"></span>
                                </div>

                                <div class="col-12 col-lg-6">
                                    <input type="text" name="phone" placeholder="Phone *" class="bg-transparent border-color-medium-dark-gray medium-input">
                                    <span id="span_phone" style="color: red"></span>
                                </div>

                                <div class="col-12 col-lg-6">
                                    <input type="text" name="email" placeholder="E-mail *" class="bg-transparent border-color-medium-dark-gray medium-input">
                                    <span id="span_email" style="color: red"></span>
                                </div>

                                <div class="col-12 col-lg-6">
                                    <input type="text" name="subject"  placeholder="Subject *" class="bg-transparent border-color-medium-dark-gray medium-input">
                                    <span id="span_subject" style="color: red"></span>
                                </div>

                                <div class="col-12">
                                    <textarea name="comment" placeholder="Description...." rows="7" class="bg-transparent border-color-medium-dark-gray medium-textarea"></textarea>
                                    <span id="span_description" style="color: red"></span>
                                </div>

                                <div class="col-12 text-center">
                                    <button type="submit" name="btnsend" onclick=" return validate();" class="btn btn-deep-pink btn-medium margin-15px-top">send message</button>
                                </div>
                            </div>
                        </form>
                        
                    </div>
                </div>
            </div>
        </section>
        <!-- end contact form -->

        <!-- start social section -->
        <p class="wow fadeIn">
               <br>   <br>   <br>
        </p>
        <!-- end social section -->

        <!-- start footer --> 
        <?php include_once("footer.php");?>
        <!-- end footer -->

        <!-- javascript libraries -->ss
        <?php include_once("loadJs.php");?>

    </body>
</html>