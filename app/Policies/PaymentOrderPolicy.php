<?php

namespace App\Policies;

use App\Models\PaymentOrder;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PaymentOrderPolicy
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
        return $user->can('payment-orders-viewAny');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\PaymentOrder  $paymentOrder
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, PaymentOrder $paymentOrder)
    {
        return $user->can('payment-orders-read');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return $user->can('payment-orders-create');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\PaymentOrder  $paymentOrder
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, PaymentOrder $paymentOrder)
    {
        return $user->can('payment-orders-update');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\PaymentOrder  $paymentOrder
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, PaymentOrder $paymentOrder)
    {
        return $user->can('payment-orders-delete');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\PaymentOrder  $paymentOrder
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, PaymentOrder $paymentOrder)
    {
        return $user->can('payment-orders-restore');
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\PaymentOrder  $paymentOrder
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, PaymentOrder $paymentOrder)
    {
        return $user->can('payment-orders-forceDelete');
    }
}
