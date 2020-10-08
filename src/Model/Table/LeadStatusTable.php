<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * LeadStatus Model
 *
 * @property \App\Model\Table\LeadsTable&\Cake\ORM\Association\HasMany $Leads
 *
 * @method \App\Model\Entity\LeadStatus get($primaryKey, $options = [])
 * @method \App\Model\Entity\LeadStatus newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\LeadStatus[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\LeadStatus|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\LeadStatus saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\LeadStatus patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\LeadStatus[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\LeadStatus findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class LeadStatusTable extends Table
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

        $this->setTable('lead_status');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('Leads', [
            'foreignKey' => 'lead_status_id',
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
            ->scalar('status_name')
            ->maxLength('status_name', 255)
            ->requirePresence('status_name', 'create')
            ->notEmptyString('status_name');

        $validator
            ->integer('status')
            ->notEmptyString('status');

        return $validator;
    }
}
