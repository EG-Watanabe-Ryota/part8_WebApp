<?php
// src/Model/Table/CartsTable.php
namespace App\Model\Table;

use Cake\ORM\Table;

class OrdersTable extends Table
{
    public function initialize(array $config) : void
    {
        $this->addBehavior('Timestamp');
    }
}