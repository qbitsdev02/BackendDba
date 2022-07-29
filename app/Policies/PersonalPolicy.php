<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use App\Models\Personal;
use App\Models\User;

class PersonalPolicy
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
        return $user->can('personals-viewAny');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Personal  $personal
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Personal $personal)
    {
        return $user->can('personals-read');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return $user->can('personals-create');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Personal  $personal
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Personal $personal)
    {
        return $user->can('personals-update');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Personal  $personal
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Personal $personal)
    {
        return $user->can('personals-delete');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Personal  $personal
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Personal $personal)
    {
        return $user->can('personals-restore');
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Personal  $personal
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Personal $personal)
    {
        return $user->can('personals-forceDelete');
    }
}
