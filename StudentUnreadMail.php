<!--  Mail Notification -->
 
 
 <style type="text/css">


#menu12 {
	position: relative;
	margin-left: 30px;
}

#menu12 a {
	display: block;
	width: 140px;
	
}

#menu12 ul {
	list-style-type: none;
}

#menu12 li {
	float: left;
	position: relative;
	text-align: center;
}


a
{	text-decoration:none; }
	


#mes{
	padding: 0px 3px;
	border-radius: 2px 2px 2px 2px;
	background-color: rgb(240, 61, 37);
	font-size: 9px;
	font-weight: bold;
	color: #fff;
	position: absolute;
	top: 5px;
	left: 73px;
}

.clean { display:none}

</style>

<!-- Mail Notification  -->

<div id="menu12">
	<ul>
		<li >
			<a href="studentInbox.php"   title="Mail Notification">
			<img src="images/emailIcon3.png" style="width: 30px;border:none;" />
			<?php
			include "config.php"; 	
		$ses_result=mysql_select_db($dbname) or die(mysql_error());
				$sql=mysql_query("Select *  from student_mailbox where to_mail='".$mail_id."' AND flg_read='0' AND flg_delete='0' AND flg_archive='0'");
				$comment_count=mysql_num_rows($sql);
				if($comment_count!=0)
				{
				echo '<span id="mes">'.$comment_count.'</span>';
				}
			?>
			</a>
		
		</li>
	</ul>
</div>