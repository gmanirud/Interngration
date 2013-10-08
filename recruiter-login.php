<!DOCTYPE HTML>
<html lang="en" class="no_js">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Recruiter Login - Interngration</title>
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
<script language="javascript1.1">

$(document).keypress(function(event){
 var keycode = (event.keyCode ? event.keyCode : event.which);
    if (keycode == '13') 
	{
         chklogin();
    }
});


function chklogin()
{
	
	var uname=document.getElementById('uname').value;
	var passwd=document.getElementById('pwd').value;
	
	
	
	if(uname=="")
	{
		
		document.getElementById("error").innerHTML='Please enter your username';
		document.getElementById('uname').focus();
		return false;
	}
	if(passwd=="")
	{
		
		document.getElementById("error").innerHTML='Please enter your password';
		document.getElementById('pwd').focus();
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
		
		document.getElementById("error").innerHTML='Login Checking......';
		
		}
	  if (xmlhttp.readyState==4 && xmlhttp.status==200)
		{
		
			var resText=xmlhttp.responseText;
			
			
		
						if(resText == 1)
			{
				
				document.getElementById("error").innerHTML='User Name / Password Incorrect';
				document.getElementById('uname').value="";
				document.getElementById('pwd').value="";
				document.getElementById('uname').focus();
				
				
			}
			if(resText == 2)
			{
				window.location="recruiter-home-page.php";
					
				
			}
			/*else
			{
			    document.getElementById("error").style.display='none';	
			}*/
			
		}
	  }
	xmlhttp.open("GET","ajaxpage/ajaxRecruiterlogincheck.php?User="+uname+"&Pass="+passwd,true);
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
               <ul><li><a href="index.php">Home</a></li></ul>
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
                <h1>Recruiter Login</h1>
            </div>        
        </div>        
                          
    <!-- body -->
    <div id="body-wrapper" class="container_16">
    <div class="clear"></div>
	
		<!-- grid columns -->
		<div class="section">
           
       		<!-- title -->
            <div class="title grid_16"></div>                    
                
          <!-- 4/16 -->                
            <div class="grid_12">
            <p id="error" style="padding-left:60px; padding-top:5px; height:30px; color:#F00; font-weight:400; background-color:##CCC;"></p>
               <?php
			include "config.php";
			
			if(isset($_GET["activationid"]))
			{
			$activationid = $_GET["activationid"];
			
			$ses_result=mysql_select_db($dbname) or die(mysql_error());
			$sql="Select *  from recruiter_register_temp  where session_id='".$activationid."'";
			$ses_result=mysql_query($sql);
			$rowcount= mysql_num_rows($ses_result);
			
			if($rowcount>0)
			{
				$sqlInsert = "INSERT INTO recruiter_register (FirstName,LastName,Company,Address,Email,UserName,Password,Profile_Image,AboutMe,companyName,hrLead,Contact,academic_background,session_takes,session_id) SELECT a.FirstName,a.LastName,a.Company,a.Address,a.Email,a.UserName,a.Password,a.Profile_Image,a.AboutMe,a.companyName,a.hrLead,a.Contact,a.academic_background,a.session_takes,a.session_id FROM recruiter_register_temp AS a WHERE a.session_id='".$activationid."' ORDER BY id LIMIT 1";
				
				//print $sqlInsert;
				$result=mysql_db_query($dbname,$sqlInsert,$link);
				
				$sqldelete="delete from recruiter_register_temp where session_id='".$activationid."'";
				$result1=mysql_db_query($dbname,$sqldelete,$link);
				
				
				$ses_result2=mysql_select_db($dbname) or die(mysql_error());
				$sql2="Select *  from recruiter_register  where session_id='".$activationid."'";
				$ses_result2=mysql_query($sql2);
				$res2=mysql_fetch_array($ses_result2);
				$mailid=$res2['Email'];
				
				
				$FirstName=ucfirst(strtolower($res2['FirstName']));
				$LastName=ucfirst(strtolower($res2['LastName']));

				$uname=$FirstName." ".$LastName;
				
				
				$myFile = "RecruiterConfirmationMail.html";
				$fh = fopen($myFile,'r');
				$theData = fread($fh, filesize($myFile));
				fclose($fh);
				$theData1 = $theData;
						
				$theData = $theData1;
				
				$theData =  str_replace("~actid~",$sId,$theData);
				$theData =  str_replace("~uname~",$uname,$theData);
				
									 
				
				$subject="Interngration - Recruiter Account Confirmation Mail";
				
				
				$headers  = 'MIME-Version: 1.0'."\n";
				$headers .= 'Content-type: text/html; charset=iso-8859-1'."\n";
				$headers .= "From: Interngration<info@interngration.com>\r\n";	
				$headers .= "Reply-To: info@interngration.com\r\n";
				$headers .= "Return-path: info@interngration.com";
				mail($mailid,$subject,$theData, $headers);
				
				
				?>
                
                 <p id="error1" style="padding-top:5px; height:30px; color:#F00; font-weight:400; background-color:##CCC;">
                 <?php
				
				echo "Your account has been successfully activated, welcome!";
				?>
                </p>
                <?php
				
			}
			}
			

			?>
            
             <?php
			
			if(isset($_GET['status']))
			{
				$stats=$_GET['status'];
				

			?>
            <p id="error2" style="padding-top:5px; height:30px; color:#F00; font-weight:400; background-color:#9CC;">
           
            <?php
			            if($stats=='1')
			{
				
			echo "Please check your e-mail for the activation link.";
			}
			
			?>
            </p>
            <?php
			}
			?>
            
            
             <?php
			
			if(isset($_GET['msend']))
			{
				$stats=$_GET['msend'];
				

			?>
            <p id="error2" style="padding-top:5px; height:30px; color:#F00; font-weight:400; background-color:#CCC; width:500px;">
            <?php
			            if($stats=='1')
			{
				
			echo "Your login details has been sent to your Email Account. Please check your Mail";
			}
			
			?>
            </p>
            <?php
			}
			?>
            
            
            
                <p>
User Name <input type="text" size="30" name="uname" id="uname" placeholder="Username"><br><br>
Password &nbsp; &nbsp;<input type="password" size="30" name="pwd" id="pwd" placeholder="Password"><br><br>
<span style="margin:0px 30px 0px 0px; float:right;"><a href="recruiter-registration.php" class="button red">Register</a> <a onClick="return chklogin();" class="button red">Login</a></span><br><br>
<span style="margin:0px 0px 0px 130px;"><a href="recruiter-forget-password.php">Forgot Your Password?</a></span></p>                    
            </div>                    
          
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