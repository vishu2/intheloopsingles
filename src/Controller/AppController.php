<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;
use Cake\Http\Session\DatabaseSession;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link https://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {

	/**
	 * Initialization hook method.
	 *
	 * Use this method to add common initialization code like loading components.
	 *
	 * e.g. `$this->loadComponent('Security');`
	 *
	 * @return void
	 */
	public function initialize() {
		parent::initialize();

		$this->loadComponent('RequestHandler', [
			'enableBeforeRedirect' => false,
		]);
		$this->loadComponent('Flash');

		/*
			         * Enable the following component for recommended CakePHP security settings.
			         * see https://book.cakephp.org/3.0/en/controllers/components/security.html
		*/
		//$this->loadComponent('Security');

		$this->loadComponent('Auth', [

			'authorize' => ['Controller'],
			'authenticate' => [
				'Form' => [
					'fields' => ['username' => 'email', 'password' => 'password'],
				],
			],

			'loginRedirect' => [

				'controller' => 'Users',

				'action' => 'profile',

			],

			'logoutRedirect' => [

				'controller' => 'Users',

				'action' => 'login',

			],

			'authError' => 'Please Login Here',

			'storage' => [

				'className' => 'Session',

				'key' => 'Auth.User',

			],
		]);
	}

	

	public function beforeFilter(Event $event) {
		
		$this->loadModel('Links');
		$this->loadModel('FooterContact');
		$this->loadModel('Locations');
		$links = $this->Links->find('all')->toArray();
		$footercontact = $this->FooterContact->find('all')->toArray();
		$locations = $this->Locations->find('list', ['keyField' => 'id', 'valueField' => 'location_name'], ['conditions' => ['status' => 1]]);
		
		$session = $this->getRequest()->getSession();
		$adminData=$session->read('Auth.Admin');		
		$this->set(compact('links','footercontact','locations','adminData'));

		
		if (null != $this->Auth->User()) {
			$this->loadModel('Users');
			$user = $this->Users->get($this->Auth->User('id'), ['contain' => 'UserProfiles']);

			$this->set(compact('user'));
		}
	}

	public function isAuthorized($user) {
		return true;
	}
}
