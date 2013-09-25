<?php
session_start();
include "config.php";
$ses_result=mysql_select_db($dbname) or die(mysql_error());
if(isset($_SESSION["uid"]))
{
	$username=$_SESSION["uname"];
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

<!-- Load Style Sheets -->
<link rel="stylesheet" type="text/css" href="css/style.css" media="screen" />
<link id="theme" rel="stylesheet" type="text/css" href="css/red.css" media="screen"/>

<!--[if IE 8]><link rel="stylesheet" href="css/ie.css" type="text/css" media="screen"/><![endif]-->
<!--[if IE 7]><link rel="stylesheet" href="css/ie.css" type="text/css" media="screen"/><![endif]-->

<!-- Load Jquery/Modernizr Javascript -->
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script type="text/javascript" src="js/modernizr.js"></script>
<script src="http://cdn.jquerytools.org/1.2.7/full/jquery.tools.min.js"></script>

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
//	{
	document.getElementById("arr").value = data;
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
        <div id="logo"><a href="student-homepage.php"><img src="images/logo.png" alt="interngration" width="400" height="80" /></a></div>
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
                <a href="postedJob.php" class="button red">JobApplication</a> 
                <a href="studentInbox.php" class="button red">Inbox</a> 
                <a href="student-profile.php" class="button red">Profile</a> 
                <a href="studentAccount.php" class="button red">Account</a>
                <a href="logout.php" class="button red">Logout</a></span>
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
						$chkstatus="checked=checked";
						
					}
					else
					{
						$chkstatus="";
					}
					
					
				
				?>
                <li><a href=""><input name="chkbx[]" onClick="filterjob();" <?php print $chkstatus; ?> value="<?php print $cmp; ?>" type="checkbox"><?php print $cmpnyname; ?></a></li>
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
                <li><a href=""><input name="chkbx[]" onClick="filterjob();" value="<?php print $deadlineToday; ?>" <?php if(in_array($deadlineToday, $commapnyArray)){ print "checked=checked"; } ?> type="checkbox">Today</a></li>
                <li><a href=""><input name="chkbx[]" onClick="filterjob();" value="<?php print $deadlineYesterday; ?>" <?php if(in_array($deadlineYesterday, $commapnyArray)){ print "checked=checked"; } ?> type="checkbox">Yesterday</a></li>
                <li><a href=""><input name="chkbx[]" onClick="filterjob();" value="Dead_line*DeadLineLastWeek" <?php if(in_array('Dead_line*DeadLineLastWeek', $commapnyArray)){ print "checked=checked"; } ?> type="checkbox">Last Week</a></li>
				<p style="float:right; margin:0px 20px 0px 0px;"><a href="">More</a></p>
                </ul>
				<div class="clear"></div> 
				 
				 <div class="title"><h4>Date Posted</h4></div>
                <ul class="sidebar">  
                 <?php
				$datepostToday="Date_Post*".$currentdate;
				$datepostYesterday="Date_Post*".$yesterday;
				
				?>
                                      
                <li><a href=""><input name="chkbx[]" onClick="filterjob();" value="<?php print $datepostToday; ?>" <?php if(in_array($datepostToday, $commapnyArray)){ print "checked=checked"; } ?> type="checkbox">Today</a></li>
                <li><a href="#"><input name="chkbx[]" onClick="filterjob();" value="<?php print $datepostYesterday; ?>" <?php if(in_array($datepostYesterday, $commapnyArray)){ print "checked=checked"; } ?> type="checkbox">Yesterday</a></li>
                <li><a href="#"><input name="chkbx[]" onClick="filterjob();" value="Date_Post*DatePostedLastWeek" <?php if(in_array('Date_Post*DatePostedLastWeek', $commapnyArray)){ print "checked=checked"; } ?> type="checkbox">Last Week</a></li>
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
    	 	
		
		if(isset($_POST['arr']))
		{
			$sqlget="Select *  from recruiter_jopposting where 1=1 AND";
			
			$commapnyArray=array();
			$PostedArray = $_POST['arr'];
			
			$pieces=explode(",", $PostedArray);
			$cnt=count($pieces);
			for($c=0;$c<$cnt;$c++)
			{
				$splited=explode("*", $pieces[$c]);
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
					if($searchtype=="DatePostedLastWeek")
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
					
			$sqlget="Select *  from recruiter_jopposting ORDER BY id Desc";
		}
		
		print $sqlget;
		
		$ses_result=mysql_query($sqlget);
		$rowcount= mysql_num_rows($ses_result);	
		while($res=mysql_fetch_array($ses_result))
		{
			$Job_title=$res["Job_title"];
			$Job_id=$res["Job_id"];
			$Date_Post=$res["Date_Post"];
			$Dead_line=$res["Dead_line"];
			$Company_name=$res["Company_name"];
			$recruiter_id=$res["recruiter_id"];		
?>
		 <!-- post 4 -->
       <div class="job-post">     
		<div class="titl">
        <span class="date"><a href="studentJobApplication.php?recid=<?php print $recruiter_id; ?>&Jobid=<?php print $Job_id; ?>&Jobtitle=<?php print $Job_title; ?>&Cmpny=<?php print $Company_name; ?>" class="button red">Apply</a></span>
        <h4><?php print $Job_title; ?></h4>
        <p>Job Id: <?php print $Job_id; ?></p>
		<p>Date Posted: <?php print $Date_Post; ?></p>
		<p>Deadline: <?php print $Dead_line; ?></p>
		<p>Company Name: <?php print $Company_name; ?></p>
		</div>
		 </div>
		
		<?php
		}
		?>
						
		</div><!-- pagination -->
                <div class="sectionnav">
                    <ul class="post-pagination">
                        <li>Page</li>
                        <li><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                    </ul>
                </div>
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