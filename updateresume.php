<?PHP
include "config.php";
session_start();
$uid=$_SESSION["uid"];
$ses_result=mysql_select_db($dbname) or die(mysql_error());
	
$jobid=$_POST['jobid'];
$recid=$_POST['recid'];	
$jobtitle=$_POST['jobtitle'];
$cmpny=$_POST['cmpny'];			
$chkbx=$_POST['chkbx'];	
         if($chkbx=="profileresume")
		 {
			 $sqlset="Select *  from student_register where id='".$uid."'";
			$ses_result2=mysql_query($sqlset);
			$rowcount= mysql_num_rows($ses_result2);	
			$res2=mysql_fetch_array($ses_result2);
			$filName=$res2['job_resume'];
			 
		 }
		
		 if($_FILES['resume']['name']!="")
		 {	
		$target_path = "uploads/Resume/";
		//date_default_timezone_set("Asia/Calcutta");
		 $dtTime = date('d_M_Y-H_i_s');
		 $target_path = $target_path.$dtTime.$_FILES['resume']['name']; 	
		 $filName = $dtTime. $_FILES['resume']['name']; 
		   if(move_uploaded_file($_FILES['resume']['tmp_name'], $target_path)) 
		 {
				
		 }
		 }
		 
		 if($_FILES['coverletter']['name']!="")
		 {		 
		 $target_path1 = "uploads/CoveringLetter/";
		//date_default_timezone_set("Asia/Calcutta");
		 $dtTime1 = date('d_M_Y-H_i_s');
		 $target_path1 = $target_path1.$dtTime1.$_FILES['coverletter']['name']; 	
		 $filName1 = $dtTime1. $_FILES['coverletter']['name']; 
		   if(move_uploaded_file($_FILES['coverletter']['tmp_name'], $target_path1)) 
		 {
				//echo "The file ".  basename( $_FILES['txt_invoice']['name'])." has been uploaded";
				
		 }
		 }
		 
		 
			$sqlInsert = "insert into student_jobapplication (resume,coveringLetter,JobId,RecuId,stuId) values ('$filName','$filName1','$jobid','$recid','$uid')";
			$result=mysql_query($sqlInsert,$link);
			
   // Mail Sending for student
   
        $ses_result3=mysql_select_db($dbname) or die(mysql_error());
		$sqlget3="Select *  from recruiter_register where id='".$recid."'";
		$ses_result3=mysql_query($sqlget3);
		$rowcount3= mysql_num_rows($ses_result3);	
	    $res3=mysql_fetch_array($ses_result3);
        $fmmail=$res3['Email'];
   
   
            $to_mail=$_SESSION["mail_id"];
			$subjectcnt= "Successfully applied to ".$jobtitle;
			$bodycnt="You’ve successfully applied to for the ".$jobtitle." position at ".$cmpny.". All the best!<br/>Cheers,<br/>The Interngration Team.";
						
			
			
			$sqlInsert1 = "insert into student_mailbox (from_mail,to_mail,subject,message,SendDate) values ('$fmmail','$to_mail','$subjectcnt','$bodycnt',NOW())";
        $result1=mysql_db_query($dbname,$sqlInsert1,$link);
		
		
		
		 $myFile = "StudentJobpostMail.html";
		$fh = fopen($myFile,'r');
		$theData = fread($fh, filesize($myFile));
		fclose($fh);
		$theData1 = $theData;
				
		$theData = $theData1;
		
		$theData =  str_replace("~jbtitle~",$jobtitle,$theData);
		$theData =  str_replace("~cmnyname~",$cmpny,$theData);
		$theData =  str_replace("~jbid~",$jobid,$theData);
		
		                     
		
		$subject="Interngration - Job Posting Success Mail";
		
		
		$headers  = 'MIME-Version: 1.0'."\n";
		$headers .= 'Content-type: text/html; charset=iso-8859-1'."\n";
		$headers .= "From: Interngration<info@interngration.com>\r\n";	
		$headers .= "Reply-To: info@interngration.com\r\n";
		$headers .= "Return-path: info@interngration.com";
		
		
		mail($to_mail,$subject,$theData, $headers);
		



       header("location:postedJob.php?status=1");
?>
