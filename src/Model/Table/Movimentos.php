<php 

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
        ]);
    }

    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->notEmptyDateTime('entrada', 'A data de entrada é obrigatória');

        return $validator;
    }
}
