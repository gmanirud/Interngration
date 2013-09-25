<?php 
$delpid=$_GET['delpid'];
        include "config.php"; 	
		$ses_result=mysql_select_db($dbname) or die(mysql_error());
		$sqlUpdate ="Update student_mailbox set flg_delete='1' where id='$delpid'";
	    $result=mysql_query($sqlUpdate);
		header("Location:recruiterInbox.php");
		?>