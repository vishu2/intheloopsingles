<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * TravelRegistration Entity
 *
 * @property int $id
 * @property int $travel_id
 * @property int $user_id
 * @property int $single
 * @property int $shared
 * @property int $deposit_paid
 * @property int $full_paid
 * @property int $comp
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Travel $travel
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\TravelRegistrationGuest[] $travel_registration_guests
 */
class TravelRegistration extends Entity
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
        'travel_id' => true,
        'user_id' => true,
        'amount_paid' => true,
        'payment_type' => true,
        // 'deposit_paid' => true,
        // 'full_paid' => true,
        'comp' => true,
		'is_cancelled' => true,
		'cancelled_date' => true,
		'cancelled_by' => true,
		'cancelled_status' => true,
        'created' => true,
        'modified' => true,
        'travel' => true,
        'user' => true,
        'travel_registration_guests' => true,
    ];
}
