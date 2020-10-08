<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * UserProfile Entity
 *
 * @property int $id
 * @property int $user_id
 * @property string $first_name
 * @property string $last_name
 * @property string $profile_image
 * @property string $phone
 * @property string $mobile
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\User $user
 */
class UserProfile extends Entity {
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
		'first_name' => true,
		'last_name' => true,
		'profile_image' => true,
		'address' => true,
		'phone' => true,
		'mobile' => true,
		'dob' => true,
		'membership' => true,
		'sex' => true,
		'city' => true,
		'state_id' => true,
		'zip' => true,
		'credit_balance' => true,
		'created' => true,
		'modified' => true,
		'user' => true,
	];
	
	protected function _getAge()
{
    return $this->_properties['dob'];
}
}
