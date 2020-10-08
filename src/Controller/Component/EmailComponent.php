<?php
namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\Mailer\Email;

class EmailComponent extends Component {
 
	public function sendEmail($to, $subject, $emailbody) {
		// pr($to);
		// 	pr($subject);
		// 		pr($emailbody);
		

		try {
			$email = new Email();
			$email->setProfile('mailgun')
				->setFrom(['noreply@intheloopsingles.com' => 'IntheloopSingles'])
				->setTo($to)
				->setEmailFormat('both')
				->setSubject($subject)
				->send($emailbody);
			return true;
		} catch (\Exception $e) {
			echo 'Exception : ', $e->getMessage(), "\n";

		}

	}
}
?>