<?PHP
 include "../config.php";

$sid=$_GET['session'];     
$invmail=$_GET['invmail'];

   $ses_result=mysql_select_db($dbname) or die(mysql_error());   
    
   $sql1="select * from student_register where Email='".$invmail."'";
   $ses_result1=mysql_query($sql1);
   $rowcount= mysql_num_rows($ses_result1);
	
    if($rowcount==0)
	{		
   $sql="select * from student_register_temp where session_id='".$sid."'";
   $ses_result=mysql_query($sql);
   $res=mysql_fetch_array($ses_result);
   
   $FirstName=$res["FirstName"];
   $LastName=$res["LastName"];
   $session_id=$res["session_id"];
	
	$invitename=$FirstName." ".$LastName;

    
		$theData = "<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
<html xmlns='http://www.w3.org/1999/xhtml'>
<head>
<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
<title>Invitation for Interngration</title>
</head>
<body>
<table width='100%' border='0'>
  <tr>
    <td>Hey you</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
  <td>&nbsp;</td>
    <td align='justify'>
    ".$invitename." has invited you to join Interngration. . Interngration is an online multimedia platform that connects startups and SME’s with a great pool of students, like yourself. As students, we know how overwhelming and frustrating a career fair can be, so we wanted to improve this experience for you by bringing it to the online platform. 
                
We’ve handpicked some fantastic companies to be our launch partners who are looking to hire engineering students for internship, PEY and new grad positions.  
 
Interngration’s alpha is now open for registration, so head over to http://interngration.com and join the quickly increasing pool of candidates.

And in the meantime, watch this video to see what we have to offer: http://vimeo.com/76490050. We look forward to having you onboard, thanks!
 
Cheers,
The Interngration Team"
    </td>
  </tr>
  <tr>
    <td>&nbsp;</td>

  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>Cheers<br/>
    ".$invitename."</td>
  </tr>
</table>



</body>
</html>";
		                     
		
		$subject=$invitename." - Greet for Webinar";
		
		
		$headers  = 'MIME-Version: 1.0'."\n";
		$headers .= 'Content-type: text/html; charset=iso-8859-1'."\n";
		$headers .= "From: Interngration<info@interngration.com>\r\n";	
		$headers .= "Reply-To: info@interngration.com\r\n";
		$headers .= "Return-path: info@interngration.com";
		mail($invmail,$subject,$theData, $headers);

    print 2;
	}
	else
	{
		print 3;
	}
?>
