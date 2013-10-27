<!DOCTYPE HTML>
<html lang="en" class="no_js">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Contact Us - Interngration</title>

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
<!-- Google Analytics-->

<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-41313797-1']);
  _gaq.push(['_setDomainName', 'interngration.com']);
  var pluginUrl =  '//www.google-analytics.com/plugins/ga/inpage_linkid.js';
  _gaq.push(['_require', 'inpage_linkid', pluginUrl]);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'stats.g.doubleclick.net/dc.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
</head>

<body>
<div id="wrapper">

    <!-- header -->
    <div class="fixposition">
    <div id="header-wrapper">
    <div id="header-content">
        <div id="logo"><a href="index.php"><img src="images/logo.png" alt="interngration" width="400" height="64" /></a></div>

    </div>
    </div>
    </div>
    <!-- end header -->     
    <div id="body-background"><!-- this is the main background color of the page -->
    <div id="header-buffer"></div><!-- hack for header overlap **DONT'TOUCH** -->
    
    <!-- page header -->
         <div id="pageheader-background"><!-- area with alternate background -->
            <div class="pageheader-title">
                <h1>Contact Us</h1>
                <span style="margin:0px 30px 0px 0px; float:right;">
            </div>        
        </div>      
                          
     <!-- body -->
    <div id="body-wrapper" class="container_16">

      <div class="grid_16">           

      <!-- Team Member 1 - Anirudh -->
                <div class="one-third">
                    <!-- post image and details -->                    
                    <div class="circular" style="background: url(../images/gm_cropped.jpg) no-repeat;"></div>
                    <!-- Team member description and text -->                                              
                    <div class="float-left">
                      <br/>
                      <h4>Anirudh Ganti</h4>
                      <p align="justify">The motivation to find Interngration came about when he was applying for his PEY placement and career fairs were often clashing with his timetable. With an idea, it wasn't long before he decided to plunge into the world of web programming and Interngration was founded. </p>
                      <p align="center" style="font-weight: bold; font-style: italic;"> Email: anirudh@interngration.com </p>
                    </div>
                </div> <!--End team member 1--> 

                  <!-- Team Member 2 - Hargun -->
                <div class="one-third">
                    <!-- post image and details -->                    
                    <div class="circular" style="background: url() no-repeat;"></div>
                    <!-- Team member description and text -->                                              
                    <div class="float-left">                           
                      <br/>
                      <h4>Hargun Suri</h4>
                      <p align="justify"> I am lazy and I need to update my information. :) </p>
                      <p align="center" style="font-weight: bold; font-style: italic;"> Email: hargun@interngration.com </p>
                    </div>
                </div> <!--End team member 2-->  

                  <!-- Team Member 3 - Ian Xiao-->
                <div class="one-third">
                    <!-- post image and details -->                    
                    <div class="circular" style="background: url(../images/ian_cropped.jpg) no-repeat;"></div>
                    <!-- Team member description and text -->                                              
                    <div class="float-left">                           
                      <br/>
                      <h4>Ian Xiao</h4>
                      <p align="justify">Ian is an aspiring social entrepreneur with deep interests in technology and business. He captures opportunities to improve people's lives and getting involved in Intergration is a part of this plan. Internships are unarguably of of the most important channels for students to explore their interests and are a stepping stone to accelerate their careers. Choosing the right internship is the key, but it's difficult to do so without getting some extra insight aside from attending crowded info sessions and listening vague responses from company representatives. This is why he decided to join the team at Interngration. </p>
                      <p align="center" style="font-weight: bold; font-style: italic;"> Email: ian@interngration.com </p>
                    </div>
                </div> <!--End team member 3-->            
            
    </div>

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
<script type="text/javascript" src="js/custom.js"></script>
</body>
</html>
