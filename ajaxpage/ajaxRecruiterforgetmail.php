<?PHP 
	include "../config.php";
    
	mysql_select_db("$dbname")or die("cannot select DB");
	$rec_Email = $_GET["rec_Email"];
	
	$sql="SELECT * FROM recruiter_register WHERE Email='$rec_Email'";
	
	$result=mysql_query($sql);
	
    $count=mysql_num_rows($result);
	$row=mysql_fetch_array($result);
	
	
	
	if($count>=1)
	{
		
		$Email = $row['Email'];
		$UserName = $row['UserName'];	
		$Password = $row['Password'];	
		
		
		$FirstName=ucfirst(strtolower($row['FirstName']));
		$LastName=ucfirst(strtolower($row['LastName']));

		$flname= $FirstName." ".$LastName ;
		
		$myFile = "../recruiterForgetMail.html";
		$fh = fopen($myFile,'r');
		$theData = fread($fh, filesize($myFile));
		fclose($fh);
		$theData1 = $theData;
				
		$theData = $theData1;
		
		$theData =  str_replace("~flname~",$flname,$theData);
		$theData = 	str_replace("~uname~",$UserName,$theData);
		$theData =  str_replace("~pword~",$Password,$theData);
		                     
		
		$subject="Interngration - Recruiter ForgetPassword Mail";
		$to=$EmailId;
		
		$headers  = 'MIME-Version: 1.0'."\n";
		$headers .= 'Content-type: text/html; charset=iso-8859-1'."\n";
		$headers .= "Message-ID: <".gettimeofday()." TheSystem@".$_SERVER['SERVER_NAME'].">\r\n";
        $headers .= "X-Mailer: PHP v".phpversion()."\r\n";
		$headers .= "From: Interngration<info@interngration.com>\r\n";	
		$headers .= "Reply-To: info@interngration.com\r\n";
		$headers .= "Return-path: info@interngration.com";
		
		mail($Email,$subject,$theData, $headers);
		
	     print  "1";	
				
	}
	else
	{
		print "2";		
	}
	
?>