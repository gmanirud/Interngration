<?php
   include "../config.php";
  
   $abtme=str_replace("'","''",$_GET['abtme']);   
   $upTable=$_GET['upTable'];
   if($upTable=="temptable")
   {
   if($abtme!="")
   {
     $sid=$_GET['sid'];
   $sqlUpdate = "Update recruiter_register_temp set AboutMe='".$abtme."' where session_id='".$sid."'";
   $result=mysql_query($sqlUpdate,$link);
   
   $ses_result=mysql_select_db($dbname) or die(mysql_error());   
   $sql="select * from recruiter_register_temp where session_id='".$sid."'";
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
	   $uid=$_GET['uid'];
    
   $sqlUpdate = "Update recruiter_register set AboutMe='".$abtme."' where id='".$uid."'";
   $result=mysql_query($sqlUpdate,$link);
   
   $ses_result=mysql_select_db($dbname) or die(mysql_error());   
   $sql="select * from recruiter_register where id='".$uid."'";
   $ses_result=mysql_query($sql);
   $res=mysql_fetch_array($ses_result);
   
   $txtarea=$res["AboutMe"];
   print $txtarea;   
  
   }
   }
   ?>