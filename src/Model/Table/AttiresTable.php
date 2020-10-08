<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Attires Model
 *
 * @property \App\Model\Table\EventsTable&\Cake\ORM\Association\HasMany $Events
 *
 * @method \App\Model\Entity\Attire get($primaryKey, $options = [])
 * @method \App\Model\Entity\Attire newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Attire[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Attire|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Attire saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Attire patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Attire[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Attire findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class AttiresTable extends Table
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

        $this->setTable('attires');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('Events', [
            'foreignKey' => 'attire_id',
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
            ->scalar('attire_name')
            ->maxLength('attire_name', 255)
            ->requirePresence('attire_name', 'create')
            ->notEmptyString('attire_name');

        $validator
            ->integer('status')
            ->notEmptyString('status');

        return $validator;
    }
}
