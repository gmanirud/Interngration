<?php 
include "config.php";

$sId =$_POST["hdn_sessionid"];

$target_path1 = "uploads/StudentImage/";
date_default_timezone_set("Asia/Calcutta");
$dtTime = date('d_M_Y-H_i_s');
$target_path1 = $target_path1.$dtTime.$_FILES['txtFile']['name']; 	
$profileImage = $dtTime. $_FILES['txtFile']['name']; 
if(move_uploaded_file($_FILES['txtFile']['tmp_name'], $target_path1)) 
{
	//echo "The file ".  basename( $_FILES['txt_invoice']['name'])." has been uploaded";
}

       $ses_result=mysql_select_db($dbname) or die(mysql_error());   
	   $sql="select * from student_register_temp where session_id='$sId'";
	   $ses_result=mysql_query($sql);
	   $res=mysql_fetch_array($ses_result); 
	   $Coins=$res["Coins"];
	     $imgcoinflg=$res["imgcoinflg"];
		 
         if($imgcoinflg=='0')
		{
		   $totcoin=$Coins+150;
		   $sqlUpdate ="Update student_register_temp set Coins='$totcoin', imgcoinflg='1' where session_id='$sId'";
	       $result=mysql_query($sqlUpdate);
		}
		$sql="update student_register_temp set Profile_Image='$profileImage' where session_id='$sId'";
		$result=mysql_query($sql);


header("location:student-registration-last.php?nextid=".$sId);
	
?>