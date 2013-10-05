<?php session_start(); ?>
<!DOCTYPE HTML>
<html lang="en" class="no_js">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Interngration</title>

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
    	<div id="logo"><a href="index.php"><img src="images/logo.png" alt="interngration" width="400" height="80" /></a></div>
                
        <!-- header nav menu -->        
        <div id="menu" class="menu"> 
        <ul>
        <li><?php if($_GET['coinsessid']==""){ ?><a href="recruiter-login.php">Recruiter Login</a><?php }?></li>
        <li><a href="student-login.php">Student Login</a> </li>                    
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
    
            <!-- slider -->
            <div id="slides-wrapper">       
				<div id="slides"> 
                    <a href="#" class="prev"></a><!-- left arrow -->
                    <a href="#" class="next"></a><!-- right arrow -->
                    
				  <div class="slides_container">                            
				  <!-- slide 1 -->
                  <div class="slide"><a href="#" title="" target="_blank"><img src="images/slide1.png" alt="Slide 1"></a></div>  
				  <!-- slide 2 -->
                  </div><!-- end #slides_container --> 			
            	</div><!-- end #slides -->     
            </div><!-- end #slides-wrapper -->
           </div><!-- end #pageheader-background-->		
     
	 <!-- body -->
    <div id="body-wrapper" class="container_16">
    <div class="clear"></div>
                    <!-- title -->
        <div class="grid_16 title"><img src="images/icon1.png" width="20" height="20" alt=""/><h4>Title Comes Here</h4></div>        <div class="clear"></div>            

		 <!-- big quote -->
        <div class="big-quote white-text"><p class="font-opensans">Some text comes here, can replace with orginal text. Some text comes here, can replace with orginal text. Some text comes here, can replace with orginal text. Some text comes here, can replace with orginal text. Some text comes here, can replace with orginal text. Some text comes here, can replace with orginal text. Some text comes here, can replace with orginal text. Some text comes here, can replace with orginal text. Some text comes here, can replace with orginal text. Some text comes here, can replace with orginal text. Some text comes here, can replace with orginal text. Some text comes here, can replace with orginal text. Some text comes here, can replace with orginal text.</p></div>
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