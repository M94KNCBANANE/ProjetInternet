<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\ORM\Behavior\Translate\TranslateTrait;

/**
 * Product Entity
 *
 * @property int $id
 * @property string $name
 * @property float $price
 * @property string $description
 * @property string $image
 * @property int $productType_id
 * @property int $store_id
 * @property bool $deleted
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\ProductType $product_type
 * @property \App\Model\Entity\Store $store
 * @property \App\Model\Entity\OrderItem[] $order_items
 */
class Product extends Entity
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
        'name' => true,
        'price' => true,
        'description' => true,
        'productType_id' => true,
        'city_id' => true,
        'store_id' => true,
        'deleted' => true,
        'created' => true,
        'modified' => true,
        'product_type' => true,
        'store' => true,
        'order_items' => true,
        'city' => true,
        'files' => true
    ];

}
