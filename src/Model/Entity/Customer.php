<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Customer Entity
 *
 * @property int $id
 * @property string $name
 * @property string $apodo
 * @property string $email
 * @property string $direccion
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 * @property int $user_id
 * @property int $group_id
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Group $group
 * @property \App\Model\Entity\Comment[] $comments
 */
class Customer extends Entity
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
        'name' => true,
        'apodo' => true,
        'email' => true,
        'direccion' => true,
        'phone' => true,
        'created' => true,
        'modified' => true,
        'user_id' => true,
        'group_id' => true,
        'user' => true,
        'group' => true,
        'comments' => true,
    ];
}
