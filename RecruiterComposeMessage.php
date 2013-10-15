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
<?php include "studentToEmail.php"; ?>
<!DOCTYPE HTML>
<html lang="en" class="no_js">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Messages - Interngration</title>
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
<script src="http://cdn.jquerytools.org/1.2.7/full/jquery.tools.min.js"></script>
<script type="text/javascript">
function chkvalid()
{
if(document.getElementById("to_mail").value=="")
	{
		document.getElementById("error2").style.display='block';
		document.getElementById("error2").innerHTML='Please enter the recepient\'s name';
		document.getElementById("to_mail").focus();
		return false;
	}
	if(document.getElementById("subject_mail").value=="")
	{
		document.getElementById("error2").style.display='block';
		document.getElementById("error2").innerHTML='Please add a subject';
		document.getElementById("subject_mail").focus();
		return false;
	}
	if(document.getElementById("message_mail").value=="")
	{
		document.getElementById("error2").style.display='block';
		document.getElementById("error2").innerHTML='The message field is empty';
		document.getElementById("message_mail").focus();
		return false;
	}
	return true;
}
</script>

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
                <h1>Compose Message</h1><span style="margin:0px 30px 10px 0px; float:right;">
                <a href="https://login.citrixonline.com/login?service=https%3A%2F%2Fglobal.gotomeeting.com%2Fmeeting%2Fj_spring_cas_security_check" target="_blank" class="button red">Schedule a Webinar</a>                
                <a href="RecruiterUpcomingWebinar.php" class="button red">My Webinars</a>
                <a href="RecruiterWatchedWebinar.php" class="button red">Past Webinars</a>
                <a href="recruiterInbox.php" class="button red">Inbox</a>
                <a href="jobPosting.php" class="button red">Post a Job</a>           
            </div>        
        </div>       
       
                          
     <!-- body -->
    <div id="body-wrapper" class="container_16">
    <div class="clear"></div>


        <!-- side bar -->
          <?php include "mailsidebarRecruiter.php"; ?><!-- end side bar -->    


		<!-- posts -->
		<div class="section">
       		<div class="grid_21">           

            
           		<!-- title -->
                <div class="title">
                	     
                </div>                

 
					   	<!-- tabs -->
		<div class="section">
			
       		<!-- title -->
                          
<form id="frmProfile" action="sendRecruiterMail.php" method="post" onSubmit="return chkvalid();">
            <!-- tab 1 -->
            <div class="grid_22">
                
                <div class="" style="float:left; margin:0px 0px 20px 0px; width:700px;">
                <input type='submit' name="Send" value="Send" class="button white" style="width:70"  />
                    <input type='button' onclick="window.location.href='recruiterInbox.php'" name="Cancel" value="Cancel" class="button white" style="width:70"  />
                <div style="float:left;color:#F00; font-weight:400; padding-top:2px; display:none" id="error2"></div>  
                </div><!-- end .tabs-wrapper -->
    		</div><!-- end grid_8-->         
        

        <!-- end tabs -->  
					   <!-- post 4 -->
                <div class="post-out-message">     
					    <div class="header-message">
              
        <div style="margin:0px 0px 5px 10px;">To: <input name="to_mail" type="text" id="to_mail" value="" style="margin:10px 0px 0px 39px; width:250px;" class="wickEnabled" ></div>
		<div style="margin:0px 0px 10px 10px;">Subject: <input name="subject_mail" id="subject_mail" type="text" value="" style="margin:10px 0px 0px 10px;  width:250px;"></div>
                          </div></div>
						<div style="float:left; border:1px #dad8d8 solid; padding:10px 20px 20px 5px; width:663px;">
						<textarea cols="90" rows="10" style="float:left; margin:10px 10px 10px 10px;" id="message_mail" name="message_mail"></textarea>
				        </div>	
					</div>
					   
					<div class="" style="float:left; margin:0px 0px 20px 0px; width:700px;">
                     <input type='submit' name="Send" value="Send" class="button white" style="width:70"  />
                     <input type='button' onclick="window.location.href='recruiterInbox.php'" name="Cancel" value="Cancel" class="button white" style="width:70"  />
                   
					 
			</form>		   
					    
			
              

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

<!--   auto complete library file -->
<link rel="stylesheet" type="text/css" href="css/wick.css" />

<script type="text/javascript" language="JavaScript" src="js/wick.js"></script> <!-- WICK STEP 3: INSERT WICK LOGIC -->
<!--   auto complete library file -->

</head>
</body>
</html>