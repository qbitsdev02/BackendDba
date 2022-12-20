<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use App\Models\DisbursementRequest;
use App\Models\User;

class DisbursementRequestPolicy
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
        return $user->can('disbursement-requests-viewAny');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\DisbursementRequest  $disbursementRequest
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, DisbursementRequest $disbursementRequest)
    {
        return $user->can('disbursement-requests-read');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return $user->can('disbursement-requests-create');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\DisbursementRequest  $disbursementRequest
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, DisbursementRequest $disbursementRequest)
    {
        return $user->can('disbursement-requests-update');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\DisbursementRequest  $disbursementRequest
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, DisbursementRequest $disbursementRequest)
    {
        return $user->can('disbursement-requests-delete');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\DisbursementRequest  $disbursementRequest
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, DisbursementRequest $disbursementRequest)
    {
        return $user->can('disbursement-requests-restore');
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\DisbursementRequest  $disbursementRequest
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, DisbursementRequest $disbursementRequest)
    {
        return $user->can('disbursement-requests-forceDelete');
    }
}
