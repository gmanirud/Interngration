<?PHP
include "../config.php";

session_start();
$sessionid = session_id();

$FirstName = $_GET["FirstName"];
$LastName = $_GET["LastName"];
$Company = $_GET["Company"];
$Address = $_GET["Address"];
$password2 = $_GET["password2"];
$userid = $_GET["userid"];


$sqlupdate = "update recruiter_register set FirstName='$FirstName',LastName='$LastName',Company='$Company',Address='$Address'";
if($password2!="")
{
       $sqlupdate=$sqlupdate." ,Password='$password2' ";
}
$sqlupdate=$sqlupdate."  where id='$userid'";
 $result=mysql_query($sqlupdate,$link);

   $ses_result=mysql_select_db($dbname) or die(mysql_error());   
   $sql="select * from recruiter_register where id=$userid";
   $ses_result=mysql_query($sql);
   $res=mysql_fetch_array($ses_result);
   $FirstName = $res["FirstName"];
	$LastName = $res["LastName"];
	$Company = $res["Company"];
	$Address = $res["Address"];
	$Email = $res["Email"];
	$UserName = $res["UserName"];
?>


<div class="one-half"><h4>Basic Information</h4>
<div style="margin-top:20px;">First Name &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;<?php print $FirstName; ?><br><br>
Last Name &nbsp; &nbsp; : &nbsp;&nbsp;<?php print $LastName; ?><br><br>
Company &nbsp; &nbsp; &nbsp; : &nbsp;&nbsp;<?php print $Company; ?><br><br>
Address &nbsp; &nbsp; &nbsp; &nbsp; : &nbsp;&nbsp;<?php print $Address; ?><br><br></div>
                </div>
                
                <div class="one-half-last"><h4>Account Information</h4>
<div style="margin-top:20px;">
Email &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;: &nbsp;&nbsp;<?php print $Email; ?><br><br>
User Name &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; : &nbsp;&nbsp;<?php print $UserName; ?>
</div>
                </div>     
 <div class="grid_4">
 

  <input type='button' name="Edit" value="Edit" id="editacc" class="button-big red" onClick="editstudentaccount();" />


  </div>   
