<?php 
namespace App\Controller\Component;
use Cake\Controller\Component;
use Twilio\Rest\Client;
use Cake\Core\Configure;

class SmsComponent extends Component
{
	public function sendSms($number,$smsbody)
	{
		// pr($number);
		// pr($smsbody);
		
		$sid = Configure :: read ('twilio_sid');
		$token = Configure :: read ('twilio_token');
		$msgServiceID = Configure :: read ('twilio_message_sid');
		
		try{
		$client = new Client($sid, $token);
		$mess = $client->messages->create(			
			$number,
			[			
				'messagingServiceSid' => $msgServiceID,		
				'body' => $smsbody,
			]
		);	
		} 
		catch (\Exception $e) 
		{
				echo 'Exception : ', $e->getMessage(), "\n";			
		}	
    }
	
}
?>