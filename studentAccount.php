<?php
session_start();

if(isset($_SESSION["uid"]))
{
	$username=$_SESSION["uname"];
	$uid=$_SESSION["uid"];
	$mail_id=$_SESSION["mail_id"];
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
<title>Student Account</title>
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

<?php

		include "config.php"; 	
		$ses_result=mysql_select_db($dbname) or die(mysql_error());
					
		$sqlget="Select *  from student_register where id='$uid'";
		
		$ses_result=mysql_query($sqlget);
		$rowcount= mysql_num_rows($ses_result);	
		
	
		if ($rowcount>0)
		{
			$res=mysql_fetch_array($ses_result);
			
			$FirstName=$res["FirstName"];
			$LastName=$res["LastName"];
			$Company=$res["Company"];
			$Address=$res["Address"];
			$Country=$res["Country"];
			$Email=$res["Email"];
			$UserName=$res["UserName"];
			
		}
	

			
?>



<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script type="text/javascript" src="js/modernizr.js"></script>


<!--  Validate Engine  -->
<script type="text/javascript">
function chkoldpass(opass)
{
	var opass=opass;
	var userid=document.getElementById("userid").value;
	
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
		
			var resText=xmlhttp.responseText;
			
			
			if(resText == 2)
			{
				document.getElementById("error").style.display='block';
		         document.getElementById("error").innerHTML='Old password is not correct!';
				document.getElementById('oldpassword').value="";
				document.getElementById('oldpassword').focus();
				
			
			}
			else
			{
			    document.getElementById("error").style.display='none';	
			}
			
			
		
		}
	  }
	xmlhttp.open("GET","ajaxpage/ajaxstudentpasschk.php?opass="+opass+"&userid="+userid,true);
	xmlhttp.send();
}



function updatestudentaccount()
{
	var FirstName=document.getElementById("FirstName").value;
	var LastName=document.getElementById("LastName").value;
	var Company=document.getElementById("Company").value;
	var Address=document.getElementById("Address").value;
	var Country=document.getElementById("Country").value;
	var oldpassword=document.getElementById("oldpassword").value;
	var password1=document.getElementById("password1").value;
	var password2=document.getElementById("password2").value;
	var userid=document.getElementById("userid").value;
	
	if(FirstName=="")
	{
		document.getElementById("error").style.display='block';
		document.getElementById("error").innerHTML='Enter the First Name...!';
		document.getElementById("FirstName").focus();
		return false;
	}
	if(LastName=="")
	{
		document.getElementById("error").style.display='block';
		document.getElementById("error").innerHTML='Enter the Last Name...!';
		document.getElementById("LastName").focus();
		return false;
	}
	if(Company=="")
	{
		document.getElementById("error").style.display='block';
		document.getElementById("error").innerHTML='Select Affiliated University...!';
		document.getElementById("Company").focus();
		return false;
	}
	if(Address=="")
	{
		document.getElementById("error").style.display='block';
		document.getElementById("error").innerHTML='Enter the City...!';
		document.getElementById("Address").focus();
		return false;
	}
	if(Country=="")
	{
		document.getElementById("error").style.display='block';
		document.getElementById("error").innerHTML='Enter the Country...!';
		document.getElementById("Country").focus();
		return false;
	}
	if((oldpassword!="")||(password1!="")||(password2!=""))
	{
	
	if(document.getElementById("oldpassword").value=="")
	{
		document.getElementById("error").style.display='block';
		document.getElementById("error").innerHTML='Enter the Old Password...!';
		document.getElementById("oldpassword").focus();
		return false;
	}
	
	if(document.getElementById("password1").value=="")
	{
		document.getElementById("error").style.display='block';
		document.getElementById("error").innerHTML='Enter the New Password...!';
		document.getElementById("password1").focus();
		return false;
	}
	if(document.getElementById("password2").value=="")
	{
		document.getElementById("error").style.display='block';
		document.getElementById("error").innerHTML='Enter the Confirm Password...!';
		document.getElementById("password2").focus();
		return false;
	}
	if(document.getElementById("password2").value!=document.getElementById("password1").value)
	{
		document.getElementById("error").style.display='block';
		document.getElementById("error").innerHTML='Confirm Password is not incorrect...!';
		document.getElementById("password2").focus();
		return false;
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
		
		
		
		}
	  if (xmlhttp.readyState==4 && xmlhttp.status==200)
		{
			
			 document.getElementById('editpage').style.display="none";
			 document.getElementById('normalpage1').style.display="block";
			 document.getElementById('normalpage1').innerHTML=xmlhttp.responseText;
			
			
		}
	  }
	xmlhttp.open("GET","ajaxpage/ajaxUpdateAccount.php?FirstName="+FirstName+"&LastName="+LastName+"&Company="+Company+"&Address="+Address+"&Country="+Country+"&password2="+password2+"&userid="+userid,true);
	xmlhttp.send();
}



function editstudentaccount()
{
	 
	  document.getElementById('normalpage').style.display="none";
	  document.getElementById('normalpage1').style.display="none";
	  document.getElementById('editpage').style.display="block";
	  document.getElementById('editacc').style.display="none";
	  document.getElementById('updtacc').style.display="block";	  
	 
}

</script>



<!--  Validate Engine  -->

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
                <h1>Student Account Setting</h1><span style="margin:0px 30px 0px 0px; float:right;">
                <a href="StudentRegisteredWebinar.php" class="button red">Upcoming Webinars</a>
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
           
       		<!-- title -->
            <div class="title grid_16"></div>                    
			<!-- one half-->
            
            <!--  Normal Page -->
            <div class="grid_16" id="normalpage1"></div>
            <div class="grid_16" id="normalpage">
               
               <div class="one-half"><h4>Basic Information</h4>
<div style="margin-top:20px;">First Name &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;<?php print $FirstName; ?><br><br>
Last Name &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;<?php print $LastName; ?><br><br>
Affiliated University &nbsp; &nbsp; &nbsp; : &nbsp;&nbsp;<?php print $Company; ?><br><br>
City &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;&nbsp;  : &nbsp;&nbsp;<?php print $Address; ?><br><br>
Country &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; : &nbsp;&nbsp;<?php print $Country; ?><br><br>
</div>
                </div>
                
                <div class="one-half-last"><h4>Account Information</h4>
<div style="margin-top:20px;">
Email &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;: &nbsp;&nbsp;<?php print $Email; ?><br><br>
User Name &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; : &nbsp;&nbsp;<?php print $UserName; ?>
</div>
                </div>     
 <div class="grid_4">
 
 
  <input type='button' name="Edit" value="Edit" id="editacc" class="button-big red" onClick="editstudentaccount();" />


  </div>   
  
            </div>
                        <!--  Normal Page -->

     <!--  Edit Page -->
            
            <div class="grid_16" style="display:none;" id="editpage">
               
                <p id="error" style="padding-left:60px; display:none; padding-top:5px; height:30px; color:#F00; font-weight:400; background-color:##CCC;"></p>
                <div class="one-half"><h4>Basic Information</h4>
<div style="margin-top:20px;">First Name &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" size="30"  name="FirstName" id="FirstName" value="<?php print $FirstName; ?>"><br><br>
Last Name &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" size="30"  name="LastName" id="LastName" value="<?php print $LastName; ?>"><br><br>
Affiliated University &nbsp; &nbsp; &nbsp;

<select name="Company" id="Company" style="width:230px;">
              <option value="">Select University</option>
              <option value="University of Toronto" <?php if($Company=='University of Toronto'){?> selected='selected' <?php  } ?> >University of Toronto</option>
              <option value="University of Waterloo" <?php if($Company=='University of Waterloo'){?> selected='selected' <?php  } ?>>University of Waterloo</option>
              </select>
              <br><br>
City &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="Address" id="Address" size="30" value="<?php print $Address; ?>" ><br><br>
Country &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="Country" id="Country" size="30" value="<?php print $Country; ?>" ><br><br>
</div>
                </div>
                
                <div class="one-half-last"><h4>Account Information</h4>
<div style="margin-top:20px;">
Email &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;: &nbsp;&nbsp;<?php print $Email; ?><br><br>
User Name &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;: &nbsp;&nbsp;<?php print $UserName; ?> <br><br>
Old Password &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="password" size="30"  name="oldpassword" id="oldpassword" onChange="chkoldpass(this.value);"><br><br>
New Password &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="password" size="30"  name="password1" id="password1"><br><br>
Confirm Password &nbsp; &nbsp;<input type="password" size="30"  name="password2" id="password2"><br><br>
</div>
                </div>     
 <div class="grid_4">
 
 
  <input type='button' name="Update" value="Update" class="button-big red" onClick="updatestudentaccount();" id="updtacc" />

  </div>   
  
            </div>
            
            <!--  Edit Page -->
            
            <input type="hidden" name="userid" id="userid" value="<?php print $uid ?>" />
            <!-- end one-half -->                
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
