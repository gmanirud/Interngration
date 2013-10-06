<?php
session_start();

if(isset($_SESSION["ruid"]))
{
	$username=$_SESSION["uname"];
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
<title>Job Posting</title>
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

<!-- Date Picker -->

<!-- Refer this website for date picker : http://jqueryui.com/datepicker/#min-max    -->

<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
  <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
  <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
  <script>
  $(function() {
	  var currentDate = new Date(); 
	  $( "#dt_post" ).datepicker({ minDate: 0, maxDate: "+1Y +1M +1D" });
	  $("#dt_post").datepicker().datepicker("setDate", currentDate);
   // $( "#dt_post" ).datepicker();
    $( "#dt_post" ).datepicker( "option", "dateFormat","yy-mm-dd" );
	
	$( "#dead_line" ).datepicker({ minDate: 0, maxDate: "+1Y +1M +1D" });
    $( "#dead_line" ).datepicker();
	$( "#dead_line" ).datepicker( "option", "dateFormat","yy-mm-dd" );
	
  });
  
  </script>
<!-- Date Picker -->


<!-- Load Jquery/Modernizr Javascript -->


<script type="text/javascript" src="js/modernizr.js"></script>
<script type="text/javascript">
function chkval()
{
	
	//document.getElementById('stats').style.display="none";
    if(document.getElementById("job_title").value=="")
	{
		document.getElementById("error2").style.display='block';
		document.getElementById("error2").innerHTML='Please Enter the Job Title!';
		document.getElementById("job_title").focus();
		return false;
	}
	/*if(document.getElementById("job_id").value=="")
	{
		document.getElementById("error2").style.display='block';
		document.getElementById("error2").innerHTML='Please Enter the Job Id!';
		document.getElementById("job_id").focus();
		return false;
	}*/
	if(document.getElementById("jbdept").value=="")
	{
		document.getElementById("error2").style.display='block';
		document.getElementById("error2").innerHTML='Please Enter the Job Department!';
		document.getElementById("jbdept").focus();
		return false;
	}
	if(document.getElementById("jbdetails").value=="")
	{
		document.getElementById("error2").style.display='block';
		document.getElementById("error2").innerHTML='Please Enter the Job Detail!';
		document.getElementById("jbdetails").focus();
		return false;
	}
	if(document.getElementById("dt_post").value=="")
	{
		document.getElementById("error2").style.display='block';
		document.getElementById("error2").innerHTML='Please Enter the Date Post!';
		document.getElementById("dt_post").focus();
		return false;
	}
	if(document.getElementById("dead_line").value=="")
	{
		document.getElementById("error2").style.display='block';
		document.getElementById("error2").innerHTML='Please Enter the Dead Line!';
		document.getElementById("dead_line").focus();
		return false;
	}
	if((document.getElementById("dt_post").value!="")&&(document.getElementById("dead_line").value!=""))
	{
		var dt_pst=document.getElementById("dt_post").value;
		var dt_lne=document.getElementById("dead_line").value;
		var sp_pst=dt_pst.split("-");
		var sp_lne=dt_lne.split("-");
		var pst_y=sp_pst[0];
		var pst_m=sp_pst[1];
		var pst_d=sp_pst[2];
		var lne_y=sp_lne[0];
		var lne_m=sp_lne[1];
		var lne_d=sp_lne[2];
		if(pst_y<lne_y)
		{
			if(pst_m<lne_m)
			{
				
				document.getElementById("error2").style.display='block';
				document.getElementById("error2").innerHTML='Please Enter the Dead Line from date posted with in One Year!';
				document.getElementById("dead_line").focus();
				return false;
				
			}
			if(pst_m==lne_m)
			{
				if(pst_d<lne_d)
				{
					
					document.getElementById("error2").style.display='block';
					document.getElementById("error2").innerHTML='Please Enter the Dead Line from date posted with in One Year!';
					document.getElementById("dead_line").focus();
					return false;
				}				
			}
			
		}
		
	}
	
	
	
	return true;
}
</script>

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
 </div> </div> </div>
    <!-- end header -->     
    <div id="body-background"><!-- this is the main background color of the page -->
    <div id="header-buffer"></div><!-- hack for header overlap **DONT'TOUCH** -->
    
    <!-- page header -->
         <div id="pageheader-background"><!-- area with alternate background -->
            <div class="pageheader-title">
             <span class="mailno"><?php include "RecruiterUnreadMail.php"; ?></span>
                <h1>Job Posting</h1><span style="margin:0px 30px 10px 0px; float:right;">
                  <a href="https://login.citrixonline.com/login?service=https%3A%2F%2Fglobal.gotomeeting.com%2Fmeeting%2Fj_spring_cas_security_check" target="_blank" class="button red">Schedule your Webinar</a>                
                <a href="RecruiterUpcomingWebinar.php" class="button red">Scheduled Webinar</a>
                 <a href="RecruiterWatchedWebinar.php" class="button red">Past Webinar</a>
                <a href="recruiterInbox.php" class="button red">Inbox</a>
                <a href="jobPosting.php" class="button red">Job Posting</a>
                <a href="recruiterAccount.php" class="button red">Account</a>
                <a href="logout.php" class="button red">Logout</a></span>
            </div>        
        </div>     
                          
    <!-- body -->
    <div id="body-wrapper" class="container_16">
    <div class="clear"></div>
	 <div style="float:left;color:#F00; font-weight:400; display:none" id="error2"></div>
     <?php
	 if(isset($_GET['stats'])=='1')
	 {
		 ?>
     <div style="float:left;color:#390; font-weight:400;" id="stats">Job Posted Successfully</div>
     <?php
	 }
	 ?>
     
     <?php
	 date_default_timezone_set('GMT-4.30');
	 $todaydate = date('Y-m-d');
	 ?>
		<!-- grid columns -->
		<div class="section">
           
       		<!-- title -->
            <div class="title grid_16"></div>                    
			<!-- one half-->
            <form action="saveJobPosting.php" method="post" onSubmit="return chkval();">
            <div class="grid_16">
                
                <div class="one-half">
<div style="margin-top:20px;">

<table width="360" height="300" border="0" cellpadding="10">
  <tr>
    <td width="120">Job Title<b style="color:#F00">*</b> </td>
    <td width="180"><input type="text" name="job_title" id="job_title" size="30"></td>
  </tr>
  <tr>
    <td>Job id</td>
    <td><input type="text" size="30" name="job_id" id="job_id"></td>
  </tr>
  <tr>
    <td valign="top" style="padding-top:20px;">Job Department<b style="color:#F00">*</b> </td>
    <td> <input type="text" size="30" name="jbdept" id="jbdept"></td>
  </tr>
  <tr>
    <td>Job Details<b style="color:#F00">*</b> </td>
    <td><textarea name="jbdetails" id="jbdetails"  cols="27"></textarea></td>
  </tr>
  <tr>
    <td>Date Posted<b style="color:#F00">*</b> </td>
    <td><input type="text" size="30" name="dt_post" id="dt_post" ></td>
  </tr>
  <tr>
    <td>Deadline<b style="color:#F00">*</b> </td>
    <td><input type="text" size="30" name="dead_line" id="dead_line"></td>
  </tr>
</table>

</div>
                </div>
                <div class="one-half-last"><br><a class="button-big red" href="recruiterPostedJob.php">Posted Job</a></div>
                 
 <div class="grid_4">
 <input type="submit" name="post" id="post" value="Post" class="button-big red">
</div>   
   
            </div>
            </form>
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
<script type="text/javascript" src="js/jquery.prettyPhoto.js"></script>
<script type="text/javascript" src="js/scrolltopcontrol.js"></script>
<script type="text/javascript" src="js/jquery.isotope.min.js"></script> 
<script type="text/javascript" src="js/jquery.coda-slider-2.0.js"></script> 
<!--<script type="text/javascript" src="js/custom.js"></script>-->  
</body>
</html>