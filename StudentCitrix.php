<?php
        include "config.php"; 
        $organizerKey="384723869081067013";
		$accessToken="4f8530d951f7963ce4180253c531c3f6";
			
		$return_array = array();
		$citrix=new citrix();
		
		
		$reponse = json_decode($citrix->make_request("https://api.citrixonline.com/G2W/rest/organizers/".$organizerKey."/upcomingWebinars?oauth_token=".$accessToken), true);
		
		if(isset($reponse['int_err_code']) and $reponse['int_err_code'] != '')
		{
			$this->set_access_token('');
			$this->set_organizer_key('');				
			throw new Exception($reponse['int_err_code']);
		}
		
		$return_array['upcoming']['webinars'] = $reponse;
        $return_array['upcoming']['status'] = true;
		
		if($type>0)
		{
			$reponse = json_decode($this->make_request("https://api.citrixonline.com/G2W/rest/organizers/".$this->organizer_key."/historicalWebinars?oauth_token=".$this->access_token), true);
						
			if(isset($reponse['int_err_code']) and $reponse['int_err_code'] != '')
			{
				$this->set_access_token('');
				$this->set_organizer_key('');				
				throw new Exception($reponse['int_err_code']);
			}
			
			$return_array['historical']['webinars'] = $reponse;
			$return_array['historical']['status'] = true;
		}
			
      
					    $weblist=$return_array;;
						//print_r($weblist);
						//print $weblist;
						//print "hi";
						$cnt=count($weblist);
						//print $cnt;
						for($i=0;$i<=$cnt;$i++)
						{
						$desc=$weblist["upcoming"]["webinars"][$i]["description"];
						$subj=$weblist["upcoming"]["webinars"][$i]["subject"];
						$regurl=$weblist["upcoming"]["webinars"][$i]["registrationUrl"];
						$webkey=$weblist["upcoming"]["webinars"][$i]["webinarKey"];
						$starttime=$weblist["upcoming"]["webinars"][$i]["times"]["0"]["startTime"];
						$endtime=$weblist["upcoming"]["webinars"][$i]["times"]["0"]["endTime"];
						//print $organizer_key;
						if(isset($subj)!=0)
						{

						
							$ses_result=mysql_select_db($dbname) or die(mysql_error());
										
							$sqlget="Select *  from upcoming_webinar where webinar_key='$webkey'";
							
							$ses_result=mysql_query($sqlget);
							$rowcount= mysql_num_rows($ses_result);	
							
							if($rowcount=='0')
							{
								$sqlInsert = "insert into upcoming_webinar (subject,description,webinar_url,webinar_key,start_time,end_time) values ('$subj','$desc','$regurl','$webkey','$starttime','$endtime')";
								$result=mysql_db_query($dbname,$sqlInsert,$link);
								
							}
						
						
						}
						}
class citrix
{						
public function make_request($url, $params = array()) 
	{
		$ch = curl_init();
		
		$opts = self::$CURL_OPTS;
		
		$opts[CURLOPT_URL] = $url;	
		
		if(!empty($params))
		{
			foreach($params as $key=>$value):
				$opts[$key] = $value;
			endforeach;
		}

		curl_setopt_array($ch, $opts);
		$result = curl_exec($ch);
		
		if ($result === false) 
		{
		  curl_close($ch);
		  throw new Exception(curl_error($ch));
		}
		curl_close($ch);
		return $result;
	}
}
						
	