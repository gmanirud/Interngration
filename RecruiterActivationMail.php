<?PHP
include "config.php";

$sId=$_REQUEST["hdn_sId"];

if(isset($_POST['academic_chk']))
{
	//$absent = array();
	$n = $_POST["academic_chk"];
	//print $n;
	
	$array1 = array();
	for($h=1;$h<=$n;$h++)
	{
		if(isset($_POST["academic_".$h]))
		{
			$acdemic = $_POST["academic_".$h];		
			//print $acdemic."<br/>";
			
			$array1[]=$acdemic;
		}
		
	}
	// Serializing the array
	$academic_array=mysql_escape_string(base64_encode(serialize($array1)));
}
if(isset($_POST['session_chk']))
{
	//$absent = array();
	$k = $_POST["session_chk"];
	//print $n;
	
	$array2 = array();
	for($x=1;$x<=$k;$x++)
	{
		if(isset($_POST["session_chk_".$x]))
		{
			$session_takes = $_POST["session_chk_".$x];			
			//print $session_takes."<br/>";
			
			$array2[]=$session_takes;
			
		}
		
	}
	// Serializing the array
	$sesion_array=mysql_escape_string(base64_encode(serialize($array2)));
}

$sqlUpdate = "Update recruiter_register_temp set academic_background='$academic_array',session_takes='$sesion_array' where session_id='$sId'";
$result=mysql_query($sqlUpdate,$link);
   
$ses_result=mysql_select_db($dbname) or die(mysql_error());   
$sql="select * from recruiter_register_temp where session_id='$sId'";
$ses_result=mysql_query($sql);
$rs=mysql_fetch_array($ses_result);	

// UnSerializing the array			
$array_ab= unserialize(base64_decode($rs["academic_background"]));
foreach ($array_ab as $val ) 
{	
	$aca_bg =$val;
	//print $aca_bg."<br/>";
	
}   
//print "<br/>";

// UnSerializing the array		
$array_sess= unserialize(base64_decode($rs["session_takes"]));
foreach ($array_sess as $val1 ) 
{	
	$aca_sess =$val1;
	//print $aca_sess."<br/>";
}

   
?>
<?PHP


$ses_result=mysql_select_db($dbname) or die(mysql_error());
$sql="Select *  from recruiter_register_temp  where session_id='$sId'";
$ses_result=mysql_query($sql);
$res=mysql_fetch_array($ses_result);
$mailid=$res['Email'];

$FirstName=ucfirst(strtolower($res['FirstName']));
$LastName=ucfirst(strtolower($res['LastName']));
$uname=$FirstName." ".$LastName;


$myFile = "RecruiterActivationMail.html";
$fh = fopen($myFile,'r');
$theData = fread($fh, filesize($myFile));
fclose($fh);
$theData1 = $theData;
		
$theData = $theData1;

$theData =  str_replace("~actid~",$sId,$theData);
$theData =  str_replace("~uname~",$uname,$theData);

					 

$subject="Interngration - Recruiter Account Activation Mail";


$headers  = 'MIME-Version: 1.0'."\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1'."\n";
$headers .= "From: Interngration<info@interngration.com>\r\n";	
$headers .= "Reply-To: info@interngration.com\r\n";
$headers .= "Return-path: info@interngration.com";
mail($mailid,$subject,$theData, $headers);


 header("location:recruiter-login.php?status=1");
?>
