<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\ORM\Behavior\Translate\TranslateTrait;
/**
 * OrderItem Entity
 *
 * @property int $id
 * @property int $customer_id
 * @property int $product_id
 * @property int $quantity
 * @property float $price
 * @property \Cake\I18n\FrozenDate $date
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Customer $customer
 * @property \App\Model\Entity\Product $product
 */
class OrderItem extends Entity
{

    use TranslateTrait;
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
        'customer_id' => true,
        'product_id' => true,
        'quantity' => true,
        'price' => true,
        'date' => true,
        'created' => true,
        'modified' => true,
        'customer' => true,
        'product' => true,
        'products' => true
    ];
}
