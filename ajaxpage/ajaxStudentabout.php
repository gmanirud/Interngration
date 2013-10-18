<?php
   include "../config.php";
   $sid=$_GET['sid'];
   $abtme=$_GET['abtme'];
   $upTable=$_GET['upTable'];
   
       
	   
 
   if($upTable=="temptable")
   {
	   if($abtme!="")
	   {
	   
	   $sqlUpdate ="Update student_register_temp set AboutMe='$abtme' where session_id='$sid'";
	   $result=mysql_query($sqlUpdate);
	   
	   $ses_result=mysql_select_db($dbname) or die(mysql_error());   
	   $sql="select * from student_register_temp where session_id='$sid'";
	   $ses_result=mysql_query($sql);
	   $res=mysql_fetch_array($ses_result);
	   
	   $txtarea=$res["AboutMe"];
	   print $txtarea;
	   
	   }
   }
   if($upTable=="maintable")
   {
	   if($abtme!="")
	   {
	   
	   $sqlUpdate ="Update student_register set AboutMe='$abtme' where session_id='$sid'";
	   $result=mysql_query($sqlUpdate);
	   
	   $ses_result=mysql_select_db($dbname) or die(mysql_error());   
	   $sql="select * from student_register where session_id='$sid'";
	   $ses_result=mysql_query($sql);
	   $res=mysql_fetch_array($ses_result);
	   
	   $txtarea=$res["AboutMe"];
	   print $txtarea;
	   
	   }
   }
   ?>