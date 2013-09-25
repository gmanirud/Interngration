<?php
   include "../config.php";
   $sid=$_GET['sid'];
   $Projects=$_GET['Projects'];
  
 
   
	   if($Projects!="")
	   {
	   
	   $sqlUpdate ="Update student_register set projects='$Projects' where session_id='$sid'";
	   $result=mysql_query($sqlUpdate);
	   
	   $ses_result=mysql_select_db($dbname) or die(mysql_error());   
	   $sql="select * from student_register where session_id='$sid'";
	   $ses_result=mysql_query($sql);
	   $res=mysql_fetch_array($ses_result);
	   
	   $txtarea=$res["projects"];
	   print $txtarea;
	   
	   }
  
   ?>