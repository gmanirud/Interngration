<?php
session_start();
include "config.php";
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
<!DOCTYPE HTML>
<html lang="en" class="no_js">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Recruiter Posted Job</title>
<!-- Favicon -->
<link rel="shortcut icon" href="favicon.ico" />

<!-- Load Google Fonts -->
<link href='http://fonts.googleapis.com/css?family=Inder' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Ubuntu+Condensed' rel='stylesheet' type='text/css'>

<!--Include Pagination Support Files-->
  <link href="pagination/pagination.css" rel="stylesheet" type="text/css" />
  <link href="pagination/B_grey.css" rel="stylesheet" type="text/css" />
  <!--Include Pagination Support Files-->
  
  

<!-- Load Style Sheets -->
<link rel="stylesheet" type="text/css" href="css/style.css" media="screen" />
<link id="theme" rel="stylesheet" type="text/css" href="css/red.css" media="screen"/>

<!--[if IE 8]><link rel="stylesheet" href="css/ie.css" type="text/css" media="screen"/><![endif]-->
<!--[if IE 7]><link rel="stylesheet" href="css/ie.css" type="text/css" media="screen"/><![endif]-->

<!-- Load Jquery/Modernizr Javascript -->
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script type="text/javascript" src="js/modernizr.js"></script>
<script src="http://cdn.jquerytools.org/1.2.7/full/jquery.tools.min.js"></script>
<?php
include_once ('pagination/function.php');

$page = (int) (!isset($_GET["page"]) ? 1 : $_GET["page"]);
$limit = 6;
$startpoint = ($page * $limit) - $limit;
?>
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
        <h1>Recruiter Posted Job</h1><span style="margin:0px 30px 0px 0px; float:right;">
          <a href="https://login.citrixonline.com/login?service=https%3A%2F%2Fglobal.gotomeeting.com%2Fmeeting%2Fj_spring_cas_security_check" target="_blank" class="button red">Schedule your Webinar</a>                
                <a href="RecruiterUpcomingWebinar.php" class="button red">Scheduled Webinar</a>
                 <a href="RecruiterWatchedWebinar.php" class="button red">Past Webinar</a>
        <a href="recruiterInbox.php" class="button red">Inbox</a>
                <a href="jobPosting.php" class="button red">Job Posting</a>
                <a href="recruiterAccount.php" class="button red">Account</a>
                <a href="logout.php" class="button red">Logout</a>
        </span>
        </div></div>        
                          
     <!-- body -->
    <div id="body-wrapper" class="container_16">
    <div class="clear"></div>
       
		<!-- posts -->
		<div class="section">
                
        <!-- tabs -->
		<div class="section">
				
		 <!-- post 4 -->
         
          <?php
    	 	
		$ses_result=mysql_select_db($dbname) or die(mysql_error());
					
		$sql1="Select *  from recruiter_jopposting where recruiter_id='".$ruid."' ORDER BY id Desc";
		//print $sql1;
		$sqlget=$sql1." LIMIT {$startpoint} , {$limit}";
		$ses_result=mysql_query($sqlget);
		$rowcount= mysql_num_rows($ses_result);	
		if($rowcount=="0")
		{
			?>
<table width="1000px" height="300px" border="0">
  <tr>
    <td align="center" style="font-weight:bolder">Still Job Not Posted</td>
  </tr>
</table>

<?php			
		}
		else
		{
		 $j=$startpoint+1;
		while($res=mysql_fetch_array($ses_result))
		{
			$Job_title=$res["Job_title"];
			$Job_id=$res["Job_id"];
			$Job_Dept=$res["Job_Dept"];
			$Job_Detail=$res["Job_Detail"];
			$Date_Post=$res["Date_Post"];
			$Dead_line=$res["Dead_line"];			
			$recruiter_id=$res["recruiter_id"];	
			$Company_Name=$res["Company_Name"];		
?>
       <div class="job-posted" style="width:450px;">     
		<div class="titl">
        <h4><?php print $Job_title; ?></h4>
       <table width="400" border="0" cellpadding="10px;">
         <tr>
    <td width="70">Company </td>
    <td width="5">:</td>
    <td width="200"><?php print $Company_Name; ?></td>
  </tr>
  <tr>
    <td>Job Id</td>
    <td>:</td>
    <td><?php print $Job_id; ?></td>
  </tr>
  <tr>
    <td>Department</td>
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
		 
		?>
        
        				
		</div><!-- pagination -->
                <div class="sectionnav">
                
                <?php
				 echo pagination($sql1,$limit,$page); 
		}
				 ?>
                   <!-- <ul class="post-pagination">
                        <li>Page</li>
                        <li><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                    </ul>-->
               
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