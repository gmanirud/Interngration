<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<body style="height:800px;">
<?php
        $stid=$_GET['stid'];
		include "config.php"; 	
		$ses_result=mysql_select_db($dbname) or die(mysql_error());					
		$sqlget="Select *  from student_jobapplication where id='$stid'";
		
		$ses_result=mysql_query($sqlget);
		$rowcount= mysql_num_rows($ses_result);	
				
			$res=mysql_fetch_array($ses_result);
			
			$resume=$res["resume"];
			$coveringLetter=$res["coveringLetter"];
			$JobId=$res["JobId"];
			$stuId=$res["stuId"];
			$RecuId=$res["RecuId"];
			
			
		$ses_result1=mysql_select_db($dbname) or die(mysql_error());					
		$sqlget1="Select *  from student_register where id='$stuId'";
		
		$ses_result1=mysql_query($sqlget1);
		$rowcount1= mysql_num_rows($ses_result1);	
				
	    $res1=mysql_fetch_array($ses_result1);
			
			$FirstName=$res1["FirstName"];
			$LastName=$res1["LastName"];
			$Company=$res1["Company"];
			
	    $ses_result2=mysql_select_db($dbname) or die(mysql_error());					
		$sqlget2="Select *  from recruiter_jopposting where recruiter_id='".$RecuId."' AND Job_id='".$JobId."'";
		
		$ses_result2=mysql_query($sqlget2);
		$rowcount2= mysql_num_rows($ses_result2);	
				
	    $res2=mysql_fetch_array($ses_result2);
			
			$Job_title=$res2["Job_title"];
			
			
?>

<table  border="0" style="border:2px #E53F3F solid; border-radius:10px; padding:20px 0px 20px 30px; width:780px; height:150px;">

<tr><td width="49%">Job Id</td>
  <td width="8%">:</td>
<td width="43%"><?php print $JobId; ?></td>
</tr>

<tr><td width="49%">Job Title</td>
  <td width="8%">:</td>
<td width="43%"><?php print $Job_title; ?></td>
</tr>

<tr><td width="49%">Candidate Name</td>
  <td width="8%">:</td>
<td width="43%"><?php print $LastName?>&nbsp;<?php print $FirstName?></td>
</tr>

<tr>
<td width="49%">Company Name</td>
<td width="8%">:</td>
<td width="43%"><?php print $Company?></td>
</tr>

<tr>
<td>Resume File Name</td>
<td>:</td>
<td><a href="uploads/Resume/<?php print $resume; ?>"> Download</a></td>
</tr>
 <?php 
  if($coveringLetter!="")
  {
  ?>
<tr>
<td>Covering Letter Name</td>
<td>:</td>
<td><a href="uploads/CoveringLetter/<?php print $coveringLetter; ?>"> Download</a></td>
  </tr>
  <?php
  }
  ?>

</table>



</body>
</html>