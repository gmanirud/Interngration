<?php

  session_start();

  if(isset($_SESSION["uid"])) {
    $username=$_SESSION["uname"];
    $mail_id=$_SESSION["mail_id"];
    $s_uid=$_SESSION["uid"];
  }
  
  else {
    header("location:student-login.php");
  }

?>


<!DOCTYPE HTML>
<html lang="en" class="no_js">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <?php
      $session=$_SESSION["s_id"];
      include "config.php"; 	
      $ses_result=mysql_select_db($dbname) or die(mysql_error());
      $sqlget="Select *  from student_register where session_id='$session'";
      $ses_result=mysql_query($sqlget);
      $rowcount= mysql_num_rows($ses_result);	

      if ($rowcount>0) {
        $res=mysql_fetch_array($ses_result);
        $FirstName = $res["FirstName"];
        $LastName = $res["LastName"];
      }
    ?>
    
    <title> Display All Profiles</title>
    <!-- Favicon -->
    <link rel="shortcut icon" href="favicon.ico" />

    <!-- Load Google Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Inder' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Ubuntu+Condensed' rel='stylesheet' type='text/css'>

    <!-- Load Style Sheets -->
    <link rel="stylesheet" type="text/css" href="css/style.css" media="screen" />
    <link id="theme" rel="stylesheet" type="text/css" href="css/red.css" media="screen"/>
    <link rel="stylesheet" type="text/css" href="css/upload.css"/>

    <!--[if IE 8]><link rel="stylesheet" href="css/ie.css" type="text/css" media="screen"/><![endif]-->
    <!--[if IE 7]><link rel="stylesheet" href="css/ie.css" type="text/css" media="screen"/><![endif]-->

    <!-- Load Jquery/Modernizr Javascript -->
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <script type="text/javascript" src="js/modernizr.js"></script>

  </head>
  <body>
    <div id="wrapper"> 
      <!-- header -->
      <div class="fixposition">
        <div id="header-wrapper">
          <div id="header-content">
            <div id="logo"><a href="student-homepage.php"><img src="images/logo.png" alt="interngration" width="400" height="64" /></a></div>
            <!-- header nav menu -->
            <div id="menu" class="menu">
              <ul>
                <!-- <li><a href="">Welcome&nbsp; :&nbsp; <?php print $username; ?></a></li> -->
                <li><a href="student-homepage.php">Home</a></li>
                <li><a href="studentAccount.php"> My Account</a></li>
                <li><a href="logout.php" >Logout</a></li></ul>
              </ul>
              <br style="clear: left" />
            </div>
            <!-- end header nav menu--> 
          </div>
        </div>
      </div>
      <!-- end header -->

      <div id="body-background"><!-- this is the main background color of the page -->
        <div id="header-buffer"></div>
        <!-- hack for header overlap **DONT'TOUCH** --> 

        <!-- page header -->
        <div id="pageheader-background"><!-- area with alternate background -->
          <div class="pageheader-title">
          <span class="mailno"><?php include "StudentUnreadMail.php"; ?></span>
            <h1>Student Profile</h1>
            <span style="margin:0px 30px 0px 0px; float:right;">
              <a href="StudentRegisteredWebinar.php" class="button red">Upoming Webinars</a>
              <a href="StudentWatchedWebinar.php" class="button red">Watched Webinar</a>    
              <a href="studentJobApplication.php" class="button red">Job Application</a> 
              <a href="AppliedPostedJob.php" class="button red">Applied Job</a> 
              <a href="studentInbox.php" class="button red">Inbox</a>
              <a href="student-profile.php" class="button red">Profile</a></span> 
             </div>
        </div>

<!-- Start of profile  ---------------------------------------------------------------------->

         <!-- body -->
    <div id="body-wrapper" class="container_16">
      <div class="clear"></div>
      
      <!-- grid columns -->
      <div class="section">
        <?php
		 
      	  $ses_result=mysql_select_db($dbname) or die(mysql_error());   
		   $sql="select * from student_register where session_id='$session'";
		   $ses_result=mysql_query($sql);
		   $res=mysql_fetch_array($ses_result); 
		   $Coins=$res["Coins"];
		   
		 ?>
        
        <!-- title -->
        <div class="title">
          <!--<h4> Coins : <font id="coinid"><?php print $Coins;?></font> </h4>-->
        </div>
        
        <!-- 8/16 -->
        <div class="grid_8" style="min-height:310px;">
          <form id="frmProfile"  enctype="multipart/form-data" action="updateStudentProfileImage.php" method="post"  >
            <table width="435"  style="margin:10px; min-height:270px; border:1px solid; border-color:#CCC; padding:10px;">
            <tr>
        git       <td valign="top"><div style="float:left;">
                  <input type="button" value="Edit" onClick="editstudentprofile()" name="edt1" id="edt1" style="width:60px; cursor:pointer"/>
                  <input type="button" style="display:none; width:60px;cursor:pointer" value="Update" onClick="updatestudentprofile()" name="upd1" id="upd1" />
                </div></td>
              <td rowspan="2" align="right" valign="top"><div style="float:right;">
                  <label class="file-upload" style="cursor:pointer;">
                    <input type='file' id="txtFile" name="txtFile" onChange="chkimgvalidation();" />
                    <?php
				 if($Profile_Image!="")
				 {
					 ?>
                    <img src="uploads/StudentImage/<?php print $Profile_Image ?>" height="180" width="180" />
                    <?php
				 }
				 ?>
                  </label>
                  <input type="hidden" name="hdn_sessionid" id="hdn_sessionid" value="<?php print $session; ?>">
                </div>
                 <?php
				
				if($Profile_Image!="")
				{
				?>
                <a href="removeStudentImage.php?sid=<?php print $s_uid; ?>" > Remove Image </a>
                <?php
				}
				?>
                
                <div style="float:left;color:#F00; font-weight:400; padding-top:2px; display:none; padding-left:5px;" id="error5"></div>
                </td>
            </tr>
            <tr>
              <td valign="top"><div style="float:left;" id="divupdate"> <br/>
                  <li>University&nbsp;<b>:</b>&nbsp; <?php print $schoolName; ?></li>
                  <li>Program&nbsp;<b>:</b>&nbsp; <?php print $Program; ?></li>
                  <li>Year&nbsp;<b>:</b>&nbsp; <?php print $univ_Year; ?></li>
                  <li>Email&nbsp;<b>:</b>&nbsp; <?php print $Email; ?></li>
                </div>
                <div style="float:left; display:none" id="divedit">
                  <select name="txtSchool" id="txtSchool">
                    <option value="">Select University</option>
                    <option value="University of Toronto" <?php if($schoolName1=='University of Toronto'){?> selected='selected' <?php  } ?>>University of Toronto</option>
                    <option value="University of Waterloo" <?php if($schoolName1=='University of Waterloo'){?> selected='selected' <?php  } ?>>University of Waterloo</option>
                    <option value="Ryerson University" <?php if($schoolName1=='Ryerson University'){?> selected='selected' <?php  } ?>>Ryerson University</option>
                    <option value="York University" <?php if($schoolName1=='York University'){?> selected='selected' <?php  } ?>>York University</option>
                  </select>
                  <br/>
                  <select name="txtProgram" id="txtProgram">
                    <option value="Electrical Engineering" <?php if($Program1=='Electrical Engineering'){?> selected='selected' <?php  } ?>>Electrical Engineering</option>
              		<option value="Computer Engineering" <?php if($Program1=='Computer Engineering'){?> selected='selected' <?php  } ?>>Computer Engineering</option>
              		<option value="Computer Engineering" <?php if($Program1=='Engineering Science'){?> selected='selected' <?php  } ?>>Engineering Science</option>
              		<option value="Computer Engineering" <?php if($Program1=='Chemical Engineering'){?> selected='selected' <?php  } ?>>Chemical Engineering</option>
              		<option value="Computer Engineering" <?php if($Program1=='Mechanical Engineering'){?> selected='selected' <?php  } ?>>Mechanical Engineering</option>
              		<option value="Computer Engineering" <?php if($Program1=='Civil Engineering'){?> selected='selected' <?php  } ?>>Civil Engineering</option>
              		<option value="Computer Engineering" <?php if($Program1=='Industrial Engineering'){?> selected='selected' <?php  } ?>>Industrial Engineering</option>
              		<option value="Computer Engineering" <?php if($Program1=='Material Science Engineering'){?> selected='selected' <?php  } ?>>Material Science Engineering</option>
                    <option value="Computer Science" <?php if($Program1=='Computer Science'){?> selected='selected' <?php  } ?>>Computer Science</option>
                  </select>
                  <br/>
                  <select name="txtyear" id="txtyear">
                    <option value="">Select Year</option>
                     <option value="New Grad" <?php if($univ_Year=='New Grad'){?> selected='selected' <?php  } ?>>New Grad</option>
                    <option value="1st Year" <?php if($univ_Year=='1st Year'){?> selected='selected' <?php  } ?>>1st Year</option>
                    <option value="2nd Year" <?php if($univ_Year=='2nd Year'){?> selected='selected' <?php  } ?>>2nd Year</option>
                    <option value="3rd Year" <?php if($univ_Year=='3rd Year'){?> selected='selected' <?php  } ?>>3rd Year</option>
                    <option value="4th Year" <?php if($univ_Year=='4th Year'){?> selected='selected' <?php  } ?>>4th Year</option>
                    <option value="4th Year" <?php if($univ_Year=='Graduate Student'){?> selected='selected' <?php  } ?>>Graduate Student</option>
                  </select>
                  </br>
                  <ul>
                    <li>Email <?php print $Email; ?></li>
                  </ul>
                  <!-- <input type="text" id="txtcontact" name="txtcontact" placeholder="Contact"maxlength="100" style="width:190px;" value="<?php print $Contact1; ?>"/>--> 
                </div>
                <div style="float:left;color:#F00; font-weight:400; padding-top:1px; display:none" id="error2"></div></td>
            </tr>
          </form>
          <tr>
            <td>
            <form action="updateprofileresume.php" name="frmimage" id="frmimage" method="post" onSubmit="return Checkfiles()" enctype="multipart/form-data">
              Upload Your Resume<br>
              <input name="resume" id="resume" type="file" style="width:190px;">
              </td>
              <td valign="bottom"><input name="" type="submit" value="Upload" style="cursor:pointer;">
                &nbsp;&nbsp;
                <?php
            if($job_resume!="")
			{
				?>
                <a href="uploads/Resume/<?php print $job_resume; ?>" title="Previous Resume" target="_blank"><img src="images/resume.png" alt="Resume" width="20" title="Previous Resume"/>&nbsp;&nbsp;Resume</a>
                 &nbsp;&nbsp;&nbsp;&nbsp;<a href="removeStudentImage.php?resid=<?php print $s_uid; ?>" ><img src="images/delmark.png" title="Remove Resume"/></a>
                <?
				
			}
			?>
            </form>
            </td>
          </tr>
          </table>
        </div>
        <div class="grid_8" style="min-height:310px;">
          <div>
            <div style="float:left;">
              <h4 style="margin:20px;">About Me</h4>
            </div>
            <div style="float:right; padding-right:20px; padding-top:10px;">
              <input type="button" value="Edit" onClick="editstudentabout();" name="about_edit" id="about_edit" style="width:60px;cursor:pointer">
              <input type="button" value="Update" onClick="updatestudentabout();" style="display:none; width:60px;cursor:pointer" name="about_update" id="about_update" >
            </div>
          </div>
          <div style="float:left;color:#F00; font-weight:400; padding-top:50px; display:none" id="error1"></div>
          <p align="justify" style=" margin:20px; border:1px solid #666666; padding:10px; height:180px;width:395px;border:1px solid #ccc; Serif;overflow:auto;" id="para_aboutme">
            <?php
		 
			  print $AboutMe;
		 
		  ?>
          </p>
          <textarea id="aboutme"  name="aboutme" style="width:400px; height:180px; display:none; margin:20px;" placeholder="Enter About Me" ><?php print $AboutMe1; ?></textarea>
        </div>
        
        <!-- Technical Skill -->
        <div class="grid_8" style="min-height:310px;">
          <div>
            <div style="float:left;">
              <h4 style="margin:20px;">My Technical Skills</h4>
            </div>
            <div style="float:right; padding-right:20px; padding-top:10px;">
              <input type="button" value="Edit" onClick="edittechskill();" name="skill_edit" id="skill_edit" style="width:60px;cursor:pointer">
              <input type="button" value="Update" onClick="updatetechskill();" style=" width:60px;cursor:pointer;display:none;" name="skill_update" id="skill_update" >
            </div>
          </div>
          <br/>
          <br/>
          <br/>
          <div style="float:left;color:#F00; font-weight:400; padding-top:50px; display:none" id="error1"></div>
          <div align="justify" style=" margin:20px; border:1px solid #666666; padding:20px; height:175px;width:385px;border:1px solid #ccc; Serif;overflow:auto; " id="para_skill">
            <?php
		  $array = explode(',', $skill_set);
	   foreach ($array as  $arr)
	   {
		   if($arr=="")
		   {
			   break;
		   }
		   ?>
            <li> <?php print $arr ?> </li>
            <?php
	   }
		  
		  ?>
          </div>
        </div>

        <!-- Position For -->
        <div class="grid_8" style="min-height:310px;">
          <div>
            <div style="float:left;">
              <h4 style="margin:20px;">My Job Type and Language Preference</h4>
            </div>
            <div style="float:right; padding-right:20px; padding-top:10px;">
              <input type="button" value="Edit" onClick="editlanguage();" name="lan_edit" id="lan_edit" style="width:60px;cursor:pointer">
              <input type="button" value="Update" onClick="updatelanguage();" style="display:none; width:60px;cursor:pointer" name="lan_update" id="lan_update" >
            </div>
          </div>
          <br/>
          <br/>
          <br/>
          <div style="float:left;color:#F00; font-weight:400; padding-top:50px; display:none" id="error1"></div>
          <div align="justify" style=" margin:20px; border:1px solid #666666; padding:17px; height:180px;width:395px;border:1px solid #ccc; Serif;overflow:auto;" id="para_lan">
            <h4 style="">Job Type</h4>
            <br/>
            <?php
		  $array1 = explode(',', $position_for);
	   foreach ($array1 as  $arr1)
	   {
		   if($arr1=="")
		   {
			   break;
		   }
		   ?>
            <li> <?php print $arr1 ?> </li>
            <?php
	   }
		  
		  ?>
            <br/>
            <h4 style="">Language Preference</h4>
            <br/>
            <?php
		  $array2 = explode(',', $language_pref);
	   foreach ($array2 as  $arr2)
	   {
		   if($arr2=="")
		   {
			   break;
		   }
		   ?>
            <li> <?php print $arr2 ?> </li>
            <?php
	   }
		  
		  ?>
          </div>
          <table  border="0" id="tbllan" style="margin:10px; height:220px; min-width:415px; border:1px solid; border-color:#CCC;display:none; padding:10px;">
            <tr height="10">
              <td colspan="3"><h4 style="">Position For</h4></td>
            </tr>
            <?php
		  $array1 = explode(',', $position_for);
	    
		  ?>
            <tr valign="top">
              <td width="25%" ><input type="checkbox" name="positionFor[]" id="positionFor1" <?php foreach ($array1 as  $arr1)
	   {  if($arr1=="PEY"){ ?> checked="checked" <?php }  }?> value="PEY">
                PEY<br/></td>
              <td width="25%"><input type="checkbox" name="positionFor[]" id="positionFor2" <?php  foreach ($array1 as  $arr1)
	   {  if($arr1=="New Grad"){ ?> checked="checked" <?php } } ?> value="New Grad">
                New Grad<br/></td>
              <td width="25%"><input type="checkbox" name="positionFor[]" id="positionFor3" <?php  foreach ($array1 as  $arr1)
	   {  if($arr1=="Internship"){ ?> checked="checked" <?php } } ?> value="Internship">
                Internship<br/></td>
              <td width="25%"><input type="checkbox" name="positionFor[]" id="positionFor4" <?php  foreach ($array1 as  $arr1)
	   {  if($arr1=="All"){ ?> checked="checked" <?php } } ?> value="All">
                All<br/></td>
            </tr>
            <tr>
              <td>&nbsp;</td>
            </tr>
            <tr height="10">
              <td colspan="3"><h4 style="">Language Preference</h4></td>
            </tr>
            <?php
		  $array2 = explode(',', $language_pref);
	    
		  ?>
            <tr valign="top">
              <td width="30%" ><input type="checkbox" name="languagePref[]" id="languagePref1" <?php foreach ($array2 as  $arr2)
	   {  if($arr2=="English"){ ?> checked="checked" <?php }  }?> value="English">
                English<br/></td>
              <td width="30%"><input type="checkbox" name="languagePref[]" id="languagePref2" <?php  foreach ($array2 as  $arr2)
	   {  if($arr2=="Canadian French"){ ?> checked="checked" <?php } } ?> value="Canadian French">
                Canadian French<br/></td>
              <td width="30%"><input type="checkbox" name="languagePref[]" id="languagePref3" <?php  foreach ($array2 as  $arr2)
	   {  if($arr2=="All"){ ?> checked="checked" <?php } } ?> value="All">
                All<br/></td>
            </tr>
          </table>
        </div>
        
        <!-- Position For -->
        
        <div class="grid_8" >
          <h4 style="margin:20px;">My  My Webinars</h4>
          <div style="height: 180px;Serif;overflow:auto;">
          <table width="400" border="1"  style="margin:20px; border:1px solid #666666; padding:10px;">
            <tr>
              <th scope="col">Title</th>
              <th scope="col">Upcoming Session</th>
              <th scope="col">Status</th>
            </tr>
             <?php
					        $ses_result=mysql_select_db($dbname) or die(mysql_error());
										
							$sqlget="Select *  from student_web_reg where student_id='".$s_uid."' AND starttime>NOW()";		
							//print $sqlget;					
							$ses_result=mysql_query($sqlget);
							$rowcount= mysql_num_rows($ses_result);	
							$i=1;
							if($rowcount!='0')
							{
							while($res=mysql_fetch_array($ses_result))
							{
								
								$subject=$res["subject"];
								$description=$res["description"];
								$webinar_id=$res["webinar_id"];
								$start_time=$res["starttime"];
								$end_time=$res["endtime"];
								$date = date_create($start_time);
								$smp=date_format($date, 'Y-m-d');
								date_default_timezone_set('GMT/UTC-4');
								$dt=date('Y-m-d');
								
								
								if($dt<=$smp)
							{
						?>
            <tr>
              <td><?php print $subject; ?></td>
              <td><?php print $smp; ?></td>
              <td>Q & A open - Participate</td>
            </tr>
           
            <?php
						}
						
							}
							}
							else
							{
								?>
                                <tr>
                                <td colspan="3" align="center"> No Records Found </td>
                                </tr>
                                <?php
							}
							?>
          </table>
          </div>
        </div>
        <div class="grid_8" style="min-height:200px;">
          <div>
            <div style="float:left;">
              <h4 style="margin:20px;">My Work Experience</h4>
            </div>
            <div style="float:right; padding-right:20px; padding-top:10px;">
              <input type="button" value="Edit" onClick="editworkexperience();" name="experience_edit" id="experience_edit" style="width:60px; cursor:pointer">
              <input type="button" value="Update" onClick="updateworkexperience();" style="display:none; width:60px; cursor:pointer" name="experience_update" id="experience_update" >
            </div>
          </div>
          <p align="justify" style=" margin:20px; border:1px solid #666666; padding:10px; height:140px;width:395px;border:1px solid #ccc; Serif;overflow:auto;" id="para_workexperience">
            <?php
		  if($work_experience=="")
		  {
			  ?>
            Enter your previous work experience. 
            <?php
		  }
		  else
		  {
			  print $work_experience;
		  }
		  ?>
          </p>
          <div style="float:left;color:#F00; font-weight:400; padding-top:50px; display:none" id="error3"></div>
          <textarea id="experience"  name="experience" placeholder=" Please Enter Previous and current Work Experience" style="width:400px; height:140px; display:none; margin:20px;" ><?php print $work_experience; ?></textarea>
        </div>
        <div class="grid_8">
          <h4 style="margin:20px;">My Job Applications</h4>
           <div style="height: 180px;Serif;overflow:auto;">
          <table width="420" border="1"  style="margin:20px; border:1px solid #666666; padding:10px;">
            <tr>
              <th scope="col">Company</th>
              <th scope="col">Status</th>
            </tr>
               <?php
					       
							$sqlget3="Select *  from student_jobapplication where stuId=".$s_uid;							
							$ses_result3=mysql_query($sqlget3);
							$rowcount3= mysql_num_rows($ses_result3);	
							$i=1;
							while($res3=mysql_fetch_array($ses_result3))
							{
								
								$JobId=$res3["JobId"];
								$apply_status=$res3["apply_status"];
								
								$sqlget31="Select Company_name  from recruiter_jopposting where id=".$JobId;							
							    $ses_result31=mysql_query($sqlget31);
								$res31=mysql_fetch_array($ses_result31);
								$cmny=$res31['Company_name'];
								
						?>
            <tr>
              <td><?php print $cmny; ?></td>
              <td><?php print $apply_status; ?></td>
            </tr>
           
            <?php
							}
							?>
          </table>
          </div>
        </div>
        <div class="grid_8" style="min-height:200px;">
          <div>
            <div style="float:left;">
              <h4 style="margin:20px;">My Projects</h4>
            </div>
            <div style="float:right; padding-right:20px; padding-top:10px;">
              <input type="button" value="Edit" onClick="editProjects();" name="Projects_edit" id="Projects_edit" style="width:60px; cursor:pointer">
              <input type="button" value="Update" onClick="updateProjects();" style="display:none; width:60px; cursor:pointer" name="Projects_update" id="Projects_update" >
            </div>
          </div>
          <p align="justify" style=" margin:20px; border:1px solid #666666; padding:10px; height:140px;width:395px;border:1px solid #ccc; Serif;overflow:auto;" id="para_Projects">
            <?php
		  if($projects=="")
		  {
			  ?>
            Enter all your relevant projects here. Be it a course mandated project, or a cool little app you built on the side.
            <?php
		  }
		  else
		  {
			  print $projects;
		  }
		  ?>
          </p>
          <div style="float:left;color:#F00; font-weight:400; padding-top:50px; display:none" id="error4"></div>
          <textarea id="Projects"  name="Projects" style="width:400px; height:140px; display:none; margin:20px;" placeholder="Please Enter Your Project details" ><?php print $projects; ?></textarea>
        </div>


			<div style="width:490px; float:right; text-align:center; margin:0px 14px 0px 0px; display:none;color:#F00; font-weight:400;" id="error"></div>
        
    <!-- end grid columns -->
        
        <div class="clear"></div>
      </div>
      <!-- end body-wrapper --> 
    </div>
    <!-- end body-background --> 
    
    <!-- footer -->
    <div id="footer-wrapper"></div>
    <!-- end #footer-wrapper -->
    
    <div class="clear"></div>


<!-- End of profile  ---------------------------------------------------------------------->


        <!-- body -->
        <!-- copyright -->
        <div id="copyright-wrapper">
          <div id="copyright-content">
            <p class="float-left">Copyright © 2013 <a href="">interngration</a> All rights reserved.</p>
            <p class="float-right"></p>
          </div>
        </div>
      </div>
      <!-- end #wrapper (global page wrapper) --> 
    </div>
    <!-- Load Javascript --> 
    <script type="text/javascript" src="js/jquery.easing.1.3.js"></script> 
    <script type="text/javascript" src="js/ddsmoothmenu.js"></script> 
    <script type="text/javascript" src="js/slides.jquery.js"></script> 
    <script type="text/javascript" src="js/jquery.prettyPhoto.js"></script> 
    <script type="text/javascript" src="js/scrolltopcontrol.js"></script> 
    <script type="text/javascript" src="js/jquery.isotope.min.js"></script> 
    <script type="text/javascript" src="js/contact-form-validate.js"></script> 
    <script type="text/javascript" src="js/jquery.coda-slider-2.0.js"></script> 
    <script type="text/javascript" src="js/custom.js"></script> 
    <script type="text/javascript" src="js/twitter.js"></script>
  </body>
</html>

