<?PHP
include "config.php";
session_start();
$uid=$_SESSION["uid"];
$ses_result=mysql_select_db($dbname) or die(mysql_error());
					
		
		
		$target_path = "uploads/Resume/";
		//date_default_timezone_set("Asia/Calcutta");
		 $dtTime = date('d_M_Y-H_i_s');
		 $target_path = $target_path.$dtTime.$_FILES['resume']['name']; 	
		 $filName = $dtTime. $_FILES['resume']['name']; 
		   if(move_uploaded_file($_FILES['resume']['tmp_name'], $target_path)) 
		 {
				
		 }
		 $sqlupdate = "update student_register set job_resume='$filName' where id=$uid";
		 $result=mysql_query($sqlupdate,$link);
		 
		 $ses_result1=mysql_select_db($dbname) or die(mysql_error());   
         $sql1="select * from student_register where id='$uid'";
	     $ses_result1=mysql_query($sql1);
	     $res1=mysql_fetch_array($ses_result1); 
	     $Coins=$res1["Coins"];
		 $rescoinflg=$res1["rescoinflg"];
		 
         if($rescoinflg=='0')
		{
		   $totcoin=$Coins+50;
		   $sqlUpdate ="Update student_register set Coins='$totcoin', rescoinflg='1' where id='$uid'";
	       $result=mysql_query($sqlUpdate);
		}
		
                                


        header("location:student-profile.php");
?>
