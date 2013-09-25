<?PHP
include "config.php";

        $ses_result=mysql_select_db($dbname) or die(mysql_error());
		$sqlget="Select MAX(group_id) as gpid from student_mailbox";
		$ses_result=mysql_query($sqlget);
		$rowcount= mysql_num_rows($ses_result);	
		$res=mysql_fetch_array($ses_result);
       	$gpid=$res['gpid']+1;

session_start();
$sessionid = session_id();
$from_mail=$_SESSION["mail_id"];

$to_mail = $_POST["to_mail"];
$subject_mail = $_POST["subject_mail"];
$message_mail = str_replace("'","''",$_POST["message_mail"]);
$explodeit = explode(",", $to_mail);   


//  Restrict the duplicate Email
$totarr=count($explodeit)-1;

for($i=0;$i<=$totarr/2;$i++)
{
	
	for($j=$i+1;$j<=$totarr;$j++)
	{
		
       if(isset($explodeit[$i],$explodeit[$j]))
	   {
		if(trim($explodeit[$i])==trim($explodeit[$j]))
		{
			
			unset($explodeit[$j]);
		}
	   }
	}
	
}


// here $explodeit act as an array

foreach ($explodeit as $value) 
{
	// check the value is emty or not.. b'coz there will be an empty array value after the last comma in $mystring
	if($value!="")
	{
		//print $value."<br/>";
		
		
		// replace > symbol with space
		$string = str_replace (">", "", $value);   
		
		// here $splited act as an array
		$splited = explode("<", $string);
			
		//$username=$splited[0];
		$emailid=trim($splited[1]);
		if($emailid!="")
		{
		$sqlInsert = "insert into student_mailbox (from_mail,to_mail,subject,message,SendDate,group_id) values ('$from_mail','$emailid','$subject_mail','$message_mail',NOW(),$gpid)";
        $result=mysql_db_query($dbname,$sqlInsert,$link);
		}
		
	}
}
	    





header("location:recruiterInbox.php?stats=1");
?>
