<?php
   include "../config.php";
   $session=$_GET['psId'];
   $schoolName=$_GET['schoolName'];
   $Program=$_GET['Program'];
  
   $upTable=$_GET['upTable'];
  
if($upTable=="temptable")
{   
	   if(($schoolName!="")||($Program!="")||($Contact!=""))
	   {
		
	   $sqlUpdate = "Update student_register_temp set schoolName='".$schoolName."',Program='".$Program."' where session_id='".$session."'";
	   $result=mysql_query($sqlUpdate,$link);
	   
		$ses_result=mysql_select_db($dbname) or die(mysql_error());   
	   $sql="select * from student_register_temp where session_id='".$session."'";
	   $ses_result=mysql_query($sql);
	   $res=mysql_fetch_array($ses_result);
	   $schoolName=$res['schoolName'];
	   $Program=$res['Program'];
	   $Email=$res['Email'];
		$Profile_Image=$res['Profile_Image'];
		
	?>
	
	<li>School: <?php print $schoolName; ?></li>
	<li>Program: <?php print $Program; ?></li>
	<li>Contact: <?php print $Email; ?></li>
	
	<?php
	   }
	   else
	   {
	   $ses_result=mysql_select_db($dbname) or die(mysql_error());
	   
	   $sql="select * from student_register_temp where session_id='".$session."'";
	   $ses_result=mysql_query($sql);
	   $res=mysql_fetch_array($ses_result);
	   
	   $schoolName=$res['schoolName'];
	   $Program=$res['Program'];
	   $Email=$res['Email'];
	   $Profile_Image=$res['Profile_Image'];
	   
	?>
	
	<li>School: <?php print $schoolName; ?></li>
	<li>Program: <?php print $Program; ?></li>
	<li>Contact: <?php print $Email; ?></li>
	<?php
	   }
}

if($upTable=="maintable")
{   
 $SelYear=$_GET['SelYear'];
	   if(($schoolName!="")||($Program!="")||($Contact!=""))
	   {
		
	   $sqlUpdate = "Update student_register set schoolName='".$schoolName."',Program='".$Program."',univ_Year='".$SelYear."' where session_id='".$session."'";
	   $result=mysql_query($sqlUpdate,$link);
	   
		$ses_result=mysql_select_db($dbname) or die(mysql_error());   
	   $sql="select * from student_register where session_id='".$session."'";
	   $ses_result=mysql_query($sql);
	   $res=mysql_fetch_array($ses_result);
	   $schoolName=$res['schoolName'];
	   $Program=$res['Program'];
	    $univ_Year=$res['univ_Year'];
	   $Email=$res['Email'];
		$Profile_Image=$res['Profile_Image'];
	   
	?>
	
	<li>School&nbsp;<b>:</b>&nbsp; <?php print $schoolName; ?></li>
	<li>Program&nbsp;<b>:</b>&nbsp; <?php print $Program; ?></li>
     <li>Year&nbsp;<b>:</b>&nbsp; <?php print $univ_Year; ?></li>
	<li>Contact&nbsp;<b>:</b>&nbsp; <?php print $Email; ?></li>
   
	
	<?php
	   }
	   else
	   {
	   $ses_result=mysql_select_db($dbname) or die(mysql_error());
	   
	   $sql="select * from student_register where session_id='".$session."'";
	   $ses_result=mysql_query($sql);
	   $res=mysql_fetch_array($ses_result);
	   
	   $schoolName=$res['schoolName'];
	   $Program=$res['Program'];
	   $Email=$res['Email'];
	   $Profile_Image=$res['Profile_Image'];
	    $univ_Year=$res['univ_Year'];
	   
	?>
	
	<li>School&nbsp;<b>:</b>&nbsp; <?php print $schoolName; ?></li>
	<li>Program&nbsp;<b>:</b>&nbsp; <?php print $Program; ?></li>
     <li>Year&nbsp;<b>:</b>&nbsp; <?php print $univ_Year; ?></li>
	<li>Contact&nbsp;<b>:</b>&nbsp; <?php print $Email; ?></li>
   
	<?php
	   }
}
   ?>