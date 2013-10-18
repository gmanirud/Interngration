<?php
   include "../config.php";
   $sid=$_GET['session'];
   $skilltech=mysql_real_escape_string($_GET['skilltech']);
  $arr="";
	   
	   $sqlUpdate ="Update student_register set skill_set='$skilltech' where session_id='$sid'";
	   $result=mysql_query($sqlUpdate);
	   
	   $ses_result=mysql_select_db($dbname) or die(mysql_error());   
	   $sql="select * from student_register where session_id='$sid'";
	   $ses_result=mysql_query($sql);
	   $res=mysql_fetch_array($ses_result);
	   
	   $skill_set=$res["skill_set"];
	   
		  $array = explode(',', $skill_set);
	   foreach ($array as  $arr)
	   {
		   if($arr=="")
		   {
			   break;
		   }
		   ?>
            <li> <?php print $arr ?> </li>
            <?php
	   }
		  
		  ?>
		  
		  
	   
	  
   