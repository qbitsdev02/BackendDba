<?php

namespace App\Policies;

use App\Models\MaterialSupplier;
use App\Models\Provider;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProviderPolicy
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
        return $user->can('providers-viewAny');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Provider  $provider
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Provider $provider)
    {
        return $user->can('providers-view');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return $user->can('providers-create');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Provider $provider
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Provider $provider)
    {
        return $user->can('providers-update');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Provider  $provider
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Provider $provider)
    {
        return $user->can('providers-delete');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Provider  $provider
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Provider $provider)
    {
        return $user->can('providers-restore');
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Provider  $provider
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Provider $provider)
    {
        return $user->can('providers-forceDelete');
    }
}
