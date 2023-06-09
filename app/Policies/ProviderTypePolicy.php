<?php

namespace App\Policies;

use App\Models\ProviderType;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProviderTypePolicy
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
        return $user->can('provider-types-viewAny');

    }
    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\ProviderType  $providerType
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, ProviderType $providerType)
    {
        return $user->can('provider-types-read');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return $user->can('provider-types-create');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\ProviderType   $providerType
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, ProviderType $providerType)
    {
        return $user->can('provider-types-update');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\ProviderType  $ProviderType
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, ProviderType $providerType)
    {
        return $user->can('provider-types-delete');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\ProviderType  $providerType
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, ProviderType $providerType)
    {
        return $user->can('provider-types-restore');
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\ProviderType $providerType
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, ProviderType $providerType)
    {
        return $user->can('provider-types-forceDelete');
    }
}
