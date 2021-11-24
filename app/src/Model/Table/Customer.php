<?php
// src/Model/Entity/Product.php
namespace App\Model\Entity;

use Cake\ORM\Entity;
//webroot imgのパス　/var/www/app/webroot/img
class Customer extends Entity
{
    protected $_accessible = [
        '*' => true,
        'id' => false,
    ];

    protected function _setPassword($password)
    {
        if (strlen($password) > 0) {
            return (new DefaultPasswordHasher)->hash($password);
        }
    }
}