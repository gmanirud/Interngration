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
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Resume Filter</title>
</head>
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

   <?php
      if(isset($_GET['jobid']))
	  {
		$jbid=$_GET['jobid'];  
	  }
	   if(isset($_POST['jobid']))
	  {
		$jbid=$_POST['jobid'];  
	  }
	  ?>

    <!-- header -->
    <div class="fixposition">
    <div id="header-wrapper">
    <div id="header-content">
        <div id="logo"><a href="index.html"><img src="images/logo.png" alt="interngration" width="400" height="64" /></a></div>
         <!-- header nav menu -->        
        <div id="menu" class="menu"> 
               <ul>
               <li><a href="">Welcome&nbsp; :&nbsp; <?php print $username; ?></a></li>
               <li><a href="recruiter-home-page.php">Home</a></li></ul>
               </ul>
                <br style="clear: left" />
        </div>
        <!-- end header nav menu-->
</div></div></div>
    <!-- end header -->     
    
    <div id="body-background"><!-- this is the main background color of the page -->
    <div id="header-buffer"></div><!-- hack for header overlap **DONT'TOUCH** -->
    
    
        <!-- page header -->
        <div id="pageheader-background"><!-- area with alternate background -->
            <div class="pageheader-title">
            <span class="mailno"><?php include "RecruiterUnreadMail.php"; ?></span>
                <h1>Resume Filter</h1>
                <span style="margin:0px 30px 10px 0px; float:right;">
                <a href="resumesReceived.php" class="button red" title="Back to Resume Received">Back</a>
                <a href="recruiterInbox.php" class="button red" title="Inbox">Inbox</a>
                <a href="jobPosting.php" class="button red" title="Job Posting">Job Posting</a>
                <a href="recruiterAccount.php" class="button red" title="Account">Account</a>
                <a href="logout.php" class="button red" title="Logout">Logout</a></span>
            </div>        
        </div>        
            
                   
    <!-- body -->
    <div id="body-wrapper" class="container_16">
    <div class="clear"></div>
   
   	<!-- grid columns -->
		<div class="section">
           
       		<!-- title -->               

            <!-- 8/16 -->
 <form method="post" action="resumeFilter.php">
			 <div class="grid_17">
            
            	<table width="280" border="0" height="160" style="margin:20px; border:1px solid #666666; padding:10px; float:left;">
  <tr><th scope="col"></th></tr>
  <tr><td>
<input type="checkbox" name="University1" id="University1" <?php  if(isset($_POST["University1"])) { ?> checked="checked" <?php } ?> value="University of toronto">University of toronto<br>
<input type="checkbox" name="University2" id="University2" <?php  if(isset($_POST["University2"])) { ?> checked="checked" <?php } ?> value="University of Waterloo">University of Waterloo<br>
<input type="checkbox" name="University3" id="University3" <?php  if(isset($_POST["University3"])) { ?> checked="checked" <?php } ?> value="Ryerson University">Ryerson University<br>
<input type="checkbox" name="University4" id="University4" <?php  if(isset($_POST["University4"])) { ?> checked="checked" <?php } ?> value="York University">York University<br>
 </td></tr>
</table>

<table width="280" border="0" height="160" style="margin:20px 0px; border:1px solid #666666; padding:10px; float:left;">
  <tr><th scope="col">Program</th></tr>
  <tr><td>
<input type="checkbox" name="Program1" id="Program1" <?php  if(isset($_POST["Program1"])) { ?> checked="checked" <?php } ?> value="Electrical Engineering">Electrical Engineering<br>
<input type="checkbox" name="Program2" id="Program2" <?php  if(isset($_POST["Program2"])) { ?> checked="checked" <?php } ?> value="Computer Engineering">Computer Engineering<br>
<input type="checkbox" name="Program3" id="Program3" <?php  if(isset($_POST["Program3"])) { ?> checked="checked" <?php } ?> value="Chemical Engineering">Chemical Engineering<br>
<input type="checkbox" name="Program4" id="Program4" <?php  if(isset($_POST["Program4"])) { ?> checked="checked" <?php } ?> value="Civil Engineering">Civil Engineering<br>
</td></tr>
</table>

<table width="280" border="0" height="160" style="margin:20px 20px; border:1px solid #666666; padding:10px; float:left;">
  <tr><th scope="col">Year of Study:</th></tr>
  <tr><td>
<input type="checkbox" name="Position1" id="Position1" <?php  if(isset($_POST["Position1"])) { ?> checked="checked" <?php } ?> value="1st Year">1st Year<br>
<input type="checkbox" name="Position2" id="Position2" <?php  if(isset($_POST["Position2"])) { ?> checked="checked" <?php } ?> value="2nd Year">2nd Year<br>
<input type="checkbox" name="Position3" id="Position3" <?php  if(isset($_POST["Position3"])) { ?> checked="checked" <?php } ?> value="3rd Year">3rd Year<br>
<input type="checkbox" name="Position4" id="Position4" <?php  if(isset($_POST["Position4"])) { ?> checked="checked" <?php } ?> value="4th Year">4th Year<br>
 </td></tr>
</table>

<table width="280" border="0" height="160" style="margin:20px; border:1px solid #666666; padding:10px; float:left;">
  <tr><th>Technical Skills</th></tr>
  <tr><td>
<input type="checkbox" name="Technical1" id="Technical1" <?php  if(isset($_POST["Technical1"])) { ?> checked="checked" <?php } ?> value="C++">C++<br>
<input type="checkbox" name="Technical2" id="Technical2" <?php  if(isset($_POST["Technical2"])) { ?> checked="checked" <?php } ?> value="PHP">PHP<br>
<input type="checkbox" name="Technical3" id="Technical3" <?php  if(isset($_POST["Technical3"])) { ?> checked="checked" <?php } ?> value="Apps Development">Apps Development<br>
</td><td>
<input type="checkbox" name="Technical4" id="Technical4" <?php  if(isset($_POST["Technical4"])) { ?> checked="checked" <?php } ?> value="SQL">SQL<br>
<input type="checkbox" name="Technical5" id="Technical5" <?php  if(isset($_POST["Technical5"])) { ?> checked="checked" <?php } ?> value="Java">Java<br>
<input type="checkbox" name="Technical6" id="Technical6" <?php  if(isset($_POST["Technical6"])) { ?> checked="checked" <?php } ?> value="Python">Python<br>
 </td></tr>
</table>

<table width="280" border="0" height="160" style="margin:20px 0px; border:1px solid #666666; padding:10px; float:left;">
  <tr><th scope="col">Position for</th></tr>
  <tr><td>
<input type="checkbox" name="Positing1" id="Positing1" <?php  if(isset($_POST["Positing1"])) { ?> checked="checked" <?php } ?> value="PEY">PEY<br>
<input type="checkbox" name="Positing2" id="Positing2" <?php  if(isset($_POST["Positing2"])) { ?> checked="checked" <?php } ?> value="New Grad">New Grad<br>
<input type="checkbox" name="Positing3" id="Positing3" <?php  if(isset($_POST["Positing3"])) { ?> checked="checked" <?php } ?> value="Internship">Internship<br>
<input type="checkbox" name="Positing4" id="Positing4" <?php  if(isset($_POST["Positing4"])) { ?> checked="checked" <?php } ?> value="All">All<br>
 </td></tr>
</table>

<table width="280" border="0" height="160" style="margin:20px 20px; border:1px solid #666666; padding:10px; float:left;">
  <tr><th scope="col">Language Preference</th></tr>
  <tr><td>
<input type="checkbox" name="Preference1" id="Preference1" <?php  if(isset($_POST["Preference1"])) { ?> checked="checked" <?php } ?> value="English">English<br>
<input type="checkbox" name="Preference2" id="Preference2" <?php  if(isset($_POST["Preference2"])) { ?> checked="checked" <?php } ?> value="Canadian French">Canadian French<br>
<input type="checkbox" name="Preference3" id="Preference3" <?php  if(isset($_POST["Preference3"])) { ?> checked="checked" <?php } ?> value="Both">Both<br>
 </td></tr>
</table>
<input type="hidden" name="jobid" id="jobid" value="<?php print $jbid; ?>" />
</div>
			
			 <div class="" style="float:right; width:600px;">
                <span style="margin:10px 0px 30px 0px; float:right;">
                <input type="submit" class="button red" value="Search">
               <!-- <a href="recruiter-home-page.html" class="button red">Apply</a>--></span>
				
			      
        </div>
        
        <?php
		
		?>
        </form>
   <!-- end grid columns -->
  
   
    <div class="grid_17">
     <?php

		$uid=$_SESSION['ruid'];
		
		include "config.php"; 	
		$ses_result=mysql_select_db($dbname) or die(mysql_error());
					
		$sqlget="Select *  from student_jobapplication where RecuId='$uid' AND JobId='".$jbid."'";
		//print $sqlget;
		$ses_result=mysql_query($sqlget);
		$rowcount= mysql_num_rows($ses_result);	
					
		
			while($res=mysql_fetch_array($ses_result))
			{
			
			$resume=$res["resume"];
			$coveringLetter=$res["coveringLetter"];
			$JobId=$res["JobId"];
			$stuId=$res["stuId"];
			$sqlget1="Select *  from student_register where id='$stuId'";
			if(isset($_POST["University1"])||isset($_POST["University2"])||isset($_POST["University3"])||isset($_POST["University4"]))
			{
				$sqlget1=$sqlget1." AND (";
				
				if(isset($_POST["University1"]))
				{
					$sqlget1=$sqlget1." schoolName='University of toronto' ";
				}
				if(isset($_POST["University2"]))
				{
					if(isset($_POST["University1"]))
					{
						$sqlget1=$sqlget1." OR";
					}
					$sqlget1=$sqlget1." schoolName='University of Waterloo' ";
				}
				if(isset($_POST["University3"]))
				{
					if(isset($_POST["University1"]) || isset($_POST["University2"]))
					{
						$sqlget1=$sqlget1." OR";
					}
					$sqlget1=$sqlget1." schoolName='Ryerson University' ";
				}
				if(isset($_POST["University4"]))
				{
					if(isset($_POST["University1"]) || isset($_POST["University2"]) || isset($_POST["University3"]))
					{
						$sqlget1=$sqlget1." AND";
					}
					$sqlget1=$sqlget1." schoolName='York University' ";
				}
				$sqlget1=$sqlget1." )";
				
			}
				
				
				
				
				if(isset($_POST["Program1"])||isset($_POST["Program2"])||isset($_POST["Program3"])||isset($_POST["Program4"]))
			{
				$sqlget1=$sqlget1." AND (";
				
				if(isset($_POST["Program1"]))
				{
					$sqlget1=$sqlget1." Program='Electrical Engineering' ";
				}
				if(isset($_POST["Program2"]))
				{
					if(isset($_POST["Program1"]))
					{
						$sqlget1=$sqlget1." OR";
					}
					$sqlget1=$sqlget1." Program='Computer Engineering' ";
				}
				if(isset($_POST["Program3"]))
				{
					if(isset($_POST["Program1"]) || isset($_POST["Program2"]))
					{
						$sqlget1=$sqlget1." OR";
					}
					$sqlget1=$sqlget1." Program='Chemical Engineering' ";
				}
				if(isset($_POST["Program4"]))
				{
					if(isset($_POST["Program1"]) || isset($_POST["Program2"]) || isset($_POST["Program3"]))
					{
						$sqlget1=$sqlget1." AND";
					}
					$sqlget1=$sqlget1." Program='Civil Engineering' ";
				}
				
				$sqlget1=$sqlget1." )";
				
			}		
			
			
			
			if(isset($_POST["Position1"])||isset($_POST["Position2"])||isset($_POST["Position3"])||isset($_POST["Position4"]))
			{
				$sqlget1=$sqlget1." AND (";
				
				if(isset($_POST["Position1"]))
				{
					$sqlget1=$sqlget1." univ_Year='1st Year' ";
				}
				if(isset($_POST["Position2"]))
				{
					if(isset($_POST["Position1"]))
					{
						$sqlget1=$sqlget1." OR";
					}
					$sqlget1=$sqlget1." univ_Year='2nd Year' ";
				}
				if(isset($_POST["Position3"]))
				{
					if(isset($_POST["Position1"]) || isset($_POST["Position2"]))
					{
						$sqlget1=$sqlget1." OR";
					}
					$sqlget1=$sqlget1." univ_Year='3rd Year' ";
				}
				if(isset($_POST["Position4"]))
				{
					if(isset($_POST["Position1"]) || isset($_POST["Position2"]) || isset($_POST["Position3"]))
					{
						$sqlget1=$sqlget1." AND";
					}
					$sqlget1=$sqlget1." univ_Year='4th Year' ";
				}
				
				$sqlget1=$sqlget1." )";
				
			}	
			
			if(isset($_POST["Technical1"]) || isset($_POST["Technical2"]) || isset($_POST["Technical3"]) || isset($_POST["Technical4"]) || isset($_POST["Technical5"]) || isset($_POST["Technical6"]))
			{
				
				$sqlget1=$sqlget1." AND (";
			
				if(isset($_POST["Technical1"]))
				{
					$sqlget1=$sqlget1." skill_set LIKE '%C++%' ";
				 }
				if(isset($_POST["Technical2"]))
				{
					if(isset($_POST["Technical1"]))
					{
				        $sqlget1=$sqlget1." AND";
					}
					$sqlget1=$sqlget1." skill_set LIKE '%PHP%' ";
				}
				if(isset($_POST["Technical3"]))
				{
					if(isset($_POST["Technical1"]) || isset($_POST["Technical2"]))
					{
					         $sqlget1=$sqlget1." AND";
					}
					$sqlget1=$sqlget1." skill_set LIKE '%Apps Development%' ";
				  
				}
				if(isset($_POST["Technical4"]))
				{
					if(isset($_POST["Technical1"]) || isset($_POST["Technical2"]) || isset($_POST["Technical3"]))
					{
						$sqlget1=$sqlget1." AND";
					}
					$sqlget1=$sqlget1." skill_set LIKE '%SQL%' ";
				}
				if(isset($_POST["Technical5"]))
				{
					if(isset($_POST["Technical1"]) || isset($_POST["Technical2"]) || isset($_POST["Technical3"]) || isset($_POST["Technical4"]))
					{
						$sqlget1=$sqlget1." AND";
					}
					$sqlget1=$sqlget1." skill_set LIKE '%Java%' ";				  
				}
				if(isset($_POST["Technical6"]))
				{
					if(isset($_POST["Technical1"]) || isset($_POST["Technical2"]) || isset($_POST["Technical3"]) || isset($_POST["Technical4"]) || isset($_POST["Technical5"]))
					{
						$sqlget1=$sqlget1." AND";
					}
					$sqlget1=$sqlget1." skill_set LIKE '%Python%' ";	
				}

				$sqlget1=$sqlget1." )";
				
			}
			
			if(isset($_POST["Positing1"]) || isset($_POST["Positing2"]) || isset($_POST["Positing3"]) || isset($_POST["Positing4"]) )
			{
				$sqlget1=$sqlget1." AND (";
				
				if(isset($_POST["Positing1"]))
				{
					$sqlget1=$sqlget1." position_for LIKE '%PEY%' ";
				}
				if(isset($_POST["Positing2"]))
				{
					if(isset($_POST["Positing1"]))
					{
				        $sqlget1=$sqlget1." AND";
					}
					$sqlget1=$sqlget1." position_for LIKE '%New Grad%' ";
				}
				if(isset($_POST["Positing3"]))
				{
					if(isset($_POST["Positing1"]) || isset($_POST["Positing2"]))
					{
				        $sqlget1=$sqlget1." AND";
					}
					$sqlget1=$sqlget1." position_for LIKE '%Internship%' ";				 
				}
				if(isset($_POST["Positing4"]))
				{
					if(isset($_POST["Positing1"]) || isset($_POST["Positing1"]) || isset($_POST["Positing3"]))
					{
				        $sqlget1=$sqlget1." AND";
					}
					$sqlget1=$sqlget1." position_for LIKE '%All%' ";
				}
				
				$sqlget1=$sqlget1." )";				
			}
			
			
			if(isset($_POST["Preference1"]) || isset($_POST["Preference2"]) || isset($_POST["Preference3"]))
			{
				$sqlget1=$sqlget1." AND (";
				
				if(isset($_POST["Preference1"]))
				{
					$sqlget1=$sqlget1." language_pref LIKE '%English%' ";				  
				}
				if(isset($_POST["Preference2"]))
				{
					if(isset($_POST["Preference1"]))
					{
				        $sqlget1=$sqlget1." AND";
					}
					$sqlget1=$sqlget1." language_pref LIKE '%Canadian French%' ";				 
				}
				if(isset($_POST["Preference3"]))
				{
					if(isset($_POST["Preference1"]) || isset($_POST["Preference2"]))
					{
				        $sqlget1=$sqlget1." AND";
					}
					$sqlget1=$sqlget1." language_pref LIKE '%Both%' ";	
				 
				}
				$sqlget1=$sqlget1." )";	
				
			}
			
			
			
			
				
			//print $sqlget1;
			$ses_result1=mysql_query($sqlget1);
    		$noOfApplier= mysql_num_rows($ses_result1);
			$res1=mysql_fetch_array($ses_result1);	
			if($noOfApplier!='0')
			{
			
			$FirstName=$res1["FirstName"];
			$schoolName=$res1["schoolName"];
			$univ_Year=$res1["univ_Year"];
			$Program=$res1["Program"];
			$Profile_Image=$res1["Profile_Image"];		
			
			
			$sqlget3="Select Email  from student_register where id='".$stuId."'";
			
			$ses_result3=mysql_query($sqlget3);
			$res3=mysql_fetch_array($ses_result3);
			$mailIds=$res3['Email'];		

 
  ?>
	
	 <table width="400" border="0" style="margin:20px 30px 10px; border:1px solid #666666; padding:5px;float: left;">
     
             <tr><td><img src="uploads/StudentImage/<?php print $Profile_Image; ?>" width="75" height="75" /></td>
    		  <td><b><?php print $FirstName; ?></b><br/>
			  <?php print $schoolName; ?><br/>
              <?php print $Program; ?><br/>
              <?php print $univ_Year; ?></td>
			 <td>
             <a href="uploads/Resume/<?php print $resume; ?>" title="Resume" target="_blank">See Resume</a><br/>
             <a href="studentprofileiewforrecruiter.php?stdmail=<?php print $mailIds; ?>&jbids=<?php print $jbid; ?>" title="Watch Student Profile"> View Profile</a>
             </td>
    </tr>
</table>
<?php
			}
			
}
if(isset($noOfApplier)=='0')
			{
			   print "No Records Found";	
			}
?>

 <!--<table width="400" border="0" style="margin:20px 30px 10px; border:1px solid #666666; padding:5px; float:left;">
             <tr><td><img src="images/avatar.png" /></td>
    		  <td><b>Name</b><br/>
			  University of toronto<br/>
              Electrical Engineering<br/>
              Full time</td>
			  
			 <td><a href="">See Resume</a></td>
    
  </tr>
</table>

<table width="400" border="0" style="margin:20px 30px 10px; border:1px solid #666666; padding:5px; float:left;">
             <tr><td><img src="images/avatar.png" /></td>
    		  <td><b>Name</b><br/>
			  University of toronto<br/>
              Electrical Engineering<br/>
              Full time</td>
			  
			 <td><a href="">See Resume</a></td>
    
  </tr>
</table>

<table width="400" border="0" style="margin:20px 30px 10px; border:1px solid #666666; padding:5px; float:left;">
             <tr><td><img src="images/avatar.png" /></td>
    		  <td><b>Name</b><br/>
			  University of toronto<br/>
              Electrical Engineering<br/>
              Full time</td>
			  
			 <td><a href="">See Resume</a></td>
    
  </tr>
</table>-->
   
</div>

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
<script type="text/javascript" src="js/twitter.js"></script>
  
</body>
</html>