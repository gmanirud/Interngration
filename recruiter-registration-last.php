<?php
session_start();

if(isset($_GET['nextrid']))
{

//header("location:inner.php");
}
else
{
header("location:recruiter-registration.php");
}
?>
<!DOCTYPE HTML>
<html lang="en" class="no_js">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Recruiter Registration - Interngration</title>
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

<?php
if(isset($_GET['nextrid']))
{
		$sessionid=$_GET['nextrid'];
		
		include "config.php"; 	
		$ses_result=mysql_select_db($dbname) or die(mysql_error());
					
		$sqlget="Select *  from recruiter_register_temp where session_id='$sessionid'";
		$ses_result=mysql_query($sqlget);
		$rowcount= mysql_num_rows($ses_result);	
					
		if ($rowcount>0)
		{
			$res=mysql_fetch_array($ses_result);
			
			$companyName=$res["companyName"];
			$Email=$res["Email"];
			$hrLead=$res["hrLead"];
			$Contact=$res["Contact"];
			$companyName1=$res["companyName"];
			$hrLead1=$res["hrLead"];
			$Contact1=$res["Contact"];
			$AboutMe=$res["AboutMe"];
			$AboutMe1=$res["AboutMe"];
			$Profile_Image=$res["Profile_Image"];
			if(($companyName=="")&&($hrLead=="")&&($Contact==""))
			{
				$companyName="Company Name";
			    $hrLead="Your Name";
			    $Contact="your e-mail address";
				$companyName1="";
			    $hrLead1="";
			    $Contact1="";
			}
			if($AboutMe=="")
			{
			    $AboutMe="Enter a short blurb about your company.";
				$AboutMe1="";
			}
			
		}
		else
		{
			$companyName="";
			$hrLead="";
			$Contact="";
			$companyName1="";
			$hrLead1="";
			$Contact1="";
			$AboutMe="";
			$AboutMe1="";
			$Profile_Image="";
		}


}				
?>

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
	var sid=document.getElementById('hdn_sessionid').value;
	
	var abtme=document.getElementById('aboutme').value;
	var upTable="temptable";
	
	if(document.getElementById("aboutme").value=="")
	{
		document.getElementById("error1").style.display='block';
		document.getElementById("error1").innerHTML='We\'re sure your company is not that boring! Tell us a little bit about it.';
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

xmlhttp.open("GET","ajaxpage/ajaxRecruiterabout.php?sid="+sid+"&abtme="+abtme+"&upTable="+upTable,true);
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
	
	
	var prf_sId=document.getElementById('hdn_sessionid').value;
	var txtcompany=document.getElementById('txtcompany').value;
	var txthr=document.getElementById('txthr').value;
	var upTable="temptable";
	
	if(document.getElementById("txtcompany").value=="")
	{
		document.getElementById("error2").style.display='block';
		document.getElementById("error2").innerHTML='Please enter your Company name.';
		document.getElementById("txtcompany").focus();
		return false;
	}
	if(document.getElementById("txthr").value=="")
	{
		document.getElementById("error2").style.display='block';
		document.getElementById("error2").innerHTML='Please enter your name.';
		document.getElementById("txthr").focus();
		return false;
	}
	
	
	
if (window.XMLHttpRequest)
  {
  var xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
 var xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
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

xmlhttp.open("GET","ajaxpage/ajaxRecruiterProfile.php?psId="+prf_sId+"&company="+txtcompany+"&hr="+txthr+"&upTable="+upTable,true);
xmlhttp.send();
}
</script>

</head>
<body>
<div id="wrapper"> 
  
  <!-- header -->
  <div class="fixposition">
    <div id="header-wrapper">
      <div id="header-content">
        <div id="logo"><a href="index.php"><img src="images/logo.png" alt="interngration" width="400" height="80" /></a></div>
        <!-- header nav menu -->
        <div id="menu" class="menu">
          <ul>
            <li><a href="index.php">Home</a></li>
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
        <h1>Recruiter Registration</h1>
      </div>
    </div>
    
    <!-- body -->
    <div id="body-wrapper" class="container_16">
      <div class="clear"></div>
      
      <!-- grid columns -->
      <div class="section"> 
        
        <!-- title -->
        <div class="title"></div>
        
        <!-- 8/16 -->
        <div class="grid_8" style="">
         <form id="frmProfile"  enctype="multipart/form-data" action="updateRecruiterImage.php" method="post">
          <table width="435" style="margin:10px; min-height:270px; border:1px solid; border-color:#CCC; padding:10px;">
            <tr>
              <td valign="top">
            
                  <div style="float:left;">
                   
                      <input type="button" value="Edit" onClick="editrecruiterprofile()" name="edt1" id="edt1" style="width:60px; cursor:pointer"/>
                      <input type="button" style="display:none; width:60px;cursor:pointer" value="Update" onClick="updaterecruiterprofile()" name="upd1" id="upd1" />
                   
                  </div>
                 
                </td>
              <td rowspan="2" align="right" valign="top">
              <div style="float:right;">
              <label class="file-upload"> 
                 <input type='file' id="txtFile" name="txtFile" onChange="document.getElementById('frmProfile').submit();" />
                 <?php
				 if($Profile_Image!="")
				 {
					 ?>
    			 <img src="uploads/Recruiter/<?php print $Profile_Image ?>" height="180" width="180"/>
                 <?php
				 }
				 ?>
                </label>
                <input type="hidden" name="hdn_sessionid" id="hdn_sessionid" value="<?php print $sessionid; ?>">
               
                
                </div>
                </td>
            </tr>
            <tr>
              <td valign="top">
               <div style="float:left;" id="divupdate"> <br/>
                    <li>Company Name: <?php print $companyName; ?></li>
                    <li>Recruiter Name: <?php print $hrLead; ?></li>
                    <li>E-mail: <?php print $Email; ?></li>
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
        <div class="grid_8" style="min-height:228px">
          <div>
            <div style="float:left;">
              <h4 style="margin:20px;">About My Company</h4>
            </div>
            <div style="float:right; padding-right:20px; padding-top:10px;">
              <input type="button" value="Edit" onClick="editrecruiterabout()" name="about_edit" id="about_edit" style="width:60px;cursor:pointer">
              <input type="button" value="Update" onClick="updaterecruiterabout()" style="display:none; width:60px;cursor:pointer" name="about_update" id="about_update" >
            </div>
          </div>
           <div style="float:left;color:#F00; font-weight:400; padding-top:50px; display:none" id="error1"></div>
          <div>&nbsp;</div>
          <div>&nbsp;</div>
          <div>&nbsp;</div>
        
          <p align="justify" style="width:415px; min-height:195px; border:1px solid;border-color:#CCCCCC;margin:20px;overflow:auto;" id="para_aboutme"><?php print $AboutMe; ?>
          </p>

         
          <textarea id="aboutme"  name="aboutme" style="width:400px; height:175px; display:none; margin:20px;" placeholder="Enter a short blurb about your company, so that students will know how awesome it is." ><?php print $AboutMe1; ?></textarea>
        </div>
        <form id="frmRegister" name="frmRegister" method="post" action="RecruiterActivationMail.php">
        <div class="grid_17">
          <h4 style="margin:20px 0px 10px 20px;">Filter students by:</h4>
        
          <table width="280" border="0" height="160" style="margin:0px 10px 20px 20px; border:1px solid #666666; padding:10px; float:left;">
            <tr>
              <th scope="col">Academic Background</th>
            </tr>
            <tr>
              <td>
                  <input type="checkbox" name="academic_1" id="academic_1" value="Engineering">
                  Engineering
                  <br>
                  <input type="checkbox" name="academic_2" id="academic_2" value="Business/Economics">
                  Computer Science
                  <br>
                  <!-- Exclude these faculties for now. Re-enable when we expand.
                  <input type="checkbox" name="academic_3" id="academic_3" value="Art/Graphic Designs">
                  Art/Graphic Designs
                  <br>
                  <input type="checkbox" name="academic_4" id="academic_4" value="Science">
                  Science
                  <br>
                  -->
                </td>
            </tr>
          </table>
          <table width="280" border="0" height="160" style="margin:0px 10px 0px 10px; border:1px solid #666666; padding:10px; float:left;">
            <tr>
              <th scope="col">University</th>
            </tr>
            <tr>
              <td>
                  <input type="checkbox" name="session_chk_1" id="session_chk_1" value="University of Toronto">
                  University of Toronto<br><br><br>
                  <h6> More universities to come soon.</h6>
                  <!-- Exclude these schools for now. Re-enable when we expand.
                  <input type="checkbox" name="session_chk_1" id="session_chk_1" value="University of toronto">
                  University of toronto<br>
                  <input type="checkbox" name="session_chk_2" id="session_chk_2" value="University of Waterloo">
                  University of Waterloo<br>
                  <input type="checkbox" name="session_chk_3" id="session_chk_3" value="Ryerson University">
                  Ryerson University<br>
                  <input type="checkbox" name="session_chk_4" id="session_chk_4" value="York University">
                  York University<br>
                  <input type="checkbox" name="session_chk_5" id="session_chk_5" value="University of British Columbia">
                  University of British Columbia <br>-->
                </td>
            </tr>
          </table>
          <table width="280" border="0" height="160" style="margin:0px 0px 0px 10px; border:1px solid #666666; padding:10px; float:left;">
            <tr>
              <th scope="col">Position Type</th>
            </tr>
            <tr>
              <td>
                  <input type="checkbox" name="session_chk_6" id="session_chk_6" value="PEY">
                  PEY<br>
                  <input type="checkbox" name="session_chk_7" id="session_chk_7" value="Co-op">
                  Co-op<br>
                  <input type="checkbox" name="session_chk_8" id="session_chk_8" value="Full Time">
                  Full-Time<br>
                  <input type="checkbox" name="session_chk_9" id="session_chk_9" value="Summer Intern">
                  Summer Intern<br>
                  <input type="checkbox" name="session_chk_10" id="session_chk_10" value="Contractor">
                  Contractor<br>
                  <input type="checkbox" name="session_chk_11" id="session_chk_11" value="Volunteers">
                  Volunteers<br>
                </td>
            </tr>
          </table>
         
        </div>
        <div class="" style="float:right; width:600px;"> 
          <span style="margin:10px 0px 0px 0px; float:right;">
            <input type='submit' name="Finish" value="Finish" class="button red" />
            <input type="hidden" name="academic_chk" id="academic_chk" value="<?php print "4"; ?>"/>
            <input type="hidden" name="session_chk" id="session_chk" value="<?php print "11"; ?>"/>
            <input type="hidden" name="hdn_sId" id="hdn_sId" value="<?php print $sessionid; ?>"/>
          </span> 
        </div>
        </form>
        
        
        <div class="clear"></div>
      </div>
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
