<?php
namespace App\Model\Table;

use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Events Model
 *
 * @property \App\Model\Table\AttiresTable&\Cake\ORM\Association\BelongsTo $Attires
 * @property \App\Model\Table\VendorsTable&\Cake\ORM\Association\BelongsTo $Vendors
 * @property \App\Model\Table\LocationsTable&\Cake\ORM\Association\BelongsTo $Locations
 * @property \App\Model\Table\EventRegistrationsTable&\Cake\ORM\Association\HasMany $EventRegistrations
 * @property \App\Model\Table\TransactionsTable&\Cake\ORM\Association\HasMany $Transactions
 *
 * @method \App\Model\Entity\Event get($primaryKey, $options = [])
 * @method \App\Model\Entity\Event newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Event[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Event|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Event saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Event patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Event[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Event findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class EventsTable extends Table {
	/**
	 * Initialize method
	 *
	 * @param array $config The configuration for the Table.
	 * @return void
	 */
	public function initialize(array $config) {
		parent::initialize($config);

		$this->setTable('events');
		$this->setDisplayField('id');
		$this->setPrimaryKey('id');

		$this->addBehavior('Timestamp');

		$this->belongsTo('Attires', [
			'foreignKey' => 'attire_id',
		]);
		$this->belongsTo('Vendors', [
			'foreignKey' => 'vendor_id',
		]);
		$this->belongsTo('Locations', [
			'foreignKey' => 'location_id',
		]);
		$this->hasMany('EventRegistrations', [
			'foreignKey' => 'event_id',
		]);
		$this->hasMany('Transactions', [
			'foreignKey' => 'event_id',
		]);
		$this->belongsToMany('Users', [
            'foreignKey' => 'event_id',
            'targetForeignKey' => 'user_id',
            'joinTable' => 'users_events',
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
			->scalar('event_name')
			->maxLength('event_name', 255)
			->requirePresence('event_name', 'create')
			->notEmptyString('event_name');

		$validator
			->scalar('start_date')
			->requirePresence('start_date', 'create')
			->notEmptyDateTime('start_date');

		return $validator;
	}

	/**
	 * Returns a rules checker object that will be used for validating
	 * application integrity.
	 *
	 * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
	 * @return \Cake\ORM\RulesChecker
	 */
	public function buildRules(RulesChecker $rules) {
		
		$rules->add($rules->existsIn(['vendor_id'], 'Vendors'));
		$rules->add($rules->existsIn(['location_id'], 'Locations'));

		return $rules;
	}
}
