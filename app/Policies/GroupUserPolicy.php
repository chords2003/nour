<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Group;
use App\Models\GroupUser;
use Illuminate\Auth\Access\Response;

class GroupUserPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return true;
    }

    public function join(User $user, Group $group, GroupUser $groupUser): bool
    {
        // Replace this with your own logic.
        // For example, you might check if the user is already a member of the group.
        return true;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, GroupUser $groupUser): bool
    {
        return true;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, GroupUser $groupUser): bool
    {
        // Replace this with your own logic.
        return true;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, GroupUser $groupUser): bool
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, GroupUser $groupUser): bool
    {
        //
        return true;
    }


    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, GroupUser $groupUser): bool
    {
        //
    }
}
