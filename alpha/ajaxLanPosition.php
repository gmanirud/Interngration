<?php
   include "../config.php";
   $sid=$_GET['session'];
   $PosFor=mysql_real_escape_string($_GET['PosFor']);
    $LanPref=mysql_real_escape_string($_GET['LanPref']);
  $arr="";
	   
	   $sqlUpdate ="Update student_register set position_for='$PosFor',language_pref='$LanPref' where session_id='$sid'";
	   $result=mysql_query($sqlUpdate);
	   
	   $ses_result=mysql_select_db($dbname) or die(mysql_error());   
	   $sql="select * from student_register where session_id='$sid'";
	   $ses_result=mysql_query($sql);
	   $res=mysql_fetch_array($ses_result);
	   
	  ?>
       <h4 style="">Position For</h4><br/>
       <?php
	   
		   $position_for=$res["position_for"];
	    $language_pref=$res["language_pref"];
	   
		  $array1 = explode(',', $position_for);
	   foreach ($array1 as  $arr1)
	   {
		   if($arr1=="")
		   {
			   break;
		   }
		   ?>
		  <li>
           <?php print $arr1 ?> 
           </li>
           
           <?php
	   }
		  
		  ?>
          <br/> 
          <h4 style="">Language Preference</h4>
          <br/>
           <?php
		  $array2 = explode(',', $language_pref);
	   foreach ($array2 as  $arr2)
	   {
		   if($arr2=="")
		   {
			   break;
		   }
		   ?>
		  <li>
           <?php print $arr2 ?> 
           </li>
           
           <?php
	   }
		  
		  
		  ?>