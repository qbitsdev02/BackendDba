<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use App\Models\StaffType;
use App\Models\User;

class StaffTypePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        return $user->can('staff-types-viewAny');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\StaffType  $staffType
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, StaffType $staffType)
    {
        return $user->can('staff-types-read');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return $user->can('staff-types-create');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\StaffType  $staffType
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, StaffType $staffType)
    {
        return $user->can('staff-types-update');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\StaffType  $staffType
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, StaffType $staffType)
    {
        return $user->can('staff-types-delete');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\StaffType  $staffType
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, StaffType $staffType)
    {
        return $user->can('staff-types-restore');
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\StaffType  $staffType
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, StaffType $staffType)
    {
        return $user->can('staff-types-forceDelete');
    }
}
