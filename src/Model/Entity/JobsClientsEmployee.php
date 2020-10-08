<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * JobsClientsEmployee Entity
 *
 * @property int $id
 * @property int $job_id
 * @property int $employee_id
 * @property string $start_time
 * @property string $end_time
 * @property string $break
 * @property int $rate_id
 * @property string $notes
 * @property string|null $picked_quantity
 * @property float|null $per_unit
 * @property int $status
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Job $job
 * @property \App\Model\Entity\Employee $employee
 * @property \App\Model\Entity\Rate $rate
 */
class JobsClientsEmployee extends Entity
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
        'job_id' => true,
        'employee_id' => true,
        'start_time' => true,
        'end_time' => true,
        'break' => true,
        'rate_id' => true,
        'notes' => true,
        'picked_quantity' => true,
        'per_unit' => true,
        'status' => true,
        'created' => true,
        'modified' => true,
        'job' => true,
        'employee' => true,
        'rate' => true,
    ];
}
