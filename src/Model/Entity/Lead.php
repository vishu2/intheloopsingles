<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Lead Entity
 *
 * @property int $id
 * @property int|null $client_id
 * @property int $lead_type_id
 * @property int $lead_source_id
 * @property int $lead_status_id
 * @property int $location_id
 * @property string $lead_name
 * @property string $lead_email
 * @property string $lead_phone
 * @property string $lead_mobile
 * @property string|null $address
 * @property string|null $city
 * @property int|null $state_id
 * @property int|null $country_id
 * @property string|null $lead_contact_name
 * @property string|null $notes
 * @property \Cake\I18n\FrozenTime $converted
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Client $client
 * @property \App\Model\Entity\LeadType $lead_type
 * @property \App\Model\Entity\LeadSource $lead_source
 * @property \App\Model\Entity\LeadStatus $lead_status
 * @property \App\Model\Entity\Location $location
 * @property \App\Model\Entity\State $state
 * @property \App\Model\Entity\Country $country
 */
class Lead extends Entity
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
        'client_id' => true,
        'lead_type_id' => true,
        'lead_source_id' => true,
        'lead_status_id' => true,
        'location_id' => true,
        'lead_name' => true,
        'lead_email' => true,
        'lead_phone' => true,
        'lead_mobile' => true,
        'address' => true,
        'city' => true,
        'state_id' => true,
        'country_id' => true,
        'lead_contact_name' => true,
        'notes' => true,
		'is_migrated' => true,
        'converted' => true,
        'created' => true,
        'modified' => true,
        'client' => true,
        'lead_type' => true,
        'lead_source' => true,
        'lead_status' => true,
        'location' => true,
        'state' => true,
        'country' => true,
    ];
}
