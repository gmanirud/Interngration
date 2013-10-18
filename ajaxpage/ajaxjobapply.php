<?php
   include "../config.php";
   $UId=$_GET['UId'];
   $comapany=$_GET['comapany'];
   $position=$_GET['position'];
   $resumeName=$_GET['resumeName'];
   $ciName=$_GET['ciName'];
  
        $sqlget="Select *  from student_jobapplication where Uid='$UId'";
		$ses_result=mysql_query($sqlget);
		$rowcount= mysql_num_rows($ses_result);	
		
		if ($rowcount>0)
		{
			$sqlUpdate = "Update student_jobapplication set Company='".$comapany."',Position='".$position."',ResumeFile='".$resumeName."',CIFile='".$ciName."' where Uid='".$UId."'";
			$result=mysql_query($sqlUpdate,$link);
		}
		else
		{
			$sqlInsert = "insert into student_jobapplication (Uid,Company,Position,ResumeFile,CIFile) values ('$UId','$comapany','$position','$resumeName','$ciName')";
			$result=mysql_query($sqlInsert,$link);
		}
  
	  
	   
		$ses_result=mysql_select_db($dbname) or die(mysql_error());   
	   $sql="select * from student_jobapplication where Uid='".$UId."'";
	   $ses_result=mysql_query($sql);
	   $res=mysql_fetch_array($ses_result);
	   $Company=$res['Company'];
	   $Position=$res['Position'];
	   $ResumeFile=$res['ResumeFile'];
	$CIFile=$res['CIFile'];
	   
	?>
	
	             <table width="100%" border="0">
                  <tr height="50">
                    <td width="50%">Company</td>
                    <td width="50%">:&nbsp;<?php print $Company; ?></td>
                  </tr>
                  <tr height="50">
                    <td>Position</td>
                    <td>:&nbsp;<?php print $Position; ?></td>
                  </tr>
                  <tr height="50">
                    <td>Resume File Name</td>
                    <td>:&nbsp;<?php print $ResumeFile; ?></td>
                  </tr>
                  <tr height="50">
                    <td>CI File Name </td>
                    <td>:&nbsp;<?php print $CIFile; ?></td>
                  </tr>
                </table>
	
	<?php
	  
	   ?>
	  