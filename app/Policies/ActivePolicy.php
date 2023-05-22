<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use App\Models\Active;
use App\Models\User;

class ActivePolicy
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
        return $user->can('actives-viewAny');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Active  $active
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Active $active)
    {
        return $user->can('actives-read');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return $user->can('actives-create');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Active  $active
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Active $active)
    {
        return $user->can('actives-update');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Active  $active
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Active $active)
    {
        return $user->can('actives-delete');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Active  $active
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Active $active)
    {
        return $user->can('actives-restore');
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Active  $active
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Active $active)
    {
        return $user->can('actives-forceDelete');
    }
}
