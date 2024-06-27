<?php 

// src/Model/Table/SlotsTable.php
namespace App\Model\Table;

use Cake\ORM\Table;

class SlotsTable extends Table {
    public function initialize(array $config): void {
        parent::initialize($config);

        $this->setTable('slots');
        $this->setDisplayField('identifier');
        $this->setPrimaryKey('id');
    }
}
