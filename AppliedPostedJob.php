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
                 <a href="StudentRegisteredWebinar.php" class="button red">Upcoming Webinars</a>
                 <a href="StudentWatchedWebinar.php" class="button red">Watched Webinar</a>       
                 <a href="postedJob.php" class="button red">Job Application</a>
                 <a href="AppliedPostedJob.php" class="button red">Applied Job</a>  
                 <a href="studentInbox.php" class="button red">Inbox</a> 
                 <a href="student-profile.php" class="button red">Profile</a></span> 
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
			print "You haven't applied for any jobs!";
			
		}
		else
		{
		while($res=mysql_fetch_array($ses_result))
		{
			$JobId=$res["JobId"];
			$RecuId=$res["RecuId"];
			
			$sqlrecjob="Select *  from recruiter_jopposting where id='".$JobId."' AND recruiter_id='".$RecuId."'";
			$ses_result1=mysql_query($sqlrecjob);
			$res1=mysql_fetch_array($ses_result1);
			$rowcount1= mysql_num_rows($ses_result1);		
			
			
			$Job_title=$res1["Job_title"];
			$Job_id=$res1["Job_id"];
			$Job_Dept=$res1["Job_Dept"];
			$Job_Detail=$res1["Job_Detail"];
			$Date_Post=$res1["Date_Post"];
			$Dead_line=$res1["Dead_line"];			
			$recruiter_id=$res1["recruiter_id"];	
			$Company_Name=$res1["Company_Name"];
			if($rowcount1!='0')		
			{
?>
		 <!-- post 4 -->
       <div class="job-post">     
		<div class="titl">
       
        <h4><?php print $Job_title; ?></h4>
       <table width="450" border="0" cellpadding="10px;">
         <tr>
    <td width="70">Company Name</td>
    <td width="5">:</td>
    <td width="200"><?php print $Company_Name; ?></td>
  </tr>
  <tr>
    <td>Job Id</td>
    <td>:</td>
    <td><?php print $Job_id; ?></td>
  </tr>
  <tr>
    <td>Job Department</td>
    <td>:</td>
    <td><?php print $Job_Dept; ?></td>
  </tr>
  <tr height="10px;" valign="top">
    <td>Job Detail</td>
    <td>:</td>
    <td style="Serif;overflow:auto;" align="justify" ><?php print $Job_Detail; ?></td>
  </tr>
  <tr>
    <td>Date Posted</td>
    <td>:</td>
    <td><?php print $Date_Post; ?></td>
  </tr>
  <tr>
    <td>Dead Line</td>
    <td>:</td>
    <td><?php print $Dead_line; ?></td>
  </tr>
 
</table>
		</div>
		 </div>
		
		<?php
			}
			else
			{
				print "No Records Found";
			}
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
