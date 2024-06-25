<?php 
// src/Model/Table/MovimentosTable.php
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class MovimentosTable extends Table
{
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('movimentos');
        $this->setPrimaryKey('id');
        $this->addBehavior('Timestamp');

        $this->belongsTo('Veiculos', [
            'foreignKey' => 'veiculo_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Vagas', [
            'foreignKey' => 'vaga_id',
            'joinType' => 'INNER',
        ]);
    }

    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->notEmptyString('veiculo_id', 'O veículo é obrigatório')
            ->notEmptyString('vaga_id', 'A vaga é obrigatória')
            ->notEmptyString('entrada', 'A entrada é obrigatória');

        return $validator;
    }
}

?>