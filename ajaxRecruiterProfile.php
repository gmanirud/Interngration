<?php
   include "../config.php";
   $psId=$_GET['psId'];
   $company=trim($_GET['company']);
   $hr=trim($_GET['hr']);
   $contact=trim($_GET['contact']);
   
  
   
   if(($company!="")||($hr!="")||($contact!=""))
   {
    
   $sqlUpdate = "Update recruiter_register_temp set companyName='".$company."',hrLead='".$hr."',Contact='".$contact."' where session_id='".$psId."'";
   $result=mysql_query($sqlUpdate,$link);
   
   $ses_result=mysql_select_db($dbname) or die(mysql_error());   
   $sql="select * from recruiter_register_temp where session_id='".$psId."'";
   $ses_result=mysql_query($sql);
   $res=mysql_fetch_array($ses_result);
   $companyName=$res['companyName'];
   $hrLead=$res['hrLead'];
   $Contact=$res['Contact'];
   
?>

<li>Company Name: <?php print $companyName; ?></li>
<li>HR lead: <?php print $hrLead; ?></li>
<li>Contact email: <?php print $Contact; ?></li>

<?php
   }
   else
   {
    $ses_result=mysql_select_db($dbname) or die(mysql_error());   
   $sql="select * from recruiter_register_temp where session_id='".$psId."'";
   $ses_result=mysql_query($sql);
   $res=mysql_fetch_array($ses_result);
   $companyName=$res['companyName'];
   $hrLead=$res['hrLead'];
   $Contact=$res['Contact'];
   
?>

<li>Company Name: <?php print $companyName; ?></li>
<li>HR lead: <?php print $hrLead; ?></li>
<li>Contact email: <?php print $Contact; ?></li>
<?php
   }
  
   ?>