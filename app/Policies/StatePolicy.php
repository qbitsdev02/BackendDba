<?php

namespace App\Policies;

use App\Models\State;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class StatePolicy
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
        return $user->can('states-viewAny');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\State  $state
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, State $state)
    {
        return $user->can('states-read');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return $user->can('states-create');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\State  $state
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, State $state)
    {
        return $user->can('states-update');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\State  $state
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, State $state)
    {
        return $user->can('states-delete');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\State  $state
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, State $state)
    {
        return $user->can('states-restore');
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\State  $state
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, State $state)
    {
        return $user->can('states-forceDelete');
    }
}
