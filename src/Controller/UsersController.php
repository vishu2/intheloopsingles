<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Datasource\ConnectionManager;
use Cake\Event\Event;
use Cake\Mailer\Email;
use Cake\ORM\TableRegistry;
use Stripe\Stripe;
use Twilio\Rest\Client;
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
		$this->loadComponent('Email');
	}

	public function beforeFilter(Event $event) {
		parent::beforeFilter($event);
		$this->Auth->allow(['login', 'checkUser', 'home', 'contactUs', 'ajaxLeadSource', 'ajaxLeadSubmission', '', 'aboutUs', 'thankYou', 'thankYouDenver', 'thankYouAustin', 'thankYouSeattle', 'stories', 'travel', 'events', 'gallery', 'pay', 'ajaxevents', 'ajaxtravels', 'forgotPassword', 'resetPassword', 'dataMigration', 'sendMessage', 'checkSession']);
	}

	public function sendMessage() {
		$sid = 'AC8ca7401f53adfb604718247964c30978';
		$token = 'f589d6a1cc493d2981171a48c8c06217';
		$msgServiceID = 'MGbe67c4965dc09623ac30dd08c986901b';
		
		$client = new Client($sid, $token);

		// Use the client to do fun stuff like send text messages!
		$mess = $client->messages->create(
			// the number you'd like to send the message to
			'+18622584243',
			[
				// A Twilio phone number you purchased at twilio.com/console
				'messagingServiceSid' => $msgServiceID,
				// the body of the text message you'd like to send
				'body' => 'Hey Jenny! Good luck on the bar exam!',
			]
		);
		pr($mess);
		exit;
	}

	public function login() {
		$pageTitle = 'Member Login';
		$this->viewBuilder()->setLayout('loginlayout');
		if ($this->request->is('post')) {
			$this->request->getSession()->destroy();
			$user = $this->Auth->identify();

			if ($user) {
				if ($user['role_id'] == 3) {
					// 3- member
					if ($user['status'] == 1) {
						// 1- active
						$this->Auth->setUser($user);
						//return $this->redirect($this->Auth->redirectUrl());
						return $this->redirect(['action' => 'eventscal', base64_encode($this->Auth->user('location_id'))]);
					} else {
						$this->Auth->logout();
						$this->Flash->error(__('User has been deactivated'));
					}
				} else {
					$this->Auth->logout();
					return $this->redirect(['prefix' => 'admin', 'action' => 'login']);
				}
			} else {
				$this->Flash->error(__('Invalid username or password, try again'));
			}
		}

		$this->set(compact('pageTitle'));
	}

	

	/**
	 * Index method
	 *
	 * @return \Cake\Http\Response|null
	 */
	public function index() {
		$this->paginate = [
			'contain' => ['Roles', 'UserProfiles'],
		];
		$users = $this->paginate($this->Users->find()->where(['Users.role_id <>' => 3, 'Users.id <>' => 1]));
		
		$this->set(compact('users'));
	}

	/**
	 * Members method
	 *
	 * @return \Cake\Http\Response|null
	 */
	public function member() {
		$this->paginate = [
			'contain' => ['Roles', 'UserProfiles'],
		];
		$users = $this->paginate($this->Users->find()->where(['Users.role_id ' => 3]));
		
		$this->set(compact('users'));
	}

	/**
	 * Members Detail method
	 *
	 * @return \Cake\Http\Response|null
	 */
	public function memberdetail($id = null) {
		$user = $this->Users->get($id, [
			'contain' => ['UserTypes'],
		]);

		$this->set('user', $user);
	}

	/**
	 * View method
	 *
	 * @param string|null $id User id.
	 * @return \Cake\Http\Response|null
	 * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
	 */
	public function view($id = null) {
		$user = $this->Users->get($id, [
			'contain' => ['UserTypes'],
		]);

		$this->set('user', $user);
	}

	/**
	 * Add method
	 *
	 * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
	 */
	public function add() {

		$user = $this->Users->newEntity();
		if ($this->request->is('post')) {
			$data = $this->request->getData();
			$newdata = array();
			$newdata['email'] = $data['email'];
			$newdata['password'] = $data['password'];
			$newdata['role_id'] = $data['role_id'];
			$newdata['status'] = $data['status'];
			$newdata['is_ban'] = $data['is_ban'];
			$newdata['ban_reason'] = $data['ban_reason'];
			$newdata['activation_key'] = bin2hex(random_bytes(16));
			$newdata['user_profiles'] = $data['user_profiles'];

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
		$this->set(compact('user', 'roles'));
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
	 * Change Password method
	 *
	 * @return \Cake\Http\Response|null
	 */
	public function changePassword() {
		$pageTitle = 'Change Password';
		$user = $this->Users->get($this->Auth->user('id'));

		if ($this->request->is('post')) {

			$user = $this->Users->patchEntity($user, [

				'old_password' => $this->request->getData()['old_password'],

				'password' => $this->request->getData()['password'],

				'confirm_password' => $this->request->getData()['confirm_password'],

			],

				['validate' => 'password']

			);

			if ($this->Users->save($user)) {

				$this->Flash->success('The password is successfully changed', ['key' => 'change_password']);

				$this->redirect(['action' => 'profile']);

			} else {

				$this->Flash->error('There was an error during the save!', ['key' => 'change_password']);
				$this->redirect(['action' => 'profile']);
			}

		}

		$this->set(compact('user', 'pageTitle'));
	}

	/**
	 * Logout method
	 *
	 * @return \Cake\Http\Response|null
	 */
	public function logout() {
		$this->Flash->success('You are now logged out.');
		return $this->redirect($this->Auth->logout());
	}

	/**
	 * Home Page method
	 *
	 * @return \Cake\Http\Response|null
	 */
	public function home() {
		$pageTitle = 'Home';
		$this->loadModel('Locations');
		$this->loadModel('Stories');
		$this->viewBuilder()->setLayout('homelayout');
		$locationTable = TableRegistry::getTableLocator()->get('locations');
		$locations = $locationTable->find('list', ['keyField' => 'id', 'valueField' => 'location_name'], ['conditions' => ['status' => 1]]);
		$this->paginate = [
			'order' => ['Stories.created' => 'DESC'],
		];
		$stories = $this->paginate($this->Stories);
		$this->set(compact('pageTitle', 'locations', 'stories'));

	}

	/**
	 * Contact Us method
	 *
	 * @return \Cake\Http\Response|null
	 */
	public function contactUs() {

		$pageTitle = 'Contact Us';
		$this->viewBuilder()->setLayout('homelayout');
		$this->loadModel('Enquiries');
		$this->loadModel('Locations');
		$this->loadModel('Hours');
		$enquiry = $this->Enquiries->newEntity();
		if ($this->request->is(['patch', 'post', 'put'])) {
			$userEnquiry = $this->Enquiries->patchEntity($enquiry, $this->request->getData());
			if ($this->Enquiries->save($userEnquiry)) {
				$this->Flash->success(__('Thank you for your email.  Our team will respond to you soon'));
				return $this->redirect(['action' => 'contact-us']);
			} else {
				$this->Flash->error(__('Error whil submitting enquiry. please try again.'));
			}
		}
		$seattlehours = $this->Hours->find()->contain(['Locations'])->where(['Hours.location_id' => 1])->all();
		$denverhours = $this->Hours->find()->contain(['Locations'])->where(['Hours.location_id' => 2])->all();
		$austinhours = $this->Hours->find()->contain(['Locations'])->where(['Hours.location_id' => 3])->all();
		$seattles = $this->Locations->find()->contain(['States'])->where(['Locations.id' => 1])->all();
		$denvers = $this->Locations->find()->contain(['States'])->where(['Locations.id' => 2])->all();
		$austins = $this->Locations->find()->contain(['States'])->where(['Locations.id' => 3])->all();
		$this->set(compact('pageTitle', 'seattles', 'denvers', 'austins', 'seattlehours', 'denverhours', 'austinhours'));

	}

	/**
	 * Events method
	 *
	 * @return \Cake\Http\Response|null Redirects on successful list, renders view otherwise.
	 * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
	 */
	public function events() {

		$pageTitle = 'Events';
		$this->viewBuilder()->setLayout('homelayout');
		$this->loadModel('Events');
		$this->loadModel('Galleries');
		$this->paginate = [
			'limit' => 3,
			'order' => ['Events.created' => 'DESC'],
		];

		$events = $this->paginate($this->Events);
		$galleries = $this->Galleries->Images
			->find()
			->where(['gallery_id =' => 27])
			->limit(4)
			->order(['created' => 'DESC']);
		$this->set(compact('pageTitle', 'events', 'galleries'));
	}

	/**
	 * Event List method
	 *
	 * @return \Cake\Http\Response|null Redirects on successful list, renders view otherwise.
	 * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
	 */
	public function eventListing() {
		$pageTitle = 'Event Listing';
		$this->viewBuilder()->setLayout('homelayout');
		$this->loadModel('Events');
		$today = date("Y-m-d");
		$events = $this->Events->find()->where(['Events.published' => 1, 'DATE(Events.start_date) >' => $today ])->order(['Events.start_date' => 'ASC'])->limit(3)->all();
		$this->set(compact('pageTitle', 'events'));
	}

	/**
	 * Load More events method
	 *
	 * @return \Cake\Http\Response|null Redirects on successful list, renders view otherwise.
	 * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
	 */
	public function ajaxevents() {
		$pageTitle = 'Events';
		$this->autoRender = false;
		$this->viewBuilder()->setLayout(false);
		$this->loadModel('Events');
		$today = date("Y-m-d");
		if ($this->request->is('ajax')) {

			$events = $this->Events->find()->where(['Events.published' => 1, 'DATE(Events.start_date) >' => $today])->order(['Events.start_date' => 'ASC'])->limit(3)->offset($this->request->getData()['offset'])->all();
			echo json_encode(array("status" => "success", "data" => $events));
			exit;

		}

	}

	/**
	 * Events Calendar method
	 *
	 * @param string|null $id Event location id.
	 * @return \Cake\Http\Response|null Redirects on successful Event calendar, renders view otherwise.
	 * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
	 */
	public function eventscal($id= null) {
		$pageTitle = 'Events';
		$this->viewBuilder()->setLayout('homelayout');
		$this->loadModel('Events');
		$today = date("Y-m-d");
		if(!empty($id)) {
		$events = $this->Events->find()->where(['Events.published' => 1, 'Events.location_id' => base64_decode($id)])->all();
		} else {
		$events = $this->Events->find()->where(['Events.published' => 1])->all();	
		}
		foreach ($events as $event) {
			$json[] = array(

				'title' => $event->event_name,
				'start' => $event->start_date,
				'end' => $event->end_date,
			);
		}
		$this->set('json', json_encode($json));
		$this->set('_serialize', ['json']);
		$this->set(compact('pageTitle', 'events'));
	}

	/**
	 * Members method
	 *
	 * @return \Cake\Http\Response|null
	 */
	public function eventdetails($id = null) {
		$pageTitle = 'Event Details';
		$this->viewBuilder()->setLayout('homelayout');
		$this->loadModel('EventRegistrations');
		$this->loadModel('Events');
		$eventid = base64_decode($id);
		$events = $this->Events->get($eventid, [
			'contain' => ['EventRegistrations' => function ($q) {
				return $q->where(['EventRegistrations.user_id' => $this->Auth->User('id'),'EventRegistrations.is_cancelled <>' => 1]);
			}, 'Attires', 'Users' => ['UserProfiles']],
		]);
		$attires = $this->Events->Attires->find('list', ['keyField' => 'id', 'valueField' => 'attire_name']);
		
		$registeredcount = $this->EventRegistrations->find()->contain(['EventRegistrationGuests'=> function($q){															  $q->select([											 					'EventRegistrationGuests.event_registration_id',
																					'total'=> $q->func()->count('EventRegistrationGuests.id')])
																		->group(['EventRegistrationGuests.event_registration_id']);
																		return $q;
																		}])->where(['event_id' => $eventid , 'is_cancelled' => 0])->all();
		 $totalCount = 0;
		foreach($registeredcount as $registered){
			$totalCount += 1;
			if(!empty($registered->event_registration_guests)){
				$totalCount += $registered->event_registration_guests[0]->total;
			}
		}
		$this->set(compact('pageTitle', 'events', 'attires','totalCount'));

	}

	/**
	 * Event registration method
	 *
	 * @param string|null $id Event id.
	 * @return \Cake\Http\Response|null Redirects on successful Registration, renders view otherwise.
	 * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
	 */
	public function eventregister($id = null) {
		$pageTitle = 'Event Register';
		$this->viewBuilder()->setLayout('homelayout');
		$this->loadModel('Events');
		$events = $this->Events->get($id, [
			'contain' => ['EventRegistrations'],
		]);

		$this->set(compact('pageTitle', 'events'));
	}

	/**
	 * About Us method
	 *
	 * @return \Cake\Http\Response|null
	 */
	public function aboutUs() {

		$pageTitle = 'About Us';
		$this->viewBuilder()->setLayout('homelayout');
		$this->set(compact('pageTitle'));

	}

	/**
	 * member profile method
	 *
	 * @return \Cake\Http\Response|null Redirects on successful Profile, renders view otherwise.
	 * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
	 */
	public function profile() {
		$pageTitle = 'Member Profile';
		$this->viewBuilder()->setLayout('homelayout');
		$this->loadModel('States');
		$this->loadModel('Transactions');
		$this->loadModel('EventRegistrations');
		$user = $this->Users->get($this->Auth->User('id'), ['contain' => ['Roles', 'UserProfiles']]);

	
		if ($this->request->is(['patch', 'post', 'put'])) {
			$data = $this->request->getData();
			$data['user_profile']['dob'] = date('Y-m-d', strtotime($data['user_profile']['dob']));
			if (!empty($data['user_profile']['profile_image']['name'])) {
				$file = $data['user_profile']['profile_image']; //put the  data into a var for easy use
				$ext = substr(strtolower(strrchr($file['name'], '.')), 1); //get the extension
				$arr_ext = array('jpg', 'jpeg', 'gif', 'png', 'PNG', 'JPG', 'JPEG', 'GIF'); //set allowed extensions
				if (in_array($ext, $arr_ext)) {
					if ($file['size'] > 2000000) {
						$this->Flash->error('Maximum 2 MB file size allowed.');
					}
					//do the actual uploading of the file. First arg is the tmp name, second arg is
					//where we are putting it
					if (move_uploaded_file($file['tmp_name'], WWW_ROOT . 'files' . DS . 'member-profile' . DS . 'profile_image_' . $file['name'])) {
						//prepare the filename for database entry
						$data['user_profile']['profile_image'] = 'profile_image_' . $file['name'];
					}
				}
			} else {
				$data['user_profile']['profile_image'] = $user->user_profile->profile_image;
			}

			$userProfile = $this->Users->patchEntity($user, $data, [
				'associated' => [
					'UserProfiles']]);

			if ($this->Users->save($userProfile)) {
				$this->Flash->success(__('The user profile has been saved.'), ['key' => 'update_profile']);

				return $this->redirect(['action' => 'profile']);
			}
			$this->Flash->error(__('The user profile could not be saved. Please, try again.'), ['key' => 'update_profile']);

		}
		$states = $this->States->find('list', ['keyField' => 'id', 'valueField' => 'state_name'])->toArray();

		$transactions = $this->Transactions
			->find()
			->where(['user_id =' => $this->Auth->User('id')])
			->order(['created' => 'DESC']);

		$eventRegistrations = $this->EventRegistrations->find()->contain(['Events'])->where(['EventRegistrations.user_id' => $this->Auth->User('id'), 'EventRegistrations.is_cancelled <>' => 1])->all();
		
		$this->set(compact('pageTitle', 'user', 'states', 'transactions', 'eventRegistrations'));

	}

	/**
	 * Cancel Event method
	 *
	 * @param string|null $id Event id.
	 * @return \Cake\Http\Response|null Redirects on successful cancel Event, renders view otherwise.
	 * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
	 */
	public function cancelEvent($id = null) {

		$this->autoRender = false;
		$this->viewBuilder()->setLayout(false);
		$this->loadModel('Users');
		$this->loadModel('Events');
		$this->loadModel('Transactions');
		$this->loadModel('EventRegistrations');
		$this->loadModel('EmailTemplates');

		$user = $this->Users->get($this->Auth->User('id'), ['contain' => ['UserProfiles']]);

		$transaction = $this->Transactions->newEntity();

		if ($this->request->is(['patch', 'post', 'put'])) {

			$data = $this->request->getData();
			$newdata = array();
			$newdata['event_id'] = $data['event_id'];
			$newdata['amount_paid'] = $data['event_fee'] * $data['quantity'];
			$newdata['payment_status'] = 'refund';
			$newdata['user_id'] = $this->Auth->User('id');
			$newdata['transaction_date'] = date('Y-m-d H:i:s');

			$transaction = $this->Transactions->patchEntity($transaction, $newdata);

			if ($this->Transactions->save($transaction)) {
				$eventregistration = $this->EventRegistrations->get($id);
				$eventregistration->is_cancelled = 1;
				$this->EventRegistrations->save($eventregistration);

				$data['user_profile']['credit_balance'] = $user->user_profile->credit_balance + $newdata['amount_paid'];
				$userProfile = $this->Users->patchEntity($user, $data);
				$this->Users->save($user);

				// event cancellation email

				$logo = "<img src=".Configure::read('site_url')."/img/logo.png>";
				$emailTemplate = $this->EmailTemplates->get(11);

				$event = $this->Events->find()->where(['Events.id' => $data['event_id']])->first();

				$to = $user->email;

				$template = str_replace(array('{LOGO}', '{FIRST_NAME}', '{EVENT_NAME}', '{START_DATE}', '{EVENT_COST}'), array($logo, $user->user_profile->first_name, $event->event_name, date('M d, Y', strtotime($event->start_date)), '$' . $newdata['amount_paid']), $emailTemplate->template_body);

				$send_email = $this->Email->sendEmail($to, $emailTemplate->subject, $template);
				// end event cancellation email

				$this->Flash->success(__('The event has been cancelled'));
				return $this->redirect(['action' => 'profile']);

			}
			$this->Flash->error(__('Data could not be saved. Please, try again.'));

		}
	}

	/**
	 * Gallery method
	 *
	 * @return \Cake\Http\Response|null Redirects on successful gallery view, renders view otherwise.
	 * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
	 */
	public function gallery() {
		$pageTitle = 'Gallery';
		$this->viewBuilder()->setLayout('homelayout');
		$this->loadModel('Images');
		$galleries = $this->Images->find('all', ['order' => ['created' => 'DESC']])->toArray();
		$this->set(compact('pageTitle', 'galleries'));
	}

	/**
	 * Event ethod
	 *
	 * @return \Cake\Http\Response|null Redirects on successful Event list, renders view otherwise.
	 * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
	 */
	public function event() {
		$pageTitle = 'Events';
		$this->viewBuilder()->setLayout('homelayout');
		$this->set(compact('pageTitle'));
	}

	/**
	 * Travel Event method
	 *
	 * @param string|null $id Event Registration id.
	 * @return \Cake\Http\Response|null Redirects on successful travel event list, renders view otherwise.
	 * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
	 */
	public function travel() {
		$pageTitle = 'Travel';
		$this->viewBuilder()->setLayout('homelayout');
		$this->loadModel('Travels');
		$this->loadModel('Galleries');
		$this->paginate = [
			'limit' => 3,
			'order' => ['Travels.created' => 'DESC'],
		];
		$travels = $this->paginate($this->Travels);
		$galleries = $this->Galleries->Images
			->find()
			->where(['gallery_id =' => 28])
			->limit(4)
			->order(['created' => 'DESC']);
		$this->set(compact('pageTitle', 'galleries', 'travels'));
	}
	

	/**
	 * lead Submission method
	 *
	 * @return \Cake\Http\Response|null Redirects on successful lead submission, renders view otherwise.
	 * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
	 */
	public function ajaxLeadSubmission() {
		$this->autoRender = false;
		$this->loadModel('Leads');
		$this->loadModel('LeadSources');
		$this->loadModel('Locations');
		$this->loadModel('EmailTemplates');
		
		
		if ($this->request->is('ajax')) {
			$data = $this->request->getData();
			$leadData = $this->Leads->find()->where(['lead_email' => $data['lead_email']])->first();
			if (empty($leadData)) {
				$lead = $this->Leads->newEntity();
				$data['lead_status_id'] = 1;
				$data['lead_type_id'] = 1;
				$lead = $this->Leads->patchEntity($lead, $data);
				
				$emailTemplate = $this->EmailTemplates->get(16);
				$location = $this->Locations->find('list', ['keyField' => 'id', 'valueField' => 'location_name'])->where(['id' => $data['location_id']])->first();
				$leadsource = $this->LeadSources->find('list', ['keyField' => 'id', 'valueField' => 'source_name'])->where(['id' => $data['lead_source_id']])->first();
				if ($this->Leads->save($lead)) {
				
				$to = Configure::read('admin_email');
				$subject= $emailTemplate->subject;
				$logo = "<img src=".Configure::read('site_url')."/img/logo.png>";
		
				$emailtemplate = str_replace(array('{LOGO}', '{LEAD_NAME}', '{LEAD_EMAIL}', '{LEAD_PHONE}', '{LEAD_LOCATION}', '{LEAD_SOURCE}'), array($logo, $data['lead_name'], $data['lead_email'], $data['lead_phone'], $location, $leadsource), $emailTemplate->template_body);
				 
				try {
					$email = new Email();
					$email->setProfile('mailgun')
						->setFrom(['noreply@intheloopsingles.com' => 'IntheloopSingles'])
						->setTo($to)
						->setEmailFormat('both')
						->setSubject($subject)
						->send($emailtemplate);
				} catch (\Exception $e) {
					echo 'Exception : ', $e->getMessage(), "\n";
				}
					
				echo json_encode(array('status' => 'success'));
				exit;
					
				} else {
					echo json_encode(array('status' => 'error', 'message' => 'Error occured. Please try again.'));
					exit;
				}
			} else {
				echo json_encode(array('status' => 'error', 'message' => 'Email already exist. please try again with unique email.'));
				exit;
			}
		}
	}

	/**
	 * Change staff Status method
	 *
	 * @return \Cake\Http\Response|null Redirects on successful change staff status, renders view otherwise.
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
	 * Change Member Status method
	 *
	 * @return \Cake\Http\Response|null Redirects on successful change member status, renders view otherwise.
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
	 * Forgot Password method
	 *
	 * @return \Cake\Http\Response|null Redirects on successful sent forgot password link, renders view otherwise.
	 * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
	 */
	public function forgotPassword() {
		$this->autoRender = false;
		$pageTitle = 'Forgot Password';
		
		
		if ($this->request->is('post')) {
			$this->loadModel('Users');
			$this->loadModel('EmailTemplates');
			$mail = $this->request->getData()['email'];
			
			$user = $this->Users->findByEmail($this->request->getData()['email'])->first();
			
			if (!empty($user)) {
				$resetToken = bin2hex(random_bytes(32));

				$user->forgot_password_key = $resetToken;
				$save = $this->Users->save($user);
				
				$userDetail = $this->Users->UserProfiles->findByUserId($user->id)->first();

				$emailTemplate = $this->EmailTemplates->get(14);
				$subject = $emailTemplate->subject;
				
				$logo = "<img src=".Configure::read('site_url')."/img/logo.png>";
				$site_url= Configure::read('site_url');
				$link = '<a href=" ' . $site_url . '/users/reset-password/' . $resetToken . '">Click to Reset Password</a>';
				$url =  $site_url."/users/reset-password/" . $resetToken;

				$emailtemplate = str_replace(array('{LOGO}', '{LINK}', '{URL}'), array($logo, $link, $url), $emailTemplate->template_body);
			
				$email = new Email();
				$email->setProfile('mailgun')
					->setFrom(['noreply@intheloopsingles.com' => 'IntheLoopSingles'])
					->setTo($mail)
					->setEmailFormat('both')
					->setSubject($subject)
					->send($emailtemplate);

				$this->Flash->success('Reset password link sent to your email.');
				return $this->redirect(['action' => 'login']);
			} else {
				$this->Flash->error(__('No user found assosciated with entered email'));
				return $this->redirect(['action' => 'login']);
			}
		}
		$this->set(compact('pageTitle'));
	}

	/**
	 * Reset password method
	 *
	 * @param string|null $token reset password token.
	 * @return \Cake\Http\Response|null Redirects on successful reset password, renders view otherwise.
	 * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
	 */
	public function resetPassword($token) {
		$pageTitle = 'Create New password';
		$this->viewBuilder()->setLayout('homelayout');
		if ($this->request->is(['patch', 'post', 'put'])) {
			$user = $this->Users->findByForgotPasswordKey($token)->first();

			if (empty($user)) {
				$this->Flash->error('UnAuthorised Hit. Please try with valid link');
			} else {

				if ($this->request->getData()['password'] == $this->request->getData()['confirm_password']) {
					$users = $this->Users->patchEntity($user, $this->request->getData());
					if ($this->Users->save($user)) {
						$this->Flash->success('Your password has been changed successfully');
						$this->redirect(['action' => 'login']);
					} else {
						$this->Flash->error('Something went wrong, Please try after sometime');
					}
				} else {
					$this->Flash->error('Password and Confirm password should be same');
				}
			}
		}
		$this->set(compact('pageTitle'));
	}

	/**
	 * Change email method
	 *
	 * @return \Cake\Http\Response|null Redirects on successful change member email, renders view otherwise.
	 * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
	 */
	public function changeEmail() {

		$user = $this->Users->get($this->Auth->user('id')); // auth acts as session and it has id which matches the login user id and then changes password for that user
		if ($this->request->is('post')) {

			$user = $this->Users->patchEntity($user, [
				'check_password' => $this->request->getData()['check_password'],
				'email' => $this->request->getData()['email'],
			],
				['validate' => 'email']
			);

			if (!empty($user->errors())) {
				if ($user->errors('check_password')) {

					$this->Flash->error($user->errors('check_password')['custom'], ['key' => 'old_password_error']);

				}

				if ($user->errors('email')) {
					$this->Flash->error($user->errors('email')['match'], ['key' => 'duplicate_email']);
				}

				$this->redirect(['action' => 'profile']);
			} else {
				if ($this->Users->save($user)) {
					$this->Flash->success('The Email is successfully changed');
					$this->redirect(['action' => 'profile']);
				} else {
					$this->Flash->error('There was an error during the save!');
					$this->redirect(['action' => 'profile']);
				}
			}

		}
		$this->set(compact('user'));
	}

	/**
	 * Thank you Seattle method
	 *
	 * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
	 */
	public function thankYouSeattle() {
		$pageTitle = 'Thank you';
		$this->viewBuilder()->setLayout('homelayout');
		$this->set(compact('pageTitle'));
	}

	/**
	 * Thank You Austin method
	 *
	 * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
	 */
	public function thankYouAustin() {
		$pageTitle = 'Thank you';
		$this->viewBuilder()->setLayout('homelayout');
		$this->set(compact('pageTitle'));
	}

	/**
	 * Thank You Denver method
	 *
	 * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
	 */
	public function thankYouDenver() {
		$pageTitle = 'Thank you';
		$this->viewBuilder()->setLayout('homelayout');
		$this->set(compact('pageTitle'));
	}

	/**
	 * Stories List method
	 *
	 * @return \Cake\Http\Response|null Redirects on successful stories list, renders view otherwise.
	 * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
	 */
	public function stories() {
		$pageTitle = 'Stories';
		$this->viewBuilder()->setLayout('homelayout');
		$this->loadModel('Stories');
		$this->loadModel('Galleries');
		$this->paginate = [
			'limit' => 5,
			'order' => ['Stories.created' => 'DESC'],
		];

		$stories = $this->paginate($this->Stories);
		$galleries = $this->Galleries->Images
			->find()
			->where(['gallery_id =' => 26])
			->limit(4)
			->order(['created' => 'DESC']);
		$this->set(compact('pageTitle', 'stories', 'galleries'));

	}

}
