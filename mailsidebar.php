  <?php
		$mid=$_SESSION["mail_id"];
	    include "config.php"; 	
		$ses_result=mysql_select_db($dbname) or die(mysql_error());
		$sqlget="Select *  from student_mailbox where to_mail='".$mid."' AND flg_read='0' AND flg_delete='0' AND flg_archive='0'";
		$ses_result=mysql_query($sqlget);
		$rowcount= mysql_num_rows($ses_result);	
			?>   
            <script>
			function chkval()
			{
			    if(document.getElementById("searchBX").value=="")
	            {
					document.getElementById("error").style.display='block';
					document.getElementById("error").innerHTML='Please Enter the Search Inbox!';
					document.getElementById("searchBX").focus();
					return false;
            	}
				return true;
			}
	</script> 
<div class="section">
            <div class="grid_20"> 
               
                <!-- sidebar nav -->
                <div class="title"><h4>Inbox</h4></div>
                
				 <ul class="sidebar">                        
                   <li><form id="frm" name="frm" action="studentSearchInbox.php" method="post" onsubmit="return chkval();">
  <input type="hidden" value="" />
  <input type="hidden" value="UTF-8" />
  <input type="text" size="19" name="searchBX" id="searchBX" placeholder="Search Inbox"/>
  <input type="submit" value="Search" style="cursor:pointer;" />
</form></li>
					<li><a href="ComposeMessage.php">Compose Message</a></li>
                    <li><a href="studentInbox.php">Inbox (<?php print $rowcount; ?>)</a></li>
                    <li><a href="studentSend.php">Sent</a></li>
                    <li><a href="studentArchive.php">Archived</a></li>
                    <li><a href="studentTrash.php">Trash</a></li>	
                    <li><p id="error" style="padding-left:10px; display:none; padding-top:5px; height:30px; color:#F00; font-weight:400; background-color:##CCC;"></p></li>
                     </ul>
                    
				 <div class="clear"></div> 

            </div><!-- end grid_4 -->
        </div>