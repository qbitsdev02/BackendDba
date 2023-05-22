<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use App\Models\Attribute;
use App\Models\User;

class AttributePolicy
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
        $user->can('attributes-viewAny');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Attribute  $attribute
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Attribute $attribute)
    {
        $user->can('attributes-read');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        $user->can('attributes-create');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Attribute  $attribute
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Attribute $attribute)
    {
        $user->can('attributes-update');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Attribute  $attribute
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Attribute $attribute)
    {
        $user->can('attributes-delete');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Attribute  $attribute
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Attribute $attribute)
    {
        $user->can('attributes-restore');
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Attribute  $attribute
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Attribute $attribute)
    {
        $user->can('attributes-forceDelete');
    }
}
