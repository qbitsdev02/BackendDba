<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use App\Models\Port;
use App\Models\User;

class PortPolicy
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
        return $user->can('ports-viewAny');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Port  $port
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Port $port)
    {
        return $user->can('ports-read');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return $user->can('ports-create');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Port  $port
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Port $port)
    {
        return $user->can('ports-update');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Port  $port
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Port $port)
    {
        return $user->can('ports-delete');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Port  $port
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Port $port)
    {
        return $user->can('ports-restore');
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Port  $port
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Port $port)
    {
        return $user->can('ports-forceDelete');
    }
}
