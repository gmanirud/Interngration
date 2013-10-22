<?PHP 
	include "../config.php";


	mysql_select_db("$dbname")or die("cannot select DB");
	$txt_UserName = $_GET["User"];
	$txt_Password = $_GET["Pass"];

	$sql="SELECT * FROM student_register WHERE UserName='$txt_UserName' and Password='$txt_Password'";
	$result=mysql_query($sql);
	
    $count=mysql_num_rows($result);
	$row=mysql_fetch_array($result);
	
	if($count=='1')
	{
		session_start();
		
		//session_register("uid");	
		$_SESSION["uid"] = $row['id'];	
		
		//session_register("uname");	
		$_SESSION["uname"] = $row['FirstName'];	
		$_SESSION["mail_id"] = $row['Email'];	
		$_SESSION["s_id"] = $row['session_id'];	
			
		print "2";
		
				
	}
	else
	{
			print "1";		
	}
	
?>