<?php

  session_start();

  if(isset($_SESSION["uid"])) {
    $username=$_SESSION["uname"];
    $mail_id=$_SESSION["mail_id"];
    $s_uid=$_SESSION["uid"];
  }
  
  else {
    header("location:student-login.php");
  }

?>


<!DOCTYPE HTML>
<html lang="en" class="no_js">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <?php
      $session=$_SESSION["s_id"];
      include "config.php"; 	
      $ses_result=mysql_select_db($dbname) or die(mysql_error());
      $sqlget="Select *  from student_register where session_id='$session'";
      $ses_result=mysql_query($sqlget);
      $rowcount= mysql_num_rows($ses_result);	

      if ($rowcount>0) {
        $res=mysql_fetch_array($ses_result);
        $FirstName = $res["FirstName"];
        $LastName = $res["LastName"];
      }
    ?>
    
    <title> Display All Profiles</title>
    <!-- Favicon -->
    <link rel="shortcut icon" href="favicon.ico" />

    <!-- Load Google Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Inder' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Ubuntu+Condensed' rel='stylesheet' type='text/css'>

    <!-- Load Style Sheets -->
    <link rel="stylesheet" type="text/css" href="css/style.css" media="screen" />
    <link id="theme" rel="stylesheet" type="text/css" href="css/red.css" media="screen"/>
    <link rel="stylesheet" type="text/css" href="css/upload.css"/>

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
                <!-- <li><a href="">Welcome&nbsp; :&nbsp; <?php print $username; ?></a></li> -->
                <li><a href="student-homepage.php">Home</a></li>
                <li><a href="studentAccount.php"> My Account</a></li>
                <li><a href="logout.php" >Logout</a></li></ul>
              </ul>
              <br style="clear: left" />
            </div>
            <!-- end header nav menu--> 
          </div>
        </div>
      </div>
      <!-- end header -->

      <div id="body-background"><!-- this is the main background color of the page -->
        <div id="header-buffer"></div>
        <!-- hack for header overlap **DONT'TOUCH** --> 

        <!-- page header -->
        <div id="pageheader-background"><!-- area with alternate background -->
          <div class="pageheader-title">
          <span class="mailno"><?php include "StudentUnreadMail.php"; ?></span>
            <h1>Student Profile</h1>
            <span style="margin:0px 30px 0px 0px; float:right;">
              <a href="StudentRegisteredWebinar.php" class="button red">Upoming Webinars</a>
              <a href="StudentWatchedWebinar.php" class="button red">Watched Webinar</a>    
              <a href="studentJobApplication.php" class="button red">Job Application</a> 
              <a href="AppliedPostedJob.php" class="button red">Applied Job</a> 
              <a href="studentInbox.php" class="button red">Inbox</a>
              <a href="student-profile.php" class="button red">Profile</a></span> 
             </div>
        </div>
        Profiles will be shown here !z
        <!-- body -->
        <!-- copyright -->
        <div id="copyright-wrapper">
          <div id="copyright-content">
            <p class="float-left">Copyright © 2013 <a href="">interngration</a> All rights reserved.</p>
            <p class="float-right"></p>
          </div>
        </div>
      </div>
      <!-- end #wrapper (global page wrapper) --> 
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
    <script type="text/javascript" src="js/twitter.js"></script>
  </body>
</html>
