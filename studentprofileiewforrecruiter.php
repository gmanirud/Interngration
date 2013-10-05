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
<title>Student Profile</title>
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
        <div id="logo"><a href="recruiter-home-page.php"><img src="images/logo.png" alt="interngration" width="400" height="80" /></a></div>
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
       <?php
	   if(isset($_GET['stdmail']))
	   {
		$EmailIds=$_GET['stdmail'];   
	   }
	   if(isset($_GET['jbids']))
	   {
		   $jobsid=$_GET['jbids'];
	   }
	   ?>
    
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
        <?php
		 
      	  $ses_result=mysql_select_db($dbname) or die(mysql_error()); 
		  $stts=$_GET['statuspn'];
		  if($stts=='Accepted')
		  {
			  $sqlUpdate ="Update student_jobapplication set apply_status='Accepted' where JobId='$jobsid'";
		      $result=mysql_query($sqlUpdate);
			  print "<font color='#FF0000' size='+3'>Profile Accepted</font>";
			  
		  }
		   if($stts=='Rejected')
		  {
			   $sqlUpdate ="Update student_jobapplication set apply_status='Rejected' where JobId='$jobsid'";
		       $result=mysql_query($sqlUpdate);
			   print "<font color='#FF0000' size='+3'>Profile Rejected</font>";
			  
		  }
		  
		    $sql12="select * from student_jobapplication where JobId='$jobsid'";
		    $ses_result12=mysql_query($sql12);
			$res12=mysql_fetch_array($ses_result12);
			$appsts=$res12["apply_status"];
			
		    
		   $sql="select * from student_register where Email='".$EmailIds."'";
		   $ses_result=mysql_query($sql);
		   while($res=mysql_fetch_array($ses_result))
		   {
			$FirstName=$res["FirstName"];
			$LastName=$res["LastName"];
			$Company=$res["Company"];
			$Address=$res["Address"];
			$Country=$res["Country"];
			$Email=$res["Email"];
			$Profile_Image=$res["Profile_Image"];
			$schoolName=$res["schoolName"];
			$AboutMe=$res["AboutMe"];
			$Program=$res["Program"];   
			$univ_Year=$res["univ_Year"];   
			$skill_set=$res["skill_set"];   
			$position_for=$res["position_for"];   
			$language_pref=$res["language_pref"];   
			$work_experience=$res["work_experience"];   
			$projects=$res["projects"];   
		   }
		   
		 ?>
        
        <!-- title -->
        <div class="title">
          <h4>Status : <?php print $appsts; ?> </h4>
        </div>
       
        
        <!-- 8/16 -->
        <div class="grid_8" style="min-height:310px;">
         <div style="float:left;">
              <h4 style="margin:20px;">Personal Information</h4>
            </div> <br/><br/><br/><br/>
          <table style="margin:10px;height:220px; min-width:400; border:1px solid; border-color:#CCC; padding:10px; Serif;overflow:auto;">
                  
          <tr>
            <td width="130">First Name</td>
            <td width="3">:</td>
            <td width="225"><?php print $FirstName; ?></td>
            <td rowspan="4" valign="top"> <img src="uploads/StudentImage/<?php print $Profile_Image ?>" height="100" width="100" /></td>
          </tr>
          <tr>
            <td>Last Name</td>
            <td>:</td>
            <td><?php print $LastName; ?></td>
          </tr>
          <tr>
            <td>Affiliated University</td>
            <td>:</td>
            <td><?php print $Company; ?></td>
          </tr>
          <tr>
            <td>City</td>
            <td>:</td>
            <td><?php print $Address; ?></td>
          </tr>
          <tr>
            <td>Country</td>
            <td>:</td>
            <td><?php print $Country; ?></td>
          </tr>
          <tr>
            <td>Email</td>
            <td>:</td>
            <td><?php print $Email; ?></td>
          </tr>
          <tr>
            <td>About Me</td>
            <td>:</td>
            <td><?php print $AboutMe; ?></td>
          </tr>
        </table>


        </div>
        
        
        <!-- Acadamic Information -->
        <div class="grid_8" style="min-height:310px;">
         <div style="float:left;">
              <h4 style="margin:20px;">Acadamic Information</h4>
            </div> <br/><br/><br/><br/>
          <table style="margin:10px;height:220px; min-width:400; border:1px solid; border-color:#CCC; padding:10px; Serif;overflow:auto;">
                  
          <tr>
            <td width="130">University</td>
            <td width="3">:</td>
            <td width="225"><?php print $schoolName; ?></td>
          
          </tr>
          <tr>
            <td>Program</td>
            <td>:</td>
            <td><?php print $Program; ?></td>
          </tr>
          <tr>
            <td>Year</td>
            <td>:</td>
            <td><?php print $univ_Year; ?></td>
          </tr>
           <tr>
            <td>Professional Skill</td>
            <td>:</td>
            <td><?php print $skill_set; ?></td>
          </tr>
           <tr>
            <td>Position For</td>
            <td>:</td>
            <td><?php print $position_for; ?></td>
          </tr>
           <tr>
            <td>Language Preference</td>
            <td>:</td>
            <td><?php print $language_pref; ?></td>
          </tr>
         
        </table>


        </div>
        
       <!-- Work Experience  -->
        
        <div class="grid_8" style="min-height:200px;">
          <div>
            <div style="float:left;">
              <h4 style="margin:20px;">Work Experience</h4>
            </div>
            
          </div>
          <p align="justify" style=" margin:20px; border:1px solid #666666; padding:10px; height:140px;width:395px;border:1px solid #ccc; Serif;overflow:auto;" id="para_workexperience">
            <?php
		  if($work_experience!="")
		   {
			  print $work_experience;
		  }
		  ?>
          </p>          
         
        </div>
        
        
        <!-- Project  -->
        <div class="grid_8" style="min-height:200px;">
          <div>
            <div style="float:left;">
              <h4 style="margin:20px;">Projects</h4>
            </div>            
          </div>
          <p align="justify" style=" margin:20px; border:1px solid #666666; padding:10px; height:140px;width:395px;border:1px solid #ccc; Serif;overflow:auto;" id="para_Projects">
            <?php
		  if($projects!="")
		  {
			  print $projects;
		  }
		  ?>
          </p>
           </div>
          
           <?php
		   
		   if($appsts=="Pending")
		   {
			   ?>
        
            <div align="center">
            <a href="studentprofileiewforrecruiter.php?stdmail=<?php print $Email; ?>&statuspn=Accepted&jbids=<?php print $jobsid; ?>" class="button red">Accept</a>
            <a href="studentprofileiewforrecruiter.php?stdmail=<?php print $Email; ?>&statuspn=Rejected&jbids=<?php print $jobsid; ?>" class="button red">Reject</a>
            </div>
            
            <?php
		   }
		   ?>
         
            
            
        
        <!-- end grid columns -->
        
        <div class="clear"></div>
      </div>
      <!-- end body-wrapper --> 
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