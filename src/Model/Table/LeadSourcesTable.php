<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * LeadSources Model
 *
 * @property \App\Model\Table\LocationsTable&\Cake\ORM\Association\BelongsTo $Locations
 * @property \App\Model\Table\LeadsTable&\Cake\ORM\Association\HasMany $Leads
 *
 * @method \App\Model\Entity\LeadSource get($primaryKey, $options = [])
 * @method \App\Model\Entity\LeadSource newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\LeadSource[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\LeadSource|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\LeadSource saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\LeadSource patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\LeadSource[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\LeadSource findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class LeadSourcesTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('lead_sources');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Locations', [
            'foreignKey' => 'location_id',
            'joinType' => 'INNER',
        ]);
        $this->hasMany('Leads', [
            'foreignKey' => 'lead_source_id',
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmptyString('id', null, 'create');

        $validator
            ->scalar('source_name')
            ->maxLength('source_name', 255)
            ->requirePresence('source_name', 'create')
            ->notEmptyString('source_name');

        $validator
            ->integer('source_status')
            ->notEmptyString('source_status');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['location_id'], 'Locations'));

        return $rules;
    }
}
