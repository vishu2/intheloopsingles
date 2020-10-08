<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Mailer\Email;
use Stripe\Stripe;
use Cake\Core\Configure;

/**
 * EventRegistrations Controller
 *
 * @property \App\Model\Table\EventRegistrationsTable $EventRegistrations
 *
 * @method \App\Model\Entity\EventRegistration[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class EventRegistrationsController extends AppController {
	/**
	 * Index method
	 *
	 * @return \Cake\Http\Response|null
	 */
	public function index() {
		$this->paginate = [
			'contain' => ['Events', 'Users'],
		];
		$eventRegistrations = $this->paginate($this->EventRegistrations);

		$this->set(compact('eventRegistrations'));
	}

	/**
	 * View method
	 *
	 * @param string|null $id Event Registration id.
	 * @return \Cake\Http\Response|null
	 * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
	 */
	public function view($id = null) {
		$eventRegistration = $this->EventRegistrations->get($id, [
			'contain' => ['Events', 'Users', 'EventRegistrationGuests'],
		]);

		$this->set('eventRegistration', $eventRegistration);
	}

	/**
	 * Add method
	 *
	 * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
	 */
	public function add() {
		$this->loadModel('Users');
		$this->loadModel('Events');
		$this->loadModel('Transactions');
		$this->loadModel('EmailTemplates');
		$eventRegistration = $this->EventRegistrations->newEntity();
		if ($this->request->is('post')) {
			$event_id = $this->request->getData()['event_id'];
			$event = $this->Events->get($event_id);
			if (!empty($event)) {
				$eventAmount = $event->event_fee * $this->request->getData()['quantity'];
				$user = $this->Users->get($this->Auth->User('id'), ['contain' => ['UserProfiles']]);
				if (!empty($this->request->getData()['payment'])) {
					try {
						\Stripe\Stripe::setApiKey('sk_test_Z52CUWVN2Otn2VzVSDMfJl2k');

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
							$transactionData['user_id'] = $this->Auth->User('id');
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
									$to = $this->Auth->User('email');
									$event_date = date('m/d/Y', strtotime($event->start_date));
									$event_time = date('h:i A', strtotime($event->start_date));
									$event_location = $event->venue_name . ', ' . $event->venue_address . ', ' . $event->venue_address2;
									$event_fee = '$' . $event->event_fee;
									$logo = "<img src=".Configure::read('site_url')."/img/logo.png>";
									$template = str_replace(array('{LOGO}', '{EVENT_NAME}', '{EVENT_DATE}','{EVENT_TIME}', '{EVENT_LOCATION}', '{EVENT_FEE}'), array($logo, $event->event_name, $event_date, $event_time, $event_location, $event_fee), $emailTemplate->template_body);
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
									return $this->redirect(['controller' => 'users', 'action' => 'events']);
								}
							}
						} else {
							// Any other status would be unexpected, so error
							echo json_encode(['error' => 'Invalid PaymentIntent status']);
						}
					} catch (\Stripe\Exception\ApiErrorException $e) {
						$this->Flash->error(__($e->getMessage()));
						return $this->redirect(['controller' => 'users', 'action' => 'eventdetails', $event_id]);

					}
				} else {
					if ($eventAmount < $user->user_profile->credit_balance) {
						$transaction = $this->Transactions->newEntity();
							$transactionData['user_id'] = $this->Auth->User('id');
							$transactionData['amount_paid'] = $this->request->getData()['TotalValue'];
							$transactionData['payment_status'] = 'paid';
							$transactionData['transaction_date'] = date('Y-m-d H:i:s');
							$transactionData['event_id'] = $event_id;
							$transactionSave = $this->Transactions->patchEntity($transaction, $transactionData);
							if ($this->Transactions->save($transactionSave)) {
								$eventRegistration = $this->EventRegistrations->patchEntity($eventRegistration, $this->request->getData());								
								if ($this->EventRegistrations->save($eventRegistration)) {
									$data['user_profile']['credit_balance'] = $user->user_profile->credit_balance - $eventAmount;
									$userProfile = $this->Users->patchEntity($user, $data);
									$this->Users->save($user);
									$emailTemplate = $this->EmailTemplates->get(9);
									$to = $this->Auth->User('email');
									$event_date = date('m/d/Y', strtotime($event->start_date));
									$event_time = date('h:i A', strtotime($event->start_date));
									$event_location = $event->venue_name . ', ' . $event->venue_address . ', ' . $event->venue_address2;
									$event_fee = '$' . $event->event_fee;
									$logo = "<img src=".Configure::read('site_url')."/img/logo.png>";
									$template = str_replace(array('{LOGO}', '{EVENT_NAME}', '{EVENT_DATE}', '{EVENT_TIME}', '{EVENT_LOCATION}', '{EVENT_FEE}'), array($logo, $event->event_name, $event_date, $event_time, $event_location, $event_fee), $emailTemplate->template_body);
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
									return $this->redirect(['controller' => 'users', 'action' => 'events']);
								}
							}
						
						$this->Flash->error(__('The event registration could not be saved. Please, try again.'));
						return $this->redirect(['controller' => 'users', 'action' => 'eventdetails', $event_id]);
					} else {
						$this->Flash->error(__('Not enough credit balance for registration.'));
						return $this->redirect(['controller' => 'users', 'action' => 'eventdetails', $event_id]);
					}
				}
			} else {
				$this->Flash->error(__('Event does not exist.'));
			}
		}
		$events = $this->EventRegistrations->Events->find('list', ['limit' => 200]);
		$users = $this->EventRegistrations->Users->find('list', ['limit' => 200]);
		$this->set(compact('eventRegistration', 'events', 'users'));
	}

	/**
	 * Edit method
	 *
	 * @param string|null $id Event Registration id.
	 * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
	 * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
	 */
	public function edit($id = null) {
		$eventRegistration = $this->EventRegistrations->get($id, [
			'contain' => [],
		]);
		if ($this->request->is(['patch', 'post', 'put'])) {
			$eventRegistration = $this->EventRegistrations->patchEntity($eventRegistration, $this->request->getData());
			if ($this->EventRegistrations->save($eventRegistration)) {
				$this->Flash->success(__('The event registration has been saved.'));

				return $this->redirect(['action' => 'index']);
			}
			$this->Flash->error(__('The event registration could not be saved. Please, try again.'));
		}
		$events = $this->EventRegistrations->Events->find('list', ['limit' => 200]);
		$users = $this->EventRegistrations->Users->find('list', ['limit' => 200]);
		$this->set(compact('eventRegistration', 'events', 'users'));
	}

	/**
	 * Delete method
	 *
	 * @param string|null $id Event Registration id.
	 * @return \Cake\Http\Response|null Redirects to index.
	 * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
	 */
	public function delete($id = null) {
		$this->request->allowMethod(['post', 'delete']);
		$eventRegistration = $this->EventRegistrations->get($id);
		if ($this->EventRegistrations->delete($eventRegistration)) {
			$this->Flash->success(__('The event registration has been deleted.'));
		} else {
			$this->Flash->error(__('The event registration could not be deleted. Please, try again.'));
		}

		return $this->redirect(['action' => 'index']);
	}
}
