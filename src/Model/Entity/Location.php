<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Location Entity
 *
 * @property int $id
 * @property string $location_name
 * @property string $address
 * @property string $city
 * @property int $state_id
 * @property string $zip
 * @property string $phone
 * @property string $fax
 * @property string $location_path
 * @property int $status
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\State $state
 * @property \App\Model\Entity\Event[] $events
 * @property \App\Model\Entity\LeadSource[] $lead_sources
 * @property \App\Model\Entity\Lead[] $leads
 * @property \App\Model\Entity\Source[] $source
 * @property \App\Model\Entity\Travel[] $travels
 */
class Location extends Entity
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
        'location_name' => true,
        'address' => true,
        'city' => true,
        'state_id' => true,
        'zip' => true,
        'phone' => true,
        'fax' => true,
        'location_path' => true,
        'status' => true,
        'created' => true,
        'modified' => true,
        'state' => true,
        'events' => true,
        'lead_sources' => true,
        'leads' => true,
        'source' => true,
        'travels' => true,
    ];
}
