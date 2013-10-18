<?php
session_start();

if(isset($_SESSION["ruid"]))
{
	$username=$_SESSION["uname"];
	$uid=$_SESSION["ruid"];
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
<title>Registrant details</title>
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

<?php

		include "config.php"; 	
		$ses_result=mysql_select_db($dbname) or die(mysql_error());
					
		$sqlget="Select *  from recruiter_register where id='$uid'";
		
		$ses_result=mysql_query($sqlget);
		$rowcount= mysql_num_rows($ses_result);	
		
	
		if ($rowcount>0)
		{
			$res=mysql_fetch_array($ses_result);
			
			$FirstName=$res["FirstName"];
			$LastName=$res["LastName"];
			$Company=$res["Company"];
			$Address=$res["Address"];
			$Email=$res["Email"];
			$UserName=$res["UserName"];
			
		}
	

			
?>


<!--  Citrix Authendication -->
<?php
include "citrix.php";

$citrix = new Citrix('2a3328f6717227aa1262eb368d013a47');
$organizer_key = $citrix->get_organizer_key();
//$organizer_key="1866916119511197701";
//$citrix->pr($organizer_key);

if(!$organizer_key)
{
	$url = $citrix->auth_citrixonline();
	echo "<script type='text/javascript'>top.location.href = '$url';</script>";
	exit;
}
?>

<!-- Citrix Acuthendication -->



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
                <li><a href="recruiterAccount.php">Welcome&nbsp; :&nbsp; <?php print $username; ?></a></li>
               <li><a href="recruiter-home-page.php">Home</a></li></ul>
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
             <span class="mailno"><?php include "RecruiterUnreadMail.php"; ?></span>
                <h1>Registrant Details</h1><span style="margin:0px 30px 10px 0px; float:right;">
                 <a href="https://login.citrixonline.com/login?service=https%3A%2F%2Fglobal.gotomeeting.com%2Fmeeting%2Fj_spring_cas_security_check" target="_blank" class="button red">Schedule your Webinar</a>
                <a href="RecruiterUpcomingWebinar.php" class="button red">Scheduled Webinar</a>
                 <a href="recruiterInbox.php" class="button red">Inbox</a>
                <a href="jobPosting.php" class="button red">Job Posting</a>
                <a href="recruiterAccount.php" class="button red">Account</a>
                <a href="logout.php" class="button red">Logout</a></span>
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
           
          <table width="100%" border="1" bgcolor="#000000" cellpadding="10" cellspacing="10">
              <tr bgcolor="#e53f3f">
                <td height="29" style="color:#FFF">S.NO</td>
                <td style="color:#FFF">First Name</td>
                <td style="color:#FFF">Last Name</td>
                <td style="color:#FFF">Email</td>
                <td style="color:#FFF">School</td>
                <td style="color:#FFF">Program</td>
                <td style="color:#FFF">Registrant Key</td>
                <td style="color:#FFF">Register Date</td>                
              </tr>
               <?php
					      include "config.php";
						  $wbid=$_GET['webid'];
						  
							$ses_result=mysql_select_db($dbname) or die(mysql_error());
										
							$sqlget="select *  from student_web_reg where webinar_id='$wbid'";
							
							$ses_result=mysql_query($sqlget);
							$rowcount= mysql_num_rows($ses_result);	
							$i=1;
							if($rowcount>0)
							{
							while($res=mysql_fetch_array($ses_result))
							{
								
								$student_id=$res["student_id"];
								$registration_id=$res["registration_id"];
								$reg_date=$res["reg_date"];
							    
								$sqlget1="select *  from student_register where id='$student_id'";
								$ses_result1=mysql_query($sqlget1);
							    $rowcount1= mysql_num_rows($ses_result1);
								$res1=mysql_fetch_array($ses_result1);
								$FirstName=$res1["FirstName"];
								$LastName=$res1["LastName"];
								$Email=$res1["Email"];
								$schoolName=$res1["schoolName"];
								$Program=$res1["Program"];
								
							
							
						?>
           
         
					   
					   <!-- post 4 -->
               
					    <tr bgcolor="#FFFFFF">
                        <td height="29"><?php print $i; ?></td>
                        <td><?php print $FirstName; ?></td>
                        <td><?php print $LastName; ?></td>
                        <td><?php print $Email; ?></td>
                         <td><?php print $schoolName; ?></td>
                          <td><?php print $Program; ?></td>
                        <td><?php print $registration_id; ?></td>
                        <td><?php print $reg_date; ?></td>                       
                        </tr>
							
						<?php
						}
			}
		   else
		   {
			   ?>	
               <tr bgcolor="#FFFFFF">
               <td colspan="8" align="center">No Records Found</td>
               </tr>
               <?php
		   }
		   ?>
          </table>
          <br/>
          <div style="padding-left:800px;">Total Registrants: <?php print $rowcount; ?></div>
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