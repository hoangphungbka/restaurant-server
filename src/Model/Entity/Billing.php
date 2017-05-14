<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Billing Entity
 *
 * @property int $id
 * @property int $order_id
 * @property int $total_amount
 * @property int $discount
 * @property \Cake\I18n\Time $created_at
 *
 * @property \App\Model\Entity\Order $order
 */
class Billing extends Entity
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
        '*' => true,
        'id' => false
    ];
}
