
<script>
collection = [
<?php
	include "config.php"; 	
		$ses_result=mysql_select_db($dbname) or die(mysql_error());
					
		$sqlget="Select *  from student_register";
		
		$ses_result=mysql_query($sqlget);
		$rowcount= mysql_num_rows($ses_result);	
	
		while($res=mysql_fetch_array($ses_result))
		{			
			$UserName=$res["UserName"];
			$FirstName=strtolower($res["FirstName"]);
			$LastName=strtolower($res["LastName"]);
			$Email=$res["Email"];
		
		
			?>
'"<?php print $FirstName; ?> <?php print $LastName; ?>" < <?php print $Email; ?> >',
<?php
}
?>
<?php
        $ses_result1=mysql_select_db($dbname) or die(mysql_error());
	    $sqlget1="Select *  from recruiter_register";
		
		$ses_result1=mysql_query($sqlget1);
		$rowcount1= mysql_num_rows($ses_result1);	
	
		while($res1=mysql_fetch_array($ses_result1))
		{			
			$UserName1=$res1["UserName"];
			$Email1=$res1["Email"];
			$FirstName1=strtolower($res1["FirstName"]);
			$LastName1=strtolower($res1["LastName"]);
		
		
			?>
'"<?php print $FirstName1; ?> <?php print $LastName1; ?>" < <?php print $Email1; ?> >',
<?php
}
?>
];
</script>
