<?php
   include "../config.php";
   
   
   $company=trim($_GET['company']);
   $hr=trim($_GET['hr']);
   $upTable=$_GET['upTable'];
   
    if($upTable=="temptable")
   {
   if(($company!="")||($hr!="")||($contact!=""))
   {
    $psId=$_GET['psId'];
   $sqlUpdate = "Update recruiter_register_temp set companyName='".$company."',hrLead='".$hr."' where session_id='".$psId."'";
   $result=mysql_query($sqlUpdate,$link);
   
   $ses_result=mysql_select_db($dbname) or die(mysql_error());   
   $sql="select * from recruiter_register_temp where session_id='".$psId."'";
   $ses_result=mysql_query($sql);
   $res=mysql_fetch_array($ses_result);
   $companyName=$res['companyName'];
   $hrLead=$res['hrLead'];
   $Email=$res['Email'];
   
?>

<li>Company Name: <?php print $companyName; ?></li>
<li>HR lead: <?php print $hrLead; ?></li>
<li>Contact: <?php print $Email; ?></li>

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
   $Email=$res['Email'];
   
?>

<li>Company Name: <?php print $companyName; ?></li>
<li>HR lead: <?php print $hrLead; ?></li>
<li>Contact: <?php print $Email; ?></li>
<?php
   }
  }
  
  
  if($upTable=="maintable")
   {
	   $puId=$_GET['puId'];
   if(($company!="")||($hr!="")||($contact!=""))
   {
    
   $sqlUpdate = "Update recruiter_register set companyName='".$company."',hrLead='".$hr."' where id='".$puId."'";
   $result=mysql_query($sqlUpdate,$link);
   
   $ses_result=mysql_select_db($dbname) or die(mysql_error());   
   $sql="select * from recruiter_register where id='".$puId."'";
   $ses_result=mysql_query($sql);
   $res=mysql_fetch_array($ses_result);
   $companyName=$res['companyName'];
   $hrLead=$res['hrLead'];
   $Email=$res['Email'];
   
?>

<li>Company Name: <?php print $companyName; ?></li>
<li>HR lead: <?php print $hrLead; ?></li>
<li>Contact: <?php print $Email; ?></li>

<?php
   }
   else
   {
    $ses_result=mysql_select_db($dbname) or die(mysql_error());   
   $sql="select * from recruiter_register where id='".$puId."'";
   $ses_result=mysql_query($sql);
   $res=mysql_fetch_array($ses_result);
   $companyName=$res['companyName'];
   $hrLead=$res['hrLead'];
   $Email=$res['Email'];
   
?>

<li>Company Name: <?php print $companyName; ?></li>
<li>HR lead: <?php print $hrLead; ?></li>
<li>Contact: <?php print $Email; ?></li>
<?php
   }
  }
   ?>