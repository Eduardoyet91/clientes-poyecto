<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * TeamsUser Entity
 *
 * @property int $id
 * @property int $team_id
 * @property int $user_id
 *
 * @property \App\Model\Entity\Team $team
 * @property \App\Model\Entity\User $user
 */
class TeamsUser extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected $_accessible = [
        'team_id' => true,
        'user_id' => true,
        'team' => true,
        'user' => true,
    ];
}
