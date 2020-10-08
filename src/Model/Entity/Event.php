<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Event Entity
 *
 * @property int $id
 * @property string $event_name
 * @property \Cake\I18n\FrozenTime $start_date
 * @property \Cake\I18n\FrozenTime|null $end_date
 * @property string|null $venue_name
 * @property string|null $venue_address
 * @property string|null $venue_address2
 * @property string $event_description
 * @property string $event_photo
 * @property \Cake\I18n\FrozenTime|null $event_cancel_date
 * @property float $event_fee
 * @property string|null $event_fee_description
 * @property int $attire_id
 * @property \Cake\I18n\FrozenTime|null $registration_close_date
 * @property int|null $quantity
 * @property int|null $member_limit
 * @property int|null $registration_limit
 * @property int|null $male_limit
 * @property int|null $female_limit
 * @property int $cancelled
 * @property int $published
 * @property int $credit
 * @property string $notes
 * @property int $vendor_id
 * @property string $event_color
 * @property float $event_cost
 * @property int $location_id
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Attire $attire
 * @property \App\Model\Entity\Vendor $vendor
 * @property \App\Model\Entity\Location $location
 * @property \App\Model\Entity\EventRegistration[] $event_registrations
 * @property \App\Model\Entity\Transaction[] $transactions
 */
class Event extends Entity {
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
		'event_name' => true,
		'start_date' => true,
		'end_date' => true,
		'cancellation_date' => true,
		'venue_name' => true,
		'venue_address' => true,
		'venue_address2' => true,
		'event_description' => true,
		'event_photo' => true,
		'event_cancel_date' => true,
		'event_fee' => true,
		'event_fee_description' => true,
		'attire_id' => true,
		'registration_close_date' => true,
		'quantity' => true,
		'member_limit' => true,
		'male_limit' => true,
		'female_limit' => true,
		'cancelled' => true,
		'published' => true,
	
		'notes' => true,
		'event_reminder_notes' => true,
		'vendor_id' => true,
		'event_color' => true,
		'event_cost' => true,
		'location_id' => true,
		'created' => true,
		'modified' => true,
		'attire' => true,
		'vendor' => true,
		'location' => true,
		'event_registrations' => true,
		'transactions' => true,
		'users' => true,
	];
}
