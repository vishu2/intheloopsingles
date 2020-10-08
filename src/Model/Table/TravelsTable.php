<?php
namespace App\Model\Table;

use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Travels Model
 *
 * @property \App\Model\Table\LocationsTable&\Cake\ORM\Association\BelongsTo $Locations
 * @property \App\Model\Table\TransactionsTable&\Cake\ORM\Association\HasMany $Transactions
 * @property \App\Model\Table\TravelRegistrationsTable&\Cake\ORM\Association\HasMany $TravelRegistrations
 *
 * @method \App\Model\Entity\Travel get($primaryKey, $options = [])
 * @method \App\Model\Entity\Travel newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Travel[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Travel|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Travel saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Travel patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Travel[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Travel findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class TravelsTable extends Table {
	/**
	 * Initialize method
	 *
	 * @param array $config The configuration for the Table.
	 * @return void
	 */
	public function initialize(array $config) {
		parent::initialize($config);

		$this->setTable('travels');
		$this->setDisplayField('id');
		$this->setPrimaryKey('id');

		$this->addBehavior('Timestamp');

		$this->belongsTo('Locations', [
			'foreignKey' => 'location_id',
			'joinType' => 'INNER',
		]);
		$this->hasMany('Transactions', [
			'foreignKey' => 'travel_id',
		]);
		$this->hasMany('TravelRegistrations', [
			'foreignKey' => 'travel_id',
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
			->scalar('travel_name')
			->maxLength('travel_name', 255)
			->requirePresence('travel_name', 'create')
			->notEmptyString('travel_name');

		$validator
			->scalar('travel_location')
			->maxLength('travel_location', 255)
			->requirePresence('travel_location', 'create')
			->notEmptyString('travel_location');

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
		$rules->add($rules->existsIn(['location_id'], 'Locations'));

		return $rules;
	}
}
