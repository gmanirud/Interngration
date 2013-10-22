<?PHP
include "config.php";

session_start();
$sessionid = session_id();

$FirstName = $_POST["FirstName"];
$LastName = $_POST["LastName"];
$Company = $_POST["Company"];
$Address = $_POST["Address"];
$Country = $_POST["Country"];
$Email = $_POST["Email"];
$UserName = $_POST["UserName"];
$password1 = $_POST["password1"];

//SHA-1 hashing of the password
//$password1 = sha1($password1);

$sqlInsert = "insert into student_register_temp (FirstName,LastName,Company,Address,Country,Email,UserName,Password,session_id) values ('$FirstName','$LastName','$Company','$Address','$Country','$Email','$UserName','$password1','$sessionid')";

//print $sqlInsert;

$result=mysql_db_query($dbname,$sqlInsert,$link);

header("location:student-registration-last.php?nextid=".$sessionid);
?>
