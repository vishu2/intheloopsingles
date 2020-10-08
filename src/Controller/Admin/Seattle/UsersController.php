<?php
namespace App\Controller\Admin\Seattle;

use App\Controller\Admin\AppController;  
use Cake\Event\Event;  
use Cake\Mailer\Email;
use Stripe\Stripe;
use Cake\Core\Configure;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 *
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController {
	
	public function initialize() {
		parent::initialize();
		$this->loadComponent('Sms');
	}

	public function beforeFilter(Event $event) {
		parent::beforeFilter($event);
		$this->Auth->allow(['login']);
	}

	/**
	 * Dashboard method
	 *
	 * @param $id
	 * @return \Cake\Http\Response|null Redirects on successful dashboard, renders view otherwise.
	 * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
	 */
	public function dashboard() {
	$this->loadModel('Appointments');
		$this->loadModel('Leads');
		$this->loadModel('LeadStatus');
		$this->loadModel('Events');
		$pageTitle = 'Dashboard';
		$this->paginate = [
            'contain' => ['Leads', 'Users'],
        ];
		$lead=$this->Leads->find('list', ['keyField' => 'id', 'valueField' => 'id'])->where(['location_id' => 1])->toArray();
		$appointments = $this->paginate($this->Appointments->find()->contain(['Leads' => ['LeadStatus'],'AppointmentStatus'])->where(['lead_id IN ' => $lead]));
		$events = $this->Events->find()->where(['Events.location_id ' => 1])->toArray();
		$leadcount= $this->Leads->find()->where(['Leads.lead_status_id'=> 1 ,'Leads.location_id'=>1 ])->count();
		$eventcount= $this->Events->find()->where(['Events.location_id'=>1 ])->count();
		$appointmentcount = $this->Appointments->find()->where(['lead_id IN' => $lead ])->count();
	
		$this->set(compact('appointments','pageTitle','lead','events','leadcount','eventcount','appointmentcount'));
	}

	/**
	 * Index method
	 *
	 * @return \Cake\Http\Response|null
	 */
	public function index() {
		$pageTitle = 'All staff';
		$this->paginate = [
			'contain' => ['Roles', 'UserProfiles'],
		];
		$users = $this->paginate($this->Users->find()->where(['Users.role_id <>' => 3, 'Users.id <>' => 1]));
		//pr($users);
		$this->set(compact('pageTitle', 'users'));
	}

	/**
	 * Event registration method
	 *
	 * @param $id
	 * @return \Cake\Http\Response|null Redirects on successful event registration, renders view otherwise.
	 * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
	 */
	public function eventRegistration($id = null) {
		$pageTitle = 'Event Registration';
		$user_id = base64_decode($id);
		$this->loadModel('Events');
		$this->loadModel('Travels');
		$this->loadModel('EventRegistrations');
		$this->loadModel('TravelRegistrations');
		$this->loadModel('Transactions');
		$this->loadModel('EmailTemplates');
		
		$registeredevents=$this->EventRegistrations->find('list', ['keyField' => 'event_id', 'valueField' => 'event_id'])->where(['EventRegistrations.user_id' => $user_id]);
		
		$events=$this->Events->find()->where(['Events.location_id' => 1, 'Events.published' => 1, 
		'Events.id NOT IN' => [$registeredevents]])->toArray();
		
		$registeredtravels=$this->TravelRegistrations->find('list', ['keyField' => 'travel_id', 'valueField' => 'travel_id'])->where(['TravelRegistrations.user_id' => $user_id]);
		
		$travels=$this->Travels->find()->where(['Travels.location_id' => 1, 'Travels.published' => 1, 
		'Travels.id NOT IN' => [$registeredtravels]]);
		
		$user = $this->Users->get($user_id, ['contain' => ['UserProfiles']]);
		$userid= $user_id;
		
		$eventRegistration = $this->EventRegistrations->newEntity();
		$transaction = $this->Transactions->newEntity();
		if ($this->request->is('post')) {
			$event_id = $this->request->getData()['event_id'];
		
			$event = $this->Events->get($event_id);
			$eventAmount = $event->event_fee * $this->request->getData()['quantity'];
			
			if (!empty($this->request->getData()['payment'])) {
					try {
						\Stripe\Stripe::setApiKey('sk_test_Z52CUWVN2Otn2VzVSDMfJl2k');
						//\Stripe\Stripe::setApiKey(Configure::read('seattle_secretkey'));
						// Create the PaymentIntent
						$intent = \Stripe\PaymentIntent::create([
							'amount' => $eventAmount * 100,
							'currency' => 'usd',
							'payment_method' => $this->request->getData()['payment'],

							'confirm' => true,

							'error_on_requires_action' => true,
						]);

						if ($intent->status == 'succeeded') {
							$transaction = $this->Transactions->newEntity();
							$transactionData['user_id'] = $userid;
							$transactionData['stripe_charge_id'] = $intent->charges->data[0]['id'];
							$transactionData['amount_paid'] = $intent->charges->data[0]['amount'];
							$transactionData['payment_status'] = $intent->charges->data[0]['status'];
							$transactionData['transaction_date'] = date('Y-m-d H:i:s', $intent->charges->data[0]['created']);
							$transactionData['event_id'] = $event_id;
							$transactionSave = $this->Transactions->patchEntity($transaction, $transactionData);
							if ($this->Transactions->save($transactionSave)) {
								$eventRegistration = $this->EventRegistrations->patchEntity($eventRegistration, $this->request->getData());
								if ($this->EventRegistrations->save($eventRegistration)) {
									$emailTemplate = $this->EmailTemplates->get(9);
									$to = $user->email;
									$event_date = date('m/d/Y', strtotime($event->start_date));
									$event_location = $event->venue_name . ', ' . $event->venue_address . ', ' . $event->venue_address2;
									$event_fee = '$' . $event->event_fee;
									$logo = "<img src=".Configure::read('site_url')."/img/logo.png>";
									$template = str_replace(array('{LOGO}', '{EVENT_NAME}', '{EVENT_DATE}', '{EVENT_LOCATION}', '{EVENT_FEE}'), array($logo, $event->event_name, $event_date, $event_location, $event_fee), $emailTemplate->template_body);
									try {
										$email = new Email();
										$email->setProfile('mailgun')
											->setFrom(['noreply@intheloopsingles.com' => 'IntheLoopSingles'])
											->setTo($to)
											->setEmailFormat('both')
											->setSubject($emailTemplate->subject)
											->send($template);
									} catch (\Exception $e) {
										echo 'Exception : ', $e->getMessage(), "\n";
									}
									$this->Flash->success(__('The event registration Successful.'));
									return $this->redirect(['controller' => 'users', 'action' => 'eventRegistration' , $id]);
								}
							}
						} else {
							
							echo json_encode(['error' => 'Invalid PaymentIntent status']);
						}
					} catch (\Stripe\Exception\ApiErrorException $e) {
						$this->Flash->error(__($e->getMessage()));
						return $this->redirect(['controller' => 'users', 'action' => 'eventRegistration', $id]);
					}
				}
						
			else {
				if ($eventAmount < $user->user_profile->credit_balance) {
									
					$newdata = array(); 
					$newdata['amount_paid'] = $event->event_fee * $this->request->getData()['quantity'];
					$newdata['transaction_date'] = date('Y-m-d H:i:s');
					$newdata['event_id'] = $this->request->getData()['event_id'];
					$newdata['payment_status'] = 'paid';
					$newdata['user_id'] = $user_id;
								
					$eventRegistration = $this->EventRegistrations->patchEntity($eventRegistration, $this->request->getData());
					
					$transaction = $this->Transactions->patchEntity($transaction, $newdata);
					
					
					if ($this->EventRegistrations->save($eventRegistration)) {
						$emailTemplate = $this->EmailTemplates->get(9);
						$to = $user->email;
						$event_date = date('m/d/Y', strtotime($event->start_date));
						$event_location = $event->venue_name . ', ' . $event->venue_address . ', ' . $event->venue_address2;
						$event_fee = '$' . $event->event_fee;
						$logo = "<img src=".Configure::read('site_url')."/img/logo.png>";
						$template = str_replace(array('{LOGO}', '{EVENT_NAME}', '{EVENT_DATE}', '{EVENT_LOCATION}', '{EVENT_FEE}'), array($logo, $event->event_name, $event_date, $event_location, $event_fee), $emailTemplate->template_body);
						try {
							$email = new Email();
							$email->setProfile('mailgun')
								->setFrom(['noreply@intheloopsingles.com' => 'IntheLoopSingles'])
								->setTo($to)
								->setEmailFormat('both')
								->setSubject($emailTemplate->subject)
								->send($template);
						} catch (\Exception $e) {
							echo 'Exception : ', $e->getMessage(), "\n";
						}
						
						
						$data['user_profile']['credit_balance'] = $user->user_profile->credit_balance - $eventAmount;
						$userProfile = $this->Users->patchEntity($user, $data);
						$this->Users->save($user);
						$this->Transactions->save($transaction);
						$this->Flash->success(__('The event registration Successful.'));
						return $this->redirect(['controller' => 'users', 'action' => 'eventRegistration', $id]);
					}
					$this->Flash->error(__('The event registration could not be saved. Please, try again.'));
					return $this->redirect(['controller' => 'users', 'action' => 'eventRegistration', $id]);
				} 
				else {
				
				$this->Flash->error(__('Not enough credit balance for registration.'));
				return $this->redirect(['controller' => 'users', 'action' => 'eventRegistration', $id]);
				
				}
			}	
		}
		$this->set(compact('pageTitle', 'events','userid','travels','user'));
	}
	
	/**
	 * Travel event registration method
	 *
	 * @param $id
	 * @return \Cake\Http\Response|null Redirects on successful travel event registration, renders view otherwise.
	 * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
	 */
	public function travelRegistration($id = null) {
		$pageTitle = 'Travel Registration';
		$user_id = base64_decode($id);
		$this->loadModel('Travels');
		$this->loadModel('TravelRegistrations');
		$this->loadModel('Transactions');
		$this->loadModel('EmailTemplates');
		$userid= $user_id;
		$user = $this->Users->get($user_id, ['contain' => ['UserProfiles']]);
			
		$travelRegistration = $this->TravelRegistrations->newEntity();
		$transaction = $this->Transactions->newEntity();
		
		if ($this->request->is('post')) {
			
			$travel = $this->Travels->get($this->request->getData()['travel_id']);
			
			$eventAmount = $this->request->getData()['cost'];
			
			if (!empty($this->request->getData()['payment'])) {
					try {
						\Stripe\Stripe::setApiKey('sk_test_Z52CUWVN2Otn2VzVSDMfJl2k');
						//\Stripe\Stripe::setApiKey(Configure::read('seattle_secretkey'));
						// Create the PaymentIntent
						$intent = \Stripe\PaymentIntent::create([
							'amount' => $eventAmount * 100,
							'currency' => 'usd',
							'payment_method' => $this->request->getData()['payment'],

							'confirm' => true,

							'error_on_requires_action' => true,
						]);

						if ($intent->status == 'succeeded') {
							$transaction = $this->Transactions->newEntity();
							$transactionData['user_id'] = $userid;
							$transactionData['stripe_charge_id'] = $intent->charges->data[0]['id'];
							$transactionData['amount_paid'] = $intent->charges->data[0]['amount'];
							$transactionData['payment_status'] = $intent->charges->data[0]['status'];
							$transactionData['transaction_date'] = date('Y-m-d H:i:s', $intent->charges->data[0]['created']);
							$transactionData['travel_id'] = $this->request->getData()['travel_id'];
							$transactionSave = $this->Transactions->patchEntity($transaction, $transactionData);
							if ($this->Transactions->save($transactionSave)) {
								$travelRegistration = $this->TravelRegistrations->patchEntity($travelRegistration, $this->request->getData());
								if ($this->TravelRegistrations->save($travelRegistration)) {
									$emailTemplate = $this->EmailTemplates->get(9);
									$to = $user->email;
									$event_date = date('m/d/Y', strtotime($travel->depart_date));
									$event_location = $travel->travel_location ;
									$event_fee = '$' . $this->request->getData()['cost'];
									$logo = "<img src=".Configure::read('site_url')."/img/logo.png>";
									$template = str_replace(array('{LOGO}', '{EVENT_NAME}', '{EVENT_DATE}', '{EVENT_LOCATION}', '{EVENT_FEE}'), array($logo, $travel->travel_name, $event_date, $event_location, $event_fee), $emailTemplate->template_body);
									try {
										$email = new Email();
										$email->setProfile('mailgun')
											->setFrom(['noreply@intheloopsingles.com' => 'IntheLoopSingles'])
											->setTo($to)
											->setEmailFormat('both')
											->setSubject($emailTemplate->subject)
											->send($template);
									} catch (\Exception $e) {
										echo 'Exception : ', $e->getMessage(), "\n";
									}
									$this->Flash->success(__('The travel event registration Successful.'));
									return $this->redirect(['controller' => 'users', 'action' => 'eventRegistration' , $id]);
								}
							}
						} else {
							
							echo json_encode(['error' => 'Invalid PaymentIntent status']);
						}
					} catch (\Stripe\Exception\ApiErrorException $e) {
						$this->Flash->error(__($e->getMessage()));
						return $this->redirect(['controller' => 'users', 'action' => 'eventRegistration', $this->request->getData()['user_id']]);
					}
				}
						
			else {
						
			if ($eventAmount < $user->user_profile->credit_balance) {
				$newdata = array(); 
				$newdata['amount_paid'] = $this->request->getData()['cost'];
				$newdata['transaction_date'] = date('Y-m-d H:i:s');
				$newdata['travel_id'] = $this->request->getData()['travel_id'];
				$newdata['payment_status'] = 'paid';
				$newdata['user_id'] = $user_id;
				
				$travelRegistration = $this->TravelRegistrations->patchEntity($travelRegistration, $this->request->getData());
				
				$transaction = $this->Transactions->patchEntity($transaction, $newdata);
				
				if ($this->TravelRegistrations->save($travelRegistration)) {
					$emailTemplate = $this->EmailTemplates->get(9);
					$to = $user->email;
					$event_date = date('m/d/Y', strtotime($travel->depart_date));
					$event_location = $travel->travel_location ;
					$event_fee = '$' . $this->request->getData()['cost'];
					$logo = "<img src=".Configure::read('site_url')."/img/logo.png>";
					$template = str_replace(array('{LOGO}', '{EVENT_NAME}', '{EVENT_DATE}', '{EVENT_LOCATION}', '{EVENT_FEE}'), array($logo, $travel->travel_name, $event_date, $event_location, $event_fee), $emailTemplate->template_body);
					try {
						$email = new Email();
						$email->setProfile('mailgun')
							->setFrom(['noreply@intheloopsingles.com' => 'IntheLoopSingles'])
							->setTo($to)
							->setEmailFormat('both')
							->setSubject($emailTemplate->subject)
							->send($template);
					} catch (\Exception $e) {
						echo 'Exception : ', $e->getMessage(), "\n";
					}
					
					
					$data['user_profile']['credit_balance'] = $user->user_profile->credit_balance - $eventAmount;
					$userProfile = $this->Users->patchEntity($user, $data);
					$this->Users->save($user);
					$this->Transactions->save($transaction);
					$this->Flash->success(__('The travel event registration Successful.'));
					return $this->redirect(['controller' => 'users', 'action' => 'eventRegistration', $id]);
				}
				$this->Flash->error(__('The travel event registration could not be saved. Please, try again.'));
				return $this->redirect(['controller' => 'users', 'action' => 'eventRegistration', $id]);
			} else {
				$this->Flash->error(__('Not enough credit balance for registration.'));
				return $this->redirect(['controller' => 'users', 'action' => 'eventRegistration', $id]);
			}
		}
	}
		$this->set(compact('pageTitle', 'userid'));
	}
	
	/**
	 * Change event fee method
	 *
	 * @return \Cake\Http\Response|null Redirects on successful change event fee, renders view otherwise.
	 * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
	 */
	public function changeEvent()
    {
		$this->autoRender = false;
		$this->loadModel('Events');
		$this->viewBuilder()->setLayout(false);
		if ($this->request->is('ajax')) {
			$eventid = $this->request->getData()['eventid'];
			
			$eventdata = $this->Events->get($eventid);
			
			echo json_encode($eventdata->event_fee); exit;
			
		}
		$this->set(compact('pageTitle', 'eventdata'));
    }
	
	/**
	 * Change travel method
	 *
	 * @return \Cake\Http\Response|null Redirects on successful change travel costs, renders view otherwise.
	 * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
	 */
	public function changeTravel()
    {
		$this->autoRender = false;
		$this->loadModel('Travels');
		$this->viewBuilder()->setLayout(false);
		if ($this->request->is('ajax')) {
			$travelid = $this->request->getData()['travelid'];
			
			$traveldata = $this->Travels->get($travelid);
			//pr($traveldata); die;
			echo json_encode(array(
				'cost_single' => $traveldata->cost_single,
				'cost_shared' => $traveldata->cost_shared
				)); exit;
			
		}
		$this->set(compact('pageTitle', 'traveldata'));
    }
	
	/**
	 * Add credit method
	 *
	 * @return \Cake\Http\Response|null Redirects on successful add credit, renders view otherwise.
	 * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
	 */
	public function addcredit() {
		$this->autoRender = false;
		$this->viewBuilder()->setLayout(false);
		$this->loadModel('Transactions');
		$this->loadModel('Users');

		\Stripe\Stripe::setApiKey('sk_test_Z52CUWVN2Otn2VzVSDMfJl2k');
		
		header('Content-Type: application/json');

		# retrieve JSON from POST body
		$json_str = file_get_contents('php://input');
		$json_obj = json_decode($json_str);

		try {
			// Create the PaymentIntent
			$intent = \Stripe\PaymentIntent::create([
				'amount' => $json_obj->amount * 100,
				
				'currency' => 'usd',
				'payment_method' => $json_obj->payment_method_id,

				'confirm' => true,

				'error_on_requires_action' => true,
			]);

			if ($intent->status == 'succeeded') {
				$transaction = $this->Transactions->newEntity();
				$transactionData['user_id'] = $json_obj->userid;
				$transactionData['stripe_charge_id'] = $intent->charges->data[0]['id'];
				$transactionData['amount_paid'] = $intent->charges->data[0]['amount'];
				$transactionData['payment_status'] = $intent->charges->data[0]['status'];
				$transactionData['transaction_date'] = date('Y-m-d H:i:s', $intent->charges->data[0]['created']);
				$transactionSave = $this->Transactions->patchEntity($transaction, $transactionData);
				if ($this->Transactions->save($transactionSave)) {
					$user = $this->Users->get($json_obj->userid, ['contain' => ['UserProfiles']]);
					
					if (!empty($user->user_profile->credit_balance)) {
						
						$data['user_profile']['credit_balance'] = $user->user_profile->credit_balance + ($intent->charges->data[0]['amount'] / 100);
					
					} else {
						$data['user_profile']['credit_balance'] = $intent->charges->data[0]['amount'] / 100;
					}
					$userProfile = $this->Users->patchEntity($user, $data);
					$this->Users->save($user);
					echo json_encode(['success' => true]);
					exit;
				}
			} else {
				// Any other status would be unexpected, so error
				echo json_encode(['error' => 'Invalid PaymentIntent status']);
			}
		} catch (\Stripe\Exception\ApiErrorException $e) {
			// Display error on client
			echo json_encode(['error' => $e->getMessage()]);
		}
	}

	/**
	 * Members method
	 *
	 * @return \Cake\Http\Response|null
	 */
	public function member() {
		$pageTitle = 'Members';
		$paginateArray = ['contain' => ['Roles', 'UserProfiles'],];
		$conditions = [];
		if ($this->request->is('get')) {

			if (isset($this->request->getQuery()['action'])) {

				if (!empty($this->request->getQuery()['name']) && $this->request->getQuery()['name'] != '') {
					$data=$this->request->getQuery()['name'];
					$datan = trim($data);
					$conditions[] = array('UserProfiles.first_name LIKE' => '%' . $datan . '%');
					
				}
				$paginateArray['conditions'] = ['AND' => $conditions];

			} else {
			}
		}
		
		$paginateArray['conditions'] = $conditions;		
		$this->paginate = $paginateArray;		
		$users = $this->paginate($this->Users->find()->where(['Users.role_id ' => 3, 'Users.location_id ' => 1])->order(['Users.id' => 'desc']));
		$this->set(compact('pageTitle', 'users'));
	}
	
	/**
	 * Member Email method
	 *
	 * @param $id
	 * @return \Cake\Http\Response|null Redirects on successful email sent to member, renders view otherwise.
	 * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
	 */
	public function memberEmail() {
		$this->autoRender = false;
		$pageTitle = 'Send Email to Member';
		
		if ($this->request->is('post')) {
			$this->loadModel('Users');
			$this->loadModel('EmailTemplates');
			$subject=$this->request->getData()['subject'];
			$content=$this->request->getData()['email-content'];
			$mail=$this->request->getData()['users']['email'];
			
					$email = new Email();
					$email->setProfile('mailgun')
						->setFrom(['noreply@intheloopsingles.com' => 'IntheLoopSingles'])
						->setTo($mail)
						->setEmailFormat('both')
						->setSubject($subject)
						->send($content);
				
				$this->Flash->success('Email Sent Successfully');
				return $this->redirect(['action' => 'member']);
		}
		$this->set(compact('pageTitle'));
	}
	
	/**
	 * Member detail method
	 *
	 * @param $id
	 * @return \Cake\Http\Response|null Redirects on successful member detail, renders view otherwise.
	 * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
	 */	
	public function memberdetail($id = null) {
		$this->loadModel('MemberNotes');
		$this->loadModel('EventRegistrations');
		$this->loadModel('TravelRegistrations');
		$this->loadModel('Transactions');
		$user_id = base64_decode($id);
		$userid=$user_id;
		$memberNotes = $this->MemberNotes->find()->contain(['UsersMember', 'UsersStaff'])->where(['MemberNotes.user_id' => $user_id])->order(['MemberNotes.id' => 'asc'])->all();
		
		$pageTitle = 'Members Detail';
		$user = $this->Users->get($user_id, [
            'contain' => ['UserProfiles'=>['States'],'Roles'],
        ]);
		$eventRegistrations = $this->EventRegistrations->find()->contain(['Events'])->where(['EventRegistrations.user_id' => $user_id])->all();
		$travelRegistrations = $this->TravelRegistrations->find()->contain(['Travels'])->where(['TravelRegistrations.user_id' => $user_id])->all();
		$transactions = $this->Transactions->find()->where(['Transactions.user_id' => $user_id, 'Transactions.payment_status' => 'refund'])->order(['Transactions.id' => 'desc'])->limit(5)->all();
		$this->set(compact('pageTitle', 'user', 'memberNotes','userid','eventRegistrations','travelRegistrations','transactions'));  

	}
	
	/**
	 * Add Member credit method
	 *
	 * @param $id
	 * @return \Cake\Http\Response|null Redirects on successful add credit, renders view otherwise.
	 * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
	 */	
	public function addmembercredit($id = null) {
		
		$this->loadModel('Transactions');
		$user_id = base64_decode($id);		
		$user = $this->Users->get($user_id, ['contain' => ['UserProfiles']]);
		$transaction = $this->Transactions->newEntity();
		
		if ($this->request->is('post')) {
					$newdata = array(); 
					$newdata['amount_paid'] = $this->request->getData()['amount_paid'];
					$newdata['remarks'] = $this->request->getData()['remarks'];
					$newdata['transaction_date'] = date('Y-m-d H:i:s');
					$newdata['payment_type'] = 1;
					$newdata['payment_status'] = 'refund';
					$newdata['user_id'] = $this->request->getData()['userid'];
								
					$transaction = $this->Transactions->patchEntity($transaction, $newdata);
					//pr($this->Transactions->save($transaction)); die;
					if ($this->Transactions->save($transaction)) {
						
						$data['user_profile']['credit_balance'] = $user->user_profile->credit_balance + $this->request->getData()['amount_paid'];
						$userProfile = $this->Users->patchEntity($user, $data);
						$this->Users->save($user);
						$this->Flash->success(__('Amount credited successfully.'));
						return $this->redirect(['controller' => 'users', 'action' => 'memberdetail', $id]);
					}
					$this->Flash->error(__('Amount has not been credited. Please, try again.'));
					return $this->redirect(['controller' => 'users', 'action' => 'memberdetail', $id]);
				
				
		}
		$this->set(compact('pageTitle','userid'));
	}
	
	/**
	 * Member password reset method
	 *
	 * @return \Cake\Http\Response|null Redirects on successful password reset, renders view otherwise.
	 * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
	 */	
	public function memberresetpassword($id = null) {
		$user_id = base64_decode($id);	
		$user = $this->Users->get($user_id, ['contain' => ['UserProfiles']]);
		if ($this->request->is('post')) {
					
					$data['password'] = $this->request->getData()['password'];
					$user = $this->Users->patchEntity($user, $data);
					
					if ($this->Users->save($user)) {
						
						$this->Flash->success(__('Password reset successfully.'));
						return $this->redirect(['controller' => 'users', 'action' => 'memberdetail', $id]);
					}
					$this->Flash->error(__('Amount has not been credited. Please, try again.'));
					return $this->redirect(['controller' => 'users', 'action' => 'memberdetail', $id]);
				
				
		}
		$this->set(compact('pageTitle','userid'));
	}

	/**
	 * Add method
	 *
	 * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
	 */
	public function add() {
		$pageTitle = 'Add Staff Member';
		$user = $this->Users->newEntity();
		if ($this->request->is('post')) {
			$data = $this->request->getData();
			$newdata = array();
			$newdata['email'] = $data['email'];
			$newdata['password'] = $data['password'];
			$newdata['role_id'] = $data['role_id'];
			$newdata['status'] = $data['status'];
			$newdata['activation_key'] = bin2hex(random_bytes(16));
			$newdata['user_profile'] = $data['user_profile'];

			$user = $this->Users->patchEntity($user, $newdata, [
				'associated' => [
					'UserProfiles' => ['validate' => 'default']],
			]);

			if ($this->Users->save($user)) {
				$this->Flash->success(__('The user has been saved.'));

				return $this->redirect(['action' => 'index']);
			}
			$this->Flash->error(__('The user could not be saved. Please, try again.'));
		}
		$roles = $this->Users->Roles->find('list', ['limit' => 200]);
		$this->set(compact('pageTitle', 'user', 'roles'));
	}

	/**
	 * Edit method
	 *
	 * @param string|null $id User id.
	 * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
	 * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
	 */
	public function edit($id = null) {
		$user = $this->Users->get($id, ['contain' => ['Roles', 'UserProfiles']]);
		if ($this->request->is(['patch', 'post', 'put'])) {
			$user = $this->Users->patchEntity($user, $this->request->getData());
			if ($this->Users->save($user)) {
				$this->Flash->success(__('The user has been saved.'));

				return $this->redirect(['action' => 'index']);
			}
			$this->Flash->error(__('The user could not be saved. Please, try again.'));
		}
		$roles = $this->Users->Roles->find('list', ['limit' => 200]);
		$this->set(compact('user', 'roles'));
	}

	/**
	 * Delete method
	 *
	 * @param string|null $id User id.
	 * @return \Cake\Http\Response|null Redirects to index.
	 * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
	 */
	public function delete($id = null) {
		$this->request->allowMethod(['post', 'delete']);
		$user = $this->Users->get($id);
		if ($this->Users->delete($user)) {
			$this->Flash->success(__('The user has been deleted.'));
		} else {
			$this->Flash->error(__('The user could not be deleted. Please, try again.'));
		}

		return $this->redirect(['action' => 'index']);
	}

	/**
	 * Change Staff Status method
	 *
	 * @return \Cake\Http\Response|null Redirects on successful list, renders view otherwise.
	 * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
	 */	
	public function ajaxStaffStatus() {
		$this->autoRender = false;
		$this->viewBuilder()->setLayout(false);
		if ($this->request->is('ajax')) {
			$id = $this->request->getData()['id'];
			$status = $this->request->getData()['status'];
			$data = $this->Users->get($id);

			$user = $this->Users->patchEntity($data, ['status' => $status]);

			if ($this->Users->save($user)) {
				$message = ($status == 1) ? 'Staff is Active now.' : 'Staff is InActive now.';
				echo json_encode(array('status' => 'success', 'message' => $message));
				exit;
			}
			$message = ($status == 1) ? 'Error while updating staff status to Active.' : 'Error while updating staff status to InActive.';
			echo json_encode(array('status' => 'error', 'message' => $message));
			exit;
		}
	}

	/**
	 * Change Member status method
	 *
	 * @return \Cake\Http\Response|null Redirects on successful list, renders view otherwise.
	 * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
	 */	
	public function ajaxMemberStatus() {
		$this->autoRender = false;
		$this->viewBuilder()->setLayout(false);
		if ($this->request->is('ajax')) {
			$id = $this->request->getData()['id'];
			$status = $this->request->getData()['status'];
			$data = $this->Users->get($id);

			$user = $this->Users->patchEntity($data, ['status' => $status]);

			if ($this->Users->save($user)) {
				$message = ($status == 1) ? 'Member is Active now.' : 'Member is InActive now.';
				echo json_encode(array('status' => 'success', 'message' => $message));
				exit;
			}
			$message = ($status == 1) ? 'Error while updating member status to Active.' : 'Error while updating member status to InActive.';
			echo json_encode(array('status' => 'error', 'message' => $message));
			exit;
		}
	}

	/**
	 * Convert To Member method
	 *
	 * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
	 */
	public function addMember() {
		$this->loadModel('Sales');
		$this->loadModel('Leads');
		$this->loadModel('EmailTemplates');
		$user = $this->Users->newEntity();
		if ($this->request->is('post')) {

			$data = $this->request->getData();

			$userData['email'] = $data['users']['email'];
			$userData['password'] = $password = substr(str_shuffle('1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZabcefghijklmnopqrstuvwxyz!@#$%^&*()'), 0, 15);
			$userData['activation_key'] = bin2hex(random_bytes(16));
			$userData['role_id'] = 3;
			$userData['status'] = 1;
			$userData['location_id'] = 1;
			$data['user_profile']['dob'] = date('Y-m-d', strtotime($data['user_profile']['dob']));
			 $added_timestamp = strtotime('+'.$data['no_of_months'].' month', time());
			 $data['user_profile']['membership'] = date('Y-m-d', $added_timestamp);
			$userData['user_profile'] = $data['user_profile'];
			$user = $this->Users->patchEntity($user, $userData, [
				'associated' => [
					'UserProfiles']]);
			if ($userSave = $this->Users->save($user)) {
				$sale = $this->Sales->newEntity();
				$saleData['lead_id'] = $data['lead_id'];
				$saleData['user_id'] = $userSave->id;
				$saleData['sold_by_id'] = $this->Auth->User('id');
				$saleData['no_of_months'] = $data['no_of_months'];
				$saleData['down_payment'] = $data['down_payment'];
				if(!empty($data['payment_date'])) {
				$saleData['payment_date'] = date('Y-m-d', strtotime($data['payment_date']));
				} else 
				{
				$saleData['payment_date'] = '';	
				}
				$saleData['total_cost'] = $data['total_cost'];
				$saleData['pay_in_full'] = $data['pay_in_full'];
				$saleData['notes'] = $data['notes'];
				$sale = $this->Sales->patchEntity($sale, $saleData);
				$this->Sales->save($sale);
				$lead = $this->Leads->get($data['lead_id']);
				$lead->lead_status_id = 3;
				$this->Leads->save($lead);
				$template = $this->EmailTemplates->get(2);
				$logo = "<img src=".Configure::read('site_url')."/img/logo.png>";
				$member_name = $data['user_profile']['first_name'] . ' ' . $data['user_profile']['last_name'];
				$member_email = $data['users']['email'];
				$member_password = $password;
				$template = str_replace(['{LOGO}', '{MEMBER_NAME}', '{MEMBER_EMAIL}', '{MEMBER_PASSWORD}'], [$logo, $member_name, $member_email, $member_password], $template->template_body);


				try {

					$email = new Email();
					$email->setProfile('mailgun')
						->setFrom(['noreply@intheloopsingles.com' => 'IntheLoopSingles'])
						->setTo($member_email)
						->setEmailFormat('both')
						->setSubject('Welcome to In the Loop family!')
						->setAttachments(['New Member Handbook.pdf' => WWW_ROOT . DS . 'files/attachments' . DS . 'New Member Handbook.pdf'])
						->send($template);

				} catch (\Exception $e) {

					echo 'Exception : ', $e->getMessage(), "\n";

				}
				$this->Flash->success(__('The member has been created.'));

				return $this->redirect(['controller' => 'leads', 'action' => 'index']);
			}
			$this->Flash->error(__('Error while converting lead to member. Please, try again.'));
			return $this->redirect(['controller' => 'leads', 'action' => 'index']);
		}
		$roles = $this->Users->Roles->find('list', ['limit' => 200]);
		$this->set(compact('user', 'roles'));
	}

	/**
	 * Enquiry method
	 *
	 * @return \Cake\Http\Response|null
	 */
	public function enquiry() {
		$pageTitle = 'Enquiries';
		$this->loadModel('Enquiries');
		$enquiries = $this->paginate($this->Enquiries);

		$this->set(compact('pageTitle', 'enquiries'));
	}
	
	
	/**
	 * Send Test SMS method
	 *
	 * @return \Cake\Http\Response|null Redirects on successful sms sent, renders view otherwise.
	 * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
	 */	
	public function sendTestSms() {
		$this->autoRender = false;

		if ($this->request->is('post')) {

			$content = $this->request->getData()['sms-content'];
			$to = $this->clean($this->request->getData()['mobile']);
			$send_sms = $this->Sms->sendSms($to, $content);
			
			

		}
		exit;

	}

	protected function clean($number) {
		$str = str_replace('(', '', $number);
		$str = str_replace(')', '', $str);
		$str = str_replace('-', '', $str);
		$str = str_replace(' ', '', $str);
		return '+1' . $str;
	}
	
	/**
	 * Add New Member method
	 *
	 * @return \Cake\Http\Response|null Redirects on successful list, renders view otherwise.
	 * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
	 */	
	public function newMember() {
		$pageTitle = 'Add New Member';
		$user = $this->Users->newEntity();
		if ($this->request->is('post')) {
			$data = $this->request->getData();
			$newdata = array();
			$newdata['email'] = $data['email'];
			$newdata['password'] = $data['password'];
			$newdata['role_id'] = 3;
			$newdata['location_id'] = 1;
			$newdata['status'] = $data['status'];
			$newdata['activation_key'] = bin2hex(random_bytes(16));
			if (!empty($data['user_profile']['dob'])) {
				$data['user_profile']['dob'] = date('Y-m-d', strtotime($data['user_profile']['dob']));
			}
			if (!empty($data['user_profile']['membership'])) {
				$data['user_profile']['membership'] = date('Y-m-d', strtotime($data['user_profile']['membership']));
			}
			$newdata['user_profile'] = $data['user_profile'];
			$user = $this->Users->patchEntity($user, $newdata, [
				'associated' => [
					'UserProfiles' => ['validate' => 'default']],
			]);
			if ($this->Users->save($user)) {
				$this->Flash->success(__('The member has been saved.'));

				return $this->redirect(['action' => 'member']);
			}
			$this->Flash->error(__('The member could not be saved. Please, try again.'));
		}
		$roles = $this->Users->Roles->find('list', ['limit' => 200]);
		$states = $this->Users->UserProfiles->States->find('list', ['keyField' => 'id', 'valueField' => 'state_name'])->toArray();
		
		$this->set(compact('pageTitle', 'user', 'roles','states'));
	}
	
	/**
	 * Edit Member method
	 *
	 * @param $id 
	 * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
	 * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
	 */	
	public function editMember($id = null) {
		$pageTitle = 'Edit Member';
		$user_id = base64_decode($id);
		$user = $this->Users->get($user_id, ['contain' => ['Roles', 'UserProfiles']]);
		if ($this->request->is(['patch', 'post', 'put'])) {
			$data = $this->request->getData();
			if (!empty($data['user_profile']['dob'])) {
				$data['user_profile']['dob'] = date('Y-m-d', strtotime($data['user_profile']['dob']));
			}
			if (!empty($data['user_profile']['membership'])) {
				$data['user_profile']['membership'] = date('Y-m-d', strtotime($data['user_profile']['membership']));
			}
			$user = $this->Users->patchEntity($user, $data);
			if ($this->Users->save($user)) {
				$this->Flash->success(__('The user has been saved.'));

				return $this->redirect(['action' => 'member']);
			}
			$this->Flash->error(__('The user could not be saved. Please, try again.'));
		}
		$roles = $this->Users->Roles->find('list', ['limit' => 200]);
		$states = $this->Users->UserProfiles->States->find('list', ['keyField' => 'id', 'valueField' => 'state_name'])->toArray();
		$this->set(compact('pageTitle', 'user', 'roles','states'));
	}
	
	/**
	 * Delete Members method
	 *
	 * @param $id 
	 * @return \Cake\Http\Response|null
	 * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
	 */	
	public function deleteMember($id = null) {
		$this->request->allowMethod(['post', 'delete']);
		$user = $this->Users->get($id);
		
		if ($this->Users->delete($user)) {
			$this->Flash->success(__('The user has been deleted.'));
		} else {
			$this->Flash->error(__('The user could not be deleted. Please, try again.'));
		}

		return $this->redirect(['action' => 'member']);
	}
}
