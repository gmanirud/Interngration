<?php
   include "config.php";
   $ses_result=mysql_select_db($dbname) or die(mysql_error());
   session_start();
   $mail_id=$_SESSION["mail_id"];  
 
   
if(isset($_POST['btndelete']))
{
	if(isset($_POST['chk']))
	{
		$n = $_POST["chk"];
		for ($j=1;$j<=$n;$j++)
		{
			
			
			if(isset($_POST["chkbx".$j]))
			{
				
				$messageid=$_POST["chkbx".$j];
				
				
				$sql="Update student_mailbox set flg_snd_del='".$mail_id."' where id='".$messageid."'"; 
				
				//print $sql."<br/>";
				
				$ses_result=mysql_query($sql);
			}
		}
		
	}
}


if(isset($_POST['btnarchive']))
{
	if(isset($_POST['chk']))
	{
		$n = $_POST["chk"];
		
		
		for ($j=1;$j<=$n;$j++)
		{
			
			
			if(isset($_POST["chkbx".$j]))
			{
				
				$messageid=$_POST["chkbx".$j];
				
				
				$sql="Update student_mailbox set flg_snd_arch='".$mail_id."' where id='".$messageid."'"; 
				
				//print $sql."<br/>";
				
				$ses_result=mysql_query($sql);
			}
		}
		
	}
}


		
    header("Location:studentSend.php");
	   ?>
       
	  