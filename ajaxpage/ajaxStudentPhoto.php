<?php
   include "../config.php";
   $session=$_GET['session'];
   $photoname=$_GET['photoname'];
 
  
   
   if(isset($session))
   {
    
	$target_path = "../Profile/";
	$dtTime = date('d_M_Y-H_i_s');
	$target_path = $target_path.$dtTime.$_FILES[$photoname]['name']; 	
	$filName = $dtTime. $_FILES[$photoname]['name']; 
    if(move_uploaded_file($_FILES[$photoname]['tmp_name'], $target_path)) 
	 {
			 $sqlUpdate = "Update student_register_temp set Profile_Image='".$filName."' where session_id='".$session."'";
            $result=mysql_query($sqlUpdate,$link);
	 }
       $ses_result=mysql_select_db($dbname) or die(mysql_error());   
	   $sql="select * from student_register_temp where session_id='".$session."'";
	   $ses_result=mysql_query($sql);
	   $res=mysql_fetch_array($ses_result);
	   $Profile_Image=$res['Profile_Image'];
       $schoolName=$res['schoolName'];
	   $Program=$res['Program'];
	   $Contact=$res['Contact'];
 
 
   
?>

<table width="435" border="0" style="margin:10px; border:1px solid #666666; padding:10px;" id="profle">
             <tr>
    		  <td><li>School: <?php print $schoolName; ?></li>
<li>Program: <?php print $Program; ?></li>
<li>Contact: <?php print $Contact; ?></li></td>
    <td>
<form enctype="multipart/form-data" action="#" method="post">
<div align="right" id="editbutton1" style="padding-right:30px;">
<input type="button" value="Edit" onClick="editstudentprofile()" name="edt1" id="edt1" >
</div>
                
<label class="file-upload">
			<span><strong>Upload a pic (+50 coins)</strong></span>
			<input type="file" name="uploadfile" id="uploadfile" onselect="ckhimage(this.value)" src="<?php print $Profile_Image; ?>" />
		</label>
        <input type="hidden" name="session" id="session" value="<?php print $session; ?>">
</form></td>
  </tr>
</table>






<?php
   }
 ?>