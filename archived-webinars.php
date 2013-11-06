<?php
session_start();

if(isset($_SESSION["uid"]))
{
    $username=$_SESSION["uname"];
    $mail_id=$_SESSION["mail_id"];
//header("location:inner.php");
}
else
{
header("location:student-login.php");
}


?>
<!DOCTYPE HTML>
<html lang="en" class="no_js">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Archived Webinars - Interngration</title>
<!-- Favicon -->
<link rel="shortcut icon" href="favicon.ico" />

<!-- Load Google Fonts -->
<link href='http://fonts.googleapis.com/css?family=Inder' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Ubuntu+Condensed' rel='stylesheet' type='text/css'>

<!-- Load Style Sheets -->
<link rel="stylesheet" type="text/css" href="css/style.css" media="screen" />
<link id="theme" rel="stylesheet" type="text/css" href="css/red.css" media="screen"/>

<!--[if IE 8]><link rel="stylesheet" href="css/ie.css" type="text/css" media="screen"/><![endif]-->
<!--[if IE 7]><link rel="stylesheet" href="css/ie.css" type="text/css" media="screen"/><![endif]-->

<!-- Load Jquery/Modernizr Javascript -->
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script type="text/javascript" src="js/modernizr.js"></script>

</head>
<body>
<div id="wrapper">


    <!-- header -->
    <div class="fixposition">
    <div id="header-wrapper">
    <div id="header-content">
        <div id="logo"><a href="student-homepage.php"><img src="images/logo.png" alt="interngration" width="400" height="64" /></a></div>
         <!-- header nav menu -->        
        <div id="menu" class="menu"> 
          <ul>
            <li><a href="student-homepage.php">Home</a></li>
            <li><a href="studentAccount.php"> My Account</a></li>
            <li><a href="logout.php" >Logout</a></li>
          </ul>
            <br style="clear: left" />
        </div>
        <!-- end header nav menu-->
    </div>
    </div>
    </div>
    <!-- end header -->     

    <div id="body-background"><!-- this is the main background color of the page -->
    <div id="header-buffer"></div><!-- hack for header overlap **DONT'TOUCH** -->
    
    <!-- page header -->
        <div id="pageheader-background"><!-- area with alternate background -->
            <div class="pageheader-title">
             <span class="mailno"><?php include "StudentUnreadMail.php"; ?></span>
                <h1>Archived Webinars</h1><span style="margin:0px 30px 0px 0px; float:right;"> 
                <a href="StudentRegisteredWebinar.php" class="button red"> My Webinars</a>   
                <a href="StudentWatchedWebinar.php" class="button red">Watched Webinars</a>
                <a href="archived-webinars.php" class="button red">Archived Webinars</a>             
                <a href="postedJob.php" class="button red">Job Board</a> 
                <a href="AppliedPostedJob.php" class="button red">My Jobs</a> 
                <a href="studentInbox.php" class="button red">My Inbox</a> 
                <a href="student-profile.php" class="button red">My Profile</a></span>
            </div>        
        </div>        
                          
     <!-- body -->
    <div id="body-wrapper" class="container_16">
    <div class="clear"></div>

    <!-- Archived Webinars section -->
    <div class="section">
            
        <!-- title -->
        <div class="grid_16 title">
          <h6>These are webinars that have finished. You can watch them here again</h6>        
        </div>                  
                          
        <div class="grid_4_orig recent-job">                    
            <div class="hover">
                <a href="https://attendee.gotowebinar.com/recording/2892042490073697538">
                <span class="link"></span>
                <img src="images/eventmobi.png" width="260" height="46" alt="" title=""/>
                </a> 
            </div>                                              
            <h5 class="grid_12"><a href = "https://attendee.gotowebinar.com/recording/2892042490073697538">EventMobi - Oct 29 2013</a></h5> 
            <p class="grid_12"><a href = "http://www.eventmobi.com/about/careers/">EventMobi</a> webinar presented by co-founder and CTO, Bijan Vaez.</p> </p> 
        </div>                   
    </div>
    <!-- end archived webinars section --> 
       
              
    <div class="clear"></div>            


    </div><!-- end body-wrapper -->
    </div><!-- end body-background -->

     <!-- footer -->
    <div id="footer-wrapper"></div><!-- end #footer-wrapper -->

    <div class="clear"></div>

    <!-- copyright -->
    <div id="copyright-wrapper">
        <div id="copyright-content">
            <p class="float-left">Copyright © 2013 <a href="">interngration</a> All rights reserved.</p> 
            <p class="float-right"></p>      
        </div>
    </div>

</div><!-- end #wrapper (global page wrapper) -->
</div>
<!-- Load Javascript -->
<script type="text/javascript" src="js/jquery.easing.1.3.js"></script>
<script type="text/javascript" src="js/ddsmoothmenu.js"></script>
<script type="text/javascript" src="js/slides.jquery.js"></script>
<script type="text/javascript" src="js/jquery.prettyPhoto.js"></script>
<script type="text/javascript" src="js/scrolltopcontrol.js"></script>
<script type="text/javascript" src="js/jquery.isotope.min.js"></script>
<script type="text/javascript" src="js/contact-form-validate.js"></script>  
<script type="text/javascript" src="js/jquery.coda-slider-2.0.js"></script> 
<script type="text/javascript" src="js/custom.js"></script>
  
</body>
</html>
