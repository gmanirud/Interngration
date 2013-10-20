<?php
session_start();

if(isset($_SESSION["uid"]))
{
	$username=$_SESSION["uname"];
	$uid=$_SESSION["uid"];
	$mail_id=$_SESSION["mail_id"];
	$webId=$_SESSION["webId"];
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
<title>Reply Comment</title>
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
 <?php
			if(isset($_GET['qid']))
			{
			$_SESSION["qid"]=$_GET['qid'];
			}
			
			$qid=$_SESSION["qid"];
			
			
?>


<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script type="text/javascript" src="js/modernizr.js"></script>


<script type="text/javascript">
function chkval()
{
	
	if(comment=="")
	{
		document.getElementById("error").style.display='block';
		document.getElementById("error").innerHTML='Enter the Title...!';
		document.getElementById("comment").focus();
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
        <div id="logo"><a href="student-homepage.php"><img src="images/logo.png" alt="interngration" width="400" height="64" /></a></div>
         <!-- header nav menu -->        
        <div id="menu" class="menu"> 
               <ul>
                <li><a href="">Welcome&nbsp; :&nbsp; <?php print $username; ?></a></li>
               <li><a href="student-homepage.php">Home</a></li></ul>
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
                <h1>Reply Forum</h1><span style="margin:0px 30px 0px 0px; float:right;">
                 <a href="StudentRegisteredWebinar.php" class="button red"> My Webinars</a>
                   <a href="StudentWatchedWebinar.php" class="button red">Watched Webinar</a>    
                <a href="studentJobApplication.php" class="button red">JobApplication</a> 
                 <a href="AppliedPostedJob.php" class="button red">Applied Job</a> 
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
			<!-- one half-->
            
            <?php
			
						include "config.php"; 	
						$ses_result=mysql_select_db($dbname) or die(mysql_error());									
						$sqlget="Select *  from question_table where id='$qid' ";						
						$ses_result=mysql_query($sqlget);
						$rowcount= mysql_num_rows($ses_result);	
						if($rowcount=='0')
						{
							?>
                            <table border="0" width="100%">
                            <tr>
                            <td>&nbsp;
                            
                            </td>
                            </tr>
                            <tr align="center">
                            <td style="color:#F00; font-size:14px;">
                            No Question Post Found
                            </td>
                            </tr>
                            </table>
                            <?php

						}
						else
						{
						while($res=mysql_fetch_array($ses_result))
						{
							
			    			$Webinar_id=$res["Webinar_id"];
								$Titile=$res["Titile"];
								$Description=$res["Description"];
								$Posted_by=$res["Posted_by"];
								$Posted_Date=$res["Posted_Date"];
								$id=$res["id"];
							
							$stdate = date_create($starttime);
								$stdt=date_format($stdate, 'Y-m-d');
								$sttime = date_create($starttime);
								$stte=date_format($sttime, 'h:i a');
								$endate = date_create($endTime);
								$endt=date_format($endate, 'Y-m-d');
								$entime = date_create($endTime);
								$ente=date_format($entime, 'h:i a');
			?>
            <div class="post-out-text"  style="min-width:950px;">     
					    <div class="header-container" style="min-width:950px;">
                                <!--<div class="date"><ul><li>Register Id:  <?php print $webinar_id; ?></li><li>Registered Date:  <?php print $reg_date; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</li>
                                <?php
								if($status=='Cancelled')
								{
								?>
                                <li> Cancelled</li>
                                <?php
								}
								?>
                                </ul></div>-->
                                <h4><?php print $Titile; ?></h4>
                      <p class="post-subtitle" style="font-size:12px;">Posted date: <?php print $Posted_Date; ?></p>
                            </div>                          
							<div class="padding10 float-left" align="justify"><p><?php print $Description; ?><br>
                            
                            </p></div>
                                                       
				 </div>
                 <?php
						}
						}
						?>
                        
                        
                        
                        
                         <div class="title grid_16"></div>  
                         
                            <?php
										
						$sqlget1="Select *  from replied_table where Question_id='$qid' ";						
						$ses_result1=mysql_query($sqlget1);
						$rowcount1= mysql_num_rows($ses_result1);	
						if($rowcount1=='0')
						{
							?>
                            <table border="0" width="100%">
                            <tr>
                            <td>&nbsp;
                            
                            </td>
                            </tr>
                            <tr align="center">
                            <td style="color:#F00; font-size:14px;">
                            No Comments Found
                            </td>
                            </tr>
                            </table>
                            <?php

						}
						else
						{
						while($res1=mysql_fetch_array($ses_result1))
						{
							
			    			$Webinar_id=$res1["Webinar_id"];
								$Question_id=$res1["Question_id"];
								$Comment=$res1["Comment"];
								$Reply_Mail=$res1["Reply_Mail"];
								$Reply_Date=$res1["Reply_Date"];
								
							
							$stdate = date_create($starttime);
								$stdt=date_format($stdate, 'Y-m-d');
								$sttime = date_create($starttime);
								$stte=date_format($sttime, 'h:i a');
								$endate = date_create($endTime);
								$endt=date_format($endate, 'Y-m-d');
								$entime = date_create($endTime);
								$ente=date_format($entime, 'h:i a');
								
								$sqlget2="Select *  from student_register where Email='$Reply_Mail' ";						
						        $ses_result2=mysql_query($sqlget2);
								$res2=mysql_fetch_array($ses_result2);
								$FirstName=$res2["FirstName"];
								$Profile_Image="uploads/StudentImage/".$res2["Profile_Image"];
								
								if($FirstName=="")
								{
								$sqlget3="Select *  from recruiter_register where Email='$Reply_Mail' ";						
						        $ses_result3=mysql_query($sqlget3);
								$res3=mysql_fetch_array($ses_result3);
								$FirstName=$res3["FirstName"];
								$Profile_Image="uploads/Recruiter/".$res3["Profile_Image"];
								}
						
			?>
                         <table width="800" border="0">
                          <tr>
                            <td width="46" valign="middle" align="center"><img src="<?php print $Profile_Image; ?>" width="100" height="100" /></td>
                            <td width="300" rowspan="2" valign="top" align="justify">
							<p align="right" style="font-weight:bolder"><?php print $Reply_Date; ?></p><br/>
							<?php print $Comment; ?></td>
                          </tr>
                          <tr align="center">
                            <td style="font-weight:bolder"><?php print $FirstName; ?></td>
                          </tr>
                        </table>
                        <br/>
                         <div class="title grid_16"></div>  
                      <?php
					  }
						}
						?>
                        
                        
                          
                        
                        
                        <div id="body-wrapper" class="container_16">
    <div class="clear"></div>
	
		<!-- grid columns -->
		<div class="section">
           <?php
	if(isset($_GET['status']))
	{
		?>
        <p style="padding-left:60px;  height:30px; color:#F00; font-weight:400; background-color:##CCC;"> Comment Posted Successfully...!</p>
        <?php
		
	}
	
	
	?>
            <p id="error" style="padding-left:60px; display:none; color:#F00; font-weight:400; background-color:##CCC;"></p>
       		<!-- title -->
            <div class="title grid_16"></div>                    
			<!-- one half-->
          <?php
			if(isset($_GET['webId']))
			{
			$_SESSION["webId"]=$_GET['webId'];
			}
			
			$webId=$_SESSION["webId"];
			
			
?>

     <!--  Edit Page -->
            <form name="frm" id="frm" action="saveWebinarReply.php" method="post" onSubmit="return chkval();">
            <div class="grid_16"  id="editpage">
               
                <p id="error" style="padding-left:60px; display:none; padding-top:5px; height:30px; color:#F00; font-weight:400; background-color:##CCC;"></p>
                <div class="one-half"><h4>Q & A Forum</h4>
<div style="margin-top:20px;">
<table width="500" border="0">
   <tr>
  <td>&nbsp;</td>
  </tr>
  <tr>
    <td valign="top">Comment</td>
    <td><textarea name="comment" id="comment" rows="5" cols="50"></textarea></td>
  </tr>
</table>

</div>
                </div>
                
                     
 <div class="grid_4">
     <input type="hidden" name="web_id" id="web_id" value="<?php print $webId ?>" />
      <input type="hidden" name="qid" id="qid" value="<?php print $qid ?>" />
 
  <input type='submit' name="Update" value="Add Comment" class="button-big red"  />

  </div>   
  
            </div>
            </form>
            
            <!--  Edit Page -->
            
           
            <!-- end one-half -->                
        </div><!-- end grid columns -->
       
    <div class="clear"></div>
		<!-- tabs -->
		<div class="section"></div><!-- end body-wrapper -->
    </div>
    
    
    
    
    
    
    
    
    
    
    
    
    
            <!--  Normal Page -->
            <div class="grid_16" id="normalpage1"></div>
            <div class="grid_16" id="normalpage">
               
           

  </div>   
  
            </div>
                        <!--  Normal Page -->

     
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
