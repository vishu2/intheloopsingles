<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Rate Entity
 *
 * @property int $id
 * @property string $name
 * @property int $rate_type_id
 * @property int $rate_charge_type_id
 * @property float $employee_pay_rate
 * @property string $account_code
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Employee[] $employees
 * @property \App\Model\Entity\Client[] $clients
 */
class Rate extends Entity
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
        'rate_type_id' => true,
        'rate_charge_type_id' => true,
        'employee_pay_rate' => true,
        'account_code' => true,
        'created' => true,
        'modified' => true,
        'clients' => true,
    ];
}
