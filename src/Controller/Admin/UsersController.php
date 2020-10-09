<?php
namespace App\Controller\Admin;

use App\Controller\Admin\AppController;
use Cake\Event\Event;
use Cake\Mailer\Email;
use Cake\Core\Configure;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 *
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController {

	public function beforeFilter(Event $event) {
		parent::beforeFilter($event);
		$this->Auth->allow(['login', 'updatePassword']);
	}

	/**
	 * Login method
	 *
	 * @return \Cake\Http\Response|null Redirects on successful login.
	 */

	public function login() {
		$pageTitle = 'Login';
		$this->viewBuilder()->setLayout('Tabler.login');

		if ($this->request->is('post')) {

			$this->request->getSession()->destroy();

			$user = $this->Auth->identify();
			if ($user) {
				if (($user['role_id'] == 1) || ($user['role_id'] == 2)) {
					// 3- member
					if ($user['status'] == 1) {
						// 1- active
						$this->Auth->setUser($user);
						return $this->redirect($this->Auth->redirectUrl());
					} else {
						$this->Auth->logout();
						$this->Flash->error(__('User has been deactivated'));
					}
				} else {
					$this->Auth->logout();
					return $this->redirect(['prefix' => false, 'action' => 'login']);
				}
			} else {
				$this->Flash->error(__('Invalid username or password, try again'));
			}

		}

		$this->set(compact('pageTitle'));
	}

	/**
	 * Dashboard method
	 *
	 * @return \Cake\Http\Response|null
	 */

	public function dashboard() {
		$pageTitle = 'Dashboard';
		$this->loadModel('Leads');
		$seattleleads = $this->Leads->find()->where(['Leads.lead_status_id'=> 1 ,'Leads.location_id'=>1 ])->count();
		$denverleads = $this->Leads->find()->where(['Leads.lead_status_id'=> 1 ,'Leads.location_id'=>2 ])->count();
		$austinleads = $this->Leads->find()->where(['Leads.lead_status_id'=> 1 ,'Leads.location_id'=>3 ])->count();
		
		$this->set(compact('pageTitle','seattleleads','austinleads','denverleads'));
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
	 * Members method
	 *
	 * @return \Cake\Http\Response|null
	 */
	public function member() {
		$pageTitle = 'Members';
		$this->paginate = [
			'contain' => ['Roles', 'UserProfiles'],
		];
		$users = $this->paginate($this->Users->find()->where(['Users.role_id ' => 3]));
		//pr($users);
		$this->set(compact('pageTitle', 'users'));
	}

	/**
	 * Member email method
	 *
	 * @return \Cake\Http\Response|null.
	 */

	public function memberEmail() {
		$this->autoRender = false;
		$pageTitle = 'Send Email to Member';

		if ($this->request->is('post')) {
			$this->loadModel('Users');
			$this->loadModel('EmailTemplates');
			$subject = $this->request->getData()['subject'];
			$content = $this->request->getData()['email-content'];
			$mail = $this->request->getData()['users']['email'];

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
     * @param string|null $id member/user id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */


	public function memberdetail($id = null) {
		$this->loadModel('MemberNotes');
		$memberNotes = $this->MemberNotes->find()->contain(['Users'])->where(['MemberNotes.user_id' => $id])->order(['MemberNotes.id' => 'desc'])->limit(1);

		$pageTitle = 'Members Detail';
		$user = $this->Users->get($id, [
			'contain' => ['Roles', 'UserProfiles'],
		]);

		$this->set(compact('pageTitle', 'user', 'memberNotes'));
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
		$pageTitle = 'All staff';
		$userid = base64_decode($id);
		$user = $this->Users->get($userid, ['contain' => ['Roles', 'UserProfiles']]);
		if ($this->request->is(['patch', 'post', 'put'])) {
			$user = $this->Users->patchEntity($user, $this->request->getData());
			if ($this->Users->save($user)) {
				$this->Flash->success(__('The user has been saved.'));

				return $this->redirect(['action' => 'index']);
			}
			$this->Flash->error(__('The user could not be saved. Please, try again.'));
		}
		$roles = $this->Users->Roles->find('list', ['limit' => 200]);
		$this->set(compact('pageTitle','user', 'roles'));
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

				$this->Flash->success('The password is successfully changed');

				$this->redirect(['action' => 'changePassword']);

			} else {

				$this->Flash->error('There was an error during the save!');

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

	public function events() {

		$pageTitle = 'Add Event';
		$this->set(compact('pageTitle'));

	}

	public function travels() {

		$pageTitle = 'Add Travel Event';
		$this->set(compact('pageTitle'));

	}

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
	 * ajax member status change method
	 *
	 * @return \Cake\Http\Response|null
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
			$data['user_profile']['dob'] = date('Y-m-d', strtotime($data['user_profile']['dob']));
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
				$saleData['payment_date'] = date('Y-m-d', strtotime($data['payment_date']));
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

				/*$email = new Email();
				$email->setTransport('default');*/

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
	 * @param $id
	 * @return \Cake\Http\Response|null Redirects on successful list, renders view otherwise.
	 * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
	 */
	public function sendTestSms() {
		$this->autoRender = false;

		if ($this->request->is('post')) {

			$sid = 'AC034d4133fdb3cef7d49e77eb5ac56442';
			$token = '6c74243daabf72a14c62223a00fcfe06';
			
			$from = '+15005550006';
			$content = $this->request->getData()['sms-content'];
			$to = $this->clean($this->request->getData()['mobile']);
			$twilio = new \Client($sid, $token);
			try {

				$message = $twilio->messages
					->create($to, // to
						array(
							"body" => $content,
							"from" => $from,
						)
					);
				$this->Flash->success(__('Test sms sent successfully'));
				return $this->redirect(['action' => 'member']);
			} catch (\Exception $e) {
				$this->Flash->error(__($e->getMessage()));
				return $this->redirect(['action' => 'member']);
			}

		}

	}

	protected function clean($number) {
		$str = str_replace('(', '', $number);
		$str = str_replace(')', '', $str);
		$str = str_replace('-', '', $str);
		$str = str_replace(' ', '', $str);
		return '+1' . $str;
	}

	/**
	 * Member View method
	 *
	 * @return \Cake\Http\Response|null Redirects on successful view, renders view otherwise.
	 * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
	 */
	public function memberView() {
		$this->autoRender = false;
		$session = $this->getRequest()->getSession();
		$adminData = $session->read('Auth.Admin');
		$session->write('Auth.User', $adminData);
		return $this->redirect(['controller' => 'users', 'action' => 'eventscal', 'prefix' => false]);
	}

}
