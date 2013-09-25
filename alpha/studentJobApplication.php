<?php
session_start();

if(isset($_GET["Jobid"]))
{
	$username=$_SESSION["uname"];
	$uid=$_SESSION["uid"];
	$mail_id=$_SESSION["mail_id"];
//header("location:inner.php");
}
else
{
header("location:postedJob.php");
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
<script language="javascript">
function chkresume()
{
  if(document.getElementById('chkbx').checked) 
  {
	  document.getElementById('resume').value="";
	  document.getElementById('resuplo').style.display="none";
  }
   if(document.getElementById('chkbx1').checked) 
  {
	  
	  document.getElementById('resuplo').style.display="block";
   }
}
function Checkfiles()
{
var fup = document.getElementById('resume');
var fileName = fup.value;
var ext = fileName.substring(fileName.lastIndexOf('.') + 1);

var fup1 = document.getElementById('coverletter');
var fileName1 = fup1.value;
var ext1 = fileName1.substring(fileName1.lastIndexOf('.') + 1);
if(document.getElementById('chkbx').checked)
		{
			
			if(document.getElementById('upresume').value=="")
		    {   
			document.getElementById("error").innerHTML='There is no Resume in Your Profile';
	       	 return false;
		     }		
			
		
			 if(fileName1!="")
			{
			if(ext1 != "DOC" && ext1 != "pdf" && ext1 != "PDF" && ext1 != "doc" && ext1 != "docx")
			{
			document.getElementById("error").innerHTML='Please Upload Word or pdf in Covering Letter';
			fup1.focus();
			return false;
			}
			}      
		 }

if(document.getElementById('chkbx1').checked)
{	
if(fileName=="")
{
	document.getElementById("error").innerHTML='Please Upload Resume';
	fup.focus();
	return false;
}

if(ext != "DOC" && ext != "pdf" && ext != "PDF" && ext != "doc" && ext != "docx")
{
document.getElementById("error").innerHTML='Please Upload Word or pdf in Resume';
fup.focus();
return false;
} 
}

if(fileName1!="")
{
if(ext1 != "DOC" && ext1 != "pdf" && ext1 != "PDF" && ext1 != "doc" && ext1 != "docx")
{
document.getElementById("error").innerHTML='Please Upload Word or pdf in Covering Letter';
fup1.focus();
return false;
}
} 
}


/*function goNext()
{
	var jobid=document.getElementById('jobid').value;
	var recid=document.getElementById('recid').value;
	

	if(document.getElementById('stas').value == '1')
	{
		document.getElementById("updtss").style.display="none";
		
		if(document.getElementById('chkbx').checked)
		{
			if(document.getElementById('upresume').value=="")
		    {   
			document.getElementById("error").innerHTML='There is no Resume in Your Profile';
	       	 return false;
		     }
		      window.location="studentJobApplication2.php?chkbx=resupload&upcl=pass&jbid="+jobid+"&reid="+recid;
		 }
		else
		{
			 window.location="studentJobApplication2.php?jbid="+jobid+"&reid="+recid;
		}
		
	}
	else
	{
		if(document.getElementById('chkbx1').checked)
		{
		document.getElementById("error").innerHTML='Please Upload Resume';
	    document.getElementById('resume').focus();
		 return false;
		}
		else if(document.getElementById('upresume').value=="")
		{
			document.getElementById("error").innerHTML='There is no Resume in Your Profile';
	       	 return false;
		}
		else
		{
			window.location="studentJobApplication2.php?chkbx=resupload&jbid="+jobid+"&reid="+recid;
		}
	}
	
}*/
</script>

<?php
		include "config.php"; 			
		
		$ses_result=mysql_select_db($dbname) or die(mysql_error());
					
		$sqlget="Select *  from student_register where id='$uid'";		
		$ses_result=mysql_query($sqlget);
		$rowcount= mysql_num_rows($ses_result);	
		$res=mysql_fetch_array($ses_result);
		$resume=$res["job_resume"];
			
?>
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
            <li><a href="student-homepage.php">Home</a></li>
          </ul>
          <br style="clear: left" />
        </div>
        <!-- end header nav menu--> 
      </div>
    </div>
  </div>
  <!-- end header -->
  <div id="body-background"><!-- this is the main background color of the page -->
    <div id="header-buffer"></div>
    <!-- hack for header overlap **DONT'TOUCH** --> 
    
    <!-- page header -->
    <div id="pageheader-background"><!-- area with alternate background -->
      <div class="pageheader-title">
      <span class="mailno"><?php include "StudentUnreadMail.php"; ?></span>
        <h1>Job Application</h1>
        <span style="margin:0px 30px 0px 0px; float:right;"> 
         <a href="postedJob.php" class="button red">JobApplication</a> 
                <a href="studentInbox.php" class="button red">Inbox</a> 
                <a href="student-profile.php" class="button red">Profile</a> 
                <a href="studentAccount.php" class="button red">Account</a>
                <a href="logout.php" class="button red">Logout</a></span>
         </div>
    </div>
    
    <!-- body -->
    <div id="body-wrapper" class="container_16">
      <div class="clear"></div>
      
      <!-- grid columns -->
      <div class="section"> 
        
        <!-- title -->
        <div class="title grid_16"></div>
        <div id="error" style="padding-left:10px; padding-top:5px; height:30px; color:#F00; font-weight:400; background-color:##CCC;"></div>
       
        <!-- 4/16 -->
        <div class="grid_12"> 
          <!--<div style="margin:0px 30px 40px 0px; float:right;"><a href="student-homepage.html" class="button red">Apply with current upload resume</a></div>-->
          <div>
          <form action="updateresume.php" method="post" onSubmit="return Checkfiles()" enctype="multipart/form-data">
            <p style="float:left; padding:0px; width:400px;">
              <input type="radio" name="chkbx" id="chkbx" value="profileresume" onClick="chkresume();" checked="checked">
              Profile Resume
              <input type="radio" name="chkbx" id="chkbx1" value="upoadres" onClick="chkresume();">
              Upload Current Resume <br/>
            <div id="resuplo" style="display:none"> Upload a new resume specific for this position<br>
              <input name="resume" id="resume" type="file">
              &nbsp;&nbsp;&nbsp;</div>
            <br>
            <br>
            Upload a Cover Letter specific for this position<br>
            <input name="coverletter" id="coverletter" type="file">
            &nbsp;&nbsp;&nbsp; <br>
            <br>
            <input name="" type="submit" value="Apply" class="button red">
            <input name="" type="reset" value="Cancel" class="button red">
             <input type="hidden" name="upresume" id="upresume" value="<?php print $resume; ?>">
            <input type="hidden" name="jobid" id="jobid" value="<?php print $_GET['Jobid']; ?>">
            <input type="hidden" name="recid" id="recid" value="<?php print $_GET['recid']; ?>">
             <input type="hidden" name="jobtitle" id="jobtitle" value="<?php print $_GET['Jobtitle']; ?>">
            <input type="hidden" name="cmpny" id="cmpny" value="<?php print $_GET['Cmpny']; ?>">
            </p>
            </div>
          </form>
        </div>
      </div>
      <!-- end grid columns -->
      
      <div class="clear"></div>
      
      <!-- tabs -->
      <div class="section"></div>
      <!-- end body-wrapper --> 
    </div>
    <!-- end body-background --> 
    
    <!-- footer -->
    <div id="footer-wrapper"></div>
    <!-- end #footer-wrapper -->
    
    <div class="clear"></div>
    
    <!-- copyright -->
    <div id="copyright-wrapper">
      <div id="copyright-content">
        <p class="float-left">Copyright © 2013 <a href="">interngration</a> All rights reserved.</p>
        <p class="float-right"></p>
      </div>
    </div>
  </div>
  <!-- end #wrapper (global page wrapper) --> 
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