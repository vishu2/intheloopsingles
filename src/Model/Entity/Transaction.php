<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Transaction Entity
 *
 * @property int $id
 * @property int $user_id
 * @property string $stripe_charge_id
 * @property float $amount_paid
 * @property string|null $payment_status
 * @property \Cake\I18n\FrozenTime $transaction_date
 * @property int|null $event_id
 * @property int|null $travel_id
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\StripeCharge $stripe_charge
 * @property \App\Model\Entity\Event $event
 * @property \App\Model\Entity\Travel $travel
 */
class Transaction extends Entity
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
        'user_id' => true,
        'stripe_charge_id' => true,
        'amount_paid' => true,
        'payment_status' => true,
		'payment_type' => true,
        'transaction_date' => true,
		'remarks' => true,
        'event_id' => true,
        'travel_id' => true,
        'created' => true,
        'modified' => true,
        'user' => true,
        'stripe_charge' => true,
        'event' => true,
        'travel' => true,
    ];
}
