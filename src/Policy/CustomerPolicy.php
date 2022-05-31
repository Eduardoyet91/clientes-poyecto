<?php
declare(strict_types=1);

namespace App\Policy;

use App\Model\Entity\Customer;
use Authorization\IdentityInterface;

/**
 * Customer policy
 */
class CustomerPolicy
{
    /**
     * Check if $user can add Customer
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\Customer $customer
     * @return bool
     */
    public function canAdd(IdentityInterface $user, Customer $customer)
    {
    }

    /**
     * Check if $user can edit Customer
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\Customer $customer
     * @return bool
     */
    public function canEdit(IdentityInterface $user, Customer $customer)
    {

        return (($user->label_id === 2)||($customer->user_id == $user->id));
    }

    /**
     * Check if $user can delete Customer
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\Customer $customer
     * @return bool
     */
    public function canDelete(IdentityInterface $user, Customer $customer)
    {
        return (($user->label_id === 2)||($customer->user_id == $user->id));
    }

    /**
     * Check if $user can view Customer
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\Customer $customer
     * @return bool
     */
    public function canView(IdentityInterface $user, Customer $customer)
    {
        return (($user->label_id === 2)||($customer->user_id == $user->id));
    }
}
