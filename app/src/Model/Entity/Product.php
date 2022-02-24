<?php
// src/Model/Entity/Product.php
namespace App\Model\Entity;

use Cake\ORM\Entity;

class Product extends Entity
{
    protected $_accessible = [
        '*' => true,
        //ワイルドカード設定したほうがいいのか...(*_idみたいな) ←とりあえずそのままで実行してみる
        'id' => false,
    ];
}
