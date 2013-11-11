<?php
session_start();
include "config.php";
$ses_result=mysql_select_db($dbname) or die(mysql_error());
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
<title>Posted Job</title>
<!-- Favicon -->
<link rel="shortcut icon" href="favicon.ico" />

<!-- Load Google Fonts -->
<link href='http://fonts.googleapis.com/css?family=Inder' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Ubuntu+Condensed' rel='stylesheet' type='text/css'>

<!--Include Pagination Support Files-->
  <link href="pagination/pagination.css" rel="stylesheet" type="text/css" />
  <link href="pagination/B_grey.css" rel="stylesheet" type="text/css" />
  <!--Include Pagination Support Files-->
  
  

<!-- Load Style Sheets -->
<link rel="stylesheet" type="text/css" href="css/style.css" media="screen" />
<link id="theme" rel="stylesheet" type="text/css" href="css/red.css" media="screen"/>

<!--[if IE 8]><link rel="stylesheet" href="css/ie.css" type="text/css" media="screen"/><![endif]-->
<!--[if IE 7]><link rel="stylesheet" href="css/ie.css" type="text/css" media="screen"/><![endif]-->

<!-- Load Jquery/Modernizr Javascript -->
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script type="text/javascript" src="js/modernizr.js"></script>
<script src="http://cdn.jquerytools.org/1.2.7/full/jquery.tools.min.js"></script>


<!--  Pagignation -->
<?php
include_once ('pagination/function.php');

$page = (int) (!isset($_GET["page"]) ? 1 : $_GET["page"]);
$limit = 10;
$startpoint = ($page * $limit) - $limit;
?>
 
 <!-- Pagignation -->

<script type="text/javascript">
function filterjob()
{
	
	
	var elements = document.getElementsByName('chkbx[]'); 
	var cnt=elements.length;
	var data = [];
	
	for (var i = 0; i < elements.length; i++)
	{
		
		if (elements[i].checked==true)
		{
			data.push(elements[i].value);
			
		}
	}
    var arrLength=data.length;
	
	//alert(arrLength);
	//if(arrLength>0)
    //{
		
	    document.getElementById("arr").value = data;
	//}
	
	//var ale=document.getElementById("arr").value;
	//alert(ale);
	document.getElementById("frm_job").submit();
//	}
}

</script>
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
                <h1>Posted Job</h1>
                <span style="margin:0px 30px 0px 0px; float:right;">
                 <?php
				 if(isset($_GET['status'])=='1')
				 {
				 ?>
        <div id="updtss" style="padding-left:60px; padding-top:5px; height:30px; color:#060; font-weight:bold; background-color:##CCC;">Your Job Applied Successfully !!!</div>
        <?php
                 }                 
				 ?>
                    <a href="student-homepage.php" class="button red">Upcoming Webinars</a>
        			<a href="StudentRegisteredWebinar.php" class="button red"> My Webinars</a>   
        			<a href="StudentWatchedWebinar.php" class="button red">Watched Webinars</a> 
        			<a href="archived-webinars.php" class="button red">Recorded Webinars</a>               
        			<a href="postedJob.php" class="button red">Job Board</a> 
        			<a href="AppliedPostedJob.php" class="button red">My Jobs</a> 
        			<a href="studentInbox.php" class="button red">My Inbox</a> 
        			<a href="student-profile.php" class="button red">My Profile</a></span>
            </div>        
        </div>      
                          
     <!-- body -->
    <div id="body-wrapper" class="container_16">
    <div class="clear"></div>
        <!-- side bar -->
        <div class="section">
            <div class="grid_20"> 
            <?php
			$commapnyArray=array();
			if(isset($_POST['arr']))
			{
				
				$PostedArray = $_POST['arr'];
				
				$pieces=explode(",", $PostedArray);
				for($c=0;$c<count($pieces);$c++)
				{
					
					$commapnyArray[]=$pieces[$c];
				}
				
			}
			
			
			?>
            
            
            <form id="frm_job" name="frm_job" action="postedJob.php" method="post">
            
              <!-- sidebar nav -->
                <div class="title"><h4>Company Name</h4></div>
                <ul class="sidebar">
                <?php
				$currentdate=date("Y-m-d");
				$yesterday = date('Y-m-d', strtotime('-1 day'));
				
				$sql1="SELECT DISTINCT Company_name FROM recruiter_jopposting ORDER BY id DESC LIMIT 3";		
				$ses_result1=mysql_query($sql1);
				$rowcount1= mysql_num_rows($ses_result1);	
				while($res1=mysql_fetch_array($ses_result1))
				{ 
					$cmpnyname=$res1['Company_name'];
					$cmp="Company_name*".$cmpnyname;
					
					
					if(in_array($cmp, $commapnyArray))
					{
						$chkstatus="checked='checked'";
						
					}
					else
					{
						$chkstatus="";
					}
					
					
				
				?>
                <li><a ><input name="chkbx[]" onClick="filterjob();" <?php print $chkstatus; ?> value="<?php print $cmp; ?>" type="checkbox"><?php print $cmpnyname; ?></a></li>
                <?php
				}
				?>
				<p style="float:right; margin:0px 20px 0px 0px;"><a href="">More</a></p>
                </ul>
				 <div class="clear"></div> 
				 
				 <div class="title"><h4>Deadline</h4></div>
                <ul class="sidebar">                        
                <?php
				$deadlineToday="Dead_line*".$currentdate;
				$deadlineYesterday="Dead_line*".$yesterday;
				
				?>
                <li><a ><input name="chkbx[]" onClick="filterjob();" value="<?php print $deadlineToday; ?>" <?php if(in_array($deadlineToday, $commapnyArray)){ print "checked=checked"; } ?> type="checkbox">Today</a></li>
                <li><a ><input name="chkbx[]" onClick="filterjob();" value="<?php print $deadlineYesterday; ?>" <?php if(in_array($deadlineYesterday, $commapnyArray)){ print "checked=checked"; } ?> type="checkbox">Yesterday</a></li>
                <li><a><input name="chkbx[]" onClick="filterjob();" value="Dead_line*DeadLineLastWeek" <?php if(in_array('Dead_line*DeadLineLastWeek', $commapnyArray)){ print "checked=checked"; } ?> type="checkbox">Last Week</a></li>
				<p style="float:right; margin:0px 20px 0px 0px;"><a href="">More</a></p>
                </ul>
				<div class="clear"></div> 
				 
				 <div class="title"><h4>Date Posted</h4></div>
                <ul class="sidebar">  
                 <?php
				$datepostToday="Date_Post*".$currentdate;
				$datepostYesterday="Date_Post*".$yesterday;
				
				?>
                                      
                <li><a><input name="chkbx[]" onClick="filterjob();" value="<?php print $datepostToday; ?>" <?php if(in_array($datepostToday, $commapnyArray)){ print "checked=checked"; } ?> type="checkbox">Today</a></li>
                <li><a><input name="chkbx[]" onClick="filterjob();" value="<?php print $datepostYesterday; ?>" <?php if(in_array($datepostYesterday, $commapnyArray)){ print "checked=checked"; } ?> type="checkbox">Yesterday</a></li>
                <li><a><input name="chkbx[]" onClick="filterjob();" value="Date_Post*DatePostedLastWeek" <?php if(in_array('Date_Post*DatePostedLastWeek', $commapnyArray)){ print "checked=checked"; } ?> type="checkbox">Last Week</a></li>
				<p style="float:right; margin:0px 20px 0px 0px;"><a href="">More</a></p>
                </ul>
				 <div class="clear"></div> 
                 <input type="hidden" id="arr" name="arr" value="">
				</form>
            </div><!-- end grid_4 -->
            
        </div><!-- end side bar -->    


		<!-- posts -->
		<div class="section">
        <div class="grid_21">           
        <!-- tabs -->
		<div class="section">
        
        
        <?php
		
		
		if(isset($_POST['arr']) && $_POST['arr']!="")
		{
			$sqlget="Select *  from recruiter_jopposting where 1=1 AND";
			
			$commapnyArray=array();
			$PostedArray = $_POST['arr'];
			
			$pieces=explode(",", $PostedArray);
			$cnt=count($pieces);
			for($c=0;$c<$cnt;$c++)
			{
				$splited=explode("*",$pieces[$c]);
				$searchname=$splited[0];
				$searchtype=$splited[1];
				if($searchname=="Company_name")
				{
					$sqlget=$sqlget." Company_name LIKE '%$searchtype%' ";
					
				}
				if($searchname=="Date_Post")
				{
					if($searchtype==$currentdate)
					{
						$sqlget=$sqlget." Date_Post='$currentdate' ";
						
					}
					if($searchtype==$yesterday)
					{
						$sqlget=$sqlget." Date_Post='$yesterday' ";
						
					}
					if($searchtype=="DatePostedLastWeek")
					{
						$sqlget=$sqlget." Date_Post < '$yesterday' ";
						
					}
				}
				if($searchname=="Dead_line")
				{
					if($searchtype==$currentdate)
					{
						$sqlget=$sqlget." Dead_line='$currentdate' ";
						
					}
					if($searchtype==$yesterday)
					{
						$sqlget=$sqlget." Dead_line='$yesterday' ";
						
					}
					if($searchtype=="DeadLineLastWeek")
					{
						$sqlget=$sqlget." Dead_line < '$yesterday' ";
						
					}
				}
				
				if($c<$cnt-1)
				{
					$sqlget=$sqlget." || ";
				}
				if($c<=$cnt-1)
				{
					$sqlget=$sqlget." ";
				}
				
				
			}
			$sqlget=$sqlget." ORDER BY id Desc";
		}
		else
		{	
					
			$sqlget="Select *  from recruiter_jopposting  ORDER BY id Desc";
		}
		
		//print $sqlget;
		
		$sql12=$sqlget." LIMIT {$startpoint} , {$limit}";
		//print $sql12;
		$ses_result=mysql_query($sql12);
		$rowcount= mysql_num_rows($ses_result);	
		if($rowcount=='0')
		{
			print "No jobs to apply for now. Check back later!";
			
		}
		else
		{
		while($res=mysql_fetch_array($ses_result))
		{
			$id=$res["id"];
			$Job_title=$res["Job_title"];
			$Job_id=$res["Job_id"];
			$Job_Dept=$res["Job_Dept"];
			$Job_Detail=$res["Job_Detail"];
			$Date_Post=$res["Date_Post"];
			$Dead_line=$res["Dead_line"];			
			$recruiter_id=$res["recruiter_id"];	
			$Company_Name=$res["Company_Name"];	
			
			
			
		$sqlget2="Select *  from student_jobapplication where stuID='".$s_uid."' AND JobId='".$id."'";
			//print $sqlget2;			
		$ses_result2=mysql_query($sqlget2);
		$rowcount2= mysql_num_rows($ses_result2);
				
		
		if($rowcount2=='0')
		{		
		
			
?>
		 <!-- post 4 -->
       <div class="job-post">     
		<div class="titl">
        <span class="date"><a href="studentJobApplication.php?recid=<?php print $recruiter_id; ?>&Jobid=<?php print $id; ?>&Jobtitle=<?php print $Job_title; ?>&Cmpny=<?php print $Company_Name; ?>" class="button red">Apply</a></span>
        <h4><?php print $Job_title; ?></h4>
       <table width="450" border="0" cellpadding="10px;">
         <tr>
    <td width="70">Company Name</td>
    <td width="5">:</td>
    <td width="200"><?php print $Company_Name; ?></td>
  </tr>
  <tr>
    <td>Job Id</td>
    <td>:</td>
    <td><?php print $Job_id; ?></td>
  </tr>
  <tr>
    <td>Job Department</td>
    <td>:</td>
    <td><?php print $Job_Dept; ?></td>
  </tr>
  <tr height="10px;" valign="top">
    <td>Job Detail</td>
    <td>:</td>
    <td style="Serif;overflow:auto;" align="justify" ><?php print $Job_Detail; ?></td>
  </tr>
  <tr>
    <td>Date Posted</td>
    <td>:</td>
    <td><?php print $Date_Post; ?></td>
  </tr>
  <tr>
    <td>Dead Line</td>
    <td>:</td>
    <td><?php print $Dead_line; ?></td>
  </tr>
 
</table>
		</div>
		 </div>
		
		<?php
		}
		}
		}
		?>
						
		</div><!-- pagination -->
                <!--<div class="sectionnav">
                    <ul class="post-pagination">
                        <li>Page</li>
                        <li><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                    </ul>
                </div>-->
                
                
                 <?php
			
							
							 
        echo pagination($sqlget,$limit,$page);      
		
		 
							?>
		</div><!-- end grid_12 --> 
        </div><!-- end recent posts --> 

      
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
<script type="text/javascript" src="js/custom.js"></script>
</body>
</html>
