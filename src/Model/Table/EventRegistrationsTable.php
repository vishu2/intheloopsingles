<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * EventRegistrations Model
 *
 * @property \App\Model\Table\EventsTable&\Cake\ORM\Association\BelongsTo $Events
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\EventRegistrationGuestsTable&\Cake\ORM\Association\HasMany $EventRegistrationGuests
 *
 * @method \App\Model\Entity\EventRegistration get($primaryKey, $options = [])
 * @method \App\Model\Entity\EventRegistration newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\EventRegistration[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\EventRegistration|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\EventRegistration saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\EventRegistration patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\EventRegistration[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\EventRegistration findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class EventRegistrationsTable extends Table
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

        $this->setTable('event_registrations');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Events', [
            'foreignKey' => 'event_id'
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER',
        ]);
		
		$this->belongsTo('UsersStaff', [
            'foreignKey' => 'cancelled_by',
            'joinType' => 'LEFT',
			'className' => 'Users'
        ]);
        $this->hasMany('EventRegistrationGuests', [
            'foreignKey' => 'event_registration_id',
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
            ->integer('quantity')
            ->requirePresence('quantity', 'create')
            ->notEmptyString('quantity');

        $validator
            ->integer('full_paid')
            ->notEmptyString('full_paid');

        $validator
            ->integer('male')
            ->notEmptyString('male');

        $validator
            ->integer('female')
            ->notEmptyString('female');

        $validator
            ->integer('status')
            ->requirePresence('status', 'create')
            ->notEmptyString('status');

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
        $rules->add($rules->existsIn(['event_id'], 'Events'));
        $rules->add($rules->existsIn(['user_id'], 'Users'));

        return $rules;
    }
}
