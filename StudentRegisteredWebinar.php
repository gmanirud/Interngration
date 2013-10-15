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
?>
<!DOCTYPE HTML>
<html lang="en" class="no_js">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Upcoming Webinars</title>
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
					
		$sqlget="Select *  from student_register where id='$uid'";
		
		$ses_result=mysql_query($sqlget);
		$rowcount= mysql_num_rows($ses_result);	
		
	
		if ($rowcount>0)
		{
			$res=mysql_fetch_array($ses_result);
			
			$FirstName=$res["FirstName"];
			$LastName=$res["LastName"];
			$Company=$res["Company"];
			$Address=$res["Address"];
			$Country=$res["Country"];
			$Email=$res["Email"];
			$UserName=$res["UserName"];
			
		}
	

			
?>

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
            <!-- <li><a href="">Welcome&nbsp; :&nbsp; <?php print $username; ?></a></li> -->
            <li><a href="student-homepage.php">Home</a></li>
            <li><a href="studentAccount.php"> My Account</a></li>
            <li><a href="logout.php" >Logout</a></li></ul>
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
              <h1>Upcoming Webinars</h1>
              <span style="margin:0px 30px 0px 0px; float:right;">
                <a href="StudentRegisteredWebinar.php" class="button red">Upcoming Webinars</a>
                <a href="StudentWatchedWebinar.php" class="button red">Watched Webinar</a>    
                <a href="studentJobApplication.php" class="button red">Job Application</a> 
                <a href="AppliedPostedJob.php" class="button red">Applied Job</a> 
                <a href="studentInbox.php" class="button red">Inbox</a>
                <a href="student-profile.php" class="button red">Profile</a></span> 
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
            
            <?php
			
						include "config.php"; 	
						$ses_result=mysql_select_db($dbname) or die(mysql_error());									
						$sqlget="Select distinct *  from student_web_reg where student_id='$uid' AND starttime>NOW()";						
						$ses_result=mysql_query($sqlget);
						$rowcount= mysql_num_rows($ses_result);	
						if($rowcount=='0')
						{
							?>
                            <table border="0" width="100%">
                            <tr>
                            <td>&nbsp;
                            
                            </td>
                            </tr>
                            <tr align="center">
                            <td style="color:#F00; font-size:14px;">
                            No Registration Found
                            </td>
                            </tr>
                            </table>
                            <?php

						}
						else
						{
						while($res=mysql_fetch_array($ses_result))
						{
							
			    			$webinar_id=$res["webinar_id"];
							$Joinurl=$res["Joinurl"];
							$reg_date=$res["reg_date"];
							$subj=$res["subject"];
							$desc=$res["description"];
							$starttime=$res["starttime"];
							$endTime=$res["endtime"];
							$status=$res["status"];
							$stdate = date_create($starttime);
								$stdt=date_format($stdate, 'Y-m-d');
								$sttime = date_create($starttime);
								$stte=date_format($sttime, 'h:i a');
								$endate = date_create($endTime);
								$endt=date_format($endate, 'Y-m-d');
								$entime = date_create($endTime);
								$ente=date_format($entime, 'h:i a');
			?>
            <div class="post-out-text"  style="min-width:950px;">     
					    <div class="header-container" style="min-width:950px;">
                                <div class="date"><ul><li>Register Id:  <?php print $webinar_id; ?></li><li>Registered Date:  <?php print $reg_date; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</li>
                                <?php
								if($status=='Cancelled')
								{
								?>
                                <li> Cancelled</li>
                                <?php
								}
								?>
                                </ul></div>
                                <h4><?php print $subj; ?></h4>
                      <p class="post-subtitle" style="font-size:12px;">Start Time: <?php print $stdt." To ".$stte; ?></p> <p class="post-subtitle" style="font-size:12px;">End Time : <?php print $endt." To ".$ente; ?></p> 
                            </div>                          
							<div class="padding10 float-left" align="justify"><p><?php print $desc; ?><br>
                              <?php
							if($status=='Success')
							{
							?>
                            <div style="padding-left:750px;"><a href="<?php print $Joinurl; ?>" title="View Video" class="button-big red" target="_blank" >Watch Video</a></div>
                             <?php
							}
							?>
                            </p></div>
                                                       
				 </div>
                 <?php
						}
						}
						?>
            <!--  Normal Page -->
            <div class="grid_16" id="normalpage1"></div>
            <div class="grid_16" id="normalpage">
               
           

  </div>   
  
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
