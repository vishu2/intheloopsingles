<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * LeadSource Entity
 *
 * @property int $id
 * @property string $source_name
 * @property int $location_id
 * @property int $source_status
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Location $location
 * @property \App\Model\Entity\Lead[] $leads
 */
class LeadSource extends Entity
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
        'source_name' => true,
        'location_id' => true,
        'source_status' => true,
        'created' => true,
        'modified' => true,
        'location' => true,
        'leads' => true,
    ];
}
