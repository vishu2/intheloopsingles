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
namespace App\Controller\Admin;

use Cake\Controller\Controller;
use Cake\Event\Event;

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
		$this->loadComponent('CakephpJqueryFileUpload.JqueryFileUpload');

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

				'action' => 'dashboard',
				'prefix' => 'admin',

			],

			'logoutRedirect' => [

				'controller' => 'Users',

				'action' => 'login',
				'prefix' => 'admin',

			],

			'authError' => 'Please Login Here',

			'storage' => [

				'className' => 'Session',

				'key' => 'Auth.Admin',

			],
		]);
	}

	public function beforeRender(Event $event) {
		$this->viewBuilder()->setTheme('Tabler');
		if (null != $this->Auth->User()) {
			$this->loadModel('Users');
			$userData = $this->Users->get($this->Auth->User('id'), ['contain' => ['UserProfiles', 'Roles']]);

			$this->set(compact('userData'));
		}
	}

	public function isAuthorized($user) {
		return true;
	}
}
