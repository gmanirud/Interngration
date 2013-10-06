<!DOCTYPE HTML>
<html lang="en" class="no_js">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Student Register</title>
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
		$session=$_GET['nextid'];
				
?>

<?php

if(isset($_GET['nextid']))
{
		$session=$_GET['nextid'];
		
		include "config.php"; 	
		$ses_result=mysql_select_db($dbname) or die(mysql_error());
					
		$sqlget="Select *  from student_register_temp where session_id='$session'";
		
		$ses_result=mysql_query($sqlget);
		$rowcount= mysql_num_rows($ses_result);	
		
	
		if ($rowcount>0)
		{
			$res=mysql_fetch_array($ses_result);
			
			$schoolName=$res["schoolName"];
			$Email=$res["Email"];
			$Program=$res["Program"];
			$Contact=$res["Contact"];
			$AboutMe=$res["AboutMe"];
			$schoolName1=$res["schoolName"];
			$Program1=$res["Program"];
			$Contact1=$res["Contact"];
			$AboutMe1=$res["AboutMe"];
			$Profile_Image=$res["Profile_Image"];
			
			if(($schoolName=="")&&($Program=="")&&($Contact==""))
			{
				$schoolName="Enter Your University";
			    $Program="Enter Program";
			    $Contact="xxx@school.com";
				$schoolName1="";
			    $Program1="";
			    $Contact1="";
			}
			if($AboutMe=="")
			{
			 $AboutMe="Tell About Your Self";
			 $AboutMe1="";	
			}
			
			
		}
		else
		{
			$schoolName="";
			$Program="";
			$Contact="";
			$AboutMe="";
			$schoolName1="";
			$Program1="";
			$Contact1="";
			 $AboutMe1="";	
			$Profile_Image="";
		}


}				
?>


                
                
<!-- Load Jquery/Modernizr Javascript -->
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script type="text/javascript" src="js/modernizr.js"></script>

<script>
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
		document.getElementById("error1").innerHTML='Please Fill the About Me!';
		document.getElementById("aboutme").focus();
		return false;
	}
	document.getElementById("error1").style.display='none';
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
				  coincalculation(sid);
					
		}
	  }

xmlhttp.open("GET","ajaxpage/ajaxStudentabout.php?sid="+sid+"&abtme="+abtme+"&upTable="+upTable,true);
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



function updatestudentprofile()
{
	
	var prf_sId=document.getElementById('hdn_sessionid').value;
	var schoolName=document.getElementById('txtSchool').value;
	var Program=document.getElementById('txtProgram').value;
	var upTable="temptable";
	
	if(document.getElementById("txtSchool").value=="")
	{
		document.getElementById("error2").style.display='block';
		document.getElementById("error2").innerHTML='Please Select University!';
		document.getElementById("txtSchool").focus();
		return false;
	}
	if(document.getElementById("txtProgram").value=="")
	{
		document.getElementById("error2").style.display='block';
		document.getElementById("error2").innerHTML='Please Select Program!';
		document.getElementById("txtProgram").focus();
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
	  document.getElementById("error2").style.display='block';	     
	  document.getElementById('edt1').style.display="block";
	  document.getElementById('upd1').style.display="none";
	  document.getElementById('divupdate').style.display="block";
	  document.getElementById('divedit').style.display="none";
	  document.getElementById('divupdate').innerHTML=res;	 	
	
    }
  }

xmlhttp.open("GET","ajaxpage/ajaxStudentProfile.php?psId="+prf_sId+"&schoolName="+schoolName+"&Program="+Program+"&upTable="+upTable,true);
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
		var resp=xmlhttp.responseText;;
		      alert(resp);
	
    }
  }

xmlhttp.open("GET","ajaxpage/ajaxDemo.php?session="+session+"&photopath="+chkimg,true);
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


</script>


<!--  Face book  Invitation  -->
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
message: 'Recruit Smarter Hire faster ! Register Today for Free Webinar.'
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
        <div id="logo"><a href="index.php"><img src="images/logo.png" alt="interngration" width="400" height="80" /></a></div>
         <!-- header nav menu -->        
        <div id="menu" class="menu"> 
               <ul><li><a href="index.php">Home</a></li></ul>
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
                <h1>Student Register</h1>
            </div>        
        </div>        
            
                   
    <!-- body -->
    <div id="body-wrapper" class="container_16">
    <div class="clear"></div>


		<!-- grid columns -->
		<div class="section">
         <?php
		 
      	  $ses_result=mysql_select_db($dbname) or die(mysql_error());   
		   $sql="select * from student_register_temp where session_id='$session'";
		   $ses_result=mysql_query($sql);
		   $res=mysql_fetch_array($ses_result); 
		   $Coins=$res["Coins"];
		   
		 ?>
       		<!-- title -->
            <div class="title grid_16"> <h4> Coins : <font id="coinid"><?php print $Coins;?></font> </h4> </div>                    
            
            <!-- 8/16 -->
            <div class="grid_8">
            
             
			<form id="frmProfile"  enctype="multipart/form-data" action="updateStudentImage.php" method="post">
          <table width="435" style="margin:10px; min-height:270px; border:1px solid; border-color:#CCC; padding:10px;">
            <tr>
              <td valign="top">
            
                  <div style="float:left;">
                   
                      <input type="button" value="Edit" onClick="editstudentprofile()" name="edt1" id="edt1" style="width:60px; cursor:pointer"/>
                      <input type="button" style="display:none; width:60px;cursor:pointer" value="Update" onClick="updatestudentprofile()" name="upd1" id="upd1" />
                   
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
    			 <img src="uploads/StudentImage/<?php print $Profile_Image ?>" height="180" width="180"/>
                 <?php
				 }
				 ?>
                </label>
                <input type="hidden" name="hdn_sessionid" id="hdn_sessionid" value="<?php print $session; ?>">
               
                
                </div>
                </td>
            </tr>
            <tr>
              <td valign="top">
               <div style="float:left;" id="divupdate"> <br/>
                    <li>University: <?php print $schoolName; ?></li>
                    <li>Program: <?php print $Program; ?></li>
                    <li>Contact: <?php print $Email; ?></li>
                  </div>
               
              <div style="float:left; display:none" id="divedit">
              <select name="txtSchool" id="txtSchool">
              <option value="">Select University</option>
              <option value="University of toronto" <?php if($schoolName1=='University of toronto'){?> selected='selected' <?php  } ?>>University of Toronto</option>
              <option value="University of Waterloo" <?php if($schoolName1=='University of Waterloo'){?> selected='selected' <?php  } ?>>University of Waterloo</option>
              <option value="Ryerson University" <?php if($schoolName1=='Ryerson University'){?> selected='selected' <?php  } ?>>Ryerson University</option>
               <option value="York University" <?php if($schoolName1=='York University'){?> selected='selected' <?php  } ?>>York University</option>
              </select>
              <br/>
               <select name="txtProgram" id="txtProgram">
              <option value="">Select Program</option>
              <option value="Electrical Engineering" <?php if($Program1=='Electrical Engineering'){?> selected='selected' <?php  } ?>>Electrical Engineering</option>
              <option value="Computer Engineering" <?php if($Program1=='Computer Engineering'){?> selected='selected' <?php  } ?>>Computer Engineering</option>
              <option value="Chemical Engineering" <?php if($Program1=='Chemical Engineering'){?> selected='selected' <?php  } ?>>Chemical Engineering</option>
               <option value="Civil Engineering" <?php if($Program1=='Civil Engineering'){?> selected='selected' <?php  } ?>>Civil Engineering</option>
              </select>
                  
                  <br/>
                  
                <ul>
                  <li>Contact: <?php print $Email; ?></li>
                  </ul>
                  <br/>
                    <div style="float:left;color:#F00; font-weight:400; padding-top:1px; display:none" id="error2"></div>
                   <br/>
                </div></td>
            </tr>
          </table>
           </form>
           
           
           
           

           </div>      
             <div class="grid_8" style="min-height:295px;">
             
          <div>
                       <div style="float:left;">
              <h4 style="margin:20px;">About Me (+100 Coins) </h4>             
            </div>
           
            <div style="float:right; padding-right:20px; padding-top:10px;">
              <input type="button" value="Edit" onClick="editstudentabout();" name="about_edit" id="about_edit" style="width:60px;cursor:pointer">
              <input type="button" value="Update" onClick="updatestudentabout();" style="display:none; width:60px;cursor:pointer" name="about_update" id="about_update" >
            </div>
          </div>
 <div style="float:left;color:#F00; font-weight:400; padding-top:50px; display:none" id="error1"></div>
          <div>&nbsp;</div>
          <div>&nbsp;</div>
          <div>&nbsp;</div>
          
          <p align="justify" style="width:415px; min-height:190px; border:1px solid;border-color:#CCCCCC; margin:20px;" id="para_aboutme"><?php print $AboutMe; ?>
          </p>
         
          <textarea id="aboutme"  name="aboutme" style="width:400px; height:170px;margin:20px; display:none;" placeholder="Tell About Me" ><?php print $AboutMe1; ?></textarea>
        </div>
        
        
        
        
        
        
			 
			 <div class="grid_8" style="background-color:#333333; float:right; margin:0px 14px 0px 0px;">
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
			<div style="width:490px; float:right; text-align:center; margin:0px 14px 0px 0px;">get more 2x coins by inviting more friends now</div>
			<div style="width:490px; float:right; text-align:center; margin:0px 14px 0px 0px; display:none;color:#F00; font-weight:400;" id="error"></div>
            			 
			  <div class="" style="float:right; width:600px;">
                <span style="margin:20px 0px 0px 0px; float:right;"><a href="ActivationMail.php?verid=<?php print $session ; ?>" class="button red">Skip</a> <a href="ActivationMail.php?verid=<?php print $session ; ?>" class="button red">Finish</a></span>
				
			      
        </div><!-- end grid columns -->

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