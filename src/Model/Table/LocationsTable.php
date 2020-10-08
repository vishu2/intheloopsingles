<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Locations Model
 *
 * @property \App\Model\Table\StatesTable&\Cake\ORM\Association\BelongsTo $States
 * @property \App\Model\Table\EventsTable&\Cake\ORM\Association\HasMany $Events
 * @property \App\Model\Table\LeadSourcesTable&\Cake\ORM\Association\HasMany $LeadSources
 * @property \App\Model\Table\LeadsTable&\Cake\ORM\Association\HasMany $Leads
 * @property \App\Model\Table\SourceTable&\Cake\ORM\Association\HasMany $Source
 * @property \App\Model\Table\TravelsTable&\Cake\ORM\Association\HasMany $Travels
 *
 * @method \App\Model\Entity\Location get($primaryKey, $options = [])
 * @method \App\Model\Entity\Location newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Location[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Location|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Location saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Location patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Location[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Location findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class LocationsTable extends Table {
	/**
	 * Initialize method
	 *
	 * @param array $config The configuration for the Table.
	 * @return void
	 */
	public function initialize(array $config) {
		parent::initialize($config);

		$this->setTable('locations');
		$this->setDisplayField('id');
		$this->setPrimaryKey('id');

		$this->addBehavior('Timestamp');

		$this->belongsTo('States', [
			'foreignKey' => 'state_id',
			'joinType' => 'INNER',
		]);
		$this->hasMany('Events', [
			'foreignKey' => 'location_id',
		]);
		$this->hasMany('LeadSources', [
			'foreignKey' => 'location_id',
		]);
		$this->hasMany('Leads', [
			'foreignKey' => 'location_id',
		]);
		$this->hasMany('Source', [
			'foreignKey' => 'location_id',
		]);
		$this->hasMany('Travels', [
			'foreignKey' => 'location_id',
		]);
		$this->belongsToMany('Users', [
            'foreignKey' => 'location_id',
            'targetForeignKey' => 'user_id',
            'joinTable' => 'user_permissions',
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
			->scalar('location_name')
			->maxLength('location_name', 255)
			->requirePresence('location_name', 'create')
			->notEmptyString('location_name');

		$validator
			->scalar('address')
			->requirePresence('address', 'create')
			->notEmptyString('address');

		$validator
			->scalar('city')
			->maxLength('city', 255)
			->requirePresence('city', 'create')
			->notEmptyString('city');

		$validator
			->scalar('zip')
			->maxLength('zip', 10)
			->requirePresence('zip', 'create')
			->notEmptyString('zip');

		$validator
			->scalar('phone')
			->maxLength('phone', 50)
			->requirePresence('phone', 'create')
			->notEmptyString('phone');

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
		$rules->add($rules->existsIn(['state_id'], 'States'));

		return $rules;
	}
}
