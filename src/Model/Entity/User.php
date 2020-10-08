<?php
namespace App\Model\Entity;

use Cake\Auth\DefaultPasswordHasher;
use Cake\ORM\Entity;

/**
 * User Entity
 *
 * @property int $id
 * @property string $username
 * @property string $password
 * @property int $user_type_id
 * @property string|null $verification_token
 * @property string|null $reset_token
 * @property bool|null $is_verified
 * @property bool|null $is_blocked
 * @property string|null $profile_image
 * @property int $status
 * @property int $subscription_type
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 *
 * @property \App\Model\Entity\UserType $user_type
 */
class User extends Entity {
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
		'email' => true,
		'password' => true,
		'location_id' => true,
		'role_id' => true,
		'status' => true,
		'is_ban' => true,
		'ban_reason' => true,
		'activation_key' => true,
		'activation_date' => true,
		'forgot_password_key' => true,
		'forgot_password_request_date' => true,
		'last_login' => true,
		'is_migrated' => true,
		'created' => true,
		'modified' => true,
		'roles' => true,
		'event_registrations' => true,
		'transactions' => true,
		'travel_registrations' => true,
		'user_profile' => true,
		'locations' => true,
	];

	/**
	 * Fields that are excluded from JSON versions of the entity.
	 *
	 * @var array
	 */
	protected $_hidden = [
		'password',
	];

	protected function _setPassword($password) {
		if (strlen($password) > 0) {
			return (new DefaultPasswordHasher)->hash($password);
		}
	}
}
