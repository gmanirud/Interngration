<?PHP
include "config.php";
$verid = $_GET["verid"];
session_start();

if(isset($_SESSION['coinreferalid']))
{
$coinreferalid=$_SESSION['coinreferalid'];

$sqlUpdate = "Update student_register_temp set ref_id='".$coinreferalid."' where session_id='".$verid."'";
$result=mysql_query($sqlUpdate,$link);

$ses_result1=mysql_select_db($dbname) or die(mysql_error());
$sql1="Select *  from student_register  where session_id='".$coinreferalid."'";
$ses_result1=mysql_query($sql1);
$res1=mysql_fetch_array($ses_result1);
$Coinscollect=$res1['Coins']+20;


$sqlUpdate1 = "Update student_register set Coins='".$Coinscollect."' where session_id='".$coinreferalid."'";
$result1 = mysql_query($sqlUpdate1,$link);
}


$ses_result=mysql_select_db($dbname) or die(mysql_error());
$sql="Select *  from student_register_temp  where session_id='".$verid."'";
$ses_result=mysql_query($sql);
$res=mysql_fetch_array($ses_result);
$mailid=$res['Email'];


$FirstName=ucfirst(strtolower($res['FirstName']));
$LastName=ucfirst(strtolower($res['LastName']));

$uname=$FirstName." ".$LastName;


	    $myFile = "StudentActivationMail.html";
		$fh = fopen($myFile,'r');
		$theData = fread($fh, filesize($myFile));
		fclose($fh);
		$theData1 = $theData;
				
		$theData = $theData1;
		
		$theData =  str_replace("~actid~",$verid,$theData);
		$theData =  str_replace("~uname~",$uname,$theData);
		
		                     
		
		$subject="Interngration - Account Activation Mail";
		
		
		$headers  = 'MIME-Version: 1.0'."\n";
		$headers .= 'Content-type: text/html; charset=iso-8859-1'."\n";
		$headers .= "From: Interngration<info@interngration.com>\r\n";	
		$headers .= "Reply-To: info@interngration.com\r\n";
		$headers .= "Return-path: info@interngration.com";
		mail($mailid,$subject,$theData, $headers);
		
	
         header("location:student-login.php?status=1");
?>
