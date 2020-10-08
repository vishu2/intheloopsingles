<?php
namespace App\Controller\Admin\Denver;

use App\Controller\Admin\AppController;
use Cake\Core\Configure;

/**
 * Events Controller
 *
 * @property \App\Model\Table\EventsTable $Events
 *
 * @method \App\Model\Entity\Event[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class EventsController extends AppController {
	
	public function initialize()
    {
		parent::initialize();
        $this->loadComponent('Email');
		$this->loadComponent('Sms');
    } 
	
	/**
	 * Index method
	 *
	 * @return \Cake\Http\Response|null
	 */
	public function index() {

		$pageTitle = 'Events';
		$paginateArray = [];
		$conditions = [];
		if ($this->request->is('get')) {

			if (isset($this->request->getQuery()['action'])) {

				if (!empty($this->request->getQuery()['name']) && $this->request->getQuery()['name'] != '') {
					$data = $this->request->getQuery()['name'];
					$datan = trim($data);
					$conditions[] = array('Events.event_name LIKE' => '%' . $datan . '%');
				}
				

			} else {
			}
		}
		$query = $this->Events->find('all', ['contain' => ['Attires', 'Vendors', 'Locations',
								'EventRegistrations' => function($q) {
								    $q->select([
								         'EventRegistrations.event_id',
								         'total' => $q->func()->count('EventRegistrations.user_id')
								    ])->group('EventRegistrations.event_id', 'EventRegistrations.user_id');
								    return $q;
								}], 'conditions' => ['And' => $conditions, 'location_id' => 2]])->order(['Events.created' => 'DESC']);

		$events = $this->paginate($query);
		
		$this->set(compact('pageTitle', 'events'));
	}
	
	/**
	 * Add Guest member method
	 *
	 * @return \Cake\Http\Response|null Redirects to index.
	 * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
	 */
	public function addguest() {
		$this->loadModel('EventRegistrations');
		if ($this->request->is('post')) {	
			$data = $this->request->getData();
			$eventRegistration = $this->EventRegistrations->get($data['event_registration_id'], ['contain' => ['EventRegistrationGuests']]);
			$guestRegistrations = $this->EventRegistrations->patchEntity($eventRegistration, $data);
			if ($this->EventRegistrations->save($guestRegistrations)) {
				$this->Flash->success(__('The event registration has been saved.'));
				return $this->redirect(['action' => 'registered', base64_encode($eventRegistration->event_id)]);
			}
			$this->Flash->error(__('The event registration could not be saved. Please, try again.'));
		}
		$this->set(compact('eventRegistration', 'events', 'users'));
	}
	/**
	 * View method
	 *
	 * @param string|null $id Event id.
	 * @return \Cake\Http\Response|null
	 * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
	 */
	public function view($id = null) {
		$event = $this->Events->get($id, [
			'contain' => ['Attires', 'Vendors', 'Locations', 'EventRegistrations', 'Transactions'],
		]);

		$this->set('event', $event);
	}

	/**
	 * Event Detail method
	 *
	 * @param string|null $id Event id.
	 * @return \Cake\Http\Response|null Redirects to index.
	 * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
	 */
	public function eventdetails($id = null) {
		

		$this->autoRender = false;
		$session = $this->getRequest()->getSession();
		$adminData = $session->read('Auth.Admin');
		$session->write('Auth.User', $adminData);
		return $this->redirect(['prefix' => false, 'controller' => 'users', 'action' => 'eventdetails', $id]);
	}
	/**
	 * Add method
	 *
	 * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
	 */
	public function add() {
		$pageTitle = 'Add Event'; 
		$this->loadModel('Users');
		$this->loadModel('UserProfiles');
		$event = $this->Events->newEntity();

		if ($this->request->is('post')) {

			// insert image
			$data = $this->request->getData();
			if($data['cancelled']==1) { $data['published'] = 0;  }
			if ($data['event_cost'] <= 10.00) { $data['event_color'] = 'rgb(29, 156, 64)'; }
			$data['location_id'] = 2;
			
			$data['start_date'] = date('Y-m-d H:i:s', strtotime($data['start_date']));
			if (!empty($data['end_date'])) {
				$data['end_date'] = date('Y-m-d H:i:s', strtotime($data['end_date']));

			}

			if (!empty($data['registration_close_date'])) {
				$data['registration_close_date'] = date('Y-m-d H:i:s', strtotime($data['registration_close_date']));

			}
			if (!empty($data['cancellation_date'])) {
				$data['cancellation_date'] = date('Y-m-d', strtotime($data['cancellation_date']));
			}
			if (!empty($data['event_photo']['name'])) {
				$file = $data['event_photo']; //put the  data into a var for easy use
				$ext = substr(strtolower(strrchr($file['name'], '.')), 1); //get the extension
				$arr_ext = array('jpg', 'jpeg', 'gif', 'png', 'PNG', 'JPG', 'JPEG', 'GIF'); //set allowed extensions
				if (in_array($ext, $arr_ext)) {
					if ($file['size'] > 2000000) {
						$this->Flash->error('Maximum 2 MB file size allowed.');
					}
					//do the actual uploading of the file. First arg is the tmp name, second arg is
					//where we are putting it
					if (move_uploaded_file($file['tmp_name'], WWW_ROOT . 'files' . DS . 'event-photo' . DS . 'event_photo_' . $file['name'])) {
						//prepare the filename for database entry
						$data['event_photo'] = 'event_photo_' . $file['name'];
					}
				}
			}
			//  image insert

			$event = $this->Events->patchEntity($event, $data);

			if ($this->Events->save($event)) {
				$this->Flash->success(__('The event has been saved.'));

				return $this->redirect(['action' => 'index']);
			}
			$this->Flash->error(__('The event could not be saved. Please, try again.'));
		}
		$attires = $this->Events->Attires->find('list', ['keyField' => 'id', 'valueField' => 'attire_name']);
		$vendors = $this->Events->Vendors->find('list', ['keyField' => 'id', 'valueField' => 'vendor_name']);
		$locations = $this->Events->Locations->find('list', ['keyField' => 'id', 'valueField' => 'location_name']);
		$users = $this->Users->find('list', ['keyField' => 'id', 'valueField' => 'id'])->where(['Users.role_id IN' => [1,2], 'Users.status' => 1])->toArray();
		$leaders = $this->UserProfiles->find('list', ['keyField' => 'user_id', 'valueField' => 'first_name'])->where(['user_id IN ' => $users])->toArray();
		$this->set(compact('pageTitle', 'event', 'attires', 'vendors', 'locations','leaders'));
	}

	/**
	 * Registered Members method
	 *
	 * @param string|null $id Event id.
	 * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
	 * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
	 */
	public function registered($id = null) {
		$pageTitle = 'Registered Users Detail';
		$this->loadModel('Users');
		$this->loadModel('EventRegistrations');
		$this->loadModel('EventRegistrationGuests');
		$eventid = base64_decode($id);
		$events = $this->Events->find()->contain(['EventRegistrations' => [
			'queryBuilder' => function ($q) {
				return $q->where(['EventRegistrations.is_hide <>' => 1]); // Full conditions for filtering
			}, 'EventRegistrationGuests', 'UsersStaff', 'Users' => ['UserProfiles']]])->where(['Events.id' => $eventid])->first();
		
		$registeredcount = $this->EventRegistrations->find()->contain(['EventRegistrationGuests' => function ($q) {
			$q->select(['EventRegistrationGuests.event_registration_id',
				'total' => $q->func()->count('EventRegistrationGuests.id')])
				->group(['EventRegistrationGuests.event_registration_id']);
			return $q;
		}])->where(['event_id' => $eventid, 'is_cancelled' => 0])->all();
		$totalCount = 0;
		foreach ($registeredcount as $registered) {
			$totalCount += 1;
			if (!empty($registered->event_registration_guests)) {
				$totalCount += $registered->event_registration_guests[0]->total;
			}
		}
		$quantity = $this->EventRegistrations->find()->where(['OR' => [['cancellation_status' => 1, 'event_id' => $eventid, 'comp <>' => 1, 'is_cancelled <>' => 0], ['event_id' => $eventid, 'comp <>' => 1, 'is_cancelled <>' => 1]]])->sumOf('quantity');

		$refund = $this->EventRegistrations->find()->where(['event_id' => $eventid, 'is_cancelled <>' => 0, 'cancellation_status' => 2, 'comp <>' => 1])->sumOf('quantity');

		$this->set(compact('pageTitle', 'events', 'registeredcount', 'quantity', 'totalCount','refund'));
	}

	/**
	 * Register Member method
	 *
	 * @param string|null $id Member id.
	 * @return \Cake\Http\Response|null Redirects to index.
	 * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
	 */
	public function registerMember($id = null) {

		$pageTitle = 'Register Member';
		$this->autoRender = false;
		$this->viewBuilder()->setLayout(false);
		$eventid = base64_decode($id);
		$this->loadModel('EventRegistrations');
		$this->loadModel('Transactions');
		$this->loadModel('Users');
		$this->loadModel('EmailTemplates');
		
		$event = $this->Events->get($eventid);

		if ($this->request->is('post')) {
			
			if ($this->request->getData()['mode'] == 'complimentary') {
				$user = $this->Users->get($this->request->getData()['user_id'], ['contain' => ['UserProfiles']]);
				$eventRegistration = $this->EventRegistrations->newEntity();
				$data['user_id'] = $this->request->getData()['user_id'];
				$data['event_id'] = $eventid;
				$data['status'] = 1;
				$data['is_cancelled'] = 0;
				$data['quantity'] = 1;
				$data['comp'] = 1;

				$eventRegistration = $this->EventRegistrations->patchEntity($eventRegistration, $data);

				if ($this->EventRegistrations->save($eventRegistration)) {
					
					$emailTemplate = $this->EmailTemplates->get(9);
					$to = $user->email;
					$subject= $emailTemplate->subject;
					$event_date = date('m/d/Y', strtotime($event->start_date));
					$event_time= date('h:i A', strtotime($event->start_date));
					$event_location = $event->venue_name . ', ' . $event->venue_address . ', ' . $event->venue_address2;
					$event_fee = '$' . $event->event_fee;
					$logo = "<img src=".Configure::read('site_url')."/img/logo.png>";
					$template = str_replace(array('{LOGO}', '{EVENT_NAME}', '{EVENT_DATE}', '{EVENT_TIME}', '{EVENT_LOCATION}', '{EVENT_FEE}'), array($logo, $event->event_name, $event_date, $event_time,$event_location, $event_fee), $emailTemplate->template_body);

					$send_email = $this->Email->sendEmail($to,$subject,$template);
					
					$this->Flash->success(__('The event registration Successful.'));
					return $this->redirect(['controller' => 'Events', 'action' => 'registered', $id]);

				} else {
					$this->Flash->error(__('The event registration could not be saved. Please, try again.'));
					return $this->redirect(['controller' => 'events', 'action' => 'registered', $id]);
				}
			} else if ($this->request->getData()['mode'] == 'credit') {
				$user = $this->Users->get($this->request->getData()['user_id'], ['contain' => ['UserProfiles']]);
				if ($user->user_profile->credit_balance > $this->request->getData()['event_fee']) {

					$eventRegistration = $this->EventRegistrations->newEntity();
					$data['user_id'] = $this->request->getData()['user_id'];
					$data['event_id'] = $eventid;
					$data['status'] = 1;
					$data['is_cancelled'] = 0;
					$data['quantity'] = 1;

					$eventRegistration = $this->EventRegistrations->patchEntity($eventRegistration, $data);

					if ($this->EventRegistrations->save($eventRegistration)) {

						$transaction = $this->Transactions->newEntity();

						$transactionData['user_id'] = $this->request->getData()['user_id'];
						$transactionData['amount_paid'] = $this->request->getData()['event_fee'];
						$transactionData['payment_status'] = 'paid';
						$transactionData['payment_type'] = 3;
						$transactionData['transaction_date'] = date('Y-m-d H:i:s');
						$transactionData['event_id'] = $eventid;

						$transactionSave = $this->Transactions->patchEntity($transaction, $transactionData);
						$this->Transactions->save($transactionSave);

						$newdata['user_profile']['credit_balance'] = $user->user_profile->credit_balance - $this->request->getData()['event_fee'];
						$userProfile = $this->Users->patchEntity($user, $newdata);
						$this->Users->save($user);
						
						$emailTemplate = $this->EmailTemplates->get(9);
						$to = $user->email;
						$subject= $emailTemplate->subject;
						$event_date = date('m/d/Y', strtotime($event->start_date));
						$event_time= date('h:i A', strtotime($event->start_date));
						$event_location = $event->venue_name . ', ' . $event->venue_address . ', ' . $event->venue_address2;
						$event_fee = '$' . $event->event_fee;
						$logo = "<img src=".Configure::read('site_url')."/img/logo.png>";
						$template = str_replace(array('{LOGO}', '{EVENT_NAME}', '{EVENT_DATE}', '{EVENT_TIME}', '{EVENT_LOCATION}', '{EVENT_FEE}'), array($logo, $event->event_name, $event_date, $event_time, $event_location, $event_fee), $emailTemplate->template_body);
						$send_email = $this->Email->sendEmail($to,$subject,$template);						
						
						$this->Flash->success(__('The event registration Successful.'));
						return $this->redirect(['controller' => 'events', 'action' => 'registered', $id]);
					} else {

						$this->Flash->error(__('The event registration could not be saved. Please, try again.'));
						return $this->redirect(['controller' => 'events', 'action' => 'registered', $id]);

					}

				} else {

					$this->Flash->error(__('Not enough credit balance for registration.'));
					return $this->redirect(['controller' => 'events', 'action' => 'registered', $id]);

				}

			} else if ($this->request->getData()['mode'] == 'card') {

				try {
					//pr($this->request->getData()['payment']); die;
					\Stripe\Stripe::setApiKey('sk_test_Z52CUWVN2Otn2VzVSDMfJl2k');
					//\Stripe\Stripe::setApiKey(Configure::read('denver_secretkey'));
					// Create the PaymentIntent
					$intent = \Stripe\PaymentIntent::create([
						'amount' => $this->request->getData()['event_fee'] * 100,
						'currency' => 'usd',
						'payment_method' => $this->request->getData()['payment'],

						'confirm' => true,

						'error_on_requires_action' => true,
					]);

					if ($intent->status == 'succeeded') {
						$user = $this->Users->get($this->request->getData()['user_id'], ['contain' => ['UserProfiles']]);
						$transaction = $this->Transactions->newEntity();
						$transactionData['user_id'] = $this->request->getData()['user_id'];
						$transactionData['stripe_charge_id'] = $intent->charges->data[0]['id'];
						$transactionData['amount_paid'] = $intent->charges->data[0]['amount'];
						$transactionData['payment_status'] = $intent->charges->data[0]['status'];
						$transactionData['payment_type'] = 3;
						$transactionData['transaction_date'] = date('Y-m-d H:i:s', $intent->charges->data[0]['created']);
						$transactionData['event_id'] = $eventid;
						$transactionSave = $this->Transactions->patchEntity($transaction, $transactionData);
						//pr($transactionSave); die;
						if ($this->Transactions->save($transactionSave)) {

							$eventRegistration = $this->EventRegistrations->newEntity();
							$data['user_id'] = $this->request->getData()['user_id'];
							$data['event_id'] = $eventid;
							$data['status'] = 1;
							$data['is_cancelled'] = 0;
							$data['quantity'] = 1;

							$eventRegistration = $this->EventRegistrations->patchEntity($eventRegistration, $data);
							//pr($eventRegistration); die;
							if ($this->EventRegistrations->save($eventRegistration)) {

								$emailTemplate = $this->EmailTemplates->get(9);
								$to = $user->email;
								$subject= $emailTemplate->subject;
								$event_date = date('m/d/Y', strtotime($event->start_date));
								$event_time= date('h:i A', strtotime($event->start_date));
								$event_location = $event->venue_name . ', ' . $event->venue_address . ', ' . $event->venue_address2;
								$event_fee = '$' . $event->event_fee;
								$logo = "<img src=".Configure::read('site_url')."/img/logo.png>";
								$template = str_replace(array('{LOGO}', '{EVENT_NAME}', '{EVENT_DATE}', '{EVENT_TIME}', '{EVENT_LOCATION}', '{EVENT_FEE}'), array($logo, $event->event_name, $event_date, $event_time, $event_location, $event_fee), $emailTemplate->template_body);
								$send_email = $this->Email->sendEmail($to,$subject,$template);	

								$this->Flash->success(__('The event registration Successful.'));
								return $this->redirect(['controller' => 'events', 'action' => 'registered', $id]);
							}
						}
					} else {

						echo json_encode(['error' => 'Invalid PaymentIntent status']);
					}
				} catch (\Stripe\Exception\ApiErrorException $e) {
					$this->Flash->error(__($e->getMessage()));
					return $this->redirect(['controller' => 'events', 'action' => 'registered', $id]);
				}

			}
		}

		$this->set(compact('pageTitle'));
	}
	
	/**
	 * Show Member method
	 *
	 * @param string|null $id member id.
	 * @return \Cake\Http\Response|null Redirects to index.
	 * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
	 */
	public function showMember($id = null) {
		$this->autoRender = false;
		$this->loadModel('Users'); 
		$this->loadModel('EventRegistrations'); 
		if ($this->request->is('ajax')) {
	
		//$registeredEvents = $this->EventRegistrations->find()->select(['user_id'])->where(['event_id' => $id])->enableHydration(false)->toList();
		$registeredEvents=$this->EventRegistrations->find('list', ['keyField' => 'id', 'valueField' => 'user_id'])->where(['event_id' => $id, 'is_cancelled' => 0])->toArray();
		if(!empty($registeredEvents)){
			 $query = $this->Users->find()->select(['Users.id', 'UserProfiles.first_name', 'UserProfiles.last_name', 'UserProfiles.mobile'])->contain(['UserProfiles'])->where(['Users.role_id ' => 3, 'Users.id NOT IN' => $registeredEvents]);
		
		}else{
				$query = $this->Users->find()->select(['Users.id', 'UserProfiles.first_name', 'UserProfiles.last_name', 'UserProfiles.mobile'])->contain(['UserProfiles'])->where(['Users.role_id ' => 3]);
		} 
		$users = $query->toList();
		
		echo json_encode(array('status' => 'success', 'userData' =>$users)); 
		exit;
		}	
		
	}
	
	/**
	 * Cancel Event method
	 *
	 * @param string|null $id Event id, $userid, $eventid.
	 * @return \Cake\Http\Response|null Redirects to index.
	 * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
	 */
	public function cancelEvent($id = null, $userid = null, $eventid = null) {

		$this->autoRender = false;
		$this->viewBuilder()->setLayout(false);
		$this->loadModel('Users');
		$this->loadModel('Transactions');
		$this->loadModel('EventRegistrations');
		$this->loadModel('EmailTemplates');
		$eventregid = base64_decode($id);
		$user_id = base64_decode($userid);
		$event_id = base64_decode($eventid);
		
		$user = $this->Users->get($user_id, ['contain' => ['UserProfiles']]);
		$events = $this->Events->get($event_id);
		if ($this->request->is(['patch', 'post', 'put'])) {
			
				$transaction = $this->Transactions->newEntity();
				$data = $this->request->getData();
				$newdata = array();
				$newdata['event_id'] = $event_id;
				$newdata['amount_paid'] = 0;
				$newdata['payment_status'] = 'refund';
				$newdata['payment_type'] = 3;
				$newdata['user_id'] = $user_id;
				$newdata['transaction_date'] = date('Y-m-d H:i:s');

				$transaction = $this->Transactions->patchEntity($transaction, $newdata);
				if ($this->Transactions->save($transaction)) {
					$eventregistration = $this->EventRegistrations->get($eventregid);
					$eventregistration->is_cancelled = 1;
					$eventregistration->cancelled_date = date('Y-m-d');
					$eventregistration->cancelled_by = $this->Auth->User('id');
					$eventregistration->cancellation_status = 1;
					$this->EventRegistrations->save($eventregistration);

					$this->Flash->success(__('Member Reg. has been cancelled from the event without refund.'));
					return $this->redirect(['action' => 'registered', $eventid]);

				}

				$this->Flash->error(__('Member Reg. has not been cancelled from the event. Please, try again.'));
			 
		}

	}
	
	/**
	 * Cancelled Event refund method
	 *
	 * @param string|null $id Event id, $userid, $eventid.
	 * @return \Cake\Http\Response|null Redirects to index.
	 * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
	 */
	public function cancelEventrefund($id = null, $userid = null, $eventid = null) {

		$this->autoRender = false;
		$this->viewBuilder()->setLayout(false);
		$this->loadModel('Users');
		$this->loadModel('Transactions');
		$this->loadModel('EventRegistrations');
		$this->loadModel('EmailTemplates');
		$eventregid = base64_decode($id);
		$user_id = base64_decode($userid);
		$event_id = base64_decode($eventid);
		
		$user = $this->Users->get($user_id, ['contain' => ['UserProfiles']]);
		$events = $this->Events->get($event_id);
		if ($this->request->is(['patch', 'post', 'put'])) {
			
				$transaction = $this->Transactions->newEntity();
				$data = $this->request->getData();
				$newdata = array();
				$newdata['event_id'] = $event_id;
				$newdata['amount_paid'] = ($events->event_fee) * ($events->quantity);
				$newdata['payment_status'] = 'refund';
				$newdata['payment_type'] = 3;
				$newdata['user_id'] = $user_id;
				$newdata['transaction_date'] = date('Y-m-d H:i:s');

				$transaction = $this->Transactions->patchEntity($transaction, $newdata);

				if ($this->Transactions->save($transaction)) {
					$eventregistration = $this->EventRegistrations->get($eventregid, ['contain' => ['EventRegistrationGuests']]);
					$eventregistration->is_cancelled = 1;
					$eventregistration->cancelled_date = date('Y-m-d');
					$eventregistration->cancelled_by = $this->Auth->User('id');
					$eventregistration->cancellation_status = 2;
					
					$this->EventRegistrations->save($eventregistration);
					$data['user_profile']['credit_balance'] = $user->user_profile->credit_balance + $newdata['amount_paid'];
					$userProfile = $this->Users->patchEntity($user, $data);
					$this->Users->save($user);

				
									 
					$this->Flash->success(__('Member Reg. has been cancelled from the event with refund.'));
					return $this->redirect(['action' => 'registered', $eventid]);

				}

				$this->Flash->error(__('Member Reg. has not been cancelled from the event. Please, try again.'));
		
		}

	}
	
	/**
	 * Hide Cancelled registration method
	 *
	 * @param string|null $id Event id.
	 * @return \Cake\Http\Response|null Redirects to index.
	 * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
	 */
	public function hide($id = null) {

		$this->autoRender = false;
		$this->viewBuilder()->setLayout(false);
		$this->loadModel('EventRegistrations');
		$eventregid = base64_decode($id);
		if ($this->request->is(['patch', 'post', 'put'])) {
			
				$eventregistration = $this->EventRegistrations->get($eventregid);			
					$data = $this->request->getData();
					$data['is_hide'] = 1;
					$eventregistration = $this->EventRegistrations->patchEntity($eventregistration, $data);				
					if ($this->EventRegistrations->save($eventregistration)) {
						$this->Flash->success(__('Cancelled event has been hidden.'));

						return $this->redirect(['action' => 'registered', base64_encode($eventregistration->event_id)]);
					} 
					$this->Flash->error(__('Unable to hide event. Please, try again.'));
	
		}

	}
	
	/**
	 * Send Email method
	 *
	 * @param string|null $id member id.
	 * @return \Cake\Http\Response|null Redirects to index.
	 * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
	 */
	public function sendEmail($id = null) {
		$this->autoRender = false;
		$this->viewBuilder()->setLayout(false);
		$this->loadModel('Events');
		$this->loadModel('Users');
		$this->loadModel('EventRegistrations');

		$events = $this->Events->get($id, [
			'contain' => ['EventRegistrations' => ['Users' => ['UserProfiles']]],
		]);
		foreach ($events->event_registrations as $k => $event_user) {

			if ($event_user->is_cancelled == 0) {
				$to = $event_user->user->email;
				$subject = $this->request->getData()['subject'];
				$emailtemplate = $this->request->getData()['template_body'];
				// $send_email = $this->Email->sendEmail($to,$subject,$emailtemplate);
			}
		}

		$this->set(compact('events'));
	}

	/**
	 * Send SMS method
	 *
	 * @param string|null $id member id.
	 * @return \Cake\Http\Response|null Redirects to index.
	 * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
	 */
	public function sendSms($id = null) {
		$this->autoRender = false;
		$this->viewBuilder()->setLayout(false);
		$this->loadModel('Events');
		$this->loadModel('Users');
		$this->loadModel('EventRegistrations');

		$events = $this->Events->get($id, [
			'contain' => ['EventRegistrations' => ['Users' => ['UserProfiles']]],
		]);

		foreach ($events->event_registrations as $k => $event_user) {

			if ($event_user->is_cancelled == 0) {
				$number = $event_user->user->user_profile->mobile;
				$smstemplate = $this->request->getData()['template_body'];
				// $send_sms = $this->Sms->sendSms($number,$smstemplate);
			}
		}

		$this->set(compact('events'));
	}
	
	/**
	 * Edit method
	 *
	 * @param string|null $id Event id.
	 * @return \Cake\Http\Response|null Redirects to index.
	 * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
	 */
	public function edit($id = null) {
		$pageTitle = 'Edit Event';
		$this->loadModel('Users');
		$this->loadModel('UserProfiles');
		$eventid = base64_decode($id);
		$event = $this->Events->get($eventid, [
			'contain' => ['Users'],
		]);

		if ($this->request->is(['patch', 'post', 'put'])) {
			$data = $this->request->getData();

			if ($data['cancelled'] == 1) {$data['published'] = 0;}
			if ($data['event_cost'] <= 10.00) { $data['event_color'] = 'rgb(29, 156, 64)'; }

			$data['start_date'] = date('Y-m-d H:i:s', strtotime($data['start_date']));
			if (!empty($data['end_date'])) {
				$data['end_date'] = date('Y-m-d H:i:s', strtotime($data['end_date']));

			}

			if (!empty($data['registration_close_date'])) {
				$data['registration_close_date'] = date('Y-m-d H:i:s', strtotime($data['registration_close_date']));

			}
			if (!empty($data['cancellation_date'])) {
				$data['cancellation_date'] = date('Y-m-d', strtotime($data['cancellation_date']));
			}
			if (!empty($data['event_photo']['name'])) {
				$file = $data['event_photo']; //put the  data into a var for easy use
				$ext = substr(strtolower(strrchr($file['name'], '.')), 1); //get the extension
				$arr_ext = array('jpg', 'jpeg', 'gif', 'png', 'PNG', 'JPG', 'JPEG', 'GIF'); //set allowed extensions
				if (in_array($ext, $arr_ext)) {
					if ($file['size'] > 2000000) {
						$this->Flash->error('Maximum 2 MB file size allowed.');
					}
					//do the actual uploading of the file. First arg is the tmp name, second arg is
					//where we are putting it
					if (move_uploaded_file($file['tmp_name'], WWW_ROOT . 'files' . DS . 'event-photo' . DS . 'event_photo_' . $file['name'])) {
						//prepare the filename for database entry
						$data['event_photo'] = 'event_photo_' . $file['name'];
					}
				}
			} else {
				$data['event_photo'] = $event->event_photo;
			}

			$event = $this->Events->patchEntity($event, $data);
			if ($this->Events->save($event)) {
				$this->Flash->success(__('The event has been saved.'));

				return $this->redirect(['action' => 'index']);
			}
			$this->Flash->error(__('The event could not be saved. Please, try again.'));
		}
		$attires = $this->Events->Attires->find('list', ['keyField' => 'id', 'valueField' => 'attire_name']);
		$vendors = $this->Events->Vendors->find('list', ['keyField' => 'id', 'valueField' => 'vendor_name']);
		$locations = $this->Events->Locations->find('list', ['keyField' => 'id', 'valueField' => 'location_name']);
		$users = $this->Users->find('list', ['keyField' => 'id', 'valueField' => 'id'])->where(['Users.role_id IN' => [1, 2], 'Users.status' => 1])->toArray();
		$leaders = $this->UserProfiles->find('list', ['keyField' => 'user_id', 'valueField' => 'first_name'])->where(['user_id IN ' => $users]);
		$this->set(compact('pageTitle', 'event', 'attires', 'vendors', 'locations', 'leaders'));
	}

	/**
	 * Delete method
	 *
	 * @param string|null $id Event id.
	 * @return \Cake\Http\Response|null Redirects to index.
	 * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
	 */
	public function delete($id = null) {
		$this->request->allowMethod(['post', 'delete']);
		$event = $this->Events->get($id);
		if ($this->Events->delete($event)) {
			$this->Flash->success(__('The event has been deleted.'));
		} else {
			$this->Flash->error(__('The event could not be deleted. Please, try again.'));
		}

		return $this->redirect(['action' => 'index']);
	}
}
