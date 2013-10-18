<?php
   include "config.php";
   $ses_result=mysql_select_db($dbname) or die(mysql_error());
   $aid=$_POST['aid'];
   $comapany=$_POST['comapany'];
   $position=$_POST['position'];
   $resumeName=$_POST['resumeName'];
   $ciName=$_POST['ciName'];
   $jobid=$_POST['jobid'];
   $recid=$_POST['recid'];
  
       
			$sqlUpdate = "Update student_jobapplication_temp set Company='".$comapany."',Position='".$position."',ResumeFile='".$resumeName."',CIFile='".$ciName."',JobId='".$jobid."',RecuId='".$recid."' where id='".$aid."'";
			$result=mysql_query($sqlUpdate,$link);
			
			$sqlInsert = "INSERT INTO student_jobapplication (Uid,resume,coveringLetter,Company,Position,ResumeFile,CIFile,JobId,RecuId) SELECT a.Uid,a.resume,a.coveringLetter,a.Company,a.Position,a.ResumeFile,a.CIFile,a.JobId,a.RecuId FROM student_jobapplication_temp AS a WHERE a.id='".$aid."' ORDER BY id LIMIT 1";
			$result1=mysql_query($sqlInsert,$link);
	
	        $sqldelete="delete from student_jobapplication_temp where id='".$aid."'";
			$result2=mysql_db_query($dbname,$sqldelete,$link);
		
    header("Location:student-homepage.php");
	   ?>
	  