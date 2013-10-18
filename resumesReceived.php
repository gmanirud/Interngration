<?php
session_start();

if(isset($_SESSION["ruid"]))
{
	$username=$_SESSION["uname"];
	$ruid=$_SESSION["ruid"];
	$mail_id=$_SESSION["mail_id"];
//header("location:inner.php");
}
else
{
header("location:recruiter-login.php");
}
?>
<!DOCTYPE HTML>
<html lang="en" class="no_js">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Resumes Received</title>
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
        <div id="logo"><a href="recruiter-home-page.php"><img src="images/logo.png" alt="interngration" width="400" height="64" /></a></div>
         <!-- header nav menu -->        
        <div id="menu" class="menu"> 
               <ul>
                <li><a href="">Welcome&nbsp; :&nbsp; <?php print $username; ?></a></li>
               <li><a href="recruiter-home-page.php">Home</a></li></ul>
                <br style="clear: left" />
        </div>
        <!-- end header nav menu-->
</div></div></div>
    <!-- end header -->     
    
    <div id="body-background"><!-- this is the main background color of the page -->
    <div id="header-buffer"></div><!-- hack for header overlap **DONT'TOUCH** -->
    
    
        <!-- page header -->
        <div id="pageheader-background"><!-- area with alternate background -->
            <div class="pageheader-title">
              <span class="mailno"><?php include "RecruiterUnreadMail.php"; ?></span>
                <h1>Resumes Received</h1>
                <span style="margin:0px 30px 10px 0px; float:right;">
                <a href="https://login.citrixonline.com/login?service=https%3A%2F%2Fglobal.gotomeeting.com%2Fmeeting%2Fj_spring_cas_security_check" target="_blank" class="button red">Schedule your Webinar</a>
                <a href="RecruiterUpcomingWebinar.php" class="button red">Scheduled Webinar</a>
                <a href="RecruiterWatchedWebinar.php" class="button red">Past Webinar</a>
                <a href="recruiterInbox.php" class="button red">Inbox</a>
                <a href="jobPosting.php" class="button red">Job Posting</a>
                <a href="recruiterAccount.php" class="button red">Account</a>
                <a href="logout.php" class="button red">Logout</a>
                </span>
            </div>        
        </div>        
            
                   
    <!-- body -->
    <div id="body-wrapper" class="container_16">
    <div class="clear"></div>


		<!-- grid columns -->
		<div class="section">
           
       		<!-- title -->
          <div class="title"><h4></h4></div>                  

            <!-- 8/16 -->
           
		   
			
			 <div class="grid_17">
            	
                <table width="600" border="1" height="160" style="margin:20px; border:1px solid #666666; padding:10px; margin-left:140px;">
  <tr>
    <th scope="col">Job Name</th>
    <th scope="col">Number Of Resumes</th>
    <th scope="col">Resumes</th>
  </tr>
  <?php

		$uid=$_SESSION['ruid'];
		
		include "config.php"; 	
		$ses_result=mysql_select_db($dbname) or die(mysql_error());
					
		$sqlget="Select *  from recruiter_jopposting where recruiter_id='$uid'";
		//print $sqlget;
		$ses_result=mysql_query($sqlget);
		$rowcount= mysql_num_rows($ses_result);	
					
		if($rowcount=="0")
		{
			?>
		  <tr> <td align="center" colspan="3">  No Records Found	</td></tr>
          <?php
		}
		else
		{
			while($res=mysql_fetch_array($ses_result))
			{
			
			$Job_title=$res["Job_title"];
			$Job_id=$res["id"];
			$sqlget1="Select *  from student_jobapplication where JobId='$Job_id'";
			//print $sqlget1;
			$ses_result1=mysql_query($sqlget1);
    		$noOfApplier= mysql_num_rows($ses_result1);	
				
?>
  <tr>
    <td><?php print $Job_title; ?></td>
    <td><?php print $noOfApplier; ?></td>
     <td><?php if($noOfApplier!='0') { ?><a href="resumeFilter.php?jobid=<?php print $Job_id; ?>">See All</a><?php } ?></td>
  </tr>
  <?php
  }
		}
  ?>
</table></div>
			
<!-- end grid columns -->

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
<script type="text/javascript" src="js/twitter.js"></script>
  
</body>
</html>