<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use App\Models\Disbursement;
use App\Models\User;

class DisbursementPolicy
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
        return $user->can('disbursements-ViewAny');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Disbursement  $disbursement
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Disbursement $disbursement)
    {
        return $user->can('disbursements-read');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return $user->can('disbursements-create');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Disbursement  $disbursement
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Disbursement $disbursement)
    {
        return $user->can('disbursements-update');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Disbursement  $disbursement
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Disbursement $disbursement)
    {
        return $user->can('disbursements-delete');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Disbursement  $disbursement
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Disbursement $disbursement)
    {
        return $user->can('disbursements-restore');
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Disbursement  $disbursement
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Disbursement $disbursement)
    {
        return $user->can('disbursements-forceDelete');
    }
}
