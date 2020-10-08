<?php
namespace App\Controller\Admin\Seattle;

use App\Controller\Admin\AppController;
use Cake\Core\Configure;
/**
 * Travels Controller
 *
 * @property \App\Model\Table\TravelsTable $Travels
 *
 * @method \App\Model\Entity\Travel[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TravelsController extends AppController {
	/**
	 * Index method
	 *
	 * @return \Cake\Http\Response|null
	 */
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
		$pageTitle = "Travel Events";
		$paginateArray = [];
		$conditions = [];
		if ($this->request->is('get')) {

			if (isset($this->request->getQuery()['action'])) {

				if (!empty($this->request->getQuery()['name']) && $this->request->getQuery()['name'] != '') {
					$data = $this->request->getQuery()['name'];
					$datan = trim($data);
					$conditions[] = array('Travels.travel_name LIKE' => '%' . $datan . '%');
					
				}
				//$paginateArray['conditions'] = ['AND' => $conditions];
			} 
			
		}
		$paginateArray['conditions'] = $conditions;
		
		$query = $this->Travels->find('all', ['contain' => ['Transactions',
								'TravelRegistrations' => function($q) {
								    $q->select([
								         'TravelRegistrations.travel_id',
								         'total' => $q->func()->count('TravelRegistrations.user_id')
								    ])->group('TravelRegistrations.travel_id', 'TravelRegistrations.user_id')->where(['TravelRegistrations.is_cancelled' => 0]);
								    return $q;
								}], 'conditions' => ['And' => $conditions , 'location_id' => 1]])->order(['Travels.created' => 'DESC']);
		$travels = $this->paginate($query);
		
		$this->set(compact('pageTitle', 'travels'));
	}

	/**
	 * View method
	 *
	 * @param string|null $id Travel id.
	 * @return \Cake\Http\Response|null
	 * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
	 */
	public function view($id = null) {
		$travel = $this->Travels->get($id, [
			'contain' => ['Locations', 'Transactions', 'TravelRegistrations'],
		]);

		$this->set('travel', $travel);
	}
		
	/**
	 * Registered Members method
	 *
	 * @param $id 
	 * @return \Cake\Http\Response|null Redirects on successful List, renders view otherwise.
	 * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
	 */	
	public function registered($id = null){
		
	$pageTitle = 'Attendee List';
	$this->loadModel('TravelRegistrations');
	$travelid = base64_decode($id);
	$travels = $this->Travels->get($travelid, [
		'contain' => [ 'TravelRegistrations'=>['UsersStaff','Users'=>['UserProfiles']]],
	]);	
	
	$registered = $this->TravelRegistrations->find()->where(['travel_id'=>$travelid, 'is_cancelled <>'=>1])->count();
	
	$amount_collected = $this->TravelRegistrations->find()->where(['OR' => [['cancellation_status' => 1 ,'travel_id' => $travelid, 'comp <>' => 1,'is_cancelled <>'=> 0] ,['travel_id' => $travelid, 'comp <>' => 1,'is_cancelled <>'=> 1]]])->sumOf('amount_paid');

	$refund = $this->TravelRegistrations->find()->where(['travel_id' => $travelid, 'comp <>' => 1,'is_cancelled <>'=> 0,'cancellation_status'=> 2])->sumOf('amount_paid');
	
	$this->set(compact('pageTitle', 'travels','registered','amount_collected','refund'));
	
	}
	
	/**
	 * Register Member method
	 *
	 * @param $id 
	 * @return \Cake\Http\Response|null Redirects on successful member registration, renders view otherwise.
	 * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
	 */
	public function registerMember($id = null) {
		
		$pageTitle = 'Register Member';
		$this->autoRender = false;
		$this->viewBuilder()->setLayout(false);
		$travelid = base64_decode($id);
		$this->loadModel('TravelRegistrations');
		$this->loadModel('Transactions');
		$this->loadModel('Users');
		$this->loadModel('EmailTemplates');
		
		$travel = $this->Travels->get($travelid);
		$user = $this->Users->get($this->request->getData()['user_id'], ['contain' => ['UserProfiles']]);
		
		if ($this->request->is('post')) {
			if($this->request->getData()['mode']=='complimentary') {
				
				$travelRegistration = $this->TravelRegistrations->newEntity();
				$data['user_id'] = $this->request->getData()['user_id'];
				$data['travel_id'] = $travelid;
				$data['amount_paid'] = $this->request->getData()['cost'];
				$data['payment_type'] = $this->request->getData()['payment_type'];
				$data['comp'] = 1;
				
				$travelRegistration = $this->TravelRegistrations->patchEntity($travelRegistration, $data);
				if ($this->TravelRegistrations->save($travelRegistration)) {
					
					$emailTemplate = $this->EmailTemplates->get(18);
					$subject= $emailTemplate->subject;
					$to = $user->email;
					$depart_date = date('m/d/Y', strtotime($travel->depart_date));
					$logo = "<img src=".Configure::read('site_url')."/img/logo.png>";
					$template = str_replace(array('{LOGO}', '{TRAVEL_NAME}', '{DEPART_DATE}', '{TRAVEL_LOCATION}'), array($logo, $travel->travel_name, $depart_date, $travel->travel_location), $emailTemplate->template_body);
					$send_email = $this->Email->sendEmail($to,$subject,$template);
										
					$this->Flash->success(__('The travel event registration Successful.'));
					return $this->redirect(['controller' => 'Travels', 'action' => 'registered', $id]);
					
				}
				else {
					$this->Flash->error(__('The travel event registration could not be saved. Please, try again.'));
					return $this->redirect(['controller' => 'Travels', 'action' => 'registered', $id]);
				}
			}
			else if ($this->request->getData()['mode']=='credit')
			{
				$user = $this->Users->get($this->request->getData()['user_id'], ['contain' => ['UserProfiles']]);
				if($user->user_profile->credit_balance > $this->request->getData()['cost'])
					
				{
						
						$travelRegistration = $this->TravelRegistrations->newEntity();
						$data['user_id'] = $this->request->getData()['user_id'];
						$data['travel_id'] = $travelid;
						$data['amount_paid'] = $this->request->getData()['cost'];
						$data['payment_type'] = $this->request->getData()['payment_type'];
						
						$travelRegistration = $this->TravelRegistrations->patchEntity($travelRegistration, $data);
						
					if ($this->TravelRegistrations->save($travelRegistration)) {	
						
						$transaction = $this->Transactions->newEntity();
						
						$transactionData['user_id'] = $this->request->getData()['user_id'];
						$transactionData['amount_paid'] = $this->request->getData()['cost'];
						$transactionData['payment_status'] = 'paid';
						$transactionData['payment_type'] = 3;
						$transactionData['transaction_date'] = date('Y-m-d H:i:s');
						$transactionData['travel_id'] = $travelid;
						
						$transactionSave = $this->Transactions->patchEntity($transaction, $transactionData);
						
						$this->Transactions->save($transactionSave);
						
						$newdata['user_profile']['credit_balance'] = $user->user_profile->credit_balance - $this->request->getData()['cost'];
						$userProfile = $this->Users->patchEntity($user, $newdata);
						$this->Users->save($user);
						
						$emailTemplate = $this->EmailTemplates->get(18);
						$subject= $emailTemplate->subject;
						$to = $user->email;
						$depart_date = date('m/d/Y', strtotime($travel->depart_date));
						$logo = "<img src=".Configure::read('site_url')."/img/logo.png>";
						$template = str_replace(array('{LOGO}', '{TRAVEL_NAME}', '{DEPART_DATE}', '{TRAVEL_LOCATION}'), array($logo, $travel->travel_name, $depart_date, $travel->travel_location), $emailTemplate->template_body);
						$send_email = $this->Email->sendEmail($to,$subject,$template);
																		
						$this->Flash->success(__('The travel event registration Successful.'));
						return $this->redirect(['controller' => 'travels', 'action' => 'registered', $id]);
					}
					else {
						
						$this->Flash->error(__('The travel event registration could not be saved. Please, try again.'));
						return $this->redirect(['controller' => 'travels', 'action' => 'registered', $id]);
						
					}					
						
				} else {
						
						$this->Flash->error(__('Not enough credit balance for registration.'));
						return $this->redirect(['controller' => 'travels', 'action' => 'registered', $id]);	
						
					}
				
			}
			else if ($this->request->getData()['mode']=='card')
			{
				
				try {
					
						\Stripe\Stripe::setApiKey('sk_test_Z52CUWVN2Otn2VzVSDMfJl2k');
						
						$intent = \Stripe\PaymentIntent::create([
							'amount' => $this->request->getData()['cost'] * 100,
							'currency' => 'usd',
							'payment_method' => $this->request->getData()['payment'],

							'confirm' => true,

							'error_on_requires_action' => true,
						]);

						if ($intent->status == 'succeeded') {
							$transaction = $this->Transactions->newEntity();
							$transactionData['user_id'] = $this->request->getData()['user_id'];
							$transactionData['stripe_charge_id'] = $intent->charges->data[0]['id'];
							$transactionData['amount_paid'] = $intent->charges->data[0]['amount'];
							$transactionData['payment_status'] = $intent->charges->data[0]['status'];
							$transactionData['payment_type'] = 3;
							$transactionData['transaction_date'] = date('Y-m-d H:i:s', $intent->charges->data[0]['created']);
							$transactionData['travel_id'] = $travelid;
							$transactionSave = $this->Transactions->patchEntity($transaction, $transactionData);
							if ($this->Transactions->save($transactionSave)) {
								
								$travelRegistration = $this->TravelRegistrations->newEntity();
								$data['user_id'] = $this->request->getData()['user_id'];
								$data['travel_id'] = $travelid;
								$data['amount_paid'] = $this->request->getData()['cost'];
								$data['payment_type'] = $this->request->getData()['payment_type'];
								
								$travelRegistration = $this->TravelRegistrations->patchEntity($travelRegistration, $data);
								if ($this->TravelRegistrations->save($travelRegistration)) {
									
									$emailTemplate = $this->EmailTemplates->get(18);
									$subject= $emailTemplate->subject;
									$to = $user->email;
									$depart_date = date('m/d/Y', strtotime($travel->depart_date));
									$logo = "<img src=".Configure::read('site_url')."/img/logo.png>";
									$template = str_replace(array('{LOGO}', '{TRAVEL_NAME}', '{DEPART_DATE}', '{TRAVEL_LOCATION}'), array($logo, $travel->travel_name, $depart_date, $travel->travel_location), $emailTemplate->template_body);
									$send_email = $this->Email->sendEmail($to,$subject,$template);
																		
									$this->Flash->success(__('The travel event registration Successful.'));
									return $this->redirect(['controller' => 'travels', 'action' => 'registered' , $id]);
								}
							}
						} else {
							
							echo json_encode(['error' => 'Invalid PaymentIntent status']);
						}
					} 
					catch (\Stripe\Exception\ApiErrorException $e) {
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
	 * @param $id 
	 * @return \Cake\Http\Response|null Redirects on successful list, renders view otherwise.
	 * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
	 */
	public function showMember($id = null) {
		$this->autoRender = false;
		$this->loadModel('Users'); 
		$this->loadModel('TravelRegistrations'); 
		if ($this->request->is('ajax')) {
	
		$registeredEvents=$this->TravelRegistrations->find('list', ['keyField' => 'id', 'valueField' => 'user_id'])->where(['travel_id' => $id, 'is_cancelled' => 0])->toArray();
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
	 * Cancel Event  method
	 *
	 * @param $id , $userid, travelid
	 * @return \Cake\Http\Response|null Redirects on successful event cancel, renders view otherwise.
	 * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
	 */
	public function cancelEvent($id = null, $userid = null, $travelid = null) {

		$this->autoRender = false;
		$this->viewBuilder()->setLayout(false);
		$this->loadModel('Users');
		$this->loadModel('Transactions');
		$this->loadModel('TravelRegistrations');
		$this->loadModel('EmailTemplates');
		$travelregid = base64_decode($id);
		$user_id = base64_decode($userid);
		$travel_id = base64_decode($travelid);
		
		$user = $this->Users->get($user_id, ['contain' => ['UserProfiles']]);
		$travelregistration = $this->TravelRegistrations->get($travelregid);
		$transaction = $this->Transactions->newEntity();

		if ($this->request->is(['patch', 'post', 'put'])) {

				$data = $this->request->getData();
				$newdata = array();
				$newdata['travel_id'] = $travel_id;
				$newdata['amount_paid'] = $travelregistration->amount_paid;
				$newdata['payment_status'] = 'refund';
				$newdata['payment_type'] = 3;
				$newdata['user_id'] = $user_id;
				$newdata['transaction_date'] = date('Y-m-d H:i:s');

				$transaction = $this->Transactions->patchEntity($transaction, $newdata);
				if ($this->Transactions->save($transaction)) {
					
					$travelregistration->is_cancelled = 1;
					$travelregistration->cancelled_date = date('Y-m-d');
					$travelregistration->cancelled_by = $this->Auth->User('id');
					$travelregistration->cancellation_status = 1;
					$this->TravelRegistrations->save($travelregistration);

					$this->Flash->success(__('Member Reg. has been cancelled from the event without refund.'));
					return $this->redirect(['action' => 'registered' , $travelid ]);

				}				
				$this->Flash->error(__('Member Reg. has not been cancelled from the event. Please, try again.'));

		}	
			
	}
	
	/**
	 * Cancel Event with refund method
	 *
	 * @param $id , $userid, travelid
	 * @return \Cake\Http\Response|null Redirects on successful list, renders view otherwise.
	 * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
	 */
	public function cancelEventrefund($id = null, $userid = null, $travelid = null) {

		$this->autoRender = false;
		$this->viewBuilder()->setLayout(false);
		$this->loadModel('Users');
		$this->loadModel('Transactions');
		$this->loadModel('TravelRegistrations');
		$this->loadModel('EmailTemplates');
		$travelregid = base64_decode($id);
		$user_id = base64_decode($userid);
		$travel_id = base64_decode($travelid);
		
		$user = $this->Users->get($user_id, ['contain' => ['UserProfiles']]);
		$travelregistration = $this->TravelRegistrations->get($travelregid);
		$transaction = $this->Transactions->newEntity();

		if ($this->request->is(['patch', 'post', 'put'])) {
		
				$data = $this->request->getData();
				$newdata = array();
				$newdata['travel_id'] = $travelid;
				$newdata['amount_paid'] = $travelregistration->amount_paid;
				$newdata['payment_status'] = 'refund';
				$newdata['payment_type'] = 3;
				$newdata['user_id'] = $user_id;
				$newdata['transaction_date'] = date('Y-m-d H:i:s');

				$transaction = $this->Transactions->patchEntity($transaction, $newdata);
				
				if ($this->Transactions->save($transaction)) {
					
					$travelregistration->is_cancelled = 1;
					$travelregistration->cancelled_date = date('Y-m-d');
					$travelregistration->cancelled_by = $this->Auth->User('id');
					$travelregistration->cancellation_status = 2;
					$this->TravelRegistrations->save($travelregistration);

					$data['user_profile']['credit_balance'] = $user->user_profile->credit_balance + $newdata['amount_paid'];
					$userProfile = $this->Users->patchEntity($user, $data);
					$this->Users->save($user);

					$this->Flash->success(__('Member Reg. has been cancelled from the event with refund.'));
					return $this->redirect(['action' => 'registered' , $travelid ]);

				}
				
				$this->Flash->error(__('Member Reg. has not been cancelled from the event. Please, try again.'));						
		}	
			
	}

	/**
	 * Add method
	 *
	 * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
	 */
	public function add() {
		$pageTitle = "Add Travel Event";
		$travel = $this->Travels->newEntity();
		if ($this->request->is('post')) {

			// insert image
			$data = $this->request->getData();
			if($data['cancelled']==1) { $data['published'] = 0;  }
			$data['location_id'] = 1;
			$data['depart_date'] = date('Y-m-d H:i:s', strtotime($data['depart_date']));

			if (!empty($data['return_date'])) {
				$data['return_date'] = date('Y-m-d H:i:s', strtotime($data['return_date']));
			}

			if (!empty($data['pay_due'])) {
				$data['pay_due'] = date('Y-m-d', strtotime($data['pay_due']));
			}

			if (!empty($data['featured_image']['name'])) {
				$file = $data['featured_image']; //put the  data into a var for easy use
				$ext = substr(strtolower(strrchr($file['name'], '.')), 1); //get the extension
				$arr_ext = array('jpg', 'jpeg', 'gif', 'png', 'PNG', 'JPG', 'JPEG', 'GIF'); //set allowed extensions
				if (in_array($ext, $arr_ext)) {
					if ($file['size'] > 2000000) {
						$this->Flash->error('Maximum 2 MB file size allowed.');
					}
					//do the actual uploading of the file. First arg is the tmp name, second arg is
					//where we are putting it
					if (move_uploaded_file($file['tmp_name'], WWW_ROOT . 'files' . DS . 'travel-photo' . DS . 'travel-photo_' . $file['name'])) {
						//prepare the filename for database entry
						$data['featured_image'] = 'travel-photo_' . $file['name'];
					}
				}
			}

			$travel = $this->Travels->patchEntity($travel, $data);
			if ($this->Travels->save($travel)) {
				$this->Flash->success(__('The travel has been saved.'));

				return $this->redirect(['action' => 'index']);
			}
			$this->Flash->error(__('The travel could not be saved. Please, try again.'));
		}
		$locations = $this->Travels->Locations->find('list', ['keyField' => 'id', 'valueField' => 'location_name']);
		$this->set(compact('pageTitle', 'travel', 'locations'));
	}
	
	/**
	 * Send Email method
	 *
	 * @param $id 
	 * @return \Cake\Http\Response|null Redirects on successful Email sent, renders view otherwise.
	 * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
	 */
	public function sendEmail($id= null)   
    {   
		$this->autoRender = false;
		$this->viewBuilder()->setLayout(false);
		$this->loadModel('Travels');
		$this->loadModel('Users');
		$this->loadModel('TravelRegistrations');
		
		$travels = $this->Travels->get($id, [
			'contain' => ['TravelRegistrations' => ['Users' => ['UserProfiles']]],
		]);
		foreach ($travels->travel_registrations as $k => $travel_user) {
			
			if($travel_user->is_cancelled==0) {	
				$to = $travel_user->user->email;
				$subject= $this->request->getData()['subject'];
				$emailtemplate= $this->request->getData()['template_body'];
				
			}				
		}
		
        $this->set(compact('travels'));
    }
	
	/**
	 * Send SMS method
	 *
	 * @param $id 
	 * @return \Cake\Http\Response|null Redirects on successful SMS sent, renders view otherwise.
	 * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
	 */
	public function sendSms($id= null)   
    {   
		$this->autoRender = false;
		$this->viewBuilder()->setLayout(false);
		$this->loadModel('Travels');
		$this->loadModel('Users');
		$this->loadModel('TravelRegistrations');
		
		$travels = $this->Travels->get($id, [
			'contain' => ['TravelRegistrations' => ['Users' => ['UserProfiles']]],
		]);
		
		foreach ($travels->travel_registrations as $k => $travel_user) {
			
			if($travel_user->is_cancelled==0) {
				$number = $travel_user->user->user_profile->mobile;
				$smstemplate= $this->request->getData()['template_body'];
				
			}				
		}
		
        $this->set(compact('travels'));
    }
	/**
	 * Edit method
	 *
	 * @param string|null $id Travel id.
	 * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
	 * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
	 */
	public function edit($id = null) {
		$pageTitle = "Edit Travel Event";
		$travelid = base64_decode($id);
		$travel = $this->Travels->get($travelid, [
			'contain' => [],
		]);
		if ($this->request->is(['patch', 'post', 'put'])) {
			$data = $this->request->getData();
			if($data['cancelled']==1) { $data['published'] = 0;  }
			$data['depart_date'] = date('Y-m-d  H:i:s', strtotime($data['depart_date']));

			if (!empty($data['return_date'])) {
				$data['return_date'] = date('Y-m-d H:i:s', strtotime($data['return_date']));
			}

			if (!empty($data['pay_due'])) {
				$data['pay_due'] = date('Y-m-d', strtotime($data['pay_due']));
			}
			if (!empty($data['featured_image']['name'])) {
				$file = $data['featured_image']; //put the  data into a var for easy use
				$ext = substr(strtolower(strrchr($file['name'], '.')), 1); //get the extension
				$arr_ext = array('jpg', 'jpeg', 'gif', 'png', 'PNG', 'JPG', 'JPEG', 'GIF'); //set allowed extensions
				if (in_array($ext, $arr_ext)) {
					if ($file['size'] > 2000000) {
						$this->Flash->error('Maximum 2 MB file size allowed.');
					}
					//do the actual uploading of the file. First arg is the tmp name, second arg is
					//where we are putting it
					if (move_uploaded_file($file['tmp_name'], WWW_ROOT . 'files' . DS . 'travel-photo' . DS . 'travel-photo_' . $file['name'])) {
						//prepare the filename for database entry
						$data['featured_image'] = 'travel-photo_' . $file['name'];
					}
				}
			}
			else {
				$data['featured_image'] = $travel->featured_image;
			}
			$travel = $this->Travels->patchEntity($travel, $data);
			if ($this->Travels->save($travel)) {
				$this->Flash->success(__('The travel has been saved.'));

				return $this->redirect(['action' => 'index']);
			}
			$this->Flash->error(__('The travel could not be saved. Please, try again.'));
		}
		$locations = $this->Travels->Locations->find('list', ['limit' => 200]);
		$this->set(compact('pageTitle', 'travel', 'locations'));
	}

	/**
	 * Delete method
	 *
	 * @param string|null $id Travel id.
	 * @return \Cake\Http\Response|null Redirects to index.
	 * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
	 */
	public function delete($id = null) {
		$this->request->allowMethod(['post', 'delete']);
		$travel = $this->Travels->get($id);
		if ($this->Travels->delete($travel)) {
			$this->Flash->success(__('The travel has been deleted.'));
		} else {
			$this->Flash->error(__('The travel could not be deleted. Please, try again.'));
		}

		return $this->redirect(['action' => 'index']);
	}
}
