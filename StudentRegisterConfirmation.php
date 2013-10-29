<?php
session_start();

if(isset($_SESSION["uid"]))
{
	$username=$_SESSION["uname"];
	$uid=$_SESSION["uid"];
	$mail_id=$_SESSION["mail_id"];
//header("location:inner.php");
}
else
{
header("location:student-login.php");
}
include "citrix.php";
?>
<!DOCTYPE HTML>
<html lang="en" class="no_js">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Student Account</title>
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



<!--  Validate Engine  -->

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
               <li><a href="studentAccount.php">My Account</a></li>
               <li><a href="logout.php">Logout</a></li>
               </ul> 
                <br style="clear: left" />
        </div>
        <!-- end header nav menu-->
 </div> </div> </div>
    <!-- end header -->     
    <div id="body-background"><!-- this is the main background color of the page -->
    <div id="header-buffer"></div><!-- hack for header overlap **DONT'TOUCH** -->
    
      <!-- page header -->
        <div id="pageheader-background"><!-- area with alternate background -->
            <div class="pageheader-title">
            <span class="mailno"><?php include "StudentUnreadMail.php"; ?></span>
                <h1>Webinar Register Confirmation</h1><span style="margin:0px 30px 0px 0px; float:right;">
                <a href="student-homepage.php" class="button red">Upcoming Webinars</a>
                <a href="StudentRegisteredWebinar.php" class="button red"> My Webinars</a>
                <a href="StudentWatchedWebinar.php" class="button red">Watched Webinar</a>  
                <a href="studentJobApplication.php" class="button red">Job Application</a> 
                <a href="AppliedPostedJob.php" class="button red">Applied Job</a> 
                <a href="studentInbox.php" class="button red">Inbox</a>
                <a href="student-profile.php" class="button red">Profile</a> 
            </span>
            </div>        
        </div>
        
    
        
                          
    <!-- body -->
    <div id="body-wrapper" class="container_16">
    <div class="clear"></div>
	
		<!-- grid columns -->
		<div class="section">
           
       		<!-- title -->
            <div class="title grid_16"></div>                    
			<!-- one half-->
            
            <!--  Normal Page -->
            <div class="grid_16" id="normalpage1"></div>
            <div class="grid_16" id="normalpage">
               
               <h4>Register Confirmation</h4>
                  <br/>
               
                
                     <?php 
					 
					 if(isset($_POST['regid']))
					 {
						
						 $wbid=$_POST['regid'];
						 $subj=$_POST['subj'];
						 $desc=$_POST['desc'];
						 $sttime=$_POST['sttime'];
						 $entime=$_POST['entime'];
						 $_SESSION["regid"] = $_POST['regid'];
						 
						$ses_result=mysql_select_db($dbname) or die(mysql_error());									
						$sqlget="Select *  from student_web_reg where student_id='$uid' and webinar_id='$wbid'";						
						$ses_result=mysql_query($sqlget);
						$rowcount= mysql_num_rows($ses_result);
						
						if($rowcount!='0')
						{
							?>
                             <table border="0" width="100%">
                            <tr>
                            <td>&nbsp;
                            
                            </td>
                            </tr>
                            <tr align="center">
                            <td style="color:#F00; font-size:14px;">
                           You Already Registered this webinar
                            </td>
                            </tr>
                            </table>
                            <?php
							
						}	
						else
						{						 		 
						$citrix = new Citrix('2a3328f6717227aa1262eb368d013a47');
						//$organizer_key = $citrix->get_organizer_key();
						$organizer_key="384723869081067013";
						//print "Wbinar".$citrix->pr($citrix->citrixonline_get_list_of_webinars());
						//$citrix->pr($organizer_key);
						
						if(!$organizer_key)
						{
							//$url = $citrix->auth_citrixonline();
							/* echo "<script type='text/javascript'>top.location.href = '$url';</script>";
							exit;  */
						}

						 $regdetail=$citrix->citrixonline_create_registrant_of_webinar();
						 $regkey=$regdetail["registrantKey"];
						 $joinurl=$regdetail["joinUrl"];
						 $sqlInsert = "insert into student_web_reg (student_id,registration_id,webinar_id,Joinurl,subject,description,starttime,endtime,reg_date) values ('$uid','$regkey','$wbid','$joinurl','$subj','$desc','$sttime','$entime',NOW())";
						 $result=mysql_db_query($dbname,$sqlInsert,$link);						
					 
					  ?>
                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#FF0000" style="font-size:14px">Your webinar has been register successfully.<br/><br/>
                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Registration Id : <?php print $regkey; ?>.
                      &nbsp;&nbsp;<a href="<?php print $joinurl; ?>" target="_blank" title="click here">"<u>Click here</u>" </a>  to see the Webinar video page.
                      </font>
                      <?php
					  //print "Wbinar".$citrix->pr($citrix->citrixonline_get_list_of_webinars());
					  }
					 }
					  ?>
   
            </div>
                        <!--  Normal Page -->

     
            <!-- end one-half -->                
        </div><!-- end grid columns -->
  
    <div class="clear"></div>
		<!-- tabs -->
		<div class="section"></div><!-- end body-wrapper -->
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
