<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * TravelRegistrations Model
 *
 * @property \App\Model\Table\TravelsTable&\Cake\ORM\Association\BelongsTo $Travels
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\TravelRegistrationGuestsTable&\Cake\ORM\Association\HasMany $TravelRegistrationGuests
 *
 * @method \App\Model\Entity\TravelRegistration get($primaryKey, $options = [])
 * @method \App\Model\Entity\TravelRegistration newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\TravelRegistration[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\TravelRegistration|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TravelRegistration saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TravelRegistration patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\TravelRegistration[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\TravelRegistration findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class TravelRegistrationsTable extends Table
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

        $this->setTable('travel_registrations');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Travels', [
            'foreignKey' => 'travel_id',
            'joinType' => 'INNER',
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
        $this->hasMany('TravelRegistrationGuests', [
            'foreignKey' => 'travel_registration_id',
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
            ->integer('single')
            ->notEmptyString('single');

        $validator
            ->integer('shared')
            ->notEmptyString('shared');

        $validator
            ->integer('deposit_paid')
            ->notEmptyString('deposit_paid');

        $validator
            ->integer('full_paid')
            ->notEmptyString('full_paid');

        $validator
            ->integer('comp')
            ->notEmptyString('comp');

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
        $rules->add($rules->existsIn(['travel_id'], 'Travels'));
        $rules->add($rules->existsIn(['user_id'], 'Users'));

        return $rules;
    }
}
