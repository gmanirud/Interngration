<?php
   include "../config.php";
   $sid=$_GET['sid'];
   $abtme=$_GET['abtme'];  
   
  
   if($abtme!="")
   {
    
   $sqlUpdate = "Update recruiter_register_temp set AboutMe='".$abtme."' where session_id='".$sid."'";
   $result=mysql_query($sqlUpdate,$link);
   
   $ses_result=mysql_select_db($dbname) or die(mysql_error());   
   $sql="select * from recruiter_register_temp where session_id='".$sid."'";
   $ses_result=mysql_query($sql);
   $res=mysql_fetch_array($ses_result);
   
   $txtarea=$res["AboutMe"];
   print $txtarea;   
  
   }
  
   ?>