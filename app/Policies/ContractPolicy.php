<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use App\Models\Contract;
use App\Models\User;

class ContractPolicy
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
        return $user->can('contracts-viewAny');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Contract  $contract
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Contract $contract)
    {
        return $user->can('contracts-read');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return $user->can('contracts-create');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Contract  $contract
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Contract $contract)
    {
        return $user->can('contracts-update');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Contract  $contract
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Contract $contract)
    {
        return $user->can('contracts-delete');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Contract  $contract
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Contract $contract)
    {
        return $user->can('contracts-restore');
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Contract  $contract
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Contract $contract)
    {
        return $user->can('contracts-forceDelete');
    }
}
