<?php
session_start();

if(isset($_SESSION["uid"]))
{
	$username=$_SESSION["uname"];
	$mail_id=$_SESSION["mail_id"];
//header("location:inner.php");
}
else
{
header("location:student-login.php");
}
?>
<!DOCTYPE HTML>
<html lang="en" class="no_js">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Student Trash</title>
<!-- Favicon -->
<link rel="shortcut icon" href="favicon.ico" />

<!-- Load Google Fonts -->
<link href='http://fonts.googleapis.com/css?family=Inder' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Ubuntu+Condensed' rel='stylesheet' type='text/css'>

<!-- Load Style Sheets -->
<link rel="stylesheet" type="text/css" href="css/style.css" media="screen" />
<link id="theme" rel="stylesheet" type="text/css" href="css/red.css" media="screen"/>

<!--[if IE 8]><link rel="stylesheet" href="css/ie.css" type="text/css" media="screen"/><![endif]-->
<!--[if IE 7]><link rel="stylesheet" href="css/ie.css" type="text/css" media="screen"/><![endif]-->

<!-- Load Jquery/Modernizr Javascript -->
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script type="text/javascript" src="js/modernizr.js"></script>
<script src="http://cdn.jquerytools.org/1.2.7/full/jquery.tools.min.js"></script>
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
                <li><a href="">Welcome&nbsp; :&nbsp; <?php print $username; ?></a></li>
               <li><a href="student-homepage.php">Home</a></li></ul>
                <br style="clear: left" />
        </div>
        <!-- end header nav menu-->
 </div> </div> </div>
    <!-- end header -->     
    <div id="body-background"><!-- this is the main background color of the page -->
    <div id="header-buffer"></div><!-- hack for header overlap **DONT'TOUCH** -->
    
   
        
        <!-- page header -->
        <div id="pageheader-background"><!-- area with alternate background -->
            <div class="pageheader-title">
             <span class="mailno"><?php include "StudentUnreadMail.php"; ?></span>
                <h1>Interngration</h1><span style="margin:0px 30px 0px 0px; float:right;">
                <a href="studentJobApplication.php" class="button red">JobApplication</a> 
                <a href="studentInbox.php" class="button red">Inbox</a>
                 <a href="student-profile.php" class="button red">Profile</a> 
                <a href="studentAccount.php" class="button red">Account</a>
                <a href="logout.php" class="button red">Logout</a></span>
            </div>        
        </div>     
                          
     <!-- body -->
    <div id="body-wrapper" class="container_16">
    <div class="clear"></div>


        <!-- side bar -->
        <?php include "mailsidebar.php"; ?><!-- end side bar -->    


		<!-- posts -->
		<div class="section">
       		<div class="grid_21">           

            
           		<!-- title -->
                <div class="title">
                	     
                </div>                
       <form action="studentTrashChkVal.php" method="post" id="frm" name="frm">
 
					   	<!-- tabs -->
		<div class="section">
			
       		<!-- title -->
                            

            <!-- tab 1 -->
             <div class="grid_22">
                
                <div class="" style="float:left; margin:0px 0px 20px 0px; width:700px;">
               
                <input type="submit" id="btndelete" name="btndelete" value="Remove from Trash" class="button white" />
               
                </div><!-- end .tabs-wrapper -->
    		</div><!-- end grid_8--> 
             
        

        <!-- end tabs -->  
		
		
		
		
		
					   <!-- post 4 -->
                          <?php
	    include "config.php"; 	
		$ses_result=mysql_select_db($dbname) or die(mysql_error());
		$sqlget="Select *  from student_mailbox where (to_mail='".$mail_id."' OR from_mail='".$mail_id."') AND (flg_delete='1' OR flg_snd_del='".$mail_id."') AND (flg_frm_fulldel<>'".$mail_id."' AND flg_to_fulldel<>'".$mail_id."') order by SendDate desc";
		$ses_result=mysql_query($sqlget);
		$ses_result1=mysql_query($sqlget);
		$rowcount= mysql_num_rows($ses_result);	
		//$res=mysql_fetch_array($ses_result1);
		//$fm_mail=$res["from_mail"];
		
		
		
       		function limit_words($string, $word_limit)
                {
                  $words = explode(" ",$string);
                  return implode(" ",array_splice($words,0,$word_limit));
                 }
				 
				
		
		
	
		 $i="0";
		 if($rowcount=="0")
		 {
	     ?>
			 <div class="post-out-message">    
			   <div class="header-message">
               <div align="center" >Trash Empty</div>
               </div>
               </div>
          <?php
			 
		 }
		 else
		 {
			 $j=$startpoint+1;
		while($res=mysql_fetch_array($ses_result))
		{	
		
		 $i++;
    		$eid=$res["id"];		
			$to_mail=$res["to_mail"];
			$fm_mail=$res["from_mail"];
			$subject=$res["subject"];
			$flg_read=$res["flg_read"];
			$message=limit_words($res["message"],4); 
			$SendDate=$res["SendDate"];			
			$dtmonth = date('M',strtotime($SendDate));
			$dtdate = date('d',strtotime($SendDate));
			
			
			 $flg_snd_del=$res["flg_snd_del"];
			
			if(isset($flg_snd_del))
			{
				$chkml=$to_mail;
			}
			else
			{
			    $chkml=$fm_mail;
			}
				
				 
				 $sql2="Select *  from student_register where Email='".$chkml."'";
		$ses_ses=mysql_query($sql2);
		$rowcount1= mysql_num_rows($ses_ses);
		if($rowcount1>0)
		{
			$res1=mysql_fetch_array($ses_ses);
			$FirstName=ucfirst(strtolower($res1['FirstName']));
    		$LastName=ucfirst(strtolower($res1['LastName']));
			$sendername=$FirstName." ".$LastName;
		}
		
		$sql3="Select *  from recruiter_register where Email='".$chkml."'";
		$ses_ses1=mysql_query($sql3);
		$rowcount2= mysql_num_rows($ses_ses1);
		if($rowcount2>0)
		{
			$res2=mysql_fetch_array($ses_ses1);
			$FirstName=ucfirst(strtolower($res2['FirstName']));
    		$LastName=ucfirst(strtolower($res2['LastName']));
			$sendername=$FirstName." ".$LastName;
		}
		
		
			?>
            
			
                
                            
                            
                            <div class="post-out-message">     
					  <div class="header-message" >
                     
                                <div class="date"  ><?php print $SendDate; ?></div>
       <input name="chkbx<?php print $i; ?>" id="chkbx[]" type="checkbox" value="<?php print $eid; ?>" style="float:left; margin:10px 10px 50px 10px;">  <h5><a href="studentTrashView.php?eid=<?php print $eid; ?>"><?php print $sendername; ?> - <?php print $subject; ?></a> </h5>
                                <p class="post-subtitle"><?php print $message; ?> ...</p> 
							</div></div>
                 
				<!-- <div class="post-out-message">     
					    <div class="header-message" >
                     
                                <div class="date" style="color:#000"><?php print $dtmonth." ". $dtdate; ?></div>
       <input  name="chkbx[]" id="chkbx<?php print $i; ?>" type="checkbox" value="<?php print $eid; ?>" style="float:left; margin:10px 10px 50px 10px;"><h4><a href="studentInboxView.php?eid=<?php print $eid; ?>"><?php print $subject; ?> </h4>
                                <p class="post-subtitle"><?php print $message; ?> ...</p> </a>
							</div></div>-->
		<?php		
				
			
							}
							 

		
		 }
							?>
							
							 <!--<div class="post-out-message">     
					    <div class="header-message">
                                <div class="date">May 8</div>
       <input name="" type="checkbox" value="" style="float:left; margin:10px 10px 50px 10px;"><h4><a href="student-inbox-view.html">Webniar Solutions</a></h4>
                                <p class="post-subtitle">Webniar Solutions has sent the message to you.</p> 
							</div></div>-->
							
							 <input type="hidden" name="chk" id="chk" value="<?php print $i; ?>" />
				
					</div>
                  
					   
				
					
				</form>	 
					   
					    
			
              

        </div><!-- end grid_12 --> 
        </div><!-- end recent posts --> 

      
    <div class="clear"></div>            


    </div><!-- end body-wrapper -->
    </div><!-- end body-background -->

     <!-- footer -->
    <div id="footer-wrapper"></div><!-- end #footer-wrapper -->

<div class="clear"></div>

    <!-- copyright -->
    <div id="copyright-wrapper">
        <div id="copyright-content">
            <p class="float-left">Copyright © 2013 <a href="">interngration</a> All rights reserved.</p> 
            <p class="float-right"></p>      
        </div>
    </div>

</div><!-- end #wrapper (global page wrapper) -->
</div>
<!-- Load Javascript -->
<script type="text/javascript" src="js/jquery.easing.1.3.js"></script>
<script type="text/javascript" src="js/ddsmoothmenu.js"></script>
<script type="text/javascript" src="js/slides.jquery.js"></script>
<script type="text/javascript" src="js/jquery.prettyPhoto.js"></script>
<script type="text/javascript" src="js/scrolltopcontrol.js"></script>
<script type="text/javascript" src="js/jquery.isotope.min.js"></script> 
<script type="text/javascript" src="js/jquery.coda-slider-2.0.js"></script> 
<script type="text/javascript" src="js/custom.js"></script>
</body>
</html>