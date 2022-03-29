<?php

namespace App\Http\Controllers;

use App\Models\EgressType;
use App\Http\Requests\StoreEgressTypeRequest;
use App\Http\Requests\UpdateEgressTypeRequest;

class EgressTypeController extends Controller
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
     * @param  \App\Http\Requests\StoreEgressTypeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEgressTypeRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\EgressType  $egressType
     * @return \Illuminate\Http\Response
     */
    public function show(EgressType $egressType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\EgressType  $egressType
     * @return \Illuminate\Http\Response
     */
    public function edit(EgressType $egressType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateEgressTypeRequest  $request
     * @param  \App\Models\EgressType  $egressType
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEgressTypeRequest $request, EgressType $egressType)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\EgressType  $egressType
     * @return \Illuminate\Http\Response
     */
    public function destroy(EgressType $egressType)
    {
        //
    }
}
