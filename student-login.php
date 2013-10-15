<!DOCTYPE HTML>
<html lang="en" class="no_js">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Student Login - Interngration</title>
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
		
		document.getElementById("error").innerHTML='Please Wait...';
		
		}
	  if (xmlhttp.readyState==4 && xmlhttp.status==200)
		{
		
			var resText=xmlhttp.responseText;
			
			//alert(resText);
		
						if(resText == 1)
			{
				document.getElementById("error").innerHTML='Username and/or password incorrect';
				document.getElementById('uname').value="";
				document.getElementById('pwd').value="";
				document.getElementById('uname').focus();
				return false;
				
			}
			if(resText == 2)
			{
				window.location="student-homepage.php";
							
			}
			else
			{
			    document.getElementById("error").style.display='none';	
			}			
		}
	  }
	xmlhttp.open("GET","ajaxpage/ajaxlogincheck.php?User="+uname+"&Pass="+passwd,true);
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
        <div id="logo"><a href="index.php"><img src="images/logo.png" alt="interngration" width="400" height="64" /></a></div>
         <!-- header nav menu -->        
        <div id="menu" class="menu"> 
               <ul><li><a href="index.php">Home</a></li></ul>
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
                <h1>Student Login</h1>
            </div>        
        </div>                          
    <!-- body -->
    <div id="body-wrapper" class="container_16">
    <div class="clear"></div>
	
		<!-- grid columns -->
		<div class="section">
          
       		<!-- title -->
            <div class="title grid_16">          
            </div>                    
                
          <!-- 4/16 -->                
            <div class="grid_12">
            
             <p id="error" style="padding-left:60px; padding-top:5px; height:30px; color:#F00; font-weight:400; background-color:##CCC;"></p>
            
            <?php
			include "config.php";
			
			if(isset($_GET["activationid"]))
			{
			$activationid = $_GET["activationid"];
			
			$ses_result=mysql_select_db($dbname) or die(mysql_error());
			$sql="Select *  from student_register_temp  where session_id='".$activationid."'";
			$ses_result=mysql_query($sql);
			$rowcount= mysql_num_rows($ses_result);
			
			if($rowcount>0)
			{
				$sqlInsert = "INSERT INTO student_register (FirstName,LastName,Company,Address,Country,Email,UserName,Password,Profile_Image,AboutMe,schoolName,Program,Contact,session_id,ref_id,Coins) SELECT a.FirstName,a.LastName,a.Company,a.Address,a.Country,a.Email,a.UserName,a.Password,a.Profile_Image,a.AboutMe,a.schoolName,a.Program,a.Contact,a.session_id,a.ref_id,a.Coins FROM student_register_temp AS a WHERE a.session_id='".$activationid."' ORDER BY id LIMIT 1";
				
				//print $sqlInsert;
				$result=mysql_db_query($dbname,$sqlInsert,$link);
				
				$sqldelete="delete from student_register_temp where session_id='".$activationid."'";
				$result1=mysql_db_query($dbname,$sqldelete,$link);
				
				
				//Mail Function
				
		$ses_result1=mysql_select_db($dbname) or die(mysql_error());
		$sql1="Select *  from student_register  where session_id='".$activationid."'";
		$ses_result1=mysql_query($sql1);
		$res1=mysql_fetch_array($ses_result1);
		$mailid=$res1['Email'];
		
		$FirstName=ucfirst(strtolower($res1['FirstName']));
		$LastName=ucfirst(strtolower($res1['LastName']));
				
		
		$uname=$FirstName." ".$LastName;


	    $myFile = "StudentConfirmationMail.html";
		$fh = fopen($myFile,'r');
		$theData = fread($fh, filesize($myFile));
		fclose($fh);
		$theData1 = $theData;
				
		$theData = $theData1;
		
		$theData =  str_replace("~actid~",$verid,$theData);
		$theData =  str_replace("~uname~",$uname,$theData);
		
		                     
		
		$subject="Interngration - Account Confirmation";
		
		
		$headers  = 'MIME-Version: 1.0'."\n";
		$headers .= 'Content-type: text/html; charset=iso-8859-1'."\n";
		$headers .= "From: Interngration<info@interngration.com>\r\n";	
		$headers .= "Reply-To: info@interngration.com\r\n";
		$headers .= "Return-path: info@interngration.com";
		mail($mailid,$subject,$theData, $headers);
		
		//Mail Function
				
				
				
				?>
                 <p id="error1" style="padding-top:5px; height:30px; color:#F00; font-weight:400;">
                 <?php
				
				    echo "Your account has been activated, welcome! Please login to your account and complete your student profile.";
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
            <p id="error2" style="padding-top:5px; height:30px; color:#F00; font-weight:400; background-color:#CCC">
            <?php
			            if($stats=='1')
			{		
			    echo "Please check your e-mail to activate your account.";
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
				
			echo "Your login details have been sent to your e-mail.";
			}
			
			?>
            </p>
            <?php
			}
			?>
                <p>
                  <form action="" method="post" name="frm" id="frm" >
                    Username <input type="text" size="30" name="uname" id="uname" placeholder="Username"><br><br>
                    Password <input type="password" size="30" name="pwd" id="pwd" placeholder="Password"><br><br>
                    <span style="margin:0px 30px 0px 0px; float:right;"><a href="student-registration.php" class="button red">Register</a> 
                      <a onClick="chklogin();" class="button red">Login</a></span><br><br>
                    <span style="margin:0px 0px 0px 130px;"><a href="student-forget-password.php">Forgot Your Password ?</a></span></p>   
                  </form>                 
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
