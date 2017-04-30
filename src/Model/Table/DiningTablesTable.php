<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * DiningTables Model
 *
 * @method \App\Model\Entity\DiningTable get($primaryKey, $options = [])
 * @method \App\Model\Entity\DiningTable newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\DiningTable[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\DiningTable|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\DiningTable patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\DiningTable[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\DiningTable findOrCreate($search, callable $callback = null, $options = [])
 */
class DiningTablesTable extends Table
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

        $this->setTable('dining_tables');
        $this->setDisplayField('table_number');
        $this->setPrimaryKey('table_number');
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
            ->integer('table_number')
            ->allowEmpty('table_number', 'create');

        $validator
            ->integer('chairs_count')
            ->requirePresence('chairs_count', 'create')
            ->notEmpty('chairs_count');

        $validator
            ->integer('status')
            ->requirePresence('status', 'create')
            ->notEmpty('status');

        return $validator;
    }
}
