<?php

/**
 * Pagination Functions
 */

   function pagination($query, $per_page,$page = 1, $url = '?'){
	   
	   $Qry = $_SERVER['QUERY_STRING'];
 
 		
	  	$query_string= $Qry;
        $qry ='';
		if($Qry!="")
		{
				//$qSptdt = explode("&amp;", $Qry);
//				$qCount=count($qSptdt);
//				//print $qCount;
//				if($qCount==2)
//				{
//					$arr1= $qSptdt[0];
//					$arr2= $qSptdt[1];
//					
//					if($arr1!="" and $arr2=="")
//					{
//						$chk = explode("=", $arr1);
//						$pg= $chk[0];
//						//print $pg;
//						if($pg=="page")
//						{
//							//print $query_string;
//							$qry = str_replace("&","",$query_string);
//							//print $qry ;
//						}
//						else
//						{
//							$qry = "&".$query_string;
//						}
//					}
//					else
//					{
//						$qry = "&".$query_string;
//					}
//					
//				}
//				else
//				{
					$qry = "&".$query_string;
				//}
			
		}
		
		
		
		if(isset($_GET["page"]))
		{
			
 		$pgno1 = "page=".$_GET["page"]."&";	
		////print 	$pgno1;
//		
//		$qSptdt = explode("&", $pgno1);
//		$qCount=count($qSptdt);
//		//print $qCount;
//		if($qCount==2)
//		{
//			$arr1= $qSptdt[0];
//			$arr2= $qSptdt[1];
//			
//			if($arr1!="" and $arr2=="")
//			{
//				$chk = explode("=", $arr1);
//				$pg= $chk[0];
//				//print $pg;
//				if($pg=="page")
//				{
//					//print $query_string;
//					$qry = str_replace("&","",$qry);
//					//print $qry ;
//				}
//				else
//				{
//					$qry = "&".$qry;
//				}
//			}
//			else
//			{
//				$qry = "&".$qry;
//			}
//			
//		}
		
				
				
		$qry = str_replace($pgno1,"",$qry);

		$pgno = "page=".$_GET["page"];
		$qry = str_replace($pgno,"",$qry);
		
		}
		
	 
    	$ses_result1 = mysql_query($query);

		$totalRec= mysql_num_rows($ses_result1);
		$total = $totalRec;

        $adjacents = "2"; 

    	$page = ($page == 0 ? 1 : $page);  
    	$start = ($page - 1) * $per_page;								
		
		$firstPage = 1;



		$prev = ($page == 1)?1:$page - 1;	

    	$prev = $page - 1;							
    	$next = $page + 1;
        $lastpage = ceil($total/$per_page);
    	$lpm1 = $lastpage - 1;
    	
    	$pagination = "";
    	if($lastpage > 1)
    	{	
    		$pagination .= "<p class='pagination' style='padding-left:150px; padding-top:20px;'>";
            $pagination .= "&nbsp;<a class='details'>Page $page of $lastpage</a>&nbsp;";
					
			if ($page == 1)
			{
				$pagination.= "&nbsp;<a class='current'>First</a>&nbsp;";
				$pagination.= "&nbsp;<a class='current'>Prev</a>&nbsp;"; 
			}
			else
			{
				$pagination.= "&nbsp;<a href='{$url}page=$firstPage$qry'>First</a>&nbsp;";
				$pagination.= "&nbsp;<a href='{$url}page=$prev$qry'>Prev</a>&nbsp;"; 
			}


    		if ($lastpage < 7 + ($adjacents * 2))
    		{	
    			for ($counter = 1; $counter <= $lastpage; $counter++)
    			{
    				if ($counter == $page)
    					$pagination.= "&nbsp;<a class='current'>$counter</a>&nbsp;";
    				else
    					$pagination.= "&nbsp;<a href='{$url}page=$counter$qry'>$counter</a>&nbsp;";					
    			}
    		}
    		elseif($lastpage > 5 + ($adjacents * 2))
    		{
    			if($page < 1 + ($adjacents * 2))		
    			{
    				for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++)
    				{
    					if ($counter == $page)
    						$pagination.= "&nbsp;<a class='current'>$counter</a>&nbsp;";
    					else
    						$pagination.= "&nbsp;<a href='{$url}page=$counter$qry'>$counter</a>&nbsp;";					
    				}
    				$pagination.= "&nbsp;<a class='dot'>...&nbsp;";
    				$pagination.= "&nbsp;<a href='{$url}page=$lpm1$qry'>$lpm1</a>&nbsp;";
    				$pagination.= "&nbsp;<a href='{$url}page=$lastpage$qry'>$lastpage</a>&nbsp;";		
    			}
    			elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
    			{
    				$pagination.= "&nbsp;<a href='{$url}page=1$qry'>1</a>&nbsp;";
    				$pagination.= "&nbsp;<a href='{$url}page=2$qry'>2</a>&nbsp;";
    				$pagination.= "&nbsp;<a class='dot'>...&nbsp;";
    				for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
    				{
    					if ($counter == $page)
    						$pagination.= "&nbsp;<a class='current'>$counter</a>&nbsp;";
    					else
    						$pagination.= "&nbsp;<a href='{$url}page=$counter$qry'>$counter</a>&nbsp;";					
    				}
    				$pagination.= "&nbsp;<a class='dot'>..&nbsp;";
    				$pagination.= "&nbsp;<a href='{$url}page=$lpm1$qry'>$lpm1</a>&nbsp;";
    				$pagination.= "&nbsp;<a href='{$url}page=$lastpage$qry'>$lastpage</a>&nbsp;";		
    			}
    			else
    			{
    				$pagination.= "&nbsp;<a href='{$url}page=1$qry'>1</a>&nbsp;";
    				$pagination.= "&nbsp;<a href='{$url}page=2$qry'>2</a>&nbsp;";
    				$pagination.= "&nbsp;<a class='dot'>..&nbsp;";
    				for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
    				{
    					if ($counter == $page)
    						$pagination.= "&nbsp;<a class='current'>$counter</a>&nbsp;";
    					else
    						$pagination.= "&nbsp;<a href='{$url}page=$counter$qry'>$counter</a>&nbsp;";					
    				}
    			}
    		}
    		
    		if ($page < $counter - 1){ 
    			$pagination.= "&nbsp;<a href='{$url}page=$next$qry'>Next</a>&nbsp;";
                $pagination.= "&nbsp;<a href='{$url}page=$lastpage$qry'>Last</a>&nbsp;";
    		}else{
    			$pagination.= "&nbsp;<a class='current'>Next</a>&nbsp;";
                $pagination.= "&nbsp;<a class='current'>Last</a>&nbsp;";
            }
    		$pagination.= "</p>\n";		
    	}
    
    
        return $pagination;
    } 
?>