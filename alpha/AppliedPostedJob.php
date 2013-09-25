<?php
session_start();
include "config.php";
$ses_result=mysql_select_db($dbname) or die(mysql_error());
if(isset($_SESSION["uid"]))
{
	$username=$_SESSION["uname"];
	$mail_id=$_SESSION["mail_id"];
	$s_uid=$_SESSION["uid"];
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
<title>Applied Job</title>
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
function filterjob()
{
	
	
	var elements = document.getElementsByName('chkbx[]'); 
	var cnt=elements.length;
	var data = [];
	
	for (var i = 0; i < elements.length; i++)
	{
		
		if (elements[i].checked==true)
		{
			data.push(elements[i].value);
			
		}
	}
    var arrLength=data.length;
	
	//alert(arrLength);
	//if(arrLength>0)
    //{
		
	    document.getElementById("arr").value = data;
	//}
	
	//var ale=document.getElementById("arr").value;
	//alert(ale);
	document.getElementById("frm_job").submit();
//	}
}

</script>
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
                <h1>Applied Job</h1>
                <span style="margin:0px 30px 0px 0px; float:right;">
                 <?php
				 if(isset($_GET['status'])=='1')
				 {
				 ?>
        <div id="updtss" style="padding-left:60px; padding-top:5px; height:30px; color:#060; font-weight:bold; background-color:##CCC;">Your Job Applied Successfully !!!</div>
        <?php
                 }                 
				 ?>
                 <a href="StudentRegisteredWebinar.php" class="button red">Registered Webinar</a>
                <a href="postedJob.php" class="button red">JobApplication</a>
                 <a href="AppliedPostedJob.php" class="button red">Applied Job</a>  
                <a href="studentInbox.php" class="button red">Inbox</a> 
                <a href="student-profile.php" class="button red">Profile</a> 
                <a href="studentAccount.php" class="button red">Account</a>
                <a href="logout.php" class="button red">Logout</a></span>
            </div>        
        </div>      
                          
     <!-- body -->
    <div id="body-wrapper" class="container_16">
   


		<!-- posts -->
		<div class="section">
        <div class="grid_21">           
        <!-- tabs -->
		<div class="section">
        
        
        <?php
    	 	
	
			
			$sqlget="Select *  from student_jobapplication where stuID='".$s_uid."'";
		
		
		//print $sqlget;
		
		$ses_result=mysql_query($sqlget);
		$rowcount= mysql_num_rows($ses_result);	
		if($rowcount=='0')
		{
			print "No Records Found";
			
		}
		else
		{
		while($res=mysql_fetch_array($ses_result))
		{
			$JobId=$res["JobId"];
			$RecuId=$res["RecuId"];
			
			$sqlrecjob="Select *  from recruiter_jopposting where Job_id='".$JobId."' AND recruiter_id='".$RecuId."'";
			$ses_result1=mysql_query($sqlrecjob);
			$res1=mysql_fetch_array($ses_result1);
			$Job_title=$res1["Job_title"];
			$Job_id=$res1["Job_id"];
			$Date_Post=$res1["Date_Post"];
			$Dead_line=$res1["Dead_line"];
			$Company_name=$res1["Company_name"];
			$recruiter_id=$res1["recruiter_id"];		
?>
		 <!-- post 4 -->
       <div class="job-post">     
		<div class="titl">
       
        <h4><?php print $Job_title; ?></h4>
        <p>Job Id: <?php print $Job_id; ?></p>
		<p>Date Posted: <?php print $Date_Post; ?></p>
		<p>Deadline: <?php print $Dead_line; ?></p>
		<p>Company Name: <?php print $Company_name; ?></p>
		</div>
		 </div>
		
		<?php
		}
		}
		?>
						
		</div><!-- pagination -->
                <!--<div class="sectionnav">
                    <ul class="post-pagination">
                        <li>Page</li>
                        <li><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                    </ul>
                </div>-->
                
                
                 
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
<script type="text/javascript" src="js/custom.js"></script>
</body>
</html>