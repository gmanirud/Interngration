<?php
session_start();

if(isset($_SESSION["ruid"]))
{
	$username=$_SESSION["uname"];
	$uid=$_SESSION["ruid"];
	$mail_id=$_SESSION["mail_id"];
//header("location:inner.php");
}
else
{
header("location:recruiter-login.php");
}
?>
<!DOCTYPE HTML>
<html lang="en" class="no_js">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Recruiter Q & A Forum</title>
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
					
		$sqlget="Select *  from recruiter_register where id='$uid'";
		
		$ses_result=mysql_query($sqlget);
		$rowcount= mysql_num_rows($ses_result);	
		
	
		if ($rowcount>0)
		{
			$res=mysql_fetch_array($ses_result);
			
			$FirstName=$res["FirstName"];
			$LastName=$res["LastName"];
			$Company=$res["Company"];
			$Address=$res["Address"];
			$Email=$res["Email"];
			$UserName=$res["UserName"];
			$fullname=$FirstName." ".$LastName;
			
		}
	

			
?>


<!--  Citrix Authendication -->
<?php
include "recruitercitrix.php";

$citrix = new Citrix('2a3328f6717227aa1262eb368d013a47');
$organizer_key = $citrix->get_organizer_key();
$weblist=$citrix->citrixonline_get_list_of_webinars();
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



<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script type="text/javascript" src="js/modernizr.js"></script>

<script type="text/javascript">
function chkval()
{
	var title=document.getElementById("title").value;
	var descript=document.getElementById("descript").value;
	
	if(title=="")
	{
		document.getElementById("error").style.display='block';
		document.getElementById("error").innerHTML='Enter the Title...!';
		document.getElementById("title").focus();
		return false;
	}
	if(descript=="")
	{
		document.getElementById("error").style.display='block';
		document.getElementById("error").innerHTML='Enter the Description...!';
		document.getElementById("descript").focus();
		return false;
	}
	return true;
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
                <li><a href="recruiterAccount.php">Welcome&nbsp; :&nbsp; <?php print $username; ?></a></li>
               <li><a href="recruiter-home-page.php">Home</a></li></ul>
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
             <span class="mailno"><?php include "RecruiterUnreadMail.php"; ?></span>
                <h1>Upcoming Webinar</h1><span style="margin:0px 30px 10px 0px; float:right;">
                <a href="https://login.citrixonline.com/login?service=https%3A%2F%2Fglobal.gotomeeting.com%2Fmeeting%2Fj_spring_cas_security_check" target="_blank" class="button red">Schedule your Webinar</a>                
                <a href="RecruiterUpcomingWebinar.php" class="button red">Scheduled Webinar</a>
                 <a href="RecruiterWatchedWebinar.php" class="button red">Past Webinar</a>
                 <a href="recruiterInbox.php" class="button red">Inbox</a>
                <a href="jobPosting.php" class="button red">Job Posting</a>
                <a href="recruiterAccount.php" class="button red">Account</a>
                <a href="logout.php" class="button red">Logout</a></span>
            </div>        
        </div>    
        
         
                          
    <!-- body -->
    <div id="body-wrapper" class="container_16">
    <div class="clear"></div>
	
		<!-- grid columns -->
		<div class="section">
           <?php
	if(isset($_GET['status']))
	{
		?>
        <p style="padding-left:60px;  height:30px; color:#F00; font-weight:400; background-color:##CCC;"> Posted Successfully...!</p>
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
            <form name="frm" id="frm" action="saveRecruiterWebinarQuestion.php" method="post" onSubmit="return chkval();">
            <div class="grid_16"  id="editpage">
               
                <p id="error" style="padding-left:60px; display:none; padding-top:5px; height:30px; color:#F00; font-weight:400; background-color:##CCC;"></p>
                <div class="one-half"><h4>Q & A Forum</h4>
<div style="margin-top:20px;">
<table width="500" border="0">
  <tr>
    <td width="101" >Title</td>
    <td width="209"><input type="text" size="30"  name="title" id="title" ></td>
  </tr>
  <tr>
  <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Description</td>
    <td><textarea name="descript" id="descript" rows="5" cols="50"></textarea></td>
  </tr>
</table>

</div>
                </div>
                
                     
 <div class="grid_4">
     <input type="hidden" name="web_id" id="web_id" value="<?php print $webId ?>" />
      <input type="hidden" name="post_by" id="post_by" value="<?php print $fullname ?>" />
 
  <input type='submit' name="Update" value="POST" class="button-big red"  />

  </div>   
  
            </div>
            </form>
            <br/>
            <br/>
            <table width="100%" border="1" bgcolor="#000000" cellpadding="10" cellspacing="10">
              <tr bgcolor="#e53f3f">
                <td height="29" style="color:#FFF">S.NO</td>
                <td style="color:#FFF">Title</td>
                <td style="color:#FFF">Posted By</td>
                <td style="color:#FFF">Replies</td>
                <td style="color:#FFF">Last Reply</td>
                 <td style="color:#FFF">View</td>
              </tr>
               <?php
					     
							$sqlget="select *  from question_table where Webinar_id='$webId'";
							
							$ses_result=mysql_query($sqlget);
							$rowcount= mysql_num_rows($ses_result);	
							$i=0;
							if($rowcount>0)
							{
							while($res=mysql_fetch_array($ses_result))
							{
								$i++;
								$Webinar_id=$res["Webinar_id"];
								$Titile=$res["Titile"];
								$Description=$res["Description"];
								$Posted_by=$res["Posted_by"];
								$Posted_Date=$res["Posted_Date"];
								$id=$res["id"];
								
								$sqlget1="Select *  from replied_table where Question_id='$id' order by id desc ";						
						        $ses_result1=mysql_query($sqlget1);
						        $rowcount1= mysql_num_rows($ses_result1);
								if($rowcount1!="")
								{
								$res1=mysql_fetch_array($ses_result1);
								$Reply_Mail=$res1["Reply_Mail"];
								$Reply_Date=$res1["Reply_Date"];
								
								$sqlget2="Select *  from student_register where Email='$Reply_Mail' ";						
						        $ses_result2=mysql_query($sqlget2);
								$res2=mysql_fetch_array($ses_result2);
								$FirstName=$res2["FirstName"];	
								
								if($FirstName=="")
								{
								$sqlget3="Select *  from recruiter_register where Email='$Reply_Mail' ";	
												
						        $ses_result3=mysql_query($sqlget3);
								$res3=mysql_fetch_array($ses_result3);
								$FirstName=$res3["FirstName"];	
								
								}
								
								}
								else
								{
									$rowcount1='0';
									$FirstName="NIL";
									$Reply_Date="";
								}
							    
						?>
           
         
					   
					   <!-- post 4 -->
               
					    <tr bgcolor="#FFFFFF">
                        <td height="29"><?php print $i; ?></td>
                        <td><a href="WebinarReply.php?qid=<?php print $id; ?>"><?php print $Titile; ?></td>
                        <td><?php print $Posted_by; ?></td>
                        <td><?php print $rowcount1; ?></td>
                        <td><?php print $Reply_Date; ?><br/>By <?php print $FirstName; ?></td>                        
                        <td><a href="RecruiterWebinarReply.php?qid=<?php print $id; ?>">See Replies</td>                   
                        </tr>
							
						<?php
						}
			}
		   else
		   {
			   ?>	
               <tr bgcolor="#FFFFFF">
               <td colspan="8" align="center">No Records Found</td>
               </tr>
               <?php
		   }
		   ?>
          </table>
            <!--  Edit Page -->
            
           
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