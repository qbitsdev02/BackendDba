<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use App\Models\FieldCashFlow;
use App\Models\User;

class FieldCashFlowPolicy
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
        return $user->can('field-cash-flows-viewAny');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\FieldCashFlow  $fieldCashFlow
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, FieldCashFlow $fieldCashFlow)
    {
        return $user->can('field-cash-flows-read');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return $user->can('field-cash-flows-create');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\FieldCashFlow  $fieldCashFlow
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, FieldCashFlow $fieldCashFlow)
    {
        return $user->can('field-cash-flows-update');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\FieldCashFlow  $fieldCashFlow
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, FieldCashFlow $fieldCashFlow)
    {
        return $user->can('field-cash-flows-delete');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\FieldCashFlow  $fieldCashFlow
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, FieldCashFlow $fieldCashFlow)
    {
        return $user->can('field-cash-flows-restore');
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\FieldCashFlow  $fieldCashFlow
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, FieldCashFlow $fieldCashFlow)
    {
        return $user->can('field-cash-flows-forceDelete');
    }
}
