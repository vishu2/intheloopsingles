<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Travel Entity
 *
 * @property int $id
 * @property string $travel_name
 * @property string $travel_location
 * @property \Cake\I18n\FrozenTime $depart_date
 * @property \Cake\I18n\FrozenTime|null $return_date
 * @property float $cost_single
 * @property float $cost_shared
 * @property float $deposit
 * @property \Cake\I18n\FrozenTime $pay_due
 * @property int $quantity
 * @property string $summary
 * @property string $included
 * @property string $excluded
 * @property string $description
 * @property string $notes
 * @property string $featured_image
 * @property int $published
 * @property int $cancelled
 * @property float $travel_cost
 * @property int $location_id
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Location $location
 * @property \App\Model\Entity\Transaction[] $transactions
 * @property \App\Model\Entity\TravelRegistration[] $travel_registrations
 */
class Travel extends Entity
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
        'travel_name' => true,
        'travel_location' => true,
        'depart_date' => true,
        'return_date' => true,
        'cost_single' => true,
        'cost_shared' => true,
        'deposit_single' => true,
		'deposit_shared' => true,
        'pay_due' => true,
        'quantity' => true,
        'summary' => true,
        'included' => true,
        'excluded' => true,
        'description' => true,
        'notes' => true,
        'featured_image' => true,
        'published' => true,
        'cancelled' => true,
        'travel_cost' => true,
        'location_id' => true,
        'created' => true,
        'modified' => true,
        'location' => true,
        'transactions' => true,
        'travel_registrations' => true,
    ];
}
