 <!-- start footer --> 
        <footer class="footer-classic-dark bg-extra-dark-gray padding-five-bottom sm-padding-30px-bottom">

            <div class="bg-dark-footer padding-50px-tb sm-padding-30px-tb">

                <div class="container">
                    <div class="row align-items-center">

                        <!-- start slogan -->
                        <div class="col-lg-4 col-md-5 text-center alt-font sm-margin-15px-bottom">
                            Best Project Management Tool
                        </div>
                        <!-- end slogan -->

                        <!-- start logo -->
                        <div class="col-lg-4 col-md-2 text-center sm-margin-10px-bottom">
                            <a href="Index.php"><img class="footer-logo" src="assets1/images/logo-white.png" data-rjs="assets1/images/logo-white@2x.png" alt="EaseWork"></a>
                        </div>
                        <!-- end logo -->

                        <!-- start social media -->
                        <div class="col-lg-4 col-md-5 text-center">
                            <span class="alt-font margin-20px-right">On social networks</span>
                            <div class="social-icon-style-8 d-inline-block vertical-align-middle">
                                <ul class="small-icon mb-0">
                                    <li><a class="facebook text-white-2" href="https://www.facebook.com/" target="_blank"><i class="fab fa-facebook-f" aria-hidden="true"></i></a></li>
                                    <li><a class="twitter text-white-2" href="https://twitter.com/" target="_blank"><i class="fab fa-twitter"></i></a></li>
                                    <li><a class="google text-white-2" href="https://plus.google.com/" target="_blank"><i class="fab fa-google-plus-g"></i></a></li>
                                    <li><a class="instagram text-white-2" href="https://instagram.com/" target="_blank"><i class="fab fa-instagram no-margin-right" aria-hidden="true"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <!-- end social media -->

                    </div>
                </div>
            </div>
            <div class="footer-widget-area padding-five-top padding-30px-bottom sm-padding-30px-top">
                <div class="container">
                    <div class="row">

                        <!-- start about -->
                        <div class="col-lg-3 col-md-6 widget md-margin-30px-bottom text-center text-md-left last-paragraph-no-margin">
                            <div class="widget-title alt-font text-small text-medium-gray text-uppercase margin-15px-bottom font-weight-600">Start Planning Today</div>
                            <p class="text-small width-95 sm-width-100">
                                Sign up and become one of the millions of people around the world using Trello to get more done.
                                <br><br>
                                <a href="login.php">Login</a>
                                <br><br>
                                <a href="register.php">SignUp</a> </p>
                        </div>
                        <!-- end about -->

                        <!-- start blog post -->
                        <div class="col-lg-3 col-md-6 widget md-margin-30px-bottom">
                            <div class="widget-title alt-font text-small text-medium-gray text-uppercase margin-15px-bottom font-weight-600 text-center text-md-left">Contact Us: </div>
                            <ul class="latest-post position-relative">
                                <li class="media border-bottom border-color-medium-dark-gray">
                                    <div class="media-body text-small">
                                        <a href="#" class="d-block mb-1">Near MIT-WPU, Paud Road, Kothrud, Pune, Maharashtra-411038</a> 
                                    </div>
                                </li>
                                <li class="media border-bottom border-color-medium-dark-gray">
                                    <div class="media-body text-small">
                                        <a href="#" class="d-block mb-1">www.Easework@gmail.com</a> 
                                    </div>
                                </li>
                                <li class="media">
                                    <div class="media-body text-small">
                                        <a href="#" class="d-block mb-1">7564123411,  9000876372  </a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <!-- end blog post -->

                        <!-- start newsletter -->
                        <div class="col-lg-3 col-md-6 widget md-margin-30px-bottom text-center text-md-left">
                            <div class="widget-title alt-font text-small text-medium-gray text-uppercase margin-15px-bottom font-weight-600">Subscribe Newsletter</div>
                            <p class="text-small width-90 sm-width-100">To Get Daily Updates to our inbox. Subscribe to our NewsLetter.</p>
                            <form id="subscribenewsletterform" action="javascript:void(0)" method="post">
                                <div class="position-relative newsletter width-95">
                                    <div id="success-subscribe-newsletter" class="mx-0"></div>
                                    <input type="text" id="email" name="email" class="bg-transparent text-small m-0 border-color-medium-dark-gray" placeholder="Enter your email...">
                                    <button id="button-subscribe-newsletter" type="submit" class="btn btn-arrow-small position-absolute border-color-medium-dark-gray"><i class="fas fa-caret-right no-margin-left"></i></button>
                                </div>   
                            </form>
                        </div> 
                        <!-- end newsletter -->

                    <?php
                        if(isset($_SESSION['UserID']))
                        {
                    ?>

                        <!-- start links -->
                        <div class="col-lg-3 col-md-6 widget md-margin-5px-bottom text-center text-md-left">
                            <div class="widget-title alt-font text-small text-medium-gray text-uppercase margin-20px-bottom font-weight-600">Useful Links:
                            </div>
                            <p class="text-small width-90 sm-width-100">
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <a href="index_home.php?Uid=<?php echo $_SESSION['UserID']; ?>">Home</a>
                                <br><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <a href="TemplateIntro.php?Uid=<?php echo $_SESSION['UserID']; ?>">Templates</a>
                                <br><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <a href="About.php?Uid=<?php echo $_SESSION['UserID']; ?>">About Us</a>
                                <br><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <a href="Contact.php?Uid=<?php echo $_SESSION['UserID']; ?>">Contact Us</a>
                            </p>  
                        </div>
                        <!-- end links -->
                    <?php
                        }
                        else
                        {
                    ?>

                        <!-- start links -->
                        <div class="col-lg-3 col-md-6 widget md-margin-5px-bottom text-center text-md-left">
                            <div class="widget-title alt-font text-small text-medium-gray text-uppercase margin-20px-bottom font-weight-600">Useful Links:
                            </div>
                            <p class="text-small width-90 sm-width-100">
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <a href="index_home.php">Home</a>
                                <br><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <a href="TemplateIntro.php">Templates</a>
                                <br><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <a href="About.php">About Us</a>
                                <br><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <a href="Contact.php">Contact Us</a>
                            </p>  
                        </div>
                        <!-- end links -->

                    <?php
                        }
                    ?>

                    </div>
                </div>
            </div>
            <div class="container">
                <div class="footer-bottom border-top border-color-medium-dark-gray padding-30px-top">
                    <div class="row">
                        <!-- start copyright -->
                        <div class="col-lg-6 col-md-6 text-small text-md-left text-center">POFO - Ease of Work</div>
                        <div class="col-lg-6 col-md-6 text-small text-md-right text-center">&COPY; 2020 POFO is Proudly Powered by our <a href="#" target="_blank" title="ThemeZaa">Team</a></div>
                        <!-- end copyright -->
                    </div>
                </div>
            </div>
        </footer>
        <!-- end footer -->