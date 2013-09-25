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
<title>Student Inbox View</title>
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
</head>
<body>
<div id="wrapper">


    <!-- header -->
    <div class="fixposition">
    <div id="header-wrapper">
    <div id="header-content">
        <div id="logo"><a href="index.html"><img src="images/logo.png" alt="interngration" width="400" height="80" /></a></div>
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
                <h1>Interngration</h1><span style="margin:0px 30px 0px 0px; float:right;">
                <a href="studentJobApplication.php" class="button red">JobApplication</a> 
                <a href="studentInbox.php" class="button red">Inbox</a>
                 <a href="student-profile.php" class="button red">Profile</a> 
                <a href="studentAccount.php" class="button red">Account</a>
                <a href="logout.php" class="button red">Logout</a></span>
            </div>        
        </div>      
                          
     <!-- body -->
    <div id="body-wrapper" class="container_16">
    <div class="clear"></div>
       <!--Update tje mail box read function -->
	   <?php
	   $eid=$_GET['eid'];
	    include "config.php"; 	
		$ses_result=mysql_select_db($dbname) or die(mysql_error());
		$sqlUpdate ="Update student_mailbox set flg_read='1' where id='$eid'";
	    $result=mysql_query($sqlUpdate);
	   ?>

        <!-- side bar -->
        <?php include "mailsidebar.php"; ?><!-- end side bar -->    


		<!-- posts -->
		<div class="section">
       		<div class="grid_21">           

            
           		<!-- title -->
                <div class="title">
                	     
                </div>                

 
					   	<!-- tabs -->
		<div class="section">
			
       		<!-- title -->
                            <?php
		$sqlget="Select *  from student_mailbox where id='".$eid."'";
		$ses_result=mysql_query($sqlget);
		$rowcount= mysql_num_rows($ses_result);	
       		
		while($res=mysql_fetch_array($ses_result))
		{	
    		$to_mail=$res["to_mail"];
			$from_mail=$res["from_mail"];
			$subject=$res["subject"];
			$message=$res["message"];
			$group_id=$res["group_id"]; 
			$SendDate=$res["SendDate"];			
			$dtmonth = date('M',strtotime($SendDate));
			$dtdate = date('d',strtotime($SendDate));
			
			$flg_snd_arch=$res["flg_snd_arch"];
			
			if(isset($flg_snd_arch))
			{
				$chkml=$to_mail;
			}
			else
			{
			    $chkml=$fm_mail;
			}
			
			
			
			$sqlrmid="Select *  from student_register where Email='".$chkml."'";
		    $ses_result1=mysql_query($sqlrmid);
			$rowcount= mysql_num_rows($ses_result1);
			if($rowcount!="0")	
			{
			$res1=mysql_fetch_array($ses_result1);
			$FirstName=$res1['FirstName'];
			$LastName=$res1['LastName'];
			$UserName=$res1['UserName'];
			$toname=$FirstName." ".$LastName;
			$toSendMail="\"".$UserName."\""."&lt ".$chkml." &gt,";
			}
			
			$sqlrmid1="Select *  from recruiter_register where Email='".$chkml."'";
		    $ses_result2=mysql_query($sqlrmid1);
			$rowcount1= mysql_num_rows($ses_result2);
			if($rowcount1!="0")	
			{
			$res2=mysql_fetch_array($ses_result2);
			$FirstName=$res2['FirstName'];
			$LastName=$res2['LastName'];
			$UserName=$res2['UserName'];
			$toname=$FirstName." ".$LastName;
			$toSendMail="\"".$UserName."\""."&lt ".$chkml." &gt,";
			}
		}
			?>  

            <!-- tab 1 -->
            <div class="grid_22">
                
                <div class="" style="float:left; margin:0px 0px 20px 0px; width:700px;">
                <a href="studentReplyMessage.php?repid=<?php print $eid; ?>" class="button white">Reply</a> 
                <!--<a href="studentReplyallMessage.php?repid=<?php print $group_id; ?>" class="button white">Reply All</a>-->
                 <a class="button white" href="studentForwardMessage.php?fwpid=<?php print $eid; ?>">Forward</a>
                  <a href="studentDeleteMessage.php?delpid=<?php print $eid; ?>" class="button white">Delete</a>
                  </div><!-- end .tabs-wrapper -->
    		</div><!-- end grid_8-->         
        

        <!-- end tabs -->  
		
		
		
		
		
					   <!-- post 4 -->
                <div class="post-out-message">     
					    <div class="header-message">
                         <div class="date"><?php print $SendDate; ?></div>
        <div style="margin:5px 0px 5px 10px;"><b><?php print $subject; ?></b></div>
		<div style="margin:0px 0px 0px 10px;"><?php print $toname; ?></div>
                          </div></div>
						<div style="float:left; border:1px #dad8d8 solid; padding:10px 20px 20px 5px; width:663px;"><p class="post-subtitle" align="justify"><?php print $message; ?></p> 
						
						</div>	
					</div>
					   
		
					 
					   
					    
			
              

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
<script type="text/javascript" src="js/jquery.coda-slider-2.0.js"></script> 
<script type="text/javascript" src="js/custom.js"></script>
</body>
</html>