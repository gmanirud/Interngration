<?php session_start(); ?>
<!DOCTYPE HTML>
<html lang="en" class="no_js">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Interngration - Multimedia platform to connect startups with students</title>

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


<?php
if(isset($_GET['coinsessid']))
{	
    $_SESSION['coinreferalid']=$_GET['coinsessid'];
}

?>

<!-- Load Jquery/Modernizr Javascript -->
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script type="text/javascript" src="js/modernizr.js"></script>
<script type="text/javascript">
if (top.location!= self.location) {
			top.location = self.location
		}
		</script>
</head>
<body>
<div id="wrapper">
<!-- header -->
    <div class="fixposition">
	<div id="header-wrapper">
	<div id="header-content">
    	<div id="logo"><a href="index.php"><img src="images/logo.png" alt="interngration" width="400" height="64" /></a></div>
                
        <!-- header nav menu -->        
        <div id="menu" class="menu"> 
        <ul>
        <li><?php if($_GET['coinsessid']==""){ ?><a href="recruiter-login.php">Recruiter Register/Login</a><?php }?></li>
        <li><a href="student-login.php">Student Register/Login</a> </li>                    
        </ul>
        <br style="clear: left" />
		</div>
        <!-- end header nav menu-->

</div></div></div>
	<!-- end header -->    
    
  	<div id="body-background"><!-- this is the main background color of the page -->
    <div id="header-buffer"></div><!-- hack for header overlap **DONT'TOUCH** -->
        
        <!-- page header -->
        <div id="pageheader-background"><!-- area with alternate background -->
     		 <center>
			 	<iframe src="//player.vimeo.com/video/76490050" width="800" height="491" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe></center>
            <!-- slider -->
      
           </div><!-- end #pageheader-background-->		
     
	 <!-- body -->
    <div id="body-wrapper" class="container_16">
    
        <!-- title -->
    <div class="grid_16 center-text"><h2>Why Join Interngration?</h2> <div class="clear"></div>            

		 <!-- Why join Interngration -->
        <div class ="grid_8_orig light-type grey" style = "float:left; text-align: justify;">
        <img src="images/student.png" alt ="recruiter picture" class = "center">
        <h4 class ="center-text">Students</h4>
             <p>Our webinars allows you to understand stories of the uprising startups and apply 
            for jobs that can shape the companies' futures. Our recruiting platform provides a hassle free environment 
            for both you to avoid the trouble brought by traditional career fairs and tedious job 
            application process. You can now connect with potential employers from great companies, virtually - <strong>all for free</strong></p>
        
        </div>

        <div class ="grid_8_orig light-type grey" style = "float:right; text-align: justify;" >
        <img src="images/recruiter.png" alt ="recruiter picture" class = "center">
        <h4 class ="center-text">Recruiters</h4>
        <p> You can now reach out to pools of talented students, right from your office. You don't have to dedicate a whole day
             to travel and setup a booth at a career fair. Moreover, geographic location is now a non-issue. Your company's located in Vancouver?
             No worries, reach out to students in Toronto through a webinar! You also don't have to pay the exorbitant prices of registering for a 
             campus event or career fair.</p> 

             <p> <strong>Interngration will be free for use in the alpha version.</strong>  </p>
        </div> 
    </div>

        <!-- end big quote -->
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
