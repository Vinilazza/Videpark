<?php
// src/Model/Table/VehiclesTable.php
namespace App\Model\Table;

use Cake\ORM\Table;

class VehiclesTable extends Table {
    public function initialize(array $config): void {
        parent::initialize($config);

        $this->setTable('vehicles');
        $this->setDisplayField('license_plate');
        $this->setPrimaryKey('id');
    }
}
