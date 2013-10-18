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
<title> Recruiter Webinars - Interngration</title>
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


<!--  Citrix Authentication -->
<?php
include "recruitercitrix.php";

$citrix = new Citrix('2a3328f6717227aa1262eb368d013a47');
$organizer_key = $citrix->get_organizer_key();
$weblist=$citrix->citrixonline_get_list_of_webinars();
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
               		 
               		<li><a href="recruiter-home-page.php">Home</a></li>
               		<li><a href="recruiterAccount.php">Account</a></li>
               		<li><a href="logout.php">Logout</a></span></li> 
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
             <span class="mailno"><?php include "RecruiterUnreadMail.php"; ?></span>
                <h1>Completed Webinars</h1><span style="margin:0px 30px 10px 0px; float:right;">
                <a href="https://login.citrixonline.com/login?service=https%3A%2F%2Fglobal.gotomeeting.com%2Fmeeting%2Fj_spring_cas_security_check" target="_blank" class="button red">Schedule a Webinar</a>                
                <a href="RecruiterUpcomingWebinar.php" class="button red">My Webinars</a>
                 <a href="RecruiterWatchedWebinar.php" class="button red">Past Webinars</a>
                 <a href="recruiterInbox.php" class="button red">Inbox</a>
                <a href="jobPosting.php" class="button red"> Post a Job</a>
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
            
           <?php
					      include "config.php";
						
							$ses_result=mysql_select_db($dbname) or die(mysql_error());
										
							$sqlget="select *  from upcoming_webinar where start_time<NOW()";
							
							$ses_result=mysql_query($sqlget);
							$rowcount= mysql_num_rows($ses_result);	
							$i=1;
							while($res=mysql_fetch_array($ses_result))
							{
								
								$subject=$res["subject"];
								$description=$res["description"];
								$webinar_url=$res["webinar_url"];
								$webinar_key=$res["webinar_key"];
								$start_time=$res["start_time"];
								$end_time=$res["end_time"];
								$status=$res["status"];
								
								$stdate = date_create($start_time);
								$stdt=date_format($stdate, 'Y-m-d');
								$sttime = date_create($start_time);
								$stte=date_format($sttime, 'h:i a');
								$endate = date_create($end_time);
								$endt=date_format($endate, 'Y-m-d');
								$entime = date_create($end_time);
								$ente=date_format($entime, 'h:i a');
								
								$sqlget1="select *  from student_web_reg where webinar_id='$webinar_key'";
								//print $sqlget1;
								$ses_result1=mysql_query($sqlget1);
							    $rowcount1= mysql_num_rows($ses_result1);
							
						?>
						 
						
					   
					   <!-- post 4 -->
               
					    <div class="post-out-text" style="min-width:950px;">     
					    <div class="header-container" style="min-width:950px;">
                                <div class="date" style="font-size:12px;"><ul><li>Total Registrants: <?php print $rowcount1; ?></li>
                                 <?php if($status=='Cancelled') { ?>  
                                 <li>Cancelled</li>
                                 <?php
								 }
								 ?>
                                </ul></div>
                                <h4><?php print $subject; ?></h4>
                      <p class="post-subtitle" style="font-size:12px;">Start Time: <?php print $stdt." To ".$stte; ?></p> <p class="post-subtitle" style="font-size:12px;">End Time : <?php print $endt." To ".$ente; ?></p> 
                            </div>
							<div class="padding10 float-left"><p><?php print $description; ?><br><div style="padding-left:700px;">
                           <a href="RecruiterWebinarQuestion.php?webId=<?php print $webinar_key; ?>" title="View Video" class="button-big red"  >Q & A Forum</a>
                            
                            </p></div></div>
				 </div>
							
						<?php
						}
						?>	
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