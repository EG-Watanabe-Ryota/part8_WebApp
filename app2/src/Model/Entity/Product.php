<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Product Entity
 *
 * @property int $id
 * @property string|null $img
 * @property string|null $name
 * @property int|null $stock
 * @property int|null $price
 * @property string|null $category
 * @property string|null $code
 * @property \Cake\I18n\FrozenTime|null $date
 *
 * @property \App\Model\Entity\Cart[] $carts
 * @property \App\Model\Entity\OrderDatail[] $order_datails
 */
class Product extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'img' => true,
        'name' => true,
        'stock' => true,
        'price' => true,
        'category' => true,
        'code' => true,
        'date' => true,
        'carts' => true,
        'order_datails' => true,
    ];
}
