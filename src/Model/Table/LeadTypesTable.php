<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * LeadTypes Model
 *
 * @property \App\Model\Table\LeadsTable&\Cake\ORM\Association\HasMany $Leads
 *
 * @method \App\Model\Entity\LeadType get($primaryKey, $options = [])
 * @method \App\Model\Entity\LeadType newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\LeadType[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\LeadType|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\LeadType saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\LeadType patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\LeadType[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\LeadType findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class LeadTypesTable extends Table
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

        $this->setTable('lead_types');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('Leads', [
            'foreignKey' => 'lead_type_id',
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
            ->scalar('lead_type_name')
            ->maxLength('lead_type_name', 255)
            ->requirePresence('lead_type_name', 'create')
            ->notEmptyString('lead_type_name');

        $validator
            ->integer('status')
            ->notEmptyString('status');

        return $validator;
    }
}
