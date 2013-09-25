<?php
//require_once 'HTTP/Client.php'; 

class CreateMeetingTest {

	private $MeetingService_endpoint;
	private $MeetingService_restclient;
	public  $createMeeting_title;
	public  $createMeeting_hostName;
	public  $createMeeting_fromEmail;
	public  $createMeeting_startDateIso8601;
	public  $createMeeting_durationInSeconds;
	public  $createMeeting_timeZone;
	public  $createMeeting_registration;
	public  $createMeeting_type;
	//public  $createMeeting_audioSection;//not necessary
	public  $createMeeting_displayAudioOnDemand;
	public  $createMeeting_displayAudioLabelOppAssist;//opp assist settings 
	public  $createMeeting_displayAudioValueOppAssist;
	public  $createMeeting_oppAssistDialInLabel;
	public  $createMeeting_oppAssistDialInValue;
	public  $createMeeting_broadcastAudioCode;
	public  $createMeeting_broadcastAudioDisplayDialIn;
	public  $username;
	public  $password;

   function __construct() {
	$this->MeetingService_endpoint = "https://apidev-cc.readytalk.com/api/1.3/svc/rs/meetings";
   }


   function create_meeting() {
                echo "Creating REST object!\n";
                $this->MeetingService_restclient = new HTTP_Request();
		$this->MeetingService_restclient->HTTP_Request($this->MeetingService_endpoint,array('user'=>$this->username,'pass'=>$this->password,'method'=>'POST'));
		
		
		$this->MeetingService_restclient->addQueryString('title',$this->createMeeting_title);
		$this->MeetingService_restclient->addQueryString('hostName',$this->createMeeting_hostName);
		$this->MeetingService_restclient->addQueryString('fromEmail',$this->createMeeting_fromEmail);//this would be the hosts's email address
		$this->MeetingService_restclient->addQueryString('startDateIso8601',$this->createMeeting_startDateIso8601);//meeting date and time
		$this->MeetingService_restclient->addQueryString('durationInSeconds',$this->createMeeting_durationInSeconds);
		$this->MeetingService_restclient->addQueryString('timeZone',$this->createMeeting_timeZone);
		$this->MeetingService_restclient->addQueryString('registration',$this->createMeeting_registration);//set the registration type for the meeting pre-reg vs at time
		$this->MeetingService_restclient->addQueryString('type',$this->createMeeting_type);// web and audio, web only, audio only
		//$this->MeetingService_restclient->addQueryString('audioSection',$this->createMeeting_audioSection);//audio section is not necessary just pass the audio.<type> with display and values
		$this->MeetingService_restclient->addQueryString('audio.onDemand',$this->createMeeting_displayAudioOnDemand);
		
		$this->MeetingService_restclient->sendRequest();
	    
		$rest_response = $this->MeetingService_restclient->getResponseBody();
		echo "XML response string:\n====================\n" . $rest_response."\n\n";
		
		$response = simplexml_load_string($rest_response);
		print_r($response);
			
				    


	
        }//end list_meeting method
   } //end ListMeetingTest class


$obj = new CreateMeetingTest();
$obj->createMeeting_title='Create Meeting';
$obj->createMeeting_hostName='Julie Mendelson';
$obj->createMeeting_fromEmail='julie.mendelson@readytalk.com';
$obj->createMeeting_startDateIso8601='2014-12-01T06:00:00.000-06:00';
$obj->createMeeting_durationInSeconds='3600';
$obj->createMeeting_timeZone='America/Denver';
$obj->createMeeting_registration='PRE_REG_AUTOMATIC_CONFIRMATION_WITH_NOTIFICATION';
$obj->createMeeting_type='WEB_AND_AUDIO';
$obj->createMeeting_displayAudioOnDemand='DISPLAY_TOLLFREE_DISPLAY_TOLL';
//$obj->createMeeting_audioSection='On-Demand';
$obj->username='8667401260:7252639 ';
$obj->password='9574  ';
$obj->create_meeting();

?>