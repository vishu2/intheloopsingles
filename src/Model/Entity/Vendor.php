<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Vendor Entity
 *
 * @property int $id
 * @property string $vendor_name
 * @property string $phone
 * @property string $address
 * @property string $city
 * @property int $state_id
 * @property int $status
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\State $state
 * @property \App\Model\Entity\Event[] $events
 */
class Vendor extends Entity
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
        'vendor_name' => true,
        'phone' => true,
        'address' => true,
        'city' => true,
        'state_id' => true,
        'status' => true,
        'created' => true,
        'modified' => true,
        'state' => true,
        'events' => true,
    ];
}
