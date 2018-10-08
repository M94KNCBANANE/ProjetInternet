<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\ORM\Behavior\Translate\TranslateTrait;
/**
 * Store Entity
 *
 * @property int $id
 * @property string $name
 * @property string $phone
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 * @property int $user_id
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Product[] $products
 */
class Store extends Entity
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
        'phone' => true,
        'created' => true,
        'modified' => true,
        'user_id' => true,
        'user' => true,
        'products' => true
    ];
}
