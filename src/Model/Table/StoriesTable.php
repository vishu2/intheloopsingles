<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Stories Model
 *
 * @method \App\Model\Entity\Story get($primaryKey, $options = [])
 * @method \App\Model\Entity\Story newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Story[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Story|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Story saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Story patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Story[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Story findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class StoriesTable extends Table
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

        $this->setTable('stories');
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
            ->scalar('member_name')
            ->maxLength('member_name', 255)
            ->requirePresence('member_name', 'create')
            ->notEmptyString('member_name');

        $validator
            ->scalar('story_image')
            ->maxLength('story_image', 255)
            ->requirePresence('story_image', 'create')
            ->notEmptyFile('story_image');

        $validator
            ->scalar('story_content')
            ->requirePresence('story_content', 'create')
            ->notEmptyString('story_content');

        return $validator;
    }
}
