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
<?php include "studentToEmail.php"; ?>
<!DOCTYPE HTML>
<html lang="en" class="no_js">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Compose Message</title>
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
		document.getElementById("error2").innerHTML='Please Enter the To Mail!';
		document.getElementById("to_mail").focus();
		return false;
	}
	if(document.getElementById("subject_mail").value=="")
	{
		document.getElementById("error2").style.display='block';
		document.getElementById("error2").innerHTML='Please Enter the Subject!';
		document.getElementById("subject_mail").focus();
		return false;
	}
	if(document.getElementById("message_mail").value=="")
	{
		document.getElementById("error2").style.display='block';
		document.getElementById("error2").innerHTML='Please Enter the Message!';
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
        <div id="logo"><a href="student-homepage.php"><img src="images/logo.png" alt="interngration" width="400" height="64" /></a></div>
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
                <h1>Interngration</h1><span style="margin:0px 30px 0px 0px; float:right;">
                <a href="studentJobApplication.php" class="button red">JobApplication</a> 
                <a href="student-inbox.html" class="button red">Inbox</a>
                 <a href="student-profile.php" class="button red">Profile</a> 
                <a href="studentAccount.php" class="button red">Account</a>
                <a href="logout.php" class="button red">Logout</a></span>
            </div>        
        </div>        
                          
     <!-- body -->
    <div id="body-wrapper" class="container_16">
    <div class="clear"></div>


        <!-- side bar --><?php include "mailsidebar.php"; ?>
        <!-- end side bar -->    


		<!-- posts -->
		<div class="section">
       		<div class="grid_21">           

            
           		<!-- title -->
                <div class="title">
                	     
                </div>    
	    <?php
		$repid=$_GET['repid'];
	    include "config.php"; 	
		$ses_result=mysql_select_db($dbname) or die(mysql_error());
		$sqlget="Select *  from student_mailbox where id='".$repid."'";
		$ses_result=mysql_query($sqlget);
		$rowcount= mysql_num_rows($ses_result);	
       		
		while($res=mysql_fetch_array($ses_result))
		{	
    		$to_mail=$res["to_mail"];
			$from_mail=$res["from_mail"];
			$subject=$res["subject"];
			$message=$res["message"]; 
			$SendDate=$res["SendDate"];			
			$dtmonth = date('M',strtotime($SendDate));
			$dtdate = date('d',strtotime($SendDate));
			$sqlrmid="Select *  from student_register where Email='".$from_mail."'";
		    $ses_result1=mysql_query($sqlrmid);
			$rowcount= mysql_num_rows($ses_result1);
			if($rowcount!="0")	
			{
			$res1=mysql_fetch_array($ses_result1);
			$FirstName=$res1['FirstName'];
			$LastName=$res1['LastName'];
			$UserName=$res1['UserName'];
			$toname=$FirstName." ".$LastName;
			$toSendMail="\"".$UserName."\""."&lt ".$from_mail." &gt,";
			}
			
			$sqlrmid1="Select *  from recruiter_register where Email='".$from_mail."'";
		    $ses_result2=mysql_query($sqlrmid1);
			$rowcount1= mysql_num_rows($ses_result2);
			if($rowcount1!="0")	
			{
			$res2=mysql_fetch_array($ses_result2);
			$FirstName=$res2['FirstName'];
			$LastName=$res2['LastName'];
			$UserName=$res2['UserName'];
			$toname=$FirstName." ".$LastName;
			$toSendMail="\"".$UserName."\""."&lt ".$from_mail." &gt,";
			}
			
		}
			?>               

 
					   	<!-- tabs -->
		<div class="section">
			
       		<!-- title -->
                          
<form id="frmProfile" action="sendStudentMail.php" method="post" onSubmit="return chkvalid();">
            <!-- tab 1 -->
            <div class="grid_22">
                
                <div class="" style="float:left; margin:0px 0px 20px 0px; width:700px;">
                <input type='submit' name="Send" value="Send" class="button white" style="width:70"  />
                   <!--  <input type='reset' name="Cancel" value="Cancel" class="button white" style="width:70"  />-->
                 <a href="studentInbox.php"><input type="button" name="cancel" value="Cancel" class="button white" style="width:70" /></a>
                <div style="float:left;color:#F00; font-weight:400; padding-top:2px; display:none" id="error2"></div>  
                </div><!-- end .tabs-wrapper -->
    		</div><!-- end grid_8-->         
        

        <!-- end tabs -->  
					   <!-- post 4 -->
                <div class="post-out-message">     
					    <div class="header-message">
              
        <div style="margin:0px 0px 5px 10px;">To: <input name="to_mail" type="text" id="to_mail" value='<?php print $toSendMail;?>' style="margin:10px 0px 0px 39px; width:250px;" class="wickEnabled" ></div>
		<div style="margin:0px 0px 10px 10px;">Subject: <input name="subject_mail" id="subject_mail" type="text" value="RE:<?php print $subject;?>" style="margin:10px 0px 0px 10px;  width:250px;"></div>
                          </div></div>
						<div style="float:left; border:1px #dad8d8 solid; padding:10px 20px 20px 5px; width:663px;">
						<textarea cols="118" rows="10" style="float:left; margin:10px 10px 10px 10px;" id="message_mail" name="message_mail"><?php print $message; ?>&#13;&#13;
 on <?php print $SendDate; ?>&#13;
......................................................................................</textarea>
				        </div>	
					</div>
					   
					<div class="" style="float:left; margin:0px 0px 20px 0px; width:700px;">
                     <input type='submit' name="Send" value="Send" class="button white" style="width:70"  />
                     <a href="studentInbox.php"><input type="button" name="cancel" value="Cancel" class="button white" style="width:70" /></a>
                   <!--  <input type='reset' name="Cancel" value="Cancel" class="button white" style="width:70"  /> -->
                   
					 
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
