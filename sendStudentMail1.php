<?PHP
include "config.php";


function arrayDuplicate($array) 
{ 
return array_unique(array_diff_assoc($array1,array_unique($array1))); 
}; 

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
$totarr=count($explodeit)-1;
$s1="";
$s2="";
for($i=0;$i<=$totarr/2;$i++)
{
	
	for($j=$i+1;$j<=$totarr;$j++)
	{
		
       if(isset($explodeit[$i],$explodeit[$j]))
	   {
		if(trim($explodeit[$i])==trim($explodeit[$j]))
		{
			//print "hi";
			unset($explodeit[$j]);
		}
	   }
	}
	
}

//$result=arrayDuplicate($explodeit);
//$result = array_unique($explodeit);
//$dupes = array_diff_key( $explodeit, $result );
//$alpha= array_keys(array_count_values($alpha));
//array_count_values($dupes);

//$array = array("Ram","Thiru","Ram","Thiraviya");
//$array = array_unique($array);

//print_r($array);
print_r($explodeit);

//print count($explodeit);




//// here $explodeit act as an array
//
//foreach ($explodeit as $value) 
//{
//	// check the value is emty or not.. b'coz there will be an empty array value after the last comma in $mystring
//	if($value!="")
//	{
//		//print $value."<br/>";
//		
//		
//		// replace > symbol with space
//		$string = str_replace (">", "", $value);   
//		
//		// here $splited act as an array
//		$splited = explode("<", $string);
//			
//		//$username=$splited[0];
//		$emailid=trim($splited[1]);
//		if($emailid!="")
//		{
//		$sqlInsert = "insert into student_mailbox (from_mail,to_mail,subject,message,SendDate,group_id) values ('$from_mail','$emailid','$subject_mail','$message_mail',NOW(),$gpid)";
//        $result=mysql_db_query($dbname,$sqlInsert,$link);
//		}
//		
//	}
//}
//	    
//
//
//
//
//
//header("location:studentInbox.php?stats=1");
?>
