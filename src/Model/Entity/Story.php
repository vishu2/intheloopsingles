<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Story Entity
 *
 * @property int $id
 * @property string $member_name
 * @property string $story_image
 * @property string $story_content
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 */
class Story extends Entity
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
        'member_name' => true,
        'story_image' => true,
        'story_content' => true,
        'created' => true,
        'modified' => true,
    ];
}
