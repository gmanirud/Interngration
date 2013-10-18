<?php
   include "../config.php";
   $sid=$_GET['sid'];
   $experience=$_GET['experience'];
  
 
   
	   if($experience!="")
	   {
	   
	   $sqlUpdate ="Update student_register set work_experience='$experience' where session_id='$sid'";
	   $result=mysql_query($sqlUpdate);
	   
	   $ses_result=mysql_select_db($dbname) or die(mysql_error());   
	   $sql="select * from student_register where session_id='$sid'";
	   $ses_result=mysql_query($sql);
	   $res=mysql_fetch_array($ses_result);
	   
	   $txtarea=$res["work_experience"];
	   print $txtarea;
	   
	   }
  
   ?>