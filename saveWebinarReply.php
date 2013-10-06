<?php
   session_start();
   include "config.php";
   $ses_result=mysql_select_db($dbname) or die(mysql_error());
   $comment=$_POST['comment'];
   $qid=$_POST['qid'];
   $web_id=$_POST["web_id"];
   
	$mail_id=$_SESSION["mail_id"];
  
			
			$sqlInsert = "INSERT INTO replied_table (Webinar_Id,Question_id,Comment,Reply_Mail,Reply_Date) values('$web_id','$qid','$comment','$mail_id',NOW())";
			//print $sqlInsert;
			$result1=mysql_query($sqlInsert,$link);	       
		
    header("Location:WebinarReply.php?status=1");
	   ?>
	  