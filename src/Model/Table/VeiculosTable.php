<?php
// src/Model/Table/VeiculosTable.php
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class VeiculosTable extends Table
{
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('veiculos');
        $this->setPrimaryKey('id');
        $this->addBehavior('Timestamp');

        $this->hasMany('Movimentos', [
            'foreignKey' => 'veiculo_id',
        ]);
    }

    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->notEmptyString('placa', 'A placa é obrigatória')
            ->maxLength('placa', 10)
            ->notEmptyString('modelo', 'O modelo é obrigatório')
            ->maxLength('modelo', 255);

        return $validator;
    }
}
