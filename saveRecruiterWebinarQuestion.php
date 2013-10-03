<?php
   session_start();
   include "config.php";
   $ses_result=mysql_select_db($dbname) or die(mysql_error());
   $title=$_POST['title'];
   $descript=$_POST['descript'];
   $web_id=$_POST["web_id"];
   
	 $post_by=$_POST["post_by"];
  
			
			$sqlInsert = "INSERT INTO question_table (Webinar_id,Titile,Description,Posted_by,Posted_Date) values('$web_id','$title','$descript','$post_by',NOW())";
			//print $sqlInsert;
			$result1=mysql_query($sqlInsert,$link);	       
		
    header("Location:RecruiterWebinarQuestion.php?status=1");
	   ?>
	  