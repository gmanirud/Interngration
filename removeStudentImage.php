<?PHP
include "config.php";
session_start();
$s_uid=$_SESSION["uid"];
if(isset($_GET["sid"]))
{
$rid=$_GET["sid"];
$ses_result=mysql_select_db($dbname) or die(mysql_error());
					
$sqlUpdate ="Update student_register set Profile_Image='' where id='$rid'";
		  // print $sqlUpdate;
$result=mysql_query($sqlUpdate);
}

else if(isset($_GET["resid"]))
{
$resid=$_GET["resid"];
$ses_result=mysql_select_db($dbname) or die(mysql_error());
					
$sqlUpdate ="Update student_register set job_resume='' where id='$resid'";
		  // print $sqlUpdate;
$result=mysql_query($sqlUpdate);
}
		
        header("location:student-profile.php");
?>
