<!DOCTYPE HTML>
<html lang="en" class="no_js">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Student Password Reset - Interngration</title>
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

function chkpassword()
{
	
	var rec_Email=document.getElementById('rec_Email').value;
	
	
	if(rec_Email=="")
	{
		
		document.getElementById("error").innerHTML='Please enter an e-mail address';
		return false;
	}
	if(document.getElementById("rec_Email").value!="")
	{
		var x=document.getElementById("rec_Email").value;
		var atpos=x.indexOf("@");
		var dotpos=x.lastIndexOf(".");
		if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length)
		{
			document.getElementById("error").style.display="block";
			document.getElementById("error").innerHTML='The e-mail address you\'ve entered is not valid!';
			document.getElementById("rec_Email").focus();
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
		
		document.getElementById("error").innerHTML='Checking..';
		
		}
	  if (xmlhttp.readyState==4 && xmlhttp.status==200)
		{
		
			var resText=xmlhttp.responseText;
			
			//alert(resText);
		
			if(resText == 1)
			{
				/*document.getElementById("error").innerHTML='block';
				document.getElementById("error").innerHTML='Login details send to your Email Account';
				document.getElementById('rec_Email').value="";*/
				window.location.href="student-login.php?msend=1";
				
			}
			if(resText == 2)
			{
				document.getElementById("error").innerHTML='block';
				document.getElementById("error").innerHTML='This e-mail address is not registered!';
				document.getElementById('rec_Email').value="";
			}
			
			
		}
	  }
	xmlhttp.open("GET","ajaxpage/ajaxStudentforgetmail.php?rec_Email="+rec_Email,true);
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
    </div> 
    </div> 
    </div>
    <!-- end header -->     
    <div id="body-background"><!-- this is the main background color of the page -->
    <div id="header-buffer"></div><!-- hack for header overlap **DONT'TOUCH** -->
    
    <!-- page header -->
        <div id="pageheader-background"><!-- area with alternate background -->
            <div class="pageheader-title">
                <h1>Forgot Your Password?</h1>
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
                <p>
Enter your e-mail address <input type="text" size="30" name="rec_Email" id="rec_Email" placeholder="e-mail"><br><br>
<span style="margin:0px 30px 0px 0px; float:right;"><a onClick="chkpassword();" class="button red">Submit</a></span><br><br></p>                    
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