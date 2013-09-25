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
				 
				 $sqlget="Select *  from student_mailbox where from_mail='".$mail_id."' AND id='".$messageid."'";
				$ses_result=mysql_query($sqlget);
				$res=mysql_fetch_array($ses_result);
				$rowcount= mysql_num_rows($ses_result);	
				
				if($rowcount>0)
				{
				   $sql="Update student_mailbox set flg_snd_del='".$mail_id."' where id='".$messageid."'"; 	
				
				}
				else
				{
					$sql="Update student_mailbox set flg_delete='1' where id='".$messageid."'"; 
				
				}
				
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
				$sqlget="Select *  from student_mailbox where from_mail='".$mail_id."' AND id='".$messageid."'";
				$ses_result=mysql_query($sqlget);
				$res=mysql_fetch_array($ses_result);
				$rowcount= mysql_num_rows($ses_result);	
				
				if($rowcount>0)
				{
				   $sql="Update student_mailbox set flg_snd_arch='NIL' where id='".$messageid."'"; 	
				
				}
				else
				{
				
				$sql="Update student_mailbox set flg_archive='0' where id='".$messageid."'"; 
				}
				
				//print $sql."<br/>";
				
				$ses_result=mysql_query($sql);
			}
		}
		
	}
}

if(isset($_POST['btnread']))
{
	if(isset($_POST['chk']))
	{
		$n = $_POST["chk"];
		
		for ($j=1;$j<=$n;$j++)
		{
			
			
			if(isset($_POST["chkbx".$j]))
			{
				
				$messageid=$_POST["chkbx".$j];
				
				
				$sql="Update student_mailbox set flg_read='1' where id='".$messageid."'"; 
				
				//print $sql."<br/>";
				
				$ses_result=mysql_query($sql);
			}
		}
		
	}
}
if(isset($_POST['btnunread']))
{
	//print $_POST['btnunread'];
	if(isset($_POST['chk']))
	{
		$n = $_POST["chk"];
		
		for ($j=1;$j<=$n;$j++)
		{
			
			
			if(isset($_POST["chkbx".$j]))
			{
				
				$messageid=$_POST["chkbx".$j];
				
				
				$sql="Update student_mailbox set flg_read='0' where id='".$messageid."'"; 
				
				//print $sql."<br/>";
				
				$ses_result=mysql_query($sql);
			}
		}
		
	}
}
		
    header("Location:recruiterArchive.php");
	   ?>
       
	  