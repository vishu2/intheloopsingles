<?php
namespace App\Model\Table;

use Cake\Auth\DefaultPasswordHasher;
use Cake\ORM\Entity;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Users Model
 *
 * @property \App\Model\Table\UserTypesTable&\Cake\ORM\Association\BelongsTo $UserTypes
 *
 * @method \App\Model\Entity\User get($primaryKey, $options = [])
 * @method \App\Model\Entity\User newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\User[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\User|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\User[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\User findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class UsersTable extends Table {
	/**
	 * Initialize method
	 *
	 * @param array $config The configuration for the Table.
	 * @return void
	 */
	public function initialize(array $config) {
		parent::initialize($config);

		$this->setTable('users');
		$this->setDisplayField('id');
		$this->setPrimaryKey('id');

		$this->addBehavior('Timestamp');

		$this->belongsTo('Roles', [
			'foreignKey' => 'role_id',
			'joinType' => 'INNER',
		]);

		$this->hasMany('EventRegistrations', [
			'foreignKey' => 'user_id',
		]);
		$this->hasMany('Transactions', [
			'foreignKey' => 'user_id',
		]);
		$this->hasMany('TravelRegistrations', [
			'foreignKey' => 'user_id',
		]);
		$this->hasOne('UserProfiles');

		$this->belongsTo('Locations', [
			'foreignKey' => 'location_id',
		]);
		
		
	}

	/**
	 * Default validation rules.
	 *
	 * @param \Cake\Validation\Validator $validator Validator instance.
	 * @return \Cake\Validation\Validator
	 */
	public function validationDefault(Validator $validator) {
		$validator
			->integer('id')
			->allowEmptyString('id', null, 'create');

		$validator
			->email('email')
			->requirePresence('email', 'create')
			->notEmptyString('email');

		$validator
			->scalar('password')
			->maxLength('password', 255)
			->requirePresence('password', 'create')
			->notEmptyString('password');

		return $validator;
	}

	public function validationPassword(Validator $validator) {

		$validator
			->add('old_password', 'custom', [
				'rule' => function ($value, $context) {
					$user = $this->get($context['data']['id']);
					if ($user) {
						if ((new DefaultPasswordHasher)->check($value, $user->password)) {
							return true;
						}
					}
					return false;
				},
				'message' => 'The old password does not match the current password!',
			])
			->notEmpty('old_password');

		$validator
			->add('password', [
				'length' => [
					'rule' => ['minLength', 6],
					'message' => 'The password have to be at least 6 characters!',
				],
			])
			->add('password', [
				'match' => [
					'rule' => ['compareWith', 'confirm_password'],
					'message' => 'The passwords does not match!',
				],
			])
			->notEmpty('password1');
		$validator
			->add('confirm_password', [
				'length' => [
					'rule' => ['minLength', 6],
					'message' => 'The password have to be at least 6 characters!',
				],
			])
			->add('confirm_password', [
				'match' => [
					'rule' => ['compareWith', 'password'],
					'message' => 'The passwords does not match!',
				],
			])
			->notEmpty('confirm_password');

		return $validator;
	}

	public function validationEmail(Validator $validator) {
		$validator
			->add('check_password', 'custom', [
				'rule' => function ($value, $context) {
					$user = $this->get($context['data']['id']);
					if ($user) {
						if ((new DefaultPasswordHasher)->check($value, $user->password)) {
							return true;
						}
					}
					return false;
				},
				'message' => 'The password does not match the current password!',
			])
			->notEmpty('check_password');

		$validator
			->add('email', [
				'match' => [
					'rule' => [$this, 'isUnique'],
					'message' => 'Please enter unique email.',
				],
			])
			->notEmpty('email');

		return $validator;
	}

	function isUnique($email) {
		$user = $this->find('all')
			->where([
				'Users.email' => $email,
			])
			->first();
		if ($user) {
			return false;
		}
		return true;
	}

	/**
	 * Returns a rules checker object that will be used for validating
	 * application integrity.
	 *
	 * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
	 * @return \Cake\ORM\RulesChecker
	 */
	public function buildRules(RulesChecker $rules) {
		$rules->add($rules->isUnique(['email']));
		$rules->add($rules->existsIn(['role_id'], 'Roles'));
		return $rules;
	}

}
