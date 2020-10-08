<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * SmsTemplates Model
 *
 * @method \App\Model\Entity\SmsTemplate get($primaryKey, $options = [])
 * @method \App\Model\Entity\SmsTemplate newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\SmsTemplate[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\SmsTemplate|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\SmsTemplate saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\SmsTemplate patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\SmsTemplate[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\SmsTemplate findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class SmsTemplatesTable extends Table
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

        $this->setTable('sms_templates');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
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
            ->scalar('subject')
            ->maxLength('subject', 255)
            ->requirePresence('subject', 'create')
            ->notEmptyString('subject');

        $validator
            ->scalar('template_for')
            ->maxLength('template_for', 255)
            ->requirePresence('template_for', 'create')
            ->notEmptyString('template_for');

        $validator
            ->scalar('template_body')
            ->requirePresence('template_body', 'create')
            ->notEmptyString('template_body');

        $validator
            ->requirePresence('status', 'create')
            ->notEmptyString('status');

        return $validator;
    }
}
