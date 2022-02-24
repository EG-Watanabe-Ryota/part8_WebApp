<?php
// src/Model/Entity/Product.php
namespace App\Model\Entity;

use Cake\ORM\Entity;

//webroot imgのパス　/var/www/app/webroot/img
class Product extends Entity
{
    protected $_accessible = [
        '*' => true,
        //ワイルドカード設定したほうがいいのか...(*_idみたいな) ←とりあえずそのままで実行してみる
        'id' => false,
    ];
}
