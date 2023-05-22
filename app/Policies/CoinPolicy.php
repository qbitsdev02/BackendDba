<?php

namespace App\Policies;

use App\Models\Coin;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CoinPolicy
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
        return $user->can('coins-viewAny');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Coin  $coin
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Coin $coin)
    {
        return $user->can('coins-read');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return $user->can('coins-create');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Coin  $coin
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Coin $coin)
    {
        return $user->can('coins-update');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Coin  $coin
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Coin $coin)
    {
        return $user->can('coins-delete');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Coin  $coin
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Coin $coin)
    {
        return $user->can('coins-restore');
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Coin  $coin
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Coin $coin)
    {
        return $user->can('coins-forceDelete');
    }
}
