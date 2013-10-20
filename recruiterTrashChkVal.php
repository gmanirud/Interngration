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
				
				$sqlget1="Select *  from student_mailbox where id='".$messageid."'";
				//print $sqlget1;
		        $ses_result1=mysql_query($sqlget1);
				$res1=mysql_fetch_array($ses_result1);
				
				$from_mail=$res1["from_mail"];
				$to_mail=$res1["to_mail"];
		        if($mail_id==$from_mail)
		        {
					$sql="Update student_mailbox set flg_frm_fulldel='".$mail_id."' where id='".$messageid."'"; 
					$ses_result=mysql_query($sql);
					//print $sql;
					
				}
				if($mail_id==$to_mail)
				{
					$sql="Update student_mailbox set flg_to_fulldel='".$mail_id."' where id='".$messageid."'"; 
					$ses_result=mysql_query($sql);
					//print $sql;
				}
			}
		}
		
	}
}


//   Move From Trash
if(isset($_POST['btnmove']))
{
	if(isset($_POST['chk']))
	{
		$n = $_POST["chk"];
		for ($j=1;$j<=$n;$j++)
		{
			
			
			if(isset($_POST["chkbx".$j]))
			{
				
				$messageid=$_POST["chkbx".$j];
				
				$sqlget1="Select *  from student_mailbox where id='".$messageid."'";
		        $ses_result1=mysql_query($sqlget1);
				$res1=mysql_fetch_array($ses_result1);
				
				$from_mail=$res1["from_mail"];
				$to_mail=$res1["to_mail"];
		        if($mail_id==$from_mail)
		        {
					$sql="Update student_mailbox set flg_snd_del='NIL' where id='".$messageid."'"; 
					$ses_result=mysql_query($sql);
				}
				if($mail_id==$to_mail)
				{
					$sql="Update student_mailbox set flg_delete='NIL' where id='".$messageid."'"; 
					$ses_result=mysql_query($sql);
				}
				//print $sql;
			}
		}
		
	}
}


		
    header("Location:recruiterTrash.php");
	   ?>
       
	  