<?php
namespace App\Model\Table;

use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Leads Model
 *
 * @property \App\Model\Table\ClientsTable&\Cake\ORM\Association\BelongsTo $Clients
 * @property \App\Model\Table\LeadTypesTable&\Cake\ORM\Association\BelongsTo $LeadTypes
 * @property \App\Model\Table\LeadSourcesTable&\Cake\ORM\Association\BelongsTo $LeadSources
 * @property \App\Model\Table\LeadStatusesTable&\Cake\ORM\Association\BelongsTo $LeadStatuses
 * @property \App\Model\Table\LocationsTable&\Cake\ORM\Association\BelongsTo $Locations
 * @property \App\Model\Table\StatesTable&\Cake\ORM\Association\BelongsTo $States
 * @property \App\Model\Table\CountriesTable&\Cake\ORM\Association\BelongsTo $Countries
 *
 * @method \App\Model\Entity\Lead get($primaryKey, $options = [])
 * @method \App\Model\Entity\Lead newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Lead[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Lead|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Lead saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Lead patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Lead[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Lead findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class LeadsTable extends Table {
	/**
	 * Initialize method
	 *
	 * @param array $config The configuration for the Table.
	 * @return void
	 */
	public function initialize(array $config) {
		parent::initialize($config);

		$this->setTable('leads');
		$this->setDisplayField('id');
		$this->setPrimaryKey('id');

		$this->addBehavior('Timestamp');

		$this->belongsTo('Clients', [
			'foreignKey' => 'client_id',
		]);
		$this->belongsTo('LeadTypes', [
			'foreignKey' => 'lead_type_id',
		
		]);
		$this->belongsTo('LeadSources', [
			'foreignKey' => 'lead_source_id',
			
		]);
		$this->belongsTo('LeadStatus', [
			'foreignKey' => 'lead_status_id',
			
		]);
		$this->belongsTo('Locations', [
			'foreignKey' => 'location_id',
			
		]);
		$this->belongsTo('States', [
			'foreignKey' => 'state_id',
		]);
		$this->belongsTo('Countries', [
			'foreignKey' => 'country_id',
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
			->scalar('lead_name')
			->maxLength('lead_name', 255)
			->requirePresence('lead_name', 'create')
			->notEmptyString('lead_name');

		$validator
			->scalar('lead_email')
			->maxLength('lead_email', 100)
			->requirePresence('lead_email', 'create')
			->notEmptyString('lead_email');

		$validator
			->scalar('lead_phone')
			->maxLength('lead_phone', 50)
			->requirePresence('lead_phone', 'create')
			->notEmptyString('lead_phone');

		$validator
			->scalar('lead_mobile')
			->maxLength('lead_mobile', 50)
			->requirePresence('lead_mobile', 'create')
			->notEmptyString('lead_mobile');

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
		$rules->add($rules->existsIn(['client_id'], 'Clients'));
		$rules->add($rules->existsIn(['lead_type_id'], 'LeadTypes'));
		$rules->add($rules->existsIn(['lead_source_id'], 'LeadSources'));
		$rules->add($rules->existsIn(['lead_status_id'], 'LeadStatus'));
		$rules->add($rules->existsIn(['location_id'], 'Locations'));
		$rules->add($rules->existsIn(['state_id'], 'States'));
		$rules->add($rules->existsIn(['country_id'], 'Countries'));

		return $rules;
	}
}
