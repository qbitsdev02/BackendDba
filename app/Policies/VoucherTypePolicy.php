<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use App\Models\VoucherType;
use App\Models\User;

class VoucherTypePolicy
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
        return $user->can('voucher-types-viewAny');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\VoucherType  $voucherType
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, VoucherType $voucherType)
    {
        return $user->can('voucher-types-view');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return $user->can('voucher-types-create');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\VoucherType  $voucherType
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, VoucherType $voucherType)
    {
        return $user->can('voucher-types-update');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\VoucherType  $voucherType
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, VoucherType $voucherType)
    {
        return $user->can('voucher-types-delete');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\VoucherType  $voucherType
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, VoucherType $voucherType)
    {
        return $user->can('voucher-types-restore');
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\VoucherType  $voucherType
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, VoucherType $voucherType)
    {
        return $user->can('voucher-types-forceDelete');
    }
}
