<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Mailer\Email;
use Stripe\Stripe;
use Cake\Core\Configure;
/**
 * TravelRegistrations Controller
 *
 * @property \App\Model\Table\TravelRegistrationsTable $TravelRegistrations
 *
 * @method \App\Model\Entity\TravelRegistration[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TravelRegistrationsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Travels', 'Users'],
        ];
        $travelRegistrations = $this->paginate($this->TravelRegistrations);

        $this->set(compact('travelRegistrations'));
    }

    /**
     * View method
     *
     * @param string|null $id Travel Registration id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $travelRegistration = $this->TravelRegistrations->get($id, [
            'contain' => ['Travels', 'Users', 'TravelRegistrationGuests'],
        ]);

        $this->set('travelRegistration', $travelRegistration);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
	public function add() {
		$this->loadModel('Users');
		$this->loadModel('Travels');
		$this->loadModel('Transactions');
		$this->loadModel('EmailTemplates');
		$travelRegistration = $this->TravelRegistrations->newEntity();
		
		if ($this->request->is('post')) {
			$travel_id = $this->request->getData()['travel_id'];
			$travel = $this->Travels->get($travel_id);
			if (!empty($travel)) {
				$eventAmount =  $this->request->getData()['cost'];
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
							$transactionData['travel_id'] = $travel_id;
							$transactionSave = $this->Transactions->patchEntity($transaction, $transactionData);
							if ($this->Transactions->save($transactionSave)) {
								$travelRegistration = $this->TravelRegistrations->patchEntity($travelRegistration, $this->request->getData());
								if ($this->TravelRegistrations->save($travelRegistration)) {
									$emailTemplate = $this->EmailTemplates->get(9);
									$to = $this->Auth->User('email');
									$event_date = date('m/d/Y', strtotime($travel->depart_date));
									$event_location = $travel->travel_location ;
									$event_fee = '$' . $this->request->getData()['cost'];
									$logo = "<img src=".Configure::read('site_url')."/img/logo.png>";
									$template = str_replace(array('{LOGO}', '{EVENT_NAME}', '{EVENT_DATE}', '{EVENT_LOCATION}', '{EVENT_FEE}'), array($logo, $travel->event_name, $event_date, $event_location, $event_fee), $emailTemplate->template_body);
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
									return $this->redirect(['controller' => 'users', 'action' => 'traveldetails', $travel_id]);
								}
							}
						} else {
							// Any other status would be unexpected, so error
							echo json_encode(['error' => 'Invalid PaymentIntent status']);
						}
					} catch (\Stripe\Exception\ApiErrorException $e) {
						$this->Flash->error(__($e->getMessage()));
						return $this->redirect(['controller' => 'users', 'action' => 'traveldetails', $travel_id]);

					}
				} else {
					if ($eventAmount < $user->user_profile->credit_balance) {  
						$transaction = $this->Transactions->newEntity();
							$transactionData['user_id'] = $this->Auth->User('id');
							$transactionData['amount_paid'] = $this->request->getData()['cost'];
							$transactionData['payment_status'] = 'paid';
							$transactionData['transaction_date'] = date('Y-m-d H:i:s');
							$transactionData['travel_id'] = $travel_id;
							$transactionSave = $this->Transactions->patchEntity($transaction, $transactionData);
							if ($this->Transactions->save($transactionSave)) {
								$travelRegistration = $this->TravelRegistrations->patchEntity($travelRegistration, $this->request->getData());
								
								if ($this->TravelRegistrations->save($travelRegistration)) {
									$data['user_profile']['credit_balance'] = $user->user_profile->credit_balance - $eventAmount;
									$userProfile = $this->Users->patchEntity($user, $data);
									$this->Users->save($user);
									$emailTemplate = $this->EmailTemplates->get(9);
									$to = $this->Auth->User('email');
									$event_date = date('m/d/Y', strtotime($travel->depart_date));
									$event_location = $travel->travel_location ;
									$event_fee = '$' . $this->request->getData()['cost'];
									$logo = "<img src=".Configure::read('site_url')."/img/logo.png>";
									$template = str_replace(array('{LOGO}', '{EVENT_NAME}', '{EVENT_DATE}', '{EVENT_LOCATION}', '{EVENT_FEE}'), array($logo, $travel->event_name, $event_date, $event_location, $event_fee), $emailTemplate->template_body);
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
									return $this->redirect(['controller' => 'users', 'action' => 'traveldetails', $travel_id]);
								}
							}
						$this->Flash->error(__('The travel event registration could not be saved. Please, try again.'));
						return $this->redirect(['controller' => 'users', 'action' => 'traveldetails', $travel_id]);
					} else {
						$this->Flash->error(__('Not enough credit balance for registration.'));
						return $this->redirect(['controller' => 'users', 'action' => 'traveldetails', $travel_id]);
					}
				}
			} else {
				$this->Flash->error(__('Event does not exist.'));
			}
		}
		$travels = $this->TravelRegistrations->Travels->find('list', ['limit' => 200]);
		$users = $this->TravelRegistrations->Users->find('list', ['limit' => 200]);
		$this->set(compact('eventRegistration', 'travels', 'users'));
	}
   
    /**
     * Edit method
     *
     * @param string|null $id Travel Registration id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $travelRegistration = $this->TravelRegistrations->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $travelRegistration = $this->TravelRegistrations->patchEntity($travelRegistration, $this->request->getData());
            if ($this->TravelRegistrations->save($travelRegistration)) {
                $this->Flash->success(__('The travel registration has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The travel registration could not be saved. Please, try again.'));
        }
        $travels = $this->TravelRegistrations->Travels->find('list', ['limit' => 200]);
        $users = $this->TravelRegistrations->Users->find('list', ['limit' => 200]);
        $this->set(compact('travelRegistration', 'travels', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Travel Registration id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $travelRegistration = $this->TravelRegistrations->get($id);
        if ($this->TravelRegistrations->delete($travelRegistration)) {
            $this->Flash->success(__('The travel registration has been deleted.'));
        } else {
            $this->Flash->error(__('The travel registration could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
