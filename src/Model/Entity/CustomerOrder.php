<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * CustomerOrder Entity
 *
 * @property int $id
 * @property int $customer_id
 * @property int $store_id
 * @property \Cake\I18n\FrozenDate $delivery_date
 * @property string $other_details
 *
 * @property \App\Model\Entity\Customer $customer
 * @property \App\Model\Entity\Store $store
 */
class CustomerOrder extends Entity
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
        'customer_id' => true,
        'store_id' => true,
        'delivery_date' => true,
        'other_details' => true,
        'customer' => true,
        'store' => true
    ];
}
