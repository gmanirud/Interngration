<?php
   $chkdel=$_GET['chkdel'];
   include "config.php";
   $ses_result=mysql_select_db($dbname) or die(mysql_error());
   
   if(sizeof($_GET['chkbx']))
    {
	$delFlg = "0";
	foreach($_GET['chkbx'] AS $val)
	{
   
   	$sqlUpdate = "Update student_mailbox set flg_delete='1' where id='".$val."'";
	$result=mysql_query($sqlUpdate,$link);
	print $sqlUpdate;
	}
	}
		
    //header("Location:studentInbox.php");
	   ?>
       
	  