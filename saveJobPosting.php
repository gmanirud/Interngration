<?PHP
include "config.php";

session_start();
$sessionid = session_id();

$job_title = $_POST["job_title"];
$job_id = $_POST["job_id"];
$jbdept = $_POST["jbdept"];
$jbdetails = $_POST["jbdetails"];
$dead_line = $_POST["dead_line"];
$dt_post = $_POST["dt_post"];
$recruit_id=$_SESSION["ruid"];

$ses_result=mysql_select_db($dbname) or die(mysql_error());
$sql1="Select *  from recruiter_register where id='".$recruit_id."'";
$ses_result=mysql_query($sql1);
$res=mysql_fetch_array($ses_result);

$companyName=$res["companyName"];


$sqlInsert = "insert into recruiter_jopposting (Job_title,Job_id,Job_Dept,Job_Detail,Company_Name,Date_Post,Dead_line,recruiter_id) values ('$job_title','$job_id','$jbdept','$jbdetails','$companyName','$dt_post','$dead_line','$recruit_id')";

//print $sqlInsert;
$result=mysql_db_query($dbname,$sqlInsert,$link);

header("location:jobPosting.php?stats=1");
?>
