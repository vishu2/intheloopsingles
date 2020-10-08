<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * FooterContact Entity
 *
 * @property int $id
 * @property string $location
 * @property string $phone
 * @property string $email
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 */
class FooterContact extends Entity
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
        'location' => true,
        'phone' => true,
        'email' => true,
        'created' => true,
        'modified' => true,
    ];
}
