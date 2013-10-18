<?php
include "../config.php";

if(isset($_GET["userName"]))
{
	$user=$_GET["userName"];
	
	    //Check the recruiter table
		$ses_result=mysql_select_db($dbname) or die(mysql_error());
		$sql="SELECT * FROM recruiter_register WHERE Email='$user'";
        $ses_result=mysql_query($sql);        
		$count=mysql_num_rows($ses_result);
		
		 //Check the student table
		$ses_result1=mysql_select_db($dbname) or die(mysql_error());
		$sql1="SELECT * FROM student_register WHERE Email='$user'";
        $ses_result1=mysql_query($sql1);        
		$count1=mysql_num_rows($ses_result1);
        
		if($count>0)
		{
			print "1";
		}
		else if($count1>0)
		{
			print "2";
		}
		else
		{
			print "3";
		}
}

if(isset($_GET['User']))
{
	$Userlogin=$_GET['User'];
		$ses_result=mysql_select_db($dbname) or die(mysql_error());
		$sql="SELECT * FROM recruiter_register WHERE UserName='$Userlogin'";
		
		   
        $ses_result=mysql_query($sql);        
       	//$res=mysql_fetch_array($ses_result);
		$count=mysql_num_rows($ses_result);
        
		if($count>0)
		{
			print "1";
		}
		else
		{
			print "2";
		}
}


?>