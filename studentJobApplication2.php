<?php
session_start();

if(isset($_SESSION["uid"]))
{
	$username=$_SESSION["uname"];
	$uid=$_SESSION["uid"];
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
<title>Student Job Application</title>
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
<script type="text/javascript">
function check()
{
	
	if(document.getElementById("comapany").value=="")
	{
		document.getElementById("error").style.display='block';
		document.getElementById("error").innerHTML='Please Enter the Company!';
		document.getElementById("comapany").focus();
		return false;
	}
	if(document.getElementById("position").value=="")
	{
		document.getElementById("error").style.display='block';
		document.getElementById("error").innerHTML='Please Enter Position!';
		document.getElementById("position").focus();
		return false;
	}
	if(document.getElementById("resumeName").value=="")
	{
		document.getElementById("error").style.display='block';
		document.getElementById("error").innerHTML='Please Enter the Resume Name!';
		document.getElementById("resumeName").focus();
		return false;
	}
	
	return true;
}


</script>
<?php
include "config.php";
if(isset($_GET['chkbx'])=='resupload')
{
	
	    $sqlset="Select *  from student_register where id='".$uid."'";
		$ses_result2=mysql_query($sqlset);
		$rowcount= mysql_num_rows($ses_result2);	
		$res2=mysql_fetch_array($ses_result2);
		$job_resume=$res2['job_resume'];
		
   if(isset($_GET['upcl'])=="pass")
   {
   $ses_result1=mysql_select_db($dbname) or die(mysql_error());
   $sqlUpdate = "Update student_jobapplication_temp set resume='".$job_resume."' where Uid='".$uid."'";
   $result1=mysql_query($sqlUpdate,$link);
   }
   else
   {
	   $sqlInsert = "insert into student_jobapplication_temp (Uid,resume) values ('$uid','$job_resume')";
	   $result=mysql_query($sqlInsert,$link);
   }
	
}

?>
<?php
       	
		$ses_result=mysql_select_db($dbname) or die(mysql_error());
        $sqlget="Select *  from student_jobapplication_temp where Uid='".$uid."' order by id desc";
		$ses_result=mysql_query($sqlget);
		$rowcount= mysql_num_rows($ses_result);	
		$res=mysql_fetch_array($ses_result);
		$aid=$res['id'];
?>

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
                <h1>Job Application</h1>
                <span style="margin:0px 30px 0px 0px; float:right;">
                <a href="student-inbox.html" class="button red">Inbox</a> 
                <a href="student-profile.php" class="button red">Profile</a> 
                <a href="studentAccount.php" class="button red">Account</a>
                <a href="logout.php" class="button red">Logout</a>
                </span>
            </div>        
        </div>        
                          
    <!-- body -->
    <div id="body-wrapper" class="container_16">
    <div class="clear"></div>
	
		<!-- grid columns -->
		<div class="section">
           
       		<!-- title -->
            <div class="title grid_16"><div class="title"><h4>Review Your Information</h4></div></div>                    
                
          <!-- 4/16 -->                
            <div class="grid_12" style="padding:20px;border-radius:10px; width:400px!important; border:2px #000000 solid;">
             <form action="savejobapply.php" method="post" name="frm" id="frm" onSubmit="return check();">
                <p id="error" style="padding-left:10px; display:none; padding-top:5px;color:#F00; height:0px; font-weight:400; background-color:##CCC;"></p>
               <div>
                <table width="100%" border="0" >
                  <tr height="50">
                    <td width="50%">Company<span style="color:#F00">*</span></td>
                    <td width="50%"><input type="text" size="30"  name="comapany" id="comapany" placeholder="Enter First Company" ></td>
                  </tr>
                  <tr height="50">
                    <td>Position<span style="color:#F00">*</span></td>
                    <td><input type="text" size="30"  name="position" id="position" placeholder="Enter Position" ></td>
                  </tr>
                  <tr height="50">
                    <td>Resume File Name<span style="color:#F00">*</span></td>
                    <td><input type="text" name="resumeName" id="resumeName" size="30" placeholder="Enter Resume File Name" ></td>
                  </tr>
                  <tr height="50">
                    <td>CI File Name </td>
                    <td><input type="text" name="ciName" id="ciName" size="30" placeholder="Enter CI File Name" ></td>
                  </tr>
                </table>
                
                 <input type="hidden" name="aid" id="aid" value="<?php print $aid; ?>">
                  <input type="hidden" name="jobid" id="jobid" value="<?php print $_GET['jbid']; ?>">
              <input type="hidden" name="recid" id="recid" value="<?php print $_GET['reid']; ?>">
                
                </div>
                
            </div>    
             <div class="grid_4">
 
 
  <input type='submit' name="Next" value="Apply" class="button-big red" />
 </div>   
   </form>    
   
   
            
          
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