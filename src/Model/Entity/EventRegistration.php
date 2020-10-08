<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * EventRegistration Entity
 *
 * @property int $id
 * @property int $event_id
 * @property int $user_id
 * @property int $quantity
 * @property int $full_paid
 * @property int $male
 * @property int $female
 * @property int $status
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Event $event
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\EventRegistrationGuest[] $event_registration_guests
 */
class EventRegistration extends Entity {
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
		'event_id' => true,
		'user_id' => true,
		'quantity' => true,
		'full_paid' => true,
		'male' => true,
		'female' => true,
		'comp' => true,
		'is_cancelled' => true,
		'is_hide' => true,
		'cancelled_date' => true,
		'cancelled_by' => true,
		'cancellation_status' => true,
		'status' => true,
		'created' => true,
		'modified' => true,
		'event' => true,
		'user' => true,
		'event_registration_guests' => true,
	];
}
