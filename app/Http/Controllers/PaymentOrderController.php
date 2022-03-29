<?php

namespace App\Http\Controllers;

use App\Models\PaymentOrder;
use App\Http\Requests\StorePaymentOrderRequest;
use App\Http\Requests\UpdatePaymentOrderRequest;

class PaymentOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePaymentOrderRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePaymentOrderRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PaymentOrder  $paymentOrder
     * @return \Illuminate\Http\Response
     */
    public function show(PaymentOrder $paymentOrder)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PaymentOrder  $paymentOrder
     * @return \Illuminate\Http\Response
     */
    public function edit(PaymentOrder $paymentOrder)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePaymentOrderRequest  $request
     * @param  \App\Models\PaymentOrder  $paymentOrder
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePaymentOrderRequest $request, PaymentOrder $paymentOrder)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PaymentOrder  $paymentOrder
     * @return \Illuminate\Http\Response
     */
    public function destroy(PaymentOrder $paymentOrder)
    {
        //
    }
}
