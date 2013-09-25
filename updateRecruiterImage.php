<?php 
include "config.php";

$sId =$_POST["hdn_sessionid"];
$uId =$_POST["hdn_uid"];

if($sId!="")
{
$target_path1 = "uploads/Recruiter/";
date_default_timezone_set("Asia/Calcutta");
$dtTime = date('d_M_Y-H_i_s');
$target_path1 = $target_path1.$dtTime.$_FILES['txtFile']['name']; 	
$profileImage = $dtTime. $_FILES['txtFile']['name']; 
if(move_uploaded_file($_FILES['txtFile']['tmp_name'], $target_path1)) 
{
	//echo "The file ".  basename( $_FILES['txt_invoice']['name'])." has been uploaded";
}
 
 
$sql="update recruiter_register_temp set Profile_Image='$profileImage' where session_id='$sId'";
$result=mysql_query($sql);


header("location:recruiter-registration-last.php?nextrid=".$sId);
}

if($uId!="")
{
$target_path1 = "uploads/Recruiter/";
date_default_timezone_set("Asia/Calcutta");
$dtTime = date('d_M_Y-H_i_s');
$target_path1 = $target_path1.$dtTime.$_FILES['txtFile']['name']; 	
$profileImage = $dtTime. $_FILES['txtFile']['name']; 
if(move_uploaded_file($_FILES['txtFile']['tmp_name'], $target_path1)) 
{
	//echo "The file ".  basename( $_FILES['txt_invoice']['name'])." has been uploaded";
}
 
 
$sql="update recruiter_register set Profile_Image='$profileImage' where id='$uId'";
$result=mysql_query($sql);


header("location:recruiter-home-page.php");
}
	
?>