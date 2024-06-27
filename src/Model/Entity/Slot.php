<?php 

// src/Model/Entity/Slot.php
namespace App\Model\Entity;

use Cake\ORM\Entity;

class Slot extends Entity {
    protected $_accessible = [
        '*' => true,
        'id' => false,
    ];
}
