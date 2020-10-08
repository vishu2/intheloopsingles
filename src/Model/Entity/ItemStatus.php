<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ItemStatus Entity
 *
 * @property int $id
 * @property string $name
 * @property \Cake\I18n\FrozenTime $created
 * @property int $is_deleted
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\BuyIntakeControl[] $buy_intake_controls
 */
class ItemStatus extends Entity
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
        'name' => true,
        'created' => true,
        'is_deleted' => true,
        'modified' => true,
        'buy_intake_controls' => true,
    ];
}
