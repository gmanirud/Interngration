<?PHP
include "config.php";
session_start();
$uid=$_SESSION["uid"];
$rid=$_GET["rid"];
$ses_result=mysql_select_db($dbname) or die(mysql_error());
					
		   $sqlUpdate ="Update recruiter_register set Profile_Image='' where id='$rid'";
		  // print $sqlUpdate;
	       $result=mysql_query($sqlUpdate);
		
        header("location:recruiter-home-page.php");
?>
