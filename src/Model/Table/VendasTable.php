<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Vendas Model
 *
 * @property \App\Model\Table\FuncionariosTable&\Cake\ORM\Association\BelongsTo $Funcionarios
 *
 * @method \App\Model\Entity\Venda newEmptyEntity()
 * @method \App\Model\Entity\Venda newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Venda[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Venda get($primaryKey, $options = [])
 * @method \App\Model\Entity\Venda findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Venda patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Venda[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Venda|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Venda saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Venda[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Venda[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Venda[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Venda[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class VendasTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('vendas');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Funcionarios', [
            'foreignKey' => 'funcionario_id',
            'joinType' => 'INNER',
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->integer('id')
            ->allowEmptyString('id', null, 'create');

        $validator
            ->numeric('valor')
            ->requirePresence('valor', 'create')
            ->notEmptyString('valor');

        $validator
            ->date('data_venda')
            ->requirePresence('data_venda', 'create')
            ->notEmptyDateTime('data_venda');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->existsIn(['funcionario_id'], 'Funcionarios'), ['errorField' => 'funcionario_id']);

        return $rules;
    }
}
