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
<title>Recruiter Profile - Interngration</title>
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


<!--  Light Box -->

<script type="text/javascript" src="js/jquery-1.8.2.min.js"></script>
<script type="text/javascript" src="js/jquery.fancybox.js?v=2.1.3"></script>
<link rel="stylesheet" type="text/css" href="css/fancybox/jquery.fancybox.css?v=2.1.2" media="screen" />
<script type="text/javascript">
		$(document).ready(function() 
		{
			$('.fancybox').fancybox();
			

		});
	</script>
	<style type="text/css">
		.fancybox-custom .fancybox-skin {
			box-shadow: 0 0 50px #222;
			height:1000px;
			
			
		}
	</style>
    
 <!-- Light box -->
 
 
 
 


<?php
if(isset($_SESSION['ruid']))
{
		$uid=$_SESSION['ruid'];
		
		include "config.php"; 	
		$ses_result=mysql_select_db($dbname) or die(mysql_error());
					
		$sqlget="Select *  from recruiter_register where id='$uid'";
		//print $sqlget;
		$ses_result=mysql_query($sqlget);
		$rowcount= mysql_num_rows($ses_result);	
					
		if ($rowcount>0)
		{
			$res=mysql_fetch_array($ses_result);
			$rid=$res["id"];
			$companyName=$res["companyName"];
			$hrLead=$res["hrLead"];
			$Email=$res["Email"];
			$AboutMe=$res["AboutMe"];
			$companyName1=$res["companyName"];
			$hrLead1=$res["hrLead"];
			$Contact1=$res["Contact"];
			$AboutMe1=$res["AboutMe"];
			$Profile_Image=$res["Profile_Image"];
			
			if(($companyName=="")&&($hrLead=="")&&($Contact==""))
			{
				$companyName="Enter Company Name";
			    $hrLead="Enter HR lead Name";
				$companyName1="";
			    $hrLead1="";
			    $Contact1="";
			}
			if($AboutMe=="")
			{
			    $AboutMe="Hello Recruiter, please enter full information about yourself.";
				$AboutMe1="";
			}
		}
		else
		{
			$companyName="";
			$hrLead="";
			$Contact="";
			$AboutMe="";
			$hrLead1="";
			$Contact1="";
			$AboutMe="";
			$AboutMe1="";
			$Profile_Image="";
		}


}				
?>


<!--  Citrix Authendication -->
<?php
include "citrix.php";

$citrix = new Citrix('2a3328f6717227aa1262eb368d013a47');
$organizer_key = $citrix->get_organizer_key();
//$organizer_key="1866916119511197701";
//$citrix->pr($organizer_key);

if(!$organizer_key)
{
	$url = $citrix->auth_citrixonline();
	echo "<script type='text/javascript'>top.location.href = '$url';</script>";
	exit;
}
?>

<!-- Citrix Acuthendication -->






<!-- Load Jquery/Modernizr Javascript -->
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script type="text/javascript" src="js/modernizr.js"></script>


<script>
function editrecruiterabout()
{
	  
	  
	  document.getElementById('about_edit').style.display="none";
	  document.getElementById('about_update').style.display="block";
	  document.getElementById('para_aboutme').style.display="none";
	  document.getElementById('aboutme').style.display="block";	  
	  document.getElementById('aboutme').focus();  
 
}


function updaterecruiterabout()
{
	var uid=document.getElementById('hdn_uid').value;
	
	var abtme=document.getElementById('aboutme').value;
	var upTable="maintable";
	
	if(document.getElementById("aboutme").value=="")
	{
		document.getElementById("error1").style.display='block';
		document.getElementById("error1").innerHTML='Please Enter About Your Self!';
		document.getElementById("aboutme").focus();
		return false;
	}
	document.getElementById("error1").style.display='none';
	
if (window.XMLHttpRequest)
  {
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
	if (xmlhttp.readyState==1 || xmlhttp.readyState==2 || xmlhttp.readyState==3)
    {
   //document.getElementById("upd").innerHTML="<img src='ïmages/fbloading.gif'>" ;
	
	
    }
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
			  var aboutme=xmlhttp.responseText;;
			  
			  document.getElementById('about_edit').style.display="block";
			  document.getElementById('about_update').style.display="none";
			  document.getElementById('para_aboutme').style.display="block";
			  document.getElementById('para_aboutme').innerHTML=aboutme;			 
	          document.getElementById('aboutme').style.display="none";	 
		       	
    }
  }

xmlhttp.open("GET","ajaxpage/ajaxRecruiterabout.php?uid="+uid+"&abtme="+abtme+"&upTable="+upTable,true);
xmlhttp.send();
}


function editrecruiterprofile()
{
	  document.getElementById('edt1').style.display="none";
	  document.getElementById('upd1').style.display="block";
	  document.getElementById('divupdate').style.display="none";
	  document.getElementById('divedit').style.display="block";	 	  
	  document.getElementById('txtcompany').focus(); 
}



function updaterecruiterprofile()
{
	
	
	var prf_uId=document.getElementById('hdn_uid').value;
	var txtcompany=document.getElementById('txtcompany').value;
	var txthr=document.getElementById('txthr').value;
	var upTable="maintable";
	
	if(document.getElementById("txtcompany").value=="")
	{
		document.getElementById("error2").style.display='block';
		document.getElementById("error2").innerHTML='Please Enter the Company!';
		document.getElementById("txtcompany").focus();
		return false;
	}
	if(document.getElementById("txthr").value=="")
	{
		document.getElementById("error2").style.display='block';
		document.getElementById("error2").innerHTML='Please Enter HR Lead!';
		document.getElementById("txthr").focus();
		return false;
	}
	
	
	
if (window.XMLHttpRequest)
  {
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
	if (xmlhttp.readyState==1 || xmlhttp.readyState==2 || xmlhttp.readyState==3)
    {
  
	
    }
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
	  var res=xmlhttp.responseText;		     
	  document.getElementById('edt1').style.display="block";
	  document.getElementById('upd1').style.display="none";
	  document.getElementById('divupdate').style.display="block";
	  document.getElementById('divedit').style.display="none";
	  document.getElementById('divupdate').innerHTML=res;	 	  
	    
	
    }
  }

xmlhttp.open("GET","ajaxpage/ajaxRecruiterProfile.php?puId="+prf_uId+"&company="+txtcompany+"&hr="+txthr+"&upTable="+upTable,true);
xmlhttp.send();
}


function chkimgvalidation()
{
	var fup = document.getElementById('txtFile');
	var fileName = fup.value;
	
	var ext = fileName.substring(fileName.lastIndexOf('.') + 1);
	
	if(ext == "gif" || ext == "GIF" || ext == "JPEG" || ext == "jpeg" || ext == "jpg" || ext == "JPG" || ext == "doc")
    {
        document.getElementById("error5").style.display='block';
		document.getElementById('frmProfile').submit();
	}
	else
	{
	    document.getElementById("error5").style.display='block';
		document.getElementById("error5").innerHTML='Please Upload the image file';
		document.getElementById("txtFile").focus();
		return false;	
	}
	
	
}
</script>





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
               <li><a href="">Welcome:&nbsp; <?php print $username; ?></a></li>
               <li><a href="recruiter-home-page.php">Home</a></li>
               <li><a href="logout.php">Logout</a></span></li>
               <li><a href="recruiterAccount.php">Account</a></li>
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
                <h1>Recruiter Home</h1><span style="margin:0px 30px 10px 0px; float:right;">
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


		<!-- grid columns -->
		<div class="section">
           
       		<!-- title -->
         <!-- <div class="title"><h4>Name</h4></div>    -->              

            <!-- 8/16 -->
            <div class="grid_8" style="">
         <form id="frmProfile"  enctype="multipart/form-data" action="updateRecruiterImage.php" method="post">
          <table width="435" style="margin:10px; height:270px; border:1px solid; border-color:#CCC; padding:10px;">
            <tr>
              <td valign="top">
            
                  <div style="float:left;">
                   
                      <input type="button" value="Edit" onClick="editrecruiterprofile()" name="edt1" id="edt1" style="width:60px; cursor:pointer"/>
                      <input type="button" style="display:none; width:60px; cursor:pointer" value="Update" onClick="updaterecruiterprofile()" name="upd1" id="upd1" />
                   
                  </div>
                 
                </td>
              <td rowspan="2" align="right" valign="top">
              <div style="float:right;">
              <label class="file-upload"> 
                 <input type='file' id="txtFile" name="txtFile" onChange="chkimgvalidation();"/>
                 <?php
				 if($Profile_Image!="")
				 {
					
					 ?>
    			 <img src="uploads/Recruiter/<?php print $Profile_Image ?>" height="180" width="180"/>
                 <?php
				 }
				 ?>
                </label>
                <input type="hidden" name="hdn_uid" id="hdn_uid" value="<?php print $uid; ?>">
               
                
                </div>
                <?php
				
				if($Profile_Image!="")
				{
				?>
                <a href="removeRecruiterImage.php?rid=<?php print $rid; ?>"> Remove Image </a>
                <?php
				}
				?>
                
                    <div style="color:#F00; font-weight:400; padding-top:2px; display:none;" id="error5"></div>
                </td>
            </tr>
            <tr>
              <td valign="top">
               <div style="float:left;" id="divupdate"> <br/>
                    <li>Company Name: <?php print $companyName; ?></li>
                    <li>HR lead: <?php print $hrLead; ?></li>
                    <li>Contact: <?php print $Email; ?></li>
                  </div>
               
              <div style="float:left; display:none" id="divedit">
                  <input type="text" id="txtcompany" name="txtcompany" maxlength="100" placeholder="Company Name" style="width:190px;" value="<?php print $companyName1; ?>"/>
                  <br/>
                  <input type="text" id="txthr" name="txthr" placeholder="HR lead" maxlength="100" style="width:190px;" value="<?php print $hrLead1; ?>"/>
                  <br/>
                  Contact: <?php print $Email; ?>
               
                  <br/>
                   <div style="float:left;color:#F00; font-weight:400; padding-top:50px; display:none" id="error2"></div>
                  <br/>
                </div></td>
            </tr>
          </table>
           </form>
        </div>  
		                     
            <div class="grid_8" style="">
          <div>
            <div style="float:left;">
              <h4 style="margin:20px;">About Me</h4>
            </div>
            <div style="float:right; padding-right:20px; padding-top:10px;">
              <input type="button" value="Edit" onClick="editrecruiterabout()" name="about_edit" id="about_edit" style="width:60px; cursor:pointer">
              <input type="button" value="Update" onClick="updaterecruiterabout()" style="display:none; width:60px; cursor:pointer" name="about_update" id="about_update" >
            </div>
          </div>
          <div style="float:left;color:#F00; font-weight:400; padding-top:50px; display:none" id="error1"></div>
          <div>&nbsp;</div>
          <div>&nbsp;</div>
          <div>&nbsp;</div>
        
          <p align="justify" style="padding:10px; border:1px solid;border-color:#CCCCCC; margin:20px;width:400px; height:180px;overflow:auto;" id="para_aboutme">
          <?php print $AboutMe; ?>
          </p>
          
         
         
          <textarea id="aboutme" placeholder="Enter About Me"  name="aboutme" style="width:400px; height:180px;margin:20px;display:none" ><?php print $AboutMe1; ?></textarea>
        </div>
			
			 <div class="grid_8" style="">
            	<h4 style="margin:20px;">My Webinars - DOES NOT LINK TO WEBINAR FIXME</h4>
                <table width="420" border="1" height="160" style="margin:20px; border:1px solid #666666; padding:10px;">
  <tr>
    <th scope="col">Session</th>
    <th scope="col">Status</th>
  </tr>
  <tr>
    <td>Started</td>
    <td>Q & A open</td>
  </tr>
  <tr>
    <td>Started</td>
   <td>Q & A open - Expect Resume</td>
  </tr>
   <tr>
    <td>Cuming in 3 days</td>
    <td>Not yet started</td>
  </tr>
</table></div>
			
			 <div class="grid_8" style="">
            	<h4 style="margin:20px;">Resume Tracking</h4>
                <p style="margin:20px; border:1px solid #666666; padding:10px; height:140px;width:395px;border:1px solid #ccc;Serif;overflow:auto;">
                <?php /*?><?php
		include "config.php"; 	
		$ses_result=mysql_select_db($dbname) or die(mysql_error());
					
		$sqlget="Select *  from student_jobapplication where RecuId='".$ruid."' order by id desc";
		$ses_result=mysql_query($sqlget);
     	while($res=mysql_fetch_array($ses_result))
		{
		   $stid=$res['id'];
			?>
                <a class="fancybox fancybox.iframe" href="viewJobProfile.php?stid=<?php print $stid; ?>">Resume Received</a><br />
                <?php
		}
		?><?php */?>
         <a href="resumesReceived.php" title="Student Resume">My Received Resumes</a>
             </p> 
			 </div>
	
   <!-- end grid columns -->

    <div class="clear"></div> 
    </div><!-- end body-wrapper -->
    </div><!-- end body-background -->

 <!-- footer -->
    <div id="footer-wrapper"></div><!-- end #footer-wrapper -->

<div class="clear"></div>

    <!-- copyright -->
    <div id="copyright-wrapper">
        <div id="copyright-content">
            <p class="float-left">Copyright © 2013 <a href="recruiter-home-page.php">interngration</a> All rights reserved.</p> 
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