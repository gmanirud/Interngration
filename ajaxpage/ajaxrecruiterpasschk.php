<?php
include "../config.php";

$opass=$_GET['opass'];
$userid=$_GET['userid'];

if(isset($_GET["opass"]))
{
	
		$ses_result=mysql_select_db($dbname) or die(mysql_error());
		$sql="SELECT * FROM recruiter_register WHERE Password='$opass' AND id='$userid'";  
        $ses_result=mysql_query($sql);        
       	//$res=mysql_fetch_array($ses_result);
		$count=mysql_num_rows($ses_result);
        
		if($count>0)
		{
			print "1";
			$_SESSION["uname"] = $row['FirstName'];	
		$_SESSION["mail_id"] = $row['Email'];	
		$_SESSION["s_id"] = $row['session_id'];	
		}
		else
		{
			print "2";
		}
}


?>