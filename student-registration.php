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

<!--[if IE 8]><link rel="stylesheet" href="css/ie.css" type="text/css" media="screen"/><![endif]-->
<!--[if IE 7]><link rel="stylesheet" href="css/ie.css" type="text/css" media="screen"/><![endif]-->


<!--  Tool Tip  -->
<style>
  a.tooltip {outline:none; }
a.tooltip strong {line-height:30px;}
a.tooltip:hover {text-decoration:none;} 
a.tooltip span {
    z-index:10;display:none; padding:14px 20px;
    margin-top:-50px; margin-left:-250px;
    width:240px; line-height:16px;
}
a.tooltip:hover span{
    display:inline; position:absolute; color:#111;
    border:1px solid #DCA; background:#fffAF0;}

    
/*CSS3 extras*/
a.tooltip span
{
    border-radius:4px;
    -moz-border-radius: 4px;
    -webkit-border-radius: 4px;
        
    -moz-box-shadow: 5px 5px 8px #CCC;
    -webkit-box-shadow: 5px 5px 8px #CCC;
    box-shadow: 5px 5px 8px #CCC;
}
</style>

<!-- Tool Tip  -->

<!-- Load Jquery/Modernizr Javascript -->
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script type="text/javascript" src="js/modernizr.js"></script>


<!--  Validate Engine  -->
<script type="text/javascript">
function checkaval(usr)
{
	
	//alert(usr);
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
			
			if(resText == 1)
			{
				document.getElementById("error").style.display='block';
		        document.getElementById("error").innerHTML='E-mail address already exists';
				document.getElementById('Email').value="";
				document.getElementById('Email').focus();
			}
			else if(resText == 2)
			{
				document.getElementById("error").style.display='block';
		        document.getElementById("error").innerHTML='This e-mail address has already been registered as a recruiter!';
				document.getElementById('Email').value="";
				document.getElementById('Email').focus();
			}
			else
			{
			    document.getElementById("error").style.display='none';	
			}
			
			
		
		}
	  }
	xmlhttp.open("GET","ajaxpage/ajaxCheckEmail.php?userName="+usr,true);
	xmlhttp.send();
}



function checkuser(usr)
{
	
	
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
			
			if(resText == 1)
			{
				document.getElementById("error").style.display='block';
		         document.getElementById("error").innerHTML='Username already exists';
				document.getElementById('UserName').value="";
				document.getElementById('UserName').focus();
				
			
			}
			else
			{
			    document.getElementById("error").style.display='none';	
			}
			
			
			
			
		
		}
	  }
	xmlhttp.open("GET","ajaxpage/ajaxCheckEmail.php?User="+usr,true);
	xmlhttp.send();
}



</script>


<script type="text/javascript">
function trim(str) 
{
        return str.replace(/^\s+|\s+$/g,"");
}

function check()
{
	//alert("HI");
	if(document.getElementById("FirstName").value=="")
	{
		document.getElementById("error").style.display='block';
		document.getElementById("error").innerHTML='You have a first name, right?';
		document.getElementById("FirstName").focus();
		return false;
	}
	if(document.getElementById("LastName").value=="")
	{
		document.getElementById("error").style.display='block';
		document.getElementById("error").innerHTML='You also have a last name, right?';
		document.getElementById("LastName").focus();
		return false;
	}
	if(document.getElementById("Company").value=="")
	{
		document.getElementById("error").style.display='block';
		document.getElementById("error").innerHTML='Which school do you go to? Select one!';
		document.getElementById("Company").focus();
		return false;
	}
	if(document.getElementById("Address").value=="")
	{
		document.getElementById("error").style.display='block';
		document.getElementById("error").innerHTML='Where do you live? Enter your city!';
		document.getElementById("Address").focus();
		return false;
	}
	if(document.getElementById("Country").value=="")
	{
		document.getElementById("error").style.display='block';
		document.getElementById("error").innerHTML='Which country do you live in? Enter your country!';
		document.getElementById("Country").focus();
		return false;
	}
	if(document.getElementById("Email").value=="")
	{
		document.getElementById("error").style.display='block';
		document.getElementById("error").innerHTML='Please enter your e-mail address';
		document.getElementById("Email").focus();
		return false;
	}
	if(document.getElementById("Email").value!="")
	{
		var x=document.getElementById("Email").value;
		var n=x.split("@");
		var clsub=trim(n[1]);
		var s2="mail.utoronto.ca";
        var s3="utoronto.ca";
		
		if ( (clsub.toString() != s2.toString()) &&  (clsub.toString() != s3.toString()))
		{
			
			document.getElementById("error").style.display="block";
			document.getElementById("error").innerHTML='Please use your UTOR email address. (@mail.utoronto.ca or @utoronto.ca). Registration is only open to UofT students for now, sorry!';
			document.getElementById("Email").focus();
			   return false;
		  }
	}
	if(document.getElementById("UserName").value=="")
	{
		document.getElementById("error").style.display='block';
		document.getElementById("error").innerHTML='Please enter a username';
		document.getElementById("UserName").focus();
		return false;
	}
	if(document.getElementById("password1").value=="")
	{
		document.getElementById("error").style.display='block';
		document.getElementById("error").innerHTML='Please enter a password';
		document.getElementById("password1").focus();
		return false;
	}
	if(document.getElementById("password2").value=="")
	{
		document.getElementById("error").style.display='block';
		document.getElementById("error").innerHTML='Please confirm the password you\'ve chosen';
		document.getElementById("password2").focus();
		return false;
	}
	if(document.getElementById("password2").value!=document.getElementById("password1").value)
	{
		document.getElementById("error").style.display='block';
		document.getElementById("error").innerHTML='The entered passwords do not match. Put the booze down and please try again';
		document.getElementById("password2").focus();
		return false;
	}
	
	return true;
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
        <div id="logo"><a href="index.php"><img src="images/logo.png" alt="interngration" width="400" height="64" /></a></div>
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
                <h1>Student Registration</h1>
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
            
            <div class="grid_16">
                <form action="savestudentregister.php" method="post" name="frm" id="frm" onSubmit="return check();">
                <p id="error" style="padding-left:60px; display:none; padding-top:5px; height:30px; color:#F00; font-weight:400; background-color:##CCC;"></p>
                <div class="one-half"><h4>Basic Information</h4>
<div style="margin-top:20px;">First Name &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" size="30"  name="FirstName" id="FirstName" placeholder="Enter First Name"><br><br>
Last Name &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" size="30"  name="LastName" id="LastName" placeholder="Enter Last Name"><br><br>
University &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp;<select name="Company" id="Company" style="width:230px;">
              <option value="">Select University</option>
              <option value="University of Toronto" >University of Toronto</option>
              <option value="University of Waterloo">University of Waterloo</option>
              </select><br><br>
City &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="Address" id="Address" size="30" placeholder="Enter City" ><br><br>
Country &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="Country" id="Country" size="30" placeholder="Enter Country" ><br><br>
</div>
                </div>
                
                <div class="one-half-last"><h4>Account Information</h4>
<div style="margin-top:20px;">
 
 E-mail &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<a class="tooltip"><input type="text" size="30" placeholder="Enter Email"  name="Email" id="Email" onChange="checkaval(this.value)"><span>
        E-mail address cannot be changed
    </span></a><br><br>
    
User Name &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <a class="tooltip"><input type="text" size="30" placeholder="Enter User Name"   name="UserName" id="UserName" onchange="checkuser(this.value)"><span>
        Username cannot be changed
    </span></a>
<br><br>
Password &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<input type="password" size="30" placeholder="Enter Password"  name="password1" id="password1"><br><br>
Confirm Password &nbsp; &nbsp;<input type="password" size="30"  name="password2" id="password2" placeholder="Confirm password"><br><br>
</div>
                </div>     
 <div class="grid_4">

 
  <input type='submit' name="Next" value="Next" class="button-big red" />

 <br><br><br>All fields are mandatory.  </div>   
   </form>
            </div>
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