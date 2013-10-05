<?php
session_start();

if(isset($_SESSION["uid"]))
{
	$username=$_SESSION["uname"];
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
<title>Student Home page</title>
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

</head>
<body>
<div id="wrapper">


    <!-- header -->
    <div class="fixposition">
    <div id="header-wrapper">
    <div id="header-content">
        <div id="logo"><a href="student-homepage.php"><img src="images/logo.png" alt="interngration" width="400" height="80" /></a></div>
         <!-- header nav menu -->        
        <div id="menu" class="menu"> 
               <ul>
               <li><a href="">Welcome&nbsp; :&nbsp; <?php print $username; ?></a></li>
               <li><a href="student-homepage.php">Home</a></li></ul>
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
                <h1>My Dashboard</h1><span style="margin:0px 30px 0px 0px; float:right;"> 
                <a href= "student-homepage.php" class="button red">My Dashboard</a>
                <a href="StudentRegisteredWebinar.php" class="button red">My Webinars</a>   
                <a href="StudentWatchedWebinar.php" class="button red">Watched Webinars</a>              
                <a href="postedJob.php" class="button red">Job Board</a> 
                <a href="AppliedPostedJob.php" class="button red">My Jobs</a> 
                <a href="studentInbox.php" class="button red">My Inbox</a> 
                <a href="student-profile.php" class="button red">My Profile</a> 
                <a href="studentAccount.php" class="button red"> My Account</a>
                <a href="logout.php" class="button red">Logout</a></span>
            </div>        
        </div>        
                          
     <!-- body -->
    <div id="body-wrapper" class="container_16">
    <div class="clear"></div>

<?php
include "citrix.php";

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
include "config.php";
?>
        <!-- side bar -->
        <div class="section">
            <div class="grid_20"> 
              
                <!-- sidebar nav -->
                <div class="title"><h4>Featured Employer Sessions</h4></div>
                <!-- post 6 -->
                <div class="post-out-wrapper">

                    <!-- post image and details -->                    
                    <div class="post-out-image">
                               
                        <!-- image -->                          
                        <div class="hover">                
                            <!-- job 4 -->
            <div class="recent-job">                    
            <div class="hover"><a href="http://www.youtube.com/watch?v=oY59wZdCDo0" data-rel="prettyPhoto" title="Enter Title Here" >
            <span class="play"></span><img src="images/job1.jpg" width="220" height="175" alt=""/></a></div>
            </div>  
                        </div>  
                         <!-- details -->
                    </div>
                </div> 
                            
        <div class="clear"></div> 

            </div><!-- end grid_4 -->
        </div><!-- end side bar -->    

		<!-- posts -->
		<div class="section">
       		<div class="grid_21">           

            
           		<!-- title -->
                <div class="title">
                	     
                </div>                

               
                <!-- post 1 -->
                <div class="post-out-wrapper">

                    <!-- post image and details -->                    
                    <div class="post-out-image">
                               
                        <!-- image -->                          
                        <div class="hover">                
                            <!-- job 4 -->
            <div class="recent-job">                    
            <div class="hover"><a href="http://www.youtube.com/watch?v=oY59wZdCDo0" data-rel="prettyPhoto" title="Enter Title Here" >
            <span class="play"></span><img src="images/job1.jpg" width="220" height="175" alt=""/></a></div>
            </div>  
                        </div>  
                         <!-- details -->
                    </div>
                </div>                    
                    
				<!-- post 2 -->
                <div class="post-out-wrapper">

                    <!-- post image and details -->                    
                    <div class="post-out-image">
                               
                        <!-- image -->                          
                        <div class="hover">                
                            <!-- job 4 -->
            <div class="recent-job">                    
            <div class="hover"><a href="http://www.youtube.com/watch?v=oY59wZdCDo0" data-rel="prettyPhoto" title="Enter Title Here" >
            <span class="play"></span><img src="images/job1.jpg" width="220" height="175" alt=""/></a></div>
            </div>  
                        </div>  
                         <!-- details -->
                       </div></div> 
                    
                    
                    
              <!-- post 3 -->
                <div class="post-out-wrapper">

                    <!-- post image and details -->                    
                    <div class="post-out-image">
                               
                        <!-- image -->                          
                        <div class="hover">                
                            <!-- job 4 -->
            <div class="recent-job">                    
            <div class="hover"><a href="http://www.youtube.com/watch?v=oY59wZdCDo0" data-rel="prettyPhoto" title="Enter Title Here" >
            <span class="play"></span><img src="images/job1.jpg" width="220" height="175" alt=""/></a></div>
            </div>  
                        </div>  
                         <!-- details -->
                    </div>
                </div> 
                      
					   <?php
					     include "config.php";
						
							$ses_result=mysql_select_db($dbname) or die(mysql_error());
										
							$sqlget="Select *  from upcoming_webinar where start_time>NOW() ";
							
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
						?>
					    <form method="post" action="StudentRegisterConfirmation.php" id="form<?php print $i; ?>">
					   <!-- post 4 -->
               
					    <div class="post-out-text">     
					    <div class="header-container">
                         
                                <h4><?php print $subject; ?></h4>
                      <p class="post-subtitle" style="font-size:12px;">Start Time: <?php print $stdt." To ".$stte; ?> </p> <p class="post-subtitle" style="font-size:12px;">End Time : <?php print $endt." To ".$ente; ?></p> 
                            </div>
							<div class="padding10 float-left"><p><?php print $description; ?><br>
                           
                            <a style="cursor:pointer" onClick="document.getElementById('form<?php print $i; ?>').submit();">Register</a>
                           
                            </p></div>
				 </div>
                 <input type="hidden" name="regid" id="regid" value="<?php print $webinar_key; ?>">
                 <input type="hidden" name="subj" id="subj" value="<?php print $subject; ?>">
                 <input type="hidden" name="desc" id="desc" value="<?php print $description; ?>">
                 <input type="hidden" name="sttime" id="sttime" value="<?php print $start_time; ?>">
                 <input type="hidden" name="entime" id="entime" value="<?php print $end_time; ?>">
					</form>			
						<?php
						$i++;
						}
						
						?>	
							
						
							
					<!--		 <div class="post-out-text">     
					    <div class="header-container">
                                <div class="date"><ul><li>December 10, 2013</li></ul></div>
                                <h4>TCS Form Webniar</h4>
                                <p class="post-subtitle">Time: 8:00 AM</p> <p class="post-subtitle">Duration: 1 Hour</p> 
                            </div>
							<div class="padding10 float-left"><p>Aliquam vulputate, pede vel vehicula accumsan, mi neque rutrum erat, eu cm non stibulum no. Aliquam vulputate, pede vel vehicula. rutrum erat, eu cm non stibulum no. Aliquam vulputate, pede vel vehicula Aliquam vulputate, pede vel vehicula Aliquam vulputate, pede vel vehicula accumsan, mi neque rutrum erat, eu cm non stibulum no. vulputate, pede vel vehicula accumsan, mi neque rutrum erat, eu cm non stibulum no. Aliquam vulputate, pede vel vehicula. rutrum erat, eu cm non stibulum no. Aliquam vulputate, pede vel vehicula Aliquam vulputate, pede vel vehicula Aliquam vulputate, pede vel vehicula accumsan, mi neque rutrum erat, eu cm non stibulum no. vulputate, pede vel vehicula accumsan, mi neque rutrum erat, eu cm non stibulum no. Aliquam vulputate, pede vel vehicula. rutrum erat, eu cm non stibulum no. Aliquam vulputate, pede vel vehicula Aliquam vulputate, pede vel vehicula Aliquam vulputate, pede vel vehicula accumsan, mi neque rutrum erat, eu cm non stibulum no.<br><a href="StudentRegisterConfirmation.php?regid=1473681284795160576">Register</a></p></div>
				 </div>  -->
						
        </div><!-- end grid_12 --> 
        </div><!-- end recent posts --> 

      
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
  
</body>
</html>