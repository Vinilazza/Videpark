<?php 

// src/Model/Table/PlanosTable.php
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class PlanosTable extends Table
{
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('planos');
        $this->setPrimaryKey('id');
        $this->addBehavior('Timestamp');
    }

    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->notEmptyString('nome', 'O nome do plano é obrigatório')
            ->notEmptyString('tipo', 'O tipo do plano é obrigatório')
            ->notEmptyString('preco', 'O preço do plano é obrigatório');

        return $validator;
    }
}


?>