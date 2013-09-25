<?PHP
include "config.php";

session_start();
$sessionid = session_id();

$FirstName = $_POST["FirstName"];
$LastName = $_POST["LastName"];
$Company = $_POST["Company"];
$Address = $_POST["Address"];
$Email = $_POST["Email"];
$UserName = $_POST["UserName"];
$password1 = $_POST["password1"];

$sqlInsert = "insert into recruiter_register_temp (FirstName,LastName,Company,Address,Email,UserName,Password,session_id) values ('$FirstName','$LastName','$Company','$Address','$Email','$UserName','$password1','$sessionid')";

//print $sqlInsert;

$ses_result=mysql_select_db($dbname) or die(mysql_error());   
$sql="select * from recruiter_register_temp where session_id='".$session."'";
$ses_result=mysql_query($sql);
$rowcount=mysql_num_rows($ses_result);
if($rowcount==0)
{

	$result=mysql_db_query($dbname,$sqlInsert,$link);

}
header("location:recruiter-registration-last.php?nextrid=".$sessionid);
?>
