<?php
   include "../config.php";
   $sid=$_GET['sessid'];
   $upTable=$_GET['upTable'];
   
    if($upTable=="temptable")
	{
	   $ses_result=mysql_select_db($dbname) or die(mysql_error());   
	   $sql="select * from student_register_temp where session_id='$sid'";
	   $ses_result=mysql_query($sql);
	   $res=mysql_fetch_array($ses_result);
	   
	   $Coins=$res["Coins"];
	   $abtcoinflg=$res["abtcoinflg"];
	   
	    if($abtcoinflg=='0')
		{
		   $totcoin=$Coins+100;
		   $sqlUpdate ="Update student_register_temp set Coins='$totcoin', abtcoinflg='1' where session_id='$sid'";
	       $result=mysql_query($sqlUpdate);
		   print $totcoin;
		}
		else
		{
		     print $Coins;
		}
	}
	
	
	if($upTable=="maintable")
	{
	   $ses_result=mysql_select_db($dbname) or die(mysql_error());   
	   $sql="select * from student_register where session_id='$sid'";
	   $ses_result=mysql_query($sql);
	   $res=mysql_fetch_array($ses_result);
	   
	   $Coins=$res["Coins"];
	   $abtcoinflg=$res["abtcoinflg"];
	   
	    if($abtcoinflg=='0')
		{
		   $totcoin=$Coins+100;
		   $sqlUpdate ="Update student_register set Coins='$totcoin', abtcoinflg='1' where session_id='$sid'";
	       $result=mysql_query($sqlUpdate);
		   print $totcoin;
		}
		else
		{
		     print $Coins;
		}
	}
	   
	  
   ?>