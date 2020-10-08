<?php
namespace App\Controller\Admin;

use App\Controller\Admin\AppController;
use Cake\Event\Event;
use Cake\Mailer\Email;
use Cake\Core\Configure;

/**
 * EmailTemplates Controller
 *
 * @property \App\Model\Table\EmailTemplatesTable $EmailTemplates
 *
 * @method \App\Model\Entity\EmailTemplate[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class EmailTemplatesController extends AppController {

	public function initialize() {
		parent::initialize();
		$this->loadComponent('Email');
	}

	public function beforeFilter(Event $event) {
		parent::beforeFilter($event);
	
	}
	
	/**
	 * Index method
	 *
	 * @return \Cake\Http\Response|null
	 */
	public function index() {
		$pageTitle = 'Email Templates';
		$emailTemplates = $this->paginate($this->EmailTemplates->find()->where(['id NOT IN' => [12, 13, 15, 17]]));
		$this->set(compact('pageTitle', 'emailTemplates'));
	}

	/**
	 * mass Email method
	 *
	 * @param $id
	 * @return \Cake\Http\Response|null Redirects on successful list, renders view otherwise.
	 * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
	 */
	public function massEmail() {
		$pageTitle = 'Mass Email Templates List';
		$emailTemplates = $this->paginate($this->EmailTemplates->find()->where(['id IN' => [12, 13, 15, 17]]));
		$this->set(compact('pageTitle', 'emailTemplates'));
	}

	/**
	 * Mass Email Edit method
	 *
	 * @param $id
	 * @return \Cake\Http\Response|null Redirects on successful mass email edit, renders view otherwise.
	 * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
	 */
	public function massEmailEdit($id = null) {
		$pageTitle = 'Edit Email Template';
		$emailid = base64_decode($id);
		$emailTemplate = $this->EmailTemplates->get($emailid, [
			'contain' => [],
		]);
		if ($this->request->is(['patch', 'post', 'put'])) {
			$emailTemplate = $this->EmailTemplates->patchEntity($emailTemplate, $this->request->getData());
			if ($this->EmailTemplates->save($emailTemplate)) {
				$this->Flash->success(__('The email template has been saved.'));

				return $this->redirect(['action' => 'mass-email']);
			}
			$this->Flash->error(__('The email template could not be saved. Please, try again.'));
		}
		$this->set(compact('pageTitle', 'emailTemplate'));
	}

	/**
	 * Send test Email method
	 *
	 * @param $id
	 * @return \Cake\Http\Response|null Redirects on successful send test email, renders view otherwise.
	 * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
	 */
	public function sendTestEmail($id = null) {
		$pageTitle = 'Mass Email';
		$emailTemplate = $this->EmailTemplates->get($id);
		
		if ($this->request->is(['patch', 'post', 'put'])) {

			$data = $this->request->getData();
			
			$logo = "<img src=".Configure::read('site_url')."/img/logo.png>";
			$subject = $emailTemplate->subject;
			$to = $data['to'];
			// send email
			
			$emailtemplate = str_replace(array('{LOGO}', '{MEMBER_NAME}', '{MEMBER_EMAIL}', '{MEMBER_PASSWORD}'), array($logo, 'Test Name', 'Test Email', 'Test Password'), $emailTemplate->template_body);

			$send_email = $this->Email->sendEmail($to, $subject, $emailtemplate);
			$this->Flash->success(__('Test Email Sent Successfully'));
			return $this->redirect(['controller' => 'EmailTemplates', 'action' => 'bulk_message', $id]);

		}
		$this->set(compact('pageTitle', 'emailTemplate'));
	}

	/**
	 * Bulk Message method
	 *
	 * @param $id
	 * @return \Cake\Http\Response|null Redirects on successful send bulk sms, renders view otherwise.
	 * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
	 */
	public function bulkMessage($id = null) {
		$pageTitle = 'Mass Email';
		$this->loadModel('Leads');
		$this->loadModel('Users');
		$this->loadModel('EmailTemplates');
		$emailid = base64_decode($id);
		$emailTemplate = $this->EmailTemplates->get($emailid);

		if ($this->request->is(['patch', 'post', 'put'])) {

			$logo = "<img src=".Configure::read('site_url')."/img/logo.png>";
			$subject = $emailTemplate->subject;

			$data = $this->request->getData();
		

			if ($data['filter_type'] == 1) // Seattle All leads
			{
				$leads = $this->Leads->find()->where(['Leads.location_id' => 1])->toArray();
			} else if ($data['filter_type'] == 2) // Seattle All leads with No Show
			{
				$leads = $this->Leads->find()->where(['Leads.location_id' => 1, 'Leads.lead_status_id' => 9])->toArray();
				
			} else if ($data['filter_type'] == 3) // Seattle All leads with No Sale
			{
				$leads = $this->Leads->find()->where(['Leads.location_id' => 1, 'Leads.lead_status_id' => 11])->toArray();
			} else if ($data['filter_type'] == 4) // Seattle All leads with cancelled appointments
			{
				$leads = $this->Leads->find()->where(['Leads.location_id' => 1, 'Leads.lead_status_id' => 10])->toArray();
			} else if ($data['filter_type'] == 5) // Seattle  female members of specific age group
			{
				$age = explode(",", $data['femaleage']);
				 
				$memberrecords = $this->Users->find()->contain(['UserProfiles'])->where(['Users.role_id' => 3, 'Users.location_id' => 1, 'UserProfiles.sex' => 2])->toArray();
				$members = array(); 
					foreach($memberrecords as $memberrecord){
						$dob = $memberrecord->user_profile->dob;
						$today = date("Y-m-d");					
						$diff = date_diff(date_create($dob), date_create($today));
						$memberage = $diff->format('%y');					
						if(($memberage >= $age[0]) && ($memberage <= $age[1])){
							$members[] = $memberrecord; 
						}
					}
				
			 
			} else if ($data['filter_type'] == 6) // Seattle male members of specific age group
			{
				$age = explode(",", $data['maleage']);
				
				$memberrecords = $this->Users->find()->contain(['UserProfiles'])->where(['Users.role_id' => 3, 'Users.location_id' => 1, 'UserProfiles.sex' => 1])->toArray();
				$members = array(); 
					foreach($memberrecords as $memberrecord){
						$dob = $memberrecord->user_profile->dob;
						$today = date("Y-m-d");					
						$diff = date_diff(date_create($dob), date_create($today));
						$memberage = $diff->format('%y');					
						if(($memberage >= $age[0]) && ($memberage <= $age[1])){
							$members[] = $memberrecord; 
						}
					}
				
			} else if ($data['filter_type'] == 7) // Seattle All Active members
			{
				$members = $this->Users->find()->contain(['UserProfiles'])->where(['Users.role_id' => 3, 'Users.location_id' => 1, 'Users.status' => 1])->toArray();
			} else if ($data['filter_type'] == 8) // Seattle Non Active members
			{
				$members = $this->Users->find()->contain(['UserProfiles'])->where(['Users.role_id' => 3, 'Users.location_id' => 1, 'Users.status' => 0])->toArray();
			} else if ($data['filter_type'] == 9) // seattle specific age group
			{
				$age = explode(",", $data['age']);

				$memberrecords = $this->Users->find()->contain(['UserProfiles'])->where(['Users.role_id' => 3, 'Users.location_id' => 1])->toArray();
				$members = array(); 
					foreach($memberrecords as $memberrecord){
						$dob = $memberrecord->user_profile->dob;
						$today = date("Y-m-d");					
						$diff = date_diff(date_create($dob), date_create($today));
						$memberage = $diff->format('%y');					
						if(($memberage >= $age[0]) && ($memberage <= $age[1])){
							$members[] = $memberrecord; 
						}
					}

			} else if ($data['filter_type'] == 10) // Denver All leads
			{
				$leads = $this->Leads->find()->where(['Leads.location_id' => 2])->toArray();
			} else if ($data['filter_type'] == 11) // Denver All leads with No Show
			{
				$leads = $this->Leads->find()->where(['Leads.location_id' => 2, 'Leads.lead_status_id' => 9])->toArray();
			} else if ($data['filter_type'] == 12) // Denver All leads with No Sale
			{
				$leads = $this->Leads->find()->where(['Leads.location_id' => 2, 'Leads.lead_status_id' => 11])->toArray();
			} else if ($data['filter_type'] == 13) // Denver All leads with cancelled appointments
			{
				$leads = $this->Leads->find()->where(['Leads.location_id' => 2, 'Leads.lead_status_id' => 10])->toArray();
			} else if ($data['filter_type'] == 14) // Denver female members of specific age group
			{
				$age = explode(",", $data['femaleage']);
				
				$memberrecords = $this->Users->find()->contain(['UserProfiles'])->where(['Users.role_id' => 3, 'Users.location_id' => 2, 'UserProfiles.sex' => 2])->toArray();
				$members = array(); 
					foreach($memberrecords as $memberrecord){
						$dob = $memberrecord->user_profile->dob;
						$today = date("Y-m-d");					
						$diff = date_diff(date_create($dob), date_create($today));
						$memberage = $diff->format('%y');					
						if(($memberage >= $age[0]) && ($memberage <= $age[1])){
							$members[] = $memberrecord; 
						}
					}
				
			} else if ($data['filter_type'] == 15) // Denver male members of specific age group
			{
				$age = explode(",", $data['maleage']);
				
				$memberrecords = $this->Users->find()->contain(['UserProfiles'])->where(['Users.role_id' => 3, 'Users.location_id' => 2, 'UserProfiles.sex' => 1])->toArray();
				$members = array(); 
					foreach($memberrecords as $memberrecord){
						$dob = $memberrecord->user_profile->dob;
						$today = date("Y-m-d");					
						$diff = date_diff(date_create($dob), date_create($today));
						$memberage = $diff->format('%y');					
						if(($memberage >= $age[0]) && ($memberage <= $age[1])){
							$members[] = $memberrecord; 
						}
					}
				
			} else if ($data['filter_type'] == 16) // Denver All Active members
			{
				$members = $this->Users->find()->contain(['UserProfiles'])->where(['Users.role_id' => 3, 'Users.location_id' => 2, 'Users.status' => 1])->toArray();
			} else if ($data['filter_type'] == 17) // Denver All Non Active members
			{
				$members = $this->Users->find()->contain(['UserProfiles'])->where(['Users.role_id' => 3, 'Users.location_id' => 2, 'Users.status' => 0])->toArray();
			} else if ($data['filter_type'] == 18) // denver specific age group
			{
				$age = explode(",", $data['age']);

				$memberrecords = $this->Users->find()->contain(['UserProfiles'])->where(['Users.role_id' => 3, 'Users.location_id' => 2])->toArray();
				$members = array(); 
					foreach($memberrecords as $memberrecord){
						$dob = $memberrecord->user_profile->dob;
						$today = date("Y-m-d");					
						$diff = date_diff(date_create($dob), date_create($today));
						$memberage = $diff->format('%y');					
						if(($memberage >= $age[0]) && ($memberage <= $age[1])){
							$members[] = $memberrecord; 
						}
					}

			} else if ($data['filter_type'] == 19) // Austin All leads
			{
				$leads = $this->Leads->find()->where(['Leads.location_id' => 3])->toArray();

			} else if ($data['filter_type'] == 20) // Austin All leads with No Show
			{
				$leads = $this->Leads->find()->where(['Leads.location_id' => 3, 'Leads.lead_status_id' => 9])->toArray();
			} else if ($data['filter_type'] == 21) // Austin All leads with No Sale
			{
				$leads = $this->Leads->find()->where(['Leads.location_id' => 3, 'Leads.lead_status_id' => 11])->toArray();
			} else if ($data['filter_type'] == 22) // Austin All leads with cancelled appointments
			{
				$leads = $this->Leads->find()->where(['Leads.location_id' => 3, 'Leads.lead_status_id' => 10])->toArray();
			} else if ($data['filter_type'] == 23) // Austin female members of specific age group
			{
				$age = explode(",", $data['femaleage']);
				
				$memberrecords = $this->Users->find()->contain(['UserProfiles'])->where(['Users.role_id' => 3, 'Users.location_id' => 3, 'UserProfiles.sex' => 2])->toArray();
				$members = array(); 
					foreach($memberrecords as $memberrecord){
						$dob = $memberrecord->user_profile->dob;
						$today = date("Y-m-d");					
						$diff = date_diff(date_create($dob), date_create($today));
						$memberage = $diff->format('%y');					
						if(($memberage >= $age[0]) && ($memberage <= $age[1])){
							$members[] = $memberrecord; 
						}
					}
				
			} else if ($data['filter_type'] == 24) // Austin male members of specific age group
			{
				$age = explode(",", $data['maleage']);
				
				$memberrecords = $this->Users->find()->contain(['UserProfiles'])->where(['Users.role_id' => 3, 'Users.location_id' => 3, 'UserProfiles.sex' => 1])->toArray();
				$members = array(); 
					foreach($memberrecords as $memberrecord){
						$dob = $memberrecord->user_profile->dob;
						$today = date("Y-m-d");					
						$diff = date_diff(date_create($dob), date_create($today));
						$memberage = $diff->format('%y');					
						if(($memberage >= $age[0]) && ($memberage <= $age[1])){
							$members[] = $memberrecord; 
						}
					}
				
			} else if ($data['filter_type'] == 25) // Austin All Active members
			{
				$members = $this->Users->find()->contain(['UserProfiles'])->where(['Users.role_id' => 3, 'Users.location_id' => 3, 'Users.status' => 1])->toArray();
			} else if ($data['filter_type'] == 26) // Austin All Non Active members
			{
				$members = $this->Users->find()->contain(['UserProfiles'])->where(['Users.role_id' => 3, 'Users.location_id' => 3, 'Users.status' => 0])->toArray();
			} else if ($data['filter_type'] == 27) // austin specific age group
			{
				$age = explode(",", $data['age']);

				$memberrecords = $this->Users->find()->contain(['UserProfiles'])->where(['Users.role_id' => 3, 'Users.location_id' => 3])->toArray();
				$members = array(); 
					foreach($memberrecords as $memberrecord){
						$dob = $memberrecord->user_profile->dob;
						$today = date("Y-m-d");					
						$diff = date_diff(date_create($dob), date_create($today));
						$memberage = $diff->format('%y');					
						if(($memberage >= $age[0]) && ($memberage <= $age[1])){
							$members[] = $memberrecord; 
						}
					}
			}

			if (isset($members)) {

				foreach ($members as $member) {

					$member_name = $member->user_profile->first_name . ' ' . $member->user_profile->last_name;
					$member_email = $member->email;

					$to = $member->email;
					
					$emailtemplate = str_replace(array('{LOGO}', '{MEMBER_NAME}', '{MEMBER_EMAIL}'), array($logo, $member_name, $member_email), $emailTemplate->template_body);

					$send_email = $this->Email->sendEmail($to, $subject, $emailtemplate);
 
				}

			} else {

				foreach ($leads as $lead) {

					$member_name = $lead->lead_name;
					$member_email = $lead->lead_email;

					$to = $lead->lead_email;

					$emailtemplate = str_replace(array('{LOGO}', '{MEMBER_NAME}', '{MEMBER_EMAIL}'), array($logo, $member_name, $member_email), $emailTemplate->template_body);

					$send_email = $this->Email->sendEmail($to, $subject, $emailtemplate);
 
				}

			}
			$this->Flash->success(__('The mass emails has been Sent.'));
			return $this->redirect(['action' => 'mass-email']);
		}

		$this->set(compact('pageTitle', 'emailTemplate'));
	}
	/**
	 * Add method
	 *
	 * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
	 */
	public function add() {
		$pageTitle = 'Add Email Template';
		$emailTemplate = $this->EmailTemplates->newEntity();
		if ($this->request->is('post')) {
			$emailTemplate = $this->EmailTemplates->patchEntity($emailTemplate, $this->request->getData());

			if ($this->EmailTemplates->save($emailTemplate)) {
				$this->Flash->success(__('The email template has been saved.'));

				return $this->redirect(['action' => 'index']);
			}
			$this->Flash->error(__('The email template could not be saved. Please, try again.'));
		}
		$this->set(compact('pageTitle', 'emailTemplate'));
	}

	/**
	 * Edit method
	 *
	 * @param string|null $id Email Template id.
	 * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
	 * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
	 */
	public function edit($id = null) {
		$pageTitle = 'Edit Email Template';
		$emailid = base64_decode($id);
		$emailTemplate = $this->EmailTemplates->get($emailid, [
			'contain' => [],
		]);
		if ($this->request->is(['patch', 'post', 'put'])) {
			$emailTemplate = $this->EmailTemplates->patchEntity($emailTemplate, $this->request->getData());
			if ($this->EmailTemplates->save($emailTemplate)) {
				$this->Flash->success(__('The email template has been saved.'));

				return $this->redirect(['action' => 'index']);
			}
			$this->Flash->error(__('The email template could not be saved. Please, try again.'));
		}
		$this->set(compact('pageTitle', 'emailTemplate'));
	}

	/**
	 * Delete method
	 *
	 * @param string|null $id Email Template id.
	 * @return \Cake\Http\Response|null Redirects to index.
	 * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
	 */
	public function delete($id = null) {
		$this->request->allowMethod(['post', 'delete']);
		$emailTemplate = $this->EmailTemplates->get($id);
		if ($this->EmailTemplates->delete($emailTemplate)) {
			$this->Flash->success(__('The email template has been deleted.'));
		} else {
			$this->Flash->error(__('The email template could not be deleted. Please, try again.'));
		}

		return $this->redirect(['action' => 'index']);
	}

}
