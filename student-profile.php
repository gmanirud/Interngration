<?php
session_start();

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

<?php

  $session=$_SESSION["s_id"];
  include "config.php"; 	
  $ses_result=mysql_select_db($dbname) or die(mysql_error());
  $sqlget="Select *  from student_register where session_id='$session'";
  $ses_result=mysql_query($sqlget);
  $rowcount= mysql_num_rows($ses_result);	
  

  if ($rowcount>0) {
    $res=mysql_fetch_array($ses_result);
    $FirstName = $res["FirstName"];
    $LastName = $res["LastName"];
    $schoolName=$res["schoolName"];
    $Program=$res["Program"];
    $Contact=$res["Contact"];
    $AboutMe=$res["AboutMe"];
    $Email=$res["Email"];
    $schoolName1=$res["schoolName"];
    $Program1=$res["Program"];
    $univ_Year=$res["univ_Year"];
    $Contact1=$res["Contact"];
    $AboutMe1=$res["AboutMe"];
    $Profile_Image=$res["Profile_Image"];
    $work_experience=$res["work_experience"];
    $projects=$res["projects"];
    $job_resume=$res["job_resume"];
    $skill_set=$res["skill_set"];
    $position_for=$res["position_for"];
    $language_pref=$res["language_pref"];

    if(($schoolName=="")&&($Program=="")&&($Contact=="")) {
      $schoolName="University of Toronto";
      $Program="Engineering/CS";
      $Contact="yourname@mail.utoronto.ca";
      $univ_Year="Year of study";
      $schoolName1="";
      $Program1="";
      $Contact1="";
    }
    
    if($AboutMe=="") {
       $AboutMe="Hello {$res["FirstName"]}, tell us a little something about yourself. It could be a fun fact about you or what you like to do outside of school. Anything to let the recruiters know about your fun side!";
       $AboutMe1="";	
    }
    if($univ_Year=="") {
      $univ_Year="Year of study";
    }
    if($skill_set=="") {
      $skill_set="Please select the technical skills you're proficient in. ";
    }
    if($position_for=="") {
      $position_for="What type of position are you looking for?";
    }
    if($language_pref=="") {
	    $language_pref="Select your language preference";
		}
	}
  else {
    $schoolName="";
    $Program="";
    $Contact="";
    $AboutMe="";
    $schoolName1="";
    $Program1="";
    $Contact1="";
    $AboutMe1="";	
    $Profile_Image="";
    $work_experience="";
    $projects=$res["projects"];
  }

?>
  
<title> <?php echo ucfirst($FirstName),"$nbsp ",ucfirst($LastName) ?> - Interngration</title>
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
<script>

function Checkfiles()
{
var fup = document.getElementById('resume');
var fileName = fup.value;
var ext = fileName.substring(fileName.lastIndexOf('.') + 1);

if(fileName=="")
{

	document.getElementById("error2").style.display='block';
    document.getElementById("error2").innerHTML='Please choose a file to upload';
	fup.focus();
	return false;
}

if(ext != "DOC" && ext != "pdf" && ext != "PDF" && ext != "doc" && ext != "docx")
{
document.getElementById("error2").style.display='block';
document.getElementById("error2").innerHTML='Your resume needs to be in either .doc or .pdf format';
fup.focus();
return false;
} 
document.getElementById("error2").style.display='none';
return true;
} 


function editProjects()
{
	 
	  document.getElementById('Projects_edit').style.display="none";
	  document.getElementById('Projects_update').style.display="block";
	  document.getElementById('para_Projects').style.display="none";
	  document.getElementById('Projects').style.display="block";	  
	  document.getElementById('Projects').focus();  
}


function updateProjects()
{
	var sid=document.getElementById('hdn_sessionid').value;
	
	var Projects=document.getElementById('Projects').value;
	
	if(Projects=="")
	{
	  document.getElementById("error4").style.display='block';
		document.getElementById("error4").innerHTML='You did at least one project, right?';
	   document.getElementById('Projects').focus();
	   return false;
	}
	 document.getElementById("error4").style.display='none';
	
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
				  var expe=xmlhttp.responseText;;
				 
				  document.getElementById('Projects_edit').style.display="block";
				  document.getElementById('Projects_update').style.display="none";
				  document.getElementById('para_Projects').style.display="block";
				  document.getElementById('para_Projects').innerHTML=expe;
				  document.getElementById('Projects').style.display="none";	  
				 
	  
	  
					
		}
	  }

xmlhttp.open("GET","ajaxpage/ajaxStudentProjects.php?sid="+sid+"&Projects="+Projects,true);
xmlhttp.send();
}



function editworkexperience()
{
	 
	  document.getElementById('experience_edit').style.display="none";
	  document.getElementById('experience_update').style.display="block";
	  document.getElementById('para_workexperience').style.display="none";
	  document.getElementById('experience').style.display="block";	  
	  document.getElementById('experience').focus();  
}


function updateworkexperience()
{
	var sid=document.getElementById('hdn_sessionid').value;
	
	var experience=document.getElementById('experience').value;
	
	if(experience=="")
	{
	 document.getElementById("error3").style.display='block';
		document.getElementById("error3").innerHTML='You cannnot leave this blank!';
	  document.getElementById('experience').focus();
	  return false;
	}
	 document.getElementById("error3").style.display='none';
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
				  var expe=xmlhttp.responseText;;
				 
				  document.getElementById('experience_edit').style.display="block";
				  document.getElementById('experience_update').style.display="none";
				  document.getElementById('para_workexperience').style.display="block";
				  document.getElementById('para_workexperience').innerHTML=expe;
				  document.getElementById('experience').style.display="none";	  
				 
	  
	  
					
		}
	  }

xmlhttp.open("GET","ajaxpage/ajaxStudentWrokexperience.php?sid="+sid+"&experience="+experience,true);
xmlhttp.send();
}

function editstudentabout()
{
	 
	  document.getElementById('about_edit').style.display="none";
	  document.getElementById('about_update').style.display="block";
	  document.getElementById('para_aboutme').style.display="none";
	  document.getElementById('aboutme').style.display="block";	  
	  document.getElementById('aboutme').focus();  
}


function updatestudentabout()
{
	var sid=document.getElementById('hdn_sessionid').value;
	
	var abtme=document.getElementById('aboutme').value;
	
	if(document.getElementById("aboutme").value=="")
	{
		document.getElementById("error1").style.display='block';
		document.getElementById("error1").innerHTML='You\'re not that boring, are you?';
		document.getElementById("aboutme").focus();
		return false;
	}
	document.getElementById("error1").style.display='none';
	
	
	var upTable="maintable";
	
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
				  var aboutme=xmlhttp.responseText;
				  
				  document.getElementById('about_edit').style.display="block";
				  document.getElementById('about_update').style.display="none";
				  document.getElementById('para_aboutme').style.display="block";
				  document.getElementById('para_aboutme').innerHTML=aboutme;			 
				  document.getElementById('aboutme').style.display="none";	 
			      coincalculation(sid);
		}
	  }

xmlhttp.open("GET","ajaxpage/ajaxStudentabout.php?sid="+sid+"&abtme="+abtme+"&upTable="+upTable,true);
xmlhttp.send();
}


function coincalculation(sessid)
{
	
	var sess=sessid;
	var upTable="maintable";
    
	
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
   document.getElementById("upd").innerHTML="<img src='ïmages/fbloading.gif'>" ;
	
	
    }
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
		
		 document.getElementById("coinid").innerHTML=xmlhttp.responseText;    
	
    }
  }

xmlhttp.open("GET","ajaxpage/ajaxCoin.php?sessid="+sess+"&upTable="+upTable,true);
xmlhttp.send();
}




function editstudentprofile()
{
	  document.getElementById('edt1').style.display="none";
	  document.getElementById('upd1').style.display="block";
	  document.getElementById('divupdate').style.display="none";
	  document.getElementById('divedit').style.display="block";	 	  
	  document.getElementById('txtSchool').focus(); 
}

function edittechskill()
{
	  document.getElementById('skill_edit').style.display="none";
	 document.getElementById('skill_update').style.display="block";
	  document.getElementById('para_skill').style.display="none";
	  document.getElementById('tbltech').style.display="block";	 	  
	  //document.getElementById('txtSchool').focus(); 
}

function editlanguage()
{
	  document.getElementById('lan_edit').style.display="none";
	 document.getElementById('lan_update').style.display="block";
	  document.getElementById('para_lan').style.display="none";
	  document.getElementById('tbllan').style.display="block";	 	  
	  //document.getElementById('txtSchool').focus(); 
}



function updatestudentprofile()
{
	
	var prf_sId=document.getElementById('hdn_sessionid').value;
	var schoolName=document.getElementById('txtSchool').value;
	var Program=document.getElementById('txtProgram').value;
	var selYear=document.getElementById('txtyear').value;
	var upTable="maintable";
	
	if(document.getElementById("txtSchool").value=="")
	{
		document.getElementById("error2").style.display='block';
		document.getElementById("error2").innerHTML='Please select a school';
		document.getElementById("txtSchool").focus();
		return false;
	}
	if(document.getElementById("txtProgram").value=="")
	{
		document.getElementById("error2").style.display='block';
		document.getElementById("error2").innerHTML='Please select your program';
		document.getElementById("txtProgram").focus();
		return false;
	}
	if(document.getElementById("txtyear").value=="")
	{
		document.getElementById("error2").style.display='block';
		document.getElementById("error2").innerHTML='Please select your year of study';
		document.getElementById("txtyear").focus();
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
   document.getElementById("upd").innerHTML="<img src='ïmages/fbloading.gif'>" ;
     
	
	
    }
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
		
	  var res=xmlhttp.responseText;	

	    document.getElementById("error2").style.display='none';	 
	  document.getElementById('edt1').style.display="block";
	  document.getElementById('upd1').style.display="none";
	  document.getElementById('divupdate').style.display="block";
	  document.getElementById('divedit').style.display="none";
	  document.getElementById('divupdate').innerHTML=res;	 	
	
    }
  }

xmlhttp.open("GET","ajaxpage/ajaxStudentProfile.php?psId="+prf_sId+"&schoolName="+schoolName+"&Program="+Program+"&SelYear="+selYear+"&upTable="+upTable,true);
xmlhttp.send();
}



function ckhimage()
{
	var photoname=document.getElementById("uploadfile").value;

	alert(photoname);
	
  if (window.XMLHttpRequest)
    {
      xmlhttp=new XMLHttpRequest();
    }
  else
    { 
      xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
  
  xmlhttp.onreadystatechange=function()
  
    {
      if (xmlhttp.readyState==1 || xmlhttp.readyState==2 || xmlhttp.readyState==3)
        {
          document.getElementById("upd").innerHTML="<img src='ïmages/fbloading.gif'>" ;
        }
      
      if (xmlhttp.readyState==4 && xmlhttp.status==200)
        {
          var resp=xmlhttp.responseText;
          alert(resp);
        }
    }

xmlhttp.open("GET","ajaxpage/ajaxDemo.php?session="+session+"&photopath="+chkimg,true);
xmlhttp.send();
}



function updatetechskill()
{
	var skillset="";
	var prf_sId=document.getElementById('hdn_sessionid').value;
	var chks = document.getElementsByName('technicalskill[]');
	for (var i = 0; i < chks.length; i++)
	{
	
	if (chks[i].checked)
	{
		ckl=chks[i].value;
		skillset =skillset+ckl+",";
	}
	}
	skillset=encodeURIComponent(skillset);
	
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
   document.getElementById("upd").innerHTML="<img src='ïmages/fbloading.gif'>" ;
	
	
    }
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
		var respts=xmlhttp.responseText;
		//alert(resp);
		 document.getElementById('skill_edit').style.display="block";
		 document.getElementById('skill_update').style.display="none";
	     document.getElementById('tbltech').style.display="none";
		 document.getElementById('para_skill').style.display="block";
		 document.getElementById('para_skill').innerHTML=respts;
		
    }
  }

xmlhttp.open("GET","ajaxpage/ajaxSkillset.php?session="+prf_sId+"&skilltech="+skillset,true);
xmlhttp.send();
}

function updatelanguage()
{
	
	var prf_sId=document.getElementById('hdn_sessionid').value;
	var chks = document.getElementsByName('positionFor[]');
	var PosFor="";
	var LanPref="";
	for (var i = 0; i < chks.length; i++)
	{
	
	if (chks[i].checked)
	{
		
		ckl=chks[i].value;
		
		PosFor =PosFor+ckl+",";
		
	}
	}
	
	var chkslan = document.getElementsByName('languagePref[]');
	for (var j = 0; j < chkslan.length; j++)
	{
	
	if (chkslan[j].checked)
	{
		cklan=chkslan[j].value;
		LanPref =LanPref+cklan+",";
	}
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
   document.getElementById("upd").innerHTML="<img src='ïmages/fbloading.gif'>" ;
	
	
    }
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
		var resplan=xmlhttp.responseText;
		//alert(resp);
		 document.getElementById('lan_edit').style.display="block";
		 document.getElementById('lan_update').style.display="none";
	     document.getElementById('tbllan').style.display="none";
		 document.getElementById('para_lan').style.display="block";
		 document.getElementById('para_lan').innerHTML=resplan;
		
    }
  }

xmlhttp.open("GET","ajaxpage/ajaxLanPosition.php?session="+prf_sId+"&PosFor="+PosFor+"&LanPref="+LanPref,true);
xmlhttp.send();
}

function invitemail()
{
	
	var invmail=document.getElementById("txtMail").value;
	var sid=document.getElementById('hdn_sessionid').value;
    
	if(document.getElementById("txtMail").value=="")
	{
		document.getElementById("error").style.display='block';
		document.getElementById("error").innerHTML='Enter the Email...!';
		document.getElementById("txtMail").focus();
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
        document.getElementById("upd").innerHTML="<img src='ïmages/fbloading.gif'>" ;	
	
    }
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
		var resp=xmlhttp.responseText;
		
		if(resp=='2')
		{
			document.getElementById("txtMail").value="";
			document.getElementById("error").style.display='block';
		    document.getElementById("error").innerHTML='Your Invitation mail has been send successfully'; 
		}
		if(resp=='3')
		{
			document.getElementById("txtMail").value="";
			document.getElementById("error").style.display='block';
		    document.getElementById("error").innerHTML='This Email Id is already exist in Interngration Student account'; 
		}
	
    }
  }

xmlhttp.open("GET","ajaxpage/ajaxInviteMail.php?session="+sid+"&invmail="+invmail,true);
xmlhttp.send();

}

function coincalculation(sessid)
{
	
	var sess=sessid;
	var upTable="temptable";
    
	
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
   document.getElementById("upd").innerHTML="<img src='ïmages/fbloading.gif'>" ;
	
	
    }
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
		
		 document.getElementById("coinid").innerHTML=xmlhttp.responseText;    
	
    }
  }

xmlhttp.open("GET","ajaxpage/ajaxCoin.php?sessid="+sess+"&upTable="+upTable,true);
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


<!--  Facebook  Invitation  -->
<script src="http://connect.facebook.net/en_US/all.js">
   </script>
  <script type='text/javascript'>
		if (top.location!= self.location) {
			top.location = self.location
		}

FB.init({
appId:'516156771770986',
cookie:true,
status:true,
xfbml:true
});

function FacebookInviteFriends()
{
FB.ui({
method: 'apprequests',
message: 'Join Interngration - An online multimedia platform to connect SMEs/startups with students.'
});
}
</script>

<!--  Face Book Invitation -->


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
        <h1>Student Profile</h1>
        <span style="margin:0px 30px 0px 0px; float:right;">
          <a href="student-homepage.php" class="button red">Upcoming Webinars</a>
          <a href="StudentRegisteredWebinar.php" class="button red">My Webinars</a>
          <a href="StudentWatchedWebinar.php" class="button red">Watched Webinar</a>    
          <a href="studentJobApplication.php" class="button red">Job Application</a> 
          <a href="AppliedPostedJob.php" class="button red">Applied Job</a> 
          <a href="studentInbox.php" class="button red">Inbox</a>
          <a href="student-profile.php" class="button red">Profile</a></span> 
         </div>
    </div>
    
    <!-- body -->
    <div id="body-wrapper" class="container_16">
      <div class="clear"></div>
      
      <!-- grid columns -->
      <div class="section">
        <?php
		 
      	  $ses_result=mysql_select_db($dbname) or die(mysql_error());   
		   $sql="select * from student_register where session_id='$session'";
		   $ses_result=mysql_query($sql);
		   $res=mysql_fetch_array($ses_result); 
		   $Coins=$res["Coins"];
		   
		 ?>
        
        <!-- title -->
        <div class="title">
          <!--<h4> Coins : <font id="coinid"><?php print $Coins;?></font> </h4>-->
        </div>
        
        <!-- 8/16 -->
        <div class="grid_8" style="min-height:310px;">
          <form id="frmProfile"  enctype="multipart/form-data" action="updateStudentProfileImage.php" method="post"  >
            <table width="435"  style="margin:10px; min-height:270px; border:1px solid; border-color:#CCC; padding:10px;">
            <tr>
              <td valign="top"><div style="float:left;">
                  <input type="button" value="Edit" onClick="editstudentprofile()" name="edt1" id="edt1" style="width:60px; cursor:pointer"/>
                  <input type="button" style="display:none; width:60px;cursor:pointer" value="Update" onClick="updatestudentprofile()" name="upd1" id="upd1" />
                </div></td>
              <td rowspan="2" align="right" valign="top"><div style="float:right;">
                  <label class="file-upload" style="cursor:pointer;">
                    <input type='file' id="txtFile" name="txtFile" onChange="chkimgvalidation();" />
                    <?php
				 if($Profile_Image!="")
				 {
					 ?>
                    <img src="uploads/StudentImage/<?php print $Profile_Image ?>" height="180" width="180" />
                    <?php
				 }
				 ?>
                  </label>
                  <input type="hidden" name="hdn_sessionid" id="hdn_sessionid" value="<?php print $session; ?>">
                </div>
                 <?php
				
				if($Profile_Image!="")
				{
				?>
                <a href="removeStudentImage.php?sid=<?php print $s_uid; ?>" > Remove Image </a>
                <?php
				}
				?>
                
                <div style="float:left;color:#F00; font-weight:400; padding-top:2px; display:none; padding-left:5px;" id="error5"></div>
                </td>
            </tr>
            <tr>
              <td valign="top"><div style="float:left;" id="divupdate"> <br/>
                  <li>University&nbsp;<b>:</b>&nbsp; <?php print $schoolName; ?></li>
                  <li>Program&nbsp;<b>:</b>&nbsp; <?php print $Program; ?></li>
                  <li>Year&nbsp;<b>:</b>&nbsp; <?php print $univ_Year; ?></li>
                  <li>Email&nbsp;<b>:</b>&nbsp; <?php print $Email; ?></li>
                </div>
                <div style="float:left; display:none" id="divedit">
                  <select name="txtSchool" id="txtSchool">
                    <option value="">Select University</option>
                    <option value="University of Toronto" <?php if($schoolName1=='University of Toronto'){?> selected='selected' <?php  } ?>>University of Toronto</option>
                    <option value="University of Waterloo" <?php if($schoolName1=='University of Waterloo'){?> selected='selected' <?php  } ?>>University of Waterloo</option>
                    <option value="Ryerson University" <?php if($schoolName1=='Ryerson University'){?> selected='selected' <?php  } ?>>Ryerson University</option>
                    <option value="York University" <?php if($schoolName1=='York University'){?> selected='selected' <?php  } ?>>York University</option>
                  </select>
                  <br/>
                  <select name="txtProgram" id="txtProgram">
                    <option value="Electrical Engineering" <?php if($Program1=='Electrical Engineering'){?> selected='selected' <?php  } ?>>Electrical Engineering</option>
              		<option value="Computer Engineering" <?php if($Program1=='Computer Engineering'){?> selected='selected' <?php  } ?>>Computer Engineering</option>
              		<option value="Computer Engineering" <?php if($Program1=='Engineering Science'){?> selected='selected' <?php  } ?>>Engineering Science</option>
              		<option value="Computer Engineering" <?php if($Program1=='Chemical Engineering'){?> selected='selected' <?php  } ?>>Chemical Engineering</option>
              		<option value="Computer Engineering" <?php if($Program1=='Mechanical Engineering'){?> selected='selected' <?php  } ?>>Mechanical Engineering</option>
              		<option value="Computer Engineering" <?php if($Program1=='Civil Engineering'){?> selected='selected' <?php  } ?>>Civil Engineering</option>
              		<option value="Computer Engineering" <?php if($Program1=='Industrial Engineering'){?> selected='selected' <?php  } ?>>Industrial Engineering</option>
              		<option value="Computer Engineering" <?php if($Program1=='Material Science Engineering'){?> selected='selected' <?php  } ?>>Material Science Engineering</option>
                    <option value="Computer Science" <?php if($Program1=='Computer Science'){?> selected='selected' <?php  } ?>>Computer Science</option>
                  </select>
                  <br/>
                  <select name="txtyear" id="txtyear">
                    <option value="">Select Year</option>
                     <option value="New Grad" <?php if($univ_Year=='New Grad'){?> selected='selected' <?php  } ?>>New Grad</option>
                    <option value="1st Year" <?php if($univ_Year=='1st Year'){?> selected='selected' <?php  } ?>>1st Year</option>
                    <option value="2nd Year" <?php if($univ_Year=='2nd Year'){?> selected='selected' <?php  } ?>>2nd Year</option>
                    <option value="3rd Year" <?php if($univ_Year=='3rd Year'){?> selected='selected' <?php  } ?>>3rd Year</option>
                    <option value="4th Year" <?php if($univ_Year=='4th Year'){?> selected='selected' <?php  } ?>>4th Year</option>
                    <option value="4th Year" <?php if($univ_Year=='Graduate Student'){?> selected='selected' <?php  } ?>>Graduate Student</option>
                  </select>
                  </br>
                  <ul>
                    <li>Email <?php print $Email; ?></li>
                  </ul>
                  <!-- <input type="text" id="txtcontact" name="txtcontact" placeholder="Contact"maxlength="100" style="width:190px;" value="<?php print $Contact1; ?>"/>--> 
                </div>
                <div style="float:left;color:#F00; font-weight:400; padding-top:1px; display:none" id="error2"></div></td>
            </tr>
          </form>
          <tr>
            <td>
            <form action="updateprofileresume.php" name="frmimage" id="frmimage" method="post" onSubmit="return Checkfiles()" enctype="multipart/form-data">
              Upload Your Resume<br>
              <input name="resume" id="resume" type="file" style="width:190px;">
              </td>
              <td valign="bottom"><input name="" type="submit" value="Upload" style="cursor:pointer;">
                &nbsp;&nbsp;
                <?php
            if($job_resume!="")
			{
				?>
                <a href="uploads/Resume/<?php print $job_resume; ?>" title="Previous Resume" target="_blank"><img src="images/resume.png" alt="Resume" width="20" title="Previous Resume"/>&nbsp;&nbsp;Resume</a>
                 &nbsp;&nbsp;&nbsp;&nbsp;<a href="removeStudentImage.php?resid=<?php print $s_uid; ?>" ><img src="images/delmark.png" title="Remove Resume"/></a>
                <?
				
			}
			?>
            </form>
            </td>
          </tr>
          </table>
        </div>
        <div class="grid_8" style="min-height:310px;">
          <div>
            <div style="float:left;">
              <h4 style="margin:20px;">About Me</h4>
            </div>
            <div style="float:right; padding-right:20px; padding-top:10px;">
              <input type="button" value="Edit" onClick="editstudentabout();" name="about_edit" id="about_edit" style="width:60px;cursor:pointer">
              <input type="button" value="Update" onClick="updatestudentabout();" style="display:none; width:60px;cursor:pointer" name="about_update" id="about_update" >
            </div>
          </div>
          <div style="float:left;color:#F00; font-weight:400; padding-top:50px; display:none" id="error1"></div>
          <p align="justify" style=" margin:20px; border:1px solid #666666; padding:10px; height:180px;width:395px;border:1px solid #ccc; Serif;overflow:auto;" id="para_aboutme">
            <?php
		 
			  print $AboutMe;
		 
		  ?>
          </p>
          <textarea id="aboutme"  name="aboutme" style="width:400px; height:180px; display:none; margin:20px;" placeholder="Enter About Me" ><?php print $AboutMe1; ?></textarea>
        </div>
        
        <!-- Technical Skill -->
        <div class="grid_8" style="min-height:310px;">
          <div>
            <div style="float:left;">
              <h4 style="margin:20px;">My Technical Skills</h4>
            </div>
            <div style="float:right; padding-right:20px; padding-top:10px;">
              <input type="button" value="Edit" onClick="edittechskill();" name="skill_edit" id="skill_edit" style="width:60px;cursor:pointer">
              <input type="button" value="Update" onClick="updatetechskill();" style=" width:60px;cursor:pointer;display:none;" name="skill_update" id="skill_update" >
            </div>
          </div>
          <br/>
          <br/>
          <br/>
          <div style="float:left;color:#F00; font-weight:400; padding-top:50px; display:none" id="error1"></div>
          <div align="justify" style=" margin:20px; border:1px solid #666666; padding:20px; height:175px;width:385px;border:1px solid #ccc; Serif;overflow:auto; " id="para_skill">
            <?php
		  $array = explode(',', $skill_set);
	   foreach ($array as  $arr)
	   {
		   if($arr=="")
		   {
			   break;
		   }
		   ?>
            <li> <?php print $arr ?> </li>
            <?php
	   }
		  
		  ?>
          </div>
          <table  border="0" id="tbltech" style="margin:10px; height:200px; min-width:415px; border:1px solid; border-color:#CCC; padding:10px;display:none;">
            <?php
		  $array = explode(',', $skill_set);
	     
		  ?>
            <tr valign="top">
              <td width="20%" >

                <input type="checkbox" name="technicalskill[]" id="technicalskill1" <?php  foreach ($array as  $arr)
           {  if($arr=="C#"){ ?> checked="checked" <?php } } ?> value="C#">
                C#<br/>
            <input type="checkbox" name="technicalskill[]" id="technicalskill1" <?php foreach ($array as  $arr)
           {  if($arr=="C++"){ ?> checked="checked" <?php }  }?> value="C++">
                C++<br/>
                <input type="checkbox" name="technicalskill[]" id="technicalskill2" <?php  foreach ($array as  $arr)
           {  if($arr=="C"){ ?> checked="checked" <?php } } ?> value="C">
                C<br/>
                <input type="checkbox" name="technicalskill[]" id="technicalskill2" <?php  foreach ($array as  $arr)
           {  if($arr=="CoffeeScript"){ ?> checked="checked" <?php } } ?> value="CoffeeScript">
                CoffeeScript<br/>
                <input type="checkbox" name="technicalskill[]" id="technicalskill2" <?php  foreach ($array as  $arr)
           {  if($arr=="Go"){ ?> checked="checked" <?php } } ?> value="Go">
                Go<br/>
              </td>

              <td width="20%">
                 <input type="checkbox" name="technicalskill[]" id="technicalskill2" <?php  foreach ($array as  $arr)
           {  if($arr=="HTML"){ ?> checked="checked" <?php } } ?> value="HTML">
                HTML<br/>
                  <input type="checkbox" name="technicalskill[]" id="technicalskill3" <?php  foreach ($array as  $arr)
           {  if($arr=="Java"){ ?> checked="checked" <?php } } ?> value="Java">
                Java<br/>
                <input type="checkbox" name="technicalskill[]" id="technicalskill2" <?php  foreach ($array as  $arr)
           {  if($arr=="JavaScript"){ ?> checked="checked" <?php } } ?> value="JavaScript">
                JavaScript<br/>
                <input type="checkbox" name="technicalskill[]" id="technicalskill4" <?php  foreach ($array as  $arr)
           {  if($arr=="Matlab"){ ?> checked="checked" <?php } } ?> value="Matlab">
                Matlab<br/>
                <input type="checkbox" name="technicalskill[]" id="technicalskill6" <?php  foreach ($array as  $arr)
           {  if($arr=="Pearl"){ ?> checked="checked" <?php } } ?> value="Pearl">
                Pearl<br/>
              </td>

              <td width="20%">
                <input type="checkbox" name="technicalskill[]" id="technicalskill6" <?php  foreach ($array as  $arr)
           {  if($arr=="Python"){ ?> checked="checked" <?php } } ?> value="Python">
                Python<br/>
                <input type="checkbox" name="technicalskill[]" id="technicalskill4" <?php  foreach ($array as  $arr)
           {  if($arr=="Rails"){ ?> checked="checked" <?php } } ?> value="Rails">
                Rails<br/>
                <input type="checkbox" name="technicalskill[]" id="technicalskill6" <?php  foreach ($array as  $arr)
           {  if($arr=="Ruby"){ ?> checked="checked" <?php } } ?> value="Ruby">
                Ruby<br/>
                <input type="checkbox" name="technicalskill[]" id="technicalskill2" <?php  foreach ($array as  $arr)
           {  if($arr=="SQL"){ ?> checked="checked" <?php } } ?> value="SQL">
                SQL<br/>
                <input type="checkbox" name="technicalskill[]" id="technicalskill6" <?php  foreach ($array as  $arr)
           {  if($arr=="Verilog"){ ?> checked="checked" <?php } } ?> value="Verilog">
                Verilog<br/>
              </td>            
            
          </tr>
          </table>
        </div>
        <!-- Technical Skill --> 
        
        <!-- Position For -->
        <div class="grid_8" style="min-height:310px;">
          <div>
            <div style="float:left;">
              <h4 style="margin:20px;">My Job Type and Language Preference</h4>
            </div>
            <div style="float:right; padding-right:20px; padding-top:10px;">
              <input type="button" value="Edit" onClick="editlanguage();" name="lan_edit" id="lan_edit" style="width:60px;cursor:pointer">
              <input type="button" value="Update" onClick="updatelanguage();" style="display:none; width:60px;cursor:pointer" name="lan_update" id="lan_update" >
            </div>
          </div>
          <br/>
          <br/>
          <br/>
          <div style="float:left;color:#F00; font-weight:400; padding-top:50px; display:none" id="error1"></div>
          <div align="justify" style=" margin:20px; border:1px solid #666666; padding:17px; height:180px;width:395px;border:1px solid #ccc; Serif;overflow:auto;" id="para_lan">
            <h4 style="">Job Type</h4>
            <br/>
            <?php
		  $array1 = explode(',', $position_for);
	   foreach ($array1 as  $arr1)
	   {
		   if($arr1=="")
		   {
			   break;
		   }
		   ?>
            <li> <?php print $arr1 ?> </li>
            <?php
	   }
		  
		  ?>
            <br/>
            <h4 style="">Language Preference</h4>
            <br/>
            <?php
		  $array2 = explode(',', $language_pref);
	   foreach ($array2 as  $arr2)
	   {
		   if($arr2=="")
		   {
			   break;
		   }
		   ?>
            <li> <?php print $arr2 ?> </li>
            <?php
	   }
		  
		  ?>
          </div>
          <table  border="0" id="tbllan" style="margin:10px; height:220px; min-width:415px; border:1px solid; border-color:#CCC;display:none; padding:10px;">
            <tr height="10">
              <td colspan="3"><h4 style="">Position For</h4></td>
            </tr>
            <?php
		  $array1 = explode(',', $position_for);
	    
		  ?>
            <tr valign="top">
              <td width="25%" ><input type="checkbox" name="positionFor[]" id="positionFor1" <?php foreach ($array1 as  $arr1)
	   {  if($arr1=="PEY"){ ?> checked="checked" <?php }  }?> value="PEY">
                PEY<br/></td>
              <td width="25%"><input type="checkbox" name="positionFor[]" id="positionFor2" <?php  foreach ($array1 as  $arr1)
	   {  if($arr1=="New Grad"){ ?> checked="checked" <?php } } ?> value="New Grad">
                New Grad<br/></td>
              <td width="25%"><input type="checkbox" name="positionFor[]" id="positionFor3" <?php  foreach ($array1 as  $arr1)
	   {  if($arr1=="Internship"){ ?> checked="checked" <?php } } ?> value="Internship">
                Internship<br/></td>
              <td width="25%"><input type="checkbox" name="positionFor[]" id="positionFor4" <?php  foreach ($array1 as  $arr1)
	   {  if($arr1=="All"){ ?> checked="checked" <?php } } ?> value="All">
                All<br/></td>
            </tr>
            <tr>
              <td>&nbsp;</td>
            </tr>
            <tr height="10">
              <td colspan="3"><h4 style="">Language Preference</h4></td>
            </tr>
            <?php
		  $array2 = explode(',', $language_pref);
	    
		  ?>
            <tr valign="top">
              <td width="30%" ><input type="checkbox" name="languagePref[]" id="languagePref1" <?php foreach ($array2 as  $arr2)
	   {  if($arr2=="English"){ ?> checked="checked" <?php }  }?> value="English">
                English<br/></td>
              <td width="30%"><input type="checkbox" name="languagePref[]" id="languagePref2" <?php  foreach ($array2 as  $arr2)
	   {  if($arr2=="Canadian French"){ ?> checked="checked" <?php } } ?> value="Canadian French">
                Canadian French<br/></td>
              <td width="30%"><input type="checkbox" name="languagePref[]" id="languagePref3" <?php  foreach ($array2 as  $arr2)
	   {  if($arr2=="All"){ ?> checked="checked" <?php } } ?> value="All">
                All<br/></td>
            </tr>
          </table>
        </div>
        
        <!-- Position For -->
        
        <div class="grid_8" >
          <h4 style="margin:20px;">My  My Webinars</h4>
          <div style="height: 180px;Serif;overflow:auto;">
          <table width="400" border="1"  style="margin:20px; border:1px solid #666666; padding:10px;">
            <tr>
              <th scope="col">Title</th>
              <th scope="col">Upcoming Session</th>
              <th scope="col">Status</th>
            </tr>
             <?php
					        $ses_result=mysql_select_db($dbname) or die(mysql_error());
										
							$sqlget="Select *  from student_web_reg where student_id='".$s_uid."' AND starttime>NOW()";		
							//print $sqlget;					
							$ses_result=mysql_query($sqlget);
							$rowcount= mysql_num_rows($ses_result);	
							$i=1;
							if($rowcount!='0')
							{
							while($res=mysql_fetch_array($ses_result))
							{
								
								$subject=$res["subject"];
								$description=$res["description"];
								$webinar_id=$res["webinar_id"];
								$start_time=$res["starttime"];
								$end_time=$res["endtime"];
								$date = date_create($start_time);
								$smp=date_format($date, 'Y-m-d');
								date_default_timezone_set('GMT/UTC-4');
								$dt=date('Y-m-d');
								
								
								if($dt<=$smp)
							{
						?>
            <tr>
              <td><?php print $subject; ?></td>
              <td><?php print $smp; ?></td>
              <td>Q & A open - Participate</td>
            </tr>
           
            <?php
						}
						
							}
							}
							else
							{
								?>
                                <tr>
                                <td colspan="3" align="center"> No Records Found </td>
                                </tr>
                                <?php
							}
							?>
          </table>
          </div>
        </div>
        <div class="grid_8" style="min-height:200px;">
          <div>
            <div style="float:left;">
              <h4 style="margin:20px;">My Work Experience</h4>
            </div>
            <div style="float:right; padding-right:20px; padding-top:10px;">
              <input type="button" value="Edit" onClick="editworkexperience();" name="experience_edit" id="experience_edit" style="width:60px; cursor:pointer">
              <input type="button" value="Update" onClick="updateworkexperience();" style="display:none; width:60px; cursor:pointer" name="experience_update" id="experience_update" >
            </div>
          </div>
          <p align="justify" style=" margin:20px; border:1px solid #666666; padding:10px; height:140px;width:395px;border:1px solid #ccc; Serif;overflow:auto;" id="para_workexperience">
            <?php
		  if($work_experience=="")
		  {
			  ?>
            Enter your previous work experience. 
            <?php
		  }
		  else
		  {
			  print $work_experience;
		  }
		  ?>
          </p>
          <div style="float:left;color:#F00; font-weight:400; padding-top:50px; display:none" id="error3"></div>
          <textarea id="experience"  name="experience" placeholder=" Please Enter Previous and current Work Experience" style="width:400px; height:140px; display:none; margin:20px;" ><?php print $work_experience; ?></textarea>
        </div>
        <div class="grid_8">
          <h4 style="margin:20px;">My Job Applications</h4>
           <div style="height: 180px;Serif;overflow:auto;">
          <table width="420" border="1"  style="margin:20px; border:1px solid #666666; padding:10px;">
            <tr>
              <th scope="col">Company</th>
              <th scope="col">Status</th>
            </tr>
               <?php
					       
							$sqlget3="Select *  from student_jobapplication where stuId=".$s_uid;							
							$ses_result3=mysql_query($sqlget3);
							$rowcount3= mysql_num_rows($ses_result3);	
							$i=1;
							while($res3=mysql_fetch_array($ses_result3))
							{
								
								$JobId=$res3["JobId"];
								$apply_status=$res3["apply_status"];
								
								$sqlget31="Select Company_name  from recruiter_jopposting where id=".$JobId;							
							    $ses_result31=mysql_query($sqlget31);
								$res31=mysql_fetch_array($ses_result31);
								$cmny=$res31['Company_name'];
								
						?>
            <tr>
              <td><?php print $cmny; ?></td>
              <td><?php print $apply_status; ?></td>
            </tr>
           
            <?php
							}
							?>
          </table>
          </div>
        </div>
        <div class="grid_8" style="min-height:200px;">
          <div>
            <div style="float:left;">
              <h4 style="margin:20px;">My Projects</h4>
            </div>
            <div style="float:right; padding-right:20px; padding-top:10px;">
              <input type="button" value="Edit" onClick="editProjects();" name="Projects_edit" id="Projects_edit" style="width:60px; cursor:pointer">
              <input type="button" value="Update" onClick="updateProjects();" style="display:none; width:60px; cursor:pointer" name="Projects_update" id="Projects_update" >
            </div>
          </div>
          <p align="justify" style=" margin:20px; border:1px solid #666666; padding:10px; height:140px;width:395px;border:1px solid #ccc; Serif;overflow:auto;" id="para_Projects">
            <?php
		  if($projects=="")
		  {
			  ?>
            Enter all your relevant projects here. Be it a course mandated project, or a cool little app you built on the side.
            <?php
		  }
		  else
		  {
			  print $projects;
		  }
		  ?>
          </p>
          <div style="float:left;color:#F00; font-weight:400; padding-top:50px; display:none" id="error4"></div>
          <textarea id="Projects"  name="Projects" style="width:400px; height:140px; display:none; margin:20px;" placeholder="Please Enter Your Project details" ><?php print $projects; ?></textarea>
        </div>
        
        <!--   Face book invitation -->
        
        
        <!--<div class="grid_8" style="background-color:#333333; float:right; margin:0px 14px 0px 0px;">
            <p style="color:#FFFFFF; font-weight:bold;">
                Invite Friends (+20 Coins/referral)
                
            <table width="100%" border="0">
  			<tr>
		 		<td width="25%"> <a href='#' onclick='FacebookInviteFriends();' rel='nofollow' title='Invite Your Facebook Friends'> <img src="images/facebook_invite.jpg" alt="Invite Friend" title="Face Book" width="100" /></a></td>
		    	<td width="40%"><input type="text" id="txtMail" name="txtMail" placeholder="Invite Friend" maxlength="100" /></td>
		    	<td width="35%"><a onClick="invitemail();" class="button red">Send Mail</a></td>
		    </tr>
		    <tr>
		    	<td>&nbsp;</td>
		    	<td>&nbsp;</td>
			    <td>&nbsp;</td>
	        </tr>
		    </table>
            </p>                    
        </div>

			<div style="width:490px; float:right; text-align:center; margin:0px 14px 0px 0px;">get more 2x coins by inviting more friends now</div>-->


			<div style="width:490px; float:right; text-align:center; margin:0px 14px 0px 0px; display:none;color:#F00; font-weight:400;" id="error"></div>
            
            <!-- Face book invitation -->
   
        
        <!-- end grid columns -->
        
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
